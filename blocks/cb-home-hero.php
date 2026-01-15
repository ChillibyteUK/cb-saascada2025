<?php
/**
 * Template part for displaying the home hero section.
 *
 * @package cb-saascada2025
 */

$bg = get_field( 'background' ) ?? null;
?>
<section class="home_hero">
    <?= wp_get_attachment_image( $bg, 'full', false, array( 'class' => 'home_hero__bg' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    <div class="container-xl text-center">
		<h1 class="home_hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
		<div class="home_hero__content"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
    </div>
</section>