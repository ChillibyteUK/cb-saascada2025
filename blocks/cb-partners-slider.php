<?php
/**
 * Partners Slider Template
 *
 * This template renders a slider for displaying partners.
 *
 * @package cb-saascada2025
 */

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$padding = get_field( 'block_padding' ) ?? 'py-5';
?>
<section class="partners_slider <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'partners_slider__bg' ) ); ?>
    <div class="container-xl <?= esc_attr( $padding ); ?>">
		<?php
		if ( get_field( 'title' ) ) {
			?>
        <h2><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}

		$partners = get_field( 'partners' );

    	if ( $partners ) {
			?>
		<div class="splide" id="partners-slider">
			<div class="splide__track">
				<ul class="splide__list">
					<?php
					foreach ( $partners as $partner ) {
						?>
						<li class="splide__slide">
							<?= get_the_post_thumbnail( $partner, 'large', false, array( 'class' => 'partners_slider__partner' ) ); ?>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
			<?php
    	}
    	?>
    </div>
</section>
<?php
$number_of_slides = get_field( 'number_of_slides' ) ?? 5;

add_action(
	'wp_footer',
	function () use ( $number_of_slides ) {
		$d = $number_of_slides;

		// Set responsive breakpoint values based on desktop slides.
		switch ( $d ) {
			case 5:
				$t = 3;
				$m = 1;
				break;
			case 8:
				$t = 4;
				$m = 1;
				break;
			case 10:
				$t = 5;
				$m = 2;
				break;
			default:
				$t = max( 1, intval( $d / 2 ) );
				$m = 1;
				break;
		}
        ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#partners-slider', {
        type: 'loop',
        autoplay: true,
        perPage: <?= esc_js( $d ); ?>,
        perMove: 1,
        interval: 2000,
        gap: '1rem',
        arrows: false,
        pagination: false,
        breakpoints: {
            768: { perPage: <?= esc_js( $t ); ?> },
            480: { perPage: <?= esc_js( $m ); ?> }
        }
    }).mount();
});
</script>
    	<?php
    }
);