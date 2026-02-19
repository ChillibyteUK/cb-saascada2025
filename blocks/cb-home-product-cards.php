<?php
/**
 * Block template for CB Home Product Cards.
 *
 * @package cb-saascada2025
 */

$l1 = get_field( 'link_1' ) ?? null;
$l2 = get_field( 'link_2' ) ?? null;
$l3 = get_field( 'link_3' ) ?? null;
?>
<section class="home-product-cards py-5">
    <div class="container-xl">
        <div class="home-product-cards__grid">
            <div class="home-product-cards__card" data-aos="fade">
				<div class="home-product-cards__card-inner">
					<div class="home-product-cards__card-front">
						<img src="<?= esc_url( get_field( 'icon_1' ) ); ?>" alt="" class="home-product-cards__icon">
						<h2 class="h4 has-blue-400-color"><?= wp_kses_post( get_field( 'title_1' ) ); ?></h2>
						<div class="fs-300"><?= wp_kses_post( get_field( 'content_1' ) ); ?></div>
						<a href="<?= esc_url( $l1['url'] ); ?>" target="<?= esc_attr( $l1['target'] ); ?>" class="button button--sm"><?= esc_html( $l1['title'] ); ?></a>
					</div>
					<div class="home-product-cards__card-back">
						<img src="<?= esc_url( get_field( 'icon_1' ) ); ?>" alt="" class="home-product-cards__icon">
						<h3 class="h5 has-blue-400-color"><?= esc_html( get_field( 'detail_title_1' ) ); ?></h3>
						<div class="fs-300"><?= wp_kses_post( get_field( 'detail_1' ) ); ?></div>
						<a href="<?= esc_url( $l1['url'] ); ?>" target="<?= esc_attr( $l1['target'] ); ?>" class="button button--sm"><?= esc_html( $l1['title'] ); ?></a>
					</div>
				</div>
            </div>
            <div class="home-product-cards__card" data-aos="fade" data-aos-delay="200">
                <div class="home-product-cards__card-inner">
                    <div class="home-product-cards__card-front">
                        <img src="<?= esc_url( get_field( 'icon_2' ) ); ?>" alt="" class="home-product-cards__icon">
                        <h2 class="h4 has-green-400-color"><?= wp_kses_post( get_field( 'title_2' ) ); ?></h2>
                        <div class="fs-300"><?= wp_kses_post( get_field( 'content_2' ) ); ?></div>
                        <a href="<?= esc_url( $l2['url'] ); ?>" target="<?= esc_attr( $l2['target'] ); ?>" class="button button--sm"><?= esc_html( $l2['title'] ); ?></a>
                    </div>
                    <div class="home-product-cards__card-back">
						<img src="<?= esc_url( get_field( 'icon_2' ) ); ?>" alt="" class="home-product-cards__icon">
                        <h3 class="h5 has-green-400-color"><?= esc_html( get_field( 'detail_title_2' ) ); ?></h3>
                        <div class="fs-300"><?= wp_kses_post( get_field( 'detail_2' ) ); ?></div>
						<a href="<?= esc_url( $l2['url'] ); ?>" target="<?= esc_attr( $l2['target'] ); ?>" class="button button--sm"><?= esc_html( $l2['title'] ); ?></a>
                    </div>
                </div>
            </div>
            <div class="home-product-cards__card" data-aos="fade" data-aos-delay="400">
                <div class="home-product-cards__card-inner">
                    <div class="home-product-cards__card-front">
                        <img src="<?= esc_url( get_field( 'icon_3' ) ); ?>" alt="" class="home-product-cards__icon">
                        <h2 class="h4 has-teal-400-color"><?= wp_kses_post( get_field( 'title_3' ) ); ?></h2>
                        <div class="fs-300"><?= wp_kses_post( get_field( 'content_3' ) ); ?></div>
                        <a href="<?= esc_url( $l3['url'] ); ?>" target="<?= esc_attr( $l3['target'] ); ?>" class="button button--sm"><?= esc_html( $l3['title'] ); ?></a>
                    </div>
                    <div class="home-product-cards__card-back">
						<img src="<?= esc_url( get_field( 'icon_3' ) ); ?>" alt="" class="home-product-cards__icon">
                        <h3 class="h5 has-teal-400-color"><?= esc_html( get_field( 'detail_title_3' ) ); ?></h3>
                        <div class="fs-300"><?= wp_kses_post( get_field( 'detail_3' ) ); ?></div>
						<a href="<?= esc_url( $l3['url'] ); ?>" target="<?= esc_attr( $l3['target'] ); ?>" class="button button--sm"><?= esc_html( $l3['title'] ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>