<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if (!is_home()) { ?>
            <?php single_term_title() ?>
            |
        <?php } ?>
        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        <?php
            $description = esc_html( get_bloginfo( 'description' ) );
            if (!empty($description)) { echo ' - ' . $description; }
        ?>
    </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main class="container mt-3">
        <div class="row">
            <div class="col-12<?php if (is_active_sidebar('home')) { ?> col-md-9<?php } ?>">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="card border-0 bg-light">
                            <div class="row p-3 align-items-start">
                                <div class="col-12 col-md-4 col-lg-3">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', [
                                            'class' => 'img-fluid rounded',
                                            'style' => 'width: 100%;',
                                            'alt' => get_the_title(),
                                            'title' => get_the_title()
                                        ]) ?>
                                    </a>
                                </div>

                                <div class="col-12 col-md-8 col-lg-9 mt-3 mt-md-0">
                                    <div class="card-body p-0">
                                        <h2 class="card-title p-0 mb-0 lh-base">
                                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <div class="text-secondary mt-1">
                                            <span class="d-inline-flex align-items-center mr-2">
                                                <svg t="1704425210241" class="mr-1" style="width: 1rem; height: 1rem" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10472" width="200" height="200"><path d="M426.666667 170.666667 170.666667 170.666667C123.733333 170.666667 85.333333 209.066667 85.333333 256l0 512c0 46.933333 38.4 85.333333 85.333333 85.333333l682.666667 0c46.933333 0 85.333333-38.4 85.333333-85.333333L938.666667 341.333333c0-46.933333-38.4-85.333333-85.333333-85.333333l-341.333333 0L426.666667 170.666667z" p-id="10473"></path></svg>
                                                <?php the_category(','); ?>
                                            </span>
                                            <span class="d-inline-flex align-items-center mr-2">
                                                <svg t="1704425289018" class="mr-1" style="width: 1rem; height: 1rem" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10612" width="200" height="200"><path d="M512 85.333333C277.333333 85.333333 85.333333 277.333333 85.333333 512s192 426.666667 426.666667 426.666667c234.666667 0 426.666667-192 426.666667-426.666667S746.666667 85.333333 512 85.333333zM512 853.333333c-187.733333 0-341.333333-153.6-341.333333-341.333333s153.6-341.333333 341.333333-341.333333c187.733333 0 341.333333 153.6 341.333333 341.333333S699.733333 853.333333 512 853.333333z" fill-opacity="0.9" p-id="10613"></path><path d="M533.333333 298.666667 469.333333 298.666667 469.333333 554.666667 691.2 691.2 725.333333 635.733333 533.333333 520.533333Z" fill-opacity="0.9" p-id="10614"></path></svg>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            <span class="d-inline-flex align-items-center mr-2">
                                                <svg t="1704425368235" class="mr-1" style="width: 1rem; height: 1rem" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10753" width="200" height="200"><path d="M170.666667 512c0 93.866667 38.4 179.2 102.4 238.933333L170.666667 853.333333l256 0 0-256-93.866667 93.866667C285.866667 648.533333 256 584.533333 256 512c0-110.933333 72.533333-204.8 170.666667-243.2L426.666667 183.466667C281.6 221.866667 170.666667 354.133333 170.666667 512zM853.333333 170.666667l-256 0 0 256 93.866667-93.866667C738.133333 375.466667 768 439.466667 768 512c0 110.933333-72.533333 204.8-170.666667 243.2l0 89.6c145.066667-38.4 256-170.666667 256-328.533333 0-93.866667-38.4-179.2-102.4-238.933333L853.333333 170.666667z" p-id="10754"></path></svg>
                                                <?php echo get_post_meta( get_the_ID(), 'views', true ) ?: 0; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php bootstrap_pagination(); ?>
                <?php endif; ?>
            </div>

            <!-- sidebar -->
            <?php if ( is_active_sidebar('home') ) { ?>
                <div class="col-12 col-md-3 mt-3 mt-md-0">
                    <?php dynamic_sidebar('home');  ?>
                </div>
            <?php } ?>
        </div>

    </main>

    <?php get_footer(); ?>
</body>
</html>
