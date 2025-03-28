<section class="partners_slider">
    <?=wp_get_attachment_image(get_field('background'), 'full', false, ['class' => 'partners_slider__bg'])?>
    <div class="container-xl py-5">
        <h2><?=get_field('title')?></h2>
        <?php
$partners = get_field('partners');

    if ( $partners ) { ?>
    <div class="splide" id="partners-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                    foreach ( $partners as $partner ) {
                        ?>
                    <li class="splide__slide">
                        <?=get_the_post_thumbnail($partner, 'large', false, ['class' => 'partners_slider__partner'])?>
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
    add_action('wp_footer', function () {
        ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#partners-slider', {
        type: 'loop',
        autoplay: true,
        perPage: 5,
        perMove: 1,
        interval: 2000,
        gap: '1rem',
        arrows: false,
        pagination: false,
        breakpoints: {
            768: { perPage: 3 },
            480: { perPage: 1 }
        }
    }).mount();
});
</script>
    <?php
    });
    ?>