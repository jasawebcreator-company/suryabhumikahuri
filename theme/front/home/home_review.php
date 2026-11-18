<?php
$review_tags = '<span><em><strong><b><i><br>';
$review_title = !empty($item->setting->title) ? strip_tags($item->setting->title, $review_tags) : 'Kepercayaan dibangun lewat <span>pekerjaan yang bisa dilihat.</span>';
$review_subtitle = !empty($item->setting->subtitle) ? $item->setting->subtitle : 'Trust & Project Evidence';
$review_desc = !empty($item->setting->subtitle2) ? $item->setting->subtitle2 : 'Setiap portofolio memberi gambaran ruang lingkup dan konteks pekerjaan, dilengkapi pengalaman dari pemilik proyek dan mitra kerja.';
$reviews = !empty($item->data) ? array_values((array) $item->data) : [];
$review_total = count($reviews);
?>
<?php if ($review_total > 0): ?>
<style>
    .reviews {
        background: #f5f4f0;

        .reviews-copy {
            padding-right: 2rem;

            .section-header {
                margin-bottom: 1.4rem;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .reviews-desc {
                margin: 0 0 1.8rem;
                color: var(--color8);
                font-size: 14px;
                line-height: 1.85;
            }
        }

        .reviews-controls {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 2.2rem;

            button {
                display: grid;
                place-items: center;
                width: 44px;
                height: 44px;
                border: 1px solid var(--color9);
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

            .reviews-count {
                min-width: 62px;
                color: var(--color8);
                font-family: var(--primtext);
                font-size: 12px;
                font-weight: 800;
                letter-spacing: 0.1em;

                strong {
                    color: var(--colors);
                }
            }
        }

        .reviews-panel {
            position: relative;
            padding: 33px 38px 0;
            background: var(--color10);
            border-top: 3px solid var(--color2);
            box-shadow: 0 15px 50px rgba(35, 41, 44, 0.06);
            overflow: hidden;
        }

        .reviews-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;

            span {
                color: #9b844f;
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 0.16em;
                text-transform: uppercase;
            }

            .reviews-icon {
                display: grid;
                place-items: center;
                width: 48px;
                height: 48px;
                background: #f5f1e6;
                color: #b3914b;
                font-size: 20px;
            }
        }

        .reviews-slider {
            .slick-slide {
                outline: none;
            }
        }

        .review-slide {
            padding-bottom: 8px;

            .review-text {
                margin: 25px 0;
                color: #3a4144;
                font-family: var(--primtext);
                font-size: 20px;
                font-weight: 700;
                letter-spacing: -0.045em;
                line-height: 1.65;
            }

            .review-foot {
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 20px 0 24px;
                border-top: 1px solid #e9e6df;

                img,
                .review-avatar {
                    width: 46px;
                    height: 46px;
                    flex: none;
                    border-radius: 50%;
                    object-fit: cover;
                }

                .review-avatar {
                    display: grid;
                    place-items: center;
                    background: var(--colors);
                    color: var(--color2);
                    font-size: 16px;
                }

                strong {
                    display: block;
                    font-family: var(--primtext);
                    font-size: 14px;
                    font-weight: 800;
                }

                small {
                    color: #88908e;
                    font-size: 10px;
                    font-weight: 800;
                    letter-spacing: 0.13em;
                    text-transform: uppercase;
                }
            }
        }

        .reviews-progress {
            height: 3px;
            margin: 0 -38px;
            background: #eeeae0;

            span {
                display: block;
                width: 100%;
                height: 100%;
                background: var(--color2);
                transform: scaleX(0);
                transform-origin: left;

                &.is-running {
                    animation: reviewsProgress 6s linear forwards;
                }
            }
        }

        @media (max-width: 991.98px) {
            .reviews-copy {
                padding-right: 0;
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .reviews-panel {
                padding: 26px 22px 0;
            }

            .review-slide .review-text {
                font-size: 17px;
            }

            .reviews-progress {
                margin: 0 -22px;
            }
        }
    }

    @keyframes reviewsProgress {
        from {
            transform: scaleX(0);
        }

        to {
            transform: scaleX(1);
        }
    }
</style>

<section class="reviews" id="reviews" aria-labelledby="reviewsTitle">
    <div class="container-global">
        <div class="row align-items-center">
            <div class="col-lg-6 reviews-copy">
                <div class="section-header" data-animate>
                    <div class="section-eyebrow"><?= strip_tags($review_subtitle, $review_tags) ?></div>
                    <h2 class="section-title" id="reviewsTitle"><?= $review_title ?></h2>
                </div>
                <p class="reviews-desc" data-animate><?= strip_tags($review_desc, $review_tags) ?></p>
                <a class="text-link" href="<?= htmlspecialchars(base_url('category/proyek-kami')) ?>" data-animate>Jelajahi dokumentasi proyek <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                <?php if ($review_total > 1): ?>
                    <div class="reviews-controls" data-animate>
                        <button type="button" id="reviewsPrev" aria-label="Testimoni sebelumnya"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
                        <button type="button" id="reviewsNext" aria-label="Testimoni berikutnya"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
                        <span class="reviews-count"><strong id="reviewsCurrent">01</strong> / <?= str_pad($review_total, 2, '0', STR_PAD_LEFT) ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <div class="reviews-panel" data-animate>
                    <div class="reviews-top">
                        <span>Testimoni Klien</span>
                        <div class="reviews-icon"><i class="fa-solid fa-quote-right" aria-hidden="true"></i></div>
                    </div>
                    <div class="reviews-slider" id="reviewsSlider">
                        <?php foreach ($reviews as $review): ?>
                            <div>
                                <div class="review-slide">
                                    <p class="review-text">&ldquo;<?= htmlspecialchars($review->message ?? '') ?>&rdquo;</p>
                                    <div class="review-foot">
                                        <?php if (!empty($review->img_url)): ?>
                                            <img src="<?= htmlspecialchars($review->img_url) ?>" alt="<?= htmlspecialchars($review->guest ?? '') ?>" loading="lazy">
                                        <?php else: ?>
                                            <span class="review-avatar"><i class="fa-solid fa-user" aria-hidden="true"></i></span>
                                        <?php endif; ?>
                                        <div>
                                            <strong><?= htmlspecialchars($review->guest ?? '') ?></strong>
                                            <?php if (!empty($review->title)): ?>
                                                <small><?= htmlspecialchars($review->title) ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($review_total > 1): ?>
                        <div class="reviews-progress" aria-hidden="true"><span id="reviewsProgress"></span></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#reviews', { stagger: 0.12 });

        const slider = $('#reviewsSlider');
        const total = <?= $review_total ?>;
        const current = document.getElementById('reviewsCurrent');
        const progress = document.getElementById('reviewsProgress');

        function restartProgress() {
            progress.classList.remove('is-running');
            void progress.offsetWidth;
            progress.classList.add('is-running');
        }

        slider.on('init', function () {
            if (total > 1) {
                restartProgress();
            }
        });

        slider.on('beforeChange', function (event, slick, from, to) {
            current.textContent = String(to + 1).padStart(2, '0');
            restartProgress();
        });

        slider.slick({
            arrows: false,
            dots: false,
            fade: true,
            adaptiveHeight: true,
            infinite: true,
            speed: 700,
            autoplay: false
        });

        if (total > 1) {
            progress.addEventListener('animationend', function () {
                slider.slick('slickNext');
            });
        }

        $('#reviewsPrev').on('click', function () {
            slider.slick('slickPrev');
        });

        $('#reviewsNext').on('click', function () {
            slider.slick('slickNext');
        });
    });
</script>
<?php endif; ?>
