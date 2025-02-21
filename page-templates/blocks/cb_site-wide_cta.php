<?php
$title = get_field('cta_title','option') ?? null;
$content = get_field('cta_content','option') ?? null;
$link = get_field('cta_link','option') ?? null;
$bg = get_field('cta_background','option') ?? null;
?>
<section class="site-wide_cta">
    <?=wp_get_attachment_image($bg, 'full', false, ['class' => 'site-wide_cta__bg'])?>
    <div class="container-xl py-5">
        <div class="row">
            <div class="col-md-7">
                <h2><?=$title?></h2>
                <p><?=$content?></p>
                <a href="<?=$link['url']?>" target="<?=$link['target']?>" class="button button-outline"><?=$link['title']?></a>
            </div>
        </div>
    </div>
</section>