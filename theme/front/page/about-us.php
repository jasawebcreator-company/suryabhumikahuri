<?php
$page_hero = [
    'eyebrow' => 'Profil Perusahaan',
    'title' => 'Tentang Surya Bhumi Kahuri',
    'desc' => 'Mengenal perusahaan dan pendekatan kerja yang berorientasi pada sistem bangunan.',
];

$about_company = [
    'eyebrow' => 'Our Company',
    'title' => 'Sistem bangunan membutuhkan <span>koordinasi yang tepat.</span>',
    'image' => 'https://jwc.gotra-resources.my.id/web-upload/1766491866-23-12-2025-pmYbfsaEyd5xBrvkV7u1Fi0KoMnOPAWt.webp',
    'alt' => 'Dokumentasi tim teknis Surya Bhumi Kahuri',
    'paragraphs' => [
        'Surya Bhumi Kahuri merupakan perusahaan jasa konstruksi dan MEP berbasis di Bali. Perusahaan didirikan pada tahun 2024 dengan layanan yang mencakup desain, pekerjaan sipil, arsitektur, pemeliharaan, serta Mechanical, Electrical, and Plumbing untuk sektor publik dan swasta.',
        'Fokus kami adalah menghadirkan solusi MEP yang terintegrasi dan memperlihatkan pengalaman proyek melalui dokumentasi yang nyata.',
    ],
    'link' => ['label' => 'Lihat portofolio', 'url' => base_url('category/proyek-kami')],
];

$about_vision = [
    'tag' => 'Visi',
    'title' => 'Arah yang kami bangun',
    'text' => 'Menjadi perusahaan konstruksi dan MEP yang unggul dan terpercaya melalui komitmen terhadap kualitas serta nilai kemanusiaan.',
];

$about_mission = [
    'tag' => 'Misi',
    'title' => 'Komitmen dalam pekerjaan',
    'items' => [
        'Mengutamakan mutu pekerjaan dan layanan kepada klien.',
        'Membangun kolaborasi profesional yang kompeten.',
        'Mengembangkan kualitas sumber daya manusia.',
        'Menjaga hubungan baik dengan mitra kerja dan investor.',
    ],
];

$about_approach = [
    'eyebrow' => 'Pendekatan Kami',
    'title' => 'Dari kebutuhan teknis <span>ke pelaksanaan lapangan.</span>',
    'steps' => [
        ['title' => 'Memahami kebutuhan', 'text' => 'Mempelajari fungsi bangunan, kebutuhan pengguna, serta lingkup pekerjaan.'],
        ['title' => 'Koordinasi sistem', 'text' => 'Menghubungkan kebutuhan mechanical, electrical, plumbing, dan sistem lain.'],
        ['title' => 'Pelaksanaan terarah', 'text' => 'Menjalankan instalasi dan dokumentasi sesuai lingkup proyek.'],
        ['title' => 'Pengujian dan evaluasi', 'text' => 'Memperhatikan kesiapan operasi serta kebutuhan pemeliharaan.'],
    ],
];

$about_cta = [
    'tag' => 'Project Consultation',
    'title' => 'Siap mendiskusikan kebutuhan proyek?',
    'text' => 'Jelaskan jenis bangunan, lokasi, dan kebutuhan sistem kepada tim Surya Bhumi Kahuri.',
    'label' => 'Konsultasi Proyek',
    'url' => base_url('contact'),
];
?>
<style>
    .about-company {
        background: var(--color10);

        .about-company-image {
            position: relative;
            height: 475px;
            background: #24333a;
            overflow: hidden;

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }

        .about-company-copy {
            .section-header {
                margin-bottom: 0;
            }

            .section-title {
                margin-bottom: 0;
            }

            p {
                margin: 24px 0 0;
                color: #59666a;
                font-size: 15px;
                line-height: 1.9;
            }

            .text-link {
                margin-top: 28px;
            }
        }

        @media (max-width: 991.98px) {
            .about-company-image {
                height: 365px;
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .about-company-image {
                height: 270px;
            }
        }
    }

    .about-direction {
        background: var(--color5);

        .container-global {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .about-panel {
            height: 100%;
            min-height: 245px;
            padding: 35px;
            background: var(--color10);
            border: 1px solid #e7e5df;
            transition: border-color 0.3s, box-shadow 0.3s;

            &:hover {
                border-color: var(--color2);
                box-shadow: 0 14px 35px rgba(24, 33, 39, 0.08);
            }

            .about-tag {
                color: #a8853e;
                font-size: 10px;
                font-weight: 800;
                letter-spacing: 0.17em;
                text-transform: uppercase;
            }

            h3 {
                margin: 13px 0;
                font-size: 23px;
                font-weight: 800;
                letter-spacing: -0.03em;
                line-height: 1.35;
            }

            p {
                margin: 0;
                color: #697177;
                font-size: 14px;
                line-height: 1.85;
            }

            ul {
                margin: 0;
                padding-left: 19px;
                color: #5f696e;
                font-size: 14px;
                line-height: 2;
            }
        }

        @media (max-width: 991.98px) {
            .about-panel {
                min-height: 0;
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .about-panel {
                padding: 26px;
            }
        }
    }

    .about-approach {
        background: var(--color10);

        .section-header {
            margin-bottom: 3rem;
        }

        .about-step {
            height: 100%;
            min-height: 235px;
            padding: 26px;
            border: 1px solid #e8e6e0;
            transition: border-color 0.3s, transform 0.3s;

            &:hover {
                border-color: var(--color2);
            }

            span {
                display: block;
                margin-bottom: 27px;
                color: #c09a53;
                font-family: var(--primtext);
                font-size: 27px;
                font-weight: 800;
            }

            h3 {
                margin-bottom: 10px;
                font-size: 18px;
                font-weight: 800;
            }

            p {
                margin: 0;
                color: #697176;
                font-size: 13px;
                line-height: 1.8;
            }
        }

        @media (max-width: 767.98px) {
            .about-step {
                min-height: 0;
            }
        }
    }

    .about-cta {
        background: #19252d;
        color: var(--color10);

        .container-global {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .about-cta-shell {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .about-tag {
            color: #dbb975;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.17em;
            text-transform: uppercase;
        }

        h2 {
            margin: 10px 0 12px;
            font-size: clamp(27px, 3vw, 40px);
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        p {
            max-width: 650px;
            margin: 0;
            color: #bfc8ca;
            font-size: 14px;
        }

        @media (max-width: 991.98px) {
            .about-cta-shell {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    }
</style>

<?php include __DIR__ . '/../partials/page_hero.php'; ?>

<section class="about-company" id="about-company" aria-labelledby="aboutCompanyTitle">
    <div class="container-global">
        <div class="row align-items-center">
            <div class="col-lg-6" data-animate>
                <div class="about-company-image">
                    <img src="<?= htmlspecialchars($about_company['image']) ?>" alt="<?= htmlspecialchars($about_company['alt']) ?>" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 about-company-copy">
                <div class="section-header" data-animate>
                    <div class="section-eyebrow"><?= htmlspecialchars($about_company['eyebrow']) ?></div>
                    <h2 class="section-title" id="aboutCompanyTitle"><?= $about_company['title'] ?></h2>
                </div>
                <?php foreach ($about_company['paragraphs'] as $about_paragraph): ?>
                    <p data-animate><?= htmlspecialchars($about_paragraph) ?></p>
                <?php endforeach; ?>
                <a class="text-link" href="<?= htmlspecialchars($about_company['link']['url']) ?>" data-animate><?= htmlspecialchars($about_company['link']['label']) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="about-direction" id="about-direction" aria-label="Visi dan misi">
    <div class="container-global">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0" data-animate>
                <div class="about-panel">
                    <span class="about-tag"><?= htmlspecialchars($about_vision['tag']) ?></span>
                    <h3><?= htmlspecialchars($about_vision['title']) ?></h3>
                    <p><?= htmlspecialchars($about_vision['text']) ?></p>
                </div>
            </div>
            <div class="col-lg-6" data-animate>
                <div class="about-panel">
                    <span class="about-tag"><?= htmlspecialchars($about_mission['tag']) ?></span>
                    <h3><?= htmlspecialchars($about_mission['title']) ?></h3>
                    <ul>
                        <?php foreach ($about_mission['items'] as $about_item): ?>
                            <li><?= htmlspecialchars($about_item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-approach" id="about-approach" aria-labelledby="aboutApproachTitle">
    <div class="container-global">
        <div class="section-header" data-animate>
            <div class="section-eyebrow"><?= htmlspecialchars($about_approach['eyebrow']) ?></div>
            <h2 class="section-title" id="aboutApproachTitle"><?= $about_approach['title'] ?></h2>
        </div>
        <div class="row">
            <?php foreach ($about_approach['steps'] as $about_index => $about_step): ?>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" data-animate>
                    <div class="about-step">
                        <span><?= str_pad($about_index + 1, 2, '0', STR_PAD_LEFT) ?></span>
                        <h3><?= htmlspecialchars($about_step['title']) ?></h3>
                        <p><?= htmlspecialchars($about_step['text']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-cta" id="about-cta" aria-labelledby="aboutCtaTitle">
    <div class="container-global">
        <div class="about-cta-shell" data-animate>
            <div>
                <span class="about-tag"><?= htmlspecialchars($about_cta['tag']) ?></span>
                <h2 id="aboutCtaTitle"><?= htmlspecialchars($about_cta['title']) ?></h2>
                <p><?= htmlspecialchars($about_cta['text']) ?></p>
            </div>
            <a class="btn-main is-gold" href="<?= htmlspecialchars($about_cta['url']) ?>"><?= htmlspecialchars($about_cta['label']) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#about-company', { stagger: 0.12 });
        animateEntrance('#about-direction', { stagger: 0.12 });
        animateEntrance('#about-approach', { stagger: 0.1 });
        animateEntrance('#about-cta');

        document.querySelectorAll('#about-company .about-company-image').forEach(function (media) {
            const image = media.querySelector('img');

            Motion.inView(media, function () {
                Motion.animate(image, { transform: ['scale(1.12)', 'scale(1)'] }, { duration: 1.4, ease: [0.22, 1, 0.36, 1] });
            }, { amount: 0.3 });
        });

        animateHover('#about-direction .about-panel', { y: -4 });
        animateHover('#about-approach .about-step', { y: -4 });
        animateHover('#about-cta .btn-main', { y: -3 });
    });
</script>
