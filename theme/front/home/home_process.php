<?php
$process_steps = [
    ['icon' => 'fa-regular fa-comments', 'title' => 'Memahami Kebutuhan', 'text' => 'Mempelajari fungsi bangunan, lingkup pekerjaan, dan kebutuhan sistem yang direncanakan.'],
    ['icon' => 'fa-solid fa-diagram-project', 'title' => 'Koordinasi Sistem', 'text' => 'Menyelaraskan rancangan serta kebutuhan antar disiplin MEP sebelum pelaksanaan.'],
    ['icon' => 'fa-solid fa-gears', 'title' => 'Instalasi Terarah', 'text' => 'Menjalankan pekerjaan lapangan dengan perhatian pada ketelitian dan keselamatan.'],
    ['icon' => 'fa-solid fa-clipboard-check', 'title' => 'Evaluasi Hasil', 'text' => 'Memastikan sistem sesuai kebutuhan operasional dan kesiapan penggunaan bangunan.'],
];

$process_eyebrow = 'Cara Kami Bekerja';
$process_title = 'Integrasi yang baik dimulai dari <span>proses yang jelas.</span>';
$process_lead = 'Kami menghubungkan kebutuhan teknis, koordinasi lapangan, dan kualitas instalasi agar setiap tahap proyek memiliki arah yang terukur.';
$process_blueprint = "data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%221000%22 height=%22760%22 viewBox=%220 0 1000 760%22%3E%3Cdefs%3E%3Cpattern id=%22grid%22 width=%2235%22 height=%2235%22 patternUnits=%22userSpaceOnUse%22%3E%3Cpath d=%22M35 0H0V35%22 fill=%22none%22 stroke=%22%23b7c7ca%22 opacity=%22.13%22 stroke-width=%221%22/%3E%3C/pattern%3E%3ClinearGradient id=%22bg%22 x2=%221%22 y2=%221%22%3E%3Cstop stop-color=%22%2329383d%22/%3E%3Cstop offset=%221%22 stop-color=%22%2312202b%22/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width=%221000%22 height=%22760%22 fill=%22url(%23bg)%22/%3E%3Crect width=%221000%22 height=%22760%22 fill=%22url(%23grid)%22/%3E%3Cg fill=%22none%22 stroke=%22%239eb8b9%22 stroke-width=%222%22 opacity=%22.38%22%3E%3Cpath d=%22M160 500L450 680L800 500L515 330Z M160 500V260L510 80L800 260V500 M160 260L450 444L800 260 M450 444V680 M510 80L160 260 M510 80L800 260%22/%3E%3Cpath d=%22M255 310V547 M343 355V600 M547 387V635 M620 349V603 M707 305V557%22/%3E%3Cpath d=%22M160 344L450 524L800 344 M160 431L450 605L800 431%22/%3E%3Cpath d=%22M275 200L620 383 M370 152L716 330 M450 444L800 260%22/%3E%3C/g%3E%3Cg stroke=%22%23dfbc6a%22 stroke-width=%223%22 fill=%22none%22 opacity=%22.62%22%3E%3Cpath d=%22M254 539V360L511 220L707 330V547%22/%3E%3Cpath d=%22M254 468L511 325L707 436%22/%3E%3Ccircle cx=%22254%22 cy=%22360%22 r=%228%22 fill=%22%23dfbc6a%22/%3E%3Ccircle cx=%22511%22 cy=%22220%22 r=%228%22 fill=%22%23dfbc6a%22/%3E%3Ccircle cx=%22707%22 cy=%22330%22 r=%228%22 fill=%22%23dfbc6a%22/%3E%3C/g%3E%3Cg fill=%22%23a2bfc3%22 font-family=%22monospace%22 font-size=%2214%22 opacity=%22.52%22%3E%3Ctext x=%2255%22 y=%2280%22%3EENGINEERING DRAWING  /  MEP%3C/text%3E%3Ctext x=%2255%22 y=%22710%22%3EPLAN %C2%B7 INTEGRATION %C2%B7 INSTALLATION%3C/text%3E%3Ctext x=%22730%22 y=%22110%22%3ESCALE 1:100%3C/text%3E%3C/g%3E%3Cg fill=%22none%22 stroke=%22%239eb8b9%22 opacity=%22.35%22%3E%3Cpath d=%22M65 120H300 M65 120v150 M905 120H700 M905 120v150 M65 650h235 M65 650V500 M905 650H700 M905 650V500%22/%3E%3C/g%3E%3C/svg%3E";
?>
<style>
    .process {
        position: relative;
        background: #1b2830;
        color: var(--color10);
        overflow: hidden;

        .process-blueprint {
            position: absolute;
            inset: 0;
            background: url("<?= $process_blueprint ?>") right center / 780px no-repeat;
            opacity: 0.09;
            pointer-events: none;
        }

        .container-global {
            position: relative;
        }

        .process-lead {
            max-width: 455px;
            margin: 27px 0 0;
            color: #b6bfc4;
            font-size: 14px;
            line-height: 1.9;
        }

        .process-cta {
            margin-top: 2rem;
        }

        .process-grid {
            position: relative;
        }

        .process-card {
            position: relative;
            height: 100%;
            min-height: 235px;
            padding: 26px;
            background: #25333b;
            border: 1px solid rgba(255, 255, 255, 0.09);
            overflow: hidden;
            transition: border-color 0.35s, background 0.35s;

            &::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 3px;
                background: var(--color2);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.5s;
            }

            &:hover {
                background: #2a3a43;
                border-color: rgba(224, 197, 138, 0.4);

                &::before {
                    transform: scaleX(1);
                }

                .process-icon {
                    color: var(--color2);
                    transform: translateY(-3px);
                }
            }

            .process-no {
                color: #d5b56e;
                font-size: 11px;
                font-weight: 800;
                letter-spacing: 0.1em;
            }

            .process-icon {
                position: absolute;
                right: 26px;
                top: 21px;
                color: #a4adb1;
                font-size: 25px;
                transition: color 0.3s, transform 0.3s;
            }

            h3 {
                margin: 34px 0 9px;
                font-size: 17px;
                font-weight: 800;
            }

            p {
                margin: 0;
                color: #aebbbf;
                font-size: 12px;
                line-height: 1.8;
            }

            .process-watermark {
                position: absolute;
                right: 18px;
                bottom: -18px;
                color: rgba(255, 255, 255, 0.035);
                font-family: var(--primtext);
                font-size: 110px;
                font-weight: 800;
                line-height: 1;
                pointer-events: none;
            }
        }

        @media (max-width: 991.98px) {
            .process-head {
                margin-bottom: 3rem;
            }

            .process-blueprint {
                background-position: center bottom;
            }
        }

        @media (max-width: 575.98px) {
            .process-card {
                min-height: 0;
            }
        }
    }
</style>

<section class="process" id="process" aria-labelledby="processTitle">
    <div class="process-blueprint" aria-hidden="true"></div>
    <div class="container-global">
        <div class="row align-items-start">
            <div class="col-lg-5 process-head">
                <div class="section-header is-light" data-animate>
                    <div class="section-eyebrow"><?= $process_eyebrow ?></div>
                    <h2 class="section-title" id="processTitle"><?= $process_title ?></h2>
                    <p class="process-lead"><?= $process_lead ?></p>
                </div>
                <a class="btn-main is-gold process-cta" href="<?= htmlspecialchars(base_url('contact')) ?>" data-animate>Diskusikan Proyek <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-7">
                <div class="row process-grid">
                    <?php foreach ($process_steps as $process_index => $process_step): ?>
                        <?php $process_number = str_pad($process_index + 1, 2, '0', STR_PAD_LEFT); ?>
                        <div class="col-md-6 mb-4" data-animate>
                            <div class="process-card">
                                <span class="process-no"><?= $process_number ?></span>
                                <i class="<?= $process_step['icon'] ?> process-icon" aria-hidden="true"></i>
                                <h3><?= htmlspecialchars($process_step['title']) ?></h3>
                                <p><?= htmlspecialchars($process_step['text']) ?></p>
                                <span class="process-watermark" aria-hidden="true"><?= $process_number ?></span>
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
        animateEntrance('#process', { stagger: 0.12 });

        const blueprint = document.querySelector('#process .process-blueprint');

        Motion.inView('#process', function () {
            Motion.animate(blueprint, { opacity: [0, 0.09], transform: ['translateX(40px)', 'translateX(0px)'] }, { duration: 1.6, ease: [0.22, 1, 0.36, 1] });
        }, { amount: 'some' });

        animateHover('#process .process-card', { y: -5 });
        animateHover('#process .process-cta', { y: -3 });
    });
</script>
