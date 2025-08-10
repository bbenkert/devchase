# Forge Deployment Checklist

## Before Deployment

- [ ] Remove Coolify-specific files ✅
- [ ] Update `.env.example` with production values ✅
- [ ] Create Forge deployment script ✅
- [ ] Ensure HTTPS enforcement is active ✅

## Forge Configuration

### Site Setup
- [ ] Create new site in Forge dashboard
- [ ] Set web directory to `/public`
- [ ] Connect GitHub repository `bbenkert/devchase`
- [ ] Set deployment branch to `main`

### Environment Variables
- [ ] Copy `.env.example` to Forge environment
- [ ] Generate new `APP_KEY`
- [ ] Set correct `APP_URL`
- [ ] Configure database credentials
- [ ] Set up Mailgun for contact forms

### Deployment Script
```bash
cd $FORGE_SITE_PATH
git pull origin main

$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

$FORGE_PHP artisan migrate --force
$FORGE_PHP artisan config:cache
$FORGE_PHP artisan route:cache
$FORGE_PHP artisan view:cache
$FORGE_PHP artisan storage:link

npm ci
npm run build

$FORGE_PHP artisan queue:restart
```

### SSL Certificate
- [ ] Enable Let's Encrypt SSL certificate
- [ ] Verify HTTPS redirect works

## Post-Deployment
- [ ] Test site loads correctly
- [ ] Verify SSL certificate (green lock)
- [ ] Test admin panel at `/admin`
- [ ] Test file uploads in Filament
- [ ] Check all pages load without errors

## Quick Deploy
After initial setup, deployments are as simple as:
1. Push code to `main` branch
2. Forge auto-deploys (if enabled)
3. Or click "Deploy Now" in Forge dashboard
