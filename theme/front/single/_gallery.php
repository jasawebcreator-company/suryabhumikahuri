<?php
$gallery_items = [];

foreach ((array) ($data->images ?? []) as $gallery_image) {
    $gallery_full = trim((string) ($gallery_image->url ?? $gallery_image->url_thumb ?? ''));
    $gallery_thumb = trim((string) ($gallery_image->url_thumb ?? $gallery_image->url ?? ''));

    if ($gallery_full !== '') {
        $gallery_items[] = ['full' => $gallery_full, 'thumb' => $gallery_thumb !== '' ? $gallery_thumb : $gallery_full];
    }
}

$gallery_total = count($gallery_items);
$gallery_alt = trim((string) ($data->result->title ?? 'Dokumentasi'));
?>
<?php if ($gallery_total > 0): ?>
<style>
    .single-gallery {
        background: var(--color3);
        color: var(--color10);
        overflow: hidden;

        .container-global {
            padding-bottom: 2.5rem;
        }

        .single-gallery-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 2rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                    font-size: clamp(28px, 3vw, 46px);
                    letter-spacing: -1.8px;
                }
            }
        }

        .single-gallery-nav {
            display: flex;
            gap: 10px;

            &[hidden] {
                display: none;
            }

            button {
                display: grid;
                place-items: center;
                width: 44px;
                height: 44px;
                border: 1px solid rgba(255, 255, 255, 0.25);
                background: transparent;
                color: var(--color10);
                font-size: 13px;
                cursor: pointer;
                transition: background 0.25s, border-color 0.25s, color 0.25s;

                &:hover {
                    background: var(--color2);
                    border-color: var(--color2);
                    color: var(--color3);
                }
            }
        }

        .single-gallery-slider {
            padding-bottom: 5rem;

            .slick-track {
                margin-left: auto;
                margin-right: auto;
            }

            .slick-slide {
                outline: none;
            }

            @media (max-width: 767.98px) {
                padding-bottom: 3.5rem;
            }
        }

        .single-gallery-item {
            position: relative;
            display: block;
            width: calc(100% - 6px);
            margin: 0 3px;
            padding: 0;
            aspect-ratio: 4 / 5;
            border: 0;
            background: #25333b;
            overflow: hidden;
            cursor: zoom-in;

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: saturate(0.85);
                transition: transform 0.7s, filter 0.4s;
            }

            .single-gallery-zoom {
                position: absolute;
                right: 14px;
                bottom: 14px;
                display: grid;
                place-items: center;
                width: 38px;
                height: 38px;
                background: var(--color4);
                color: var(--color3);
                font-size: 14px;
                opacity: 0;
                transform: translateY(8px);
                transition: opacity 0.3s, transform 0.3s;
            }

            &:hover {
                img {
                    transform: scale(1.06);
                    filter: saturate(1);
                }

                .single-gallery-zoom {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            &:focus-visible {
                outline: 2px solid var(--color4);
                outline-offset: -4px;
            }
        }

        @media (max-width: 767.98px) {
            .single-gallery-head {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    }

    .single-lightbox {
        position: fixed;
        inset: 0;
        z-index: 2000;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(12, 18, 22, 0.94);

        &.is-open {
            display: flex;
        }

        .lightbox-stage {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            touch-action: pan-y;
        }

        .lightbox-image {
            max-width: 88vw;
            max-height: 84vh;
            object-fit: contain;
            cursor: zoom-in;
            transition: transform 0.35s;
            user-select: none;
            -webkit-user-drag: none;
        }

        &.is-zoomed {
            .lightbox-image {
                cursor: zoom-out;
                transform: scale(2);
            }
        }

        .lightbox-btn {
            position: absolute;
            z-index: 2;
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(24, 33, 39, 0.7);
            color: var(--color10);
            font-size: 15px;
            cursor: pointer;
            transition: background 0.25s, color 0.25s;

            &:hover {
                background: var(--color2);
                color: var(--color3);
            }
        }

        .lightbox-close {
            top: 20px;
            right: 20px;
        }

        .lightbox-prev,
        .lightbox-next {
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-prev {
            left: 20px;
        }

        .lightbox-next {
            right: 20px;
        }

        .lightbox-count {
            position: absolute;
            left: 50%;
            bottom: 22px;
            transform: translateX(-50%);
            color: #d3dadd;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.14em;
        }

        @media (max-width: 575.98px) {
            .lightbox-prev,
            .lightbox-next {
                top: auto;
                bottom: 14px;
                transform: none;
            }

            .lightbox-prev {
                left: 14px;
            }

            .lightbox-next {
                right: 14px;
            }
        }
    }
</style>

<section class="single-gallery" id="singleGallery" aria-labelledby="singleGalleryTitle">
    <div class="container-global">
        <div class="single-gallery-head" data-animate>
            <div class="section-header is-light">
                <div class="section-eyebrow">Dokumentasi</div>
                <h2 class="section-title" id="singleGalleryTitle">Galeri <span>Dokumentasi</span></h2>
            </div>
            <div class="single-gallery-nav">
                <button type="button" id="singleGalleryPrev" aria-label="Gambar sebelumnya"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
                <button type="button" id="singleGalleryNext" aria-label="Gambar berikutnya"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>

    <div class="single-gallery-slider" id="singleGallerySlider" data-animate>
        <?php foreach ($gallery_items as $gallery_index => $gallery_item): ?>
            <div>
                <button class="single-gallery-item" type="button" data-index="<?= $gallery_index ?>" aria-label="Perbesar gambar <?= $gallery_index + 1 ?>">
                    <img src="<?= htmlspecialchars($gallery_item['thumb']) ?>" alt="<?= htmlspecialchars($gallery_alt . ' ' . ($gallery_index + 1)) ?>" loading="lazy">
                    <span class="single-gallery-zoom"><i class="fa-solid fa-magnifying-glass-plus" aria-hidden="true"></i></span>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="single-lightbox" id="singleLightbox" role="dialog" aria-modal="true" aria-label="Galeri dokumentasi">
    <button class="lightbox-btn lightbox-close" type="button" aria-label="Tutup"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
    <button class="lightbox-btn lightbox-prev" type="button" aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
    <div class="lightbox-stage">
        <img class="lightbox-image" src="" alt="">
    </div>
    <button class="lightbox-btn lightbox-next" type="button" aria-label="Berikutnya"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
    <div class="lightbox-count"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#singleGallery', { stagger: 0.1 });

        const items = <?= json_encode($gallery_items, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        const total = items.length;
        const slider = $('#singleGallerySlider');

        slider.slick({
            arrows: false,
            dots: false,
            infinite: total > 5,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 1200, settings: { slidesToShow: 3, infinite: total > 3 } },
                { breakpoint: 768, settings: { slidesToShow: 2, infinite: total > 2 } }
            ]
        });

        const nav = document.querySelector('#singleGallery .single-gallery-nav');

        function syncNav() {
            nav.hidden = total <= slider.slick('slickGetOption', 'slidesToShow');
        }

        slider.on('breakpoint reInit', syncNav);
        syncNav();

        $('#singleGalleryPrev').on('click', function () {
            slider.slick('slickPrev');
        });

        $('#singleGalleryNext').on('click', function () {
            slider.slick('slickNext');
        });

        animateHover('#singleGallery .single-gallery-nav button', { y: -2 });

        const box = document.getElementById('singleLightbox');
        const image = box.querySelector('.lightbox-image');
        const stage = box.querySelector('.lightbox-stage');
        const count = box.querySelector('.lightbox-count');
        let current = 0;
        let startX = null;

        function show(index) {
            current = (index + total) % total;
            box.classList.remove('is-zoomed');
            image.style.transformOrigin = '50% 50%';
            image.src = items[current].full;
            image.alt = items[current].thumb;
            count.textContent = (current + 1) + ' / ' + total;
        }

        function open(index) {
            show(index);
            box.classList.add('is-open');
            lenis.stop();
        }

        function close() {
            box.classList.remove('is-open', 'is-zoomed');
            lenis.start();
        }

        document.querySelectorAll('#singleGallery .single-gallery-item').forEach(function (button) {
            button.addEventListener('click', function () {
                open(Number(button.dataset.index));
            });
        });

        box.querySelector('.lightbox-close').addEventListener('click', close);
        box.querySelector('.lightbox-prev').addEventListener('click', function () { show(current - 1); });
        box.querySelector('.lightbox-next').addEventListener('click', function () { show(current + 1); });

        image.addEventListener('click', function () {
            box.classList.toggle('is-zoomed');
        });

        stage.addEventListener('mousemove', function (event) {
            if (box.classList.contains('is-zoomed')) {
                const rect = image.getBoundingClientRect();
                const x = Math.min(100, Math.max(0, ((event.clientX - rect.left) / rect.width) * 100));
                const y = Math.min(100, Math.max(0, ((event.clientY - rect.top) / rect.height) * 100));
                image.style.transformOrigin = x + '% ' + y + '%';
            }
        });

        stage.addEventListener('click', function (event) {
            if (event.target === stage) {
                close();
            }
        });

        stage.addEventListener('touchstart', function (event) {
            startX = event.touches[0].clientX;
        }, { passive: true });

        stage.addEventListener('touchend', function (event) {
            if (startX === null || box.classList.contains('is-zoomed')) {
                startX = null;
                return;
            }

            const distance = event.changedTouches[0].clientX - startX;
            startX = null;

            if (Math.abs(distance) > 50) {
                show(distance > 0 ? current - 1 : current + 1);
            }
        });

        document.addEventListener('keydown', function (event) {
            if (!box.classList.contains('is-open')) {
                return;
            }

            if (event.key === 'Escape') {
                close();
            } else if (event.key === 'ArrowLeft') {
                show(current - 1);
            } else if (event.key === 'ArrowRight') {
                show(current + 1);
            }
        });
    });
</script>
<?php endif; ?>
