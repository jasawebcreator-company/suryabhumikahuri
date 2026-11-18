<?php
$blog_title = $data->result->title ?? '';
$blog_cover = $data->result->img_cover_url ?? '';
$blog_time = !empty($data->result->created_at) ? strtotime($data->result->created_at) : false;
$blog_site = !empty($data->web->site_name) ? $data->web->site_name : 'PT Surya Bhumi Kahuri';
?>
<style>
    .blog-detail-section {
        padding-top: var(--header-height);
        background: var(--color5);

        .blog-detail-grid {
            display: flex;
            gap: 50px;
        }

        .blog-detail-main {
            flex: 1.4;
            min-width: 0;
            padding-top: 0;

            h1 {
                margin: 0 0 28px;
                color: var(--color7);
                font-family: var(--primtext);
                font-size: clamp(30px, 3.4vw, 46px);
                font-weight: 800;
                letter-spacing: -1.8px;
                line-height: 1.22;
            }

            .blog-detail-cover {
                position: relative;
                width: 100%;
                height: 440px;
                margin-bottom: 24px;
                overflow: hidden;
                background: var(--color9);

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    filter: saturate(0.85);
                }
            }

            .blog-detail-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 14px 28px;
                margin-bottom: 32px;
                padding: 0 0 20px;
                border-bottom: 1px solid var(--color9);

                .meta-item {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    color: #a8853e;
                    font-size: 10px;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;

                    i {
                        color: var(--color2);
                        font-size: 13px;
                    }
                }
            }

            .blog-detail-content {
                color: #5f6157;
                font-size: 15px;
                line-height: 1.95;
                overflow-wrap: break-word;

                p {
                    margin-bottom: 22px;
                }

                h2,
                h3,
                h4 {
                    margin: 38px 0 16px;
                    color: var(--color7);
                    font-weight: 800;
                    letter-spacing: -0.8px;
                    line-height: 1.3;
                }

                h2 {
                    font-size: 28px;
                }

                h3 {
                    font-size: 22px;
                }

                h4 {
                    font-size: 18px;
                }

                ul,
                ol {
                    margin-bottom: 22px;
                    padding-left: 1.25rem;
                }

                li {
                    margin-bottom: 8px;
                }

                strong {
                    color: var(--color7);
                }

                a {
                    color: #a8853e;
                    text-decoration: underline;

                    &:hover {
                        color: var(--colors);
                        text-decoration: underline;
                    }
                }

                img {
                    max-width: 100%;
                    height: auto;
                    margin: 8px 0 22px;
                }

                blockquote {
                    margin: 32px 0;
                    padding: 22px 28px;
                    border-left: 3px solid var(--color2);
                    background: var(--color6);
                    color: var(--color7);
                    font-size: 16px;
                    font-style: italic;
                }

                table {
                    width: 100%;
                    margin-bottom: 22px;

                    th,
                    td {
                        padding: 10px 14px;
                        border: 1px solid var(--color9);
                    }
                }
            }
        }

        .blog-detail-sidebar {
            flex: 0.6;
            min-width: 360px;

            .sidebar-widget {
                position: sticky;
                top: calc(var(--header-height) + 24px);
                padding: 30px 26px;
                background: var(--color10);

                h3 {
                    margin: 0 0 24px;
                    padding-bottom: 16px;
                    border-bottom: 1px solid var(--color9);
                    color: var(--color7);
                    font-size: 19px;
                    font-weight: 800;
                    letter-spacing: -0.5px;
                }

                .latest-articles-list {
                    display: flex;
                    flex-direction: column;
                    gap: 20px;
                }

                .latest-article-item {
                    display: flex;
                    align-items: center;
                    gap: 16px;
                    padding-bottom: 20px;
                    border-bottom: 1px solid var(--color9);

                    &:last-child {
                        padding-bottom: 0;
                        border-bottom: 0;
                    }

                    .thumb-wrapper {
                        flex-shrink: 0;
                        width: 84px;
                        height: 64px;
                        overflow: hidden;
                        background: var(--color9);

                        img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            filter: saturate(0.85);
                            transition: transform 0.4s;
                        }
                    }

                    .item-details {
                        display: flex;
                        flex-direction: column;
                        gap: 6px;
                        min-width: 0;

                        h4 {
                            display: -webkit-box;
                            margin: 0;
                            overflow: hidden;
                            color: var(--color7);
                            font-size: 13px;
                            font-weight: 800;
                            letter-spacing: -0.2px;
                            line-height: 1.45;
                            transition: color 0.3s;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                        }

                        div {
                            display: -webkit-box;
                            overflow: hidden;
                            color: #667178;
                            font-size: 11px;
                            line-height: 1.6;
                            -webkit-line-clamp: 1;
                            -webkit-box-orient: vertical;
                        }
                    }

                    &:hover {
                        .thumb-wrapper img {
                            transform: scale(1.08);
                        }

                        .item-details h4 {
                            color: #a8853e;
                        }
                    }
                }
            }
        }

        @media (max-width: 1199.98px) {
            padding-top: 76px;
        }

        @media (max-width: 1024px) {
            .blog-detail-grid {
                flex-direction: column;
                gap: 40px;
            }

            .blog-detail-sidebar {
                width: 100%;
                min-width: unset;

                .sidebar-widget {
                    position: static;
                }
            }
        }

        @media (max-width: 768px) {
            .blog-detail-main {
                .blog-detail-cover {
                    height: 260px;
                }

                .blog-detail-content {
                    h2 {
                        font-size: 24px;
                    }

                    h3 {
                        font-size: 19px;
                    }
                }
            }
        }
    }
</style>

<section class="blog-detail-section" id="blogDetail">
    <div class="container-global">
        <div class="blog-detail-grid">
            <main class="blog-detail-main">
                <h1 data-animate><?= htmlspecialchars($blog_title) ?></h1>

                <?php if ($blog_cover !== '') : ?>
                    <div class="blog-detail-cover" data-animate>
                        <img src="<?= htmlspecialchars($blog_cover) ?>" alt="<?= htmlspecialchars($blog_title) ?>">
                    </div>
                <?php endif; ?>

                <div class="blog-detail-meta" data-animate>
                    <div class="meta-item">
                        <i class="fa-regular fa-user" aria-hidden="true"></i>
                        <span><?= htmlspecialchars($blog_site) ?></span>
                    </div>
                    <?php if ($blog_time) : ?>
                        <div class="meta-item">
                            <i class="fa-regular fa-calendar" aria-hidden="true"></i>
                            <span><?= date('d M Y', $blog_time) ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="meta-item">
                        <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                        <span>Artikel</span>
                    </div>
                </div>

                <div class="blog-detail-content" data-animate>
                    <?= $data->result->content ?? '' ?>
                </div>
            </main>

            <aside class="blog-detail-sidebar" data-animate>
                <?php $func->sidebar('mainblog'); ?>
            </aside>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        animateEntrance('#blogDetail', { stagger: 0.1 });
    });
</script>
