<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5 pb-4">
    <div class="container">
        <div class="row g-4 g-lg-5 mb-5">
            <div class="col-xl-2 text-center text-xl-start mb-3">
                <img src="<?=get_stylesheet_directory_uri()?>/img/saascada-logo.svg" alt="SaaScada" class="footer__logo">
                <?=do_shortcode('[social_icons class="mt-4 d-flex justify-content-between fs-500 mx-auto"]')?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <?= wp_nav_menu(array('theme_location' => 'footer_menu1', 'container_class' => 'footer__menu')) ?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <?= wp_nav_menu(array('theme_location' => 'footer_menu2', 'container_class' => 'footer__menu')) ?>
            </div>
            <div class="col-sm-6 col-xl-2 footer__address">
                <?=cb_list(get_field('contact_address','option'))?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="/contact/" class="button button-primary d-block">Contact Us</a>
                <div class="footer__contact">
                    <div>T: <?=do_shortcode('[contact_phone]')?></div>
                    <div>E: <?=do_shortcode('[contact_email]')?></div>
                </div>
            </div>
            <div class="col-xl-2 text-center">
                <img src="<?=get_stylesheet_directory_uri()?>/img/iso-logo.svg" alt="ISO 9001:2015 Certified" class="footer__iso">
            </div>
        </div>

        <div class="row g-2 g-lg-5 colophon">
            <div class="col-lg-8 text-center text-lg-start">
                &copy; <?= date('Y') ?> SaaScada Ltd. Registered in England no. 09146473. VAT no. 244 0730 34.
            </div>
            <div class="col-lg-4 text-end">
                <a href="/privacy/">Privacy</a> and <a href="/cookies/">Cookies</a> |
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb" title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>