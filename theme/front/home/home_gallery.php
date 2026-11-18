<?php
$galleryImages = json_decode(json_encode([
    [
        'title' => 'Dokumentasi Instalasi MEP',
        'image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?auto=format&fit=crop&w=1400&h=1000&q=88'
    ],
    [
        'title' => 'Pekerjaan Perpipaan',
        'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1400&h=1000&q=88'
    ]
]));
?>

<style>
    body.gallery-lightbox-open {
        overflow: hidden;
    }

#gallery-marquee {
    overflow: hidden;
    background-color: var(--light-color);
    padding-top: 5.5rem;

        .gallery-marquee__viewport {
            width: 100%;
            overflow: hidden;

            &:hover,
            &:focus-within {
                .gallery-marquee__track {
                    animation-play-state: paused;
                }
            }
        }

        .gallery-marquee__track {
            display: flex;
            width: max-content;
            animation: gallery-marquee-move 42s linear infinite;
            will-change: transform;
        }

        .gallery-marquee__group {
            display: flex;
            flex: 0 0 auto;
            gap: 1rem;
            padding-right: 1rem;
        }

        .gallery-marquee__item {
            display: block;
            position: relative;
            width: clamp(17rem, 25vw, 24rem);
            height: clamp(12rem, 18vw, 17rem);
            flex: 0 0 auto;
            overflow: hidden;
            padding: 0;
            border-radius: var(--radius-md);
            background-color: var(--soft-green);
            cursor: zoom-in;
            box-shadow: var(--shadow-soft);

            &::after {
                position: absolute;
                inset: auto 0 0;
                height: 42%;
                background: linear-gradient(0deg, rgba(7, 26, 50, 0.58), transparent);
                content: "";
                pointer-events: none;
            }

            img {
                width: 100%;
                height: 100%;
                transition: transform 500ms ease, filter 500ms ease;
            }

            &:hover,
            &:focus-visible {
                img {
                    filter: saturate(1.08);
                    transform: scale(1.06);
                }

                .gallery-marquee__label {
                    transform: translateY(-0.2rem);
                }
            }
        }

        .gallery-marquee__label {
            position: absolute;
            z-index: 1;
            right: 1rem;
            bottom: 0.85rem;
            left: 1rem;
            color: var(--light-color);
            font-family: var(--subtext);
            font-size: 0.9rem;
            font-weight: 700;
            text-align: left;
            transition: transform var(--transition-base);
        }

        .gallery__footer-space {
            height: 5.5rem;
        }
    }

    .gallery-lightbox {
        display: flex;
        position: fixed;
        z-index: 3000;
        inset: 0;
        align-items: center;
        justify-content: center;
        padding: 2rem 5rem;
        visibility: hidden;
        background-color: rgba(3, 12, 24, 0.94);
        opacity: 0;
        transition: visibility var(--transition-base), opacity var(--transition-base);

        &.is-open {
            visibility: visible;
            opacity: 1;
        }

        .gallery-lightbox__stage {
            display: flex;
            position: relative;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            touch-action: pan-y;
        }

        .gallery-lightbox__figure {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .gallery-lightbox__image {
            width: auto;
            max-width: min(88vw, 90rem);
            height: auto;
            max-height: 78vh;
            border-radius: var(--radius-sm);
            object-fit: contain;
            cursor: zoom-in;
            box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.35);
            transform: scale(1);
            transition: opacity 220ms ease, transform 300ms ease;
            user-select: none;
        }

        &.is-zoomed {
            .gallery-lightbox__image {
                cursor: zoom-out;
                transform: scale(1.45);
            }
        }

        .gallery-lightbox__caption {
            position: absolute;
            right: 1rem;
            bottom: 0.4rem;
            left: 1rem;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.78rem;
            text-align: center;
        }

        .gallery-lightbox__close,
        .gallery-lightbox__control {
            display: grid;
            position: absolute;
            z-index: 2;
            width: 3rem;
            height: 3rem;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.08);
            color: var(--light-color);
            cursor: pointer;
            backdrop-filter: blur(0.6rem);
            transition: background-color var(--transition-fast), border-color var(--transition-fast), transform var(--transition-fast);

            &:hover,
            &:focus-visible {
                border-color: var(--primary-color);
                background-color: var(--primary-color);
                transform: scale(1.06);
            }
        }

        .gallery-lightbox__close {
            top: 1.25rem;
            right: 1.25rem;
        }

        .gallery-lightbox__control {
            top: 50%;
            transform: translateY(-50%);

            &:hover,
            &:focus-visible {
                transform: translateY(-50%) scale(1.06);
            }

            &.gallery-lightbox__control--previous {
                left: 1.25rem;
            }

            &.gallery-lightbox__control--next {
                right: 1.25rem;
            }
        }
    }

    @keyframes gallery-marquee-move {
        from {
            transform: translate3d(0, 0, 0);
        }

        to {
            transform: translate3d(-50%, 0, 0);
        }
    }

@media (max-width: 767.98px) {
    #gallery-marquee {
        padding-top: 4.5rem;

            .gallery-marquee__item {
                width: min(76vw, 20rem);
                height: 13.5rem;
            }

            .gallery__footer-space {
                height: 4.5rem;
            }
        }

        .gallery-lightbox {
            padding: 4.5rem 1rem 4rem;

            .gallery-lightbox__image {
                max-width: 94vw;
                max-height: 72vh;
            }

            .gallery-lightbox__control {
                top: auto;
                bottom: 0.8rem;

                &.gallery-lightbox__control--previous {
                    left: calc(50% - 4rem);
                }

                &.gallery-lightbox__control--next {
                    right: calc(50% - 4rem);
                }
            }

            .gallery-lightbox__caption {
                bottom: 4.5rem;
            }
        }
    }

    @media (prefers-reduced-motion: reduce) {
        #gallery-marquee {
            .gallery-marquee__viewport {
                overflow-x: auto;
            }

            .gallery-marquee__track {
                animation: none;
            }

            .gallery-marquee__group[aria-hidden="true"] {
                display: none;
            }
        }
    }
</style>

<section id="gallery-marquee" aria-label="Galeri dokumentasi proyek">
    <div class="gallery-marquee__viewport">
        <div class="gallery-marquee__track">
            <?php for ($galleryGroup = 0; $galleryGroup < 2; $galleryGroup++): ?>
                <div class="gallery-marquee__group"<?= $galleryGroup === 1 ? ' aria-hidden="true"' : '' ?>>
                    <?php foreach ($item->data as $galleryIndex => $galleryImage): ?>
                        <button class="gallery-marquee__item" type="button" data-gallery-index="<?= htmlspecialchars((string) $galleryIndex, ENT_QUOTES, 'UTF-8') ?>"<?= $galleryGroup === 1 ? ' tabindex="-1"' : '' ?> aria-label="Buka gambar <?= (int) $galleryIndex + 1 ?>">
                            <img src="<?= htmlspecialchars($galleryImage->url_img, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($galleryImage->title ?? "Dokumentasi proyek", ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="gallery__footer-space" aria-hidden="true"></div>
    <div class="gallery-lightbox" data-gallery-lightbox role="dialog" aria-modal="true" aria-label="Galeri dokumentasi proyek" aria-hidden="true">
        <button class="gallery-lightbox__close" type="button" data-gallery-close aria-label="Tutup galeri"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        <button class="gallery-lightbox__control gallery-lightbox__control--previous" type="button" data-gallery-previous aria-label="Gambar sebelumnya"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
        <div class="gallery-lightbox__stage" data-gallery-stage>
            <figure class="gallery-lightbox__figure">
                <img class="gallery-lightbox__image" data-gallery-image src="" alt="">
                <figcaption class="gallery-lightbox__caption" data-gallery-caption></figcaption>
            </figure>
        </div>
        <button class="gallery-lightbox__control gallery-lightbox__control--next" type="button" data-gallery-next aria-label="Gambar berikutnya"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const section = document.querySelector("#gallery-marquee");
        const lightbox = section?.querySelector("[data-gallery-lightbox]");
        const lightboxImage = lightbox?.querySelector("[data-gallery-image]");
        const caption = lightbox?.querySelector("[data-gallery-caption]");
        const closeButton = lightbox?.querySelector("[data-gallery-close]");
        const previousButton = lightbox?.querySelector("[data-gallery-previous]");
        const nextButton = lightbox?.querySelector("[data-gallery-next]");
        const stage = lightbox?.querySelector("[data-gallery-stage]");
        const galleryItems = <?= json_encode($item->data, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

        if (!section || !lightbox || !lightboxImage || !caption || !closeButton || !previousButton || !nextButton || !stage || !galleryItems.length) {
            return;
        }

        let activeIndex = 0;
        let activeTrigger = null;
        let pointerStartX = null;
        let pointerSwiped = false;

        const renderImage = (index) => {
            activeIndex = (index + galleryItems.length) % galleryItems.length;
            const activeItem = galleryItems[activeIndex];
            lightbox.classList.remove("is-zoomed");
            lightboxImage.src = activeItem.url_img;
            lightboxImage.alt = activeItem.title;
            caption.textContent = `${activeIndex + 1} / ${galleryItems.length} — ${activeItem.title}`;
        };

        const openLightbox = (index, trigger) => {
            activeTrigger = trigger;
            renderImage(index);
            lightbox.classList.add("is-open");
            lightbox.setAttribute("aria-hidden", "false");
            document.body.classList.add("gallery-lightbox-open");
            closeButton.focus();
        };

        const closeLightbox = () => {
            lightbox.classList.remove("is-open", "is-zoomed");
            lightbox.setAttribute("aria-hidden", "true");
            document.body.classList.remove("gallery-lightbox-open");
            activeTrigger?.focus();
        };

        section.querySelectorAll("[data-gallery-index]").forEach((button) => {
            button.addEventListener("click", () => openLightbox(Number(button.dataset.galleryIndex), button));
        });

        closeButton.addEventListener("click", closeLightbox);
        previousButton.addEventListener("click", () => renderImage(activeIndex - 1));
        nextButton.addEventListener("click", () => renderImage(activeIndex + 1));
        lightbox.addEventListener("click", (event) => {
            if (event.target === lightbox) {
                closeLightbox();
            }
        });

        lightboxImage.addEventListener("click", () => {
            if (pointerSwiped) {
                pointerSwiped = false;
                return;
            }
            lightbox.classList.toggle("is-zoomed");
        });

        stage.addEventListener("pointerdown", (event) => {
            pointerStartX = event.clientX;
            pointerSwiped = false;
        });

        stage.addEventListener("pointerup", (event) => {
            if (pointerStartX === null) {
                return;
            }
            const pointerDistance = event.clientX - pointerStartX;
            pointerStartX = null;
            if (Math.abs(pointerDistance) < 50) {
                return;
            }
            pointerSwiped = true;
            renderImage(activeIndex + (pointerDistance < 0 ? 1 : -1));
        });

        document.addEventListener("keydown", (event) => {
            if (!lightbox.classList.contains("is-open")) {
                return;
            }
            if (event.key === "Escape") {
                closeLightbox();
            }
            if (event.key === "ArrowLeft") {
                renderImage(activeIndex - 1);
            }
            if (event.key === "ArrowRight") {
                renderImage(activeIndex + 1);
            }
        });

    });
</script>
