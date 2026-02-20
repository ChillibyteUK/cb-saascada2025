<?php
/**
 * Block template for CB Text Image Slider.
 *
 * @package cb-saascada2025
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$background = get_field( 'background' ) ?? null;

?>
<section class="text-image-slider <?= esc_attr( $bg . ' ' . $fg ); ?>">
	<?php
	if ( $background ) {
		echo wp_get_attachment_image( $background, 'full', false, array( 'class' => 'text-image-slider__bg' ) );
	}
	?>
	<div class="container-xl py-5">
		<?php if ( have_rows( 'slides' ) ) : ?>
			<div class="splide" id="text-image-slider-<?= esc_attr( $block['id'] ); ?>">
				<div class="splide__track">
					<ul class="splide__list">
						<?php
						while ( have_rows( 'slides' ) ) {
							the_row();
							$image     = get_sub_field( 'image' );
							$content   = get_sub_field( 'content' );
							$mime_type = $image ? get_post_mime_type( $image ) : '';
							$is_image  = in_array( $mime_type, array( 'image/jpeg', 'image/png' ), true );
							?>
							<li class="splide__slide">
								<div class="row justify-content-center mx-5">
									<?php
									if ( $is_image ) {
										?>
										<div class="col-md-6">
											<?php
											if ( $image ) {
												echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'text-image-slider__image' ) );
											}
											?>
										</div>
										<div class="col-md-6 text-image-slider__content">
											<?php
											if ( $content ) {
												?>
												<div class="text-content">
													<?= wp_kses_post( $content ); ?>
												</div>
												<?php
											}
											?>
										</div>
										<?php
									}
									else {
										?>
										<div class="col-md-8">
											<?php
											if ( $image ) {
												// if not an image, it's an icon.
												echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'text-image-slider__icon' ) );
											}
											if ( $content ) {
												?>
												<div class="text-content">
													<?= wp_kses_post( $content ); ?>
												</div>
												<?php
											}
											?>
										</div>
										<?php
									}
									?>
								</div>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
				<ul class="splide__pagination"></ul>
			</div>

			<script>
			document.addEventListener('DOMContentLoaded', function() {
				new Splide('#text-image-slider-<?= esc_js( $block['id'] ); ?>', {
					type: 'loop',
					perPage: 1,
					perMove: 1,
					arrows: true,
					pagination: true,
					gap: '1rem'
				}).mount();
			});
			</script>
		<?php endif; ?>
	</div>
</section>