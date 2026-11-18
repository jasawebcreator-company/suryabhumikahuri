<?php
$profile = [
    'eyebrow' => 'Mengenal Surya Bhumi Kahuri',
    'title' => 'Lebih dari instalasi. <span>Kami memahami sistem bangunan.</span>',
    'image' => 'https://gotra-web.goapp.my.id/web-upload/demo4/1794909452-17-11-2026-KjSUHIBpEPqRev1wF08dsOa5ntzZb9YT.webp',
    'alt' => 'Tim Surya Bhumi Kahuri melakukan pemeriksaan pekerjaan instalasi',
    'caption' => ['tag' => 'Berorientasi pada detail', 'text' => 'Engineering yang berawal dari kebutuhan proyek.'],
    'paragraphs' => [
        'Setiap proyek memiliki tantangan teknis yang berbeda. Karena itu, kami mengutamakan koordinasi, ketelitian instalasi, dan integrasi antar sistem sejak tahap perencanaan hingga pelaksanaan.',
        'Berbasis di Bali, Surya Bhumi Kahuri menangani pekerjaan MEP untuk berbagai kebutuhan bangunan, termasuk fasilitas kesehatan, hospitality, sektor publik, dan proyek komersial.',
    ],
    'features' => [
        ['icon' => 'fa-solid fa-ruler-combined', 'text' => 'Perencanaan dan koordinasi teknis'],
        ['icon' => 'fa-solid fa-shield-halved', 'text' => 'Keselamatan dan pengendalian mutu'],
        ['icon' => 'fa-solid fa-screwdriver-wrench', 'text' => 'Instalasi dan dukungan pemeliharaan'],
    ],
    'link' => ['label' => 'Kenali Perusahaan', 'url' => base_url('about-us')],
];
$profile_tags = '<span><em><strong><b><i><br>';
?>
<style>
    .profile {
        background: var(--color6);

        .profile-media {
            position: relative;
            height: 585px;
            margin-right: 32px;

            &::before {
                content: "";
                position: absolute;
                z-index: 1;
                left: -23px;
                top: 25px;
                bottom: -22px;
                width: 23px;
                background: var(--color2);
            }

            .profile-pattern {
                position: absolute;
                right: -30px;
                top: -25px;
                z-index: 0;
                width: 175px;
                height: 155px;
                border: 1px solid #c3ad7a;
            }

            .profile-frame {
                position: relative;
                z-index: 1;
                height: 100%;
                overflow: hidden;
            }

            .profile-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                filter: saturate(0.85);
            }

            .profile-caption {
                position: absolute;
                right: 0;
                bottom: 0;
                z-index: 2;
                max-width: 290px;
                padding: 22px 24px;
                background: #1d2a31;
                color: var(--color10);

                span {
                    color: #d5b470;
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 0.16em;
                    text-transform: uppercase;
                }

                strong {
                    display: block;
                    margin-top: 7px;
                    font-family: var(--primtext);
                    font-size: 18px;
                    line-height: 1.4;
                }
            }
        }

        .profile-copy {
            padding-left: 1.5rem;

            .section-header {
                margin-bottom: 0;
            }

            .section-title {
                margin-bottom: 0;
            }

            .profile-text {
                margin: 22px 0 0;
                color: #5e666a;
                font-size: 14px;
                line-height: 1.92;
            }

            .profile-features {
                margin-top: 26px;
                border-top: 1px solid #d8d6cf;

                div {
                    display: flex;
                    align-items: center;
                    gap: 14px;
                    padding: 14px 0;
                    border-bottom: 1px solid #d8d6cf;
                    font-family: var(--primtext);
                    font-size: 13px;
                    font-weight: 700;

                    i {
                        color: #a8853e;
                        font-size: 18px;
                    }
                }
            }

            .text-link {
                margin-top: 2rem;
            }
        }

        @media (max-width: 991.98px) {
            .profile-media {
                height: 460px;
                margin: 10px 28px 3rem 20px;
            }

            .profile-copy {
                padding-left: 0;
            }
        }

        @media (max-width: 575.98px) {
            .profile-media {
                height: 390px;
                margin: 10px 8px 3rem 13px;

                .profile-caption {
                    max-width: 235px;
                    padding: 15px;

                    strong {
                        font-size: 15px;
                    }
                }
            }
        }
    }
</style>

<section class="profile" id="profile" aria-labelledby="profileTitle">
    <div class="container-global">
        <div class="row align-items-center">
            <div class="col-lg-6" data-animate>
                <div class="profile-media">
                    <div class="profile-frame">
                        <img class="profile-image" src="<?= htmlspecialchars($profile['image']) ?>" alt="<?= htmlspecialchars($profile['alt']) ?>" loading="lazy">
                    </div>
                    <div class="profile-pattern" aria-hidden="true"></div>
                    <div class="profile-caption">
                        <span><?= htmlspecialchars($profile['caption']['tag']) ?></span>
                        <strong><?= htmlspecialchars($profile['caption']['text']) ?></strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profile-copy">
                    <div class="section-header" data-animate>
                        <div class="section-eyebrow"><?= strip_tags($profile['eyebrow'], $profile_tags) ?></div>
                        <h2 class="section-title" id="profileTitle"><?= strip_tags($profile['title'], $profile_tags) ?></h2>
                    </div>
                    <?php foreach ($profile['paragraphs'] as $profile_paragraph): ?>
                        <p class="profile-text" data-animate><?= htmlspecialchars($profile_paragraph) ?></p>
                    <?php endforeach; ?>
                    <div class="profile-features" data-animate>
                        <?php foreach ($profile['features'] as $profile_feature): ?>
                            <div><i class="<?= $profile_feature['icon'] ?>" aria-hidden="true"></i><span><?= htmlspecialchars($profile_feature['text']) ?></span></div>
                        <?php endforeach; ?>
                    </div>
                    <a class="text-link" href="<?= htmlspecialchars($profile['link']['url']) ?>" data-animate><?= htmlspecialchars($profile['link']['label']) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#profile', { stagger: 0.12 });

        const media = document.querySelector('#profile .profile-media');
        const image = media.querySelector('.profile-image');

        Motion.inView(media, function () {
            Motion.animate(image, { transform: ['scale(1.12)', 'scale(1)'] }, { duration: 1.4, ease: [0.22, 1, 0.36, 1] });
        }, { amount: 0.3 });

        media.addEventListener('mouseenter', function () {
            Motion.animate(image, { transform: 'scale(1.05)' }, { duration: 0.6 });
        });

        media.addEventListener('mouseleave', function () {
            Motion.animate(image, { transform: 'scale(1)' }, { duration: 0.6 });
        });
    });
</script>
