
<?php
$h = get_field('heading_level');
$hc = get_field('heading_class');
$pro = get_field('video_provider');
$uq = random_str(8);
$width = get_field('width');
?>
<!-- video -->
<section class="video py-5">
    <?php
if (get_field('show_background')) {
    ?>
    <div class="overlay--dots"></div>
        <?php
}
?>
    <div class="container-lg text-center">
        <?php
    if (get_field('title')) {
        echo '<' . $h . ' class="mb-4 ' . $hc . '">' . get_field('title') . '</' . $h . '>';
    }
?>
        <div class="video__container animated fadeIn <?=$width?> mx-auto" id="vidimg<?=$uq?>">
            <img src="<?=get_vimeo_data_from_id(get_field('video_id'), 'thumbnail_url')?>" class="video__image">
            <div class="play">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon__play.svg">
            </div>
        </div>
        <div class="ratio ratio-16x9 <?=$width?> mx-auto" id="video<?=$uq?>" style="display:none">
            <iframe id="vid<?=$uq?>" src="https://player.vimeo.com/video/<?=get_field('video_id')?>?byline=0&portrait=0" allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    const vidImg = document.getElementById("vidimg<?=$uq?>");
    const video = document.getElementById("video<?=$uq?>");
    const iframe = document.getElementById("vid<?=$uq?>");

    if (vidImg && video && iframe) {
        vidImg.addEventListener("click", function () {
            vidImg.style.transition = "opacity 0.2s ease-out";
            vidImg.style.opacity = "0";

            setTimeout(() => {
                vidImg.style.display = "none"; // Hide after fade out
                video.style.display = "block"; // Show video container
                iframe.src += "&autoplay=1"; // Append autoplay to iframe src
            }, 200); // Match fade-out duration
        });
    }
});
        </script>
    </div>
</section>
