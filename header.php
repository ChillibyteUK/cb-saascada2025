<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-saascada2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/lexend-v23-latin-600.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/lexend-v24-latin-300.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
	if ( ! is_user_logged_in() ) {
    	if ( get_field( 'ga_property', 'options' ) ) {
        	?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>'
            );
    </script>
        	<?php
    	}
    	if ( get_field( 'gtm_property', 'options' ) ) {
        	?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>'
            );
    </script>
    <!-- End Google Tag Manager -->
        	<?php
    	}
	}
    ?>
<!-- Lead Forensics Tracking Code -->
	<script type="text/javascript" src="https://secure.agile-company-365.com/js/264633.js"></script>
	<script type="text/javascript">
		function track_load (docloc, doctit) {
			var trk_sw = escape(screen.width).substring(0, 6);
			var trk_sh = escape(screen.height).substring(0, 6);
			var trk_ref = escape(document.referrer).substring(0, 1100);
			var trk_tit = escape(doctit).substring(0, 200);
			trk_tit = trk_tit.replace(/\%u00a0/g, '');
			trk_tit = trk_tit.replace(/\%u2122/g, '');
			trk_tit = trk_tit.replace(/\%u[0-9][0-9][0-9][0-9]/g, '');
			var trk_loc = escape(docloc).substring(0, 200);
			var trk_agn = escape(navigator.appName).substring(0, 100);
			var trk_agv = escape(navigator.userAgent + '.lfcd' + screen.colorDepth + '.lflng').substring(0, 1000);
			var trk_dom = escape(document.domain).substring(0, 200);
			var trk_user = '264633';
			var trk_cookie = '';
			var trk_guid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
				var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
				return v.toString(16);
			});
			var trk_img = 'https://secure.leadforensics.com/Track/Capture.aspx';
			var trk_link = trk_img + '?trk_user=' + trk_user + '&trk_sw=' + trk_sw + '&trk_sh=' + trk_sh + '&trk_ref=' + trk_ref + '&trk_tit=' + trk_tit + '&trk_loc=' + trk_loc + '&trk_agn=' + trk_agn + '&trk_agv=' + trk_agv + '&trk_dom=' + trk_dom + '&trk_guid=' + trk_guid + '&trk_cookie=NA';
			var preload = new Image();
			preload.src = trk_link;
		}
	</script>
	<!-- End Lead Forensics Tracking Code -->
    <?php
	if ( get_field( 'google_site_verification', 'options' ) ) {
		echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
	}
	if ( get_field( 'bing_site_verification', 'options' ) ) {
		echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
	}

	wp_head();
	?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "SaaScada",
            "url": "https://www.saascada.com.uk/",
            "logo": "https://www.saascada.com/wp-content/theme/cb-saascada2025/img/saascada-logo.jpg",
            "description": "Data-driven core banking",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "3rd Floor, 70 Gracechurch Street",
                "addressLocality": "London",
                "addressRegion": "England",
                "postalCode": "EC3V 0HR",
                "addressCountry": "UK"
            },
            "telephone": "+44 (0) 207 112 8529",
            "email": "enquiries@saascada.com"
        }
    </script>
</head>
<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
<!-- Lead Forensics Tracking Code (noscript) -->
<noscript><img alt="" src="https://secure.agile-company-365.com/264633.png" style="display:none;" /></noscript>
<!-- End Lead Forensics Tracking Code (noscript) -->
    <?php
	do_action( 'wp_body_open' );
	if ( ! is_user_logged_in() ) {
    	if ( get_field( 'gtm_property', 'options' ) ) {
        	?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    		<?php
		}
	}
	?>
<header id="wrapper-navbar" class="fixed-top p-0">
    <nav class="navbar navbar-expand-xl p-0">
        <div class="container-xl py-3 nav-top align-items-center">
            <div class="text-xl-center logo-container"><a href="/" class="logo" aria-label="SaaScada Homepage"></a></div>
            <div class="button-container d-xl-none">
                <button class="navbar-toggler mt-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <div class="collapse navbar-collapse align-items-start" id="navbar">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary_nav',
						'container_class' => 'w-100',
						'menu_class'      => 'navbar-nav justify-content-end',
						'fallback_cb'     => '',
						'menu_id'         => 'navbarr',
						'depth'           => 3,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
            </div>
        </div>
    </nav>
</header>