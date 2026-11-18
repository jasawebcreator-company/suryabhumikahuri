<?php
$dummy_faqs = json_decode(json_encode([
    ['id' => 1, 'title' => 'Layanan MEP apa saja yang tersedia?', 'content' => '', 'custom_field_1' => 'Surya Bhumi Kahuri menangani sistem kelistrikan, HVAC, plumbing, dan proteksi kebakaran, serta layanan pendukung seperti elektronik, keamanan, lift, dan elevator.'],
    ['id' => 2, 'title' => 'Jenis proyek apa yang ditangani?', 'content' => '', 'custom_field_1' => 'Fasilitas kesehatan, hospitality, fasilitas publik, komersial, dan residensial, berbasis di Bali dan melayani proyek lintas wilayah.'],
    ['id' => 3, 'title' => 'Informasi apa yang perlu disiapkan sebelum konsultasi?', 'content' => '', 'custom_field_1' => 'Jenis bangunan, lokasi proyek, lingkup pekerjaan, dan gambar atau kebutuhan teknis awal jika tersedia.'],
    ['id' => 4, 'title' => 'Apakah ada dukungan setelah instalasi selesai?', 'content' => '', 'custom_field_1' => 'Tersedia dukungan pemeliharaan untuk membantu menjaga performa sistem yang sudah terpasang.'],
]));

$faqs = !empty($item->data) ? $item->data : $dummy_faqs;

$faq_title = !empty($title) ? strip_tags($title, '<span><em><strong><b><i><br>') : 'Hal yang Sering <span>Ditanyakan</span>';
$faq_subtitle = !empty($subtitle) ? $subtitle : 'Pertanyaan Umum';
$faq_subtitle_2 = !empty($subtitle_2) ? $subtitle_2 : 'Masih ada kebutuhan yang ingin didiskusikan? Tim Surya Bhumi Kahuri siap menerima pertanyaan mengenai layanan dan proyek.';
?>
<style>
    .faq {
        background: var(--color3);
        color: var(--color10);

        .faq-left {
            .section-header {
                margin-bottom: 28px;

                .section-desc {
                    max-width: 480px;
                    font-size: 15px;
                }
            }

            .text-link {
                border-bottom-color: rgba(224, 197, 138, 0.5);
                color: var(--color4);

                &:hover {
                    color: var(--color10);
                }
            }
        }

        .faq-list {
            border-top: 1px solid #29353c;
        }

        .faq-item {
            border-bottom: 1px solid #29353c;

            .faq-question {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                width: 100%;
                padding: 26px 0;
                border: 0;
                background: transparent;
                color: var(--color10);
                font-family: var(--primtext);
                font-size: 17px;
                font-weight: 800;
                line-height: 1.5;
                text-align: left;
                transition: color 0.3s;

                &:hover {
                    color: var(--color4);
                }

                &:focus {
                    outline: none;
                }

                &:not(.collapsed) {
                    color: var(--color4);
                }

                i {
                    flex: none;
                    font-size: 12px;
                    transition: transform 0.3s;
                }

                &:not(.collapsed) i {
                    transform: rotate(45deg);
                }
            }

            .faq-answer {
                max-width: 760px;
                padding: 0 40px 28px 0;
                color: #b9c2c6;
                font-size: 14px;
                line-height: 1.9;

                p:last-child {
                    margin-bottom: 0;
                }
            }
        }

        @media (max-width: 991.98px) {
            .faq-left {
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .faq-item .faq-question {
                font-size: 15px;
            }
        }
    }
</style>

<section class="faq" id="faq" aria-labelledby="faqTitle">
    <div class="container-global">
        <div class="row align-items-center">
            <div class="col-lg-5 faq-left" data-animate>
                <div class="section-header is-light">
                    <div class="section-eyebrow">PERTANYAAN UMUM</div>
                    <h2 class="section-title" id="faqTitle">Hal yang Sering <span>Ditanyakan</span></h2>
                    <p class="section-desc">Masih ada kebutuhan yang ingin didiskusikan? Tim Surya Bhumi Kahuri siap menerima pertanyaan mengenai layanan dan proyek.</p>
                </div>
                <a class="text-link" href="?page=contact">Hubungi Tim Kami <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-7">
                <div class="faq-list" id="faqAccordion">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <?php
                        $faq_id = 'faq-collapse-' . ($i + 1);
                        $faq_open = $i === 0;
                        $faq_answer = !empty($faq->content) ? strip_tags($faq->content, '<p><br><strong><em><ul><ol><li><a>') : '';
                        if ($faq_answer === '') {
                            $faq_answer = '<p>' . htmlspecialchars($faq->custom_field_1 ?? '') . '</p>';
                        }
                        ?>
                        <div class="faq-item" data-animate>
                            <button class="faq-question<?= $faq_open ? '' : ' collapsed' ?>" type="button" data-toggle="collapse" data-target="#<?= $faq_id ?>" aria-expanded="<?= $faq_open ? 'true' : 'false' ?>" aria-controls="<?= $faq_id ?>">
                                <?= htmlspecialchars($faq->title) ?>
                                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                            </button>
                            <div class="collapse<?= $faq_open ? ' show' : '' ?>" id="<?= $faq_id ?>" data-parent="#faqAccordion">
                                <div class="faq-answer"><?= $faq_answer ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#faq', { stagger: 0.1 });
    });
</script>
