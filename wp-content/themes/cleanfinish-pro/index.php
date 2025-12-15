<?php
/**
 * The main template file - Blog listing
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<!-- Blog Hero -->
<section class="hero-section">
    <div class="hero-content">
        <h1>CleanFinish Blog</h1>
        <p class="tagline">Tips, Insights, and Best Practices for Property Managers</p>
    </div>
</section>

<!-- Blog Posts -->
<section class="content-section">
    <div class="blog-grid">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article class="blog-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('cleanfinish-blog-thumb', array('class' => 'blog-post-image')); ?>
                        </a>
                    <?php endif; ?>

                    <div class="blog-post-content">
                        <h2 class="blog-post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="blog-post-meta">
                            <?php echo get_the_date(); ?> | By <?php the_author(); ?>
                        </div>

                        <div class="blog-post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </article>
            <?php
            endwhile;

            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'cleanfinish-pro'),
                'next_text' => __('Next &raquo;', 'cleanfinish-pro'),
            ));

        else :
            ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                <h2>No posts found</h2>
                <p>Check back soon for cleaning tips and property management insights!</p>
            </div>
        <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
