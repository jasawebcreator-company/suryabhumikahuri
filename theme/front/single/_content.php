<?php
$content_html = trim((string) ($data->result->content ?? ''));
$content_eyebrow = $single_content['eyebrow'] ?? 'Ringkasan';
$content_title = $single_content['title'] ?? ($data->result->title ?? '');
$content_cat = (string) ($data->cat_data->id ?? '');
$content_scope = $content_cat === '8553' ? single_scope($data) : ['title' => '', 'items' => []];
$content_scope_title = $content_scope['title'];
$content_scope_items = $content_scope['items'];

$content_side = '';

if ($content_cat === '8554') {
    $content_side = 'overview';
} elseif (!empty($content_scope_items)) {
    $content_side = 'scope';
}

$content_overview = $content_side !== '';

$content_overview_rows = array_values(array_filter([
    ['label' => 'Nama Proyek', 'value' => trim((string) ($data->result->title ?? ''))],
    ['label' => 'Sektor', 'value' => trim((string) ($data->result->custom_field_1 ?? ''))],
    ['label' => 'Lokasi', 'value' => trim((string) ($data->result->custom_field_2 ?? ''))],
    ['label' => 'Lingkup Ringkas', 'value' => trim((string) ($data->result->custom_field_3 ?? ''))],
], function ($row) {
    return $row['value'] !== '';
}));

$content_overview_back = base_url(ROUTE_PRODUCT . ($data->cat_data->slug ?? 'all'));
?>
<style>
    .single-content {
        background: var(--color5);

        .single-content-inner {
            max-width: 860px;
            margin-inline: auto;
        }

        &.has-overview {
            .single-content-inner {
                max-width: none;
                margin-inline: 0;
            }
        }

        .content-overview,
        .content-scope {
            position: sticky;
            top: calc(var(--header-height) + 30px);
            padding: 34px;
            background: #f9f9f7;
            border: 1px solid #e6e7e1;

            .scope-list {
                margin: 0;
                padding: 0;
                list-style: none;

                li {
                    display: flex;
                    align-items: flex-start;
                    gap: 16px;
                    padding: 17px 0;
                    border-bottom: 1px solid #e3e4e0;
                    color: #5f696e;
                    font-size: 16px;
                    line-height: 1.5;

                    i {
                        margin-top: 4px;
                        color: #a8853e;
                        font-size: 14px;
                    }
                }
            }

            .scope-note {
                margin: 1.4rem 0 0;
                color: #88908e;
                font-size: 13px;
                line-height: 1.7;
            }

            .overview-tag {
                color: #a8853e;
                font-size: 10px;
                font-weight: 800;
                letter-spacing: 0.17em;
                text-transform: uppercase;
            }

            h3 {
                margin: 16px 0 28px;
                font-size: 25px;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .overview-row {
                padding: 18px 0;
                border-bottom: 1px solid #e3e4e0;

                span {
                    display: block;
                    color: var(--color8);
                    font-size: 13px;
                }

                strong {
                    display: block;
                    margin-top: 6px;
                    color: var(--color7);
                    font-size: 16px;
                    font-weight: 700;
                }
            }

            .btn-main {
                width: 100%;
                margin-top: 1.8rem;
                justify-content: center;
            }

            .overview-back {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                margin-top: 1.4rem;
                color: #3a4144;
                font-size: 15px;
                font-weight: 600;
                transition: color 0.25s;

                i {
                    color: #a8853e;
                }

                &:hover {
                    color: #a8853e;
                }
            }
        }

        @media (max-width: 991.98px) {
            .content-overview,
            .content-scope {
                position: static;
                margin-top: 2.5rem;
            }
        }

        .single-content-body {
            color: var(--color8);
            font-size: 15px;
            line-height: 1.95;

            p {
                margin-bottom: 1.25rem;
            }

            h2,
            h3,
            h4 {
                margin: 2rem 0 1rem;
                color: var(--color7);
                font-weight: 800;
                letter-spacing: -0.5px;
            }

            ul,
            ol {
                margin-bottom: 1.25rem;
                padding-left: 1.25rem;
            }

            li {
                margin-bottom: 0.5rem;
            }

            strong {
                color: var(--color7);
            }

            img {
                max-width: 100%;
                height: auto;
                margin: 1.5rem 0;
            }

            a {
                color: #a8853e;
                border-bottom: 1px solid currentColor;
            }
        }
    }
</style>

<?php if ($content_html !== '' || $content_overview) : ?>
    <section class="single-content<?= $content_overview ? ' has-overview' : '' ?>" id="singleContent" aria-labelledby="singleContentTitle">
        <div class="container-global">
            <?php if ($content_overview) : ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content-inner">
                            <div class="section-header" data-animate>
                                <div class="section-eyebrow"><?= htmlspecialchars($content_eyebrow) ?></div>
                                <h2 class="section-title" id="singleContentTitle"><?= single_title($content_title, 1) ?></h2>
                            </div>
                            <div class="single-content-body" data-animate><?= $content_html ?></div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-animate>
                        <?php if ($content_side === 'scope') : ?>
                            <aside class="content-scope">
                                <div class="overview-tag">Lingkup Pekerjaan</div>
                                <h3><?= htmlspecialchars($content_scope_title !== '' ? $content_scope_title : 'Apa yang dapat dibahas?') ?></h3>
                                <ul class="scope-list">
                                    <?php foreach ($content_scope_items as $content_scope_item) : ?>
                                        <li><i class="fa-solid fa-check" aria-hidden="true"></i><span><?= htmlspecialchars($content_scope_item) ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a class="btn-main is-gold" href="<?= htmlspecialchars(base_url('contact')) ?>">Diskusi Kebutuhan <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                                <p class="scope-note">Kebutuhan teknis, material dan lingkup final mengikuti hasil konsultasi proyek.</p>
                            </aside>
                        <?php else : ?>
                            <aside class="content-overview">
                                <div class="overview-tag">Project Overview</div>
                                <h3>Informasi Proyek</h3>
                                <?php foreach ($content_overview_rows as $content_overview_row) : ?>
                                    <div class="overview-row">
                                        <span><?= htmlspecialchars($content_overview_row['label']) ?></span>
                                        <strong><?= htmlspecialchars($content_overview_row['value']) ?></strong>
                                    </div>
                                <?php endforeach; ?>
                                <a class="btn-main is-gold" href="<?= htmlspecialchars(base_url('contact')) ?>">Diskusi Proyek Serupa <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                                <a class="overview-back" href="<?= htmlspecialchars($content_overview_back) ?>"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Kembali ke semua proyek</a>
                            </aside>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="single-content-inner">
                    <div class="section-header" data-animate>
                        <div class="section-eyebrow"><?= htmlspecialchars($content_eyebrow) ?></div>
                        <h2 class="section-title" id="singleContentTitle"><?= single_title($content_title, 1) ?></h2>
                    </div>
                    <div class="single-content-body" data-animate><?= $content_html ?></div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            animateEntrance('#singleContent', { stagger: 0.12 });
            animateHover('#singleContent .btn-main', { y: -3 });
        });
    </script>
<?php endif; ?>
