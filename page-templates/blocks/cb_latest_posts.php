<?php
$q = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 4
));
if ($q->have_posts()) {
    ?>
<section class="latest_posts">
    <div class="container-xl py-5">
        <h2 class="has-blue-400-color">Latest News &amp; Blog</h2>
        <div class="latest_posts__grid">
        <?php
        while($q->have_posts()) {
            $q->the_post();
            $title = get_field('title',get_the_ID()) ?: get_the_title();
            $excerpt = get_field('excerpt',get_the_ID()) ?: wp_trim_words(get_the_content(null,false,get_the_ID()),30);
            ?>
            <a href="<?=get_the_permalink()?>" class="latest_posts__card">
                <?=get_the_post_thumbnail(get_the_ID(),'medium',['class' => 'latest_posts__image'])?>
                <h3 class="latest_posts__title"><?=$title?></h3>
                <div class="latest_posts__excerpt"><?=$excerpt?></div>
                <div class="latest_posts__date"><?=get_the_date('j F Y')?></div>
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>
    <?php
}
?>