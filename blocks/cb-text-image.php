<?php
/**
 * Template for displaying a text and image block.
 *
 * @package cb-saascada2025
 */

$txtcol = get_field( 'order' ) === 'Text/Image' ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$imgcol = get_field( 'order' ) === 'Text/Image' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';

$split = get_field( 'split' );

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
        // Fallback values if needed.
        $txtcolwidth = 'col-lg-6';
        $imgcolwidth = 'col-lg-6';
}

$vertical_align = get_field( 'vertical_align' );
$valign_class   = 'middle' === $vertical_align ? 'justify-content-center' : 'justify-content-start';

$vpadding = in_array( 'Yes', (array) get_field( 'vertical_padding' ), true ) ? 'py-5' : 'py-4';
$csize    = get_field( 'content_size' ) ? get_field( 'content_size' ) : 'fs-400';

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$headings   = ! empty( $fg ) ? $fg : 'has-blue-400-color';
$section_id = $block['anchor'] ?? null;

$image_id = get_field( 'image' );

$image_size = $split === '40:60' ? 'large' : 'full';

if ( $image_id ) {
    $img = wp_get_attachment_image( $image_id, $image_size, false, array( 'class' => 'text_image__img' ) );
} else {
    $img = '<img src="' . esc_url( get_stylesheet_directory_uri() ) . '/img/default-blog.jpg" class="text_image__img" alt="Placeholder image">';
}


$anchor = isset( $block['anchor'] ) ? $block['anchor'] : '';
if ( $anchor ) {
	?>
    <a id="<?= esc_attr( $anchor ); ?>" class="anchor"></a>
	<?php
}

?>

<section id="<?= esc_attr( $section_id ); ?>" class="text_image <?= esc_attr( $vpadding ); ?> <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?= esc_attr( $txtcolwidth ); ?> d-flex flex-column align-items-start <?= esc_attr( $valign_class ); ?> <?= esc_attr( $txtcol ); ?>">
                <?php
                if ( get_field( 'title' ) ?? null ) {
                	?>
                    <h2 class="mb-4 <?= esc_attr( $headings ); ?>">
                        <?= esc_html( get_field( 'title' ) ); ?>
                    </h2>
                	<?php
                }
                ?>
                <div class="<?= esc_attr( $fg ); ?> <?= esc_attr( $csize ); ?>"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
				<?php
				if ( get_field( 'link' ) ) {
					$l = get_field( 'link' );
					?>
					<a href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>" class="button button--sm mt-4 me-auto">
						<?= esc_html( $l['title'] ); ?>
					</a>
					<?php
				}
				?>
            </div>
            <div
                class="<?= esc_attr( $imgcolwidth ); ?> <?= esc_attr( $imgcol ); ?> text_image__image d-flex flex-column align-items-start <?= esc_attr( $valign_class ); ?>">
                <?=
				$img; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
            </div>
        </div>
    </div>
</section>