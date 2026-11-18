<?php
$dummy_reasons = json_decode(json_encode([
    ['id' => 1, 'title' => 'Sistem Terintegrasi', 'content' => '', 'custom_field_1' => 'Electrical, mechanical, dan plumbing dikoordinasikan agar saling mendukung sejak tahap perencanaan.'],
    ['id' => 2, 'title' => 'Fokus Keselamatan', 'content' => '', 'custom_field_1' => 'Metode pemasangan, material, dan pengujian memperhatikan keselamatan pengguna bangunan.'],
    ['id' => 3, 'title' => 'Pendekatan Teknis', 'content' => '', 'custom_field_1' => 'Setiap pekerjaan dilaksanakan dengan ketelitian instalasi dan kontrol kualitas yang terarah.'],
    ['id' => 4, 'title' => 'Dukungan Pemeliharaan', 'content' => '', 'custom_field_1' => 'Dukungan setelah instalasi untuk membantu menjaga performa sistem yang sudah terpasang.'],
]));

$reasons = !empty($item->data) ? $item->data : $dummy_reasons;

$why_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Komitmen yang Dibangun di Setiap <span>Proyek</span>';
$why_subtitle = !empty($subtitle) ? $subtitle : 'Mengapa Surya Bhumi Kahuri';
$why_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Pengalaman lintas sektor membuat kami memahami pentingnya perencanaan, pemasangan yang presisi, dan dukungan setelah proyek selesai.';
?>
<style>
    .why {
        background: #f8f8f5;

        .why-left {
            .section-header {
                margin-bottom: 28px;

                .section-title {
                    max-width: 535px;
                }

                .section-desc {
                    max-width: 520px;
                    font-size: 15px;
                }
            }
        }

        .why-list {
            border-top: 1px solid var(--color9);
        }

        .why-item {
            display: grid;
            grid-template-columns: 50px 1fr 18px;
            gap: 14px;
            padding: 27px 0;
            border-bottom: 1px solid var(--color9);

            .why-no {
                padding-top: 5px;
                color: #a29971;
                font-size: 11px;
                font-weight: 800;
            }

            h3 {
                margin-bottom: 9px;
                font-size: 17px;
                font-weight: 800;
                transition: color 0.3s;
            }

            p {
                max-width: 515px;
                margin: 0;
                color: #7b7e73;
                font-size: 13px;
                line-height: 1.75;
            }

            .why-arrow {
                color: #a8853e;
                font-size: 14px;
                transition: transform 0.3s, color 0.3s;
            }

            &:hover {
                h3 {
                    color: #a8853e;
                }

                .why-arrow {
                    color: var(--colors);
                    transform: translate(3px, -3px);
                }
            }
        }

        @media (max-width: 991.98px) {
            .why-left {
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .why-item {
                grid-template-columns: 30px 1fr 12px;
                padding: 22px 0;

                h3 {
                    font-size: 15px;
                }
            }
        }
    }
</style>

<section class="why" id="why-choose-us" aria-labelledby="whyTitle">
    <div class="container-global">
        <div class="row align-items-start">
            <div class="col-lg-5 why-left" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow"><?= strip_tags($why_subtitle, '<span><em><strong><b><i><br>') ?></div>
                    <h2 class="section-title" id="whyTitle"><?= $why_title ?></h2>
                    <p class="section-desc"><?= strip_tags($why_subtitle_2, '<span><em><strong><b><i><br>') ?></p>
                </div>
                <a class="text-link" href="<?= base_url('category/all') ?>">Jelajahi dokumentasi proyek <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-7">
                <div class="why-list">
                    <?php foreach ($reasons as $i => $reason): ?>
                        <?php $reason_desc = !empty($reason->custom_field_1) ? $reason->custom_field_1 : trim(strip_tags($reason->content ?? '')); ?>
                        <div class="why-item" data-animate>
                            <span class="why-no"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                            <div>
                                <h3><?= htmlspecialchars($reason->title) ?></h3>
                                <p><?= htmlspecialchars($reason_desc) ?></p>
                            </div>
                            <i class="fa-solid fa-arrow-up-right-from-square why-arrow" aria-hidden="true"></i>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#why-choose-us', { stagger: 0.12 });
    });
</script>
