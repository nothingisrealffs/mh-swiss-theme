<?php get_header(); ?>

<main id="main-content" class="site-main">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <p class="entry-meta">
                <span class="posted-on"><?php echo get_the_date(); ?></span>
                <span class="byline"> by <?php the_author(); ?></span>
            </p>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="entry-thumbnail">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>
    </article>
<?php
    endwhile;
?>
<?php the_posts_pagination( array(
    'prev_text' => __( 'Previous', 'mh-swiss-theme' ),
    'next_text' => __( 'Next', 'mh-swiss-theme' ),
) ); ?>
<?php
else :
    echo '<p>' . esc_html__( 'Sorry, no posts found.', 'mh-swiss-theme' ) . '</p>';
endif;
?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
