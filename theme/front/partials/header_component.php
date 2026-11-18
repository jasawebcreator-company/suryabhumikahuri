<?php
$header_menu = json_decode(json_encode(simplify_menu($data->menu->primary_menu)));
?>

<?php

$header_logo = $data->web->site_logo_alternative ?? '';

$header_cta = json_decode(json_encode(['link' => wa_message($data->company->company_name, $data->social->whatsapp, null, "id"), 'label' => 'Konsultasi Proyek']));
$header_uid = 0;

function header_is_active($item)
{
    if ($item->link === '?page=' . ($_GET['page'] ?? 'homepage')) {
        return true;
    }
    foreach ($item->child ?? [] as $child) {
        if (header_is_active($child)) {
            return true;
        }
    }
    return false;
}

function header_render_items($items, &$uid)
{
    foreach ($items as $item) {
        $children = $item->child ?? [];
        $has_child = !empty($children);
        $active = header_is_active($item) ? ' active' : '';
        if (!$has_child) {
            echo '<li class="nav-item"><a class="nav-link' . $active . '" href="' . htmlspecialchars($item->link) . '">' . htmlspecialchars($item->label) . '</a></li>';
            continue;
        }
        $uid++;
        $id = 'sub-menu-' . $uid;
        echo '<li class="nav-item has-child">';
        echo '<div class="nav-row">';
        echo '<a class="nav-link' . $active . '" href="' . htmlspecialchars($item->link) . '">' . htmlspecialchars($item->label) . '</a>';
        echo '<button class="child-toggle" type="button" data-toggle="collapse" data-target="#' . $id . '" aria-controls="' . $id . '" aria-expanded="false" aria-label="Buka submenu ' . htmlspecialchars($item->label) . '"><i class="fa-solid fa-chevron-down"></i></button>';
        echo '</div>';
        echo '<ul class="sub-menu collapse" id="' . $id . '">';
        header_render_items($children, $uid);
        echo '</ul>';
        echo '</li>';
    }
}
?>
<style>
    .site-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        height: var(--header-height);
        background: rgba(255, 255, 255, 0.98);
        border-bottom: 1px solid rgba(24, 33, 39, 0.08);
        box-shadow: 0 6px 30px rgba(24, 33, 39, 0.025);
        transition: height 0.3s, box-shadow 0.3s;

        &.scrolled {
            height: 76px;
            box-shadow: 0 10px 40px rgba(24, 33, 39, 0.08);
        }

        .container-global {
            height: 100%;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar {
            height: 100%;
            padding: 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;

            img {
                width: 200px;
                height: auto;
            }
        }

        .navbar-nav {
            gap: 17px;
            margin-right: 28px;
            align-items: center;
        }

        .nav-link {
            padding: 12px 1px;
            color: #334049;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            transition: color 0.2s;

            &:hover,
            &.active {
                color: #a8853e;
            }
        }

        .nav-row {
            display: flex;
            align-items: center;
        }

        .child-toggle {
            display: none;
            padding: 8px;
            border: 0;
            background: transparent;
            color: #334049;
            font-size: 11px;
            transition: transform 0.25s;

            &[aria-expanded="true"] {
                transform: rotate(180deg);
            }
        }

        .sub-menu {
            margin: 0;
            padding: 0;
            list-style: none;

            .nav-link {
                display: block;
                padding: 12px 20px;
                white-space: nowrap;
            }
        }

        .header-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding: 16px 20px;
            background: var(--colors);
            color: var(--color10);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            white-space: nowrap;
            transition: background 0.2s;

            &:hover {
                background: #29353c;
                color: var(--color10);
            }
        }

        .navbar-toggler {
            margin-left: auto;
            padding: 9px 0;
            border: 0;
            box-shadow: none;
            outline: none;
            color: var(--colors);
            font-size: 22px;
        }

        @media (min-width: 1200px) {
            .navbar-collapse {
                justify-content: flex-end;
            }

            .has-child {
                position: relative;

                > .nav-row > .nav-link::after {
                    content: "\f107";
                    margin-left: 7px;
                    font-family: "Font Awesome 6 Free";
                    font-weight: 900;
                }

                > .sub-menu {
                    display: block;
                    position: absolute;
                    left: 0;
                    top: 100%;
                    min-width: 230px;
                    background: var(--color10);
                    border-top: 2px solid var(--color2);
                    box-shadow: 0 18px 40px rgba(24, 33, 39, 0.12);
                    opacity: 0;
                    visibility: hidden;
                    transform: translateY(10px);
                    transition: opacity 0.25s, transform 0.25s, visibility 0.25s;

                    .sub-menu {
                        left: 100%;
                        top: 0;
                    }
                }

                &:hover > .sub-menu {
                    opacity: 1;
                    visibility: visible;
                    transform: translateY(0);
                }
            }
        }

        @media (max-width: 1199.98px) {
            height: 76px;

            .navbar-brand img {
                width: 170px;
            }

            .navbar-collapse {
                position: absolute;
                left: 0;
                right: 0;
                top: 76px;
                max-height: calc(100vh - 76px);
                overflow-y: auto;
                padding: 12px 2rem 25px;
                background: var(--color10);
                border-top: 1px solid #ecece8;
                box-shadow: 0 18px 34px rgba(24, 33, 39, 0.12);
            }

            .navbar-nav {
                align-items: stretch;
                gap: 0;
                margin-right: 0;
            }

            .nav-item {
                border-bottom: 1px solid #ecece8;
            }

            .nav-link {
                padding: 13px 0;
            }

            .nav-row {
                justify-content: space-between;
            }

            .child-toggle {
                display: block;
            }

            .sub-menu {
                padding-left: 14px;

                .nav-link {
                    padding: 11px 0;
                    white-space: normal;
                }

                .nav-item:last-child {
                    border-bottom: 0;
                }
            }
        }
    }

    main {
        padding-top: var(--header-height);

        @media (max-width: 1199.98px) {
            padding-top: 76px;
        }
    }
</style>

<header class="site-header" id="siteHeader">
    <div class="container-global">
        <nav class="navbar navbar-expand-xl" aria-label="Navigasi utama">
            <?php if (!empty($header_logo)): ?>
                <a class="navbar-brand" href="<?= base_url() ?>" aria-label="<?= htmlspecialchars($data->web->site_name ?? 'Surya Bhumi Kahuri') ?>, ke Beranda">
                    <img src="<?= htmlspecialchars($header_logo) ?>" alt="<?= htmlspecialchars($data->web->site_name ?? 'Surya Bhumi Kahuri') ?>">
                </a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Buka menu navigasi">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav">
                    <?php header_render_items($header_menu, $header_uid); ?>
                </ul>
                <a class="header-cta d-none d-xl-inline-flex" href="<?= htmlspecialchars($header_cta->link) ?>">
                    <?= htmlspecialchars($header_cta->label) ?> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const header = document.getElementById('siteHeader');

        function updateHeader() {
            header.classList.toggle('scrolled', window.scrollY > 30);
        }
        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });

        document.querySelectorAll('#mainNav a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth < 1200) {
                    $('#mainNav').collapse('hide');
                }
            });
        });

        Motion.animate(header, { opacity: [0, 1], transform: ['translateY(-20px)', 'translateY(0px)'] }, { duration: 0.7 });
        animateHover('.site-header .header-cta', { y: -2 });
    });
</script>
