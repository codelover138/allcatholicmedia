#!/usr/bin/env bash

set -euo pipefail

cd "$(dirname "$0")"

MODE="${1:-local}"

case "$MODE" in
  local)
    COMPOSER_ARGS="install"
    ;;
  production|prod)
    COMPOSER_ARGS="install --no-dev --optimize-autoloader"
    ;;
  *)
    echo "Usage: bash setup.sh [local|production]"
    exit 1
    ;;
esac

echo "==> Setup mode: $MODE"

echo "==> Installing PHP dependencies"
composer $COMPOSER_ARGS

echo "==> Preparing environment file"
if [ ! -f .env ]; then
  cp .env.example .env
  echo "Created .env from .env.example"
fi

echo "==> Generating app key if missing"
if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

echo "==> Running database migrations"
php artisan migrate --force

echo "==> Installing Node dependencies"
npm install

echo "==> Building production assets"
npm run prod

echo "==> Publishing CMS assets"
php artisan cms:publish:assets

echo "==> Creating storage symlink"
php artisan storage:link || true

echo "==> Clearing and warming caches"
php artisan optimize:clear

echo
echo "Setup complete."
echo "If the homepage still looks wrong, hard refresh the browser."
