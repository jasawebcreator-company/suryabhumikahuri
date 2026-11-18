<?php
$related_labels = ['product' => 'Layanan Lainnya', 'service' => 'Layanan Lainnya', 'project' => 'Portofolio Terkait'];
$related_title = $related_labels[$single_type] ?? 'Lainnya';
$related_package = (int) ($data->result->package_id ?? 0);
$related_id = (int) ($data->result->id ?? 0);
$related_items = [];

if ($related_package > 0) {
    $related_ci =& get_instance();
    $related_query = @$related_ci->db->query(
        'SELECT id, title, slug, tags, img_cover_url, img_thumb_url, custom_field_1, custom_field_2 FROM products WHERE company_id = ? AND package_id = ? AND id != ? AND draft = "0" ORDER BY id DESC LIMIT 3',
        [COMPANY_ID, $related_package, $related_id]
    );
    $related_items = $related_query ? $related_query->result() : [];
}

$related_all = base_url(ROUTE_PRODUCT . ($data->cat_data->slug ?? 'all'));
?>
<?php if (!empty($related_items)) : ?>
    <style>
        .single-related {
            background: var(--color6);

            .single-related-head {
                display: flex;
                align-items: flex-end;
                justify-content: space-between;
                gap: 2rem;
                margin-bottom: 2.75rem;

                .section-header {
                    margin-bottom: 0;

                    .section-title {
                        margin-bottom: 0;
                    }
                }
            }

            .related-card {
                display: flex;
                flex-direction: column;
                height: 100%;
                background: var(--color5);
                color: var(--color7);
                transition: box-shadow 0.4s;

                .related-media {
                    height: 240px;
                    overflow: hidden;
                    background: var(--color9);

                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        filter: saturate(0.85);
                        transition: transform 0.7s;
                    }
                }

                .related-body {
                    display: flex;
                    align-items: flex-end;
                    justify-content: space-between;
                    gap: 1rem;
                    padding: 26px 28px 30px;

                    small {
                        display: block;
                        margin-bottom: 12px;
                        color: #a8853e;
                        font-size: 9px;
                        font-weight: 800;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                    }

                    h3 {
                        margin: 0;
                        font-size: 18px;
                        font-weight: 800;
                        letter-spacing: -0.5px;
                    }

                    i {
                        flex: none;
                        color: #a8853e;
                        transition: transform 0.3s, color 0.3s;
                    }
                }

                &:hover {
                    color: var(--color7);
                    box-shadow: 0 22px 44px rgba(24, 33, 39, 0.1);

                    .related-media img {
                        transform: scale(1.06);
                    }

                    .related-body i {
                        color: var(--colors);
                        transform: translate(3px, -3px);
                    }
                }
            }
        }
    </style>

    <section class="single-related" id="singleRelated" aria-labelledby="singleRelatedTitle">
        <div class="container-global">
            <div class="single-related-head" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow">Jelajahi Lainnya</div>
                    <h2 class="section-title" id="singleRelatedTitle"><?= single_title($related_title, 1) ?></h2>
                </div>
                <a class="text-link" href="<?= htmlspecialchars($related_all) ?>">Lihat Semua <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>

            <div class="row">
                <?php foreach ($related_items as $related_item) : ?>
                    <?php
                    $related_img = !empty($related_item->img_cover_url) ? $related_item->img_cover_url : ($related_item->img_thumb_url ?? '');
                    $related_label = $related_item->custom_field_2 ?: ($related_item->custom_field_1 ?: $related_item->tags);
                    ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-animate>
                        <a class="related-card" href="<?= htmlspecialchars(base_url(ROUTE_PRODUCT_VIEW . urlencode($related_item->slug))) ?>">
                            <div class="related-media">
                                <?php if (!empty($related_img)) : ?>
                                    <img src="<?= htmlspecialchars($related_img) ?>" alt="<?= htmlspecialchars($related_item->title) ?>" loading="lazy">
                                <?php endif; ?>
                            </div>
                            <div class="related-body">
                                <div>
                                    <small><?= htmlspecialchars($related_label) ?></small>
                                    <h3><?= htmlspecialchars($related_item->title) ?></h3>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            animateEntrance('#singleRelated', { stagger: 0.1 });
        });
    </script>
<?php endif; ?>
