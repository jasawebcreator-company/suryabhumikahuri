<?php
$blog_months = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
$blog_img = !empty($blog->img_cover_url) ? $blog->img_cover_url : ($blog->img_thumb_url ?? '');
$blog_tag = !empty($blog->tags) ? $blog->tags : 'artikel';
$blog_time = !empty($blog->created_at) ? strtotime($blog->created_at) : false;
$blog_date = $blog_time ? date('j', $blog_time) . ' ' . $blog_months[(int) date('n', $blog_time)] . ' ' . date('Y', $blog_time) : '';
$blog_text = trim(preg_replace('/\s+/', ' ', strip_tags($blog->content ?? '')));
$blog_excerpt = mb_strimwidth($blog_text, 0, 120, '...');
?>
<a class="blog-card" href="<?= htmlspecialchars(base_url(ROUTE_BLOG_VIEW . urlencode($blog->slug))) ?>">
    <div class="blog-media">
        <img src="<?= htmlspecialchars($blog_img) ?>" alt="<?= htmlspecialchars($blog->title) ?>" loading="lazy">
    </div>
    <div class="blog-body">
        <div class="blog-meta">
            <span><?= htmlspecialchars($blog_tag) ?></span>
            <?php if ($blog_date !== ''): ?>
                <span class="dot"></span>
                <span><?= htmlspecialchars($blog_date) ?></span>
            <?php endif; ?>
        </div>
        <h3><?= htmlspecialchars($blog->title) ?></h3>
        <p><?= htmlspecialchars($blog_excerpt) ?></p>
        <span class="blog-more">Baca Selengkapnya <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
    </div>
</a>
