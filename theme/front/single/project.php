<?php
$single_type = 'project';
include __DIR__ . '/_helpers.php';
include __DIR__ . '/_hero.php';

$project_result = $data->result ?? null;

$project_meta = array_values(array_filter([
    ['label' => 'Sektor', 'value' => trim((string) ($project_result->custom_field_1 ?? ''))],
    ['label' => 'Lokasi', 'value' => trim((string) ($project_result->custom_field_2 ?? ''))],
    ['label' => 'Lingkup', 'value' => trim((string) ($project_result->custom_field_3 ?? ''))],
], function ($meta) {
    return $meta['value'] !== '';
}));

$project_about = single_addon($data, 'tentang_proyek');
$project_doc = single_addon($data, 'dokumentasi_proyek');
$project_doc_text = $project_doc ? implode(' ', single_paragraphs($project_doc->content ?? '')) : '';
?>
<style>
    .single-meta {
        background: var(--color6);

        .container-global {
            padding-top: 0;
            padding-bottom: 0;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(var(--meta-count, 3), 1fr);
        }

        .meta-cell {
            padding: 30px 34px;
            border-left: 1px solid var(--color9);

            &:first-child {
                padding-left: 0;
                border-left: 0;
            }

            small {
                display: block;
                margin-bottom: 10px;
                color: #a8853e;
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            strong {
                font-family: var(--primtext);
                font-size: 16px;
                font-weight: 800;
                letter-spacing: -0.3px;
            }
        }

        @media (max-width: 767.98px) {
            .meta-grid {
                grid-template-columns: 1fr;
            }

            .meta-cell {
                padding: 20px 0;
                border-left: 0;
                border-top: 1px solid var(--color9);

                &:first-child {
                    border-top: 0;
                }
            }
        }
    }

    .single-doc {
        background: var(--colors);
        color: var(--color10);

        .container-global {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .doc-text {
            .section-header {
                max-width: 720px;
                margin: 0 auto 40px;

                .section-title {
                    margin-bottom: 24px;
                    font-size: clamp(28px, 3vw, 46px);
                    letter-spacing: -1.8px;
                }

                .section-desc {
                    max-width: 560px;
                    font-size: 14px;
                }
            }

            .text-link {
                color: var(--color4);
                border-color: rgba(224, 197, 138, 0.5);

                &:hover {
                    color: var(--color10);
                }
            }
        }

        @media (max-width: 767.98px) {
            .container-global {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
        }
    }
</style>

<?php if (!empty($project_meta)) : ?>
    <section class="single-meta" id="singleMeta" aria-label="Informasi proyek">
        <div class="container-global">
            <div class="meta-grid" style="--meta-count: <?= count($project_meta) ?>">
                <?php foreach ($project_meta as $meta) : ?>
                    <div class="meta-cell" data-animate>
                        <small><?= htmlspecialchars($meta['label']) ?></small>
                        <strong><?= htmlspecialchars($meta['value']) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
if ($project_about && empty(single_scope($data)['items'])) {
    $single_intro = [
        'addon' => $project_about,
        'eyebrow' => 'Tentang Proyek',
        'label' => 'Portofolio' . (!empty($project_result->custom_field_1) ? ' / ' . $project_result->custom_field_1 : ''),
    ];
    include __DIR__ . '/_intro.php';
} else {
    $single_content = ['eyebrow' => 'Tentang Proyek'];
    include __DIR__ . '/_content.php';
}
?>

<?php if ($project_doc) : ?>
    <section class="single-doc" id="singleDoc" aria-labelledby="singleDocTitle">
        <div class="container-global">
            <div class="doc-text" data-animate>
                <div class="section-header is-light is-center">
                    <div class="section-eyebrow">Dokumentasi Proyek</div>
                    <h2 class="section-title" id="singleDocTitle"><?= single_title($project_doc->name ?? 'Dokumentasi Proyek') ?></h2>
                    <?php if ($project_doc_text !== '') : ?>
                        <p class="section-desc"><?= htmlspecialchars($project_doc_text) ?></p>
                    <?php endif; ?>
                </div>
                <div class="text-center">
                    <a class="text-link" href="<?= htmlspecialchars(base_url('contact')) ?>">Diskusi Proyek Serupa <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$single_cta = [
    'eyebrow' => 'Diskusi Proyek Serupa',
    'title' => 'Punya Proyek dengan Kebutuhan Serupa?',
    'desc' => 'Ceritakan kebutuhan sistem MEP bangunan Anda kepada tim Surya Bhumi Kahuri untuk menentukan solusi yang sesuai.',
];
include __DIR__ . '/_cta.php';
include __DIR__ . '/_related.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ['#singleMeta', '#singleDoc'].forEach(function (selector) {
            if (document.querySelector(selector)) {
                animateEntrance(selector, { stagger: 0.1 });
            }
        });
    });
</script>
