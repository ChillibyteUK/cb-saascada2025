<?php
/**
 * Footer template for the SaaScada theme.
 *
 * @package cb-saascada2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5 pb-4">
    <div class="container">
        <div class="row gx-4 g-lg-2 g-xxl-5 mb-5">
            <div class="col-xl-2 text-center text-xl-start mb-3 pe-3">
                <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/saascada-logo.svg" alt="SaaScada" class="footer__logo">
                <?= do_shortcode( '[social_icons class="mt-4 d-flex justify-content-around fs-500 mx-auto"]' ); ?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <?=
				wp_nav_menu(
					array(
                	    'theme_location'  => 'footer_menu1',
                    	'container_class' => 'footer__menu',
                	)
				);
				?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <?=
				wp_nav_menu(
					array(
						'theme_location'  => 'footer_menu2',
						'container_class' => 'footer__menu',
					)
				);
				?>
            </div>
            <div class="col-sm-6 col-xl-2 footer__address mb-4">
                <?= wp_kses_post( cb_list( get_field( 'contact_address', 'option' ) ) ); ?>
            </div>
            <div class="col-sm-6 col-xl-2">
                <a href="/contact-us/" class="button button-primary fw-bold d-block">Contact Us</a>
                <div class="footer__contact">
                    <div>T: <?= do_shortcode( '[contact_phone]' ); ?></div>
                    <div>E: <?= do_shortcode( '[contact_email]' ); ?></div>
                </div>
            </div>
            <div class="col-xl-2 text-center">
                <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/iso-logo.svg" alt="ISO 9001:2015 Certified" class="footer__iso">
            </div>
        </div>

        <div class="row g-2 g-lg-5 colophon">
            <div class="col-lg-6 text-center text-lg-start">
                &copy; <?= esc_html( gmdate( 'Y' ) ); ?> SaaScada Ltd. Registered in England no. 09146473. VAT no. 244 0730 34.
            </div>
            <div class="col-lg-6 text-end d-flex justify-content-center justify-content-lg-end flex-wrap">
                <?php
                $slavery_statement = get_field( 'slavery_statement', 'options' );
                if ( ! empty( $slavery_statement ) ) {
                    ?>
                <a href="<?= esc_url( $slavery_statement ); ?>" target="_blank">Slavery &amp; Human Trafficking Statement</a> |
                    <?php
                }
				?>
                <a href="/corporate-social-responsibility-policy/">CSR Policy</a> |
                <a href="/terms/">Website Terms</a> |
                <a href="/privacy-policy/">Privacy &amp; Cookies</a> |
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb" title="Digital Marketing by Chillibyte" aria-hidden="true"></a>
            </div>
        </div>
</footer>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/26035630.js"></script>
<!-- End of HubSpot Embed Code -->
<?php wp_footer(); ?>
</body>

</html>