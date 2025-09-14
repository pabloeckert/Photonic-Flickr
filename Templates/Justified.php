<div class="photonic-flickr-gallery justified">
<?php foreach ($photos as $photo): 
    $src = "https://live.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_q.jpg";
    $full = "https://live.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_b.jpg";
?>
    <a href="<?= esc_url($full) ?>" class="glightbox" data-gallery="photonic">
        <img src="<?= esc_url($src) ?>" alt="<?= esc_attr($photo['title']) ?>" />
    </a>
<?php endforeach; ?>
</div>
<style>
.photonic-flickr-gallery.justified {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    justify-content: center;
}
.photonic-flickr-gallery.justified img {
    height: 150px;
    object-fit: cover;
}
</style>
