<?php
/**
 * Block template for CB Multi Block.
 *
 * @package cb-saascada2025
 */

$content_type = get_field( 'content_type' ) ?? 'Text';

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

?>
<section class="cb-multi-block <?= esc_attr( $bg . ' ' . $fg ); ?>">
	<div class="container-xl py-5">
		<?php
		if ( 'Video' === $content_type ) {
			$vimeo_id = get_field( 'vimeo_id' );
			if ( $vimeo_id ) {
				?>
		<div class="cb-multi-block__video">
			<div class="vimeo-embed ratio ratio-16x9" id="<?= esc_attr( get_field( 'vimeo_id' ) ); ?>" title="VIDEO"></div>
		</div>
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
			v.innerHTML = `<iframe src="https://${src}/${v.id}?autoplay=1" allowfullscreen></iframe>`;
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
			}
		} elseif ( 'Animation' === $content_type ) {
			$animation = get_field( 'html_animation' );
			if ( $animation ) {
				$file_path = get_attached_file( $animation['id'] );
				if ( $file_path && file_exists( $file_path ) ) {
					// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
					$html_content = file_get_contents( $file_path );
					if ( $html_content ) {
						// Prevent WordPress from encoding entities.
						remove_filter( 'the_content', 'wptexturize' );
						remove_filter( 'the_content', 'convert_chars' );

						// Remove header and footer sections.
						$html_content = preg_replace( '/<header\s+class=["\']header["\'][^>]*>.*?<\/header>/is', '', $html_content );
						$html_content = preg_replace( '/<div\s+class=["\']brand-footer["\'][^>]*>.*?<\/div>/is', '', $html_content );

						// Inject resize observer script.
						$resize_script = '<script>
							(function() {
								function sendHeight() {
									const height = Math.max(
										document.body.scrollHeight,
										document.body.offsetHeight,
										document.documentElement.clientHeight,
										document.documentElement.scrollHeight,
										document.documentElement.offsetHeight
									);
									window.parent.postMessage({ type: "iframe-resize", height: height }, "*");
								}
								
								// Send initial height
								if (document.readyState === "complete") {
									sendHeight();
								} else {
									window.addEventListener("load", sendHeight);
								}
								
								// Watch for content changes
								const observer = new ResizeObserver(sendHeight);
								observer.observe(document.body);
								
								// Also check periodically for dynamic content
								setInterval(sendHeight, 500);
							})();
						</script>';
						
						$html_content = str_replace( '</body>', $resize_script . '</body>', $html_content );

						// Encode for safe iframe injection.
						$html_content_encoded = htmlspecialchars( $html_content, ENT_QUOTES, 'UTF-8' );
						$iframe_id = 'iframe-' . uniqid();
						?>
		<div class="cb-multi-block__animation">
			<iframe 
				id="<?php echo esc_attr( $iframe_id ); ?>"
				srcdoc="<?php echo $html_content_encoded; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" 
				style="width: 100%; border: none; overflow: hidden; display: block;" 
				scrolling="no"
			></iframe>
			<script>
			(function() {
				const iframe = document.getElementById('<?php echo esc_js( $iframe_id ); ?>');
				window.addEventListener('message', function(e) {
					if (e.data.type === 'iframe-resize' && e.source === iframe.contentWindow) {
						iframe.style.height = e.data.height + 'px';
					}
				});
			})();
			</script>
		</div>
						<?php
					}
				}
			}
		} else { // default to text if not video or animation.
			?>
			<div class="cb-multi-block__text">
				<?= wp_kses_post( get_field( 'content' ) ); ?>
			</div>
			<?php
		}
		?>
	</div>
</section>