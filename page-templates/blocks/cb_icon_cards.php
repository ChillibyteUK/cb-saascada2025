<section class="icon_cards">
    <div class="container-xl">
        <div class="row justify-content-center g-5">
            <?php
            while (have_rows('cards')) {
                the_row();
                $l = get_sub_field('link') ?? null;
                $tag = isset($l) ? '<a href="' . $l['url'] . '" target="' . $l['target'] . '" class="icon_cards__card">' : '<div class="icon_cards__card">';
                $close = isset($l) ? '</a>' : '</div>';
            ?>
                <div class="col-sm-6 col-lg-4">
                    <?= $tag ?>
                    <div class="icon_cards__icon_container">
                        <?= wp_get_attachment_image(get_sub_field('icon'), 'large', false, ['class' => 'icon_cards__icon']) ?>
                    </div>
                    <div class="icon_cards__inner">
                        <h2><?= get_sub_field('title') ?></h2>
                        <div><?= get_sub_field('content') ?></div>
                    </div>
                    <?= $close ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>