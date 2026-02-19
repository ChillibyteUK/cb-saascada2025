<?php
/**
 * Block template for CB Home Hero Alt.
 *
 * @package cb-saascada2025
 */

?>
<section class="home-hero-alt py-5">
	<img fetchpriority="high" decoding="async" width="1801" height="763" src="http://saascada.local/wp-content/uploads/2025/02/home-hero.jpg" class="home-hero-alt__bg" alt="">
	<div class="home-hero-alt__overlay"></div>
	<div class="container-xl">
		<div class="row g-5">
			<div class="col-md-6">
				<h1 class="home-hero-alt__title" id="hero-title">The Evolution of Core Banking Software</h1>
				<div class="home-hero-alt__content"><a href="/platform/" class="button button-outline">Discover</a> how SaaScada’s platform empowers our clients.</div>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
		?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<style>
.home-hero-alt__title {
	overflow: hidden;
}
.home-hero-alt__title .word {
	display: inline-block;
	opacity: 0;
	transform: translateY(100%);
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
		const span = document.createElement('span');
		span.className = 'word';
		span.textContent = word;
		title.appendChild(span);
		
		// Add space after each word except the last
		if (index < words.length - 1) {
			title.appendChild(document.createTextNode(' '));
		}
	});
	
	// Animate words upward
	gsap.to('.home-hero-alt__title .word', {
		opacity: 1,
		y: 0,
		duration: 0.8,
		stagger: 0.1,
		ease: 'power3.out'
	});
});
</script>
		<?php
	}
);
