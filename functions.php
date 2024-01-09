<?php

// 链接菜单
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// 自定义头部支持
add_action( 'after_setup_theme', function () {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'block-templates' );
    add_theme_support( 'block-template-parts' );
    add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-header', [
        'default-image'      => get_template_directory_uri() . '/assets/images/forest.jpg',
        'default-text-color' => '#ffffff',
        'width'              => 1000,
        'height'             => 140,
        'flex-width'         => true,
        'flex-height'        => true,
    ] );
} );

add_action( 'init', function () {
	add_editor_style( 'editor-style.css' );

	register_taxonomy( 'series', 'post', [
		'labels' => [
			'name' => '系列',
			'add_new_item' => '添加系列'
        ],
        'show_in_rest' => true,
        'public' => true,
        'hierarchical' => true
	] );
    // flush_rewrite_rules();

    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' )
        )
    );

    if (!is_registered_sidebar('home')) {
        register_sidebar( [
            'id' => 'home',
            'name' => '首页侧边栏',
            'before_widget' => '<div class="card border-0 bg-light rounded mb-3"><div class="card-body">',
            'after_widget' => '</div></div>'
        ] );
    }

    if (!is_registered_sidebar('post')) {
        register_sidebar( [
            'id' => 'post',
            'name' => '文章页侧边栏',
            'before_widget' => '<div class="card border-0 bg-light rounded mb-3"><div class="card-body">',
            'after_widget' => '</div></div>'
        ] );
    }
} );

// 自定义配置项
add_action( 'customize_register', function ($wp_customize){
    $wp_customize->add_section('ianzhi_taurus_blog_settings', array(
        'title'    => __('页脚'),
        'priority' => 115,
    ));

    // 备案号
    $wp_customize->add_setting('icp', array(
        'default'  => ''
    ));
    $wp_customize->add_control('icp', array(
        'label'      => __('备案号', 'Taurus Blog'),
        'section'    => 'ianzhi_taurus_blog_settings',
        'settings'   => 'icp',
    ));

    // ICP链接跳转地址
    $wp_customize->add_setting('gongxinbu_url', array(
        'default'        => 'https://beian.miit.gov.cn/'
    ));
    $wp_customize->add_control('gongxinbu_url', array(
        'label'      => __('工信部备案网址', 'Taurus Blog'),
        'section'    => 'ianzhi_taurus_blog_settings',
        'settings'   => 'gongxinbu_url',
        'type'      => 'url'
    ));
} );

add_filter( 'post_thumbnail_html', 'my_post_thumbnail_html', 10, 5 );
function my_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ( empty( $html ) ) {
        $path = get_template_directory_uri() . '/assets/images/forest-2.jpg';

        $attrs = '';
        if (!empty($attr)) {
            if (is_string($attr)) {
                $attrs = $attr;
            }

            if (is_array($attr)) {
                foreach ($attr as $k => $v) {
                    $attrs .= " {$k}=\"{$v}\"";
                }
            }
        }

        $html = "<img src=\"{$path}\"{$attrs} />";
    }
    return $html;
}

add_action( 'wp_enqueue_scripts', function () {
    // bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap-5.3.0-alpha1/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap-5.3.0-alpha1/js/bootstrap.bundle.min.js', [], false, [
        'strategy'  => 'defer',
        'in_footer' => true
    ] );

    // 自定义样式
	wp_enqueue_style( 'style', get_stylesheet_uri() );
} );

function icon($name, $style = '') {
    $icons = [
        'folder' => '<svg t="1704425210241" ' . $size . ' viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10472" width="200" height="200"><path d="M426.666667 170.666667 170.666667 170.666667C123.733333 170.666667 85.333333 209.066667 85.333333 256l0 512c0 46.933333 38.4 85.333333 85.333333 85.333333l682.666667 0c46.933333 0 85.333333-38.4 85.333333-85.333333L938.666667 341.333333c0-46.933333-38.4-85.333333-85.333333-85.333333l-341.333333 0L426.666667 170.666667z" p-id="10473"></path></svg>',
        'time' => '<svg t="1704425289018" ' . $size . ' viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10612" width="200" height="200"><path d="M512 85.333333C277.333333 85.333333 85.333333 277.333333 85.333333 512s192 426.666667 426.666667 426.666667c234.666667 0 426.666667-192 426.666667-426.666667S746.666667 85.333333 512 85.333333zM512 853.333333c-187.733333 0-341.333333-153.6-341.333333-341.333333s153.6-341.333333 341.333333-341.333333c187.733333 0 341.333333 153.6 341.333333 341.333333S699.733333 853.333333 512 853.333333z" fill-opacity="0.9" p-id="10613"></path><path d="M533.333333 298.666667 469.333333 298.666667 469.333333 554.666667 691.2 691.2 725.333333 635.733333 533.333333 520.533333Z" fill-opacity="0.9" p-id="10614"></path></svg>',
        'views' => '<svg t="1704425368235" ' . $size . ' viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10753" width="200" height="200"><path d="M170.666667 512c0 93.866667 38.4 179.2 102.4 238.933333L170.666667 853.333333l256 0 0-256-93.866667 93.866667C285.866667 648.533333 256 584.533333 256 512c0-110.933333 72.533333-204.8 170.666667-243.2L426.666667 183.466667C281.6 221.866667 170.666667 354.133333 170.666667 512zM853.333333 170.666667l-256 0 0 256 93.866667-93.866667C738.133333 375.466667 768 439.466667 768 512c0 110.933333-72.533333 204.8-170.666667 243.2l0 89.6c145.066667-38.4 256-170.666667 256-328.533333 0-93.866667-38.4-179.2-102.4-238.933333L853.333333 170.666667z" p-id="10754"></path></svg>'
    ];

    return $icons[$name];
}

add_filter( 'nav_menu_item_attributes', function ($li_atts, $menu_item, $args, $depth) {
    $li_atts['class'] = 'nav-item';
    if ($menu_item->current_item_parent) {
        $li_atts['class'] .= ' dropdown';
    }
    return $li_atts;
}, 10, 4 );

add_filter( 'nav_menu_link_attributes', function ($atts, \WP_Post $menu_item, $args, $depth) {
    $atts['class'] = 'nav-link';
    if ( $menu_item->current ) {
        $atts['class'] .= ' active';
    }
    if ($menu_item->menu_item_parent == 0 && $menu_item->current_item_parent) {
        $atts['class'] .= ' dropdown-toggle';
        $atts['role'] = 'button';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['aria-expanded'] = 'false';
    }

    if ($menu_item->menu_item_parent > 0) {
        $atts['class'] = 'dropdown-item';
    }

    // echo '<pre>';
    // var_dump($menu_item);
    // echo '</pre>';
    return $atts;
}, 10, 4 );

add_filter( 'nav_menu_submenu_attributes', function ($atts, $args, $depth) {
    $atts['class'] = 'dropdown-menu';

    return $atts;
}, 10, 3 );

add_filter( 'nav_menu_submenu_css_class', function ($classes, $args, $depth) {
    $classes = [ 'collapse', 'navbar-collapse' ];
    return $classes;
}, 10, 3 );

function bootstrap_pagination() {
    global $wp_query, $paged;

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    if (!$paged) {
        $paged = 1;
    }

    ?>
        <div class="mt-3 d-grid d-md-block gap-2 gap-md-0 clearfix">
    <?php

    if ($paged > 1) {
        ?>
            <a class="btn btn-light float-none float-md-start" href="<?php echo get_pagenum_link($paged - 1); ?>">上一页</a>
        <?php
    }

    if ($paged < $wp_query->max_num_pages) {
        ?>
            <a class="btn btn-light float-none float-md-end" href="<?php echo get_pagenum_link($paged + 1); ?>">下一页</a>
        <?php
    }

    ?>
        </div>
    <?php
}

// function debug_rewrite_rules() {
//     global $wp, $template, $wp_rewrite;

//     echo '<pre>';
//     echo 'Request: ';
//     echo empty($wp->request) ? "None" : esc_html($wp->request) . PHP_EOL;
//     echo 'Matched Rewrite Rule: ';
//     echo empty($wp->matched_rule) ? None : esc_html($wp->matched_rule) . PHP_EOL;
//     echo 'Matched Rewrite Query: ';
//     echo empty($wp->matched_query) ? "None" : esc_html($wp->matched_query) . PHP_EOL;
//     echo 'Loaded Template: ';
//     echo basename($template);
//     echo '</pre>' . PHP_EOL;

//     echo '<pre>';
//     print_r($wp_rewrite->rules);
//     echo '</pre>';
// }

// add_action( 'wp_head', 'debug_rewrite_rules' );