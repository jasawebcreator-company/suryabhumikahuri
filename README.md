# Surya Bhumi Kahuri

Website perusahaan kontraktor MEP (Mechanical, Electrical, Plumbing) **Surya Bhumi Kahuri**, berbasis di Batubulan, Gianyar, Bali. Perusahaan berdiri tahun 2024 dengan layanan sistem kelistrikan, HVAC, plumbing, dan proteksi kebakaran untuk sektor rumah sakit, hospitality, fasilitas publik, dan komersial.

Website dibangun di atas CMS **GotraSoft / JWC** (CodeIgniter 3). Isi konten (menu, produk, proyek, artikel, galeri, testimoni, urutan section homepage) dikelola dari control panel. Repositori ini berisi kode situs dan tema `front`.

## Teknologi

- PHP, CodeIgniter 3 (custom `Xview` library dan `MY_*` core)
- MySQL, diakses lewat konfigurasi `application/config/database.php`
- Bootstrap 4.3.1, Font Awesome 6, Slick Carousel, Lenis (smooth scroll), Motion (animasi entrance dan hover). Semua dimuat lewat CDN dari `theme/front/partials/header_metadata.php`
- Font: Manrope dan DM Sans

## Struktur direktori

```
public_html/
├── application/           controller, library, core, config CMS
├── assets/                aset vendor dan JS/CSS bawaan CMS
├── system/                inti CodeIgniter
├── theme/front/           tema situs (bagian yang dikerjakan di proyek ini)
│   ├── index.php          memanggil komponen homepage
│   ├── product.php        daftar produk / layanan / proyek (category/...)
│   ├── product_single.php halaman detail (view/slug)
│   ├── blog.php           daftar artikel (article-category/...)
│   ├── blog_single.php    detail artikel (article/slug)
│   ├── home/              section homepage (home_*.php)
│   │   ├── wrapper/       tampilan per grid
│   │   │   └── cards/     card: service, project, product, blog
│   │   └── components/
│   ├── page/              about-us, contact, faq, gallery
│   ├── single/            template detail: service, project, product, plus _hero, _content, _gallery, _cta, _related
│   └── partials/          header, footer, page_hero, format_style (CSS global), functions
├── index.php
└── jwc_*.php              konfigurasi dan pembaca tema JWC
```

## Homepage

Komponen homepage dimuat dari tabel `component` (per `company_id` dan `collection_id`), berurutan menurut kolom `sort`. Nilai kolom `component` menentukan file `theme/front/home/home_<component>.php` yang dimuat.

Urutan yang dipakai:

| # | component | grid | Keterangan |
|---|---|---|---|
| 1 | `slider` | | Hero. Gambar bergantian (fade, autoplay 3 detik) dari `$item->data->{1..n}` |
| 2 | `sector` | | Band sektor proyek |
| 3 | `product` | 2 | Layanan Utama Kami (`wrapper/services.php`) |
| 4 | `profile` | | Tentang perusahaan |
| 5 | `product` | 3 | Project Highlights, slider (`wrapper/projects.php`) |
| 6 | `process` | | Cara Kami Bekerja |
| 7 | `review` | | Testimoni, slider |
| 8 | `blog` | 1 | Insight (`wrapper/blogs.php`) |
| 9 | `cta` | | Kontak dan form yang menyusun pesan WhatsApp |

`home_why`, `home_faq`, `home_gallery`, dan `home_parallax` tersedia untuk dipakai bila diperlukan.

Data produk diambil berdasarkan kolom `criteria` (tag). Layanan memakai tag `services`, proyek memakai tag `porto`.

## Halaman

| URL | File | Catatan |
|---|---|---|
| `/` | `theme/front/index.php` | Homepage |
| `/category/{slug}` | `product.php` | Daftar layanan atau proyek, memakai `partials/page_hero.php` |
| `/view/{slug}` | `product_single.php` | Detail. Kategori layanan (`8554`) menampilkan kartu "Informasi Proyek". Kategori proyek (`8553`) menampilkan kartu "Lingkup Pekerjaan" dari addon `LINGKUP PEKERJAAN`. Galeri gambar (`$data->images`) tampil di atas footer dan disembunyikan jika kosong |
| `/article-category/{slug}` | `blog.php` | Daftar artikel |
| `/article/{slug}` | `blog_single.php` | Detail artikel |
| `/about-us` | `page/about-us.php` | Tentang |
| `/contact` | `page/contact.php` | Kontak dan form WhatsApp |
| `/faq` | `page/faq.php` | FAQ statis |
| `/gallery/all` | `page/gallery.php` | Galeri |

Menu navigasi dibaca dari tabel `navigasi`. Logo header dan footer dari `$data->web->site_logo_alternative` dan tidak ditampilkan jika kosong.

## Desain

- Palet: ink `#1a242b`, emas `#c9a55c`, krem `#f4f2ed`. Variabel CSS didefinisikan di `theme/front/partials/format_style.php` (`--colors`, `--color2` sampai `--color10`)
- CSS khusus section ditaruh di file section itu sendiri (nested CSS), style card ada di `format_style.php`
- Animasi entrance memakai `animateEntrance()` dan hover memakai `animateHover()` (didefinisikan di `partials/footer_metadata.php`)

## Konvensi kode

- Tanpa komentar kode
- CSS bergaya nested, multi-baris
- Tanpa pengecekan fitur browser
- Ikon memakai Font Awesome 6 gratis, slider memakai Slick, smooth scroll memakai Lenis

## Setup dan deploy

1. Salin kode ke `public_html` server (Apache atau LiteSpeed dengan `mod_rewrite`; `.htaccess` mengarahkan semua request ke `index.php`).
2. Buat file yang tidak disimpan di repositori ini (lihat bagian Ignore) dan isi dengan konfigurasi server:
   - `application/config/database.php` (koneksi database)
   - `jwc_config.php` (`COMPANY_ID`, `WEB_STATUS`, route, `URL_API`)
3. Pastikan `application/logs/` dapat ditulis oleh web server.
4. Atur konten dan urutan section homepage dari control panel.

## Ignore

File berikut sengaja tidak masuk repositori:

```
application/config/database.php
jwc_config.php
file_editor.php
application/logs/*
!application/logs/index.html
.DS_Store
```

## Catatan

- Domain sementara: `demo4.jasawebcreator.com`. Domain utama menyusul.
- Pada versi Motion yang dipakai, `Motion.hover` tidak tersedia, sehingga hover ditangani lewat `mouseenter` dan `mouseleave`.
