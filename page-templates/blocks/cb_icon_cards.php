<?php
/**
 * Template for displaying icon cards.
 *
 * @package cb-saascada2025
 */

?>
<section class="icon_cards">
    <div class="container-xl">
        <div class="row justify-content-center g-5">
            <?php
            while ( have_rows( 'cards' ) ) {
                the_row();
                $l = get_sub_field( 'link' );
                if ( is_array( $l ) ) {
                    $card_tag   = '<a href="' . esc_url( $l['url'] ) . '" target="' . esc_attr( $l['target'] ) . '" class="icon_cards__card">';
                    $card_close = '</a>';
                } else {
                    $card_tag   = '<div class="icon_cards__card">';
                    $card_close = '</div>';
                }
	            ?>
                <div class="col-sm-6 col-lg-4">
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?= $card_tag; ?>
                    <div class="icon_cards__icon_container">
                        <?= wp_get_attachment_image( get_sub_field( 'icon' ), 'large', false, array( 'class' => 'icon_cards__icon' ) ); ?>
                    </div>
                    <div class="icon_cards__inner">
                        <h2><?= esc_html( get_sub_field( 'title' ) ); ?></h2>
                        <div><?= wp_kses_post( get_sub_field( 'content' ) ); ?></div>
                        <div class="show-on-touch fw-bold text-end pt-3 mt-auto">Read More</div>
                    </div>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?= $card_close; ?>
                </div>
            	<?php
            }
            ?>
        </div>
    </div>
</section>