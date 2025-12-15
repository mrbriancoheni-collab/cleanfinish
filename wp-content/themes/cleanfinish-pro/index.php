<?php
/**
 * The main template file - Blog listing
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<!-- Blog Hero -->
<section class="hero" style="min-height: 400px;">
    <div class="container">
        <div class="hero-content" style="text-align: center;">
            <h1>CleanFinish Blog</h1>
            <p class="hero-subtitle">Tips, Insights, and Best Practices for Property Managers</p>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="section">
    <div class="container">
        <div class="blog-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    $category = get_the_category();
                    ?>
                    <article class="blog-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'blog-image')); ?>
                            </a>
                        <?php else : ?>
                            <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&h=600&fit=crop"
                                 alt="<?php the_title(); ?>"
                                 class="blog-image">
                        <?php endif; ?>

                        <div class="blog-content">
                            <?php if (!empty($category)) : ?>
                                <div class="blog-meta">
                                    <span class="blog-category"><?php echo esc_html($category[0]->name); ?></span>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            <?php endif; ?>

                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More →</a>
                        </div>
                    </article>
                <?php
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'cleanfinish-pro'),
                    'next_text' => __('Next →', 'cleanfinish-pro'),
                ));

            else :
                ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 4rem 2rem;">
                    <h2>No posts found</h2>
                    <p>Check back soon for cleaning tips and property management insights!</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Return Home</a>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
