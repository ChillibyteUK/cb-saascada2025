<?php
$txtcol = get_field('order') == 'Text/Video' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
$vidcol = get_field('order') == 'Text/Video' ? 'order-1 order-lg-1' : 'order-1 order-lg-2';

$txtcolwidth = get_field('split') == '50:50' ? 'col-lg-6' : 'col-lg-4';
$vidcolwidth = get_field('split') == '50:50' ? 'col-lg-6' : 'col-lg-8';

$bgcolour = get_field('background') ?: 'white';

$ccolour = get_field('content_colour') ? 'has-' . get_field('content_colour') . '-color' : '';
$csize = get_field('content_size') ?: 'fs-400';

$img = '<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png">';
// get thumb
// $img = wp_get_attachment_image(get_field('image'), 'full', false, array('class' => 'w-75 w-md-50 w-lg-100 mx-auto')) ?: '<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png">';

$anchor = isset($block['anchor']) ? $block['anchor'] : '';
if ($anchor) {
    ?>
<a id="<?=$anchor?>" class="anchor"></a>
<?php
}
?>
<section class="text_video py-5 bg--<?=$bgcolour?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?=$txtcolwidth?> d-flex flex-column justify-content-center align-items-start <?=$txtcol?>">
                <?php
    if (get_field('title') ?? null) {
        ?>
                <h2 class="mb-4 has-blue-400-color">
                    <?=get_field('title')?>
                </h2>
                <?php
    }
?>
                <div class="<?=$ccolour?> <?=$csize?>"><?=get_field('content')?></div>
            </div>
            <div
                class="<?=$vidcolwidth?> <?=$vidcol?> text_video__video">
                <div class="vimeo-embed ratio ratio-16x9" id="<?=get_field('vimeo_id')?>" title="VIDEO"></div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function(){
    ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const lazyVideos = document.querySelectorAll('.vimeo-embed, .youtube-embed');
  
  // Lazy load placeholder images
  lazyVideos.forEach(v => {
    const [poster, src] = v.classList.contains('vimeo-embed') ?
      [`vumbnail.com/${v.id}_large.jpg`, 'player.vimeo.com/video'] :
      [`i.ytimg.com/vi/${v.id}/hqdefault.jpg`, 'www.youtube.com/embed'];

    v.innerHTML = `<img src="https://${poster}" alt="${v.title}" aria-label="Play">`;

    v.children[0].addEventListener('click', () => {
        v.innerHTML = `<iframe allow="autoplay" src="https://${src}/${v.id}?autoplay=1" allowfullscreen></iframe>`;
        v.classList.add('video-loaded');
    });
  });

  // Preload the video iframes in the background after the page has loaded
  window.addEventListener('load', function() {
    lazyVideos.forEach(v => {
      const iframe = document.createElement('iframe');
      iframe.src = v.classList.contains('vimeo-embed') ?
        `https://player.vimeo.com/video/${v.id}` :
        `https://www.youtube.com/embed/${v.id}`;
      iframe.setAttribute('allowfullscreen', true);
      iframe.style.display = 'none'; // Keep it hidden until user clicks

      v.appendChild(iframe);
    });
  });
});
</script>
    <?php
});
