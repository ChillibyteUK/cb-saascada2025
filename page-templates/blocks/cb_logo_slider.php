<section class="logo_slider">
    <?=wp_get_attachment_image(get_field('background'),'full',false,['class' => 'logo_slider__bg'])?>
    <div class="container-xl py-5">
        <h2><?=get_field('title')?></h2>
        <?php 
$logos = get_field('logos'); // Retrieve the ACF gallery field

if ($logos) { ?>
    <div class="splide" id="logos-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                foreach ($logos as $logo){
                    ?>
                    <li class="splide__slide">
                        <?=wp_get_attachment_image($logo,'large',false,['class' => 'logo_slider__logo'])?>
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
add_action('wp_footer', function(){
    ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#logos-slider', {
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