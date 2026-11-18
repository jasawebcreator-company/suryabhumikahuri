<?php
$single_hero_types = [
    'product' => ['crumb' => 'Layanan MEP', 'eyebrow' => 'Layanan MEP', 'cta' => 'Pelajari Layanan', 'suffix' => 'custom_field_2'],
    'service' => ['crumb' => 'Layanan MEP', 'eyebrow' => 'Ringkasan Layanan', 'cta' => 'Pelajari Layanan', 'suffix' => ''],
    'project' => ['crumb' => 'Proyek Kami', 'eyebrow' => 'Project Detail', 'cta' => 'Lihat Dokumentasi', 'suffix' => 'custom_field_1'],
];

$single_hero_type = $single_hero_types[$single_type] ?? $single_hero_types['product'];
$single_hero_result = $data->result ?? null;
$single_hero_title = trim((string) ($single_hero_result->title ?? ''));
$single_hero_img = trim((string) ($single_hero_result->img_cover_url ?? ''));
$single_hero_small = trim((string) ($single_hero_result->custom_field_1 ?? ''));
$single_hero_big = trim((string) ($single_hero_result->custom_field_2 ?? ''));
$single_hero_suffix = $single_hero_type['suffix'] !== '' ? trim((string) ($single_hero_result->{$single_hero_type['suffix']} ?? '')) : '';
$single_hero_eyebrow = $single_hero_type['eyebrow'] . ($single_hero_suffix !== '' ? ' / ' . $single_hero_suffix : '');
$single_hero_cat_link = base_url(ROUTE_PRODUCT . ($data->cat_data->slug ?? 'all'));

$single_hero_crumbs = [
    ['label' => 'Beranda', 'link' => base_url()],
    ['label' => $single_hero_type['crumb'], 'link' => $single_hero_cat_link],
    ['label' => $single_hero_title, 'link' => ''],
];
$single_hero_title_html = htmlspecialchars($single_hero_title) . '<span class="period">.</span>';
$single_hero_cta_label = $single_hero_type['cta'];
$single_hero_cta_url = '#singleDetail';
$single_hero_link_label = 'Konsultasi Proyek';
$single_hero_link_url = base_url('contact');

if (!empty($single_hero_custom)) {
    $single_hero_eyebrow = $single_hero_custom['eyebrow'] ?? $single_hero_eyebrow;
    $single_hero_title = $single_hero_custom['alt'] ?? strip_tags($single_hero_custom['title'] ?? $single_hero_title);
    $single_hero_title_html = strip_tags($single_hero_custom['title'] ?? $single_hero_title, '<span><em><strong><b><i><br>');
    $single_hero_img = $single_hero_custom['img'] ?? $single_hero_img;
    $single_hero_small = $single_hero_custom['small'] ?? '';
    $single_hero_big = $single_hero_custom['big'] ?? '';
    $single_hero_crumbs = $single_hero_custom['crumbs'] ?? $single_hero_crumbs;
    $single_hero_cta_label = $single_hero_custom['cta_label'] ?? $single_hero_cta_label;
    $single_hero_cta_url = $single_hero_custom['cta_url'] ?? $single_hero_cta_url;
    $single_hero_link_label = $single_hero_custom['link_label'] ?? $single_hero_link_label;
    $single_hero_link_url = $single_hero_custom['link_url'] ?? $single_hero_link_url;
}

if ($single_hero_img === '') {
    $single_hero_img = 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1400&q=80';
}
?>
<style>
    .single-hero {
        position: relative;
        min-height: min(760px, 100svh);
        padding-top: var(--header-height);
        background: var(--color3);
        color: var(--color10);
        isolation: isolate;
        overflow: hidden;

        .single-hero-mark {
            position: absolute;
            left: 4%;
            bottom: -12%;
            z-index: -1;
            color: rgba(255, 255, 255, 0.035);
            font-family: var(--primtext);
            font-size: clamp(280px, 38vw, 620px);
            font-weight: 800;
            line-height: 1;
            pointer-events: none;
        }

        .single-hero-photo {
            position: absolute;
            top: var(--header-height);
            bottom: 0;
            right: max(2rem, calc((100% - 1320px) / 2 + 2rem));
            width: 34%;
            overflow: hidden;
            background: var(--colors);

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: saturate(0.85);
            }

            &::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(0deg, rgba(24, 33, 39, 0.78) 0%, rgba(24, 33, 39, 0) 38%);
            }

            .single-hero-caption {
                position: absolute;
                left: 28px;
                right: 28px;
                bottom: 26px;
                z-index: 1;

                small {
                    display: block;
                    margin-bottom: 8px;
                    color: var(--color4);
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }

                strong {
                    display: block;
                    font-family: var(--primtext);
                    font-size: 17px;
                    font-weight: 800;
                    letter-spacing: -0.4px;
                }
            }
        }

        .container-global {
            display: flex;
            flex-direction: column;
            min-height: inherit;
            padding-top: 2.5rem;
            padding-bottom: 4.5rem;
        }

        .single-hero-crumb {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
            color: #e3e4e0;
            font-size: 13px;

            li:not(:last-child)::after {
                content: "/";
                margin-left: 14px;
                color: var(--color2);
            }

            a {
                color: #e3e4e0;
                transition: color 0.25s;

                &:hover {
                    color: var(--color4);
                }
            }
        }

        .single-hero-content {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: center;
            max-width: 52%;
            padding-top: 3rem;
        }

        .single-hero-eyebrow {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 26px;
            color: var(--color4);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2.1px;
            text-transform: uppercase;

            &::before {
                content: "";
                display: block;
                width: 36px;
                height: 1px;
                flex: none;
                background: currentColor;
            }
        }

        .single-hero-title {
            margin: 0 0 37px;
            font-size: clamp(38px, 4.4vw, 68px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -3px;

            span {
                color: var(--color4);

                &.period {
                    color: var(--color2);
                }
            }
        }

        .single-hero-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 31px;

            .hero-link {
                display: inline-flex;
                gap: 14px;
                padding-bottom: 8px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.5);
                color: var(--color10);
                font-size: 12px;
                font-weight: 700;
                transition: color 0.2s;

                &:hover {
                    color: var(--color4);
                }
            }
        }

        @media (max-width: 1199.98px) {
            padding-top: 76px;

            .single-hero-photo {
                top: 76px;
            }
        }

        @media (max-width: 991.98px) {
            min-height: 0;

            .single-hero-photo {
                position: relative;
                top: auto;
                right: auto;
                width: auto;
                height: 360px;
                margin: 0 1.25rem 3rem;
            }

            .single-hero-content {
                max-width: 100%;
            }

            .single-hero-title {
                letter-spacing: -2px;
            }
        }
    }
</style>

<section class="single-hero" id="singleHero" aria-labelledby="singleHeroTitle">
    <div class="single-hero-mark" aria-hidden="true">SBK</div>

    <div class="container-global">
        <ol class="single-hero-crumb" data-animate>
            <?php foreach ($single_hero_crumbs as $single_hero_crumb) : ?>
                <li>
                    <?php if (!empty($single_hero_crumb['link'])) : ?>
                        <a href="<?= htmlspecialchars($single_hero_crumb['link']) ?>"><?= htmlspecialchars($single_hero_crumb['label']) ?></a>
                    <?php else : ?>
                        <?= htmlspecialchars($single_hero_crumb['label']) ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>

        <div class="single-hero-content">
            <div class="single-hero-eyebrow" data-animate><?= htmlspecialchars($single_hero_eyebrow) ?></div>
            <h1 class="single-hero-title" id="singleHeroTitle" data-animate><?= $single_hero_title_html ?></h1>
            <div class="single-hero-actions" data-animate>
                <a class="btn-main is-gold" href="<?= htmlspecialchars($single_hero_cta_url) ?>"><?= htmlspecialchars($single_hero_cta_label) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                <a class="hero-link" href="<?= htmlspecialchars($single_hero_link_url) ?>"><?= htmlspecialchars($single_hero_link_label) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <div class="single-hero-photo">
        <img src="<?= htmlspecialchars($single_hero_img) ?>" alt="<?= htmlspecialchars($single_hero_title) ?>">
        <?php if ($single_hero_small !== '' || $single_hero_big !== '') : ?>
            <div class="single-hero-caption">
                <?php if ($single_hero_small !== '') : ?><small><?= htmlspecialchars($single_hero_small) ?></small><?php endif; ?>
                <?php if ($single_hero_big !== '') : ?><strong><?= htmlspecialchars($single_hero_big) ?></strong><?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Motion.animate(document.querySelector('#singleHero .single-hero-photo img'), { opacity: [0, 1], transform: ['scale(1.1)', 'scale(1)'] }, { duration: 1.6, ease: [0.22, 1, 0.36, 1] });

        animateEntrance('#singleHero', { stagger: 0.12 });
        animateHover('#singleHero .btn-main, #singleHero .hero-link', { y: -3 });
    });
</script>
