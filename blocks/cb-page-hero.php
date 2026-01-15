<?php
/**
 * Page Hero Template
 *
 * This template renders the hero section of a page, including background, title, content, and a call-to-action button.
 *
 * @package cb-saascada2025
 */

$bg       = get_field( 'background' ) ?? null;
$content  = get_field( 'content' ) ?? null;
$cta_link = get_field( 'cta' ) ?? null;
?>
<section class="page_hero">
    <?= wp_get_attachment_image( $bg, 'full', false, array( 'class' => 'page_hero__bg' ) ); ?>
    <div class="container-xl">
            <h1 class="page_hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
            <?php
            if ( $content ) {
                ?>
            <div class="page_hero__content"><?= wp_kses_post( $content ); ?></div>
                <?php
            }
            if ( $cta_link ) {
                ?>
            <a href="<?= esc_url( $cta_link['url'] ); ?>" target="<?= esc_attr( $cta_link['target'] ); ?>" class="button button-outline"><?= esc_html( $cta_link['title'] ); ?></a>
                <?php
            }
            ?>
    </div>
</section>
<section class="breadcrumbs py-4">
    <div class="container-xl">
        <?php
        if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb();
        }
    	?>
    </div>
</section>