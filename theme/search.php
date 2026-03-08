<?php get_header(); ?>
<main id="main" class="site-main">
    <header class="search-header">
        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mh-swiss-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>
    <?php if (have_posts()) : ?>
        <div class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="entry-meta">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </div>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <?php else : ?>
            <section class="no-posts">
                <p><?php esc_html_e( 'Sorry, no results found. Please try a different search.', 'mh-swiss-theme' ); ?></p>
            </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
                        
