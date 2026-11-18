<?php
$page_hero = [
    'eyebrow' => 'Let\'s Build Together',
    'title' => 'Kontak dan <span>Konsultasi Proyek</span>',
    'desc' => 'Sampaikan kebutuhan konstruksi MEP dan lokasi proyek Anda kepada Surya Bhumi Kahuri.',
    'image' => '',
];

$contact_tags = '<span><em><strong><b><i><br>';
$contact_email = trim((string) ($data->company->company_email ?? ''));
$contact_phone = trim((string) ($data->company->company_phone ?? ''));
$contact_address = trim((string) ($data->company->company_address ?? ''));

$contact_items = [];

if ($contact_email !== '') {
    $contact_items[] = ['icon' => 'fa-regular fa-envelope', 'title' => 'Email', 'label' => $contact_email, 'link' => 'mailto:' . $contact_email, 'external' => false];
}

if ($contact_phone !== '') {
    $contact_items[] = ['icon' => 'fa-solid fa-phone', 'title' => 'Telepon', 'label' => $contact_phone, 'link' => 'tel:' . preg_replace('/[^\d+]/', '', $contact_phone), 'external' => false];
}

if ($contact_address !== '') {
    $contact_items[] = ['icon' => 'fa-solid fa-location-dot', 'title' => 'Alamat Kantor', 'label' => $contact_address, 'link' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode($contact_address), 'external' => true];
}

$contact_items = json_decode(json_encode($contact_items));

$contact_social_map = [
    'instagram_url' => ['label' => 'Instagram', 'icon' => 'fa-brands fa-instagram', 'base' => 'https://instagram.com/'],
    'facebook_url' => ['label' => 'Facebook', 'icon' => 'fa-brands fa-facebook-f', 'base' => 'https://facebook.com/'],
    'twitter_url' => ['label' => 'X / Twitter', 'icon' => 'fa-brands fa-x-twitter', 'base' => 'https://x.com/'],
    'youtube_url' => ['label' => 'YouTube', 'icon' => 'fa-brands fa-youtube', 'base' => 'https://youtube.com/'],
    'googleplus_url' => ['label' => 'Google', 'icon' => 'fa-brands fa-google', 'base' => ''],
    'whatsapp' => ['label' => 'WhatsApp', 'icon' => 'fa-brands fa-whatsapp', 'base' => 'https://wa.me/'],
    'telegram' => ['label' => 'Telegram', 'icon' => 'fa-brands fa-telegram', 'base' => 'https://t.me/'],
    'messenger' => ['label' => 'Messenger', 'icon' => 'fa-brands fa-facebook-messenger', 'base' => 'https://m.me/'],
    'line' => ['label' => 'LINE', 'icon' => 'fa-brands fa-line', 'base' => 'https://line.me/ti/p/~'],
    'bbm' => ['label' => 'BBM', 'icon' => 'fa-solid fa-comment-dots', 'base' => ''],
];

$contact_socials = [];

foreach ($contact_social_map as $social_key => $social) {
    $social_value = trim((string) ($data->social->$social_key ?? ''));

    if ($social_value === '') {
        continue;
    }

    if (preg_match('#^https?://#i', $social_value)) {
        $social_link = $social_value;
    } elseif ($social_key === 'whatsapp') {
        $social_link = $social['base'] . preg_replace('/^0/', '62', preg_replace('/\D+/', '', $social_value));
    } elseif ($social['base'] !== '') {
        $social_link = $social['base'] . ltrim($social_value, '@');
    } else {
        $social_link = '';
    }

    $contact_socials[] = ['label' => $social['label'], 'icon' => $social['icon'], 'link' => $social_link, 'value' => $social_value];
}

$contact_socials = json_decode(json_encode($contact_socials));

$contact_title = 'Mulai dari <span>kebutuhan proyek Anda.</span>';
$contact_eyebrow = 'Hubungi Tim Kami';
$contact_desc = 'Berikan gambaran awal mengenai jenis fasilitas dan sistem yang dibutuhkan. Berbasis di Bali, kami melayani kebutuhan proyek lintas wilayah sesuai kesepakatan.';

$contact_wa = preg_replace('/^0/', '62', preg_replace('/\D+/', '', (string) ($data->social->whatsapp ?? '')));
$contact_services = ['Sistem Kelistrikan', 'Sistem HVAC', 'Sistem Plumbing', 'Proteksi Kebakaran', 'Sistem Elektronik dan Keamanan', 'Sistem Lift dan Elevator', 'Sistem MEP Terintegrasi', 'Layanan Lainnya'];
$contact_social_title = 'Terhubung <span>Lebih Dekat</span>';
$contact_social_desc = 'Ikuti dan hubungi kami melalui kanal berikut.';
?>

<?php include __DIR__ . '/../partials/page_hero.php'; ?>

<style>
    .contact {
        background: var(--color5);

        .container-global + .container-global {
            padding-top: 0;
        }

        .contact-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 3.5rem;
            margin-bottom: 2.75rem;

            .section-header {
                margin-bottom: 0;

                .section-title {
                    margin-bottom: 0;
                }
            }

            .section-desc {
                flex: none;
                max-width: 430px;
            }
        }

        .contact-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 34px 30px 32px;
            background: var(--color10);
            color: var(--color7);
            transition: box-shadow 0.3s;

            .contact-icon {
                display: grid;
                place-items: center;
                width: 54px;
                height: 54px;
                margin-bottom: 28px;
                background: var(--color6);
                color: #a8853e;
                font-size: 18px;
                transition: background 0.3s, color 0.3s;
            }

            small {
                display: block;
                margin-bottom: 10px;
                color: #a8853e;
                font-size: 10px;
                font-weight: 800;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            strong {
                display: block;
                font-family: var(--primtext);
                font-size: 17px;
                font-weight: 800;
                letter-spacing: -0.4px;
                line-height: 1.6;
                word-break: break-word;
            }

            .contact-go {
                margin-top: auto;
                padding-top: 24px;
                color: #a8853e;
                font-size: 13px;
                transition: transform 0.3s, color 0.3s;
            }

            &:hover {
                color: var(--color7);
                box-shadow: 0 18px 40px rgba(24, 33, 39, 0.07);

                .contact-icon {
                    background: var(--colors);
                    color: var(--color4);
                }

                .contact-go {
                    color: var(--colors);
                    transform: translate(3px, -3px);
                }
            }
        }

        .contact-empty {
            margin: 0;
            color: #667178;
            font-size: 14px;
        }


        .contact-inquiry {
            background: var(--color10);

            .inquiry-form {
                padding: 2.5rem;
                background: var(--color5);

                .form-group {
                    margin-bottom: 1.25rem;

                    label {
                        display: block;
                        margin-bottom: 8px;
                        color: var(--color7);
                        font-size: 12px;
                        font-weight: 800;
                        letter-spacing: 0.4px;

                        b {
                            color: #a8853e;
                        }
                    }

                    input,
                    select,
                    textarea {
                        width: 100%;
                        padding: 14px 16px;
                        border: 1px solid var(--color9);
                        border-radius: 0;
                        background: var(--color10);
                        color: var(--color7);
                        font-size: 14px;
                        transition: border-color 0.25s, box-shadow 0.25s;

                        &:focus {
                            outline: none;
                            border-color: var(--color2);
                            box-shadow: 0 0 0 3px rgba(201, 165, 92, 0.2);
                        }

                        &.is-invalid {
                            border-color: #c0392b;
                        }
                    }

                    textarea {
                        resize: vertical;
                    }
                }

                .form-foot {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    flex-wrap: wrap;
                    gap: 1rem;
                    padding-top: 0.5rem;

                    span {
                        color: #667178;
                        font-size: 12px;

                        i {
                            margin-right: 6px;
                            color: #a8853e;
                        }
                    }
                }

                @media (max-width: 767.98px) {
                    padding: 1.5rem;
                }
            }
        }

        .contact-socials {
            background: var(--color6);

            .contact-social-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
                gap: 1rem;
            }

            .social-item {
                display: flex;
                align-items: center;
                gap: 16px;
                padding: 18px 20px;
                background: var(--color10);
                color: var(--color7);
                transition: box-shadow 0.3s;

                .social-icon {
                    flex: none;
                    display: grid;
                    place-items: center;
                    width: 44px;
                    height: 44px;
                    background: var(--color6);
                    color: #a8853e;
                    font-size: 16px;
                    transition: background 0.3s, color 0.3s;
                }

                .social-text {
                    min-width: 0;

                    b {
                        display: block;
                        font-family: var(--primtext);
                        font-size: 14px;
                        font-weight: 800;
                    }

                    span {
                        display: block;
                        overflow: hidden;
                        color: #667178;
                        font-size: 12px;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                    }
                }

                &:hover {
                    color: var(--color7);
                    box-shadow: 0 14px 32px rgba(24, 33, 39, 0.07);

                    .social-icon {
                        background: var(--colors);
                        color: var(--color4);
                    }
                }
            }
        }

        @media (max-width: 991.98px) {
            .contact-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    }
</style>

<section class="contact" id="contact" aria-labelledby="contactTitle">
    <div class="container-global">
        <div class="contact-head" data-animate>
            <div class="section-header">
                <div class="section-eyebrow"><?= $contact_eyebrow ?></div>
                <h2 class="section-title" id="contactTitle"><?= $contact_title ?></h2>
            </div>
            <p class="section-desc"><?= $contact_desc ?></p>
        </div>

        <?php if (!empty($contact_items)) : ?>
            <div class="row">
                <?php foreach ($contact_items as $contact_item) : ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-animate>
                        <a class="contact-card" href="<?= htmlspecialchars($contact_item->link) ?>"<?= $contact_item->external ? ' target="_blank" rel="noopener"' : '' ?>>
                            <span class="contact-icon"><i class="<?= $contact_item->icon ?>" aria-hidden="true"></i></span>
                            <small><?= $contact_item->title ?></small>
                            <strong><?= htmlspecialchars($contact_item->label) ?></strong>
                            <span class="contact-go"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="contact-empty" data-animate>Informasi kontak akan segera tersedia.</p>
        <?php endif; ?>
    </div>


    <div class="contact-inquiry">
        <div class="container-global">
            <div class="contact-head" data-animate>
                <div class="section-header">
                    <div class="section-eyebrow">Project Inquiry</div>
                    <h2 class="section-title">Ceritakan <span>kebutuhan proyek</span></h2>
                </div>
                <p class="section-desc">Informasi berikut akan disusun menjadi pesan WhatsApp untuk tim kami.</p>
            </div>

            <form class="inquiry-form" id="projectForm" data-wa="<?= htmlspecialchars($contact_wa) ?>" novalidate data-animate>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nama">Nama Anda <b>*</b></label>
                        <input type="text" id="nama" name="nama" placeholder="Nama lengkap" autocomplete="name" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="perusahaan">Perusahaan / Instansi</label>
                        <input type="text" id="perusahaan" name="perusahaan" placeholder="Nama perusahaan (opsional)" autocomplete="organization">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="jenisProyek">Layanan yang Dibutuhkan <b>*</b></label>
                        <select id="jenisProyek" name="jenisProyek" required>
                            <option value="" selected disabled>Pilih layanan</option>
                            <?php foreach ($contact_services as $contact_service) : ?>
                                <option><?= htmlspecialchars($contact_service) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lokasi">Lokasi Proyek <b>*</b></label>
                        <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Denpasar, Bali" required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="keterangan">Gambaran Kebutuhan</label>
                        <textarea id="keterangan" name="keterangan" rows="4" placeholder="Ceritakan jenis bangunan, lingkup pekerjaan, atau kebutuhan teknisnya"></textarea>
                    </div>
                    <div class="col-12 form-foot">
                        <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Pesan baru akan dikirim hanya setelah Anda mengonfirmasi dari WhatsApp.</span>
                        <button class="btn-main is-gold" type="submit">Lanjut ke WhatsApp <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($contact_socials)) : ?>
        <div class="contact-socials">
            <div class="container-global">
                <div class="contact-head" data-animate>
                    <div class="section-header">
                        <div class="section-eyebrow">Sosial Media</div>
                        <h2 class="section-title"><?= $contact_social_title ?></h2>
                    </div>
                    <p class="section-desc"><?= $contact_social_desc ?></p>
                </div>

                <div class="contact-social-grid">
                    <?php foreach ($contact_socials as $social) : ?>
                        <?php if ($social->link) : ?>
                            <a class="social-item" href="<?= htmlspecialchars($social->link) ?>" target="_blank" rel="noopener" data-animate>
                        <?php else : ?>
                            <div class="social-item" data-animate>
                        <?php endif; ?>
                            <span class="social-icon"><i class="<?= $social->icon ?>" aria-hidden="true"></i></span>
                            <span class="social-text">
                                <b><?= htmlspecialchars($social->label) ?></b>
                                <span><?= htmlspecialchars(preg_replace('#^https?://(www\.)?#i', '', $social->value)) ?></span>
                            </span>
                        <?php if ($social->link) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#contact', { stagger: 0.1 });

        const form = document.getElementById('projectForm');

        form.querySelectorAll('[required]').forEach(function (input) {
            input.addEventListener('input', function () {
                input.classList.remove('is-invalid');
            });
            input.addEventListener('change', function () {
                input.classList.remove('is-invalid');
            });
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            let valid = true;
            form.querySelectorAll('[required]').forEach(function (input) {
                const empty = !input.value.trim();
                input.classList.toggle('is-invalid', empty);
                if (empty && valid) {
                    input.focus();
                }
                valid = valid && !empty;
            });

            if (!valid) {
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
                'Layanan: ' + read('jenisProyek'),
                'Lokasi Proyek: ' + read('lokasi'),
                'Kebutuhan Proyek: ' + (read('keterangan') || '-'),
                '',
                'Terima kasih.'
            ];

            window.location.assign('https://wa.me/' + form.dataset.wa + '?text=' + encodeURIComponent(lines.join('\n')));
        });

        animateHover('#contact .btn-main', { y: -2 });

        animateHover('#contact .contact-card', { y: -4 });
        animateHover('#contact .social-item', { y: -3 });
    });
</script>
