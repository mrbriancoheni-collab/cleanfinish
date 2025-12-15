<?php
/**
 * The template for displaying single blog posts
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<section class="content-section">
    <?php
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: 900px; margin: 0 auto;">
            <header class="entry-header" style="margin-bottom: 2rem;">
                <h1 class="section-title"><?php the_title(); ?></h1>

                <div style="text-align: center; color: #666; margin-bottom: 2rem;">
                    <?php echo get_the_date(); ?> | By <?php the_author(); ?>
                    <?php if (has_category()) : ?>
                        | Categories: <?php the_category(', '); ?>
                    <?php endif; ?>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: 2rem; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="entry-content" style="background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); line-height: 1.8; font-size: 1.1rem;">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'cleanfinish-pro'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <footer class="entry-footer" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #ddd;">
                <?php if (has_tag()) : ?>
                    <div style="margin-bottom: 1rem;">
                        <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                    </div>
                <?php endif; ?>

                <div style="text-align: center; margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-secondary">← Back to Blog</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Contact Us</a>
                </div>
            </footer>
        </article>

        <?php
        // Navigation between posts
        the_post_navigation(array(
            'prev_text' => '<span class="nav-subtitle">Previous:</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">Next:</span> <span class="nav-title">%title</span>',
        ));

    endwhile;
    ?>
</section>

<?php get_footer(); ?>
