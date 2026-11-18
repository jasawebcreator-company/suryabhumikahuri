<?php
$dummy_projects = json_decode(json_encode([
    ['id' => 1, 'title' => 'Villa Taman Baruna', 'slug' => 'villa-taman-baruna', 'tags' => 'Hospitality', 'content' => '', 'img_cover_url' => 'https://gotra-web.goapp.my.id/web-upload/id/1790310447-25-09-2026-aOZzFMD0TNu17CdKjYhiPoUnSXec5mEV.webp', 'custom_field_1' => 'Nusa Dua, Bali', 'custom_field_2' => 'Pekerjaan instalasi mekanikal, elektrikal, dan plumbing untuk mendukung kebutuhan operasional villa.'],
    ['id' => 2, 'title' => 'Alltrue Hotel Seminyak', 'slug' => 'alltrue-hotel-seminyak', 'tags' => 'Hotel', 'content' => '', 'img_cover_url' => 'https://jwc.gotra-resources.my.id/web-upload/1784780195-23-07-2026-uCFdvTgOfQx86LkYiMWqzS5nBGIt71XZ.jpg', 'custom_field_1' => 'Seminyak, Bali', 'custom_field_2' => 'Pekerjaan MEP, infrastruktur telepon, dan sistem alarm kebakaran untuk fasilitas hotel.'],
    ['id' => 3, 'title' => 'Edition Nusa Dua', 'slug' => 'edition-nusa-dua', 'tags' => 'Hospitality', 'content' => '', 'img_cover_url' => 'https://jwc.gotra-resources.my.id/web-upload/1784780017-23-07-2026-XskIg8aAGxz7CEPvphrQV3jZwWbtLcdY.jpg', 'custom_field_1' => 'Nusa Dua, Bali', 'custom_field_2' => 'Instalasi sistem mekanikal kolam renang, perpipaan, sirkulasi air, serta pencahayaan.'],
]));

$projects = !empty($item->data) ? $item->data : $dummy_projects;

$projects_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Pengalaman nyata. <span>Bukti melalui pekerjaan.</span>';
$projects_subtitle = !empty($subtitle) ? $subtitle : 'Project Highlights';
$projects_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Sebagian proyek yang tercantum dalam portofolio Surya Bhumi Kahuri, dari hospitality hingga fasilitas publik.';
?>
<style>
    .projects {
        background: #eceae3;

        .projects-head {
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
                max-width: 480px;
            }
        }

        .projects-slider {
            margin: 0 -12px;

            .slick-slide {
                padding: 0 12px;
                outline: none;
            }
        }

        .projects-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            margin-top: 2rem;

            .projects-nav {
                display: flex;
                gap: 10px;

                &[hidden] {
                    display: none;
                }

                button {
                    display: grid;
                    place-items: center;
                    width: 46px;
                    height: 46px;
                    border: 1px solid #cfd4d6;
                    background: var(--color10);
                    color: var(--colors);
                    font-size: 13px;
                    cursor: pointer;
                    transition: background 0.25s, color 0.25s, border-color 0.25s;

                    &:hover {
                        background: var(--colors);
                        border-color: var(--colors);
                        color: var(--color2);
                    }
                }
            }
        }

        @media (max-width: 991.98px) {
            .projects-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<section class="projects" id="projects" aria-labelledby="projectsTitle">
    <div class="container-global">
        <div class="projects-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= strip_tags($projects_subtitle, '<span><em><strong><b><i><br>') ?></div>
                <h2 class="section-title" id="projectsTitle"><?= $projects_title ?></h2>
            </div>
            <p class="section-desc"><?= strip_tags($projects_subtitle_2, '<span><em><strong><b><i><br>') ?></p>
        </div>

        <div class="projects-slider" id="projectsSlider" data-animate>
            <?php foreach ($projects as $i => $project): ?>
                <div>
                    <?php $project_index = $i + 1; include __DIR__ . '/cards/project.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="projects-foot" data-animate>
            <div class="projects-nav" id="projectsNav">
                <button type="button" id="projectsPrev" aria-label="Proyek sebelumnya"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
                <button type="button" id="projectsNext" aria-label="Proyek berikutnya"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
            </div>
            <a class="text-link" href="<?= base_url('category/proyek-kami') ?>">Semua Portofolio <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#projects', { stagger: 0.1 });

        const slider = $('#projectsSlider');
        const nav = document.getElementById('projectsNav');
        const total = <?= count((array) $projects) ?>;

        slider.slick({
            arrows: false,
            dots: false,
            infinite: total > 3,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2, infinite: total > 2 } },
                { breakpoint: 768, settings: { slidesToShow: 1, infinite: total > 1 } }
            ]
        });

        function syncNav() {
            nav.hidden = total <= slider.slick('slickGetOption', 'slidesToShow');
        }

        slider.on('breakpoint reInit', syncNav);
        syncNav();

        $('#projectsPrev').on('click', function () {
            slider.slick('slickPrev');
        });

        $('#projectsNext').on('click', function () {
            slider.slick('slickNext');
        });

        animateHover('#projects .projects-nav button', { y: -2 });
    });
</script>
