<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$bg = get_the_post_thumbnail($page_for_posts, 'full', ['class' => 'page_hero__bg']);

get_header();
?>
<main id="main">
    <section class="page_hero">
        <?= $bg ?>
        <div class="container-xl">
                <h1 class="page_hero__title">SaaScada News and Insights</h1>
                <div class="page_hero__content"><a href="/contact/" class="button button-outline">Contact us</a></div>
        </div>
    </section>
    <section class="breadcrumbs py-4">
        <div class="container-xl">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb();
            }
        ?>
        </div>
    </section>
    <div class="container-xl pb-5 news">

        <?php
        if (get_the_content(null, false, $page_for_posts)) {
            echo '<div class="mb-5">' . get_the_content(null, false, $page_for_posts) . '</div>';
        }

        // $cats = get_categories(array('exclude' => array(32)));
        $cats = get_categories();
        ?>
        <div class="filters mb-4">
            <?php
            echo '<a class="button button--sm active" href="/insights/">All</a>';
            foreach ($cats as $cat) {
                echo '<a class="button button--sm" href="' . esc_url(get_category_link($cat->term_id)) . ' ">' . $cat->cat_name . '</a>';
            }
            ?>
        </div>
        <div class="news__grid">
            <?php
            $c = 0;
            $colCount = 0;
            $columnsPerRow = 3;
            $first = true;

            while (have_posts()) {
                the_post();
                $img = get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'news__img']) ?: '<img src="' . get_stylesheet_directory_uri() . '/img/default-blog.jpg" class="news__img">';
                $cats = get_the_category();
                $category = wp_list_pluck($cats, 'name');
                // $flashcat = $category[0];

                if ($first) {
                    $class = 'news__first'; // First row class
                    $delay = 0; // First row has no delay
                } else {
                    // ✅ Reset delay when starting a new row AFTER the first row
                    if (($colCount % $columnsPerRow) === 0) {
                        $c = 0;
                    }

                    $class = ''; // Normal rows
                    $delay = $c;
                }

                if (has_category('event')) {
                    $the_date = get_field('start_date', get_the_ID());
                } else {
                    $the_date = null;
                    // $the_date = get_the_date('jS F, Y');
                }

                if ($colCount % $columnsPerRow === 0) {
                    $c = 0;
                }

            ?>
                <a href="<?= get_the_permalink() ?>"
                    class="news__item <?= $class ?>" data-aos="fade" data-aos-delay="<?= $c ?>">
                    <div class="news__image">
                        <?= $img ?>
                        <?php
                        if (!empty($category)) {
                            echo '<div class="pills">';
                            foreach ($category as $cat) {
                                echo '<div class="catflash">' . $cat . '</div>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="news__inner">
                        <h3><?= get_field('title') ?: get_the_title() ?></h3>
                        <?php
                        if ($first) {
                        ?>
                            <div><?= get_field('excerpt') ?: wp_trim_words(get_the_content(), 25) ?></div>
                        <?php
                        }
                        ?>
                        <div class="news__meta">
                            <div class="news__date">
                                <?= $the_date ?>
                            </div>
                            <div class="news__link">Read More</div>
                        </div>
                    </div>
                </a>
            <?php

                if ($first) {
                    $first = false; // ✅ Mark first row as processed
                } else {
                    // ✅ Only increment delay for normal rows
                    $c += 200;
                    $colCount++;
                }
            }
            ?>
        </div>
        <div class="mt-5">
            <?= understrap_pagination() ?>
        </div>
    </div>
</main>
<?php
get_footer();
?>