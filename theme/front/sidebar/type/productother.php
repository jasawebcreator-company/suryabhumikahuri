<style>
    .product-other {
        background: var(--color6);
    }

    .product-other .product-other-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 2rem;
        margin-bottom: 2.75rem;
    }

    .product-other .section-header,
    .product-other .section-title {
        margin-bottom: 0;
    }

    .product-other .text-link {
        flex-shrink: 0;
    }

    .product-other .product-other-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }

    .product-other .product-other-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        background: var(--color5);
        color: var(--color7);
        transition: box-shadow 0.3s;
    }

    .product-other .product-other-media {
        aspect-ratio: 1.65;
        overflow: hidden;
        background: var(--color9);
    }

    .product-other .product-other-media img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .product-other .product-other-body {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        flex: 1;
        padding: 30px 24px;
    }

    .product-other .product-other-body small {
        display: block;
        margin-bottom: 16px;
        color: #a8853e;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.6px;
        text-transform: uppercase;
    }

    .product-other .product-other-body h3 {
        margin: 0;
        font-family: var(--primtext);
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -0.6px;
    }

    .product-other .product-other-arrow {
        flex-shrink: 0;
        color: #a99a64;
        font-size: 32px;
        font-weight: 400;
        line-height: 1;
        transition: transform 0.3s;
    }

    .product-other .product-other-card:hover {
        color: var(--color7);
        box-shadow: 0 16px 36px rgba(24, 33, 39, 0.1);
    }

    .product-other .product-other-card:hover img {
        transform: scale(1.04);
    }

    .product-other .product-other-card:hover .product-other-arrow {
        transform: translate(3px, -3px);
    }

    .product-other .product-other-card:focus-visible {
        outline: 2px solid var(--colors);
        outline-offset: 4px;
    }

    @media (max-width: 767.98px) {
        .product-other .product-other-head {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
        }

        .product-other .product-other-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .product-other .product-other-card,
        .product-other .product-other-media img,
        .product-other .product-other-arrow {
            transition: none;
        }
    }
</style>

<section class="product-other" id="productOther" aria-labelledby="productOtherTitle">
    <div class="container-global">
        <div class="product-other-head">
            <div class="section-header">
                <div class="section-eyebrow">Jelajahi Lebih Lanjut</div>
                <h2 class="section-title" id="productOtherTitle"><?= $data->title ?></h2>
            </div>
            <a class="text-link" href="<?= base_url('category/product') ?>">Lihat Semua <span aria-hidden="true">↗</span></a>
        </div>
        <div class="product-other-grid">
            <?php foreach ($data->data as $items) : ?>
                <a class="product-other-card" href="<?= htmlspecialchars(base_url(ROUTE_PRODUCT_VIEW . $items->slug)) ?>">
                    <div class="product-other-media">
                        <img src="<?= $items->img_cover_url ?>" alt="<?= $items->title ?>" loading="lazy">
                    </div>
                    <div class="product-other-body">
                        <div>
                            <small>Produk</small>
                            <h3><?= htmlspecialchars($items->title) ?></h3>
                        </div>
                        <span class="product-other-arrow" aria-hidden="true">↗</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>