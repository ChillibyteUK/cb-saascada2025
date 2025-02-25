<section class="hubspot_form">
    <div class="container-xl pb-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
            <?php
                $e = get_field('hs_form');
                ?>
                <!--[if lte IE 8]>
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                <![endif]-->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
                hbspt.forms.create({
                    region: "<?=$e['region']?>",
                    portalId: "<?=$e['portal_id']?>",
                    formId: "<?=$e['form_id']?>",
                    // version: "V2_PRERELEASE",
                });
                </script>
            </div>
        </div>
    </div>
</section>