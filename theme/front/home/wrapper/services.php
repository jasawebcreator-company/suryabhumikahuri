<?php
$dummy_services = json_decode(json_encode([
    ['id' => 1, 'title' => 'Sistem Kelistrikan', 'slug' => 'sistem-kelistrikan', 'tags' => 'service', 'content' => '<p>Distribusi listrik, panel utama, pencahayaan, grounding, dan integrasi sistem kelistrikan bangunan.</p>', 'img_cover_url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=900&q=80'],
    ['id' => 2, 'title' => 'Sistem HVAC', 'slug' => 'sistem-hvac', 'tags' => 'service', 'content' => '<p>Solusi tata udara, ventilasi, dan pengondisian udara yang mendukung kenyamanan dan operasional.</p>', 'img_cover_url' => 'https://images.unsplash.com/photo-1631545804984-1f4a5f1d2f3c?auto=format&fit=crop&w=900&q=80'],
    ['id' => 3, 'title' => 'Sistem Plumbing', 'slug' => 'sistem-plumbing', 'tags' => 'service', 'content' => '<p>Jaringan air bersih, air buangan, drainase, serta instalasi perpipaan untuk kebutuhan bangunan.</p>', 'img_cover_url' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=900&q=80'],
    ['id' => 4, 'title' => 'Proteksi Kebakaran', 'slug' => 'proteksi-kebakaran', 'tags' => 'service', 'content' => '<p>Sistem perlindungan kebakaran yang direncanakan sesuai kebutuhan keselamatan dan fungsi bangunan.</p>', 'img_cover_url' => 'https://images.unsplash.com/photo-1582139329536-e7284fece509?auto=format&fit=crop&w=900&q=80'],
]));

$support_services = [
    ['label' => 'Elektronik & Keamanan', 'slug' => 'sistem-elektronik-dan-keamanan'],
    ['label' => 'Lift & Elevator', 'slug' => 'sistem-lift-dan-elevator'],
];

$services = !empty($item->data) ? $item->data : $dummy_services;

$services_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Empat sistem penting. <span>Satu pendekatan terintegrasi.</span>';
$services_subtitle = !empty($subtitle) ? $subtitle : 'Layanan Utama Kami';
$services_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Kami membantu setiap sistem bekerja selaras agar bangunan berfungsi aman, efisien, dan siap digunakan.';
?>
<style>
    .services {
        position: relative;
        background: var(--color10);
        color: var(--color7);
        overflow: hidden;

        .services-head {
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
                max-width: 415px;
            }
        }

        .services-support {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px 28px;
            margin-top: 1rem;
            padding-top: 1.6rem;
            border-top: 1px solid var(--color9);

            span {
                color: #a8853e;
                font-size: 10px;
                font-weight: 800;
                letter-spacing: 2px;
            }

            a {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                color: var(--colors);
                font-size: 13px;
                font-weight: 700;
                transition: color 0.2s;

                &:hover {
                    color: #a8853e;
                }
            }
        }

        @media (max-width: 991.98px) {
            .services-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<section class="services" id="services" aria-labelledby="servicesTitle">
    <div class="container-global">
        <div class="services-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= strip_tags($services_subtitle, '<span><em><strong><b><i><br>') ?></div>
                <h2 class="section-title" id="servicesTitle"><?= $services_title ?></h2>
            </div>
            <p class="section-desc"><?= strip_tags($services_subtitle_2, '<span><em><strong><b><i><br>') ?></p>
        </div>

        <div class="row">
            <?php foreach ($services as $i => $service): ?>
                <div class="col-md-6 col-xl-3 mb-4" data-animate>
                    <?php $service_index = $i + 1; include __DIR__ . '/cards/service.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="services-support" data-animate>
            <span>LAYANAN PENDUKUNG</span>
            <?php foreach ($support_services as $support_service): ?>
                <a href="<?= htmlspecialchars(base_url(ROUTE_PRODUCT_VIEW . $support_service['slug'])) ?>"><?= htmlspecialchars($support_service['label']) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#services', { stagger: 0.1 });
    });
</script>
