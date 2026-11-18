<?php
$product_desc = !empty($product->custom_field_1) ? $product->custom_field_1 : trim(strip_tags($product->content ?? ''));
$product_tag = !empty($product->tags) ? $product->tags : 'product';
$product_link =  base_url('view/' .urlencode($product->slug));
?>
<a class="product-card" href="<?= htmlspecialchars($product_link) ?>">
    <img src="<?= htmlspecialchars($product->img_cover_url ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=80') ?>" alt="<?= htmlspecialchars($product->title) ?>" loading="lazy">
    <div class="product-shade"></div>
    <div class="product-top">
        <span><?= str_pad($product_index, 2, '0', STR_PAD_LEFT) ?> / <?= htmlspecialchars($product_tag) ?></span>
        <span class="product-plus"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
    </div>
    <div class="product-bottom">
        <h3><?= htmlspecialchars($product->title) ?></h3>
        <div><?= $product->content ?></div>
        <span class="product-link">Konsultasi Produk <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
    </div>
</a>
