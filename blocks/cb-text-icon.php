<?php
/**
 * Template part for displaying a text icon block.
 *
 * @package cb-saascada2025
 */

$block_title = get_field( 'title' ) ?? null;
$subtitle    = get_field( 'subtitle' ) ?? null;
$content     = get_field( 'content' ) ?? null;
$block_link  = get_field( 'link' ) ?? null;
?>
<section class="text_icon">
    <div class="container-xl">
        <div class="row g-5">
            <div class="col-sm-2">
                <?= wp_get_attachment_image( get_field( 'icon' ), 'large' ); ?>
            </div>
            <div class="col-sm-10">
                <?php
                if ( $block_title ) {
                    ?>
                    <h2><?= esc_html( $block_title ); ?></h2>
                    <?php
                    if ( $subtitle ) {
                        ?>
                    <h3><?= esc_html( $subtitle ); ?></h3>
                        <?php
                    }
                }
                if ( $content ) {
                    echo wp_kses_post( $content );
                }
                if ( $block_link ) {
                    ?>
                    <a href="<?= esc_url( $block_link['url'] ); ?>" target="<?= esc_attr( $block_link['target'] ); ?>" class="button button-primary"><?= esc_html( $block_link['title'] ); ?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>