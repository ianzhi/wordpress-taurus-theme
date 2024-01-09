<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> - <?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main class="container mt-3">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <header class="page-header">
                    <h1 class="page-title"><?php _e( 'Not Found', 'ianzhi-blog' ); ?></h1>
                </header>

                <div class="page-wrapper">
                    <div class="page-content">
                        <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'ianzhi-blog' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ianzhi-blog' ); ?></p>

                        <?php get_search_form(); ?>
                    </div><!-- .page-content -->
                </div><!-- .page-wrapper -->

            </div><!-- #content -->
        </div><!-- #primary -->
    </main>

    <?php get_footer(); ?>
</body>
</html>
