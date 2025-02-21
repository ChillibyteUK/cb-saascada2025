<?php
$bg = get_field('background') ?? null;
?>
<section class="home_hero">
    <?= wp_get_attachment_image($bg, 'full', false, ['class' => 'home_hero__bg']) ?>
    <div class="container-xl text-center">
            <h1 class="home_hero__title"><?= get_field('title') ?></h1>
            <div class="home_hero__content"><?=get_field('content')?></div>
    </div>
</section>