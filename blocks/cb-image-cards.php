<?php
/**
 * Block template for CB Image Cards.
 *
 * @package cb-saascada2025
 */

$number_of_cards = get_field( 'number_of_cards' ) ?? 3;
$card_gap        = get_field( 'card_gap' ) ?? 'g-5';
$block_padding   = get_field( 'block_padding' ) ?? 'py-5';
$col_class       = 'col-md-' . ( 12 / $number_of_cards );

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

?>
<section class="image-cards <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl <?= esc_attr( $block_padding ); ?>">
		<div class="row <?= esc_attr( $card_gap ); ?>">
			<?php
			while ( have_rows( 'cards' ) ) {
				the_row();
				?>
			<div class="<?= esc_attr( $col_class ); ?>">
				<?php
				$image = get_sub_field( 'image' );
				if ( $image ) {
					echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'image-cards__image' ) );
				}
				?>
				<h3><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
				<div><?= wp_kses_post( get_sub_field( 'content' ) ); ?></div>
				<?php
				$card_link = get_sub_field( 'link' );
				if ( $card_link ) {
					?>
					<a href="<?= esc_url( $card_link['url'] ); ?>" class="btn btn-primary" target="<?= esc_attr( $card_link['target'] ); ?>">
						<?= esc_html( $card_link['title'] ); ?>
					</a>
					<?php
				}
				?>
			</div>
				<?php
			}
			?>
		</div>
    </div>
</section>