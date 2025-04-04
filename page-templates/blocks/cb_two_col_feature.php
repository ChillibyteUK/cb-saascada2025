<?php
/**
 * Template for the Two Column Feature block.
 *
 * @package cb-saascada2025
 */

?>
<section class="two_col_feature">
    <?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'two_col_feature__bg' ) ); ?>
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-12 mb-4">
                <h2><?= esc_html( get_field( 'title' ) ); ?></h2>
                <div class="fs-550"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
            </div>
            <div class="col-md-6">
                <h3 class="h4 mb-3"><?= esc_html( get_field( 'left_title' ) ); ?></h3>
                <?= wp_get_attachment_image( get_field( 'left_image' ), 'large' ); ?>
            </div>
            <div class="col-md-6">
                <h3 class="h4 mb-3"><?= esc_html( get_field( 'right_title' ) ); ?></h3>
                <?= wp_get_attachment_image( get_field( 'right_image' ), 'large' ); ?>
                <div class="pt-5">
                    <?= wp_kses_post( get_field( 'cta' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</section>