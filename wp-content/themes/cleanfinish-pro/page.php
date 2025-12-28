<?php
/**
 * The template for displaying all pages
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Page Hero -->
<section class="hero" style="min-height: 400px;">
    <div class="container">
        <div class="hero-content" style="text-align: center;">
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p class="hero-subtitle"><?php the_excerpt(); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Page Content -->
<section class="section">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div class="page-featured-image" style="margin-bottom: 3rem; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="max-width: 900px; margin: 0 auto; line-height: 1.8; font-size: 1.1rem; color: #334155;">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links" style="margin-top: 2rem; padding: 1.5rem; background: #f8fafc; border-radius: 8px;">' . esc_html__('Pages:', 'cleanfinish-pro'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>
    </div>
</section>

<!-- Page CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Need Professional Cleaning Services?</h2>
            <p>Contact us today for a free quote and fast, reliable service.</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Get a Free Quote</a>
                <a href="tel:2792648539" class="btn btn-secondary">Call (279) 264-8539</a>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer();
