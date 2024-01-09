<footer class="mt-3 bg-light">
    <div class="container px-3 px-md-2 py-3 d-flex justify-content-center justify-content-md-between align-items-md-center">
        <div>
            <a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
            &COPY;
            <?php echo date('Y'); ?>
        </div>

        <?php
            $url = get_theme_mod('gongxinbu_url', 'https://beian.miit.gov.cn/');
            $icp = get_theme_mod('icp');
            if (!empty($icp)) {
        ?>
            <div>
                <a target="_blank" href="<?php echo $url;  ?>" title="工信部备案查询系统"><?php echo $icp; ?></a>
            </div>
        <?php } ?>
    </div>
</footer>
<?php wp_footer(); ?>