<?php
$dummy_blogs = json_decode(json_encode([
    ['id' => 1, 'title' => 'Apa Itu Sistem MEP Terintegrasi dan Mengapa Proyek Anda Membutuhkannya?', 'slug' => 'apa-itu-sistem-mep-terintegrasi', 'tags' => 'MEP & Building Systems', 'img_cover_url' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?auto=format&fit=crop&w=1000&q=80', 'created_at' => '2026-07-31 09:00:00', 'content' => '<p>Sistem bangunan bekerja sebagai satu kesatuan. Electrical, mechanical, dan plumbing perlu direncanakan agar saling mendukung.</p>'],
    ['id' => 2, 'title' => '7 Proyek Rumah Sakit yang Menunjukkan Pengalaman Surya Bhumi Kahuri', 'slug' => '7-proyek-rumah-sakit', 'tags' => 'Fasilitas Kesehatan', 'img_cover_url' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=1000&q=80', 'created_at' => '2026-07-31 09:00:00', 'content' => '<p>Fasilitas kesehatan membutuhkan koordinasi sistem bangunan yang cermat, dari listrik dan ventilasi hingga plumbing dan mobilitas vertikal.</p>'],
    ['id' => 3, 'title' => 'Mengenal Enam Sistem Bangunan yang Bekerja di Balik Layar', 'slug' => 'mengenal-enam-sistem-bangunan', 'tags' => 'Wawasan Teknis', 'img_cover_url' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1000&q=80', 'created_at' => '2026-07-31 09:00:00', 'content' => '<p>Banyak fasilitas yang terasa biasa bagi penghuni sebenarnya bergantung pada sistem teknis yang saling berkaitan.</p>'],
]));

$blogs = !empty($item->data) ? $item->data : $dummy_blogs;

$blogs_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Insight seputar <span>sistem bangunan.</span>';
$blogs_subtitle = !empty($subtitle) ? $subtitle : 'Wawasan Industri';
$blogs_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Konten edukatif untuk membantu pemilik proyek memahami peran sistem MEP dalam operasional bangunan.';
?>
<style>
    .blogs {
        background: var(--color5);

        .blogs-head {
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
                max-width: 420px;
            }
        }

        .blogs-foot {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }

        @media (max-width: 991.98px) {
            .blogs-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<section class="blogs" id="blogs" aria-labelledby="blogsTitle">
    <div class="container-global">
        <div class="blogs-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= strip_tags($blogs_subtitle, '<span><em><strong><b><i><br>') ?></div>
                <h2 class="section-title" id="blogsTitle"><?= $blogs_title ?></h2>
            </div>
            <p class="section-desc"><?= strip_tags($blogs_subtitle_2, '<span><em><strong><b><i><br>') ?></p>
        </div>

        <div class="row">
            <?php foreach ($blogs as $blog): ?>
                <div class="col-md-6 col-lg-4 mb-4" data-animate>
                    <?php include __DIR__ . '/cards/blog.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="blogs-foot" data-animate>
            <a class="text-link" href="<?= base_url('article-category/all') ?>">Lihat semua artikel dan wawasan <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#blogs', { stagger: 0.1 });
    });
</script>
