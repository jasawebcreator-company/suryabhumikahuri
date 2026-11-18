<?php
$single_type = 'service';
include __DIR__ . '/_helpers.php';
include __DIR__ . '/_hero.php';

$service_title = trim((string) ($data->result->title ?? ''));

$service_intro = single_addon($data, 'tentang_layanan');
if ($service_intro && (string) ($data->cat_data->id ?? '') !== '8554') {
    $single_intro = [
        'addon' => $service_intro,
        'eyebrow' => 'Ringkasan Layanan',
        'link' => ['label' => 'Konsultasikan Layanan', 'url' => base_url('contact')],
    ];
    include __DIR__ . '/_intro.php';
} else {
    $single_content = ['eyebrow' => 'Ringkasan Layanan'];
    include __DIR__ . '/_content.php';
}

$service_scope = single_addon($data, 'lingkup_pendukung');
$service_scope_rows = single_rows($service_scope);

$service_steps = single_addon($data, 'alur_konsultasi');
$service_steps_rows = single_rows($service_steps);
?>
<style>
    .single-scope {
        position: relative;
        background: var(--color3);
        color: var(--color10);
        isolation: isolate;
        overflow: hidden;

        &::before {
            content: "";
            position: absolute;
            top: -38%;
            left: -14%;
            z-index: -1;
            width: 46vw;
            max-width: 760px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.035);
            pointer-events: none;
        }

        .scope-left {
            position: sticky;
            top: calc(var(--header-height) + 24px);

            .section-header {
                margin-bottom: 0;

                .section-title {
                    max-width: 420px;
                    margin-bottom: 26px;
                    font-size: clamp(30px, 3vw, 46px);
                    letter-spacing: -2px;
                }

                .section-desc {
                    max-width: 380px;
                    font-size: 13px;
                }
            }
        }

        .scope-list {
            margin: 0;
            padding: 0;
            list-style: none;
            border-top: 1px solid rgba(224, 197, 138, 0.22);
        }

        .scope-item {
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr) 24px;
            gap: 6px 18px;
            align-items: start;
            padding: 30px 0;
            border-bottom: 1px solid rgba(224, 197, 138, 0.22);

            .scope-no {
                padding-top: 3px;
                color: var(--color2);
                font-family: var(--primtext);
                font-size: 11px;
                font-weight: 800;
            }

            h3 {
                margin: 0 0 8px;
                font-size: 18px;
                font-weight: 800;
                letter-spacing: -0.5px;
                transition: color 0.3s;
            }

            p {
                margin: 0;
                color: #b9c2c6;
                font-size: 12px;
                line-height: 1.85;
            }

            i {
                padding-top: 4px;
                color: var(--color4);
                transition: transform 0.3s;
            }

            &:hover {
                h3 {
                    color: var(--color4);
                }

                i {
                    transform: translate(3px, -3px);
                }
            }
        }

        @media (max-width: 991.98px) {
            .scope-left {
                position: static;
                margin-bottom: 2.5rem;
            }
        }
    }

    .single-steps {
        background: var(--color5);

        .single-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 3.5rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 380px;
            }
        }

        .step {
            padding-right: 30px;

            .step-no {
                color: #a8853e;
                font-family: var(--primtext);
                font-size: 36px;
                font-weight: 800;
                letter-spacing: -1.5px;
                line-height: 1;
            }

            .step-line {
                position: relative;
                height: 1px;
                margin: 22px 0 24px;
                background: #cfd4d6;

                &::before {
                    content: "";
                    position: absolute;
                    left: 0;
                    top: -4px;
                    width: 9px;
                    height: 9px;
                    background: #a8853e;
                    transition: transform 0.3s;
                }
            }

            h3 {
                margin: 0 0 10px;
                font-size: 17px;
                font-weight: 800;
                letter-spacing: -0.4px;
            }

            p {
                max-width: 320px;
                margin: 0;
                color: #667178;
                font-size: 12px;
                line-height: 1.85;
            }

            &:hover .step-line::before {
                transform: scale(1.4);
            }
        }

        @media (max-width: 991.98px) {
            .single-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .step {
                margin-bottom: 1.5rem;
                padding-right: 0;
            }
        }
    }
</style>

<?php if (!empty($service_scope_rows)) : ?>
    <section class="single-scope" id="singleScope" aria-labelledby="singleScopeTitle">
        <div class="container-global">
            <div class="row">
                <div class="col-lg-4">
                    <div class="scope-left" data-animate>
                        <div class="section-header is-light">
                            <div class="section-eyebrow">Lingkup Pekerjaan</div>
                            <h2 class="section-title" id="singleScopeTitle"><?= single_title($service_scope->name ?? '') ?></h2>
                            <?php if (!empty(trim(strip_tags($service_scope->content ?? '')))) : ?>
                                <p class="section-desc"><?= htmlspecialchars(trim(str_replace('`', '', strip_tags($service_scope->content)))) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <ol class="scope-list">
                        <?php foreach ($service_scope_rows as $i => $row) : ?>
                            <li class="scope-item" data-animate>
                                <span class="scope-no"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                                <div>
                                    <h3><?= htmlspecialchars($row->name ?? '') ?></h3>
                                    <p><?= htmlspecialchars($row->value ?? '') ?></p>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($service_steps_rows)) : ?>
    <section class="single-steps" id="singleSteps" aria-labelledby="singleStepsTitle">
        <div class="container-global">
            <div class="single-head" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow">Alur Konsultasi</div>
                    <h2 class="section-title" id="singleStepsTitle"><?= single_title($service_steps->name ?? '') ?></h2>
                </div>
                <?php if (!empty(trim(strip_tags($service_steps->content ?? '')))) : ?>
                    <p class="section-desc"><?= htmlspecialchars(trim(str_replace('`', '', strip_tags($service_steps->content)))) ?></p>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php foreach ($service_steps_rows as $i => $row) : ?>
                    <div class="col-md-4" data-animate>
                        <div class="step">
                            <div class="step-no"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                            <div class="step-line"></div>
                            <h3><?= htmlspecialchars($row->name ?? '') ?></h3>
                            <p><?= htmlspecialchars($row->value ?? '') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$single_cta = [
    'eyebrow' => 'Konsultasi Layanan',
    'title' => 'Butuh ' . $service_title . ' untuk Proyek Anda?',
    'desc' => 'Ceritakan jenis bangunan dan rencana proyek Anda agar tim Surya Bhumi Kahuri dapat membantu mengarahkan kebutuhan teknisnya.',
];
include __DIR__ . '/_cta.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ['#singleScope', '#singleSteps'].forEach(function (selector) {
            if (document.querySelector(selector)) {
                animateEntrance(selector, { stagger: 0.1 });
            }
        });
    });
</script>
