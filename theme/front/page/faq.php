<?php
$faq_default = [
    'eyebrow' => 'Pusat Informasi',
    'title' => 'Hal yang Sering <span>Ditanyakan</span>',
    'desc' => 'Telusuri pertanyaan berdasarkan kategori untuk menemukan topik yang paling relevan dengan kebutuhan sistem bangunan Anda.',
    'steps' => [
        ['label' => '01 / Kenali Layanan', 'text' => 'Pahami sistem MEP sesuai fungsi bangunan.'],
        ['label' => '02 / Rencanakan Proyek', 'text' => 'Siapkan informasi awal untuk konsultasi dan pelaksanaan.'],
        ['label' => '03 / Pastikan Keselamatan', 'text' => 'Ketahui pengujian, commissioning, dan pemeliharaan.'],
    ],
    'help' => [
        'label' => 'Masih Butuh Bantuan?',
        'title' => 'Ceritakan kebutuhan proyek Anda.',
        'text' => 'Tim Surya Bhumi Kahuri dapat membantu mendiskusikan lingkup pekerjaan, sistem yang dibutuhkan, dan lokasi proyek.',
        'link' => 'Hubungi Tim Kami',
    ],
    'groups' => [
        [
            'title' => 'Layanan MEP',
            'desc' => 'Mengenal sistem kelistrikan, HVAC, plumbing, dan proteksi kebakaran.',
            'items' => [
                ['q' => 'Apa saja layanan yang tersedia di Surya Bhumi Kahuri?', 'a' => 'Surya Bhumi Kahuri menangani sistem kelistrikan, HVAC, plumbing, dan proteksi kebakaran, serta layanan pendukung seperti sistem elektronik dan keamanan serta lift dan elevator.'],
                ['q' => 'Apa saja yang termasuk dalam pekerjaan sistem kelistrikan?', 'a' => 'Lingkup pekerjaan mencakup distribusi listrik, panel utama, pencahayaan, grounding, dan integrasi sistem kelistrikan bangunan sesuai kebutuhan proyek.'],
                ['q' => 'Sistem HVAC apa saja yang dapat dikerjakan?', 'a' => 'Pekerjaan HVAC meliputi ducting dan ventilasi, pendingin tipe split, sentral, dan VRV/VRF, filtrasi udara, pengendalian kelembapan, serta fire damper dan exhaust.'],
                ['q' => 'Apa cakupan pekerjaan plumbing?', 'a' => 'Cakupan meliputi jaringan air bersih, air buangan, drainase, dan instalasi perpipaan untuk kebutuhan bangunan, termasuk sistem perpipaan kolam renang bila diperlukan.'],
                ['q' => 'Apakah proteksi kebakaran termasuk layanan Anda?', 'a' => 'Ya. Sistem proteksi kebakaran direncanakan sesuai kebutuhan keselamatan dan fungsi bangunan. Rincian pekerjaan dibahas setelah kebutuhan proyek dikonfirmasi.'],
            ],
        ],
        [
            'title' => 'Perencanaan & Pelaksanaan',
            'desc' => 'Informasi awal tentang koordinasi sistem, instalasi, dan pengujian.',
            'items' => [
                ['q' => 'Apa arti sistem MEP terintegrasi?', 'a' => 'Sistem mechanical, electrical, dan plumbing direncanakan agar saling mendukung sehingga koordinasi lapangan lebih terarah dan bangunan berfungsi selaras.'],
                ['q' => 'Informasi apa yang perlu disiapkan sebelum konsultasi?', 'a' => 'Siapkan jenis dan fungsi bangunan, lokasi proyek, lingkup pekerjaan yang diperlukan, serta gambar atau kondisi area jika tersedia.'],
                ['q' => 'Bisakah MEP dikoordinasikan sejak tahap desain?', 'a' => 'Bisa, dan sangat dianjurkan. Koordinasi sejak awal membantu menyelaraskan kebutuhan antar disiplin sebelum pelaksanaan di lapangan.'],
                ['q' => 'Apakah ada pengujian setelah instalasi?', 'a' => 'Pengujian, commissioning, dan evaluasi dilakukan untuk memastikan sistem sesuai kebutuhan operasional dan siap digunakan.'],
            ],
        ],
        [
            'title' => 'Proyek & Konsultasi',
            'desc' => 'Cara melihat portofolio, mengajukan penawaran, dan menghubungi tim kami.',
            'items' => [
                ['q' => 'Proyek seperti apa yang pernah ditangani?', 'a' => 'Portofolio mencakup fasilitas kesehatan, hospitality, fasilitas publik, komersial, dan residensial. Selengkapnya dapat dilihat pada halaman Proyek Kami.'],
                ['q' => 'Apakah saya bisa meminta penawaran?', 'a' => 'Bisa. Hubungi tim kami dan sampaikan kebutuhan proyek. Penawaran disusun setelah lingkup pekerjaan serta kondisi lokasi dikonfirmasi.'],
                ['q' => 'Apakah melayani proyek di luar Bali?', 'a' => 'Surya Bhumi Kahuri berbasis di Bali dan melayani kebutuhan proyek lintas wilayah sesuai kesepakatan.'],
                ['q' => 'Bagaimana cara menghubungi Surya Bhumi Kahuri?', 'a' => 'Anda dapat menghubungi kami melalui halaman kontak, WhatsApp, telepon, atau email yang tercantum di situs ini.'],
            ],
        ],
    ],
];


$faq_data = !empty($faq_data) ? $faq_data : json_decode(json_encode($faq_default));
$faq_tags = '<span><em><strong><b><i><br>';
$faq_groups = $faq_data->groups ?? [];
$faq_total = 0;
foreach ($faq_groups as $faq_group) {
    $faq_total += count($faq_group->items ?? []);
}

$single_type = 'product';
$single_hero_custom = [
    'eyebrow' => 'Pertanyaan yang Sering Diajukan',
    'title' => 'Jawaban untuk <span>Pertanyaan Anda.</span>',
    'alt' => 'Jawaban untuk Pertanyaan Anda',
    'desc' => 'Mulai dari layanan MEP, proses pelaksanaan, hingga konsultasi proyek. Temukan informasi awal untuk membantu Anda merencanakan kebutuhan sistem bangunan bersama Surya Bhumi Kahuri.',
    'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=80',
    'small' => 'Surya Bhumi Kahuri',
    'big' => 'Support & Insight',
    'crumbs' => [
        ['label' => 'Beranda', 'link' => base_url()],
        ['label' => 'FAQ', 'link' => ''],
    ],
    'cta_label' => 'Jelajahi FAQ',
    'cta_url' => '#faqPage',
    'link_label' => 'Tanya Tim Kami',
    'link_url' => base_url('contact'),
];
include __DIR__ . '/../single/_helpers.php';
include __DIR__ . '/../single/_hero.php';
?>
<style>
    .faq-steps {
        background: var(--color6);

        .container-global {
            padding-top: 0;
            padding-bottom: 0;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .step-cell {
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
                display: block;
                max-width: 300px;
                font-family: var(--primtext);
                font-size: 14px;
                font-weight: 800;
                letter-spacing: -0.3px;
                line-height: 1.6;
            }
        }

        @media (max-width: 767.98px) {
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .step-cell {
                padding: 20px 0;
                border-left: 0;
                border-top: 1px solid var(--color9);

                &:first-child {
                    border-top: 0;
                }
            }
        }
    }

    .faq-page {
        background: var(--color5);

        .faq-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 3.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--color9);

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 18px;
                }

                .section-desc {
                    max-width: 470px;
                }
            }

            .faq-count {
                display: flex;
                flex: none;
                align-items: center;
                gap: 16px;

                strong {
                    color: var(--color2);
                    font-family: var(--primtext);
                    font-size: clamp(48px, 5vw, 72px);
                    font-weight: 800;
                    letter-spacing: -3px;
                    line-height: 1;
                }

                span {
                    max-width: 90px;
                    color: #a8853e;
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    line-height: 1.7;
                    text-transform: uppercase;
                }
            }
        }

        .faq-side {
            position: sticky;
            top: calc(var(--header-height) + 24px);

            .side-label {
                display: block;
                margin-bottom: 8px;
                color: #a8853e;
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            h3 {
                margin: 0 0 22px;
                font-size: 18px;
                font-weight: 800;
                letter-spacing: -0.5px;
            }

            .faq-cats {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .faq-cat {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                margin-bottom: 4px;
                padding: 16px 18px;
                border: 0;
                background: transparent;
                color: var(--color7);
                font-size: 12px;
                font-weight: 700;
                text-align: left;
                cursor: pointer;
                transition: background 0.25s, color 0.25s;

                small {
                    color: #a8853e;
                    font-family: var(--primtext);
                    font-size: 10px;
                    font-weight: 800;
                }

                &:hover {
                    background: var(--color6);
                }

                &.is-active {
                    background: var(--colors);
                    color: var(--color10);

                    small {
                        color: var(--color4);
                    }
                }
            }

            .faq-help {
                margin-top: 28px;
                padding: 28px 26px 30px;
                background: var(--color6);

                small {
                    display: block;
                    margin-bottom: 14px;
                    color: #a8853e;
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }

                h4 {
                    margin: 0 0 12px;
                    font-size: 19px;
                    font-weight: 800;
                    letter-spacing: -0.6px;
                    line-height: 1.35;
                }

                p {
                    margin: 0 0 22px;
                    color: #667178;
                    font-size: 12px;
                    line-height: 1.85;
                }
            }
        }

        .faq-result {
            margin: 0 0 44px;
            color: #667178;
            font-size: 11px;

            strong {
                color: var(--color7);
            }
        }

        .faq-group {
            margin-bottom: 56px;

            &[hidden] {
                display: none;
            }

            .group-head {
                display: flex;
                align-items: flex-end;
                justify-content: space-between;
                gap: 1.5rem;
                margin-bottom: 18px;

                small {
                    display: block;
                    margin-bottom: 10px;
                    color: #a8853e;
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }

                h3 {
                    margin: 0 0 10px;
                    font-size: clamp(22px, 2vw, 28px);
                    font-weight: 800;
                    letter-spacing: -1px;
                }

                p {
                    margin: 0;
                    color: #667178;
                    font-size: 12px;
                }

                .group-topic {
                    flex: none;
                    color: #a8853e;
                    font-size: 9px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }
            }
        }

        .faq-list {
            border-top: 1px solid var(--color9);
        }

        .faq-item {
            border-bottom: 1px solid var(--color9);

            &[hidden] {
                display: none;
            }

            .faq-q {
                display: grid;
                grid-template-columns: 42px 1fr 28px;
                align-items: center;
                gap: 12px;
                width: 100%;
                padding: 24px 0;
                border: 0;
                background: transparent;
                color: var(--color7);
                font-family: var(--primtext);
                font-size: 13px;
                font-weight: 800;
                letter-spacing: -0.2px;
                text-align: left;
                cursor: pointer;

                .q-no {
                    color: #a8853e;
                    font-size: 10px;
                }

                .q-icon {
                    display: grid;
                    place-items: center;
                    width: 26px;
                    height: 26px;
                    border: 1px solid var(--color9);
                    border-radius: 50%;
                    color: #a8853e;
                    font-size: 10px;
                    transition: transform 0.3s, background 0.3s, color 0.3s, border-color 0.3s;
                }

                &:hover .q-icon {
                    border-color: var(--color2);
                }
            }

            .faq-a {
                display: grid;
                grid-template-rows: 0fr;
                transition: grid-template-rows 0.35s ease;

                > div {
                    overflow: hidden;
                }

                p {
                    margin: 0;
                    padding: 0 40px 26px 54px;
                    color: #667178;
                    font-size: 13px;
                    line-height: 2;
                }
            }

            &.is-open {
                .faq-a {
                    grid-template-rows: 1fr;
                }

                .q-icon {
                    transform: rotate(45deg);
                    border-color: var(--colors);
                    background: var(--colors);
                    color: var(--color10);
                }
            }
        }

        .faq-empty {
            padding: 3.5rem 1.5rem;
            background: var(--color10);
            color: #667178;
            font-size: 14px;
            text-align: center;

            &[hidden] {
                display: none;
            }
        }

        @media (max-width: 991.98px) {
            .faq-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }

            .faq-side {
                position: static;
                margin-bottom: 2.5rem;

                .faq-cats {
                    display: flex;
                    gap: 6px;
                    overflow-x: auto;
                    scrollbar-width: none;
                }

                .faq-cats li {
                    flex: none;
                }

                .faq-cat {
                    gap: 14px;
                    margin: 0;
                    background: var(--color6);
                    white-space: nowrap;
                }

                .faq-help {
                    display: none;
                }
            }
        }

        @media (max-width: 575.98px) {
            .faq-item .faq-a p {
                padding: 0 0 24px 54px;
            }

            .faq-group .group-head .group-topic {
                display: none;
            }
        }
    }
</style>

<section class="faq-steps" id="faqSteps" aria-label="Alur informasi">
    <div class="container-global">
        <div class="steps-grid">
            <?php foreach ($faq_data->steps ?? [] as $faq_step) : ?>
                <div class="step-cell" data-animate>
                    <small><?= strip_tags($faq_step->label ?? '', $faq_tags) ?></small>
                    <strong><?= strip_tags($faq_step->text ?? '', $faq_tags) ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="faq-page" id="faqPage" aria-labelledby="faqPageTitle">
    <div class="container-global">
        <div class="faq-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= strip_tags($faq_data->eyebrow ?? '', $faq_tags) ?></div>
                <h2 class="section-title" id="faqPageTitle"><?= strip_tags($faq_data->title ?? '', $faq_tags) ?></h2>
                <p class="section-desc"><?= strip_tags($faq_data->desc ?? '', $faq_tags) ?></p>
            </div>
            <div class="faq-count"><strong><?= $faq_total ?></strong><span>Pertanyaan dalam <?= count($faq_groups) ?> kategori</span></div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <aside class="faq-side" data-animate>
                    <span class="side-label">Jelajahi Berdasarkan</span>
                    <h3>Kategori FAQ</h3>
                    <ul class="faq-cats">
                        <li><button class="faq-cat is-active" type="button" data-cat="all">Semua Pertanyaan <small><?= str_pad($faq_total, 2, '0', STR_PAD_LEFT) ?></small></button></li>
                        <?php foreach ($faq_groups as $g => $faq_group) : ?>
                            <li><button class="faq-cat" type="button" data-cat="<?= $g ?>"><?= htmlspecialchars($faq_group->title) ?> <small><?= str_pad(count($faq_group->items ?? []), 2, '0', STR_PAD_LEFT) ?></small></button></li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if (!empty($faq_data->help)) : ?>
                        <div class="faq-help">
                            <small><?= htmlspecialchars($faq_data->help->label ?? '') ?></small>
                            <h4><?= htmlspecialchars($faq_data->help->title ?? '') ?></h4>
                            <p><?= htmlspecialchars($faq_data->help->text ?? '') ?></p>
                            <a class="text-link" href="<?= htmlspecialchars(base_url('contact')) ?>"><?= htmlspecialchars($faq_data->help->link ?? 'Hubungi Kami') ?> <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>

            <div class="col-lg-9">
                <p class="faq-result" id="faqResult"><strong><?= $faq_total ?></strong> pertanyaan ditemukan</p>

                <?php foreach ($faq_groups as $g => $faq_group) : ?>
                    <div class="faq-group" data-group="<?= $g ?>" data-animate>
                        <div class="group-head">
                            <div>
                                <small><?= str_pad($g + 1, 2, '0', STR_PAD_LEFT) ?> / FAQ</small>
                                <h3><?= htmlspecialchars($faq_group->title) ?></h3>
                                <p><?= htmlspecialchars($faq_group->desc ?? '') ?></p>
                            </div>
                            <span class="group-topic"><span class="topic-count"><?= str_pad(count($faq_group->items ?? []), 2, '0', STR_PAD_LEFT) ?></span> Topik</span>
                        </div>
                        <div class="faq-list">
                            <?php foreach ($faq_group->items ?? [] as $q => $faq_item) : ?>
                                <?php $faq_id = 'faq-' . $g . '-' . $q; ?>
                                <div class="faq-item">
                                    <button class="faq-q" type="button" aria-expanded="false" aria-controls="<?= $faq_id ?>">
                                        <span class="q-no"><?= str_pad($q + 1, 2, '0', STR_PAD_LEFT) ?></span>
                                        <span class="q-text"><?= htmlspecialchars($faq_item->q) ?></span>
                                        <span class="q-icon"><i class="fa-solid fa-plus" aria-hidden="true"></i></span>
                                    </button>
                                    <div class="faq-a" id="<?= $faq_id ?>"><div><p><?= htmlspecialchars($faq_item->a) ?></p></div></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="faq-empty" id="faqEmpty" hidden>Belum ada pertanyaan pada kategori ini. Silakan hubungi tim kami.</div>
            </div>
        </div>
    </div>
</section>

<?php
$single_cta = [
    'eyebrow' => 'Konsultasi Langsung',
    'title' => 'Pertanyaan Anda Belum Terjawab?',
    'desc' => 'Setiap bangunan memiliki kebutuhan yang berbeda. Jelaskan jenis bangunan, lokasi, dan kebutuhan sistem kepada tim Surya Bhumi Kahuri.',
];
include __DIR__ . '/../single/_cta.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#faqSteps', { stagger: 0.1 });
        animateEntrance('#faqPage', { stagger: 0.08 });

        const page = document.querySelector('#faqPage');
        const cats = page.querySelectorAll('.faq-cat');
        const groups = page.querySelectorAll('.faq-group');
        const result = page.querySelector('#faqResult strong');
        const empty = page.querySelector('#faqEmpty');
        let activeCat = 'all';

        function pad(number) {
            return String(number).padStart(2, '0');
        }

        function filter() {
            let total = 0;

            groups.forEach(function (group) {
                const inCat = activeCat === 'all' || group.dataset.group === activeCat;
                let visible = 0;

                group.querySelectorAll('.faq-item').forEach(function (item) {
                    item.hidden = !inCat;
                    if (inCat) {
                        visible++;
                    }
                });

                group.hidden = visible === 0;
                group.querySelector('.topic-count').textContent = pad(visible);
                total += visible;
            });

            result.textContent = total;
            empty.hidden = total !== 0;
        }

        cats.forEach(function (cat) {
            cat.addEventListener('click', function () {
                cats.forEach(function (other) {
                    other.classList.remove('is-active');
                });
                cat.classList.add('is-active');
                activeCat = cat.dataset.cat;
                filter();
            });
        });

        page.querySelectorAll('.faq-q').forEach(function (button) {
            button.addEventListener('click', function () {
                const item = button.closest('.faq-item');
                const open = !item.classList.contains('is-open');

                item.classList.toggle('is-open', open);
                button.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
        });
    });
</script>
