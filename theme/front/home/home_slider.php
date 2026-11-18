<?php
$hero = $item->data->{1} ?? null;

$hero_images = [];

foreach ((array) ($item->data ?? []) as $hero_slide) {
    if (!empty($hero_slide->img)) {
        $hero_images[] = $hero_slide->img;
    }
}

if (empty($hero_images)) {
    $hero_images[] = 'https://gotra-web.goapp.my.id/web-upload/id/1790310447-25-09-2026-aOZzFMD0TNu17CdKjYhiPoUnSXec5mEV.webp';
}

$hero_title = !empty($hero->title) ? ($hero->title) : 'Bangunan yang andal dimulai dari <em>sistem yang tepat.</em>';
$hero_text = !empty($hero->text) ? $hero->text : 'Surya Bhumi Kahuri menghadirkan perencanaan dan instalasi sistem kelistrikan, HVAC, plumbing, serta proteksi kebakaran untuk kebutuhan proyek komersial dan fasilitas publik.';
$hero_cta_label = !empty($hero->text_url) ? $hero->text_url : 'Jelajahi Layanan';
$hero_cta_url = !empty($hero->url) ? $hero->url : '#services';
?>
<style>
    .hero {
        position: relative;
        height: 900px;
        min-height: 680px;
        background: var(--color3);
        color: var(--color10);
        isolation: isolate;
        overflow: hidden;

        &::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(90deg, rgba(24, 33, 39, 1) 0%, rgba(24, 33, 39, 0.98) 34%, rgba(24, 33, 39, 0.79) 53%, rgba(24, 33, 39, 0.3) 74%, rgba(24, 33, 39, 0.3) 100%);
        }

        .hero-photo {
            position: absolute;
            inset: 0 0 0 43%;
            z-index: -2;
            background: var(--color3);
            filter: saturate(0.77) contrast(1.05);
            overflow: hidden;

            &:not(.slick-initialized) .hero-slide:not(:first-child) {
                display: none;
            }

            .slick-list,
            .slick-track {
                height: 100%;
            }

            .hero-slide {
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                outline: none;
            }

            .slick-active .hero-slide {
                animation: heroZoom 5s ease-out forwards;
            }
        }

        .hero-grain {
            position: absolute;
            inset: 0;
            opacity: 0.17;
            pointer-events: none;
            background-image: radial-gradient(#cfc8a5 0.52px, transparent 0.52px);
            background-size: 7px 7px;
            mask-image: linear-gradient(90deg, #000, transparent 60%);
        }

        .container-global {
            position: relative;
            height: 100%;
            padding-top: 0;
            padding-bottom: 0;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding-bottom: 20px;
        }

        .hero-eyebrow {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 26px;
            color: #e0c58a;
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

            .dot {
                width: 3px;
                height: 3px;
                border-radius: 50%;
                background: currentColor;
            }
        }

        .hero-title {
            margin: 0 0 27px;
            font-size: clamp(48px, 5vw, 78px);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -3.6px;

            em {
                font-style: normal;
                color: var(--color4);
            }

            .period {
                color: var(--color2);
            }
        }

        .hero-desc {
            max-width: 530px;
            margin: 0 0 37px;
            color: #e3e4e0;
            font-size: 15px;
            line-height: 1.86;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 31px;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 26px;
            margin: 36px 0 0;
            padding: 0;
            list-style: none;
            color: #d3dadd;
            font-size: 12px;
            font-weight: 600;

            i {
                margin-right: 6px;
                color: var(--color2);
            }
        }

        .hero-link {
            display: inline-flex;
            gap: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.58);
            color: var(--color10);
            font-size: 12px;
            font-weight: 700;
            transition: color 0.2s;

            &:hover {
                color: var(--color4);
            }
        }

        .hero-side-note {
            position: absolute;
            right: 28px;
            top: 50%;
            transform: translateY(-50%);
            writing-mode: vertical-rl;
            color: #e0c58a;
            font-size: 9px;
            letter-spacing: 2px;
        }

        .hero-scroll {
            position: absolute;
            left: 2rem;
            bottom: 29px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: #d5ccb1;
            font-size: 9px;
            letter-spacing: 1.9px;

            .scroll-line {
                width: 38px;
                height: 1px;
                background: #c0b28b;
            }
        }

        .hero-caption {
            position: absolute;
            right: 5.8%;
            bottom: 29px;
            color: #e3e4e0;
            font-size: 9px;
            letter-spacing: 1.6px;

            .tiny-square {
                display: inline-block;
                width: 6px;
                height: 6px;
                margin-right: 8px;
                background: var(--color2);
            }
        }

        @media (max-width: 991.98px) {
            height: 900px;
            min-height: 0;

            .hero-photo {
                left: 30%;
                opacity: 0.7;
            }

            &::before {
                background: linear-gradient(90deg, rgba(24, 33, 39, 0.98), rgba(24, 33, 39, 0.86) 54%, rgba(24, 33, 39, 0.38));
            }
        }

        @media (max-width: 767.98px) {
            height: 800px;
            min-height: 640px;

            .hero-photo {
                inset: 0;
                background-position: 60% center;
                opacity: 0.48;
            }

            &::before {
                background: linear-gradient(90deg, rgba(24, 33, 39, 0.97), rgba(24, 33, 39, 0.77));
            }

            .container-global {
                min-height: 640px;
            }

            .hero-content {
                padding: 70px 0 85px;
            }

            .hero-title {
                font-size: clamp(40px, 10vw, 56px);
                letter-spacing: -2.2px;
            }

            .hero-desc {
                font-size: 13px;
                line-height: 1.8;
            }

            .hero-actions {
                gap: 26px;
            }

            .hero-caption {
                display: none;
            }

            .hero-scroll {
                left: 1.25rem;
                bottom: 21px;
            }
        }

        @media (max-width: 420px) {
            .hero-title {
                font-size: 38px;
            }

            .hero-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 21px;
            }
        }
    }

    @keyframes heroZoom {
        from {
            transform: scale(1.08);
        }

        to {
            transform: scale(1);
        }
    }
</style>

<section class="hero" id="hero" aria-labelledby="heroTitle">
    <div class="hero-photo" id="heroPhoto" role="img" aria-label="<?= htmlspecialchars(strip_tags($hero_title), ENT_QUOTES) ?>">
        <?php foreach ($hero_images as $hero_image): ?>
            <div class="hero-slide" style="background-image: url('<?= htmlspecialchars($hero_image, ENT_QUOTES) ?>')"></div>
        <?php endforeach; ?>
    </div>
    <div class="hero-grain" aria-hidden="true"></div>
    <div class="container-global">
        <div class="hero-content col-xl-7 col-lg-8 px-0">
            <div class="hero-eyebrow" data-animate>
                KONTRAKTOR MEP PROFESIONAL DI BALI
            </div>
            <h1 class="hero-title" id="heroTitle" data-animate><?= $hero_title ?></h1>
            <p class="hero-desc" data-animate><?= htmlspecialchars($hero_text) ?></p>
            <div class="hero-actions" data-animate>
                <a class="btn-main is-gold" href="<?= htmlspecialchars($hero_cta_url) ?>"><?= htmlspecialchars($hero_cta_label) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                <a class="hero-link" href="#projects">Lihat Portofolio <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
            <ul class="hero-points" data-animate>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Sistem terintegrasi</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Fokus keselamatan</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Pendekatan teknis</li>
            </ul>
        </div>
        <div class="hero-side-note d-none d-lg-block" aria-hidden="true">PRECISION BUILT SYSTEMS / SURYA BHUMI KAHURI</div>
        <div class="hero-scroll" aria-hidden="true"><span class="scroll-line"></span> SCROLL UNTUK MENJELAJAHI</div>
    </div>
    <div class="hero-caption" aria-hidden="true"><span class="tiny-square"></span> ENGINEERING IN ACTION</div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photo = document.querySelector('#hero .hero-photo');

        Motion.animate(photo, { opacity: [0, 1] }, { duration: 1.6, ease: [0.22, 1, 0.36, 1] });

        <?php if (count($hero_images) > 1): ?>
        $('#heroPhoto').slick({
            arrows: false,
            dots: false,
            fade: true,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            pauseOnFocus: false
        });
        <?php endif; ?>

        animateEntrance('#hero', { stagger: 0.15 });
        animateHover('#hero .btn-main, #hero .hero-link', { y: -3 });
    });
</script>
