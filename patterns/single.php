<?php
/**
 * Title: single
 * Slug: leaf-blog/single
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","area":"uncategorized"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
<main class="wp-block-group" style="margin-top:0"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/forest.jpg","id":151,"dimRatio":10,"minHeight":250,"minHeightUnit":"px","contentPosition":"center center","align":"center","style":{"color":[]},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover aligncenter" style="min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-10 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-151" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/forest.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","level":1} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-white-color has-text-color has-link-color"><!-- wp:post-terms {"term":"category","prefix":"分类："} /-->

<!-- wp:post-date /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:block {"ref":238} /-->

<!-- wp:columns {"style":{"border":{"radius":"5px"}},"backgroundColor":"white"} -->
<div class="wp-block-columns has-white-background-color has-background" style="border-radius:5px"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:post-navigation-link {"textAlign":"center","type":"previous","showTitle":true,"linkLabel":true,"arrow":"chevron","style":{"layout":{"selfStretch":"fit","flexSize":null}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:post-navigation-link {"textAlign":"center","showTitle":true,"linkLabel":true,"arrow":"chevron"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"border":{"radius":"5px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:5px"><!-- wp:comments {"tagName":"section"} -->
<section class="wp-block-comments"><!-- wp:comments-title /-->

<!-- wp:comment-template -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"40px"} -->
<div class="wp-block-column" style="flex-basis:40px"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:comment-author-name {"fontSize":"small"} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:comment-date {"fontSize":"small"} /-->

<!-- wp:comment-edit-link {"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:comment-content /-->

<!-- wp:comment-reply-link {"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:comment-template -->

<!-- wp:comments-pagination /-->

<!-- wp:post-comments-form /--></section>
<!-- /wp:comments --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"uncategorized"} /-->