<?php
$sector_heading = 'MENDUKUNG KEBUTUHAN<br><strong>BERAGAM SEKTOR</strong>';

$sector_items = [
    ['icon' => 'fa-solid fa-hospital', 'label' => 'Rumah Sakit'],
    ['icon' => 'fa-solid fa-hotel', 'label' => 'Hospitality'],
    ['icon' => 'fa-solid fa-landmark', 'label' => 'Fasilitas Publik'],
    ['icon' => 'fa-solid fa-building', 'label' => 'Komersial'],
];
?>
<style>
    .sector {
        background: var(--color6);
        border-bottom: 1px solid var(--color9);

        .container-global {
            padding-top: 2.4rem;
            padding-bottom: 2.4rem;
        }

        .sector-heading {
            color: var(--color8);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            line-height: 1.9;

            strong {
                color: var(--colors);
                font-weight: 800;
            }
        }

        .sector-item {
            display: flex;
            align-items: center;
            gap: 14px;
            height: 100%;
            padding: 18px 20px;
            background: var(--color10);
            border: 1px solid var(--color9);
            color: var(--colors);
            font-family: var(--primtext);
            font-size: 14px;
            font-weight: 800;
            transition: border-color 0.3s, box-shadow 0.3s;

            i {
                color: var(--color2);
                font-size: 22px;
            }

            &:hover {
                border-color: var(--color2);
                box-shadow: 0 12px 30px rgba(24, 33, 39, 0.08);
            }
        }

        @media (max-width: 991.98px) {
            .sector-heading {
                margin-bottom: 1.4rem;
            }
        }
    }
</style>

<section class="sector" id="sector" aria-label="Sektor proyek">
    <div class="container-global">
        <div class="row align-items-center">
            <div class="col-lg-3" data-animate>
                <div class="sector-heading"><?= $sector_heading ?></div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php foreach ($sector_items as $sector_item): ?>
                        <div class="col-6 col-md-3 mb-3 mb-md-0" data-animate>
                            <div class="sector-item"><i class="<?= $sector_item['icon'] ?>" aria-hidden="true"></i><span><?= $sector_item['label'] ?></span></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#sector', { stagger: 0.1 });
        animateHover('#sector .sector-item', { y: -4 });
    });
</script>
