<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="<?php echo home_url() ?>" class="navbar-brand" title="<?php echo get_bloginfo('name') ?>"><?php echo get_bloginfo('name') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu( array(
                'theme_location' => 'header-menu',
                'container_id' => 'navbarSupportedContent',
                'container_class' => 'collapse navbar-collapse',
                'menu_class' => 'navbar-nav ms-auto mb-2 mb-md-0 text-center text-md-left'
            ) ); ?>
        </div>
    </nav>

    <div class="site-header container-fluid p-0 card text-bg-dark d-none d-md-block rounded-0">
        <img class="img-fluid" src="<?php header_image(); ?>" style="width: 100%;" alt="
            <?php if (is_home()) { ?>
                <?php bloginfo('name') ?>
            <?php } else if (is_archive()) { ?>
                <?php single_term_title() ?>
            <?php } else if (is_search()) { ?>
                搜索词：<?php the_search_query() ?>
            <?php } else { ?>
                <?php the_title() ?>
            <?php } ?>
        " />

        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
            <?php if (is_home()) { ?>
                <h1 class="card-title"><?php bloginfo('name') ?></h1>
                <p class="card-text mt-1"><?php bloginfo('description') ?></p>
            <?php } else if (is_archive()) { ?>
                <h1 class="card-title"><?php single_cat_title() ?></h1>
                <p class="card-text mt-1"><?php echo category_description() ?></p>
            <?php } else if (is_search()) { ?>
                <h1 class="card-title">搜索词：<?php the_search_query(); ?></h1>
            <?php } else { ?>
                <h1 class="card-title"><?php the_title(); ?></h1>
                <p class="card-text mt-1">
					<?php the_time( get_option( 'date_format' ) ); ?>
					<?php the_tags(); ?>
				</p>
            <?php } ?>
        </div>
    </div>

</header>