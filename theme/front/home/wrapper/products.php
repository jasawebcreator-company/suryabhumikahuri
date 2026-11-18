<?php
$item = $item ?? null;

$dummy_products = json_decode(json_encode([
    ['id' => 1, 'title' => 'Sistem Kelistrikan', 'slug' => 'sistem-kelistrikan', 'tags' => 'electrical', 'content' => '', 'img_cover_url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=900&q=80', 'custom_field_1' => 'Distribusi listrik, panel utama, pencahayaan, dan grounding bangunan.'],
    ['id' => 2, 'title' => 'Sistem HVAC', 'slug' => 'sistem-hvac', 'tags' => 'hvac', 'content' => '', 'img_cover_url' => 'https://images.unsplash.com/photo-1631545804984-1f4a5f1d2f3c?auto=format&fit=crop&w=900&q=80', 'custom_field_1' => 'Tata udara, ventilasi, dan pengondisian udara untuk kenyamanan operasional.'],
    ['id' => 3, 'title' => 'Sistem Plumbing', 'slug' => 'sistem-plumbing', 'tags' => 'plumbing', 'content' => '', 'img_cover_url' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=900&q=80', 'custom_field_1' => 'Jaringan air bersih, air buangan, dan drainase bangunan.'],
    ['id' => 4, 'title' => 'Proteksi Kebakaran', 'slug' => 'proteksi-kebakaran', 'tags' => 'fire protection', 'content' => '', 'img_cover_url' => 'https://images.unsplash.com/photo-1582139329536-e7284fece509?auto=format&fit=crop&w=900&q=80', 'custom_field_1' => 'Perlindungan kebakaran sesuai kebutuhan keselamatan dan fungsi bangunan.'],
]));

$products = !empty($item->data) ? $item->data : $dummy_products;

$products_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Empat sistem penting. <span>Satu pendekatan terintegrasi.</span>';
$products_subtitle = !empty($subtitle) ? $subtitle : 'Layanan Utama Kami';
$products_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Kami membantu setiap sistem bekerja selaras agar bangunan berfungsi aman, efisien, dan siap digunakan.';
?>
<style>
    .products {
        background: var(--color6);

        .products-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 2.75rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 390px;
            }
        }

        @media (max-width: 991.98px) {
            .products-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<section class="products" id="products" aria-labelledby="productsTitle">
    <div class="container-global">
        <div class="products-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= strip_tags($products_subtitle, '<span><em><strong><b><i><br>') ?></div>
                <h2 class="section-title" id="productsTitle"><?= $products_title ?></h2>
            </div>
            <p class="section-desc"><?= strip_tags($products_subtitle_2, '<span><em><strong><b><i><br>') ?></p>
        </div>

        <div class="row">
            <?php foreach ($products as $i => $product): ?>
                <div class="col-md-6 col-xl-4 mb-4" data-animate>
                    <?php $product_index = $i + 1; include __DIR__ . '/cards/product.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#products', { stagger: 0.1 });
    });
</script>
