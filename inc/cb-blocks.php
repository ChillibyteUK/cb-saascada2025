<?php
/**
 * File: cb-blocks.php
 * Description: Registers custom ACF blocks and modifies Gutenberg core blocks for the theme.
 * Author: Your Name
 * Theme: CB Saascada 2025
 *
 * @package CB_Saascada_2025
 */

/**
 * Registers custom ACF blocks for the theme.
 *
 * This function is used to define and register Advanced Custom Fields (ACF) blocks
 * that can be used within the WordPress block editor. Each block can have its own
 * settings, templates, and styles.
 *
 * @return void
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

        acf_register_block_type(
			array(
				'name'            => 'cb_buttons',
				'title'           => __( 'CB Buttons' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_buttons.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_icon_with_collapsing_text',
				'title'           => __( 'CB Icon with Collapsing Text' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_icon_with_collapsing_text.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_video',
				'title'           => __( 'CB Video' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_video.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_partners_slider',
				'title'           => __( 'CB Partners Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_partners_slider.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_icon_cards',
				'title'           => __( 'CB Icon Cards' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_icon_cards.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_hubspot_form',
				'title'           => __( 'CB Hubspot Form' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_hubspot_form.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_team_grid',
				'title'           => __( 'CB Team Grid' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_team_grid.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
        	)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_partners',
				'title'           => __( 'CB Partners' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_partners.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_text_icon',
				'title'           => __( 'CB Text Icon' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_text_icon.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_page_hero',
				'title'           => __( 'CB Page Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_page_hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_site-wide_cta',
				'title'           => __( 'CB Site-Wide CTA' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_site-wide_cta.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_latest_posts',
				'title'           => __( 'CB Latest Posts' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_latest_posts.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_logo_slider',
				'title'           => __( 'CB Logo Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_logo_slider.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_four_list_cards',
				'title'           => __( 'CB Four List Cards' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_four_list_cards.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
        	)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_text_video',
				'title'           => __( 'CB Text Video' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_text_video.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_text_image',
				'title'           => __( 'CB Text Image' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_text_image.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_two_col_feature',
				'title'           => __( 'CB Two Col Feature' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_two_col_feature.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_home_intro_cards',
				'title'           => __( 'CB Home Intro Cards' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_home_intro_cards.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode' => false,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_home_hero',
				'title'           => __( 'CB Home Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_home_hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode' => false,
				),
			)
		);
    }
}
add_action( 'acf/init', 'acf_blocks' );


/**
 * Modifies Gutenberg core block types.
 *
 * Adds a render callback to specific core blocks to wrap their content
 * in a custom container.
 *
 * @param array  $args Arguments for registering a block type.
 * @param string $name Name of the block type.
 * @return array Modified arguments for the block type.
 */
function core_image_block_type_args( $args, $name ) {
	if ( 'core/paragraph' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
    }
	if ( 'core/heading' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
    }
	if ( 'core/list' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
    }
	return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );

/**
 * Wraps the content of specific core blocks in a custom container.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block content.
 * @return string Modified block content wrapped in a container.
 */
function modify_core_add_container( $attributes, $content ) {
    ob_start();
	?>
    <div class="container-xl">
        <?= wp_kses_post( $content ); ?>
    </div>
	<?php
    $content = ob_get_clean();
    return $content;
}
