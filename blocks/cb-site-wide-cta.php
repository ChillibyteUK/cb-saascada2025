<?php
/**
 * Site-wide Call-to-Action Block Template
 *
 * This template displays a site-wide call-to-action section.
 *
 * @package cb-saascada2025
 */

$cta_title   = get_query_var( 'cta_title', get_field( 'cta_title', 'option' ) ) ? get_query_var( 'cta_title', get_field( 'cta_title', 'option' ) ) : null;
$cta_content = get_query_var( 'cta_content', get_field( 'cta_content', 'option' ) ) ? get_query_var( 'cta_content', get_field( 'cta_content', 'option' ) ) : null;
$cta_link    = get_query_var( 'cta_link', get_field( 'cta_link', 'option' ) ) ? get_query_var( 'cta_link', get_field( 'cta_link', 'option' ) ) : null;
$cta_bg      = get_query_var( 'cta_background', get_field( 'cta_background', 'option' ) ) ? get_query_var( 'cta_background', get_field( 'cta_background', 'option' ) ) : null;
?>
<section class="site-wide_cta">
    <?= wp_get_attachment_image( $cta_bg, 'full', false, array( 'class' => 'site-wide_cta__bg' ) ); ?>
    <div class="container-xl py-5">
        <div class="row">
            <div class="col-md-7">
                <h2><?= esc_html( $cta_title ); ?></h2>
                <p><?= wp_kses_post( $cta_content ); ?></p>
                <a href="<?= esc_url( $cta_link['url'] ); ?>" target="<?= esc_attr( $cta_link['target'] ); ?>" class="button button-outline"><?= esc_html( $cta_link['title'] ); ?></a>
            </div>
        </div>
    </div>
</section>