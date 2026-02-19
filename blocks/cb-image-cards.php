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

$image_size = $number_of_cards <= 2 ? 'large' : 'full';

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
				<div class="image-cards__card">
					<?php
					$image = get_sub_field( 'image' );
					if ( $image ) {
						?>
					<div class="image-cards__image-wrapper">
						<?= wp_get_attachment_image( $image, $image_size, false, array( 'class' => 'image-cards__image' ) ); ?>
					</div>
						<?php
					}
					?>
					<div class="image-cards__content">
						<h2><?= esc_html( get_sub_field( 'title' ) ); ?></h2>
						<div><?= wp_kses_post( get_sub_field( 'content' ) ); ?></div>
						<?php
						$card_link = get_sub_field( 'link' );
						if ( $card_link ) {
							?>
							<a href="<?= esc_url( $card_link['url'] ); ?>" class="button button--sm w-100" target="<?= esc_attr( $card_link['target'] ); ?>">
								<?= esc_html( $card_link['title'] ); ?>
							</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
				<?php
			}
			?>
		</div>
    </div>
</section>