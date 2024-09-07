#!/usr/bin/env bash

# Prepare vscode-xdebug setup
mkdir -p .vscode
cp .gitpod/templates/launch.json .vscode/.

# Workaround for Vite - Vite not yet used here
# Normally expose port 3100 for Vite in .ddev/config.yaml, but ddev-router
# is not used  on Gitpod / Codespaces, etc. The Routing is handled by Gitpod /
# Codespaces itself. Therefore we will create an additional config file for
# DDEV which will expose port 3100 without ddev-router.
# cp .gitpod/templates/docker-compose.vite-workaround.yaml .ddev/.

# Start the DDEV project
export DDEV_NONINTERACTIVE=true

# start project
ddev start -y

# Import example database dump
ddev import-db --file=dump.sql.gz

# setup cookie encryption key in .env
ddev craft setup/keys

# Copy example image
ddev exec 'cp rivage-Fa9b57hffnM-unsplash.jpg web/uploads/rivage-Fa9b57hffnM-unsplash.jpg'

# Open site in browser
ddev launch
