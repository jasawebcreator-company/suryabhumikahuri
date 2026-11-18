<?php
$single_type = 'product';
include __DIR__ . '/_helpers.php';
include __DIR__ . '/_hero.php';

$product_title = trim((string) ($data->result->title ?? ''));

$product_intro = single_addon($data, 'mengenal_produk');
if ($product_intro) {
    $single_intro = [
        'addon' => $product_intro,
        'eyebrow' => 'Ringkasan Layanan',
        'label' => 'Layanan MEP',
    ];
    include __DIR__ . '/_intro.php';
} else {
    $single_content = ['eyebrow' => 'Ringkasan Layanan'];
    include __DIR__ . '/_content.php';
}

$product_apply = single_addon($data, 'penerapan_produk');
$product_apply_rows = single_rows($product_apply);

$product_consider = single_addon($data, 'sebelum_menentukan_unit');
$product_consider_rows = single_rows($product_consider);
?>
<style>
    .single-apply {
        background: var(--color6);

        .single-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 3rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 360px;
            }
        }

        .apply-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 300px;
            padding: 30px 30px 34px;
            background: var(--color10);
            transition: box-shadow 0.3s;

            .apply-top {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: auto;
                padding-bottom: 1rem;
                color: #a8853e;
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 2px;
                text-transform: uppercase;

                i {
                    color: #a8853e;
                    font-size: 15px;
                    transition: transform 0.3s, color 0.3s;
                }
            }

            h3 {
                margin: 0 0 14px;
                font-size: 18px;
                font-weight: 800;
                letter-spacing: -0.5px;
                line-height: 1.35;
            }

            p {
                margin: 0;
                color: #667178;
                font-size: 12px;
                line-height: 1.9;
            }

            &:hover {
                box-shadow: 0 18px 40px rgba(24, 33, 39, 0.08);

                .apply-top i {
                    color: var(--colors);
                    transform: translate(3px, -3px);
                }
            }
        }

        @media (max-width: 991.98px) {
            .single-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }

    .single-consider {
        background: var(--color5);

        .single-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 3rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 360px;
            }
        }

        .consider-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 260px;
            padding: 30px 28px 32px;
            background: var(--color6);
            transition: background 0.3s;

            .consider-top {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-bottom: .2rem;
                color: #a8853e;
                font-family: var(--primtext);
                font-size: 11px;
                font-weight: 800;

                i {
                    font-size: 15px;
                    transition: transform 0.3s, color 0.3s;
                }
            }

			i {
				font-size: 3rem;
				margin-block: auto;
				color: #a8853e;
			}

            h3 {
                margin: 0 0 12px;
                font-size: 17px;
                font-weight: 800;
                letter-spacing: -0.5px;
            }

            p {
                margin: 0;
                color: #667178;
                font-size: 12px;
                line-height: 1.9;
            }

            &:hover {
                background: #e3e4e0;

                .consider-top i {
                    color: var(--colors);
                    transform: translate(3px, -3px);
                }
            }
        }

        @media (max-width: 991.98px) {
            .single-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<?php if (!empty($product_apply_rows)) : ?>
    <section class="single-apply" id="singleApply" aria-labelledby="singleApplyTitle">
        <div class="container-global">
            <div class="single-head" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow">Penerapan</div>
                    <h2 class="section-title" id="singleApplyTitle"><?= single_title($product_apply->name ?? '', 1) ?></h2>
                </div>
                <?php if (!empty(trim(strip_tags($product_apply->content ?? '')))) : ?>
                    <p class="section-desc"><?= htmlspecialchars(trim(str_replace('`', '', strip_tags($product_apply->content)))) ?></p>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php foreach ($product_apply_rows as $i => $row) : ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-animate>
                        <div class="apply-card">
                            <div class="apply-top"><span><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?> / Penerapan</span><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></div>
							<img class="w-full mb-3" src="<?= $row->image_url ?? "" ?>" alt="cover">
                            <h3><?= htmlspecialchars($row->name ?? '') ?></h3>
                            <p><?= htmlspecialchars($row->value ?? '') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($product_consider_rows)) : ?>
    <section class="single-consider" id="singleConsider" aria-labelledby="singleConsiderTitle">
        <div class="container-global">
            <div class="single-head" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow">Pertimbangan Utama</div>
                    <h2 class="section-title" id="singleConsiderTitle"><?= single_title($product_consider->name ?? '', 1) ?></h2>
                </div>
                <?php if (!empty(trim(strip_tags($product_consider->content ?? '')))) : ?>
                    <p class="section-desc"><?= htmlspecialchars(trim(str_replace('`', '', strip_tags($product_consider->content)))) ?></p>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php foreach ($product_consider_rows as $i => $row) : ?>
                    <div class="col-md-6 col-xl-3 mb-4" data-animate>
                        <div class="consider-card">
                            <div class="consider-top"><span><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></div>
							<i class="<?= $row->cells[2]->value ?>"></i>
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
    'eyebrow' => 'Mari Berdiskusi',
    'title' => 'Perlu ' . $product_title . ' untuk Proyek Anda?',
    'desc' => 'Bicarakan kebutuhan bangunan, pilihan sistem, dan langkah selanjutnya bersama tim Surya Bhumi Kahuri.',
];
include __DIR__ . '/_cta.php';

?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ['#singleApply', '#singleConsider'].forEach(function (selector) {
            if (document.querySelector(selector)) {
                animateEntrance(selector, { stagger: 0.1 });
            }
        });
    });
</script>
