<?php get_header(); ?>
<main id="main" class="site-main">
    <section class="error-404">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( '404 - Page Not Found', 'mh-swiss-theme' ); ?></h1>
        </header>
        <div class="page-content">
            <p><?php esc_html_e( 'Sorry, the page you are looking for does not exist. Please check the URL or return to the homepage.', 'mh-swiss-theme' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php esc_html_e( 'Return to Homepage', 'mh-swiss-theme' ); ?></a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
