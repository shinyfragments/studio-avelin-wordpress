#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

export IONOS_SFTP_REMOTE_ROOT="clickandbuilds/StudioAvelinStaging"
export IONOS_BACKUP_DIR="${IONOS_BACKUP_DIR:-.deploy-backups/staging-htaccess-$(date +%Y%m%d-%H%M%S)}"

exec "${SCRIPT_DIR}/deploy-htaccess.sh"
