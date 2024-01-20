<footer class="mt-3 bg-light py-3">
    <div class="text-center">
        <a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
        &COPY;
        <?php echo date('Y'); ?>
    </div>

    <div class="mt-1 text-center d-flex flex-col flex-column flex-md-row justify-content-center align-items-center">
        <?php
            $url = get_theme_mod('gongxinbu_url', 'https://beian.miit.gov.cn/');
            $icp = get_theme_mod('icp');
            if (!empty($icp)) {
        ?>
        <a
            rel="noreferrer"
            target="_blank"
            href="<?php echo $url;  ?>"
            title="工信部备案查询系统"><?php echo $icp; ?></a>
        <?php } ?>
        <?php
            $gongan = get_theme_mod('gongan');
            if (!empty($gongan)) {
        ?>
            <a <?php if (!empty($icp)) { ?>class="ms-0 ms-md-3" <?php } ?>href="https://beian.mps.gov.cn/#/query/webSearch?code=11010602120068" rel="noreferrer" target="_blank">
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/gongan.png"
                    alt="京公网安备"
                    style="width: 1rem; height: 1rem;">
                <?php echo $gongan; ?>
            </a>
        <?php } ?>
    </div>
</footer>
<?php wp_footer(); ?>