<?php
/**
 * HubSpot Form Block Template
 *
 * This template renders a HubSpot form using data from custom fields.
 *
 * @package cb-saascada2025
 */

?>
<section class="hubspot_form">
    <div class="container-xl pb-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
	            <?php
				$e = get_field( 'hs_form' );
				// phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
				?>
                <!--[if lte IE 8]>
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                <![endif]-->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
					hbspt.forms.create({
						region: "<?= esc_js( $e['region'] ); ?>",
						portalId: "<?= esc_js( $e['portal_id'] ); ?>",
						formId: "<?= esc_js( $e['form_id'] ); ?>",
						// version: "V2_PRERELEASE",
					});
				</script>
				<?php
				// phpcs:enable WordPress.WP.EnqueuedResources.NonEnqueuedScript
				?>
            </div>
        </div>
    </div>
</section>