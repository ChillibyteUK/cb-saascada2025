<?php
$sticky = get_option('sticky_posts');

// First, get sticky posts (if available)
$sticky_query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post__in'       => $sticky,
    'orderby'        => 'date'
);
$sticky_query = new WP_Query($sticky_query_args);

// If there are fewer than 4 sticky posts, fill with normal posts
$remaining_posts = 4 - $sticky_query->post_count;
if ($remaining_posts > 0) {
    $regular_query_args = array(
        'post_type'           => 'post',
        'posts_per_page'      => $remaining_posts,
        'post__not_in'        => $sticky, // Exclude already retrieved stickies
        'ignore_sticky_posts' => true,
        'orderby'             => 'date'
    );
    $regular_query = new WP_Query($regular_query_args);
}

// Merge both queries
$merged_posts = array_merge(
    $sticky_query->posts,
    ($remaining_posts > 0) ? $regular_query->posts : []
);

if (!empty($merged_posts)) {
    ?>
<section class="latest_posts">
    <div class="container-xl py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="has-blue-400-color mb-3">Latest News &amp; Blog</h2>
            <a class="button button--sm" href="/insights/">All Insights</a>
        </div>
        <div class="latest_posts__grid">
            <?php
            foreach ($merged_posts as $post) {
                setup_postdata($post);
                $title = get_field('title', $post->ID) ?: get_the_title($post->ID);
                $excerpt = get_field('excerpt', $post->ID) ? wp_trim_words(get_field('excerpt', $post->ID), 30) : wp_trim_words(get_the_content(null, false, $post->ID), 30);
                ?>
            <a href="<?=get_the_permalink($post->ID)?>" class="latest_posts__card">
                <?=get_the_post_thumbnail($post->ID, 'medium', ['class' => 'latest_posts__image'])?>
                <h3 class="latest_posts__title"><?=$title?></h3>
                <div class="latest_posts__excerpt"><?=$excerpt?></div>
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