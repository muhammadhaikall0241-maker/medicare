
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <title>MEDICARE — Better Care, Smarter Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #087f5b;
            --dark: #171a19;
            --muted: #777e7a;
            --light: #f5f7f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background: white;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* NAVIGATION */

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 72px;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            background: rgba(255,255,255,.78);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border-bottom: 1px solid rgba(0,0,0,.05);
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .logo span {
            color: var(--green);
        }

        .nav-links {
            display: flex;
            gap: 34px;
            align-items: center;
        }

        .nav-links a {
            font-size: 13px;
            color: #555d58;
            transition: .25s;
        }

        .nav-links a:hover {
            color: var(--green);
        }

        .nav-button {
            background: var(--green);
            color: white;
            padding: 11px 21px;
            border-radius: 30px;
            font-size: 13px;
            transition: .3s;
        }

        .nav-button:hover,
        .primary:hover {
            background: #056b4c;
            transform: translateY(-2px);
        }

        /* HERO */

        .hero {
            min-height: 760px;
            padding: 150px 9% 100px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 85% 30%, rgba(88,213,174,.19), transparent 35%),
                radial-gradient(ellipse at 15% 70%, rgba(120,180,255,.13), transparent 35%),
                #fbfcfb;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 480px;
            height: 480px;
            right: 8%;
            top: 16%;
            border-radius: 50%;
            background: linear-gradient(135deg, #e5f8ef, #e5f1ff);
            filter: blur(3px);
            opacity: .8;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 720px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--green);
            background: #eaf7f0;
            border: 1px solid #d8eee1;
            border-radius: 30px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 27px;
        }

        .eyebrow i {
            width: 7px;
            height: 7px;
            background: #19a76e;
            border-radius: 50%;
        }

        .hero h1 {
            font-size: clamp(52px, 7.5vw, 100px);
            line-height: .99;
            letter-spacing: -7px;
            font-weight: 800;
        }

        .hero h1 span {
            color: var(--green);
        }

        .hero-description {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
            max-width: 520px;
            margin-top: 27px;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 34px;
            flex-wrap: wrap;
        }

        .primary,
        .secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 24px;
            border-radius: 35px;
            font-size: 13px;
            font-weight: 600;
            transition: .3s;
        }

        .primary {
            color: white;
            background: var(--green);
            box-shadow: 0 9px 25px rgba(8,127,91,.17);
        }

        .secondary {
            border: 1px solid #dce2de;
            background: rgba(255,255,255,.7);
        }

        .secondary:hover {
            background: #edf6f1;
            border-color: var(--green);
        }

        /* DASHBOARD PREVIEW */

        .preview {
            position: absolute;
            width: 42%;
            right: 7%;
            top: 23%;
            z-index: 2;
            animation: float 6s ease-in-out infinite;
        }

        .dashboard {
            background: rgba(255,255,255,.83);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 30px 90px rgba(26,74,55,.13);
            transform: perspective(1200px) rotateY(-8deg) rotateX(3deg);
        }

        .dash-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .dash-top strong {
            font-size: 15px;
        }

        .dash-top small {
            color: var(--muted);
        }

        .dash-welcome {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .dash-subtitle {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 24px;
        }

        .dash-stats {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 10px;
        }

        .dash-card {
            padding: 16px 12px;
            border: 1px solid #edf0ed;
            border-radius: 15px;
            background: white;
        }

        .dash-card small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 10px;
        }

        .dash-card strong {
            font-size: 22px;
        }

        .dash-chart {
            margin-top: 15px;
            padding: 19px;
            background: white;
            border: 1px solid #edf0ed;
            border-radius: 16px;
        }

        .chart-line {
            height: 85px;
            margin-top: 18px;
            display: flex;
            align-items: end;
            gap: 8px;
        }

        .chart-line span {
            flex: 1;
            border-radius: 5px 5px 0 0;
            background: linear-gradient(to top, #0b8c65, #8fe0bd);
            animation: grow 1.5s ease both;
        }

        /* INTRO */

        .section {
            padding: 115px 9%;
        }

        .section-heading {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 55px;
        }

        .section-heading small {
            color: var(--green);
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 11px;
        }

        .section-heading h2 {
            font-size: clamp(35px, 5vw, 58px);
            letter-spacing: -3px;
            line-height: 1.12;
            margin-top: 17px;
        }

        .section-heading p {
            color: var(--muted);
            line-height: 1.8;
            margin-top: 17px;
            font-size: 15px;
        }

        /* FEATURES */

        .features {
            background: #f7f9f8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
        }

        .feature {
            padding: 38px 30px;
            background: white;
            border: 1px solid #edf0ed;
            border-radius: 22px;
            transition: .35s;
        }

        .feature:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 45px rgba(0,0,0,.055);
        }

        .feature-icon {
            width: 49px;
            height: 49px;
            border-radius: 15px;
            background: #e8f6ef;
            color: var(--green);
            display: grid;
            place-items: center;
            font-size: 22px;
            margin-bottom: 27px;
        }

        .feature h3 {
            font-size: 17px;
            margin-bottom: 12px;
        }

        .feature p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        /* DATA SECTION */

        .data-section {
            text-align: center;
            background: white;
        }

        .data-panel {
            max-width: 1000px;
            margin: auto;
            padding: 60px 30px;
            border-radius: 28px;
            background: linear-gradient(120deg,#edf8f2,#eef5ff);
        }

        .data-panel h2 {
            font-size: clamp(32px,5vw,55px);
            letter-spacing: -3px;
        }

        .data-panel p {
            color: #69746d;
            margin-top: 17px;
            line-height: 1.8;
        }

        .data-button {
            display: inline-block;
            margin-top: 27px;
        }

        /* FOOTER */

        footer {
            padding: 55px 9%;
            background: #171e1b;
            color: white;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 25px;
            flex-wrap: wrap;
        }

        footer p {
            color: #a9b4ad;
            font-size: 12px;
            margin-top: 12px;
        }

        .footer-bottom {
            border-top: 1px solid #344139;
            margin-top: 40px;
            padding-top: 22px;
            color: #89958d;
            font-size: 11px;
        }

        /* ANIMATION */

        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity .8s ease, transform .8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-content {
            animation: appear 1s ease both;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-13px); }
        }

        @keyframes grow {
            from { height: 0; }
        }

        /* RESPONSIVE */

        @media(max-width: 1000px) {
            .preview {
                opacity: .18;
                width: 65%;
                right: -10%;
            }

            .hero-content {
                max-width: 650px;
            }
        }

        @media(max-width: 700px) {
            nav {
                padding: 0 5%;
                height: 65px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                min-height: 690px;
                padding: 130px 7% 80px;
            }

            .hero h1 {
                letter-spacing: -4px;
            }

            .preview {
                display: none;
            }

            .hero-description {
                font-size: 15px;
            }

            .section {
                padding: 80px 7%;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .section-heading h2 {
                letter-spacing: -2px;
            }

            .data-panel {
                padding: 45px 20px;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                animation: none !important;
                transition: none !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>

<nav>
    <a href="#beranda" class="logo">MEDI<span>CARE.</span></a>

    <div class="nav-links">
        <a href="#beranda">Beranda</a>
        <a href="#fitur">Fitur</a>
        <a href="#tentang">Tentang</a>
        <a href="/manajemen">Dashboard</a>
    </div>

    <a href="/manajemen" class="nav-button">Masuk →</a>
</nav>

<section class="hero" id="beranda">
    <div class="hero-content">
        <div class="eyebrow">
            <i></i> SISTEM INFORMASI APOTEK MODERN
        </div>

        <h1>
            Better care.<br>
            Smarter <span>MEDICARE.</span>
        </h1>

        <p class="hero-description">
            Mengelola pelanggan, staf, dan persediaan obat
            kini menjadi lebih sederhana. Satu sistem,
            satu pengalaman, dan pengelolaan yang lebih baik.
        </p>

        <div class="hero-actions">
            <a href="/manajemen" class="primary">Mulai Sekarang →</a>
            <a href="#fitur" class="secondary">Jelajahi MEDICARE</a>
        </div>
    </div>

    <div class="preview">
        <div class="dashboard">
            <div class="dash-top">
                <strong>✚ MEDICARE</strong>
                <small>Admin Dashboard</small>
            </div>

            <div class="dash-welcome">Selamat datang, Admin.</div>
            <div class="dash-subtitle">Ringkasan sistem manajemen apotek</div>

            <div class="dash-stats">
                <div class="dash-card">
                    <small>PELANGGAN</small>
                    <strong>01</strong>
                </div>
                <div class="dash-card">
                    <small>STAF</small>
                    <strong>02</strong>
                </div>
                <div class="dash-card">
                    <small>OBAT</small>
                    <strong>--</strong>
                </div>
            </div>

            <div class="dash-chart">
                <small>Pengelolaan data</small>
                <div class="chart-line">
                    <span style="height:35%"></span>
                    <span style="height:55%"></span>
                    <span style="height:43%"></span>
                    <span style="height:75%"></span>
                    <span style="height:62%"></span>
                    <span style="height:90%"></span>
                    <span style="height:78%"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section features" id="fitur">
    <div class="section-heading reveal">
        <small>THE MEDICARE EXPERIENCE</small>
        <h2>Semua lebih mudah.<br>Semua lebih teratur.</h2>
        <p>
            Dirancang untuk membantu pengelolaan informasi
            apotek melalui satu platform yang sederhana dan terintegrasi.
        </p>
    </div>

    <div class="feature-grid">
        <div class="feature reveal">
            <div class="feature-icon">⌘</div>
            <h3>Manajemen Pelanggan</h3>
            <p>
                Kelola informasi pelanggan, alamat,
                dan kontak dalam satu tempat.
            </p>
        </div>

        <div class="feature reveal">
            <div class="feature-icon">✚</div>
            <h3>Data Staf Apotek</h3>
            <p>
                Simpan dan kelola informasi staf
                dengan struktur data yang terorganisir.
            </p>
        </div>

        <div class="feature reveal">
            <div class="feature-icon">▤</div>
            <h3>Inventaris Obat</h3>
            <p>
                Pantau nama obat, jumlah stok,
                dan tanggal kedaluwarsa.
            </p>
        </div>
    </div>
</section>

<section class="section data-section" id="tentang">
    <div class="data-panel reveal">
        <h2>Less complexity.<br>More clarity.</h2>
        <p>
            MEDICARE menghadirkan pengalaman pengelolaan apotek
            yang lebih sederhana, terstruktur, dan mudah digunakan.
        </p>

        <a href="/manajemen" class="primary data-button">
            Buka Dashboard →
        </a>
    </div>
</section>

<footer>
    <div class="footer-content">
        <div>
            <h2>MEDICARE.</h2>
            <p>Better Care. Smarter Management.</p>
        </div>

        <div>
            <strong>Explore</strong>
            <p><a href="#beranda">Beranda</a></p>
            <p><a href="#fitur">Fitur</a></p>
            <p><a href="/manajemen">Dashboard</a></p>
        </div>
    </div>

    <div class="footer-bottom">
        © 2026 MEDICARE. All rights reserved.
    </div>
</footer>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });

    document.querySelectorAll('.reveal').forEach(element => {
        observer.observe(element);
    });
</script>

</body>
</html>
