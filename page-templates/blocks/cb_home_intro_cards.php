<?php
$l1 = get_field('card1_link') ?? null;
$l2 = get_field('card2_link') ?? null;
$l3 = get_field('card3_link') ?? null;
?>
<section class="home_intro">
    <div class="container-xl pb-5 mb-5">
        <img src="<?=get_stylesheet_directory_uri()?>/img/dna.svg" alt="" class="home_intro__dna">
        <img src="<?=get_stylesheet_directory_uri()?>/img/home_intro_lines.svg" alt="" class="home_intro__lines d-none d-md-block">
        <div class="row g-5">
            <div class="col-md-4 text-center">
                <img src="<?=get_field('card1_icon')?>" alt="" class="home_intro__icon">
                <h2 class="h4 has-purple-400-color"><?=get_field('card1_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card1_content')?></div>
                <a href="<?=$l1['url']?>" target="<?=$l1['targt']?>" class="button button--sm"><?=$l1['title']?></a>
            </div>
            <div class="col-md-4 text-center">
                <img src="<?=get_field('card2_icon')?>" alt="" class="home_intro__icon">
                <h2 class="h4 has-teal-400-color"><?=get_field('card2_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card2_content')?></div>
                <a href="<?=$l1['url']?>" target="<?=$l1['targt']?>" class="button button--sm"><?=$l1['title']?></a>
            </div>
            <div class="col-md-4 text-center">
                <img src="<?=get_field('card3_icon')?>" alt="" class="home_intro__icon">
                <h2 class="h4 has-amber-400-color"><?=get_field('card3_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card3_content')?></div>
                <a href="<?=$l1['url']?>" target="<?=$l1['targt']?>" class="button button--sm"><?=$l1['title']?></a>
            </div>
        </div>
        <img src="<?=get_stylesheet_directory_uri()?>/img/home_intro_brace.svg" alt="" class="home_intro__brace">
        <div class="h2 text-center has-teal-400-color mb-4"><?=get_field('split_title')?></div>
        <div class="row g-5">
            <div class="col-md-4 text-center">
                <h3 class="h5 has-purple-400-color"><?=get_field('card1_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card1_detail')?></div>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="h5 has-teal-400-color"><?=get_field('card2_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card2_detail')?></div>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="h5 has-amber-400-color"><?=get_field('card3_title')?></h2>
                <div class="fs-300 mb-4"><?=get_field('card3_detail')?></div>
            </div>
        </div>
    </div>
</section>