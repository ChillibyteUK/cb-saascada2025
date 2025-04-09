<?php
/**
 * Video Block Template
 *
 * This template renders a video block with optional background, title, and video player.
 *
 * @package cb-saascada2025
 */

$h     = get_field( 'heading_level' );
$hc    = get_field( 'heading_class' );
$pro   = get_field( 'video_provider' );
$uq    = random_str( 8 );
$width = get_field( 'width' );
?>
<!-- video -->
<section class="video py-5">
    <?php
	if ( get_field( 'show_background' ) ) {
    	?>
    <div class="overlay--dots"></div>
        <?php
	}
	?>
    <div class="container-lg text-center">
        <?php
    	if ( get_field( 'title' ) ) {
        	echo '<' . esc_attr( $h ) . ' class="mb-4 ' . esc_attr( $hc ) . '">' . esc_html( get_field( 'title' ) ) . '</' . esc_attr( $h ) . '>';
    	}
		?>
        <div class="video__container animated fadeIn <?= esc_attr( $width ); ?> mx-auto" id="vidimg<?= esc_attr( $uq ); ?>">
            <img src="<?= esc_url( get_vimeo_data_from_id( get_field( 'video_id' ), 'thumbnail_url' ) ); ?>" class="video__image">
            <div class="play">
                <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/icon__play.svg">
            </div>
        </div>
        <div class="ratio ratio-16x9 <?= esc_attr( $width ); ?> mx-auto" id="video<?= esc_attr( $uq ); ?>" style="display:none">
            <iframe
				id="vid<?= esc_attr( $uq ); ?>"
				src="<?= esc_url( 'https://player.vimeo.com/video/' . get_field( 'video_id' ) . '?byline=0&portrait=0' ); ?>"
				allow="fullscreen; picture-in-picture"
				webkitallowfullscreen
				mozallowfullscreen
				allowfullscreen
			></iframe>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    const vidImg = document.getElementById("vidimg<?= esc_attr( $uq ); ?>");
    const video = document.getElementById("video<?= esc_attr( $uq ); ?>");
    const iframe = document.getElementById("vid<?= esc_attr( $uq ); ?>");

    if (vidImg && video && iframe) {
        vidImg.addEventListener("click", function () {
            vidImg.style.transition = "opacity 0.2s ease-out";
            vidImg.style.opacity = "0";

            setTimeout(() => {
                vidImg.style.display = "none"; // Hide after fade out
                video.style.display = "block"; // Show video container
                iframe.src += "&autoplay=1"; // Append autoplay to iframe src
            }, 200); // Match fade-out duration
        });
    }
});
        </script>
    </div>
</section>
