<?php
/**
 * Template for displaying the team grid block.
 *
 * @package cb-saascada2025
 */

?>
<!-- team_grid -->
<section class="team_grid">
    <div class="container-xl">
        <div class="team_grid__grid mb-5">
            
<?php
$team = get_field( 'team' );

$q = new WP_Query(
	array(
		'post_type'      => 'people',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
			array(
				'taxonomy' => 'teams',
				'field'    => 'term_id',
				'terms'    => $team,
			),
		),
	)
);

while ( $q->have_posts() ) {
    $q->the_post();
    ?>
    <div class="person">
        <?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'person__img' ) ); ?>
        <div class="person__meta">
            <div class="person__name">
                <div class="person__title"><?= esc_html( get_the_title() ); ?></div>
                <div class="person__role"><?= esc_html( get_field( 'role', get_the_ID() ) ); ?></div>
            </div>
            <div class="person__linkedin">
                <a href="<?= esc_url( get_field( 'linkedin', get_the_ID() ) ); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="person__bio">
            <?= wp_kses_post( get_field( 'bio', get_the_ID() ) ); ?>
        </div>
    </div>
    <?php
}

wp_reset_postdata();

?>
        </div>
    </div>
</section>
