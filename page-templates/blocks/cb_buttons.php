<?php
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<?php if (have_rows('buttons')) { ?>
    <div class="container-xl">
        <div class="button-group <?= esc_attr($align_class) ?>" style="width: max-content;">
            <?php
            while (have_rows('buttons')) {
                the_row(); 
                $link = get_sub_field('link');
                if ($link){
                    $style = get_sub_field('button_style');
                    ?>
                    <a class="button <?=$style?>" 
                    href="<?= esc_url($link['url']) ?>" 
                    target="<?= esc_attr($link['target']) ?>">
                        <?= esc_html($link['title']) ?>
                    </a>
                    <?php
                } 
             }
             ?>
        </div>
    </div>
<?php
}
?>
