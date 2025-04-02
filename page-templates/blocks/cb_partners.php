<?php
/**
 * Template for displaying the partners section.
 *
 * @package cb-saascada2025
 */

?>
<!-- partners -->
<section class="partners">
    <div class="container-xl">
        <?php
        // Get all categories except 'Client'.
		$clients_term = get_term_by( 'name', 'CLIENT', 'partner-type' );
		$exclude_id   = $clients_term ? $clients_term->term_id : 0;

		// Get all categories except the excluded one.
		$cats = get_categories(
			array(
				'taxonomy' => 'partner-type',
				'exclude'  => array( $exclude_id ),
			)
		);

        // Get partners and determine valid letters for each category.
		$partners = new WP_Query(
			array(
				'post_type'      => 'partners',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'orderby'        => 'post_title',
				'order'          => 'asc',
				'tax_query'      => array(
					array(
						'taxonomy' => 'partner-type',
						'field'    => 'term_id',
						'terms'    => array( $exclude_id ),
						'operator' => 'NOT IN',
					),
				),
			)
		);

        $valid_filters = array();
        while ( $partners->have_posts() ) {
            $partners->the_post();
            $partner_title = get_the_title();
            $first_letter  = strtoupper( mb_substr( $partner_title, 0, 1 ) );

            if ( ! ctype_alpha( $first_letter ) ) {
                continue; // Ignore non-alpha titles.
            }

            $terms      = get_the_terms( get_the_ID(), 'partner-type' );
            $categories = $terms ? wp_list_pluck( $terms, 'name' ) : array();

            // Store valid category-letter combinations.
            foreach ( $categories as $category ) {
                $slug                                    = cbslugify( $category );
                $valid_filters[ $slug ][ $first_letter ] = true;
            }

            // Store valid letters globally.
            $valid_filters['all'][ $first_letter ] = true;
        }
        wp_reset_postdata();
        ?>

        <!-- Filters -->
        <div class="filters mb-4">
            <!-- A-Z Filter -->
            <div>
                <div class="filter-label">
                    By Name
                </div>
                <div class="alphabet-filter">
                    <?php
					foreach ( range( 'A', 'Z' ) as $letter ) {
						?>
                        <button class="alpha-btn" 
                                data-letter="<?= esc_attr( $letter ); ?>" 
                                <?= isset( $valid_filters['all'][ $letter ] ) ? '' : 'disabled'; ?>>
                            <?= esc_html( $letter ); ?>
                        </button>
                    	<?php
					}
					?>
                </div>
            </div>

            <!-- Category Filter -->
            <div>
                <div class="filter-label">
                    By Category
                </div>
                <select id="filter-select" class="form-select">
                    <option value="all">All</option>
                    <?php
					foreach ( $cats as $category ) {
						?>
                        <option value="<?= esc_attr( cbslugify( $category->name ) ); ?>"><?= esc_html( $category->cat_name ); ?></option>
                    	<?php
					}
					?>
                </select>
            </div>

            <!-- Reset Button -->
            <button id="reset-filters" class="button button--sm">Reset Filters</button>
        </div>

        <!-- Partners Grid -->
        <div class="partners__grid pb-5" id="grid">
            <?php
            while ( $partners->have_posts() ) {
                $partners->the_post();
                $url          = get_field( 'url', get_the_ID() ) ?? null;
                $terms        = get_the_terms( get_the_ID(), 'partner-type' );
                $categories   = $terms ? wp_list_pluck( $terms, 'name' ) : array();
                $catclass     = implode( ' ', array_map( 'cbslugify', $categories ) );
                $first_letter = strtoupper( mb_substr( get_the_title(), 0, 1 ) );
                ?>
                <a class="grid-item partners__card <?= esc_attr( $catclass ); ?>" 
					href="<?= esc_url( $url ); ?>" 
					target="_blank" 
					rel="nofollow" 
					data-letter="<?= esc_attr( $first_letter ); ?>">
                    <?=
					get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        array(
                            'class' => 'partners__logo',
                            'alt'   => get_the_title(),
                        )
                    );
					?>
                    <div class="partners__inner">
                        <?= wp_kses_post( get_field( 'description', get_the_ID() ) ); ?>
                        <div class="partners__cats"><?= esc_html( implode( ', ', $categories ) ); ?></div>
                    </div>
                </a>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php
set_query_var( 'cta_title', 'Interested in becoming a partner?' );
set_query_var( 'cta_content', 'We have worked with a wide range of tech partners and we’re keen to work with partners who want to create great client outcomes for our mutual (or soon to be mutual) customers. Please contact us to discuss partnership possibilities.' );
set_query_var(
    'cta_link',
    array(
        'url'    => '/contact/',
        'target' => 'self',
        'title'  => 'Get in Touch',
    )
);
get_template_part( 'page-templates/blocks/cb_site-wide_cta' );

add_action(
	'wp_footer',
	function () use ( $valid_filters ) {
    	?>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const filterSelect = document.getElementById('filter-select');
		const gridItems = document.querySelectorAll('.grid-item');
		const alphaButtons = document.querySelectorAll('.alpha-btn');
		const resetButton = document.getElementById('reset-filters');

		// Valid category-letter map from PHP.
		const validFilters = <?= wp_json_encode( $valid_filters ); ?>;

		let activeLetter = null;
		let activeCategory = 'all';

		// Function to filter items.
		function filterItems() {
			gridItems.forEach(item => {
				const matchesCategory = activeCategory === 'all' || item.classList.contains(activeCategory);
				const matchesLetter = !activeLetter || item.dataset.letter === activeLetter;

				if (matchesCategory && matchesLetter) {
					item.style.display = 'grid';
				} else {
					item.style.display = 'none';
				}
			});

			updateLetterButtons();
		}

		// Function to update letter button states
		function updateLetterButtons() {
			alphaButtons.forEach(button => {
				const letter = button.dataset.letter;
				if (validFilters[activeCategory] && validFilters[activeCategory][letter]) {
					button.disabled = false;
				} else {
					button.disabled = true;
				}
			});
		}

		// Handle category filter change
		filterSelect.addEventListener('change', () => {
			activeCategory = filterSelect.value;
			activeLetter = null;
			alphaButtons.forEach(btn => btn.classList.remove('active'));
			filterItems();
		});

		// Handle letter filter click
		alphaButtons.forEach(button => {
			if (!button.disabled) {
				button.addEventListener('click', () => {
					if (button.classList.contains('active')) {
						button.classList.remove('active');
						activeLetter = null;
					} else {
						alphaButtons.forEach(btn => btn.classList.remove('active'));
						button.classList.add('active');
						activeLetter = button.dataset.letter;
					}
					filterItems();
				});
			}
		});

		// Handle reset button
		resetButton.addEventListener('click', () => {
			activeCategory = 'all';
			activeLetter = null;
			filterSelect.value = 'all';
			alphaButtons.forEach(btn => btn.classList.remove('active'));
			filterItems();
		});

		// Initial update to disable unavailable letters
		updateLetterButtons();
	});
</script>
	    <?php
	},
	9999
);