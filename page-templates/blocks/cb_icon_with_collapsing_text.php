<?php
/**
 * Template part for displaying icon with collapsing text blocks.
 *
 * @package cb-saascada2025
 */

?>
<section class="icon_collapse">
    <div class="container-xl">
        <div id="iconCollapseAccordion">
            <?php
            if ( have_rows( 'cards' ) ) {
                $card_index = 0;
                while ( have_rows( 'cards' ) ) {
                    the_row();
                    $icon       = get_sub_field( 'icon' );
                    $card_title = get_sub_field( 'title' );
                    $content    = get_sub_field( 'content' );
                    $parts      = extract_intro_content( $content );
                    $card_id    = 'collapse-' . $card_index;
                    $heading_id = 'heading-' . $card_index;
					?>
                    <div class="icon_collapse__card row mb-5 gy-4">
                        <div class="col-md-2 icon_collapse__card__icon">
                            <img src="<?= esc_url( $icon ); ?>" alt="">
                        </div>
                        <div class="col-md-10 icon_collapse__card__content d-flex flex-column align-items-center">
                            <button class="collapsed d-flex justify-content-between align-items-center w-100 border-0 bg-transparent p-0 text-start"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#<?= esc_attr( $card_id ); ?>"
                                    aria-expanded="false"
                                    aria-controls="<?= esc_attr( $card_id ); ?>">
                                <span class="me-4 w-100">
                                    <h2 class="mb-3"><?= esc_html( $card_title ); ?></h2>
                                    <?= wp_kses_post( $parts['first_heading'] ); ?>
                                    <?= wp_kses_post( $parts['intro_paragraphs'] ); ?>
                                </span>
                                <i class="fas fa-chevron-down fa-2x toggle-icon"></i>
                            </button>
                            <div id="<?= esc_attr( $card_id ); ?>"
								class="collapse col-12 icon_collapse__card__content__text"
								data-bs-parent="#iconCollapseAccordion">
                                <div class="pt-4">
                                    <?= wp_kses_post( $parts['rest_content'] ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
            		<?php
                    ++$card_index;
                }
            }
            ?>
        </div>
    </div>
</section>
