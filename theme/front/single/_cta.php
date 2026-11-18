<?php
$cta_title = $single_cta['title'] ?? '';
$cta_desc = $single_cta['desc'] ?? '';
?>
<style>
    .single-cta {
        position: relative;
        background: #29353c;
        color: var(--color10);
        isolation: isolate;
        overflow: hidden;

        &::before {
            content: "";
            position: absolute;
            right: -6%;
            bottom: -90%;
            z-index: -1;
            width: 34vw;
            max-width: 560px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            pointer-events: none;
        }

        .container-global {
            padding-top: 4.5rem;
            padding-bottom: 4.5rem;
        }

        .single-cta-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
        }

        .section-header {
            margin-bottom: 0;

            .section-title {
                max-width: 640px;
                margin-bottom: 22px;
                font-size: clamp(30px, 3.2vw, 50px);
                letter-spacing: -2px;
            }

            .section-desc {
                max-width: 520px;
            }
        }

        .btn-main {
            flex: none;
        }

        @media (max-width: 767.98px) {
            .single-cta-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 2rem;
            }
        }
    }
</style>

<section class="single-cta" id="singleCta" aria-labelledby="singleCtaTitle">
    <div class="container-global">
        <div class="single-cta-inner" data-animate>
            <div class="section-header is-light">
                <div class="section-eyebrow"><?= htmlspecialchars($single_cta['eyebrow'] ?? 'Mari Berdiskusi') ?></div>
                <h2 class="section-title" id="singleCtaTitle"><?= htmlspecialchars($cta_title) ?></h2>
                <p class="section-desc"><?= htmlspecialchars($cta_desc) ?></p>
            </div>
            <a class="btn-main is-gold" href="<?= htmlspecialchars(base_url('contact')) ?>">Diskusikan Kebutuhan <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#singleCta', { stagger: 0.12 });
        animateHover('#singleCta .btn-main', { y: -3 });
    });
</script>
