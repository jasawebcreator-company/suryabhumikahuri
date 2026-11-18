<?php
$page_hero = [
    'eyebrow' => 'Galeri Proyek',
    'title' => 'Dokumentasi <span>Pekerjaan Kami</span>',
    'desc' => 'Dokumentasi instalasi dan hasil pekerjaan MEP Surya Bhumi Kahuri pada proyek kesehatan, hospitality, fasilitas publik, komersial, dan residensial.',
    'image' => '',
];

$gallery_items = [];
foreach (isset($data->result) && is_array($data->result) ? $data->result : [] as $gallery_row) {
    $gallery_full = !empty($gallery_row->url_img) ? $gallery_row->url_img : (!empty($gallery_row->url_img_thumb) ? $gallery_row->url_img_thumb : '');
    if ($gallery_full === '') {
        continue;
    }
    $gallery_items[] = [
        'full' => $gallery_full,
        'thumb' => !empty($gallery_row->url_img_thumb) ? $gallery_row->url_img_thumb : $gallery_full,
        'title' => trim(strip_tags((string) ($gallery_row->content ?? ''))),
        'alt' => trim((string) ($gallery_row->title ?? '')),
    ];
}
$gallery_items = json_decode(json_encode($gallery_items));

$gallery_pages = (int) ($data->pages ?? 1);
$gallery_current = max(1, (int) ($data->page_position ?? 1));
$gallery_base = strtok($_SERVER['REQUEST_URI'] ?? '', '?');

$gallery_content = json_decode(json_encode([
    'empty' => 'Belum ada foto. Dokumentasi terbaru akan segera ditampilkan di sini.',
    'prev' => 'Sebelumnya',
    'next' => 'Berikutnya',
]));
?>

<?php include __DIR__ . '/../partials/page_hero.php'; ?>

<style>
    .gallery-page {
        background-color: var(--color5);

        .gallery-grid {
            column-count: 3;
            column-gap: 1.25rem;
        }

        .gallery-item {
            position: relative;
            display: block;
            width: 100%;
            margin: 0 0 1.25rem;
            padding: 0;
            border: 0;
            overflow: hidden;
            background-color: var(--color9);
            break-inside: avoid;
            cursor: zoom-in;

            img {
                width: 100%;
                height: auto;
                transition: transform 0.6s ease;
            }

            &::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(0deg, rgba(24, 33, 39, 0.7) 0%, transparent 60%);
                opacity: 0;
                transition: 0.3s ease;
            }

            .gallery-zoom {
                position: absolute;
                right: 1rem;
                bottom: 1rem;
                z-index: 2;
                width: 2.75rem;
                height: 2.75rem;
                display: grid;
                place-items: center;
                background-color: var(--color4);
                color: var(--color3);
                opacity: 0;
                transform: scale(0.6);
                transition: 0.3s ease;
            }

            &:hover,
            &:focus-visible {
                img {
                    transform: scale(1.06);
                }

                &::after,
                .gallery-zoom {
                    opacity: 1;
                }

                .gallery-zoom {
                    transform: scale(1);
                }
            }

            &:focus {
                outline: none;
            }

            &:focus-visible {
                box-shadow: 0 0 0 3px var(--color2);
            }
        }

        .gallery-empty {
            padding: 4rem 1.5rem;
            background-color: var(--color10);
            text-align: center;
            color: #667178;
            font-size: 14px;

            i {
                display: block;
                font-size: 2.5rem;
                color: var(--color2);
                margin-bottom: 1rem;
            }
        }

        .gallery-pagination {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 2.5rem;

            a,
            span {
                min-width: 2.75rem;
                height: 2.75rem;
                padding: 0 1.1rem;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                background-color: var(--color10);
                font-family: var(--primtext);
                font-size: 12px;
                font-weight: 800;
                color: var(--color7);
                transition: background 0.25s, color 0.25s;
            }

            a:hover {
                background-color: var(--color6);
                color: var(--colors);
            }

            .active {
                background-color: var(--colors);
                color: var(--color10);
            }
        }
    }

    .gallery-lightbox {
        position: fixed;
        inset: 0;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        background-color: rgba(24, 33, 39, 0.95);
        backdrop-filter: blur(6px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;

        &.open {
            opacity: 1;
            visibility: visible;
        }

        .gallery-lightbox-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            color: var(--color10);
        }

        .gallery-lightbox-count {
            font-family: var(--primtext);
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.1em;

            .current {
                color: var(--color2);
            }
        }

        .gallery-lightbox-tools {
            display: flex;
            gap: 0.5rem;
        }

        .gallery-lightbox-btn {
            width: 2.9rem;
            height: 2.9rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background-color: rgba(255, 255, 255, 0.06);
            color: var(--color10);
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: 0.3s ease;

            &:hover {
                background-color: var(--color4);
                border-color: var(--color4);
                color: var(--color3);
            }

            &:focus {
                outline: none;
            }
        }

        .gallery-lightbox-stage {
            position: relative;
            flex: 1;
            min-height: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5rem;
            overflow: hidden;
            touch-action: none;
            user-select: none;
        }

        .gallery-lightbox-image {
            max-width: 100%;
            max-height: 100%;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
            cursor: zoom-in;
            transform-origin: center center;
            will-change: transform;
            -webkit-user-drag: none;

            &.zoomed {
                cursor: grab;
            }

            &.dragging {
                cursor: grabbing;
            }
        }

        .gallery-lightbox-nav {
            position: absolute;
            top: 50%;
            z-index: 2;
            transform: translateY(-50%);

            &.prev {
                left: 1.25rem;
            }

            &.next {
                right: 1.25rem;
            }
        }

        .gallery-lightbox-caption {
            min-height: 1.5rem;
            padding: 0.75rem 1.5rem 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .gallery-lightbox-thumbs {
            display: flex;
            justify-content: safe center;
            gap: 0.5rem;
            padding: 1rem 1.5rem 1.5rem;
            overflow-x: auto;
            scrollbar-width: none;

            button {
                flex-shrink: 0;
                width: 64px;
                height: 48px;
                padding: 0;
                border: 2px solid transparent;
                overflow: hidden;
                background: none;
                opacity: 0.45;
                cursor: pointer;
                transition: 0.3s ease;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                &:hover {
                    opacity: 0.8;
                }

                &.active {
                    opacity: 1;
                    border-color: var(--color2);
                }

                &:focus {
                    outline: none;
                }
            }
        }
    }

    @media (max-width: 991.98px) {
        .gallery-page .gallery-grid {
            column-count: 2;
        }
    }

    @media (max-width: 575.98px) {
        .gallery-page {
            .gallery-grid {
                column-gap: 0.75rem;
            }

            .gallery-item {
                margin-bottom: 0.75rem;
            }
        }

        .gallery-lightbox {
            .gallery-lightbox-stage {
                padding: 0 1rem;
            }

            .gallery-lightbox-nav {
                top: auto;
                bottom: 1rem;
                transform: none;
            }

            .gallery-lightbox-thumbs {
                display: none;
            }
        }
    }
</style>

<section class="gallery-page">
    <div class="container-global">
        <?php if (!empty($gallery_items)) : ?>
            <div class="gallery-grid">
                <?php foreach ($gallery_items as $gallery_index => $gallery_item) : ?>
                    <button type="button" class="gallery-item gallery-anim" data-index="<?= $gallery_index ?>" aria-label="Buka foto <?= $gallery_index + 1 ?>">
                        <img src="<?= htmlspecialchars($gallery_item->thumb) ?>" alt="<?= htmlspecialchars($gallery_item->alt) ?>" loading="lazy">
                        <span class="gallery-zoom"><i class="fa-solid fa-magnifying-glass-plus"></i></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <?php if ($gallery_pages > 1) : ?>
                <nav class="gallery-pagination" aria-label="Halaman galeri">
                    <?php if ($gallery_current > 1) : ?>
                        <a href="<?= htmlspecialchars($gallery_base) ?>?page=<?= $gallery_current - 1 ?>"><i class="fa-solid fa-arrow-left"></i> <?= $gallery_content->prev ?></a>
                    <?php endif; ?>
                    <?php for ($gallery_page = 1; $gallery_page <= $gallery_pages; $gallery_page++) : ?>
                        <?php if ($gallery_page === $gallery_current) : ?>
                            <span class="active"><?= $gallery_page ?></span>
                        <?php else : ?>
                            <a href="<?= htmlspecialchars($gallery_base) ?>?page=<?= $gallery_page ?>"><?= $gallery_page ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($gallery_current < $gallery_pages) : ?>
                        <a href="<?= htmlspecialchars($gallery_base) ?>?page=<?= $gallery_current + 1 ?>"><?= $gallery_content->next ?> <i class="fa-solid fa-arrow-right"></i></a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        <?php else : ?>
            <div class="gallery-empty">
                <i class="fa-regular fa-images"></i>
                <?= $gallery_content->empty ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($gallery_items)) : ?>
    <div class="gallery-lightbox" role="dialog" aria-modal="true" aria-label="Penampil foto" aria-hidden="true">
        <div class="gallery-lightbox-top">
            <div class="gallery-lightbox-count"><span class="current">01</span> / <?= str_pad(count($gallery_items), 2, '0', STR_PAD_LEFT) ?></div>
            <div class="gallery-lightbox-tools">
                <button type="button" class="gallery-lightbox-btn" data-action="zoom" aria-label="Perbesar"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                <button type="button" class="gallery-lightbox-btn" data-action="close" aria-label="Tutup"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <div class="gallery-lightbox-stage" data-lenis-prevent>
            <button type="button" class="gallery-lightbox-btn gallery-lightbox-nav prev" data-action="prev" aria-label="Foto sebelumnya"><i class="fa-solid fa-arrow-left"></i></button>
            <img class="gallery-lightbox-image" src="" alt="">
            <button type="button" class="gallery-lightbox-btn gallery-lightbox-nav next" data-action="next" aria-label="Foto berikutnya"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <p class="gallery-lightbox-caption"></p>
        <div class="gallery-lightbox-thumbs" data-lenis-prevent>
            <?php foreach ($gallery_items as $gallery_index => $gallery_item) : ?>
                <button type="button" data-index="<?= $gallery_index ?>" aria-label="Foto <?= $gallery_index + 1 ?>">
                    <img src="<?= htmlspecialchars($gallery_item->thumb) ?>" alt="" loading="lazy">
                </button>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const section = document.querySelector('.gallery-page');
        const lightbox = document.querySelector('.gallery-lightbox');
        const ease = [0.22, 1, 0.36, 1];

        const { animate, inView, stagger } = Motion;
        const items = section.querySelectorAll('.gallery-anim');

        items.forEach(function (el) {
            el.style.opacity = 0;
        });

        inView(section, function () {
            animate(items, { opacity: [0, 1], y: [40, 0] }, { duration: 0.7, delay: stagger(0.06), easing: ease });
        }, { amount: 0.05 });

        animateHover('.gallery-page .gallery-item', { y: -4 });

        if (!lightbox) {
            return;
        }

        const photos = <?= json_encode($gallery_items, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        const stage = lightbox.querySelector('.gallery-lightbox-stage');
        const image = lightbox.querySelector('.gallery-lightbox-image');
        const caption = lightbox.querySelector('.gallery-lightbox-caption');
        const counter = lightbox.querySelector('.gallery-lightbox-count .current');
        const thumbs = lightbox.querySelectorAll('.gallery-lightbox-thumbs button');
        const zoomButton = lightbox.querySelector('[data-action="zoom"]');
        const zoomScale = 2.2;
        let current = 0;
        let scale = 1;
        let panX = 0;
        let panY = 0;
        let pointer = null;

        function applyTransform() {
            image.style.transform = 'translate(' + panX + 'px, ' + panY + 'px) scale(' + scale + ')';
            image.classList.toggle('zoomed', scale > 1);
            zoomButton.innerHTML = scale > 1 ? '<i class="fa-solid fa-magnifying-glass-minus"></i>' : '<i class="fa-solid fa-magnifying-glass-plus"></i>';
        }

        function clampPan() {
            const maxX = Math.max(0, (image.offsetWidth * scale - stage.clientWidth) / 2);
            const maxY = Math.max(0, (image.offsetHeight * scale - stage.clientHeight) / 2);
            panX = Math.min(maxX, Math.max(-maxX, panX));
            panY = Math.min(maxY, Math.max(-maxY, panY));
        }

        function resetZoom() {
            scale = 1;
            panX = 0;
            panY = 0;
            image.style.transition = 'transform 0.35s ease';
            applyTransform();
        }

        function zoomAt(clientX, clientY) {
            const rect = image.getBoundingClientRect();
            const offsetX = clientX - (rect.left + rect.width / 2);
            const offsetY = clientY - (rect.top + rect.height / 2);
            scale = zoomScale;
            panX = -offsetX * (zoomScale - 1);
            panY = -offsetY * (zoomScale - 1);
            clampPan();
            image.style.transition = 'transform 0.35s ease';
            applyTransform();
        }

        function show(index, direction) {
            current = (index + photos.length) % photos.length;
            const photo = photos[current];
            resetZoom();
            image.src = photo.full;
            image.alt = photo.alt || '';
            caption.textContent = photo.title || '';
            counter.textContent = String(current + 1).padStart(2, '0');
            thumbs.forEach(function (thumb, i) {
                thumb.classList.toggle('active', i === current);
                if (i === current) {
                    thumb.scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'smooth' });
                }
            });
            if (direction) {
                image.style.transition = 'none';
                Motion.animate(image, { opacity: [0, 1], x: [direction * 60, 0] }, { duration: 0.45, easing: ease });
            }
        }

        function open(index) {
            show(index, 0);
            lightbox.classList.add('open');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            if (window.lenis) {
                window.lenis.stop();
            }
            image.style.transition = 'none';
            Motion.animate(image, { opacity: [0, 1], scale: [0.85, 1] }, { duration: 0.5, easing: ease }).then(function () {
                image.style.transform = '';
                applyTransform();
            });
        }

        function close() {
            lightbox.classList.remove('open');
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            if (window.lenis) {
                window.lenis.start();
            }
            resetZoom();
        }

        section.querySelectorAll('.gallery-item').forEach(function (item) {
            item.addEventListener('click', function () {
                open(Number(item.dataset.index));
            });
        });

        thumbs.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                const index = Number(thumb.dataset.index);
                show(index, index > current ? 1 : -1);
            });
        });

        lightbox.addEventListener('click', function (e) {
            const action = e.target.closest('[data-action]');
            if (action) {
                const name = action.dataset.action;
                if (name === 'close') {
                    close();
                } else if (name === 'prev') {
                    show(current - 1, -1);
                } else if (name === 'next') {
                    show(current + 1, 1);
                } else if (name === 'zoom') {
                    if (scale > 1) {
                        resetZoom();
                    } else {
                        const rect = image.getBoundingClientRect();
                        zoomAt(rect.left + rect.width / 2, rect.top + rect.height / 2);
                    }
                }
                return;
            }
            if (e.target === stage) {
                close();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('open')) {
                return;
            }
            if (e.key === 'Escape') {
                close();
            } else if (e.key === 'ArrowLeft') {
                show(current - 1, -1);
            } else if (e.key === 'ArrowRight') {
                show(current + 1, 1);
            }
        });

        image.addEventListener('pointerdown', function (e) {
            e.preventDefault();
            image.setPointerCapture(e.pointerId);
            pointer = { x: e.clientX, y: e.clientY, startX: e.clientX, startY: e.clientY, panX: panX, panY: panY, moved: false };
            image.style.transition = 'none';
            image.classList.add('dragging');
        });

        image.addEventListener('pointermove', function (e) {
            if (!pointer) {
                return;
            }
            const dx = e.clientX - pointer.startX;
            const dy = e.clientY - pointer.startY;
            if (Math.abs(dx) > 5 || Math.abs(dy) > 5) {
                pointer.moved = true;
            }
            if (scale > 1) {
                panX = pointer.panX + dx;
                panY = pointer.panY + dy;
                clampPan();
            } else {
                panX = dx;
                panY = 0;
            }
            applyTransform();
        });

        function endPointer(e) {
            if (!pointer) {
                return;
            }
            const dx = e.clientX - pointer.startX;
            const moved = pointer.moved;
            pointer = null;
            image.classList.remove('dragging');

            if (scale > 1) {
                if (!moved) {
                    resetZoom();
                }
                return;
            }

            if (moved && Math.abs(dx) > 60) {
                show(current + (dx < 0 ? 1 : -1), dx < 0 ? 1 : -1);
                return;
            }

            if (!moved) {
                zoomAt(e.clientX, e.clientY);
                return;
            }

            resetZoom();
        }

        image.addEventListener('pointerup', endPointer);
        image.addEventListener('pointercancel', endPointer);

        image.addEventListener('dblclick', function (e) {
            e.preventDefault();
        });

        window.addEventListener('resize', function () {
            if (scale > 1) {
                clampPan();
                applyTransform();
            }
        });
    });
</script>

