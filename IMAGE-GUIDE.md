# CleanFinish Pro - Image Guide

This guide shows where to place images for the CleanFinish Pro WordPress theme.

## Image Locations and Sizes

### Required Images

#### 1. Hero Background (`images/hero-bg.jpg`)
- **Size:** 1920x1080px
- **Subject:** Professional cleaning team or sparkling clean space
- **Suggested Sources:**
  - https://unsplash.com/photos/professional-cleaning-team
  - https://images.unsplash.com/photo-1581578731548-c64695cc6952
 - **Alternative:** Use a subtle pattern or gradient

#### 2. Service Images

**Move-Out Cleaning (`images/moveout-cleaning.jpg`)**
- **Size:** 800x600px
- **Subject:** Clean, empty apartment or house interior
- **Suggested:** https://images.unsplash.com/photo-1484154218962-a197022b5858

**Office Cleaning (`images/office-cleaning.jpg`)**
- **Size:** 800x600px
- **Subject:** Modern, clean office space
- **Suggested:** https://images.unsplash.com/photo-1497366216548-37526070297c

**Emergency Cleaning (`images/emergency-cleaning.jpg`)**
- **Size:** 800x600px
- **Subject:** Professional cleaning team in action
- **Suggested:** https://images.unsplash.com/photo-1628177142898-93e36e4e3a50

#### 3. About Page Images

**Team Photo 1 (`images/team-maria.jpg`)**
- **Size:** 400x400px (square)
- **Subject:** Professional headshot - Maria Rodriguez (or placeholder)
- **Suggested:** https://images.unsplash.com/photo-1573496359142-b8d87734a5a2

**Team Photo 2 (`images/team-james.jpg`)**
- **Size:** 400x400px (square)
- **Subject:** Professional headshot - James Patterson (or placeholder)
- **Suggested:** https://images.unsplash.com/photo-1560250097-0b93528c311a

**Team Photo 3 (`images/team-sarah.jpg`)**
- **Size:** 400x400px (square)
- **Subject:** Professional headshot - Sarah Chen (or placeholder)
- **Suggested:** https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e

**Team at Work (`images/team-work.jpg`)**
- **Size:** 1200x800px
- **Subject:** Team working together
- **Suggested:** https://images.unsplash.com/photo-1600880292203-757bb62b4baf

#### 4. Testimonial Images

**Client 1 (`images/client-1.jpg`)**
- **Size:** 200x200px (square)
- **Subject:** Professional business person
- **Suggested:** https://images.unsplash.com/photo-1573496359142-b8d87734a5a2

**Client 2 (`images/client-2.jpg`)**
- **Size:** 200x200px (square)
- **Subject:** Professional business person
- **Suggested:** https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d

**Client 3 (`images/client-3.jpg`)**
- **Size:** 200x200px (square)
- **Subject:** Professional business person
- **Suggested:** https://images.unsplash.com/photo-1580489944761-15a19d654956

#### 5. Blog Images

**Blog Post Thumbnails (`images/blog-*.jpg`)**
- **Size:** 800x600px each
- **Subject:** Relevant to blog topic (cleaning, property management)
- **Naming:** blog-1.jpg, blog-2.jpg, blog-3.jpg, etc.
- **Suggested:**
  - Cleaning checklist: https://images.unsplash.com/photo-1484154218962-a197022b5858
  - Property management: https://images.unsplash.com/photo-1560518883-ce09059eeffa
  - Office space: https://images.unsplash.com/photo-1497366216548-37526070297c

#### 6. Additional Assets

**Logo (`images/logo.png`)**
- **Size:** 200x60px (transparent PNG)
- **Subject:** CleanFinish company logo
- **Note:** Create or upload your actual logo

**CTA Background (`images/cta-bg.jpg`)**
- **Size:** 1920x600px
- **Subject:** Cleaning supplies, sparkling surfaces
- **Suggested:** https://images.unsplash.com/photo-1563453392212-326f5e854473

**Contact Background (`images/contact-bg.jpg`)**
- **Size:** 1920x1080px
- **Subject:** Office or contact-related imagery
- **Suggested:** https://images.unsplash.com/photo-1423666639041-f56000c27a9a

## Quick Setup: Download Free Stock Photos

### Using Unsplash (Free, No Attribution Required)

```bash
# Create images directory
cd wp-content/themes/cleanfinish-pro/images/

# Download hero image
curl -L "https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1920" -o hero-bg.jpg

# Download service images
curl -L "https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800" -o moveout-cleaning.jpg
curl -L "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800" -o office-cleaning.jpg
curl -L "https://images.unsplash.com/photo-1628177142898-93e36e4e3a50?w=800" -o emergency-cleaning.jpg

# Download team photos
curl -L "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400" -o team-maria.jpg
curl -L "https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400" -o team-james.jpg
curl -L "https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400" -o team-sarah.jpg

# Download testimonial/client photos
curl -L "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200" -o client-1.jpg
curl -L "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200" -o client-2.jpg
curl -L "https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200" -o client-3.jpg

# Download blog images
curl -L "https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800" -o blog-1.jpg
curl -L "https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800" -o blog-2.jpg
curl -L "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800" -o blog-3.jpg
curl -L "https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800" -o blog-4.jpg
curl -L "https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800" -o blog-5.jpg

# Download CTA background
curl -L "https://images.unsplash.com/photo-1563453392212-326f5e854473?w=1920" -o cta-bg.jpg
```

## Using WordPress Media Library

Instead of placing images in the theme folder, you can upload images to the WordPress Media Library and update the template files with the correct WordPress image URLs.

### Steps:

1. **Upload Images**
   - Go to WordPress Admin > Media > Add New
   - Upload all your images
   - Note the image IDs or URLs

2. **Update Template Files**
   - Replace `<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg`
   - With: `<?php echo wp_get_attachment_url(IMAGE_ID); ?>`

## Image Optimization Tips

1. **Compress Images** - Use TinyPNG or ImageOptim before uploading
2. **Use WebP Format** - Better compression, faster loading
3. **Lazy Loading** - WordPress handles this automatically for newer versions
4. **Responsive Images** - WordPress creates multiple sizes automatically
5. **CDN** - Consider using a CDN for faster global delivery

## Placeholder Images

If you don't have images ready, the theme will work with:
- Gradient backgrounds (already in CSS)
- Placeholder.com URLs: `https://via.placeholder.com/800x600/1a365d/ffffff?text=Your+Service`
- Unsplash random: `https://source.unsplash.com/800x600/?cleaning,office`

## Where Images Are Used

### Home Page
- Hero background
- Service card images (3)
- Testimonial photos (3)
- Stats section background (optional)

### Services Page
- Page header background
- Individual service images (3-6)
- Before/after photos (optional)

### About Page
- Team member photos (3+)
- Company history photo
- Office/team photos

### Contact Page
- Header background
- Map/location image (optional)

### Blog
- Featured images for each post
- In-content images

## Custom Logo

To add your logo:

1. **In WordPress Admin:**
   - Go to Appearance > Customize
   - Click "Site Identity"
   - Click "Select Logo"
   - Upload your logo (recommended: PNG, 200x60px)

2. **The header.php will automatically use it**

## Need Help?

- Free stock photos: https://unsplash.com, https://pexels.com
- Image compression: https://tinypng.com
- Logo creation: https://canva.com (free tier available)
- Professional photos: Consider hiring a local photographer for authentic team/service photos

---

**Note:** All Unsplash images are free to use without attribution, but using your own professional photography will make your website more authentic and trustworthy.
