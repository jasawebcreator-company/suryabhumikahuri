<?php
$footer_logo = $data->web->site_logo_alternative ?? '';
$footer_email = !empty($data->company->company_email) ? $data->company->company_email : "#";
$footer_phone = $data->company->company_phone ?? '';
$footer_address = !empty($data->company->company_address) ? $data->company->company_address : 'Jl. Pratu Made Rambug, Perum UNUD No. 65, Batubulan, Gianyar, Bali';
$footer_whatsapp = $data->social->whatsapp ?? '';
$footer_maps = $data->google_maps ?? '';

if ($footer_maps !== '' && preg_match('/src=["\']([^"\']+)["\']/i', $footer_maps, $maps_match)) {
    $footer_maps = $maps_match[1];
}

if ($footer_whatsapp !== '' && !preg_match('#^https?://#i', $footer_whatsapp)) {
    $footer_whatsapp = 'https://wa.me/' . preg_replace('/^0/', '62', preg_replace('/\D+/', '', $footer_whatsapp));
}

$footer_explore = flattenMenu($data->menu->primary_menu);

$footer_services = [
    ['label' => 'Sistem Kelistrikan', 'url' => base_url('view/sistem-kelistrikan')],
    ['label' => 'Sistem HVAC', 'url' => base_url('view/sistem-hvac')],
    ['label' => 'Sistem Plumbing', 'url' => base_url('view/sistem-plumbing')],
    ['label' => 'Proteksi Kebakaran', 'url' => base_url('view/sistem-elektronik-dan-keamanan')],
];

$footer_social_map = [
    'instagram_url' => ['icon' => 'fa-brands fa-instagram', 'label' => 'Instagram'],
    'facebook_url' => ['icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'],
    'youtube_url' => ['icon' => 'fa-brands fa-youtube', 'label' => 'YouTube'],
    'twitter_url' => ['icon' => 'fa-brands fa-x-twitter', 'label' => 'X'],
    'telegram' => ['icon' => 'fa-brands fa-telegram', 'label' => 'Telegram'],
];

$footer_socials = [];
foreach ($footer_social_map as $social_key => $social_meta) {
    $social_value = trim((string) ($data->social->{$social_key} ?? ''));
    if ($social_value !== '') {
        $footer_socials[] = ['url' => $social_value, 'icon' => $social_meta['icon'], 'label' => $social_meta['label']];
    }
}
if ($footer_whatsapp !== '') {
    $footer_socials[] = ['url' => $footer_whatsapp, 'icon' => 'fa-brands fa-whatsapp', 'label' => 'WhatsApp'];
}

?>
<style>
    .site-footer {
        background: #151d22;
        color: #c9cdbf;

        .container-global {
            padding-bottom: 1.5rem;
        }

        .footer-top {
            padding-bottom: 4rem;
        }

        .footer-logo {
            display: block;
            max-width: 240px;
            max-height: 48px;
            margin-bottom: 20px;
            object-fit: contain;
            object-position: left center;
        }

        .footer-company {
            margin: 0 0 24px;
            color: #c9a55c;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .footer-desc {
            max-width: 330px;
            margin-bottom: 22px;
            color: #aab5b9;
            font-size: 14px;
            line-height: 1.9;
        }

        .footer-social {
            display: flex;
            gap: 10px;

            a {
                display: grid;
                place-items: center;
                width: 36px;
                height: 36px;
                margin: 0;
                border: 1px solid #34414a;
                color: #b7beaf;
                font-size: 14px;
                transition: background 0.3s, color 0.3s, border-color 0.3s;

                &:hover {
                    border-color: var(--color2);
                    background: var(--color2);
                    color: #1f2419;
                }
            }
        }

        h3 {
            margin-bottom: 26px;
            color: var(--color10);
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.3px;
        }

        .footer-links a,
        .footer-contact a {
            display: block;
            margin-bottom: 14px;
            color: #c3c9ba;
            font-size: 15px;
            transition: color 0.2s;

            &:hover {
                color: #e1d4aa;
            }
        }

        .footer-contact {
            p {
                margin-bottom: 14px;
                color: #aab5b9;
                font-size: 14px;
                line-height: 1.9;
            }

            a.is-gold {
                color: var(--color4);
                font-size: 14px;
                word-break: break-word;
            }
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-top: 23px;
            border-top: 1px solid #34414a;
            color: #8b9a9f;
            font-size: 12px;
            letter-spacing: 0.2px;

            @media (max-width: 767.98px) {
                flex-direction: column;
            }
        }

        @media (max-width: 991.98px) {
            .footer-top {
                padding-bottom: 2rem;
            }

            .footer-col {
                margin-bottom: 2rem;
            }
        }
    }

	.scroll-to-top {
		display: none;
	}
</style>

<footer class="site-footer" id="siteFooter">
    <div class="container-global">
        <div class="row footer-top">
            <div class="col-lg-4 footer-col" data-animate>
                <?php if (!empty($footer_logo)): ?>
                    <img class="footer-logo" src="<?= htmlspecialchars($footer_logo) ?>" alt="<?= htmlspecialchars($data->web->site_name) ?>">
                <?php endif; ?>
                <p class="footer-company"><?= htmlspecialchars($data->web->site_name) ?></p>
                <p class="footer-desc">Kontraktor MEP berbasis di Bali yang berfokus pada sistem kelistrikan, HVAC, plumbing, dan proteksi kebakaran untuk kebutuhan sistem bangunan.</p>
                <?php if (!empty($footer_socials)): ?>
                    <div class="footer-social">
                        <?php foreach ($footer_socials as $footer_social): ?>
                            <a href="<?= htmlspecialchars($footer_social['url']) ?>" target="_blank" rel="noopener" aria-label="<?= $footer_social['label'] ?>"><i class="<?= $footer_social['icon'] ?>"></i></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-2 footer-col footer-links" data-animate>
                <h3>Layanan Utama</h3>
                <?php foreach ($footer_services as $footer_service): ?>
                    <a href="<?= htmlspecialchars($footer_service['url']) ?>"><?= htmlspecialchars($footer_service['label']) ?></a>
                <?php endforeach; ?>
            </div>
            <div class="col-6 col-lg-2 footer-col footer-links" data-animate>
                <h3>Navigasi</h3>
                <?php foreach ($footer_explore as $link): ?>
					<?php if(!empty($link['link'])): ?>
                    <a href="<?= htmlspecialchars($link['link']) ?>"><?= htmlspecialchars($link['label']) ?></a>
					<?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 footer-col footer-contact" data-animate>
                <h3>Hubungi Kami</h3>
                <p><?= htmlspecialchars($footer_address) ?></p>
                <?php if ($footer_maps !== ''): ?>
                    <a href="<?= htmlspecialchars($footer_maps) ?>" target="_blank" rel="noopener">Lihat di Google Maps</a>
                <?php endif; ?>
                <?php if ($footer_phone !== ''): ?>
                    <a href="tel:<?= htmlspecialchars(preg_replace('/[^\d+]/', '', $footer_phone)) ?>"><?= htmlspecialchars($footer_phone) ?></a>
                <?php endif; ?>
                <a class="is-gold" href="mailto:<?= htmlspecialchars($footer_email) ?>"><?= htmlspecialchars($footer_email) ?></a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <?= date('Y') ?> <?= htmlspecialchars($data->web->site_name) ?>. Hak cipta dilindungi.</span>
            <span>ENGINEERING WITH PURPOSE.</span>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#siteFooter');
    });
</script>



<style>
	.fixed-whatsapp {
		position: fixed;
		z-index: 99999;
		background: #25d366;
		width: 60px;
		height: 60px;
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		bottom: 20px;
		right: 20px;
		border-radius: 999em;

		i {
			font-size: 2rem;
		}

		&:hover {
			background: var(--color2);
			color: white;
		}
	}
</style>


<a class="fixed-whatsapp" href="<?= wa_message($data->company->company_name, $data->social->whatsapp, null, 'id') ?>" target="_blank" rel="noopener" aria-label="Hubungi Surya Bhumi Kahuri melalui WhatsApp">
	<i class="fab fa-whatsapp"></i>
</a>
