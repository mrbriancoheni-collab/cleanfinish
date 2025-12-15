# CleanFinish - Professional Cleaning Company WordPress Website

A complete WordPress website for CleanFinish, a professional cleaning company specializing in move-out and office cleaning services for property managers, building managers, and property owners.

## Overview

This WordPress theme and content is designed specifically for a cleaning company that targets:
- Property managers
- Building managers
- Property owners
- Commercial property managers

The site emphasizes fast, thorough cleaning services with a focus on quick turnovers and professional results.

## Features

- **Custom WordPress Theme** - CleanFinish Pro theme with professional design
- **Fully Responsive** - Mobile-friendly design that works on all devices
- **SEO Optimized** - Clean code and semantic HTML for better search rankings
- **Service Pages** - Detailed information about move-out and office cleaning
- **Blog Platform** - Ready-to-use blog with sample posts for property managers
- **Contact Forms** - Professional contact page with detailed inquiry forms
- **Professional Copy** - All pages include professionally written copy targeting the right audience

## Site Structure

```
cleanfinish/
├── wp-content/
│   └── themes/
│       └── cleanfinish-pro/
│           ├── style.css                 # Main stylesheet
│           ├── functions.php             # Theme functions
│           ├── header.php                # Site header
│           ├── footer.php                # Site footer
│           ├── index.php                 # Blog listing page
│           ├── page.php                  # Default page template
│           ├── single.php                # Single blog post template
│           ├── template-home.php         # Home page template
│           ├── template-services.php     # Services page template
│           ├── page-about.php            # About page template
│           ├── template-contact.php      # Contact page template
│           └── js/
│               └── scripts.js            # JavaScript functionality
├── cleanfinish-wordpress-db.sql          # MySQL database file
├── sample-blog-posts.md                  # Sample blog content
└── README.md                             # This file
```

## Pages Included

1. **Home Page** - Hero section, services overview, testimonials, process walkthrough
2. **Services Page** - Detailed descriptions of:
   - Move-out cleaning
   - Office & commercial cleaning
   - Emergency cleaning services
   - Pricing information
3. **About Page** - Company story, mission, team, and commitments
4. **Contact Page** - Contact form, business hours, FAQs
5. **Blog** - Industry insights and tips for property managers

## Installation Instructions

### Prerequisites

- Web server (Apache/Nginx)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- WordPress 6.0 or higher

### Step 1: Set Up WordPress

1. Download and install WordPress from [wordpress.org](https://wordpress.org)
2. Create a MySQL database for WordPress
3. Complete the WordPress installation wizard

### Step 2: Import Database

```bash
# Import the database structure and sample content
mysql -u your_username -p cleanfinish_wp < cleanfinish-wordpress-db.sql

# Update the database connection in wp-config.php
# Edit wp-config.php and set your database credentials
```

### Step 3: Install the Theme

```bash
# Copy the theme to your WordPress installation
cp -r wp-content/themes/cleanfinish-pro /path/to/wordpress/wp-content/themes/

# Or upload via WordPress admin:
# 1. Zip the cleanfinish-pro folder
# 2. Go to WordPress Admin > Appearance > Themes > Add New > Upload Theme
# 3. Upload the zip file and activate
```

### Step 4: Configure WordPress

1. **Log in to WordPress Admin**
   - URL: `http://yoursite.com/wp-admin`
   - Username: `admin`
   - Password: `CleanFinish2024!` (CHANGE THIS IMMEDIATELY!)

2. **Activate the Theme**
   - Go to Appearance > Themes
   - Activate "CleanFinish Pro"

3. **Set Up Pages**
   - The database already includes all pages
   - Verify in Pages section that all pages are using correct templates:
     - Home → template-home.php
     - Services → template-services.php
     - About → page-about.php
     - Contact → template-contact.php

4. **Configure Settings**
   - Go to Settings > Reading
   - Set "Your homepage displays" to "A static page"
   - Homepage: Select "Home"
   - Posts page: Select "Blog"

5. **Create Navigation Menu**
   - Go to Appearance > Menus
   - Create a new menu called "Primary Menu"
   - Add pages in this order:
     - Home
     - Services
     - About
     - Blog
     - Contact
   - Set location to "Primary Menu"

6. **Update Site URLs**
   - Go to Settings > General
   - Update "WordPress Address (URL)" and "Site Address (URL)" to your domain

### Step 5: Add Blog Content

Sample blog posts are provided in `sample-blog-posts.md`. To add them:

1. Go to Posts > Add New
2. Copy content from each blog post
3. Set appropriate categories and tags
4. Add featured images (recommended: professional cleaning photos)
5. Publish or schedule posts

### Step 6: Customize Contact Information

Update contact information throughout the site:

1. Edit `footer.php` - Update phone, email, address
2. Edit `template-contact.php` - Update contact details
3. Edit `template-home.php` - Update phone numbers in CTAs

## Customization Guide

### Changing Colors

Edit `style.css` and modify these CSS variables:

```css
/* Primary brand color: #2c5f8d (blue) */
/* Secondary color: #28a745 (green) */
/* Background: #f8f9fa (light gray) */
```

### Adding Your Logo

1. Go to WordPress Admin > Appearance > Customize
2. Click "Site Identity"
3. Upload your logo
4. Save changes

### Updating Content

All page content is in the template files:
- Home: `template-home.php`
- Services: `template-services.php`
- About: `page-about.php`
- Contact: `template-contact.php`

### Adding Images

Replace placeholder text with actual images:

1. Upload images to Media Library
2. Update template files to reference your images
3. Recommended image sizes:
   - Hero images: 1200x600px
   - Service cards: 400x300px
   - Blog thumbnails: 400x250px

## Contact Form Setup

The contact form in `template-contact.php` needs a form handler. Options:

1. **Contact Form 7** (Recommended)
   - Install Contact Form 7 plugin
   - Create a form matching the fields in template-contact.php
   - Replace the HTML form with the Contact Form 7 shortcode

2. **WPForms**
   - Install WPForms plugin
   - Create a form with the fields shown in the template
   - Use the shortcode in the template

3. **Custom Handler**
   - The form posts to WordPress `admin-post.php`
   - Create a custom handler in `functions.php`

## SEO Recommendations

1. **Install Yoast SEO** or **Rank Math** plugin
2. **Set Focus Keywords** for each page:
   - Home: "property management cleaning services"
   - Services: "move-out cleaning", "office cleaning"
   - About: "professional cleaning company"
3. **Add Meta Descriptions** for all pages
4. **Create XML Sitemap** (Yoast/Rank Math do this automatically)
5. **Submit to Google Search Console**

## Performance Optimization

1. **Install a Caching Plugin**
   - WP Super Cache or W3 Total Cache
   - Configure browser caching

2. **Optimize Images**
   - Use WebP format when possible
   - Install Smush or EWWW Image Optimizer
   - Lazy load images

3. **Minify CSS/JS**
   - Install Autoptimize plugin
   - Enable CSS/JS minification

4. **Use a CDN**
   - Consider Cloudflare for free CDN
   - Improves global load times

## Security Best Practices

1. **Change Default Admin Password** - Do this immediately!
2. **Install Security Plugin** - Wordfence or Sucuri
3. **Enable SSL Certificate** - Use Let's Encrypt (free)
4. **Regular Updates** - Keep WordPress, theme, and plugins updated
5. **Regular Backups** - Use UpdraftPlus or BackupBuddy
6. **Limit Login Attempts** - Prevent brute force attacks
7. **Two-Factor Authentication** - Add extra security layer

## Maintenance Tasks

### Weekly
- Review form submissions
- Check for broken links
- Monitor website uptime

### Monthly
- Update WordPress core, themes, plugins
- Review analytics
- Add new blog post
- Check and respond to comments
- Review backup integrity

### Quarterly
- Security audit
- Performance optimization review
- Content update and refresh
- SEO analysis

## Support and Documentation

### WordPress Resources
- [WordPress Codex](https://codex.wordpress.org/)
- [WordPress Support Forums](https://wordpress.org/support/)
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)

### Customization Help
- For theme customization, refer to the [WordPress Theme Developer Handbook](https://developer.wordpress.org/themes/)
- For plugin development, see [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)

## Troubleshooting

### Common Issues

**Problem: White screen (WSOD)**
- Solution: Enable debugging in wp-config.php
- Check error logs
- Deactivate plugins one by one

**Problem: Theme not displaying correctly**
- Solution: Clear browser cache
- Regenerate thumbnails
- Check file permissions

**Problem: Contact form not working**
- Solution: Install and configure a form plugin
- Check email deliverability
- Verify SMTP settings

**Problem: Slow page loading**
- Solution: Install caching plugin
- Optimize images
- Check hosting resources

## License

This theme is licensed under the GNU General Public License v2 or later.

## Credits

**Theme Development:** CleanFinish Pro Theme
**WordPress Version:** 6.0+
**PHP Version:** 7.4+

## Version History

**v1.0** - Initial release
- Complete WordPress theme
- Sample pages and blog posts
- Database structure
- Documentation

## Contact

For questions or support regarding this theme:
- Email: admin@cleanfinish.com
- Website: http://cleanfinish.com

---

**Note:** Remember to change all default passwords and update contact information with your actual business details before going live!
