<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICARE — Kesehatan dalam Genggaman</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #202820;
            background: #fff;
        }

        html {
            scroll-behavior: smooth;
        }

        nav {
            height: 75px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,.95);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            color: #167653;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: #444;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #167653;
        }

        .nav-button {
            background: #167653;
            color: white;
            padding: 11px 22px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 13px;
        }

        .hero {
            min-height: 620px;
            padding: 90px 10%;
            display: flex;
            align-items: center;
            background: #f3f8f5;
        }

        .hero-content {
            max-width: 750px;
        }

        .badge {
            display: inline-block;
            padding: 9px 17px;
            background: #e0f0e7;
            color: #167653;
            border-radius: 30px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(45px, 6vw, 76px);
            line-height: 1.08;
            letter-spacing: -4px;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #167653;
        }

        .hero p {
            font-size: 17px;
            color: #6d776f;
            line-height: 1.8;
            max-width: 580px;
        }

        .hero-actions {
            margin-top: 35px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .primary-button, .secondary-button {
            display: inline-block;
            padding: 15px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
        }

        .primary-button {
            background: #167653;
            color: white;
        }

        .secondary-button {
            color: #167653;
            border: 1px solid #167653;
        }

        .section {
            padding: 90px 9%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-heading h2 {
            font-size: 38px;
            letter-spacing: -1.5px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: #858585;
            font-size: 15px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .category {
            background: #f6f8f6;
            border-radius: 18px;
            padding: 35px 15px;
            text-align: center;
            transition: .3s;
        }

        .category:hover {
            transform: translateY(-6px);
            background: #edf5ef;
        }

        .category .icon {
            font-size: 40px;
            margin-bottom: 18px;
        }

        .category h3 {
            font-size: 15px;
        }

        .products {
            background: #f8faf8;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .product-image {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f6f2;
            font-size: 65px;
        }

        .product-info {
            padding: 25px;
        }

        .product-info small {
            color: #167653;
            font-weight: bold;
        }

        .product-info h3 {
            margin: 12px 0;
        }

        .product-info p {
            color: #888;
            font-size: 13px;
            line-height: 1.6;
        }

        .product-price {
            margin-top: 18px;
            color: #167653;
            font-weight: bold;
        }

        .about {
            text-align: center;
            max-width: 850px;
            margin: auto;
        }

        .about h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .about p {
            color: #777;
            line-height: 1.9;
        }

        footer {
            background: #153e30;
            color: white;
            padding: 45px 9%;
            text-align: center;
        }

        footer p {
            color: #c4d3ca;
            font-size: 13px;
            margin-top: 12px;
        }

        @media(max-width: 800px) {
            nav {
                padding: 0 5%;
            }

            .nav-links {
                display: none;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                min-height: 550px;
            }

            .hero h1 {
                letter-spacing: -2px;
            }

            .section {
                padding: 65px 6%;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">MEDICARE.</div>

    <div class="nav-links">
        <a href="#beranda">Beranda</a>
        <a href="#kategori">Kategori</a>
        <a href="#produk">Produk</a>
        <a href="#tentang">Tentang Kami</a>
    </div>

    <a href="#produk" class="nav-button">Mulai Belanja</a>
</nav>

<section class="hero" id="beranda">
    <div class="hero-content">

        <div class="badge">SOLUSI KESEHATAN DIGITAL</div>

        <h1>
            Hidup sehat,<br>
            dimulai dari <span>MEDICARE.</span>
        </h1>

        <p>
            Temukan berbagai kebutuhan obat dan produk kesehatan
            dengan pengalaman berbelanja yang lebih mudah,
            praktis, dan nyaman.
        </p>

        <div class="hero-actions">
            <a href="#produk" class="primary-button">Jelajahi Produk →</a>
            <a href="#tentang" class="secondary-button">Kenali Kami</a>
        </div>

    </div>
</section>

<section class="section" id="kategori">

    <div class="section-heading">
        <h2>Temukan kebutuhanmu.</h2>
        <p>Berbagai kategori produk kesehatan dalam satu tempat.</p>
    </div>

    <div class="category-grid">

        <div class="category">
            <div class="icon">💊</div>
            <h3>Obat-obatan</h3>
        </div>

        <div class="category">
            <div class="icon">🩹</div>
            <h3>Perawatan Luka</h3>
        </div>

        <div class="category">
            <div class="icon">🧴</div>
            <h3>Perawatan Tubuh</h3>
        </div>

        <div class="category">
            <div class="icon">🩺</div>
            <h3>Alat Kesehatan</h3>
        </div>

    </div>

</section>

<section class="section products" id="produk">

    <div class="section-heading">
        <h2>Produk pilihan.</h2>
        <p>Contoh tampilan produk MEDICARE.</p>
    </div>

    <div class="product-grid">

        <div class="product-card">
            <div class="product-image">💊</div>
            <div class="product-info">
                <small>OBAT BEBAS</small>
                <h3>Paracetamol</h3>
                <p>Contoh produk obat untuk kebutuhan kesehatan.</p>
                <div class="product-price">Rp 5.000</div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">🧴</div>
            <div class="product-info">
                <small>PERAWATAN TUBUH</small>
                <h3>Hand Sanitizer</h3>
                <p>Contoh produk kebersihan dan perawatan tangan.</p>
                <div class="product-price">Rp 15.000</div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">🩹</div>
            <div class="product-info">
                <small>PERLENGKAPAN MEDIS</small>
                <h3>Plester Luka</h3>
                <p>Contoh perlengkapan pertolongan pertama.</p>
                <div class="product-price">Rp 8.000</div>
            </div>
        </div>

    </div>

</section>

<section class="section" id="tentang">
    <div class="about">
        <h2>Your Health, Our Priority.</h2>

        <p>
            MEDICARE merupakan platform digital untuk membantu
            masyarakat menemukan kebutuhan kesehatan dengan lebih mudah.
            Kami mengutamakan kemudahan akses informasi,
            pengalaman pengguna, dan keamanan dalam bertransaksi.
        </p>
    </div>
</section>

<footer>
    <h2>MEDICARE.</h2>
    <p>Your Health, Our Priority.</p>
    <p>© 2026 MEDICARE. All rights reserved.</p>
</footer>

</body>
</html>