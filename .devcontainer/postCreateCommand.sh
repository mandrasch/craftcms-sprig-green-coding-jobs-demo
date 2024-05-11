
#!/bin/bash
set -ex

# This file is called in three scenarios:
# 1. fresh creation of devcontainer
# 2. rebuild
# 3. full rebuild

# ddev default commands
# see: https://ddev.readthedocs.io/en/latest/users/install/ddev-installation/#github-codespaces

# retry, see https://github.com/ddev/ddev/pull/5592
wait_for_docker() {
  while true; do
    docker ps > /dev/null 2>&1 && break
    sleep 1
  done
  echo "Docker is ready."
}

wait_for_docker

# https://github.com/ddev/ddev/pull/5290#issuecomment-1689024764
ddev config global --omit-containers=ddev-router

# download images beforehand
ddev debug download-images

# avoid errors on rebuilds
ddev poweroff

# start ddev project
ddev start -y

# DDEV will automatically set the codespaces preview URL in .env.
# If this is not working in future, you can use this snippet for replacement:
# ddev exec 'sed -i "/PRIMARY_SITE_URL=/c APP_URL=$DDEV_PRIMARY_URL" .env'

# normal project setup
ddev composer install

# Import example db, you could also run ddev craft/install ... here with all params
ddev import-db --file=dump.sql.gz
ddev exec 'cp rivage-Fa9b57hffnM-unsplash.jpg web/uploads/rivage-Fa9b57hffnM-unsplash.jpg'

ddev craft setup/keys
