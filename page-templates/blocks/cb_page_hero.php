<?php
$bg = get_field('background') ?? null;
$content = get_field('content') ?? null;
$link = get_field('cta') ?? null;
?>
<section class="page_hero">
    <?= wp_get_attachment_image($bg, 'full', false, ['class' => 'page_hero__bg']) ?>
    <div class="container-xl">
            <h1 class="page_hero__title"><?= get_field('title') ?></h1>
            <?php
            if ( $content ) {
                ?>
            <div class="page_hero__content"><?=$content?></div>
                <?php
            }
            if ( $link ) {
                ?>
            <a href="<?=$link['url']?>" target="<?=$link['target']?>" class="button button-outline"><?=$link['title']?></a>
                <?php
            }
            ?>
    </div>
</section>
<section class="breadcrumbs py-4">
    <div class="container-xl">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb();
        }
    ?>
    </div>
</section>