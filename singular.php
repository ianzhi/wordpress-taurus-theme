<?php
// 更新文章查看次数
$views = get_post_meta( get_the_ID(), 'views', true ) ?: 0;
update_post_meta( get_the_ID(), 'views', $views + 1 );
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $tags = array_map(function ($item) { return $item->name; }, get_the_tags() ?: []); ?>
    <meta name="keywords" content="<?php if (count($tags) > 0) { echo implode(',', $tags); ?>,<?php } ?><?php the_title(); ?>">
    <meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <title>
        <?php the_title(); ?>|<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        <?php
            $description = esc_html( get_bloginfo( 'description' ) );
            if (!empty($description)) { echo ' - ' . $description; }
        ?>
    </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <?php $categories = get_the_category(); ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">首页</a></li>
                <?php foreach ($categories as $category) { ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo get_category_link($category); ?>" title="<?php echo $category->name; ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                <?php } ?>
                <!-- <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li> -->
            </ol>
        </nav>
    </div>

    <main class="container mt-3">
        <div class="row m-0 p-0">
            <div<?php if (is_active_sidebar('post')) { ?> class="col-12 col-md-9"<?php } ?>>
                <div class="bg-light rounded p-3 px-md-5">
                    <h2 class="d-block d-md-none"><?php the_title(); ?></h2>
                    <div class="mt-3 lh-base blog-content"><?php the_content(); ?></div>
                </div>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                ?>
            </div>

            <!-- sidebar -->
            <?php if ( is_active_sidebar('post') ) { ?>
                <div class="col-12 col-md-3">
                    <?php dynamic_sidebar('post');  ?>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php get_footer(); ?>
    <?php $uri = get_template_directory_uri(); ?>
    <script>
        const codeBlocks = document.querySelectorAll('pre.wp-block-code code')
        if (codeBlocks.length > 0) {
            const link = document.createElement('link')
            link.id = 'highlightcss'
            link.rel = 'stylesheet'
            link.href = '<?php echo $uri; ?>/assets/highlight/styles/vs2015.min.css'
            document.head.appendChild(link)

            const script = document.createElement('script')
            script.id = 'highlightjs'
            script.src = '<?php echo $uri; ?>/assets/highlight/highlight.min.js'
            document.body.appendChild(script)

            script.onload = function () {
                codeBlocks.forEach((el) => hljs.highlightElement(el) )
            }
        }
    </script>
</body>
</html>
