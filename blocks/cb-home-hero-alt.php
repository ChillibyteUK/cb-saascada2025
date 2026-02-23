<?php
/**
 * Block template for CB Home Hero Alt.
 *
 * @package cb-saascada2025
 */

?>
<section class="home-hero-alt py-5">
	<img fetchpriority="high" decoding="async" width="1801" height="763" src="/wp-content/uploads/2025/02/home-hero.jpg" class="home-hero-alt__bg" alt="">
	<div class="home-hero-alt__overlay"></div>
	<div class="container-xl">
		<div class="row g-5">
			<div class="col-md-6">
				<h1 class="home-hero-alt__title" id="hero-title"><?= esc_html( get_field( 'title' ) ); ?></h1>
				<div class="home-hero-alt__content mb-4"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
				<div class="home-hero-alt__slider">
					<div class="splide" id="partners-slider-hero">
						<div class="splide__track">
							<ul class="splide__list">
								<?php
								$partners = get_field( 'partners' );
								foreach ( $partners as $partner ) {
									?>
								<li class="splide__slide">
									<?= get_the_post_thumbnail( $partner, 'medium', array( 'class' => 'home-hero-alt__partner-logo' ) ); ?>
								</li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/dna.svg" alt="" class="home-hero-alt__dna" width="692.78" height="742.34">
			</div>
		</div>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
		?>
<style>
.home-hero-alt__title {
	visibility: hidden;
}
.home-hero-alt__title.is-ready {
	visibility: visible;
}
.home-hero-alt__title .word-wrap {
	display: inline-block;
	overflow: hidden;
	vertical-align: top;
	padding-bottom: 0.2em;
	margin-bottom: -0.2em;
}
.home-hero-alt__title .word {
	display: inline-block;
	transform: translateY(100%);
}
.home-hero-alt__partner-logo {
	filter: grayscale(100%);
	transition: filter 0.3s ease;
	background: white;
	padding: 1rem;
	border-radius: 0.5rem;
}
.home-hero-alt__partner-logo:hover {
	filter: grayscale(0%);
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const title = document.getElementById('hero-title');
	if (!title) return;
	
	// Split text into words
	const text = title.textContent;
	const words = text.split(' ');
	
	// Clear and rebuild with wrapped words
	title.innerHTML = '';
	words.forEach((word, index) => {
		const wordWrap = document.createElement('span');
		wordWrap.className = 'word-wrap';
		
		const span = document.createElement('span');
		span.className = 'word';
		span.textContent = word;
		
		wordWrap.appendChild(span);
		title.appendChild(wordWrap);
		
		// Add space after each word except the last
		if (index < words.length - 1) {
			title.appendChild(document.createTextNode(' '));
		}
	});
	
	// Show title now that it's processed
	title.classList.add('is-ready');
	
	// Animate words upward with clip mask
	gsap.to('.home-hero-alt__title .word', {
		y: 0,
		duration: 0.8,
		stagger: 0.1,
		ease: 'power3.out'
	});
	
	// Rotate DNA SVG infinitely
	const dna = document.querySelector('.home-hero-alt__dna');
	if (dna) {
		gsap.to(dna, {
			rotation: 360,
			duration: 20,
			ease: 'none',
			repeat: -1
		});
	}
	
	// Initialize partners slider
	const partnersSlider = document.getElementById('partners-slider-hero');
	if (partnersSlider) {
		new Splide('#partners-slider-hero', {
			type: 'loop',
			drag: 'free',
			focus: 'center',
			perPage: 6,
			gap: '1rem',
			arrows: false,
			pagination: false,
			autoScroll: {
				speed: 1,
				pauseOnHover: false,
			},
			breakpoints: {
				768: { perPage: 2 },
				480: { perPage: 1 }
			}
		}).mount(window.splide.Extensions);
	}
});
</script>
		<?php
	}
);
