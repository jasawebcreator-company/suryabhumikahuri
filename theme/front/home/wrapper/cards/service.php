<?php
$service_excerpt = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($service->content ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
$service_excerpt = $service_excerpt !== '' ? $service_excerpt : trim((string) ($service->custom_field_1 ?? ''));
$service_img = !empty($service->img_cover_url) ? $service->img_cover_url : ($service->img_thumb_url ?? '');
$service_link = !empty($service->slug) ? base_url(ROUTE_PRODUCT_VIEW . urlencode($service->slug)) : base_url('contact');
?>
<a class="service-card" href="<?= htmlspecialchars($service_link) ?>">
    <div class="service-media">
        <img src="<?= htmlspecialchars($service_img ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=80')  ?>" alt="<?= htmlspecialchars($service->title) ?>" loading="lazy">
        <span class="service-index"><?= str_pad($service_index, 2, '0', STR_PAD_LEFT) ?></span>
        <span class="service-symbol"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
    </div>
    <div class="service-body">
        <h3><?= htmlspecialchars($service->title) ?></h3>
        <p class="service-excerpt"><?= htmlspecialchars($service_excerpt) ?></p>
        <span class="service-link">Diskusikan kebutuhan <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
    </div>
</a>
