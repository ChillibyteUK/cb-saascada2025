<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'                => 'cb_text_icon', 
            'title'               => __('CB Text Icon'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_text_icon.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_page_hero', 
            'title'               => __('CB Page Hero'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_page_hero.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_site-wide_cta', 
            'title'               => __('CB Site-Wide CTA'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_site-wide_cta.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_latest_posts', 
            'title'               => __('CB Latest Posts'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_latest_posts.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_logo_slider', 
            'title'               => __('CB Logo Slider'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_logo_slider.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_four_list_cards', 
            'title'               => __('CB Four List Cards'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_four_list_cards.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_text_video', 
            'title'               => __('CB Text Video'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_text_video.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_two_col_feature', 
            'title'               => __('CB Two Col Feature'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_two_col_feature.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_home_intro_cards', 
            'title'               => __('CB Home Intro Cards'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_home_intro_cards.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));

        acf_register_block_type(array(
            'name'                => 'cb_home_hero',
            'title'                => __('CB Home Hero'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'    => 'page-templates/blocks/cb_home_hero.php',
            'mode'    => 'edit',
            'supports' => array('mode' => false),
        ));
    }
}
add_action('acf/init', 'acf_blocks');


// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    // if ($name == 'yoast-seo/breadcrumbs') {
    //     $args['render_callback'] = 'modify_core_add_container';
    // }
    return $args;
}

function modify_core_add_container($attributes, $content)
{
    ob_start();
    // $class = $block['className'];
?>
    <div class="container-xl">
        <?= $content ?>
    </div>
<?php
    $content = ob_get_clean();
    return $content;
}
