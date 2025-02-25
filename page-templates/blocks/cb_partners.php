<!-- partners -->
<section class="partners">
    <div class="container-xl">
    <?php
        $cats = get_categories( array( 'taxonomy' => 'partner-type'));
        ?>
        <div class="filters mb-4">
            <select name="" id="filter-select" class="form-select">
                <option value="all">All</option>
            <?php
        foreach ($cats as $cat) {
            echo '<option value="' . cbslugify($cat->name) . '">' . $cat->cat_name . '</option>';
        }
        ?>
            </select>
        </div>

        <div class="partners__grid pb-5" id="grid">
            <?php
$q = new WP_Query(array(
    'post_type' => 'partners',
    'posts_per_page' => -1,
    'post_status' => 'publish'
));

    while ($q->have_posts()) {
        $q->the_post();
        $url = get_field('url',get_the_ID()) ?? null;
        $cats = get_the_terms( get_the_ID(), 'partner-type');
        $category = wp_list_pluck($cats, 'name');
        $flashcat = cbslugify($category[0]);
        $catclass = implode(' ', array_map( 'cbslugify', $category ) );
        $category = implode(', ',$category);
        ?>
<a class="grid-item partners__card <?=$catclass?>" href="<?=$url?>" target="_blank" rel="nofollow">
    <?=get_the_post_thumbnail(get_the_ID(),'large',['class' => 'partners__logo', 'alt' => get_the_title()])?>
    <div class="partners__inner"><?=get_field('description',get_the_ID())?></div>
</a>
        <?php
    }
wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php
set_query_var('cta_title', 'Interested in becoming a partner?');
set_query_var('cta_content', 'We have worked with a wide range of tech partners and we’re keen to work with partners who want to create great client outcomes for our mutual (or soon to be mutual) customers. Please contact us to discuss partnership possibilities.');
set_query_var('cta_link', ['url' => '/contact/', 'target' => 'self', 'title' => 'Get in Touch']);
// set_query_var('cta_background', 123); // Image ID

get_template_part('page-templates/blocks/cb_site-wide_cta');


add_action('wp_footer',function(){
    ?>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    // Get the select dropdown element
    const filterSelect = document.getElementById('filter-select');
    
    // Get all the grid items
    const gridItems = document.querySelectorAll('.grid-item');
    
    // Function to show/hide grid items based on the class
    function filterItems(filterClass) {
        gridItems.forEach(item => {
            if (filterClass === 'all' || item.classList.contains(filterClass)) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.classList.remove('hidden');
                }, 0);
            } else {
                item.classList.add('hidden');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 0);
            }
        });
    }

    // Add event listener to the select dropdown
    filterSelect.addEventListener('change', () => {
        const filterClass = filterSelect.value; // Use the selected value as the filter class
        filterItems(filterClass);
    });

});
    </script>
    <?php
},9999);