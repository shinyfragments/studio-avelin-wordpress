#!/usr/bin/env bash
set -euo pipefail

# Deploy server-config/.htaccess to the WordPress root on IONOS.
# Mirrors deploy.sh's approach (backup before overwrite) for this one file,
# which lives outside the theme folder and is therefore not part of the
# regular child-theme deploy.
#
# Required before running:
#   source ~/.studio-avelin-deploy-env   (sets IONOS_SFTP_USER / IONOS_SFTP_PASSWORD)

REMOTE_HOST="${IONOS_SFTP_HOST:-access-5020051294.webspace-host.com}"
REMOTE_USER="${IONOS_SFTP_USER:?Set IONOS_SFTP_USER before deploying.}"
: "${IONOS_SFTP_PASSWORD:?Set IONOS_SFTP_PASSWORD before deploying.}"
REMOTE_ROOT="${IONOS_SFTP_REMOTE_ROOT:-clickandbuilds/StudioAvelin}"
LOCAL_FILE="server-config/.htaccess"
BACKUP_DIR="${IONOS_BACKUP_DIR:-.deploy-backups/$(date +%Y%m%d-%H%M%S)}"

[[ -f "$LOCAL_FILE" ]] || { echo "Missing ${LOCAL_FILE}" >&2; exit 1; }
mkdir -p "$BACKUP_DIR"

echo "Deploying .htaccess to ${REMOTE_ROOT}/.htaccess ..."

expect -f - "$REMOTE_USER" "$REMOTE_HOST" "$REMOTE_ROOT" "$LOCAL_FILE" "$BACKUP_DIR" <<'EXPECT'
set timeout 60

set remote_user [lindex $argv 0]
set remote_host [lindex $argv 1]
set remote_root [lindex $argv 2]
set local_file  [lindex $argv 3]
set backup_dir  [lindex $argv 4]

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

send -- "get $remote_root/.htaccess $backup_dir/.htaccess\r"
wait_for_prompt "backup of .htaccess"

send -- "put $local_file $remote_root/.htaccess\r"
wait_for_prompt "upload of .htaccess"

send -- "bye\r"
expect eof
EXPECT

echo ".htaccess deployment completed successfully."
echo "Previous remote file saved in: ${BACKUP_DIR}/.htaccess"
