<?php
/**
 * Template Name: Custom Page Template
 * Description: A custom page template for the Saascada theme.
 *
 * @package WordPress
 * @subpackage Saascada2025
 * @since Saascada2025 1.0
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main">
    <?php
    the_post();
    the_content();
    ?>
</main>
<?php
get_footer();