<?php
/**
 * Template part for rendering button blocks.
 *
 * @package cb-saascada2025
 */

$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<?php if ( have_rows( 'buttons' ) ) { ?>
    <div class="container-xl">
        <div class="button-group <?= esc_attr( $align_class ); ?>" style="width: max-content;">
            <?php
            while ( have_rows( 'buttons' ) ) {
                the_row();
                $button_link = get_sub_field( 'link' );
                if ( $button_link ) {
                    $style = get_sub_field( 'button_style' );
                    ?>
                    <a class="button <?= esc_attr( $style ); ?>" 
                    href="<?= esc_url( $button_link['url'] ); ?>" 
                    target="<?= esc_attr( $button_link['target'] ); ?>">
                        <?= esc_html( $button_link['title'] ); ?>
                    </a>
                    <?php
                }
			}
			?>
        </div>
    </div>
	<?php
}
?>