<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$bg = get_the_post_thumbnail($page_for_posts, 'full',['class' => 'page_hero__bg']);

get_header();
?>
<main id="main">
<?php
?>
<section class="page_hero">
    <?= $bg ?>
    <div class="container-xl">
        <h1 class="page_hero__title">SaaScada News and Insights</h1>
        <a href="/contact/" class="button button-outline">Contact us</a>
    </div>
</section>


    <div class="container-xl py-5 news">
        <?php
        if (get_the_content(null, false, $page_for_posts)) {
            echo '<div class="mb-5">' . get_the_content(null, false, $page_for_posts) . '</div>';
        }

        // $cats = get_categories(array('exclude' => array(32)));
        $cats = get_categories();
        ?>
        <div class="filters mb-4">
            <?php
        echo '<a class="button button--sm active me-2 mb-2" href="/insights/">All</a>';
        foreach ($cats as $cat) {
            echo '<a class="button button--sm me-2 mb-2" href="' . esc_url(get_category_link($cat->term_id)) . ' ">' . $cat->cat_name . '</a>';
        }
        ?>
        </div>
        <div class="news__grid">
            <?php
            $first = true;
    while (have_posts()) {
        the_post();
        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if (!$img) {
            $img = '<img src="' . get_stylesheet_directory_uri() . '/img/default-blog.jpg" class="news__image">';
        }
        $cats = get_the_category();
        $category = wp_list_pluck($cats, 'name');
        $flashcat = $category[0];

        $class = $first ? 'news__first' : '';
        
        if (has_category('event')) {
            $the_date = get_field('start_date', get_the_ID());
        } else {
            $the_date = get_the_date('jS F, Y');
        }

        ?>
                <a href="<?=get_the_permalink()?>"
                    class="news__item <?=$class?>">
                    <div class="news__image">
                        <?=get_the_post_thumbnail(get_the_ID(), 'large',['class' => 'news__img']) ?? $img?>
                        <div class="overlay"></div>
                        <div class="catflash">
                            <?=$flashcat?>
                        </div>
                    </div>
                    <div class="news__inner">
                        <h3><?= get_field('title') ?: get_the_title()?></h3>
                        <?php
                        if ($first) {
                            ?>
                        <div><?= get_field('excerpt') ?: wp_trim_words(get_the_content(),20)?></div>
                            <?php
                        }
                        ?>
                        <div class="news__meta">
                            <div class="news__date">
                                <?=get_the_date('j F Y')?>
                            </div>
                            <div class="news__link">Read More</div>
                        </div>
                    </div>
                </a>
        <?php
        $first = false;
    }
?>
    </div>
    <!--        <div class="mt-5">
        <?php
        // numeric_posts_nav();
?>
    </div>
    -->
    </div>
</main>
<?php
get_footer();
?>