<?php
$products_tags = '<span><em><strong><b><i><br>';
$products_cat = $data->cat_data ?? null;
$products_cat_id = (string) ($products_cat->id ?? '');

$products_types = [
    '8520' => [
        'card' => 'product',
        'col' => 'col-md-6 col-xl-4',
        'hero_eyebrow' => 'Layanan MEP',
        'hero_cta' => 'Jelajahi Layanan',
        'eyebrow' => 'Layanan Utama Kami',
        'title' => 'Empat sistem penting. <span>Satu pendekatan terintegrasi.</span>',
        'desc' => 'Kami membantu setiap sistem bekerja selaras agar bangunan berfungsi aman, efisien, dan siap digunakan.',
    ],
    '8522' => [
        'card' => 'service',
        'col' => 'col-md-6 col-xl-3',
        'hero_eyebrow' => 'Layanan MEP',
        'hero_cta' => 'Lihat Layanan',
        'eyebrow' => 'Layanan Utama Kami',
        'title' => 'Empat sistem penting. <span>Satu pendekatan terintegrasi.</span>',
        'desc' => 'Kami membantu setiap sistem bekerja selaras agar bangunan berfungsi aman, efisien, dan siap digunakan.',
    ],
    '8523' => [
        'card' => 'project',
        'col' => 'col-md-6',
        'hero_eyebrow' => 'Project Portfolio',
        'hero_cta' => 'Lihat Proyek',
        'eyebrow' => 'Project Highlights',
        'title' => 'Pengalaman nyata. <span>Bukti melalui pekerjaan.</span>',
        'desc' => 'Dokumentasi keterlibatan Surya Bhumi Kahuri pada proyek kesehatan, hospitality, fasilitas publik, komersial, dan residensial.',
    ],
];

$products_list = isset($data->result) && is_array($data->result) ? $data->result : [];

if (!isset($products_types[$products_cat_id])) {
    $products_first_tags = strtolower((string) ($products_list[0]->tags ?? ''));
    $products_cat_hint = strtolower((string) ($products_cat->name ?? $data->category_name ?? ''));
    if (strpos($products_first_tags . ' ' . $products_cat_hint, 'service') !== false || strpos($products_cat_hint, 'layanan') !== false) {
        $products_cat_id = '8522';
    } else {
        $products_cat_id = '8523';
    }
}

$products_type = $products_types[$products_cat_id];

$products_hero_title = trim((string) ($products_cat->custom_field_1 ?? ''));
$products_hero_desc = trim((string) ($products_cat->custom_field_2 ?? ''));

if ($products_hero_title === '') {
    $products_hero_title = $products_cat_id === '8522' ? 'Bangunan yang andal dimulai dari <em>sistem yang tepat.</em>' : 'Proyek Kami';
} elseif ($products_hero_title === strip_tags($products_hero_title)) {
    $products_hero_words = preg_split('/\s+/', $products_hero_title);
    $products_hero_split = max(0, count($products_hero_words) - 2);
    $products_hero_title = htmlspecialchars(implode(' ', array_slice($products_hero_words, 0, $products_hero_split)));
    $products_hero_title .= ($products_hero_split ? ' ' : '') . '<em>' . htmlspecialchars(implode(' ', array_slice($products_hero_words, $products_hero_split))) . '</em>';
}

if ($products_hero_desc === '') {
    $products_hero_desc = $products_cat_id === '8522' ? 'Perencanaan dan instalasi sistem kelistrikan, HVAC, plumbing, serta proteksi kebakaran untuk kebutuhan proyek komersial dan fasilitas publik.' : 'Dokumentasi keterlibatan Surya Bhumi Kahuri pada proyek kesehatan, hospitality, fasilitas publik, komersial, dan residensial.';
}

$products_cat_name = !empty($data->category_name) && $data->category_name !== 'all' ? $data->category_name : 'Proyek Kami';

$products_total = (int) ($data->result_count ?? count($products_list));
$products_pages = (int) ($data->pages ?? 1);
$products_current = max(1, (int) ($data->page_position ?? 1));
$page_hero = [
    'eyebrow' => $products_type['hero_eyebrow'],
    'title' => str_replace(['<em>', '</em>'], ['<span>', '</span>'], $products_hero_title),
    'desc' => $products_hero_desc,
    'breadcrumb' => [
        ['label' => 'Beranda', 'link' => base_url()],
        ['label' => $products_cat_name, 'link' => ''],
    ],
];

$products_base = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
?>
<style>
    .product-list {
        background: var(--color5);

        .product-list-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 2.75rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--color9);

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 430px;
            }
        }

        .product-list-empty {
            padding: 4rem 1.5rem;
            background: var(--color10);
            color: #667178;
            font-size: 14px;
            text-align: center;
        }

        .product-list-pagination {
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

        @media (max-width: 991.98px) {
            .product-list-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<?php include __DIR__ . '/partials/page_hero.php'; ?>

<section class="product-list" id="productList" aria-labelledby="productListTitle">
    <div class="container-global">
        <div class="product-list-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= htmlspecialchars($products_type['eyebrow']) ?></div>
                <h2 class="section-title" id="productListTitle"><?= $products_type['title'] ?></h2>
            </div>
            <p class="section-desc"><?= htmlspecialchars($products_type['desc']) ?></p>
        </div>

        <?php if (!empty($products_list)) : ?>
            <div class="row">
                <?php foreach ($products_list as $i => $products_item) : ?>
                    <div class="<?= $products_type['col'] ?> mb-4" data-animate>
                        <?php
                        ${$products_type['card']} = $products_item;
                        ${$products_type['card'] . '_index'} = $i + 1;
                        include __DIR__ . '/home/wrapper/cards/' . $products_type['card'] . '.php';
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($products_pages > 1) : ?>
                <nav class="product-list-pagination" aria-label="Halaman" data-animate>
                    <?php if ($products_current > 1) : ?>
                        <a href="<?= htmlspecialchars($products_base) ?>?page=<?= $products_current - 1 ?>"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Sebelumnya</a>
                    <?php endif; ?>
                    <?php for ($products_page = 1; $products_page <= $products_pages; $products_page++) : ?>
                        <?php if ($products_page === $products_current) : ?>
                            <span class="is-active"><?= $products_page ?></span>
                        <?php else : ?>
                            <a href="<?= htmlspecialchars($products_base) ?>?page=<?= $products_page ?>"><?= $products_page ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($products_current < $products_pages) : ?>
                        <a href="<?= htmlspecialchars($products_base) ?>?page=<?= $products_current + 1 ?>">Berikutnya <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        <?php else : ?>
            <div class="product-list-empty" data-animate>Data akan segera tersedia. Hubungi tim kami untuk informasi lebih lanjut.</div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#productList', { stagger: 0.1 });
    });
</script>
