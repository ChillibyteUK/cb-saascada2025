<?php
$txtcol = get_field('order') == 'Text/Image' ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$imgcol = get_field('order') == 'Text/Image' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';

$txtcolwidth = get_field('split') == '5050' ? 'col-lg-6' : 'col-lg-8';
$imgcolwidth = get_field('split') == '5050' ? 'col-lg-6' : 'col-lg-4';

$bgcolour = get_field('background') ?: 'white';

$ccolour = get_field('content_colour') ? 'has-' . get_field('content_colour') . '-color' : '';
$csize = get_field('content_size') ?: 'fs-400';

// $img = wp_get_attachment_image(get_field('image'), 'large', false, ['class' => 'text_image__img']) ?: '<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" class="text_image__img>';

$image_id = get_field('image');

if ($image_id) {
    $img = wp_get_attachment_image($image_id, 'large', false, ['class' => 'text_image__img']);
} else {
    $img = '<img src="' . get_stylesheet_directory_uri() . '/img/default-blog.jpg" class="text_image__img" alt="Placeholder image">';
}


$anchor = isset($block['anchor']) ? $block['anchor'] : '';
if ($anchor) {
?>
    <a id="<?= $anchor ?>" class="anchor"></a>
<?php
}

?>

<section class="text_image py-5 bg--<?= $bgcolour ?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?= $txtcolwidth ?> d-flex flex-column justify-content-center align-items-start <?= $txtcol ?>">
                <?php
                if (get_field('title') ?? null) {
                ?>
                    <h2 class="mb-4 has-blue-400-color">
                        <?= get_field('title') ?>
                    </h2>
                <?php
                }
                ?>
                <div class="<?= $ccolour ?> <?= $csize ?>"><?= get_field('content') ?></div>
            </div>
            <div
                class="<?= $imgcolwidth ?> <?= $imgcol ?> text_image__image">
                <?= $img ?>
            </div>
        </div>
    </div>
</section>