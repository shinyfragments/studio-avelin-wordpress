# Deployment

Three ways to push `studio-avelin-child/` to IONOS. All three do the same thing
(upload the child theme over SFTP); pick whichever fits.

## 1. GitHub Actions — from anywhere, no laptop

`.github/workflows/deploy.yml`.

**One-time setup:** in the repo on GitHub, *Settings → Secrets and variables →
Actions → New repository secret*, add:

| Secret | Value |
|---|---|
| `IONOS_SFTP_HOST` | `access-5020051294.webspace-host.com` |
| `IONOS_SFTP_USER` | `su1946186` |
| `IONOS_SFTP_PASSWORD` | the SFTP password |

**Deploy:** repo → *Actions* tab → *Deploy child theme* → *Run workflow* →
choose `staging` or `production` → *Run*. Works from a phone browser.

Every push to `feature/ich-marke-umbau` that touches `studio-avelin-child/`
also deploys to **staging** automatically. Each run first runs `php -l` on all
theme files and stops on a syntax error.

Remote targets:
- staging → `clickandbuilds/StudioAvelinStaging/wp-content/themes/studio-avelin-child`
- production → `clickandbuilds/StudioAvelin/wp-content/themes/studio-avelin-child`

The workflow never deletes remote files it doesn't know about and never touches
anything outside the theme directory (the WordPress `.htaccess`, uploads, etc.
stay as they are — deploy those with `deploy-htaccess.sh` if needed).

## 2. Local — `deploy.sh` / `deploy-staging.sh`

    export IONOS_SFTP_USER='su1946186'
    read -rs "IONOS_SFTP_PASSWORD?IONOS-Passwort: "; export IONOS_SFTP_PASSWORD
    ./deploy-staging.sh      # or ./deploy.sh for production

Needs `expect`. Uploads an explicit file list and keeps a backup of the
previous versions in `.deploy-backups/`.

## 3. Local, over SSH, without a password prompt

Store the password in the macOS Keychain once:

    security add-generic-password -a ionos -s studio-avelin-sftp -w

then any SSH session can run the deploy scripts if you first do:

    export IONOS_SFTP_USER='su1946186'
    export IONOS_SFTP_PASSWORD="$(security find-generic-password -a ionos -s studio-avelin-sftp -w)"
    ./deploy-staging.sh
