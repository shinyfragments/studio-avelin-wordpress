#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

export IONOS_SFTP_REMOTE_DIR="clickandbuilds/StudioAvelinStaging/wp-content/themes/studio-avelin-child"
export IONOS_BACKUP_DIR="${IONOS_BACKUP_DIR:-.deploy-backups/staging-$(date +%Y%m%d-%H%M%S)}"

exec "${SCRIPT_DIR}/deploy.sh"
