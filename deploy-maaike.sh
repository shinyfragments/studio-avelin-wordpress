#!/usr/bin/env bash
set -euo pipefail

# Deploy the static Maaike Fiebus microsite to the existing IONOS webspace.
# Required before running:
#   export IONOS_SFTP_USER='...'
# If IONOS_SFTP_PASSWORD is unset, the script asks for it without echoing it.

REMOTE_HOST="${IONOS_SFTP_HOST:-access-5020051294.webspace-host.com}"
REMOTE_USER="${IONOS_SFTP_USER:?Set IONOS_SFTP_USER before deploying.}"
if [[ -z "${IONOS_SFTP_PASSWORD:-}" ]]; then
  read -rs -p "IONOS-SFTP-Passwort: " IONOS_SFTP_PASSWORD
  echo
  export IONOS_SFTP_PASSWORD
fi
REMOTE_DIR="${IONOS_MAAIKE_REMOTE_DIR:-clickandbuilds/StudioAvelin/maaike-fiebus}"
LOCAL_DIR="${IONOS_MAAIKE_LOCAL_DIR:-maaike-fiebus}"

FILES=(
  "index.html"
  "assets/legal.css"
  "assets/legal-links.js"
  "assets/fonts.css"
  "assets/fonts/cormorant-garamond-400.ttf"
  "assets/fonts/cormorant-garamond-400-italic.ttf"
  "assets/fonts/cormorant-garamond-500.ttf"
  "assets/fonts/cormorant-garamond-500-italic.ttf"
  "assets/fonts/cormorant-garamond-600.ttf"
  "assets/fonts/inter-300.ttf"
  "assets/fonts/inter-400.ttf"
  "assets/fonts/inter-500.ttf"
  "assets/fonts/inter-600.ttf"
  "impressum/index.html"
  "datenschutz/index.html"
  "nl/bedrijfsgegevens/index.html"
  "nl/privacy/index.html"
)

for file in "${FILES[@]}"; do
  [[ -f "${LOCAL_DIR}/${file}" ]] || {
    echo "Missing deployment file: ${LOCAL_DIR}/${file}" >&2
    exit 1
  }
done

echo "Deploying Maaike Fiebus legal pages to IONOS..."

expect -f - "$REMOTE_USER" "$REMOTE_HOST" "$REMOTE_DIR" "$LOCAL_DIR" "${FILES[@]}" <<'EXPECT'
set timeout 60

set remote_user [lindex $argv 0]
set remote_host [lindex $argv 1]
set remote_dir  [lindex $argv 2]
set local_dir   [lindex $argv 3]
set files       [lrange $argv 4 end]

proc wait_for_prompt {context {allow_failure 0}} {
  expect {
    -re "(?i)(permission denied|couldn't|not found|no such file)" {
      if {$allow_failure} { exp_continue }
      puts stderr "$context failed"
      exit 1
    }
    -re "(?i)failure" {
      if {$allow_failure} { exp_continue }
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

foreach directory [list "$remote_dir/assets" "$remote_dir/assets/fonts" "$remote_dir/impressum" "$remote_dir/datenschutz" "$remote_dir/nl" "$remote_dir/nl/bedrijfsgegevens" "$remote_dir/nl/privacy"] {
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

echo "Maaike Fiebus legal pages deployed successfully."
