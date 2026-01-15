<?php
/**
 * Template for displaying the latest posts.
 *
 * This template fetches sticky posts and fills the remaining slots with regular posts.
 * It is used to display the latest news and blog posts in a grid format.
 *
 * @package cb-saascada2025
 */

$sticky = get_option( 'sticky_posts' );

// First, get sticky posts (if available).
$sticky_query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post__in'       => $sticky,
    'orderby'        => 'date',
);
$sticky_query      = new WP_Query( $sticky_query_args );

// If there are fewer than 4 sticky posts, fill with normal posts.
$remaining_posts = 4 - $sticky_query->post_count;
if ( $remaining_posts > 0 ) {
    $regular_query_args = array(
        'post_type'           => 'post',
        'posts_per_page'      => $remaining_posts,
        'post__not_in'        => $sticky, // Exclude already retrieved stickies.
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
    );
    $regular_query      = new WP_Query( $regular_query_args );
}

// Merge both queries.
$merged_posts = array_merge(
    $sticky_query->posts,
    ( $remaining_posts > 0 ) ? $regular_query->posts : array()
);

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$section_id = $block['anchor'] ?? null;


if ( ! empty( $merged_posts ) ) {
    ?>
<section id="<?= esc_attr( $section_id ); ?>" class="latest_posts <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="has-blue-400-color mb-3">Latest News &amp; Blog</h2>
            <a class="button button--sm" href="/insights/">All Insights</a>
        </div>
        <div class="latest_posts__grid">
            <?php
            $c = 0;
            foreach ( $merged_posts as $single_post ) {
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
?>