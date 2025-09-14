<div class="photonic-flickr-gallery">
<?php foreach ($photos as $photo): 
    $src = "https://live.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_q.jpg";
    $full = "https://live.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_b.jpg";
?>
    <a href="<?= esc_url($full) ?>" class="glightbox" data-gallery="photonic">
        <img src="<?= esc_url($src) ?>" alt="<?= esc_attr($photo['title']) ?>" />
    </a>
<?php endforeach; ?>
</div>
