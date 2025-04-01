<?php
/**
 * Template part for displaying a text and video block.
 *
 * @package cb-saascada2025
 */

$txtcol = get_field( 'order' ) === 'Text/Video' ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$vidcol = get_field( 'order' ) === 'Text/Video' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';

$split = get_field( 'split' );

switch ( $split ) {
    case '50:50':
        $txtcolwidth = 'col-lg-6';
        $vidcolwidth = 'col-lg-6';
        break;
    case '60:40':
        $txtcolwidth = 'col-lg-4';
        $vidcolwidth = 'col-lg-8';
        break;
    case '40:60':
        $txtcolwidth = 'col-lg-8';
        $vidcolwidth = 'col-lg-4';
        break;
    default:
        // Fallback values if needed.
        $txtcolwidth = 'col-lg-6';
        $vidcolwidth = 'col-lg-6';
}

$vertical_align = get_field( 'vertical_align' );
$valign_class   = 'middle' === $vertical_align ? 'justify-content-center' : 'justify-content-start';
$vpadding       = in_array( 'Yes', (array) get_field( 'vertical_padding' ), true ) ? 'py-5' : 'py-4';
$bgcolour       = get_field( 'background' ) ? get_field( 'background' ) : 'white';
$ccolour        = get_field( 'content_colour' ) ? 'has-' . get_field( 'content_colour' ) . '-color' : '';
$csize          = get_field( 'content_size' ) ? get_field( 'content_size' ) : 'fs-400';

$img = '<img src="' . esc_url( get_stylesheet_directory_uri() ) . '/img/missing-image.png">';

$anchor = isset( $block['anchor'] ) ? $block['anchor'] : '';
if ( $anchor ) {
    ?>
<a id="<?= esc_attr( $anchor ); ?>" class="anchor"></a>
	<?php
}
?>
<section class="text_video <?= esc_attr( $vpadding ); ?> bg--<?= esc_attr( $bgcolour ); ?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?= esc_attr( $txtcolwidth ); ?> d-flex flex-column align-items-start <?= esc_attr( $valign_class ); ?> <?= esc_attr( $txtcol ); ?>">
                <?php
				if ( get_field( 'title' ) ?? null ) {
					?>
				<h2 class="mb-4 has-blue-400-color">
					<?= esc_html( get_field( 'title' ) ); ?>
				</h2>
					<?php
				}
				?>
                <div class="<?= esc_attr( $ccolour ); ?> <?= esc_attr( $csize ); ?>"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
            </div>
            <div
                class="<?= esc_attr( $vidcolwidth ); ?> <?= esc_attr( $vidcol ); ?> text_video__video d-flex flex-column align-items-center <?= esc_attr( $valign_class ); ?>">
                <div class="vimeo-embed ratio ratio-16x9" id="<?= esc_attr( get_field( 'vimeo_id' ) ); ?>" title="VIDEO"></div>
            </div>
        </div>
    </div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
    	?>
<script>
document.addEventListener('DOMContentLoaded', function() {
	const lazyVideos = document.querySelectorAll('.vimeo-embed, .youtube-embed');
  
	// Lazy load placeholder images
	lazyVideos.forEach(v => {
		const [poster, src] = v.classList.contains('vimeo-embed') ?
			[`vumbnail.com/${v.id}_large.jpg`, 'player.vimeo.com/video'] :
			[`i.ytimg.com/vi/${v.id}/hqdefault.jpg`, 'www.youtube.com/embed'];

		v.innerHTML = `<img src="https://${poster}" alt="${v.title}" aria-label="Play">`;

		v.children[0].addEventListener('click', () => {
			v.innerHTML = `<iframe allow="autoplay" src="https://${src}/${v.id}?autoplay=1" allowfullscreen></iframe>`;
			v.classList.add('video-loaded');
		});
  	});

	// Preload the video iframes in the background after the page has loaded
	window.addEventListener('load', function() {
		lazyVideos.forEach(v => {
      		const iframe = document.createElement('iframe');
    		iframe.src = v.classList.contains('vimeo-embed') ?
        		`https://player.vimeo.com/video/${v.id}` :
        		`https://www.youtube.com/embed/${v.id}`;
    		iframe.setAttribute('allowfullscreen', true);
      		iframe.style.display = 'none'; // Keep it hidden until user clicks

			v.appendChild(iframe);
    	});
  	});
});
</script>
	    <?php
	}
);
