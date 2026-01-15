<?php
/**
 * Template part for rendering four list cards blocks.
 *
 * @package cb-saascada2025
 */

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$headings   = ! empty( $fg ) ? $fg : 'has-blue-400-color';
$section_id = $block['anchor'] ?? null;

?>
<section id="<?= esc_attr( $section_id ); ?>" class="four_list_cards <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl py-5">
        <h2 class="<?= esc_attr( $headings ); ?> mb-5"><?= esc_html( get_field( 'title' ) ); ?></h2>
        <div class="four_list_cards__grid g-5">
            <?php
            if ( have_rows( 'cards' ) ) {
                $c = 0;
                while ( have_rows( 'cards' ) ) {
                    the_row();
                    $l = get_sub_field( 'link' ) ?? null;
                    ++$c;
					?>
            <div class="four_list_cards__card" data-aos="fade" data-aos-delay="<?= esc_attr( ( $c - 1 ) * 200 ); ?>">
                	<?= wp_get_attachment_image( get_sub_field( 'image' ), 'medium', false, array( 'class' => 'four_list_cards__image' ) ); ?>
                <h3 class="four_list_cards__title"><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
                <div class="four_list_cards__content"><?= esc_html( get_sub_field( 'content' ) ); ?></div>
                <ul>
                    <?= wp_kses_post( cb_list( get_sub_field( 'list' ) ) ); ?>
                </ul>
                <a href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>" class="button button--sm"><?= esc_html( $l['title'] ); ?></a>
            </div>
                	<?php
                }
            }
        	?>
        </div>
    </div>
</section>