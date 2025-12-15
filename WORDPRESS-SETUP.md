# WordPress Setup Guide for CleanFinish

## ⚠️ CRITICAL: Page Setup Instructions

**Currently all pages show "no posts found" because the pages aren't created in WordPress yet.**

Follow these steps EXACTLY to fix your website:

---

## Step 1: Login to WordPress Admin

Go to: `https://cleanfinish.net/wp-admin`

---

## Step 2: Create All Pages

### Create Home Page

1. Go to **Pages → Add New**
2. Title: `Home`
3. **In the right sidebar under "Page Attributes":**
   - Find "Template" dropdown
   - Select: **"Home Page Template"**
4. Leave the content area EMPTY (the template has all the content)
5. Click **Publish**

### Create Services Page

1. Go to **Pages → Add New**
2. Title: `Services`
3. **Template:** Select **"Services Template"**
4. Leave content EMPTY
5. Click **Publish**

### Create About Page

1. Go to **Pages → Add New**
2. Title: `About`
3. **Template:** Leave as **"Default Template"** (it will auto-use page-about.php)
4. Leave content EMPTY
5. Click **Publish**

### Create Contact Page

1. Go to **Pages → Add New**
2. Title: `Contact`
3. **Template:** Select **"Contact Template"**
4. Leave content EMPTY
5. Click **Publish**

### Create Blog Page

1. Go to **Pages → Add New**
2. Title: `Blog`
3. **Template:** Leave as **"Default Template"**
4. Leave content EMPTY
5. Click **Publish**

---

## Step 3: Configure Reading Settings

**This is CRITICAL - it tells WordPress which pages to use:**

1. Go to **Settings → Reading**

2. Under "Your homepage displays":
   - Select: **"A static page"**

3. **Homepage:** Select **"Home"** from dropdown

4. **Posts page:** Select **"Blog"** from dropdown

5. Click **Save Changes**

---

## Step 4: Set Up Navigation Menu

1. Go to **Appearance → Menus**

2. Click **"create a new menu"**

3. Name it: `Primary Menu`

4. Click **Create Menu**

5. On the left under "Pages", check:
   - Home
   - Services
   - About
   - Blog
   - Contact

6. Click **Add to Menu**

7. Drag to arrange in this order:
   - Home
   - Services
   - About
   - Blog
   - Contact

8. Under "Menu Settings" at bottom:
   - Check: **"Primary Menu"**

9. Click **Save Menu**

---

## Step 5: Verify Pages Work

Visit each page to confirm they show content (not "no posts found"):

- ✅ **https://cleanfinish.net/** - Should show hero, stats, services cards
- ✅ **https://cleanfinish.net/services/** - Should show service details
- ✅ **https://cleanfinish.net/about/** - Should show company info
- ✅ **https://cleanfinish.net/contact/** - Should show contact form
- ✅ **https://cleanfinish.net/blog/** - Should show "No posts found" (until you add posts)

---

## Step 6: Add Blog Posts (Optional)

The blog content is in `sample-blog-posts.md`. To add them:

1. Go to **Posts → Add New**

2. Copy the title and content from sample-blog-posts.md

3. **Add a featured image:**
   - Click "Set featured image" in right sidebar
   - Upload an image or use Media Library
   - Recommended size: 800x600px

4. **Set category:**
   - Create categories: Property Management Tips, etc.
   - Check appropriate category

5. Click **Publish**

6. Repeat for all 5 blog posts

---

## Troubleshooting

### Problem: All pages still show "no posts found"

**Solution:** You didn't set the Reading Settings correctly.
- Go to Settings → Reading
- Make sure "A static page" is selected
- Make sure Homepage = "Home" and Posts page = "Blog"

### Problem: Pages show but no content/images

**Solution:** Wrong template selected.
- Edit the page
- Check "Page Attributes" → "Template"
- Make sure correct template is selected
- Update page

### Problem: Images don't show

**Solution:** Image fallbacks are in place.
- The templates use `onerror` to load Unsplash images automatically
- Or upload your own images per IMAGE-GUIDE.md

### Problem: Menu doesn't appear

**Solution:** Menu not assigned.
- Go to Appearance → Menus
- Make sure "Primary Menu" location is checked
- Save menu

---

## Important Notes

### ✅ Pages are NOT Posts

- **Pages** = Marketing pages (Home, Services, About, Contact)
- **Posts** = Blog articles

Don't create pages as posts or posts as pages!

### ✅ Templates Have All Content

The template files have all the HTML and content built-in:
- `template-home.php` - Full home page
- `template-services.php` - Full services page
- `page-about.php` - Full about page
- `template-contact.php` - Full contact page
- `index.php` - Blog listing (shows posts)

You don't need to add content to pages - just select the template!

### ✅ Blog is Separate

Only the Blog page should show posts. All other pages use their templates.

---

## Quick Checklist

Before asking for help, verify:

- [ ] Created all 5 pages (Home, Services, About, Contact, Blog)
- [ ] Selected correct template for each page
- [ ] Set Reading Settings (Static page, Home, Blog)
- [ ] Created and assigned Primary Menu
- [ ] Visited each page to confirm content shows

---

## Still Having Issues?

If pages still show "no posts found" after following ALL steps:

1. **Clear your browser cache** (Ctrl+Shift+Delete)
2. **Clear WordPress cache** if using caching plugin
3. **Check permalink settings:** Settings → Permalinks → Save Changes
4. **Verify theme is active:** Appearance → Themes → CleanFinish Pro should be active

---

## Next Steps After Setup

1. **Upload your logo:** Appearance → Customize → Site Identity → Select Logo
2. **Add real images:** Follow IMAGE-GUIDE.md
3. **Customize contact info:** Edit template-contact.php and footer.php
4. **Add blog posts:** Use content from sample-blog-posts.md
5. **Install contact form plugin:** Contact Form 7 or WPForms

---

**Need Help?** Make sure you completed ALL steps in order, especially Step 3 (Reading Settings).
