<?php
$intro_addon = $single_intro['addon'] ?? null;
$intro_paragraphs = single_paragraphs($intro_addon->content ?? '');
$intro_lead = $intro_paragraphs[0] ?? '';
$intro_body = array_slice($intro_paragraphs, 1);
$intro_title = single_title($intro_addon->name ?? '');
$intro_link = $single_intro['link'] ?? null;
?>
<style>
    .single-intro {
        background: var(--color5);

        .single-intro-left {
            .section-header {
                margin-bottom: 40px;

                .section-title {
                    max-width: 420px;
                    margin-bottom: 0;
                    font-size: clamp(30px, 3vw, 46px);
                    letter-spacing: -2px;
                }
            }

            .single-intro-meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                padding-top: 22px;
                border-top: 1px solid var(--color9);
                color: #a8853e;
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 2px;
                text-transform: uppercase;
            }
        }

        .single-intro-lead {
            margin: 0 0 24px;
            color: var(--color7);
            font-family: var(--primtext);
            font-size: clamp(18px, 1.5vw, 22px);
            font-weight: 700;
            letter-spacing: -0.5px;
            line-height: 1.7;
        }

        .single-intro-body {
            margin: 0 0 14px;
            color: #667178;
            font-size: 13px;
            line-height: 2;
        }

        @media (max-width: 991.98px) {
            .single-intro-left {
                margin-bottom: 2.5rem;
            }
        }
    }
</style>

<section class="single-intro" id="singleDetail" aria-labelledby="singleIntroTitle">
    <div class="container-global">
        <div class="row">
            <div class="col-lg-5 single-intro-left" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow"><?= htmlspecialchars($single_intro['eyebrow'] ?? '') ?></div>
                    <h2 class="section-title" id="singleIntroTitle"><?= $intro_title ?></h2>
                </div>
                <div class="single-intro-meta">
                    <?php if (!empty($intro_link)) : ?>
                        <a class="text-link" href="<?= htmlspecialchars($intro_link['url']) ?>"><?= htmlspecialchars($intro_link['label']) ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                    <?php else : ?>
                        <span><?= htmlspecialchars($single_intro['label'] ?? '') ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-7" data-animate>
                <?php if ($intro_lead !== '') : ?>
                    <p class="single-intro-lead"><?= htmlspecialchars($intro_lead) ?></p>
                <?php endif; ?>
                <?php foreach ($intro_body as $intro_text) : ?>
                    <p class="single-intro-body"><?= htmlspecialchars($intro_text) ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#singleDetail', { stagger: 0.12 });
    });
</script>
