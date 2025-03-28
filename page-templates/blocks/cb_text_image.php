<?php
$txtcol = get_field('order') == 'Text/Image' ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$imgcol = get_field('order') == 'Text/Image' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';

$split = get_field('split');

switch ( $split ) {
    case '50:50':
        $txtcolwidth = 'col-lg-6';
        $imgcolwidth = 'col-lg-6';
        break;
    case '60:40':
        $txtcolwidth = 'col-lg-4';
        $imgcolwidth = 'col-lg-8';
        break;
    case '40:60':
        $txtcolwidth = 'col-lg-8';
        $imgcolwidth = 'col-lg-4';
        break;
    default:
        // Fallback values if needed
        $txtcolwidth = 'col-lg-6';
        $imgcolwidth = 'col-lg-6';
}

$vertical_align = get_field('vertical_align');
$valign_class = $vertical_align === 'middle' ? 'justify-content-center' : 'justify-content-start';

$vpadding = in_array('Yes', (array) get_field('vertical_padding')) ? 'py-5' : 'py-4';

$bgcolour = get_field('background') ?: 'white';

$ccolour = get_field('content_colour') ? 'has-' . get_field('content_colour') . '-color' : '';
$csize = get_field('content_size') ?: 'fs-400';

// $img = wp_get_attachment_image(get_field('image'), 'large', false, ['class' => 'text_image__img']) ?: '<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" class="text_image__img>';

$image_id = get_field('image');

if ( $image_id ) {
    $img = wp_get_attachment_image($image_id, 'large', false, ['class' => 'text_image__img']);
} else {
    $img = '<img src="' . get_stylesheet_directory_uri() . '/img/default-blog.jpg" class="text_image__img" alt="Placeholder image">';
}


$anchor = isset($block['anchor']) ? $block['anchor'] : '';
if ( $anchor ) {
?>
    <a id="<?= $anchor ?>" class="anchor"></a>
<?php
}

?>

<section class="text_image <?=$vpadding?> bg--<?= $bgcolour ?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?=$txtcolwidth?> d-flex flex-column align-items-start <?=$valign_class?> <?=$txtcol?>">
                <?php
                if ( get_field('title') ?? null ) {
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
                class="<?=$imgcolwidth?> <?=$imgcol?> text_image__image d-flex flex-column align-items-start <?=$valign_class?>">
                <?=$img?>
            </div>
        </div>
    </div>
</section>