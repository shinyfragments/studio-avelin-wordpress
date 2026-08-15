#!/usr/bin/env bash
set -euo pipefail

# Deploy the maintained Studio Avelin child-theme files to IONOS.
# Required before running:
#   export IONOS_SFTP_USER='...'
#   read -rs 'IONOS_SFTP_PASSWORD?IONOS-Passwort: '
#   export IONOS_SFTP_PASSWORD

REMOTE_HOST="${IONOS_SFTP_HOST:-access-5020051294.webspace-host.com}"
REMOTE_USER="${IONOS_SFTP_USER:?Set IONOS_SFTP_USER before deploying.}"
: "${IONOS_SFTP_PASSWORD:?Set IONOS_SFTP_PASSWORD before deploying.}"
REMOTE_DIR="${IONOS_SFTP_REMOTE_DIR:-clickandbuilds/StudioAvelin/wp-content/themes/studio-avelin-child}"
LOCAL_DIR="${IONOS_LOCAL_DIR:-studio-avelin-child}"
BACKUP_DIR="${IONOS_BACKUP_DIR:-.deploy-backups/$(date +%Y%m%d-%H%M%S)}"

FILES=(
  "front-page.php"
  "functions.php"
	"single-experiment.php"
	"page-experiments.php"
	"assets/img/favicon.svg"
	"parts/sa-header.php"
  "parts/sa-footer.php"
  "inc/sa-journal.php"
  "journal/archive-journal.php"
  "journal/post-cover.php"
  "journal/single-journal.php"
  "journal/taxonomy-journal-category.php"
  "journal/taxonomy-journal-tag.php"
  "journal/template-card.php"
  "journal/header.php"
  "journal/footer.php"
	"assets/css/sa-base.css"
  "assets/css/sa-journal.css"
	"assets/css/home.css"
	"assets/css/pages.css"
	"assets/js/home.js"
  "assets/js/sa-journal.js"
)

for file in "${FILES[@]}"; do
  [[ -f "${LOCAL_DIR}/${file}" ]] || {
    echo "Missing deployment file: ${LOCAL_DIR}/${file}" >&2
    exit 1
  }
done

mkdir -p "${BACKUP_DIR}/parts" "${BACKUP_DIR}/assets/css" "${BACKUP_DIR}/assets/js"
echo "Deploying ${#FILES[@]} child-theme files to IONOS..."

expect -f - "$REMOTE_USER" "$REMOTE_HOST" "$REMOTE_DIR" "$LOCAL_DIR" "$BACKUP_DIR" "${FILES[@]}" <<'EXPECT'
set timeout 60

set remote_user [lindex $argv 0]
set remote_host [lindex $argv 1]
set remote_dir  [lindex $argv 2]
set local_dir   [lindex $argv 3]
set backup_dir  [lindex $argv 4]
set files       [lrange $argv 5 end]

proc wait_for_prompt {context {allow_failure 0}} {
  expect {
    -re "(?i)(permission denied|couldn't|not found|no such file)" {
      puts stderr "$context failed"
      exit 1
    }
    -re "(?i)failure" {
      if {$allow_failure} {
        exp_continue
      }
      puts stderr "$context failed"
      exit 1
    }
    "sftp>" { return }
    timeout { puts stderr "$context timed out"; exit 1 }
    eof { puts stderr "Connection closed during $context"; exit 1 }
  }
}

spawn sftp -o StrictHostKeyChecking=accept-new -- "${remote_user}@${remote_host}"
expect {
  -re "(?i)password:" { send -- "$env(IONOS_SFTP_PASSWORD)\r" }
  timeout { puts stderr "Password prompt timed out"; exit 1 }
  eof { puts stderr "Connection closed before authentication"; exit 1 }
}
wait_for_prompt "authentication"

foreach file [list "front-page.php" "functions.php" "single-experiment.php" "page-experiments.php" "parts/sa-header.php" "parts/sa-footer.php" "assets/css/home.css" "assets/css/pages.css" "assets/css/sa-base.css" "assets/js/home.js"] {
  send -- "get $remote_dir/$file $backup_dir/$file\r"
  wait_for_prompt "backup of $file"
}

foreach directory [list \
  "$remote_dir/inc" \
  "$remote_dir/journal" \
  "$remote_dir/parts" \
  "$remote_dir/assets" \
  "$remote_dir/assets/css" \
  "$remote_dir/assets/img" \
  "$remote_dir/assets/js"] {
  send -- "mkdir $directory\r"
  wait_for_prompt "creating $directory" 1
}

foreach file $files {
  send -- "put $local_dir/$file $remote_dir/$file\r"
  wait_for_prompt "upload of $file"
}

send -- "bye\r"
expect eof
EXPECT

echo "Child-theme deployment completed successfully."
echo "Previous site files saved in: ${BACKUP_DIR}"
