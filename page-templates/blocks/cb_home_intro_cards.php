<?php
$l1 = get_field('card1_link') ?? null;
$l2 = get_field('card2_link') ?? null;
$l3 = get_field('card3_link') ?? null;
?>
<section class="home_intro">
    <div class="container-xl pb-5 mb-5">
        <img src="<?= get_stylesheet_directory_uri() ?>/img/dna.svg" alt="" class="home_intro__dna">
        <img src="<?= get_stylesheet_directory_uri() ?>/img/home_intro_lines.svg" alt="" class="home_intro__lines d-none d-md-block">
        <div class="row g-5 pt-5 pt-md-0 mb-4">
            <div class="col-md-4 text-center padme">
                <div class="home_intro__card" data-aos="fade">
                    <img src="<?= get_field('card1_icon') ?>" alt="" class="home_intro__icon">
                    <h2 class="h4 has-blue-400-color"><?= get_field('card1_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card1_content') ?></div>
                    <a href="<?= $l1['url'] ?>" target="<?= $l1['target'] ?>" class="button button--sm"><?= $l1['title'] ?></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="home_intro__card" data-aos="fade" data-aos-delay="200">
                    <img src="<?= get_field('card2_icon') ?>" alt="" class="home_intro__icon">
                    <h2 class="h4 has-green-400-color"><?= get_field('card2_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card2_content') ?></div>
                    <a href="<?= $l1['url'] ?>" target="<?= $l1['target'] ?>" class="button button--sm"><?= $l1['title'] ?></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="home_intro__card" data-aos="fade" data-aos-delay="400">
                    <img src="<?= get_field('card3_icon') ?>" alt="" class="home_intro__icon">
                    <h2 class="h4 has-teal-400-color"><?= get_field('card3_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card3_content') ?></div>
                    <a href="<?= $l1['url'] ?>" target="<?= $l1['target'] ?>" class="button button--sm"><?= $l1['title'] ?></a>
                </div>
            </div>
        </div>
        <img src="<?= get_stylesheet_directory_uri() ?>/img/home_intro_brace.svg" alt="" class="home_intro__brace">
        <div class="h2 text-center has-teal-400-color mb-4"><?= get_field('split_title') ?></div>
        <div class="row gx-5">
            <div class="col-md-4 text-center" data-aos="fade">
                <h3 class="h5 has-blue-400-color"><?= get_field('card1_detail_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card1_detail') ?></div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade" data-aos-delay="200">
                <h3 class="h5 has-green-400-color"><?= get_field('card2_detail_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card2_detail') ?></div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade" data-aos-delay="400">
                <h3 class="h5 has-teal-400-color"><?= get_field('card3_detail_title') ?></h2>
                    <div class="fs-300 mb-4"><?= get_field('card3_detail') ?></div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let lastScrollY = window.scrollY;
            let rotation = 0;
            const dna = document.querySelector(".home_intro__dna");

            window.addEventListener("scroll", function() {
                let currentScrollY = window.scrollY;
                let scrollDelta = currentScrollY - lastScrollY;

                // Rotate based on scroll direction
                rotation += scrollDelta * 0.3; // Adjust sensitivity (higher = faster rotation)
                dna.style.transform = `translate(-50%, -50%) rotate(${rotation}deg)`;

                lastScrollY = currentScrollY;
            });
        });
    </script>
<?php
});
