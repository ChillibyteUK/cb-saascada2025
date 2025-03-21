<section class="icon_collapse">
    <div class="container-xl">
        <?php
        if (have_rows('cards')) {
            $card_index = 0; // Initialize a counter for unique IDs
            while (have_rows('cards')) {
                the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $card_id = 'collapse-' . $card_index; // Generate a unique ID
        ?>
                <div class="icon_collapse__card row mb-4">
                    <div class="col-md-1 icon_collapse__card__icon">
                        <img src="<?= $icon ?>" alt="">
                    </div>
                    <div class="col-md-11 icon_collapse__card__content d-flex align-items-center">
                        <h2 class="mb-0 w-100">
                            <a class="collapsed d-flex justify-content-between align-items-center w-100" data-bs-toggle="collapse" href="#<?= $card_id ?>" role="button" aria-expanded="false" aria-controls="<?= $card_id ?>">
                                <span><?= $title ?></span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </a>
                        </h2>
                    </div>
                    <div id="<?= $card_id ?>" class="col-12 collapse icon_collapse__card__content__text">
                        <div class="pt-4">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
        <?php
                $card_index++; // Increment the counter
            }
        }
        ?>
    </div>
</section>