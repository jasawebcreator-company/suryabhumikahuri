<?php
$blog_list_label = '';

if (!empty($data->tag_name)) {
    $blog_list_label = $data->tag_name;
} elseif (empty($data->is_all) && !empty($data->category_name) && $data->category_name !== 'all') {
    $blog_list_label = $data->category_name;
}

$page_hero = [
    'eyebrow' => 'Insight & Education',
    'title' => $blog_list_label === '' ? 'Insight seputar <span>sistem bangunan.</span>' : htmlspecialchars($blog_list_label),
    'desc' => 'Wawasan seputar perencanaan dan koordinasi sistem bangunan untuk pemilik serta pengelola proyek.',
    'image' => '',
    'breadcrumb' => array_values(array_filter([
        ['label' => 'Beranda', 'link' => base_url()],
        $blog_list_label === '' ? null : ['label' => 'Artikel', 'link' => base_url(ROUTE_BLOG . 'all')],
        ['label' => $blog_list_label === '' ? 'Artikel' : $blog_list_label, 'link' => ''],
    ])),
];

$blogs = isset($data->result) && is_array($data->result) ? $data->result : [];
$blogs_total = (int) ($data->result_count ?? count($blogs));
$blogs_pages = (int) ($data->pages ?? 1);
$blogs_current = max(1, (int) ($data->page_position ?? 1));
$blogs_base = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
?>

<?php include __DIR__ . '/partials/page_hero.php'; ?>

<style>
    .blog-list {
        background: var(--color5);

        .blog-list-toolbar {
            margin-bottom: 2.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--color9);
            color: #a8853e;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .blog-list-empty {
            padding: 4rem 1.5rem;
            background: var(--color10);
            color: #667178;
            font-size: 14px;
            text-align: center;

            i {
                display: block;
                margin-bottom: 1rem;
                color: #a8853e;
                font-size: 32px;
            }
        }

        .blog-list-pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 2.5rem;

            a,
            span {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                min-width: 46px;
                height: 46px;
                padding: 0 18px;
                background: var(--color10);
                color: var(--color7);
                font-family: var(--primtext);
                font-size: 12px;
                font-weight: 800;
                transition: background 0.25s, color 0.25s;
            }

            a:hover {
                background: var(--color6);
                color: var(--colors);
            }

            .is-active {
                background: var(--colors);
                color: var(--color10);
            }
        }
    }
</style>

<section class="blog-list" id="blogList" aria-label="Daftar artikel">
    <div class="container-global">
        <?php if (!empty($blogs)) : ?>
            <div class="blog-list-toolbar" data-animate><?= $blogs_total ?> Artikel</div>

            <div class="row">
                <?php foreach ($blogs as $blog) : ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-animate>
                        <?php include __DIR__ . '/home/wrapper/cards/blog.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($blogs_pages > 1) : ?>
                <nav class="blog-list-pagination" aria-label="Halaman artikel" data-animate>
                    <?php if ($blogs_current > 1) : ?>
                        <a href="<?= htmlspecialchars($blogs_base) ?>?page=<?= $blogs_current - 1 ?>"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Sebelumnya</a>
                    <?php endif; ?>
                    <?php for ($blogs_page = 1; $blogs_page <= $blogs_pages; $blogs_page++) : ?>
                        <?php if ($blogs_page === $blogs_current) : ?>
                            <span class="is-active"><?= $blogs_page ?></span>
                        <?php else : ?>
                            <a href="<?= htmlspecialchars($blogs_base) ?>?page=<?= $blogs_page ?>"><?= $blogs_page ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($blogs_current < $blogs_pages) : ?>
                        <a href="<?= htmlspecialchars($blogs_base) ?>?page=<?= $blogs_current + 1 ?>">Berikutnya <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        <?php else : ?>
            <div class="blog-list-empty" data-animate>
                <i class="fa-regular fa-newspaper" aria-hidden="true"></i>
                Belum ada artikel. Artikel baru akan segera dipublikasikan.
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#blogList', { stagger: 0.1 });
    });
</script>
