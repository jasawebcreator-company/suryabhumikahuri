<?php
$cta_tags = '<span><em><strong><b><i><br>';
$cta_title = !empty($item->setting->title) ? strip_tags($item->setting->title, $cta_tags) : 'Rencanakan sistem proyek Anda <span>bersama kami.</span>';
$cta_subtitle = !empty($item->setting->subtitle) ? $item->setting->subtitle : 'Mari Berdiskusi';
$cta_desc = !empty($item->setting->subtitle2) ? $item->setting->subtitle2 : 'Ceritakan kebutuhan bangunan Anda. Tim Surya Bhumi Kahuri siap menerima informasi awal mengenai lingkup pekerjaan dan lokasi proyek.';

$cta_whatsapp_raw = $data->social->whatsapp ?? '';
$cta_whatsapp = preg_replace('/^0/', '62', preg_replace('/\D+/', '', (string) $cta_whatsapp_raw));
$cta_email = $data->company->company_email ?? '';
$cta_phone = $data->company->company_phone ?? '';
$cta_address = $data->company->company_address ?? '';
$cta_services = ['Sistem Kelistrikan', 'Sistem HVAC', 'Sistem Plumbing', 'Proteksi Kebakaran', 'Sistem MEP Terintegrasi', 'Layanan Lainnya'];
?>
<style>
    .cta-section {
        background: var(--color5);

        .cta-shell {
            display: grid;
            grid-template-columns: 5fr 7fr;
            box-shadow: 0 30px 70px rgba(24, 33, 39, 0.14);
        }

        .cta-info {
            padding: 3.5rem 3rem;
            background: var(--color3);
            color: var(--color10);

            .section-title {
                font-size: clamp(30px, 3vw, 44px);
                letter-spacing: -1.6px;
            }

            .section-desc {
                margin-bottom: 2.2rem;
            }
        }

        .cta-detail {
            display: flex;
            gap: 16px;
            margin-bottom: 1.4rem;

            > i {
                display: grid;
                flex: none;
                place-items: center;
                width: 42px;
                height: 42px;
                border: 1px solid rgba(224, 197, 138, 0.4);
                color: var(--color2);
                font-size: 16px;
            }

            small {
                display: block;
                color: var(--color2);
                font-size: 9px;
                font-weight: 800;
                letter-spacing: 2px;
            }

            a,
            span {
                color: var(--color10);
                font-size: 14px;
                font-weight: 600;
                word-break: break-word;
            }

            a:hover {
                color: var(--color4);
            }
        }

        .cta-form-wrap {
            padding: 3.5rem 3rem;
            background: var(--color10);

            .form-head {
                margin-bottom: 1.8rem;

                span {
                    color: #a8853e;
                    font-size: 10px;
                    font-weight: 800;
                    letter-spacing: 2px;
                }

                h3 {
                    margin: 8px 0 6px;
                    font-size: 26px;
                    font-weight: 800;
                    letter-spacing: -0.8px;
                }

                p {
                    margin: 0;
                    color: var(--color8);
                    font-size: 13px;
                }
            }

            label {
                margin-bottom: 6px;
                color: var(--color7);
                font-size: 11px;
                font-weight: 800;
                letter-spacing: 0.4px;

                em {
                    color: #b3412f;
                    font-style: normal;
                }
            }

            .form-control {
                height: auto;
                padding: 13px 14px;
                border: 1px solid var(--color9);
                border-radius: 0;
                background: var(--color5);
                font-size: 14px;
                transition: border-color 0.25s, background 0.25s;

                &:focus {
                    border-color: var(--color2);
                    background: var(--color10);
                    box-shadow: none;
                }

                &.is-invalid {
                    border-color: #b3412f;
                }
            }

            .form-foot {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                margin-top: 0.4rem;

                small {
                    color: var(--color8);
                    font-size: 12px;
                }
            }
        }

        @media (max-width: 991.98px) {
            .cta-shell {
                grid-template-columns: 1fr;
            }

            .cta-info,
            .cta-form-wrap {
                padding: 2.4rem 1.6rem;
            }
        }
    }
</style>

<section class="cta-section" id="contact-cta" aria-labelledby="ctaTitle">
    <div class="container-global">
        <div class="cta-shell" data-animate>
            <div class="cta-info">
                <div class="section-header is-light">
                    <div class="section-eyebrow"><?= strip_tags($cta_subtitle, $cta_tags) ?></div>
                    <h2 class="section-title" id="ctaTitle"><?= $cta_title ?></h2>
                    <p class="section-desc"><?= strip_tags($cta_desc, $cta_tags) ?></p>
                </div>
                <?php if ($cta_whatsapp !== ''): ?>
                    <div class="cta-detail">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                        <div><small>WHATSAPP</small><a href="https://wa.me/<?= $cta_whatsapp ?>" target="_blank" rel="noopener">+<?= htmlspecialchars($cta_whatsapp) ?></a></div>
                    </div>
                <?php endif; ?>
                <?php if ($cta_email !== ''): ?>
                    <div class="cta-detail">
                        <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                        <div><small>EMAIL</small><a href="mailto:<?= htmlspecialchars($cta_email) ?>"><?= htmlspecialchars($cta_email) ?></a></div>
                    </div>
                <?php endif; ?>
                <?php if ($cta_address !== ''): ?>
                    <div class="cta-detail">
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                        <div><small>KANTOR</small><span><?= htmlspecialchars($cta_address) ?></span></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cta-form-wrap">
                <div class="form-head">
                    <span>PROJECT INQUIRY</span>
                    <h3>Ceritakan kebutuhan proyek Anda</h3>
                    <p>Informasi berikut akan disusun menjadi pesan WhatsApp untuk tim kami.</p>
                </div>
                <form id="ctaForm" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ctaNama">Nama Anda <em>*</em></label>
                            <input class="form-control" id="ctaNama" name="nama" placeholder="Nama lengkap" autocomplete="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ctaPerusahaan">Perusahaan / Instansi</label>
                            <input class="form-control" id="ctaPerusahaan" name="perusahaan" placeholder="Nama perusahaan (opsional)" autocomplete="organization">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ctaLayanan">Layanan yang Dibutuhkan <em>*</em></label>
                            <select class="form-control" id="ctaLayanan" name="layanan" required>
                                <option value="" selected disabled>Pilih layanan</option>
                                <?php foreach ($cta_services as $cta_service): ?>
                                    <option><?= $cta_service ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ctaLokasi">Lokasi Proyek <em>*</em></label>
                            <input class="form-control" id="ctaLokasi" name="lokasi" placeholder="Contoh: Denpasar, Bali" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="ctaKeterangan">Gambaran Kebutuhan Proyek</label>
                            <textarea class="form-control" id="ctaKeterangan" name="keterangan" rows="4" placeholder="Ceritakan jenis bangunan, lingkup pekerjaan, atau kebutuhan teknisnya"></textarea>
                        </div>
                    </div>
                    <div class="form-foot">
                        <small><i class="fa-solid fa-shield-halved mr-2" aria-hidden="true"></i>Informasi Anda digunakan untuk menghubungi tim proyek.</small>
                        <button class="btn-main is-gold" type="submit">Lanjut ke WhatsApp <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#contact-cta');
        animateHover('#contact-cta .btn-main', { y: -3 });

        const form = document.getElementById('ctaForm');
        const whatsapp = '<?= $cta_whatsapp ?>';

        form.querySelectorAll('[required]').forEach(function (field) {
            field.addEventListener('input', function () {
                field.classList.remove('is-invalid');
            });
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const required = Array.from(form.querySelectorAll('[required]'));
            required.forEach(function (field) {
                field.classList.toggle('is-invalid', !field.value.trim());
            });

            const invalid = required.find(function (field) {
                return !field.value.trim();
            });

            if (invalid) {
                invalid.focus();
                return;
            }

            const read = function (name) {
                return form.elements[name].value.trim();
            };

            const lines = [
                'Halo tim Surya Bhumi Kahuri,',
                'Saya ingin berkonsultasi mengenai kebutuhan proyek MEP.',
                '',
                'Nama: ' + read('nama'),
                'Perusahaan/Instansi: ' + (read('perusahaan') || '-'),
                'Layanan: ' + read('layanan'),
                'Lokasi Proyek: ' + read('lokasi'),
                'Kebutuhan Proyek: ' + (read('keterangan') || '-'),
                '',
                'Terima kasih.'
            ];

            window.location.assign('https://wa.me/' + whatsapp + '?text=' + encodeURIComponent(lines.join('\n')));
        });
    });
</script>
