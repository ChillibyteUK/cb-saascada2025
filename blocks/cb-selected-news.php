<?php
/**
 * Block template for CB Selected News.
 *
 * This template fetches up to 4 chosen posts and fills any remaining slots with latest posts.
 *
 * @package cb-saascada2025
 */

$post_ids = get_field( 'selected_news' );

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$section_id = $block['anchor'] ?? null;

if ( $post_ids ) {

	$posts_needed = 4;

	$selected = get_posts(
		array(
			'post_type'      => 'post',
			'post__in'       => $post_ids,
			'orderby'        => 'post__in',
			'posts_per_page' => $posts_needed,
		)
	);

	$remaining_needed = $posts_needed - count( $selected );

	if ( $remaining_needed > 0 ) {
		$fallback = get_posts(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => $remaining_needed,
				'post__not_in'        => $post_ids,
				'orderby'             => 'date',
				'order'               => 'DESC',
				'ignore_sticky_posts' => true,
			)
		);

		$final_posts = array_merge( $selected, $fallback );
	} else {
		$final_posts = $selected;
	}

	if ( $final_posts ) {
		?>
<section id="<?= esc_attr( $section_id ); ?>" class="latest_posts <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="has-blue-400-color mb-3"><?= esc_html( get_field( 'title' ) ); ?></h2>
            <a class="button button--sm" href="/insights/">All Insights</a>
        </div>
        <div class="latest_posts__grid">
            <?php
            $c = 0;
            foreach ( $final_posts as $single_post ) {
                setup_postdata( $single_post );
                $post_title = get_field( 'title', $single_post->ID ) ? get_field( 'title', $single_post->ID ) : get_the_title( $single_post->ID );
                $excerpt    = get_field( 'excerpt', $single_post->ID ) ? wp_trim_words( get_field( 'excerpt', $single_post->ID ), 30 ) : wp_trim_words( get_the_content( null, false, $single_post->ID ), 30 );
                ?>
            <a href="<?= esc_url( get_the_permalink( $single_post->ID ) ); ?>" class="latest_posts__card" data-aos="fade" data-aos-delay="<?= esc_attr( ( $c - 1 ) * 200 ); ?>">
                <?= get_the_post_thumbnail( $single_post->ID, 'medium', array( 'class' => 'latest_posts__image' ) ); ?>
                <h3 class="latest_posts__title"><?= esc_html( $post_title ); ?></h3>
                <div class="latest_posts__excerpt"><?= wp_kses_post( $excerpt ); ?></div>
            </a>
                <?php
			}
    		wp_reset_postdata();
    		?>
        </div>
    </div>
</section>
		<?php
	}
}
