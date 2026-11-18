<?php
$parallax = json_decode(json_encode([
    'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2000&q=80',
    'eyebrow' => !empty($subtitle) ? $subtitle : 'Engineering with Purpose',
    'title' => !empty($title) ? $title : 'Sistem yang tepat.<br><em>Bangunan yang andal.</em>',
    'description' => !empty($subtitle_2) ? $subtitle_2 : 'Perencanaan, koordinasi, dan instalasi sistem bangunan yang terarah untuk proyek Anda.',
]));
?>

<style>
    .parallax-section {
        position: relative;
        display: flex;
        align-items: center;
        min-height: 430px;
        overflow: hidden;
        isolation: isolate;
        background: var(--color4);

        [data-reveal] {
            opacity: 0;
        }

        .parallax-bg {
            position: absolute;
            inset: -18% 0;
            z-index: -2;
            background-size: cover;
            background-position: center 58%;
            will-change: transform;
        }

        .parallax-overlay {
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(rgba(4, 55, 62, 0.82), rgba(4, 55, 62, 0.86));
        }

        .container-global {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .section-header {
            margin-bottom: 0;

            .section-title {
                font-size: clamp(36px, 4.8vw, 63px);
                margin-bottom: 1.25rem;

                em {
                    display: inline-block;
                }
            }

            .section-desc {
                max-width: 480px;
                font-size: 13px;
                line-height: 1.8;
                color: #e3eeeb;
            }
        }

        @media (max-width: 767px) {
            min-height: 0;

            .container-global {
                padding-top: 4.5rem;
                padding-bottom: 4.5rem;
            }
        }
    }
</style>

<section class="parallax-section" id="parallax">
    <div class="parallax-bg" style="background-image: url('<?= $parallax->image ?>')"></div>
    <div class="parallax-overlay"></div>

    <div class="container-global">
        <div class="section-header center light">
            <p class="section-eyebrow" data-reveal><?= htmlspecialchars($parallax->eyebrow) ?></p>
            <h2 class="section-title" data-reveal><?= $parallax->title ?></h2>
            <p class="section-desc" data-reveal><?= htmlspecialchars($parallax->description) ?></p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const { animate, stagger, inView, scroll } = Motion;
        const section = document.querySelector('.parallax-section');

        scroll(
            animate(section.querySelector('.parallax-bg'), { y: ['-12%', '12%'] }, { ease: 'linear' }),
            { target: section, offset: ['start end', 'end start'] }
        );

        inView(section, function () {
            animate(
                section.querySelectorAll('[data-reveal]'),
                { opacity: [0, 1], y: [30, 0] },
                { duration: 0.9, delay: stagger(0.15), ease: [0.22, 1, 0.36, 1] }
            );
        }, { amount: 0.4 });
    });
</script>
