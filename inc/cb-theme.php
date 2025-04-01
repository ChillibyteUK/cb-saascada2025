<?php
/**
 * CB Theme Functions
 *
 * This file contains theme-specific functions and customizations for the CB Saascada 2025 theme.
 *
 * @package CB_Saascada2025
 */

defined( 'ABSPATH' ) || exit;

require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';
require_once CB_THEME_DIR . '/inc/cb-news.php';
require_once CB_THEME_DIR . '/inc/cb-posttypes.php';
require_once CB_THEME_DIR . '/inc/cb-taxonomies.php';

// Remove unwanted SVG filter injection WP.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Removes the comment-reply.min.js script from the footer.
 */
function remove_comment_reply_header_hook() {
    wp_deregister_script( 'comment-reply' );
}
add_action( 'init', 'remove_comment_reply_header_hook' );


/**
 * Removes the Comments menu from the WordPress admin dashboard.
 */
function remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_menu' );


/**
 * Removes specific page templates from the available templates list.
 *
 * @param array $page_templates The list of available page templates.
 * @return array The modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset( $page_templates['page-templates/blank.php'], $page_templates['page-templates/empty.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php'] );
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );

/**
 * Removes support for specific post formats in the theme.
 */
function remove_understrap_post_formats() {
    remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}

/**
 * Initializes theme widgets and menus.
 *
 * This function registers navigation menus, unregisters sidebars, and sets up theme support for custom colors and editor color palette.
 */
function widgets_init() {

    register_nav_menus(
		array(
			'primary_nav'  => __( 'Primary Nav', 'cb-saascada2025' ),
			'footer_menu1' => __( 'Footer Nav 1', 'cb-saascada2025' ),
			'footer_menu2' => __( 'Footer Nav 2', 'cb-saascada2025' ),
	    )
	);

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => 'White',
                'slug'  => 'white',
                'color' => '#ffffff',
            ),
            array(
                'name'  => 'Dark',
                'slug'  => 'dark',
                'color' => '#333333',
            ),
            array(
                'name'  => 'Light',
                'slug'  => 'light',
                'color' => '#f4f4f4',
            ),
            array(
                'name'  => 'Grey 400',
                'slug'  => 'grey-400',
                'color' => '#666666',
            ),
            array(
                'name'  => 'Grey 200',
                'slug'  => 'grey-200',
                'color' => '#cccccc',
            ),
            array(
                'name'  => 'Blue 400',
                'slug'  => 'blue-400',
                'color' => '#11527F',
            ),
            array(
                'name'  => 'Teal 400',
                'slug'  => 'teal-400',
                'color' => '#0095AE',
            ),
            array(
                'name'  => 'Purple 400',
                'slug'  => 'purple-400',
                'color' => '#6F539A',
            ),
            array(
                'name'  => 'Turquoise 400',
                'slug'  => 'turquoise-400',
                'color' => '#00B1AE',
            ),
            array(
                'name'  => 'Amber 400',
                'slug'  => 'amber-400',
                'color' => '#FFA100',
            ),
        )
    );
}
add_action( 'widgets_init', 'widgets_init', 11 );


remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


/**
 * Registers a custom dashboard widget for the WordPress admin dashboard.
 *
 * This widget displays a custom message and contact link for Chillibyte support.
 */
function register_cb_dashboard_widget() {
	wp_add_dashboard_widget(
		'cb_dashboard_widget',
        'Chillibyte',
        'cb_dashboard_widget_display'
    );
}
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );

/**
 * Displays the content of the custom Chillibyte dashboard widget.
 *
 * This function outputs the HTML for the Chillibyte dashboard widget,
 * including an image, a contact button, and a message for the user.
 */
function cb_dashboard_widget_display() {
	?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;"
            src="<?= esc_url( get_stylesheet_directory_uri() . '/img/cb-full.jpg' ); ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@chillibyte.co.uk/">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Chillibyte!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
	<?php
}

// phpcs:disable
// add_filter('wpseo_breadcrumb_links', function( $links ) {
//     global $post;
//     if ( is_singular( 'post' ) ) {
//         $t = get_the_category($post->ID);
//         $breadcrumb[] = array(
//             'url' => '/guides/',
//             'text' => 'Guides',
//         );

//         array_splice( $links, 1, -2, $breadcrumb );
//     }
//     return $links;
// }
// );

// remove discussion metabox
// function cc_gutenberg_register_files()
// {
//     // script file
//     wp_register_script(
//         'cc-block-script',
//         get_stylesheet_directory_uri() . '/js/block-script.js', // adjust the path to the JS file
//         array('wp-blocks', 'wp-edit-post')
//     );
//     // register block editor script
//     register_block_type('cc/ma-block-files', array(
//         'editor_script' => 'cc-block-script'
//     ));
// }
// add_action('init', 'cc_gutenberg_register_files');
// phpcs:enable

/**
 * Filters the excerpt content.
 *
 * This function ensures that the excerpt content is returned as is
 * when in the admin area or when the post ID is not available.
 *
 * @param string $post_excerpt The post excerpt.
 * @return string The filtered post excerpt.
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    if ( is_admin() || ! get_the_ID() ) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

/**
 * Removes shortcodes from the content in search results.
 *
 * This function ensures that shortcodes are stripped from the content
 * when displaying search results.
 *
 * @param string $content The content to filter.
 * @return string The filtered content without shortcodes.
 */
function wpdocs_remove_shortcode_from_index( $content ) {
	if ( is_search() ) {
		$content = strip_shortcodes( $content );
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );

// GF really is pants.

/**
 * Updates the Gravity Forms submit button.
 *
 * This function modifies the Gravity Forms submit button to use a <button> element
 * instead of an <input> element, allowing for more flexible styling and structure.
 *
 * @param string $button_input The original button input HTML.
 * @param array  $form         The Gravity Forms form object.
 * @return string The modified button HTML.
 */
function wd_gf_update_submit_button( $button_input, $form ) {
    // Save attribute string to $button_match[1].
    preg_match( '/<input([^\/>]*)(\s\/)*>/', $button_input, $button_match );

    // remove value attribute (since we aren't using an input).
    $button_atts = str_replace( 'value=\'' . $form['button']['text'] . '\' ', '', $button_match[1] );

    // create the button element with the button text inside the button element instead of set as the value.
    return '<button ' . $button_atts . '><span>' . $form['button']['text'] . '</span></button>';
}
add_filter( 'gform_submit_button', 'wd_gf_update_submit_button', 10, 2 );


/**
 * Enqueues theme styles and scripts.
 *
 * This function registers and enqueues external styles and scripts
 * such as AOS animations and Splide.js for the theme.
 */
function cb_theme_enqueue() {
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1', 'all' );
    wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );
    wp_deregister_script( 'jquery' );
    wp_enqueue_style( 'splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css', array(), '4.1.3' );
    wp_enqueue_script( 'splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', array(), '4.1.3', true );
	// phpcs:disable
    // wp_enqueue_style('lightbox-stylesheet', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox-plus-jquery.min.js', array(), $the_theme->get('Version'), true);
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array(), $the_theme->get('Version'), true);
	// wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), null, true);
    // wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true);
	// phpcs:enable
}
add_action( 'wp_enqueue_scripts', 'cb_theme_enqueue' );


add_theme_support( 'disable-theme-editor' );

add_action(
	'admin_init',
	function () {
		if ( current_theme_supports( 'disable-theme-editor' ) ) {
			define( 'DISALLOW_FILE_EDIT', true );
		}
	}
);

// phpcs:disable
// function add_custom_menu_item($items, $args)
// {
//     if ($args->theme_location == 'primary_nav') {
//         $new_item = '<li class="menu-item menu-item-type-post_tyep menu-item-object-page nav-item"><a href="' . esc_url(home_url('/search/')) . '" class="nav-link" title="Search"><span class="icon-search"></span></a></li>';
//         $items .= $new_item;
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_items', 'add_custom_menu_item', 10, 2);
// phpcs:enable

/**
 * Extracts the first heading, introductory paragraphs, and the rest of the content from the given HTML content.
 *
 * This function parses the provided HTML content and separates it into three parts:
 * - The first heading (h1-h6).
 * - Introductory paragraphs following the first heading.
 * - The remaining content after the introductory paragraphs.
 *
 * @param string $content The HTML content to process.
 * @return array An associative array with keys:
 *               - 'first_heading': The first heading as HTML.
 *               - 'intro_paragraphs': The introductory paragraphs as HTML.
 *               - 'rest_content': The remaining content as HTML.
 */
function extract_intro_content( $content ) {
    $result = array(
        'first_heading'    => '',
        'intro_paragraphs' => '',
        'rest_content'     => '',
	);

    libxml_use_internal_errors( true );
    $doc = new DOMDocument();

    $map = array(
        0x80,
        0xFFFF, // Encode characters from 128 to 65535.
        0,
        0xFFFF, // Encode all characters.
	);

    $encoded_content = mb_encode_numericentity( $content, $map, 'UTF-8' );
    $doc->loadHTML( '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $encoded_content );

    libxml_clear_errors();

    $body = $doc->getElementsByTagName( 'body' )->item( 0 );
	 // phpcs:ignore;
    $children = $body->childNodes;

    $found_heading      = false;
    $collect_paragraphs = false;
    $rest_fragments     = array();

    foreach ( $children as $node ) {
        // Skip non-element nodes (e.g. text nodes, comments).
		// phpcs:ignore
        if ( $node->nodeType !== XML_ELEMENT_NODE ) {
            continue;
        }

		// phpcs:ignore
        $tag = $node->nodeName;

        if ( ! $found_heading && in_array( $tag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ), true ) ) {
            $result['first_heading'] = $doc->saveHTML( $node );
            $found_heading           = true;
            $collect_paragraphs      = true;
            continue;
        }

        if ( $collect_paragraphs ) {
            if ( 'p' === $tag ) {
                $result['intro_paragraphs'] .= $doc->saveHTML( $node );
                continue;
            } elseif ( in_array( $tag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ), true ) ) {
                // Stop collecting once the next heading is found.
                $collect_paragraphs = false;
            }
        }

        if ( ! $collect_paragraphs && $found_heading ) {
            $rest_fragments[] = $doc->saveHTML( $node );
        }
    }

    $result['rest_content'] = implode( '', $rest_fragments );
    return $result;
}
