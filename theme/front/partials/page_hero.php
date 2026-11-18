<?php
$page_hero_result = isset($data->result) && is_object($data->result) ? $data->result : null;
$page_hero_title = $page_hero_result && !empty($page_hero_result->title) ? $page_hero_result->title : '';
$page_hero_tags = '<span><em><strong><b><i><br>';

$page_hero = array_merge([
    'eyebrow' => isset($data->web->site_name) && $data->web->site_name !== '' ? $data->web->site_name : 'Surya Bhumi Kahuri',
    'title' => $page_hero_title,
    'desc' => '',
    'image' => '',
    'breadcrumb' => null,
], isset($page_hero) ? (array) $page_hero : []);

if (!empty($page_hero['kicker'])) {
    $page_hero['eyebrow'] = $page_hero['kicker'];
}

if (!empty($page_hero['accent'])) {
    $page_hero['title'] = trim($page_hero['title'] . ' <span>' . $page_hero['accent'] . '</span>');
}

if (trim((string) $page_hero['title']) === '') {
    $page_hero['title'] = 'Halaman';
}

if (!is_array($page_hero['breadcrumb'])) {
    $page_hero['breadcrumb'] = [
        ['label' => 'Beranda', 'link' => base_url()],
        ['label' => trim(strip_tags($page_hero['title'])), 'link' => ''],
    ];
}

$page_hero = json_decode(json_encode($page_hero));
?>

<style>
    .page-hero {
        position: relative;
        min-height: calc(320px + var(--header-height));
        padding-top: var(--header-height);
        background: #19252d;
        color: var(--color10);
        overflow: hidden;

        &::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, transparent 72%, rgba(201, 165, 92, 0.1)),
                repeating-linear-gradient(0deg, transparent 0, transparent 57px, rgba(255, 255, 255, 0.035) 58px, transparent 59px),
                repeating-linear-gradient(90deg, transparent 0, transparent 57px, rgba(255, 255, 255, 0.035) 58px, transparent 59px);
            pointer-events: none;
        }

        .container-global {
            position: relative;
            z-index: 1;
            padding-top: 5rem;
            padding-bottom: 3.9rem;
        }

        .page-hero-content {
            max-width: 920px;
        }

        .page-hero-anim {
            opacity: 0;
        }

        .section-header {
            margin-bottom: 0;

            .section-eyebrow {
                margin-bottom: 19px;
                color: #dfbf78;
            }

            .section-title {
                max-width: 920px;
                margin-bottom: 20px;
                font-size: clamp(35px, 4.3vw, 62px);
                letter-spacing: -0.055em;
                line-height: 1.15;
            }

            .section-desc {
                max-width: 690px;
                color: #cbd1d2;
                font-size: 15px;
                line-height: 1.85;
            }
        }

        .page-hero-breadcrumb {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 11px;
            margin: 34px 0 0;
            padding: 0;
            list-style: none;
            color: #d8d7d0;
            font-size: 11px;

            li {
                display: inline-flex;
                align-items: center;
                gap: 11px;

                &:not(:last-child)::after {
                    content: "\f054";
                    color: #8c9396;
                    font-family: "Font Awesome 6 Free";
                    font-size: 9px;
                    font-weight: 900;
                }
            }

            a {
                color: #d3b478;
                transition: color 0.25s;

                &:hover {
                    color: var(--color10);
                }
            }
        }

        @media (max-width: 1199.98px) {
            min-height: calc(320px + 76px);
            padding-top: 76px;
        }

        @media (max-width: 991.98px) {
            .container-global {
                padding-top: 4rem;
                padding-bottom: 3rem;
            }
        }

        @media (max-width: 575.98px) {
            .container-global {
                padding-top: 3.4rem;
                padding-bottom: 2.7rem;
            }

            .section-header .section-title {
                font-size: 34px;
            }
        }
    }
</style>

<section class="page-hero" id="pageHero" aria-labelledby="pageHeroTitle">
    <div class="container-global">
        <div class="page-hero-content">
            <div class="section-header is-light">
                <?php if (!empty($page_hero->eyebrow)) : ?>
                    <div class="section-eyebrow page-hero-anim"><?= strip_tags($page_hero->eyebrow, $page_hero_tags) ?></div>
                <?php endif; ?>
                <h1 class="section-title page-hero-anim" id="pageHeroTitle"><?= strip_tags($page_hero->title, $page_hero_tags) ?></h1>
                <?php if (!empty($page_hero->desc)) : ?>
                    <p class="section-desc page-hero-anim"><?= strip_tags($page_hero->desc, $page_hero_tags) ?></p>
                <?php endif; ?>
            </div>

            <?php if (!empty($page_hero->breadcrumb)) : ?>
                <ol class="page-hero-breadcrumb page-hero-anim">
                    <?php foreach ($page_hero->breadcrumb as $crumb) : ?>
                        <?php if (empty($crumb->label)) continue; ?>
                        <li>
                            <?php if (!empty($crumb->link)) : ?>
                                <a href="<?= htmlspecialchars($crumb->link) ?>"><?= htmlspecialchars($crumb->label) ?></a>
                            <?php else : ?>
                                <span><?= htmlspecialchars($crumb->label) ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Motion.animate(
            document.querySelectorAll('#pageHero .page-hero-anim'),
            { opacity: [0, 1], transform: ['translateY(28px)', 'translateY(0px)'] },
            { duration: 0.8, delay: Motion.stagger(0.12, { startDelay: 0.15 }), ease: [0.22, 1, 0.36, 1] }
        );
    });
</script>
