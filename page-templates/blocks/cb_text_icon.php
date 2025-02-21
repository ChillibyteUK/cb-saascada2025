<?php
$title = get_field('title') ?? null;
$subtitle = get_field('subtitle') ?? null;
$content = get_field('content') ?? null;
$link = get_field('link') ?? null;
?>
<section class="text_icon">
    <div class="container-xl">
        <div class="row g-5">
            <div class="col-sm-2">
                <?=wp_get_attachment_image(get_field('icon'),'large')?>
            </div>
            <div class="col-sm-10">
                <?php
                if ($title) {
                    ?>
                    <h2><?=$title?></h2>
                    <?php
                    if ($subtitle) {
                        ?>
                    <h3><?=$subtitle?></h3>
                        <?php
                    }
                }
                if ($content) {
                    echo $content;
                }
                if ($link) {
                    ?>
                    <a href="<?=$link['url']?>" target="<?=$link['target']?>" class="button button-primary"><?=$link['title']?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>