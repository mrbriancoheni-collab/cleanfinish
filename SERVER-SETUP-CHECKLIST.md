# CleanFinish Server Setup Checklist

This checklist ensures all necessary components are working on the dedicated server.

## 1. WordPress Core Requirements

### PHP Requirements
- [ ] PHP version 7.4 or higher (8.0+ recommended)
- [ ] Required PHP extensions:
  - [ ] `php-mysql` or `php-mysqli`
  - [ ] `php-json`
  - [ ] `php-curl`
  - [ ] `php-gd` or `php-imagick` (for image processing)
  - [ ] `php-mbstring`
  - [ ] `php-xml`
  - [ ] `php-zip`
  - [ ] `php-intl` (recommended)

**Check command:**
```bash
php -v
php -m | grep -E 'mysqli|json|curl|gd|mbstring|xml|zip'
```

### MySQL/MariaDB Requirements
- [ ] MySQL 5.7+ or MariaDB 10.3+
- [ ] Database created for WordPress
- [ ] Database user with proper permissions

**Check command:**
```bash
mysql --version
```

### Web Server
- [ ] Apache 2.4+ or Nginx 1.14+
- [ ] mod_rewrite enabled (Apache) or rewrite rules configured (Nginx)
- [ ] HTTPS/SSL certificate installed (recommended)

**Check Apache modules:**
```bash
apache2 -M | grep rewrite
```

## 2. WordPress Installation

### Core Files
- [ ] WordPress core files uploaded to web root
- [ ] wp-config.php configured with database credentials
- [ ] Site URL and Home URL set correctly

**Verify installation:**
```bash
ls -la /path/to/wordpress/ | grep wp-
cat /path/to/wordpress/wp-config.php | grep DB_NAME
```

### File Permissions
Set correct permissions for WordPress:

```bash
cd /path/to/wordpress/

# Directories should be 755
find . -type d -exec chmod 755 {} \;

# Files should be 644
find . -type f -exec chmod 644 {} \;

# wp-content should be writable
chmod -R 775 wp-content
chown -R www-data:www-data wp-content

# Secure wp-config.php
chmod 600 wp-config.php
```

### Required Directories (writable)
- [ ] `wp-content/uploads/` - 775
- [ ] `wp-content/cache/` - 775 (if using caching)
- [ ] `wp-content/themes/` - 775
- [ ] `wp-content/plugins/` - 775

## 3. Theme Installation

### CleanFinish Pro Theme
- [ ] Theme uploaded to `wp-content/themes/cleanfinish-pro/`
- [ ] Theme activated in WordPress Admin
- [ ] All template files present:
  - [ ] `style.css` (version 2.0.5)
  - [ ] `functions.php`
  - [ ] `header.php`
  - [ ] `footer.php`
  - [ ] `index.php`
  - [ ] `page.php`
  - [ ] `single.php`
  - [ ] `template-home.php`
  - [ ] `template-about.php`
  - [ ] `template-services.php`
  - [ ] `template-contact.php`
  - [ ] `template-blog.php`

**Check theme files:**
```bash
ls -la wp-content/themes/cleanfinish-pro/
```

## 4. WordPress Configuration

### Pages Setup
Create these pages in WordPress Admin (Pages → Add New):

1. **Home Page**
   - Title: "Home"
   - Template: "Home Page Template"
   - Set as Front Page: Settings → Reading → Static Page

2. **Services Page**
   - Title: "Services"
   - Template: "Services Template"

3. **About Page**
   - Title: "About"
   - Template: "About Template"

4. **Blog Page**
   - Title: "Blog"
   - Template: "Blog Template"
   - Set as Posts Page: Settings → Reading → Posts Page

5. **Contact Page**
   - Title: "Contact"
   - Template: "Contact Template"

### Navigation Menu
Settings → Appearance → Menus:
- [ ] Create "Primary Menu"
- [ ] Add pages: Home, Services, About, Blog, Contact
- [ ] Assign to "Primary Menu" location

### Reading Settings
Settings → Reading:
- [ ] Front page displays: "A static page"
- [ ] Front page: "Home"
- [ ] Posts page: "Blog"

### Permalink Settings
Settings → Permalinks:
- [ ] Set to "Post name" (recommended)
- [ ] Custom structure: `/%postname%/`

## 5. Server Performance & Background Workers

### PHP-FPM Configuration (if using PHP-FPM)
Ensure adequate workers for traffic:

```bash
# Edit PHP-FPM pool config
nano /etc/php/8.x/fpm/pool.d/www.conf
```

**Recommended settings:**
```ini
pm = dynamic
pm.max_children = 50
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 20
pm.max_requests = 500
```

**Restart PHP-FPM:**
```bash
systemctl restart php8.x-fpm
```

### WordPress Cron
WordPress uses pseudo-cron by default (triggered by page visits).

**Option 1: Use System Cron (Recommended for dedicated server)**

1. Disable WP-Cron in wp-config.php:
```php
define('DISABLE_WP_CRON', true);
```

2. Add system cron job:
```bash
crontab -e
```

Add this line:
```cron
*/5 * * * * wget -q -O - https://cleanfinish.net/wp-cron.php?doing_wp_cron >/dev/null 2>&1
```

Or using WP-CLI:
```cron
*/5 * * * * cd /path/to/wordpress && wp cron event run --due-now >/dev/null 2>&1
```

**Check cron is working:**
```bash
crontab -l
tail -f /var/log/syslog | grep CRON
```

### Object Caching (Optional but Recommended)
For better performance, install Redis or Memcached:

```bash
# Install Redis
apt install redis-server php-redis
systemctl enable redis-server
systemctl start redis-server

# Install WordPress Redis plugin
wp plugin install redis-cache --activate
wp redis enable
```

## 6. Security Configuration

### File Permissions Hardening
```bash
cd /path/to/wordpress/

# Prevent direct access to wp-config.php
chmod 600 wp-config.php
chown root:root wp-config.php

# Secure .htaccess
chmod 644 .htaccess

# Remove execution permissions from uploads
find wp-content/uploads -type f -exec chmod 644 {} \;
```

### wp-config.php Security Keys
Ensure security keys are set:
```bash
grep AUTH_KEY wp-config.php
```

If not set, generate new keys: https://api.wordpress.org/secret-key/1.1/salt/

### Disable File Editing
Add to wp-config.php:
```php
define('DISALLOW_FILE_EDIT', true);
```

## 7. Testing Checklist

### Frontend Tests
- [ ] Visit homepage: https://cleanfinish.net/
- [ ] Check navigation menu displays
- [ ] Click each menu item (Home, Services, About, Blog, Contact)
- [ ] Verify proper alignment on all pages
- [ ] Test responsive design (mobile, tablet)
- [ ] Check contact information is correct:
  - Phone: (279) 264-8539
  - Email: cleanfinish08@gmail.com
  - Service Area: Sacramento County & South Placer County

### Backend Tests
- [ ] Login to WordPress Admin: https://cleanfinish.net/wp-admin
- [ ] Check theme is activated
- [ ] Create a test blog post
- [ ] Upload an image
- [ ] Check plugins are working
- [ ] Verify permalinks work

### Performance Tests
- [ ] Run speed test: https://gtmetrix.com/
- [ ] Check PHP memory limit: `php -i | grep memory_limit`
- [ ] Monitor server resources: `htop` or `top`

### Error Logging
Enable debugging temporarily to check for errors:

Edit wp-config.php:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Check logs:
```bash
tail -f wp-content/debug.log
```

**Remember to disable debugging in production:**
```php
define('WP_DEBUG', false);
```

## 8. Backup Configuration

### Automated Backups
Set up automated backups:

1. **Database Backup (Daily):**
```bash
#!/bin/bash
# /root/backup-wp-db.sh
mysqldump -u dbuser -p'password' dbname | gzip > /backups/cleanfinish-db-$(date +%Y%m%d).sql.gz
find /backups -name "cleanfinish-db-*.sql.gz" -mtime +7 -delete
```

2. **Files Backup (Weekly):**
```bash
#!/bin/bash
# /root/backup-wp-files.sh
tar -czf /backups/cleanfinish-files-$(date +%Y%m%d).tar.gz /path/to/wordpress/
find /backups -name "cleanfinish-files-*.tar.gz" -mtime +30 -delete
```

3. **Add to crontab:**
```bash
crontab -e
```
```cron
0 2 * * * /root/backup-wp-db.sh
0 3 * * 0 /root/backup-wp-files.sh
```

## 9. Monitoring

### Server Monitoring
- [ ] Set up server monitoring (Uptime Robot, Pingdom, etc.)
- [ ] Monitor disk space: `df -h`
- [ ] Monitor memory usage: `free -m`
- [ ] Check PHP error logs: `tail -f /var/log/php8.x-fpm.log`
- [ ] Check web server logs: `tail -f /var/log/apache2/error.log`

### WordPress Health Check
Check in WordPress Admin → Tools → Site Health

## 10. Post-Deployment Verification Commands

Run these commands to verify everything is working:

```bash
# Check web server is running
systemctl status apache2  # or nginx

# Check PHP-FPM is running
systemctl status php8.x-fpm

# Check MySQL is running
systemctl status mysql

# Test website responds
curl -I https://cleanfinish.net/

# Check SSL certificate
openssl s_client -connect cleanfinish.net:443 -servername cleanfinish.net

# Check DNS resolution
dig cleanfinish.net

# Monitor real-time access
tail -f /var/log/apache2/access.log
```

## Quick Reference: File Locations

- WordPress root: `/path/to/wordpress/`
- Theme files: `/path/to/wordpress/wp-content/themes/cleanfinish-pro/`
- Uploads: `/path/to/wordpress/wp-content/uploads/`
- Config: `/path/to/wordpress/wp-config.php`
- Apache config: `/etc/apache2/sites-available/cleanfinish.conf`
- PHP-FPM config: `/etc/php/8.x/fpm/pool.d/www.conf`
- Error logs: `/var/log/apache2/error.log` and `/path/to/wordpress/wp-content/debug.log`

---

**Note:** Replace `/path/to/wordpress/` with your actual WordPress installation path.
**Note:** Replace `8.x` with your actual PHP version (e.g., `8.1`, `8.2`).
