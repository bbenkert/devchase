#!/bin/bash

# Laravel Forge Deployment Script for DevChase

set -e

echo "🚀 Starting deployment..."

# Navigate to the project directory
cd $FORGE_SITE_PATH

echo "📦 Installing Composer dependencies..."
$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

echo "🔑 Caching configuration..."
$FORGE_PHP artisan config:cache
$FORGE_PHP artisan route:cache
$FORGE_PHP artisan view:cache

echo "📊 Running database migrations..."
$FORGE_PHP artisan migrate --force

echo "🔗 Creating storage symlink..."
$FORGE_PHP artisan storage:link

echo "🎨 Installing Bun dependencies and building assets..."
bun install --frozen-lockfile
bun run build

echo "🧹 Clearing caches..."
$FORGE_PHP artisan cache:clear
$FORGE_PHP artisan config:cache
$FORGE_PHP artisan route:cache
$FORGE_PHP artisan view:cache

echo "🔄 Restarting queue workers..."
$FORGE_PHP artisan queue:restart

echo "✅ Deployment completed successfully!"
