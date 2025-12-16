<?php
/**
 * The template for displaying all pages
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<section class="section">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content" style="max-width: 900px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cleanfinish-pro'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>

        <?php
        endwhile;
        ?>
    </div>
</section>

<?php
get_footer();
