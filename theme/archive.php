<?php get_header(); ?>
<main id="main" class="site-main">
    <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'swiss-card' ); ?>>
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) : ?>
                        <span class="category-kicker">
                            <?php echo esc_html( $categories[0]->name ); ?>
                        </span>
                    <?php endif; ?>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="entry-meta">
                            <time datetime="<?php echo get_the_date( 'c' ); ?>">
                                <?php echo get_the_date( 'M j, Y' ); ?>
                            </time>
                        </div>
                    </header>

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>

                </article>

            <?php endwhile; ?>

        </div>
        <?php
        the_posts_pagination( array(
            'prev_text' => __( 'Previous', 'mh-swiss-theme' ),
            'next_text' => __( 'Next', 'mh-swiss-theme' ),
        ) );
        ?>
    <?php else : ?>
        <p class="no-posts"><?php esc_html_e( 'No posts found.', 'mh-swiss-theme' ); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
