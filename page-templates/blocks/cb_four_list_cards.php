<section class="four_list_cards">
    <div class="container-xl py-5">
        <h2 class="has-blue-400-color mb-5"><?=get_field('title')?></h2>
        <div class="four_list_cards__grid g-5">
            <?php
            if (have_rows('cards')) {
                while(have_rows('cards')) {
                    the_row();
                    $l = get_sub_field('link') ?? null;
                    ?>
            <div class="four_list_cards__card">
                <?=wp_get_attachment_image(get_sub_field('image'),'medium',false,['class' => 'four_list_cards__image'])?>
                <h3 class="four_list_cards__title"><?=get_sub_field('title')?></h3>
                <div class="four_list_cards__content"><?=get_sub_field('content')?></div>
                <ul>
                    <?= cb_list(get_sub_field('list')) ?>
                </ul>
                <a href="<?=$l['url']?>" target="<?=$l['target']?>" class="button button--sm"><?=$l['title']?></a>
            </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</section>