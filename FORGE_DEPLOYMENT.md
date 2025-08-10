# Laravel Forge Deployment Guide for DevChase

## Prerequisites

1. **Laravel Forge Account**: Make sure you have an active Forge account
2. **Server Setup**: Have a server provisioned through Forge
3. **Domain**: Point your domain to your Forge server

## Forge Site Setup

### 1. Create New Site in Forge

1. Go to your Forge dashboard
2. Click "New Site" on your server
3. Fill in the details:
   - **Domain**: `your-domain.com`
   - **Project Type**: General PHP/Laravel
   - **Web Directory**: `/public` (Laravel default)
   - **PHP Version**: 8.3 or higher

### 2. Connect Repository

1. Go to your site's "Git Repository" tab
2. Connect your GitHub repository: `bbenkert/devchase`
3. Set branch to `main`
4. Enable "Auto Deployment" if desired

### 3. Environment Variables

Go to "Environment" tab and set these variables:

```env
APP_NAME=DevChase
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=forge
DB_USERNAME=forge
DB_PASSWORD=YOUR_DB_PASSWORD

# Mail Configuration (using Mailgun)
MAIL_MAILER=mailgun
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="DevChase"

MAILGUN_DOMAIN=your-domain.com
MAILGUN_SECRET=YOUR_MAILGUN_SECRET

# Optional: AWS S3 for file storage
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
```

### 4. Deployment Script

In Forge, go to "Deployment Script" and use this script:

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

### 5. SSL Certificate

1. Go to "SSL" tab in Forge
2. Click "LetsEncrypt" to get a free SSL certificate
3. Forge will automatically configure HTTPS

### 6. Queue Worker (Optional)

If you plan to use queues:

1. Go to "Queue" tab
2. Create a new queue worker:
   - **Connection**: database
   - **Queue**: default
   - **Processes**: 1

## First Deployment

1. **Deploy**: Click "Deploy Now" in Forge
2. **Generate App Key**: SSH into your server and run:
   ```bash
   cd /home/forge/your-domain.com
   php artisan key:generate
   ```
3. **Run Migrations**: 
   ```bash
   php artisan migrate
   ```

## Post-Deployment Checklist

- [ ] Site loads correctly at your domain
- [ ] SSL certificate is active (green lock)
- [ ] Database migrations completed
- [ ] File uploads work (test in Filament)
- [ ] Contact forms work (if applicable)
- [ ] Admin panel accessible at `/admin`

## Ongoing Maintenance

### Auto-Deployment
Enable auto-deployment in Forge to automatically deploy when you push to `main` branch.

### Monitoring
- Monitor server resources in Forge dashboard
- Check logs in "Logs" tab if issues arise
- Set up uptime monitoring (external service recommended)

### Backups
Configure database backups in Forge:
1. Go to "Backup" tab
2. Set up automated daily backups
3. Store on S3 or other cloud storage

## Troubleshooting

### Common Issues:

1. **500 Error**: Check logs in Forge dashboard
2. **Asset not loading**: Run `npm run build` and ensure files are in `/public/build/`
3. **Database connection**: Verify DB credentials in environment
4. **File permissions**: Forge handles this automatically, but ensure `storage/` is writable

### Useful Commands:
```bash
# SSH into server
forge ssh your-server-name

# Navigate to site
cd /home/forge/your-domain.com

# View Laravel logs
tail -f storage/logs/laravel.log

# Clear all caches
php artisan optimize:clear
```

## Environment Variables Reference

Copy these to your Forge environment configuration:

```env
APP_NAME=DevChase
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=forge
DB_USERNAME=forge
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=mailgun
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="DevChase"

MAILGUN_DOMAIN=your-domain.com
MAILGUN_SECRET=
```

Remember to:
- Replace `your-domain.com` with your actual domain
- Generate a new `APP_KEY` using `php artisan key:generate`
- Set up your Mailgun credentials for contact forms
- Configure any additional services you're using

Your DevChase site should now be live and fully functional on Laravel Forge! 🚀
