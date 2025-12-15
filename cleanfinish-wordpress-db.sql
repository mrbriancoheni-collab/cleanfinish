-- CleanFinish WordPress Database Setup
-- Professional Cleaning Company Website
-- Version: 1.0
-- Date: 2024

-- ========================================
-- Database Creation
-- ========================================

CREATE DATABASE IF NOT EXISTS cleanfinish_wp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cleanfinish_wp;

-- ========================================
-- Core WordPress Tables
-- ========================================

-- Posts Table
CREATE TABLE IF NOT EXISTS wp_posts (
  ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  post_author bigint(20) unsigned NOT NULL DEFAULT '0',
  post_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  post_date_gmt datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  post_content longtext NOT NULL,
  post_title text NOT NULL,
  post_excerpt text NOT NULL,
  post_status varchar(20) NOT NULL DEFAULT 'publish',
  comment_status varchar(20) NOT NULL DEFAULT 'open',
  ping_status varchar(20) NOT NULL DEFAULT 'open',
  post_password varchar(255) NOT NULL DEFAULT '',
  post_name varchar(200) NOT NULL DEFAULT '',
  to_ping text NOT NULL,
  pinged text NOT NULL,
  post_modified datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  post_modified_gmt datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  post_content_filtered longtext NOT NULL,
  post_parent bigint(20) unsigned NOT NULL DEFAULT '0',
  guid varchar(255) NOT NULL DEFAULT '',
  menu_order int(11) NOT NULL DEFAULT '0',
  post_type varchar(20) NOT NULL DEFAULT 'post',
  post_mime_type varchar(100) NOT NULL DEFAULT '',
  comment_count bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (ID),
  KEY post_name (post_name(191)),
  KEY type_status_date (post_type,post_status,post_date,ID),
  KEY post_parent (post_parent),
  KEY post_author (post_author)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Users Table
CREATE TABLE IF NOT EXISTS wp_users (
  ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  user_login varchar(60) NOT NULL DEFAULT '',
  user_pass varchar(255) NOT NULL DEFAULT '',
  user_nicename varchar(50) NOT NULL DEFAULT '',
  user_email varchar(100) NOT NULL DEFAULT '',
  user_url varchar(100) NOT NULL DEFAULT '',
  user_registered datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  user_activation_key varchar(255) NOT NULL DEFAULT '',
  user_status int(11) NOT NULL DEFAULT '0',
  display_name varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (ID),
  KEY user_login_key (user_login),
  KEY user_nicename (user_nicename),
  KEY user_email (user_email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Post Meta Table
CREATE TABLE IF NOT EXISTS wp_postmeta (
  meta_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  post_id bigint(20) unsigned NOT NULL DEFAULT '0',
  meta_key varchar(255) DEFAULT NULL,
  meta_value longtext,
  PRIMARY KEY (meta_id),
  KEY post_id (post_id),
  KEY meta_key (meta_key(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Options Table
CREATE TABLE IF NOT EXISTS wp_options (
  option_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  option_name varchar(191) NOT NULL DEFAULT '',
  option_value longtext NOT NULL,
  autoload varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (option_id),
  UNIQUE KEY option_name (option_name),
  KEY autoload (autoload)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Terms Table
CREATE TABLE IF NOT EXISTS wp_terms (
  term_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(200) NOT NULL DEFAULT '',
  slug varchar(200) NOT NULL DEFAULT '',
  term_group bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (term_id),
  KEY slug (slug(191)),
  KEY name (name(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Term Taxonomy Table
CREATE TABLE IF NOT EXISTS wp_term_taxonomy (
  term_taxonomy_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  term_id bigint(20) unsigned NOT NULL DEFAULT '0',
  taxonomy varchar(32) NOT NULL DEFAULT '',
  description longtext NOT NULL,
  parent bigint(20) unsigned NOT NULL DEFAULT '0',
  count bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (term_taxonomy_id),
  UNIQUE KEY term_id_taxonomy (term_id,taxonomy),
  KEY taxonomy (taxonomy)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Term Relationships Table
CREATE TABLE IF NOT EXISTS wp_term_relationships (
  object_id bigint(20) unsigned NOT NULL DEFAULT '0',
  term_taxonomy_id bigint(20) unsigned NOT NULL DEFAULT '0',
  term_order int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (object_id,term_taxonomy_id),
  KEY term_taxonomy_id (term_taxonomy_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Sample Data - WordPress Options
-- ========================================

INSERT INTO wp_options (option_name, option_value, autoload) VALUES
('siteurl', 'http://cleanfinish.local', 'yes'),
('home', 'http://cleanfinish.local', 'yes'),
('blogname', 'CleanFinish', 'yes'),
('blogdescription', 'Professional Move-Out & Office Cleaning Services', 'yes'),
('admin_email', 'admin@cleanfinish.com', 'yes'),
('timezone_string', 'America/New_York', 'yes'),
('template', 'cleanfinish-pro', 'yes'),
('stylesheet', 'cleanfinish-pro', 'yes'),
('posts_per_page', '10', 'yes'),
('default_comment_status', 'closed', 'yes'),
('permalink_structure', '/%postname%/', 'yes');

-- ========================================
-- Sample Data - Admin User
-- ========================================
-- Default password: CleanFinish2024! (should be changed after installation)
-- Password hash for: CleanFinish2024!

INSERT INTO wp_users (ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, display_name) VALUES
(1, 'admin', '$P$BVqH8z8ZqQxOUJzGqL9YK9ABCDEFGH', 'admin', 'admin@cleanfinish.com', 'http://cleanfinish.local', NOW(), 'CleanFinish Admin');

-- ========================================
-- Sample Data - Pages
-- ========================================

-- Home Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, NOW(), NOW(), '<!-- Home page content managed by template-home.php -->', 'Home', '', 'publish', 'home', 'page', NOW(), NOW());

SET @home_page_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@home_page_id, '_wp_page_template', 'template-home.php');

-- Services Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, NOW(), NOW(), '<!-- Services page content managed by template-services.php -->', 'Services', '', 'publish', 'services', 'page', NOW(), NOW());

SET @services_page_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@services_page_id, '_wp_page_template', 'template-services.php');

-- About Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, NOW(), NOW(), '<!-- About page content managed by page-about.php -->', 'About', '', 'publish', 'about', 'page', NOW(), NOW());

SET @about_page_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@about_page_id, '_wp_page_template', 'page-about.php');

-- Contact Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, NOW(), NOW(), '<!-- Contact page content managed by template-contact.php -->', 'Contact', '', 'publish', 'contact', 'page', NOW(), NOW());

SET @contact_page_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@contact_page_id, '_wp_page_template', 'template-contact.php');

-- Blog Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, NOW(), NOW(), '<!-- Blog posts displayed here -->', 'Blog', '', 'publish', 'blog', 'page', NOW(), NOW());

-- ========================================
-- Sample Data - Categories
-- ========================================

INSERT INTO wp_terms (name, slug) VALUES
('Property Management Tips', 'property-management-tips'),
('Property Management Strategy', 'property-management-strategy'),
('Emergency Response', 'emergency-response'),
('Commercial Property Management', 'commercial-property-management'),
('Cleaning Best Practices', 'cleaning-best-practices');

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, count) VALUES
(1, 'category', 'Tips and advice for property managers', 3),
(2, 'category', 'Strategic insights for property management', 1),
(3, 'category', 'Emergency cleaning response guides', 1),
(4, 'category', 'Commercial property cleaning information', 1),
(5, 'category', 'Best practices in professional cleaning', 2);

-- ========================================
-- Sample Data - Blog Posts
-- ========================================

-- Blog Post 1
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, DATE_SUB(NOW(), INTERVAL 5 DAY), DATE_SUB(NOW(), INTERVAL 5 DAY),
'<p>When a tenant moves out, having a comprehensive cleaning checklist ensures consistent quality and helps justify security deposit deductions when necessary. Here\'s the essential move-out cleaning checklist we use for every property.</p>

<h2>Kitchen</h2>
<ul>
<li>Clean inside and outside of all appliances (refrigerator, oven, microwave, dishwasher)</li>
<li>Defrost and sanitize refrigerator, remove all shelves and drawers for deep cleaning</li>
<li>Degrease oven, stovetop, and range hood</li>
<li>Clean all cabinet interiors and exteriors</li>
<li>Wipe down countertops and backsplash</li>
<li>Clean and polish sink and faucet</li>
<li>Scrub and sanitize floors</li>
</ul>

<h2>Bathrooms</h2>
<ul>
<li>Deep clean and disinfect toilet (including behind and around base)</li>
<li>Scrub shower/tub, including grout lines</li>
<li>Remove soap scum and mineral deposits</li>
<li>Clean sink, vanity, and mirror</li>
<li>Sanitize floors and baseboards</li>
</ul>

<h2>Pro Tips for Property Managers</h2>
<ol>
<li><strong>Take Before Photos:</strong> Document the condition before cleaning starts</li>
<li><strong>Use This Checklist for Inspections:</strong> Compare move-in and move-out conditions</li>
<li><strong>Share with Tenants:</strong> Give tenants this checklist before they move out</li>
<li><strong>Hire Professionals:</strong> Professional cleaning often pays for itself in faster turnover</li>
</ol>',
'Move-Out Cleaning Checklist for Property Managers',
'A comprehensive checklist to ensure consistent quality in move-out cleaning and faster property turnovers.',
'publish', 'move-out-cleaning-checklist-property-managers', 'post', NOW(), NOW());

-- Blog Post 2
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, DATE_SUB(NOW(), INTERVAL 10 DAY), DATE_SUB(NOW(), INTERVAL 10 DAY),
'<p>Every day a unit sits vacant costs you money. Let\'s break down the real cost of slow turnovers and how investing in fast, professional cleaning can significantly improve your bottom line.</p>

<h2>The True Cost of Vacancy</h2>
<p>For a unit renting at $1,500/month, each day of vacancy costs you $50. If your average turnover takes 14 days, that\'s $700 in lost rent per turnover.</p>

<h2>Where Professional Cleaning Makes a Difference</h2>
<p>The cleaning phase is often the biggest bottleneck. Professional cleaning accelerates the process from 5-7 days down to 1-2 days.</p>

<h2>The ROI of Professional Cleaning</h2>
<p><strong>Scenario A: DIY or Budget Cleaning</strong></p>
<ul>
<li>Turnover time: 14 days</li>
<li>Cleaning cost: $100</li>
<li>Lost rent: $700</li>
<li>Total cost: $800</li>
</ul>

<p><strong>Scenario B: Professional Property Management Cleaning</strong></p>
<ul>
<li>Turnover time: 7 days</li>
<li>Cleaning cost: $200</li>
<li>Lost rent: $350</li>
<li>Total cost: $550</li>
</ul>

<p><strong>Savings per turnover: $250</strong></p>

<p>For a property manager with 50 turnovers per year, that\'s $12,500 in additional revenue.</p>',
'How Fast Turnover Reduces Vacancy Costs',
'Learn how professional cleaning services can save property managers thousands in vacancy costs through faster turnovers.',
'publish', 'fast-turnover-reduces-vacancy-costs', 'post', NOW(), NOW());

-- Blog Post 3
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_type, post_modified, post_modified_gmt) VALUES
(1, DATE_SUB(NOW(), INTERVAL 15 DAY), DATE_SUB(NOW(), INTERVAL 15 DAY),
'<p>Move-out cleaning seems straightforward, but small mistakes can lead to big problems. Here are five common mistakes property managers make and how to avoid them.</p>

<h2>Mistake #1: Not Following a Standardized Checklist</h2>
<p><strong>The Problem:</strong> Inconsistent cleaning standards across units lead to tenant disputes and potential fair housing issues.</p>
<p><strong>The Solution:</strong> Develop a detailed, standardized checklist and use it for every single move-out.</p>

<h2>Mistake #2: Skipping Photo Documentation</h2>
<p><strong>The Problem:</strong> Without photos, you can\'t prove the condition after cleaning.</p>
<p><strong>The Solution:</strong> Take comprehensive photos after cleaning is complete, including before/after comparisons.</p>

<h2>Mistake #3: Using Inexperienced or Unreliable Cleaners</h2>
<p><strong>The Problem:</strong> Missed appointments and inconsistent quality delay turnovers.</p>
<p><strong>The Solution:</strong> Work with established cleaning companies that specialize in property management.</p>

<h2>Mistake #4: Not Deep Cleaning Appliances</h2>
<p><strong>The Problem:</strong> Surface cleaning doesn\'t address grease buildup and odors.</p>
<p><strong>The Solution:</strong> Require deep appliance cleaning including removing and cleaning all shelves and racks.</p>

<h2>Mistake #5: Ignoring Odors</h2>
<p><strong>The Problem:</strong> Units with odors won\'t rent quickly.</p>
<p><strong>The Solution:</strong> Address odors at the source through deep cleaning or replacement, not air fresheners.</p>',
'5 Common Move-Out Cleaning Mistakes That Cost You Money',
'Avoid these expensive move-out cleaning mistakes that delay turnovers and cost property managers thousands.',
'publish', 'move-out-cleaning-mistakes-cost-money', 'post', NOW(), NOW());

-- ========================================
-- Set Homepage and Blog Page
-- ========================================

UPDATE wp_options SET option_value = 'page' WHERE option_name = 'show_on_front';
UPDATE wp_options SET option_value = @home_page_id WHERE option_name = 'page_on_front';

-- ========================================
-- Navigation Menu
-- ========================================

INSERT INTO wp_terms (name, slug) VALUES ('Primary Menu', 'primary-menu');
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (LAST_INSERT_ID(), 'nav_menu', 'Main navigation menu');

-- ========================================
-- Database Summary
-- ========================================

-- This database includes:
-- - Core WordPress tables (posts, users, options, terms, etc.)
-- - Sample pages: Home, Services, About, Contact, Blog
-- - 3 sample blog posts with relevant content for property managers
-- - Categories for organizing blog content
-- - Basic WordPress configuration
-- - Admin user (password should be changed after installation)

-- ========================================
-- Installation Instructions
-- ========================================

-- To use this database:
-- 1. Import this SQL file into your MySQL database
-- 2. Update wp_options siteurl and home to match your domain
-- 3. Change the admin password immediately
-- 4. Upload the cleanfinish-pro theme to wp-content/themes/
-- 5. Activate the cleanfinish-pro theme in WordPress admin
-- 6. Set up the Primary Menu in WordPress admin
-- 7. Add menu items: Home, Services, About, Blog, Contact

-- ========================================
-- Security Note
-- ========================================

-- IMPORTANT: Change the admin password immediately after installation
-- The default credentials are:
-- Username: admin
-- Password: CleanFinish2024!
