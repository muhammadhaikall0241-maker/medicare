<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICARE — Management System</title>

    <style>
        :root {
            --green: #16845b;
            --green-dark: #106747;
            --green-light: #e8f5ee;
            --background: #f5f7f5;
            --white: #ffffff;
            --text: #202823;
            --muted: #818b84;
            --border: #e8ece8;
            --radius: 20px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                         sans-serif;
            background: var(--background);
            color: var(--text);
        }

        button, input, select, textarea { font: inherit; }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 9px;
            margin-bottom: 48px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 14px;
            background: var(--green);
            color: white;
            display: grid;
            place-items: center;
            font-size: 24px;
            font-weight: 700;
        }

        .brand h2 {
            font-size: 20px;
            letter-spacing: -1px;
            margin: 0;
        }

        .brand p {
            color: var(--muted);
            font-size: 11px;
            margin: 3px 0 0;
        }

        .nav-label {
            color: #a0a8a1;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin-bottom: 13px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: #68736b;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .nav a:hover, .nav a.active {
            color: var(--green-dark);
            background: var(--green-light);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 12px 0;
            border-top: 1px solid var(--border);
        }

        .sidebar-bottom strong {
            display: block;
            font-size: 12px;
        }

        .sidebar-bottom span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        .main {
            width: calc(100% - 245px);
            margin-left: 245px;
            padding: 35px 43px 60px;
            max-width: 1700px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 38px;
        }

        .eyebrow {
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 10px;
            font-weight: 800;
        }

        .topbar h1 {
            font-size: clamp(25px, 3vw, 34px);
            letter-spacing: -1.5px;
            margin: 7px 0 0;
        }

        .topbar p {
            color: var(--muted);
            font-size: 13px;
            margin: 8px 0 0;
        }

        .date-pill {
            background: white;
            border: 1px solid var(--border);
            padding: 12px 16px;
            border-radius: 14px;
            color: #59655d;
            font-size: 12px;
            white-space: nowrap;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 32px;
            min-height: 210px;
            border-radius: 25px;
            color: white;
            background: linear-gradient(115deg, #116b4a, #21966b);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 27px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            right: -80px;
            top: -130px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 50%;
            box-shadow: 0 0 0 35px rgba(255,255,255,.04),
                        0 0 0 75px rgba(255,255,255,.035);
        }

        .hero-content { position: relative; z-index: 1; }

        .hero .eyebrow { color: #bdebd3; }

        .hero h2 {
            font-size: clamp(23px, 3vw, 32px);
            letter-spacing: -1px;
            margin: 12px 0;
        }

        .hero p {
            max-width: 490px;
            color: #d8f0e3;
            font-size: 13px;
            line-height: 1.8;
            margin: 0;
        }

        .hero-mark {
            position: relative;
            z-index: 1;
            font-size: 83px;
            font-weight: 200;
            color: rgba(255,255,255,.8);
            padding: 0 18px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 43px;
        }

        .stat {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--green-light);
            font-size: 19px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--muted);
            margin-top: 18px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -1px;
            margin-top: 6px;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 19px;
        }

        .section-heading h2 {
            font-size: 23px;
            letter-spacing: -.8px;
            margin: 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 7px 0 0;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 26px;
            margin-bottom: 22px;
            scroll-margin-top: 25px;
        }

        .form-title {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 25px;
        }

        .form-title-icon {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            background: var(--green-light);
            border-radius: 15px;
            font-size: 22px;
        }

        .form-title h3 {
            margin: 0;
            font-size: 17px;
            letter-spacing: -.4px;
        }

        .form-title p {
            color: var(--muted);
            margin: 5px 0 0;
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .field.full { grid-column: 1 / -1; }

        .field label {
            font-size: 12px;
            font-weight: 650;
            color: #465149;
        }

        .field input, .field textarea, .field select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e2e8e2;
            background: #fbfcfb;
            border-radius: 11px;
            outline: none;
            color: var(--text);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        .field input:focus, .field textarea:focus, .field select:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(22,132,91,.09);
            background: white;
        }

        .field textarea {
            resize: vertical;
            min-height: 83px;
        }

        .field small {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-top: 1px solid var(--border);
            margin-top: 24px;
            padding-top: 20px;
        }

        .form-note {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .btn {
            border: 0;
            border-radius: 11px;
            padding: 13px 21px;
            background: var(--green);
            color: white;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        .btn:disabled {
            opacity: .6;
            cursor: wait;
            transform: none;
        }

        .notice {
            display: none;
            padding: 13px 15px;
            margin-bottom: 18px;
            border-radius: 11px;
            font-size: 12px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .notice.success {
            display: block;
            background: #e8f7ed;
            color: #17633d;
        }

        .notice.error {
            display: block;
            background: #fff0ee;
            color: #a12b20;
        }

        .footer {
            text-align: center;
            color: #9aa29c;
            font-size: 11px;
            margin-top: 40px;
        }

        @media (max-width: 1000px) {
            .sidebar { width: 210px; }
            .main {
                width: calc(100% - 210px);
                margin-left: 210px;
                padding: 28px 24px 45px;
            }
            .stats { gap: 11px; }
            .stat { padding: 17px; }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 17px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .layout { display: block; }
            .brand { margin-bottom: 18px; }
            .nav-label, .sidebar-bottom { display: none; }
            .nav {
                flex-direction: row;
                overflow-x: auto;
                padding-bottom: 3px;
            }
            .nav a {
                flex-shrink: 0;
                padding: 10px;
                font-size: 11px;
            }
            .nav-icon { display: none; }

            .main {
                width: 100%;
                margin: 0;
                padding: 25px 17px 40px;
            }

            .topbar { align-items: start; margin-bottom: 24px; }
            .date-pill { display: none; }
            .hero { padding: 25px 22px; min-height: 190px; }
            .hero-mark { display: none; }
            .stats { grid-template-columns: 1fr; }
            .stat {
                display: flex;
                align-items: center;
                gap: 15px;
            }
            .stat-top { order: 0; }
            .stat-icon { flex-shrink: 0; }
            .stat-label { margin: 0 0 5px; }
            .stat-number { font-size: 24px; margin: 0; }
            .form-card { padding: 20px 16px; }
            .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }
            .form-footer { align-items: stretch; flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">+</div>
            <div>
                <h2>MEDICARE</h2>
                <p>Pharmacy Management</p>
            </div>
        </div>

        <div class="nav-label">MENU UTAMA</div>

        <nav class="nav">
            <a href="#dashboard" class="active">
                <span class="nav-icon">⌂</span> Dashboard
            </a>
            <a href="#pelanggan">
                <span class="nav-icon">♙</span> Pelanggan
            </a>
            <a href="#staf">
                <span class="nav-icon">♧</span> Staf Apotek
            </a>
            <a href="#obat">
                <span class="nav-icon">✚</span> Daftar Obat
            </a>
        </nav>

        <div class="sidebar-bottom">
            <strong>MEDICARE System</strong>
            <span>Management made simple.</span>
        </div>
    </aside>

    <main class="main">

        <header class="topbar" id="dashboard">
            <div>
                <div class="eyebrow">Pharmacy workspace</div>
                <h1>Selamat datang.</h1>
                <p>Kelola data apotek dengan lebih mudah dan teratur.</p>
            </div>
            <div class="date-pill" id="today"></div>
        </header>

        <section class="hero">
            <div class="hero-content">
                <div class="eyebrow">MEDICARE MANAGEMENT SYSTEM</div>
                <h2>Pelayanan lebih baik,<br>dimulai dari data yang rapi.</h2>
                <p>
                    Satu tempat untuk mengelola informasi pelanggan,
                    staf apotek, dan persediaan obat.
                </p>
            </div>
            <div class="hero-mark">✳</div>
        </section>

        <section class="stats">
            <div class="stat">
                <div class="stat-top">
                    <div class="stat-icon">♙</div>
                </div>
                <div>
                    <div class="stat-label">Total Pelanggan</div>
                    <div class="stat-number" id="customerCount">—</div>
                </div>
            </div>

            <div class="stat">
                <div class="stat-top">
                    <div class="stat-icon">♧</div>
                </div>
                <div>
                    <div class="stat-label">Total Staf Apotek</div>
                    <div class="stat-number" id="staffCount">—</div>
                </div>
            </div>

            <div class="stat">
                <div class="stat-top">
                    <div class="stat-icon">✚</div>
                </div>
                <div>
                    <div class="stat-label">Jenis Obat</div>
                    <div class="stat-number" id="medicineCount">—</div>
                </div>
            </div>
        </section>

        <div class="section-heading">
            <div>
                <h2>Manajemen data</h2>
                <p>Lengkapi formulir di bawah untuk menyimpan data baru.</p>
            </div>
        </div>

        <!-- FORM PELANGGAN -->
        <section class="form-card" id="pelanggan">
            <div class="form-title">
                <div class="form-title-icon">♙</div>
                <div>
                    <h3>Data Pelanggan</h3>
                    <p>Informasi pelanggan apotek MEDICARE.</p>
                </div>
            </div>

            <div class="notice" id="customerNotice" role="status"></div>

            <form id="customerForm">
                <div class="form-grid">
                    <div class="field">
                        <label for="customer_code">ID Pelanggan</label>
                        <input id="customer_code" name="customer_code"
                               placeholder="Otomatis jika dikosongkan">
                        <small>Kosongkan untuk membuat ID otomatis.</small>
                    </div>

                    <div class="field">
                        <label for="customer_name">Nama Pelanggan *</label>
                        <input id="customer_name" name="name"
                               placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="field full">
                        <label for="customer_address">Alamat *</label>
                        <textarea id="customer_address" name="address"
                                  placeholder="Alamat lengkap pelanggan"
                                  required></textarea>
                    </div>

                    <div class="field">
                        <label for="customer_phone">Nomor HP *</label>
                        <input id="customer_phone" name="phone"
                               type="tel" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-note">
                        Pastikan informasi pelanggan sudah benar.
                    </div>
                    <button class="btn" type="submit">Simpan Pelanggan ↗</button>
                </div>
            </form>
        </section>

        <!-- FORM STAF -->
        <section class="form-card" id="staf">
            <div class="form-title">
                <div class="form-title-icon">♧</div>
                <div>
                    <h3>Data Staf Apotek</h3>
                    <p>Informasi identitas staf yang bekerja di apotek.</p>
                </div>
            </div>

            <div class="notice" id="staffNotice" role="status"></div>

            <form id="staffForm">
                <div class="form-grid">
                    <div class="field">
                        <label for="staff_code">ID Staf</label>
                        <input id="staff_code" name="staff_code"
                               placeholder="Otomatis jika dikosongkan">
                        <small>Kosongkan untuk membuat ID otomatis.</small>
                    </div>

                    <div class="field">
                        <label for="staff_name">Nama Staf *</label>
                        <input id="staff_name" name="name"
                               placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="field full">
                        <label for="staff_address">Alamat *</label>
                        <textarea id="staff_address" name="address"
                                  placeholder="Alamat lengkap staf"
                                  required></textarea>
                    </div>

                    <div class="field">
                        <label for="birth_date">Tanggal Lahir *</label>
                        <input id="birth_date" name="birth_date"
                               type="date" required>
                    </div>

                    <div class="field">
                        <label for="birth_place">Tempat Lahir *</label>
                        <input id="birth_place" name="birth_place"
                               placeholder="Kota kelahiran" required>
                    </div>

                    <div class="field">
                        <label for="staff_phone">Nomor HP *</label>
                        <input id="staff_phone" name="phone"
                               type="tel" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-note">
                        Data staf akan disimpan melalui API MEDICARE.
                    </div>
                    <button class="btn" type="submit">Simpan Staf ↗</button>
                </div>
            </form>
        </section>

        <!-- FORM OBAT -->
        <section class="form-card" id="obat">
            <div class="form-title">
                <div class="form-title-icon">✚</div>
                <div>
                    <h3>Daftar Obat</h3>
                    <p>Data obat dan persediaan apotek.</p>
                </div>
            </div>

            <div class="notice" id="medicineNotice" role="status"></div>

            <form id="medicineForm">
                <div class="form-grid">
                    <div class="field">
                        <label for="medicine_code">Kode Obat *</label>
                        <input id="medicine_code" name="medicine_code"
                               placeholder="Contoh: OBT-002" required>
                    </div>

                    <div class="field">
                        <label for="medicine_name">Nama Obat *</label>
                        <input id="medicine_name" name="name"
                               placeholder="Masukkan nama obat" required>
                    </div>

                    <div class="field">
                        <label for="medicine_stock">Stok Obat *</label>
                        <input id="medicine_stock" name="stock"
                               type="number" min="0" placeholder="Contoh: 100"
                               required>
                    </div>

                    <div class="field">
                        <label for="expiry_date">Tanggal Kedaluwarsa *</label>
                        <input id="expiry_date" name="expiry_date"
                               type="date" required>
                    </div>

                    <div class="field">
                        <label for="medicine_category">Kategori Obat *</label>
                        <select id="medicine_category" name="product_type"
                                required>
                            <option value="obat_bebas">Obat Bebas</option>
                            <option value="obat_bebas_terbatas">
                                Obat Bebas Terbatas
                            </option>
                            <option value="obat_resep">Obat Resep</option>
                            <option value="alat_kesehatan">Alat Kesehatan</option>
                            <option value="perawatan">Perawatan</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="medicine_price">Harga (Rp) *</label>
                        <input id="medicine_price" name="price"
                               type="number" min="0" step="0.01"
                               placeholder="Contoh: 5000" required>
                    </div>

                    <div class="field">
                        <label for="medicine_brand">Merek</label>
                        <input id="medicine_brand" name="brand"
                               placeholder="Nama merek (opsional)">
                    </div>

                    <div class="field">
                        <label for="requires_prescription">Perlu Resep?</label>
                        <select id="requires_prescription"
                                name="requires_prescription">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>

                    <div class="field full">
                        <label for="medicine_description">Deskripsi</label>
                        <textarea id="medicine_description" name="description"
                                  placeholder="Keterangan obat (opsional)"></textarea>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-note">
                        Periksa kode, stok, harga, dan tanggal kedaluwarsa
                        sebelum menyimpan.
                    </div>
                    <button class="btn" type="submit">Simpan Obat ↗</button>
                </div>
            </form>
        </section>

        <footer class="footer">
            MEDICARE © 2026 · Pharmacy Management System
        </footer>

    </main>
</div>

<script>
    const API = '/api';

    document.getElementById('today').textContent =
        new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());

    async function apiRequest(path, options = {}) {
        const response = await fetch(API + path, {
            ...options,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                ...(options.headers || {})
            }
        });

        const data = await response.json().catch(() => ({}));

        if (!response.ok) {
            const validationErrors = data.errors
                ? Object.values(data.errors).flat().join(' ')
                : '';

            throw new Error(
                validationErrors ||
                data.message ||
                `Permintaan gagal (${response.status}).`
            );
        }

        return data;
    }

    function showNotice(id, message, success) {
        const notice = document.getElementById(id);
        notice.textContent = message;
        notice.className = 'notice ' + (success ? 'success' : 'error');
    }

    async function submitForm(formId, endpoint, noticeId, transform, label) {
        const form = document.getElementById(formId);
        const button = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            if (!form.reportValidity()) return;

            const originalText = button.textContent;
            button.disabled = true;
            button.textContent = 'Menyimpan...';

            try {
                const formData = new FormData(form);
                const payload = transform
                    ? transform(formData)
                    : Object.fromEntries(formData.entries());

                const result = await apiRequest(endpoint, {
                    method: 'POST',
                    body: JSON.stringify(payload)
                });

                showNotice(
                    noticeId,
                    result.message || `${label} berhasil disimpan.`,
                    true
                );

                form.reset();
                await loadStats();
            } catch (error) {
                showNotice(noticeId, error.message, false);
            } finally {
                button.disabled = false;
                button.textContent = originalText;
            }
        });
    }

    submitForm(
        'customerForm',
        '/customers',
        'customerNotice',
        data => {
            const payload = Object.fromEntries(data.entries());
            if (!payload.customer_code) delete payload.customer_code;
            return payload;
        },
        'Pelanggan'
    );

    submitForm(
        'staffForm',
        '/staff',
        'staffNotice',
        data => {
            const payload = Object.fromEntries(data.entries());
            if (!payload.staff_code) delete payload.staff_code;
            return payload;
        },
        'Staf'
    );

    submitForm(
        'medicineForm',
        '/products',
        'medicineNotice',
        data => {
            const payload = Object.fromEntries(data.entries());

            payload.category_id = 1;
            payload.slug = payload.name
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '');

            payload.stock = Number(payload.stock);
            payload.price = Number(payload.price);
            payload.requires_prescription =
                payload.requires_prescription === '1';
            payload.is_active = true;

            if (!payload.brand) delete payload.brand;
            if (!payload.description) delete payload.description;

            return payload;
        },
        'Obat'
    );

    async function loadStats() {
        const resources = [
            ['/customers', 'customerCount'],
            ['/staff', 'staffCount'],
            ['/products', 'medicineCount']
        ];

        for (const [endpoint, elementId] of resources) {
            try {
                const data = await apiRequest(endpoint);
                const records = Array.isArray(data)
                    ? data
                    : (data.data || []);

                document.getElementById(elementId).textContent =
                    records.length;
            } catch {
                document.getElementById(elementId).textContent = '—';
            }
        }
    }

    document.querySelectorAll('.nav a').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.nav a').forEach(item => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    loadStats();
</script>
</body>
</html>