<?php

// 链接菜单
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// 自定义头部支持
add_action( 'after_setup_theme', function () {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'block-templates' );
    add_theme_support( 'block-template-parts' );
    add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );
} );

add_action( 'init', function () {
	register_taxonomy( 'series', 'post', [
		'labels' => [
			'name' => '系列',
			'add_new_item' => '添加系列'
        ],
        'show_in_rest' => true,
        'public' => true,
        'hierarchical' => true
	] );
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
    wp_enqueue_script('highlight', get_template_directory_uri() . '/assets/theme.js', [], false, [
        'in_footer' => true
    ]);
} );

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