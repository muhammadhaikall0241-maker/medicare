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

        /* DATA TERSIMPAN */
        .data-section {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 25px;
            margin-bottom: 22px;
            scroll-margin-top: 25px;
        }

        .data-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .data-toolbar h3 { font-size: 17px; margin: 0; }
        .data-toolbar p { color: var(--muted); font-size: 12px; margin: 5px 0 0; }

        .table-search {
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 11px 14px;
            font-size: 12px;
            outline: none;
            min-width: 220px;
            background: #fbfcfb;
        }

        .table-search:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(22,132,91,.08);
        }

        .table-wrap { width: 100%; overflow-x: auto; }
        .data-table { width: 100%; border-collapse: collapse; min-width: 650px; }

        .data-table th {
            text-align: left;
            padding: 14px 13px;
            font-size: 10px;
            color: #89928b;
            letter-spacing: .7px;
            font-weight: 700;
            background: #f8faf8;
            white-space: nowrap;
        }

        .data-table td {
            padding: 15px 13px;
            border-bottom: 1px solid #edf0ed;
            font-size: 12px;
            color: #465149;
            white-space: nowrap;
        }

        .data-table tbody tr:hover { background: #f8fbf9; }
        .data-table td strong { color: var(--text); font-weight: 650; }
        .empty-row { text-align: center !important; color: var(--muted) !important; padding: 35px !important; }

        .table-action {
            border: 0;
            background: #fff0ee;
            color: #b43d32;
            border-radius: 8px;
            padding: 8px 11px;
            cursor: pointer;
            font-size: 11px;
        }

        .table-action:hover { background: #ffded9; }

        .table-refresh {
            border: 1px solid var(--border);
            background: white;
            color: #59655d;
            border-radius: 9px;
            padding: 9px 13px;
            font-size: 11px;
            cursor: pointer;
        }

        .table-refresh:hover { border-color: var(--green); color: var(--green); }

        @media (max-width: 700px) {
            .data-section { padding: 18px 13px; }
            .table-search { width: 100%; min-width: 0; }
            .data-toolbar { align-items: stretch; }
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


        /* ANIMASI MEDICARE — efek gerak tanpa mengubah tata letak */
        @keyframes medicareSlideIn {
            from { opacity: 0; transform: translateX(-18px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes medicareFadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes medicareFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-9px) rotate(3deg); }
        }
        @keyframes medicareOrbitPulse {
            0%, 100% { opacity: .65; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.035); }
        }
        .sidebar { animation: medicareSlideIn .7s cubic-bezier(.2,.8,.2,1) both; }
        .topbar { animation: medicareFadeUp .65s .08s both; }
        .hero { animation: medicareFadeUp .75s .16s both; }
        .hero-mark { animation: medicareFloat 5s ease-in-out infinite; }
        .hero::after { animation: medicareOrbitPulse 6s ease-in-out infinite; }
        .medicare-reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .7s ease, transform .7s cubic-bezier(.2,.75,.25,1);
        }
        .medicare-reveal.is-visible { opacity: 1; transform: translateY(0); }
        .stats .stat:nth-child(2) { transition-delay: .08s; }
        .stats .stat:nth-child(3) { transition-delay: .16s; }
        .stats .stat:nth-child(4) { transition-delay: .24s; }
        .stat { transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
        .stat:hover { transform: translateY(-4px); }
        .btn, .table-refresh, .table-action { transition: transform .2s ease, background .2s ease, border-color .2s ease; }
        .btn:hover, .table-refresh:hover { transform: translateY(-2px); }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
            .medicare-reveal { opacity: 1; transform: none; }
        }


        /* MOTION PACK II — interaksi mikro, tetap menjaga layout asli */
        @keyframes medicareRowIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes medicareSoftPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(35, 155, 105, 0); }
            50% { box-shadow: 0 0 0 5px rgba(35, 155, 105, .07); }
        }
        @keyframes medicareRipple {
            to { transform: scale(4); opacity: 0; }
        }
        @keyframes medicareShine {
            0% { transform: translateX(-130%); }
            100% { transform: translateX(130%); }
        }
        .medicare-scroll-progress {
            position: fixed; inset: 0 auto auto 0; height: 3px; width: 0;
            z-index: 9999; pointer-events: none;
            background: linear-gradient(90deg, #36a879, #91d8b5, #36a879);
            box-shadow: 0 0 12px rgba(54,168,121,.35);
            transition: width .08s linear;
        }
        .nav a { position: relative; overflow: hidden; transition: color .25s ease, background .25s ease, transform .25s ease; }
        .nav a::after {
            content: ''; position: absolute; left: 12px; bottom: 5px; height: 2px; width: 0;
            border-radius: 4px; background: #48b889; transition: width .3s cubic-bezier(.2,.8,.2,1);
        }
        .nav a:hover { transform: translateX(3px); }
        .nav a.active::after { width: 22px; }
        .stat { position: relative; overflow: hidden; transform-style: preserve-3d; will-change: transform; }
        .stat::after {
            content: ''; position: absolute; inset: 0 auto 0 -70%; width: 45%; pointer-events: none;
            background: linear-gradient(105deg, transparent, rgba(255,255,255,.42), transparent);
            transform: skewX(-18deg); opacity: 0;
        }
        .stat:hover::after { opacity: 1; animation: medicareShine .8s ease; }
        .stat-icon { transition: transform .35s cubic-bezier(.2,.8,.2,1), background .3s ease; }
        .stat:hover .stat-icon { transform: translateY(-3px) rotate(-7deg) scale(1.06); }
        .data-section, .form-card { transition: box-shadow .3s ease, border-color .3s ease; }
        .data-section:hover, .form-card:hover { box-shadow: 0 16px 42px rgba(22, 70, 49, .055); }
        tbody tr { animation: medicareRowIn .42s both; transition: background .2s ease, transform .2s ease; }
        tbody tr:nth-child(2) { animation-delay: .035s; }
        tbody tr:nth-child(3) { animation-delay: .07s; }
        tbody tr:nth-child(4) { animation-delay: .105s; }
        tbody tr:nth-child(5) { animation-delay: .14s; }
        tbody tr:hover { transform: translateX(2px); }
        input, select, textarea { transition: border-color .22s ease, box-shadow .22s ease, background .22s ease; }
        input:focus, select:focus, textarea:focus { box-shadow: 0 0 0 4px rgba(48, 161, 113, .10); }
        .btn, .table-refresh, .table-action { position: relative; overflow: hidden; }
        .btn:active, .table-refresh:active, .table-action:active { transform: scale(.97); }
        .medicare-ripple {
            position: absolute; border-radius: 50%; pointer-events: none;
            width: 18px; height: 18px; background: rgba(255,255,255,.42);
            transform: scale(0); animation: medicareRipple .55s ease-out forwards;
        }
        .notice { animation: medicareFadeUp .35s ease both; }
        button:disabled { cursor: wait; opacity: .72; }
        button:disabled::after {
            content: ''; display: inline-block; width: 12px; height: 12px; margin-left: 9px;
            border: 2px solid currentColor; border-right-color: transparent; border-radius: 50%;
            vertical-align: -2px; animation: medicareSpin .7s linear infinite;
        }
        @keyframes medicareSpin { to { transform: rotate(360deg); } }
        .hero-cta, .home-link { transition: transform .25s ease, box-shadow .25s ease; }
        .hero-cta:hover, .home-link:hover { transform: translateY(-2px); }
        .brand-icon { animation: medicareSoftPulse 4s ease-in-out infinite; }
        @media (prefers-reduced-motion: reduce) {
            .stat, tbody tr, .brand-icon { animation: none !important; }
            .medicare-ripple { display: none !important; }
        }


        /* APPLE-INSPIRED NAVIGATION — MEDICARE */
        .layout { display:block; min-height:100vh; }
        .sidebar { display:none !important; }
        .main { width:100%; max-width:1500px; margin:0 auto; padding:52px clamp(22px,7vw,110px) 80px; }
        .apple-nav { height:54px; position:sticky; top:0; z-index:1000; display:flex; align-items:center; justify-content:space-between; gap:28px; padding:0 clamp(20px,7vw,110px); background:rgba(255,255,255,.84); border-bottom:1px solid rgba(20,40,30,.07); backdrop-filter:saturate(180%) blur(22px); -webkit-backdrop-filter:saturate(180%) blur(22px); }
        .apple-brand { color:#171b19; text-decoration:none; font-size:17px; font-weight:800; letter-spacing:-1px; white-space:nowrap; }
        .apple-brand span:last-child { color:var(--green); }
        .brand-plus { color:var(--green); font-size:19px; margin-right:2px; }
        .apple-menu { display:flex; align-items:center; justify-content:center; gap:clamp(17px,3vw,42px); height:100%; }
        .apple-link,.apple-trigger { border:0; background:none; padding:0; color:#4f5852; text-decoration:none; font-size:12px; cursor:pointer; transition:color .2s ease; white-space:nowrap; }
        .apple-link:hover,.apple-trigger:hover,.apple-trigger[aria-expanded="true"] { color:var(--green); }
        .apple-trigger span { display:inline-block; margin-left:3px; font-size:13px; transition:transform .25s ease; }
        .apple-trigger[aria-expanded="true"] span { transform:rotate(180deg); }
        .apple-account { color:white; background:#07865e; border-radius:999px; text-decoration:none; padding:9px 16px; font-size:11px; font-weight:650; white-space:nowrap; transition:transform .2s,background .2s; }
        .apple-account:hover { background:#086e4e; transform:translateY(-1px); }
        .apple-account span { margin-left:7px; }
        .apple-mega { position:absolute; top:54px; left:0; right:0; z-index:1002; background:rgba(255,255,255,.97); backdrop-filter:blur(25px); -webkit-backdrop-filter:blur(25px); border-bottom:1px solid rgba(20,40,30,.08); box-shadow:0 25px 55px rgba(20,45,32,.09); opacity:0; visibility:hidden; transform:translateY(-10px); transition:opacity .28s ease,transform .32s cubic-bezier(.2,.8,.2,1),visibility .28s; }
        .apple-mega.open { opacity:1; visibility:visible; transform:translateY(0); }
        .mega-inner { max-width:1100px; margin:auto; padding:42px 28px 48px; display:grid; grid-template-columns:1fr 1.2fr; gap:9vw; }
        .mega-kicker { color:var(--green); font-size:9px; letter-spacing:1.8px; font-weight:800; }
        .mega-inner h3 { margin:13px 0 10px; color:#171b19; font-size:clamp(27px,3vw,40px); line-height:1.06; letter-spacing:-1.8px; }
        .mega-inner p { color:#818b84; font-size:12px; line-height:1.8; max-width:290px; }
        .mega-links { display:grid; grid-template-columns:1fr 1fr; gap:8px 25px; align-content:center; }
        .mega-links a { position:relative; display:block; padding:15px 28px 15px 0; text-decoration:none; border-bottom:1px solid #edf0ed; transition:transform .2s ease,color .2s ease; }
        .mega-links a:hover { transform:translateX(4px); }
        .mega-links b { display:block; color:#202823; font-size:14px; font-weight:650; }
        .mega-links small { display:block; color:#89928b; font-size:10px; margin-top:5px; }
        .mega-links i { position:absolute; right:2px; top:19px; color:var(--green); font-style:normal; }
        .mega-backdrop { position:fixed; inset:54px 0 0; z-index:999; background:rgba(20,30,25,.18); backdrop-filter:blur(7px); -webkit-backdrop-filter:blur(7px); opacity:0; visibility:hidden; transition:opacity .28s,visibility .28s; }
        .mega-backdrop.open { opacity:1; visibility:visible; }
        .topbar { margin-bottom:30px; }
        .topbar h1 { font-size:clamp(34px,5vw,58px); letter-spacing:-2.8px; font-weight:750; }
        .hero { border-radius:28px; }
        @media(max-width:760px) {
            .apple-nav { padding:0 16px; gap:12px; }
            .apple-brand { font-size:15px; }
            .apple-menu { gap:13px; }
            .apple-link,.apple-trigger { font-size:10px; }
            .apple-account { padding:8px 11px; font-size:10px; }
            .main { padding:35px 18px 55px; }
            .mega-inner { padding:28px 22px 32px; grid-template-columns:1fr; gap:16px; }
            .mega-inner h3 { font-size:29px; }
            .mega-links { grid-template-columns:1fr 1fr; gap:4px 16px; }
        }
        @media(max-width:480px) {
            .apple-nav { height:52px; }
            .apple-menu { gap:9px; }
            .apple-link,.apple-trigger { font-size:9px; }
            .apple-trigger span { display:none; }
            .apple-account { font-size:0; padding:8px 11px; }
            .apple-account span { font-size:13px; margin:0; }
            .apple-mega { top:52px; }
            .mega-backdrop { top:52px; }
            .mega-links { grid-template-columns:1fr; }
            .topbar h1 { letter-spacing:-1.8px; }
        }
        @media(prefers-reduced-motion:reduce) { .apple-mega,.mega-backdrop,.apple-trigger span { transition:none !important; } }

    </style>
</head>

<body>
<div class="medicare-scroll-progress" id="medicareScrollProgress" aria-hidden="true"></div>
<header class="apple-nav" id="medicareAppleNav">
    <a class="apple-brand" href="#dashboard" aria-label="MEDICARE Dashboard"><span class="brand-plus">+</span> MEDI<span>CARE.</span></a>
    <nav class="apple-menu" aria-label="Navigasi utama">
        <a class="apple-link" href="#dashboard">Ringkasan</a>
        <button class="apple-trigger" type="button" data-panel="dataPanel" aria-expanded="false">Data <span>⌄</span></button>
        <button class="apple-trigger" type="button" data-panel="stockPanel" aria-expanded="false">Persediaan <span>⌄</span></button>
        <button class="apple-trigger" type="button" data-panel="systemPanel" aria-expanded="false">Sistem <span>⌄</span></button>
    </nav>
    <a class="apple-account" href="{{ url('/') }}">Beranda <span>↗</span></a>
    <div class="apple-mega" id="dataPanel" aria-hidden="true">
        <div class="mega-inner"><div><span class="mega-kicker">KELOLA INFORMASI</span><h3>Semua data,<br>lebih terorganisir.</h3><p>Kelola informasi utama apotek dari satu ruang kerja.</p></div>
            <div class="mega-links"><a href="#pelanggan"><b>Pelanggan</b><small>Informasi dan data pelanggan</small><i>↗</i></a><a href="#staf"><b>Staf Apotek</b><small>Profil dan informasi staf</small><i>↗</i></a><a href="#data-pelanggan"><b>Data Tersimpan</b><small>Daftar data yang telah tercatat</small><i>↗</i></a></div></div>
    </div>
    <div class="apple-mega" id="stockPanel" aria-hidden="true">
        <div class="mega-inner"><div><span class="mega-kicker">MANAJEMEN PERSEDIAAN</span><h3>Kontrol stok<br>dengan mudah.</h3><p>Pantau obat, pergerakan stok, dan ketersediaan persediaan.</p></div>
            <div class="mega-links"><a href="#obat"><b>Daftar Obat</b><small>Katalog dan informasi obat</small><i>↗</i></a><a href="#inventaris"><b>Inventaris Stok</b><small>Stok masuk dan stok keluar</small><i>↗</i></a><a href="#inventaris"><b>Riwayat Stok</b><small>Telusuri transaksi persediaan</small><i>↗</i></a></div></div>
    </div>
    <div class="apple-mega" id="systemPanel" aria-hidden="true">
        <div class="mega-inner"><div><span class="mega-kicker">MEDICARE WORKSPACE</span><h3>Better care.<br>Smarter system.</h3><p>Ruang kerja digital untuk pengelolaan apotek yang lebih teratur.</p></div>
            <div class="mega-links"><a href="#dashboard"><b>Dashboard</b><small>Ringkasan aktivitas apotek</small><i>↗</i></a><a href="{{ url('/') }}"><b>Halaman Beranda</b><small>Kembali ke halaman utama MEDICARE</small><i>↗</i></a></div></div>
    </div>
</header>
<div class="mega-backdrop" id="megaBackdrop"></div>
<div class="layout">
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

        <!-- DATA PELANGGAN -->
        <section class="data-section" id="data-pelanggan">
            <div class="data-toolbar">
                <div>
                    <h3>Data Pelanggan</h3>
                    <p>Daftar pelanggan yang tersimpan di database.</p>
                </div>
                <input type="text" class="table-search" id="searchCustomers" placeholder="Cari pelanggan...">
                <button type="button" class="table-refresh" onclick="loadAllData()">↻ Refresh</button>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead><tr><th>ID PELANGGAN</th><th>NAMA</th><th>ALAMAT</th><th>NOMOR HP</th><th>AKSI</th></tr></thead>
                    <tbody id="customerTable"><tr><td colspan="5" class="empty-row">Memuat data...</td></tr></tbody>
                </table>
            </div>
        </section>

        <!-- DATA STAF -->
        <section class="data-section" id="data-staf">
            <div class="data-toolbar">
                <div>
                    <h3>Data Staf Apotek</h3>
                    <p>Daftar staf yang tersimpan di database.</p>
                </div>
                <input type="text" class="table-search" id="searchStaff" placeholder="Cari staf...">
                <button type="button" class="table-refresh" onclick="loadAllData()">↻ Refresh</button>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead><tr><th>ID STAF</th><th>NAMA</th><th>TEMPAT LAHIR</th><th>TANGGAL LAHIR</th><th>NOMOR HP</th><th>AKSI</th></tr></thead>
                    <tbody id="staffTable"><tr><td colspan="6" class="empty-row">Memuat data...</td></tr></tbody>
                </table>
            </div>
        </section>

        <!-- DATA OBAT -->
        <section class="data-section" id="data-obat">
            <div class="data-toolbar">
                <div>
                    <h3>Daftar Obat</h3>
                    <p>Daftar obat dan persediaan yang tersimpan.</p>
                </div>
                <input type="text" class="table-search" id="searchMedicines" placeholder="Cari obat...">
                <button type="button" class="table-refresh" onclick="loadAllData()">↻ Refresh</button>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead><tr><th>KODE OBAT</th><th>NAMA OBAT</th><th>KATEGORI</th><th>STOK</th><th>HARGA</th><th>KEDALUWARSA</th><th>AKSI</th></tr></thead>
                    <tbody id="medicineTable"><tr><td colspan="7" class="empty-row">Memuat data...</td></tr></tbody>
                </table>
            </div>
        </section>

        <!-- INVENTARIS STOK -->
        <section class="data-section" id="inventaris">
            <div class="data-toolbar">
                <div>
                    <h3>Inventaris Stok</h3>
                    <p>Pantau persediaan dan catat setiap pergerakan stok obat.</p>
                </div>
                <button type="button" class="table-refresh" onclick="loadInventory()">↻ Refresh</button>
            </div>

            <section class="stats">
                <div class="stat">
                    <div class="stat-top"><div class="stat-icon">✚</div></div>
                    <div><div class="stat-label">Total Unit Stok</div><div class="stat-number" id="inventoryTotalStock">—</div></div>
                </div>
                <div class="stat">
                    <div class="stat-top"><div class="stat-icon">!</div></div>
                    <div><div class="stat-label">Obat Stok Menipis (≤10)</div><div class="stat-number" id="inventoryLowStock">—</div></div>
                </div>
                <div class="stat">
                    <div class="stat-top"><div class="stat-icon">↕</div></div>
                    <div><div class="stat-label">Total Transaksi Stok</div><div class="stat-number" id="inventoryMovementCount">—</div></div>
                </div>
            </section>

            <section class="form-card">
                <div class="form-title">
                    <div class="form-title-icon">↕</div>
                    <div><h3>Catat Pergerakan Stok</h3><p>Gunakan stok masuk untuk penambahan dan stok keluar untuk pengurangan.</p></div>
                </div>
                <div class="notice" id="stockNotice" role="status"></div>
                <form id="stockForm">
                    <div class="form-grid">
                        <div class="field full">
                            <label for="stock_product">Pilih Obat *</label>
                            <select id="stock_product" name="product_id" required>
                                <option value="">Memuat daftar obat...</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="stock_type">Jenis Transaksi *</label>
                            <select id="stock_type" name="type" required>
                                <option value="stock_in">Stok Masuk</option>
                                <option value="stock_out">Stok Keluar</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="stock_quantity">Jumlah *</label>
                            <input id="stock_quantity" name="quantity" type="number" min="1" step="1" placeholder="Masukkan jumlah" required>
                        </div>
                        <div class="field full">
                            <label for="stock_notes">Catatan</label>
                            <textarea id="stock_notes" name="notes" maxlength="1000" placeholder="Contoh: Pembelian dari pemasok atau penjualan obat"></textarea>
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="form-note">Stok akan diperbarui otomatis dan transaksi tercatat dalam riwayat.</div>
                        <button class="btn" type="submit">Simpan Transaksi ↗</button>
                    </div>
                </form>
            </section>

            <div class="data-toolbar">
                <div><h3>Riwayat Pergerakan Stok</h3><p>Catatan stok masuk dan keluar yang tersimpan.</p></div>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead><tr><th>TANGGAL</th><th>KODE OBAT</th><th>NAMA OBAT</th><th>JENIS</th><th>JUMLAH</th><th>STOK SEBELUM</th><th>STOK SESUDAH</th><th>CATATAN</th></tr></thead>
                    <tbody id="stockMovementTable"><tr><td colspan="8" class="empty-row">Memuat riwayat...</td></tr></tbody>
                </table>
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

    // Menyimpan ID data yang sedang diedit tanpa mengubah tampilan formulir.
    const editingRecords = {
        customerForm: null,
        staffForm: null,
        medicineForm: null
    };

    const defaultSubmitLabels = {
        customerForm: 'Simpan Pelanggan ↗',
        staffForm: 'Simpan Staf ↗',
        medicineForm: 'Simpan Obat ↗'
    };

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

                const editingId = editingRecords[formId];
                const requestUrl = editingId ? `${endpoint}/${editingId}` : endpoint;
                const result = await apiRequest(requestUrl, {
                    method: editingId ? 'PUT' : 'POST',
                    body: JSON.stringify(payload)
                });

                showNotice(
                    noticeId,
                    result.message || (editingId
                        ? `${label} berhasil diperbarui.`
                        : `${label} berhasil disimpan.`),
                    true
                );

                editingRecords[formId] = null;
                form.reset();
                button.textContent = defaultSubmitLabels[formId];
                await loadAllData();
            } catch (error) {
                showNotice(noticeId, error.message, false);
            } finally {
                button.disabled = false;
                button.textContent = editingRecords[formId]
                    ? `Perbarui ${label} ↗`
                    : defaultSubmitLabels[formId];
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

    // Mengambil array data dari response API Laravel.
    function extractRecords(response) {
        let result = response;

        for (let i = 0; i < 6; i++) {
            if (Array.isArray(result)) return result;
            if (result && Array.isArray(result.data)) return result.data;
            if (result && result.data && typeof result.data === 'object') {
                result = result.data;
                continue;
            }
            break;
        }

        return [];
    }

    // Mengamankan teks sebelum dimasukkan ke HTML tabel.
    function safeText(value) {
        return String(value ?? '-').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function formatDate(value) {
        if (!value) return '-';
        const parts = String(value).substring(0, 10).split('-');
        if (parts.length !== 3) return safeText(value);
        return `${parts[2]}/${parts[1]}/${parts[0]}`;
    }

    function formatRupiah(value) {
        return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
    }

    async function loadStats() {
        const resources = [
            ['/customers', 'customerCount'],
            ['/staff', 'staffCount'],
            ['/products', 'medicineCount']
        ];

        await Promise.all(resources.map(async ([endpoint, elementId]) => {
            try {
                const response = await apiRequest(endpoint);
                animateStatNumber(
                    document.getElementById(elementId),
                    extractRecords(response).length
                );
            } catch (error) {
                document.getElementById(elementId).textContent = '—';
                console.error('Gagal memuat statistik:', error);
            }
        }));
    }

    async function loadCustomers() {
        const table = document.getElementById('customerTable');
        try {
            const response = await apiRequest('/customers');
            const records = extractRecords(response);

            if (!records.length) {
                table.innerHTML = '<tr><td colspan="5" class="empty-row">Belum ada data pelanggan.</td></tr>';
                return;
            }

            table.innerHTML = records.map(item => `
                <tr>
                    <td>${safeText(item.customer_code)}</td>
                    <td><strong>${safeText(item.name)}</strong></td>
                    <td>${safeText(item.address)}</td>
                    <td>${safeText(item.phone)}</td>
                    <td><button type="button" class="table-refresh" onclick="editRecord('customers', ${Number(item.id)})">Edit</button> <button type="button" class="table-action" onclick="deleteRecord('customers', ${Number(item.id)}, 'pelanggan')">Hapus</button></td>
                </tr>
            `).join('');
        } catch (error) {
            table.innerHTML = `<tr><td colspan="5" class="empty-row">${safeText(error.message)}</td></tr>`;
        }
    }

    async function loadStaff() {
        const table = document.getElementById('staffTable');
        try {
            const response = await apiRequest('/staff');
            const records = extractRecords(response);

            if (!records.length) {
                table.innerHTML = '<tr><td colspan="6" class="empty-row">Belum ada data staf.</td></tr>';
                return;
            }

            table.innerHTML = records.map(item => `
                <tr>
                    <td>${safeText(item.staff_code)}</td>
                    <td><strong>${safeText(item.name)}</strong></td>
                    <td>${safeText(item.birth_place)}</td>
                    <td>${formatDate(item.birth_date)}</td>
                    <td>${safeText(item.phone)}</td>
                    <td><button type="button" class="table-refresh" onclick="editRecord('staff', ${Number(item.id)})">Edit</button> <button type="button" class="table-action" onclick="deleteRecord('staff', ${Number(item.id)}, 'staf')">Hapus</button></td>
                </tr>
            `).join('');
        } catch (error) {
            table.innerHTML = `<tr><td colspan="6" class="empty-row">${safeText(error.message)}</td></tr>`;
        }
    }

    async function loadMedicines() {
        const table = document.getElementById('medicineTable');
        try {
            const response = await apiRequest('/products');
            const records = extractRecords(response);

            if (!records.length) {
                table.innerHTML = '<tr><td colspan="7" class="empty-row">Belum ada data obat.</td></tr>';
                return;
            }

            table.innerHTML = records.map(item => `
                <tr>
                    <td>${safeText(item.medicine_code)}</td>
                    <td><strong>${safeText(item.name)}</strong></td>
                    <td>${safeText(item.product_type)}</td>
                    <td>${safeText(item.stock)}</td>
                    <td>${formatRupiah(item.price)}</td>
                    <td>${formatDate(item.expiry_date)}</td>
                    <td><button type="button" class="table-refresh" onclick="editRecord('products', ${Number(item.id)})">Edit</button> <button type="button" class="table-action" onclick="deleteRecord('products', ${Number(item.id)}, 'obat')">Hapus</button></td>
                </tr>
            `).join('');
        } catch (error) {
            table.innerHTML = `<tr><td colspan="7" class="empty-row">${safeText(error.message)}</td></tr>`;
        }
    }

    function formatDateTime(value) {
        if (!value) return '-';
        const date = new Date(value);
        return Number.isNaN(date.getTime()) ? safeText(value) :
            date.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });
    }

    async function loadInventory() {
        const table = document.getElementById('stockMovementTable');
        const productSelect = document.getElementById('stock_product');

        try {
            const [productResponse, movementResponse] = await Promise.all([
                apiRequest('/products'),
                apiRequest('/stock-movements')
            ]);

            const products = extractRecords(productResponse);
            const movements = extractRecords(movementResponse);

            document.getElementById('inventoryTotalStock').textContent =
                products.reduce((sum, product) => sum + Number(product.stock || 0), 0).toLocaleString('id-ID');
            document.getElementById('inventoryLowStock').textContent =
                products.filter(product => Number(product.stock || 0) <= 10).length;
            document.getElementById('inventoryMovementCount').textContent =
                movements.length.toLocaleString('id-ID');

            const selectedProduct = productSelect.value;
            productSelect.innerHTML = '<option value="">Pilih obat...</option>' +
                products.map(product => `<option value="${Number(product.id)}">${safeText(product.medicine_code || ('OBT-' + product.id))} — ${safeText(product.name)} (Stok: ${Number(product.stock || 0)})</option>`).join('');
            if (products.some(product => String(product.id) === selectedProduct)) {
                productSelect.value = selectedProduct;
            }

            if (!movements.length) {
                table.innerHTML = '<tr><td colspan="8" class="empty-row">Belum ada transaksi stok.</td></tr>';
                return;
            }

            table.innerHTML = movements.map(item => {
                const product = item.product || {};
                const isIncoming = item.type === 'stock_in';
                const typeLabel = isIncoming ? 'Stok Masuk' : item.type === 'stock_out' ? 'Stok Keluar' : 'Penyesuaian';
                return `<tr>
                    <td>${formatDateTime(item.created_at)}</td>
                    <td>${safeText(product.medicine_code || ('OBT-' + (product.id || item.product_id)))}</td>
                    <td><strong>${safeText(product.name || 'Obat tidak ditemukan')}</strong></td>
                    <td>${safeText(typeLabel)}</td>
                    <td>${isIncoming ? '+' : item.type === 'stock_out' ? '−' : ''}${Number(item.quantity || 0)}</td>
                    <td>${Number(item.stock_before || 0)}</td>
                    <td>${Number(item.stock_after || 0)}</td>
                    <td>${safeText(item.notes || '-')}</td>
                </tr>`;
            }).join('');
        } catch (error) {
            table.innerHTML = `<tr><td colspan="8" class="empty-row">${safeText(error.message)}</td></tr>`;
            document.getElementById('inventoryTotalStock').textContent = '—';
            document.getElementById('inventoryLowStock').textContent = '—';
            document.getElementById('inventoryMovementCount').textContent = '—';
        }
    }

    document.getElementById('stockForm').addEventListener('submit', async function (event) {
        event.preventDefault();
        if (!this.reportValidity()) return;

        const form = this;
        const button = form.querySelector('button[type="submit"]');
        const originalText = button.textContent;
        const payload = {
            product_id: Number(form.product_id.value),
            type: form.type.value,
            quantity: Number(form.quantity.value),
            notes: form.notes.value.trim() || null
        };

        button.disabled = true;
        button.textContent = 'Menyimpan...';

        try {
            const result = await apiRequest('/stock-movements', {
                method: 'POST',
                body: JSON.stringify(payload)
            });
            showNotice('stockNotice', result.message || 'Transaksi stok berhasil disimpan.', true);
            form.reset();
            await loadAllData();
        } catch (error) {
            showNotice('stockNotice', error.message, false);
        } finally {
            button.disabled = false;
            button.textContent = originalText;
        }
    });

    async function editRecord(endpoint, id) {
        const config = {
            customers: { formId: 'customerForm', noticeId: 'customerNotice', label: 'Pelanggan' },
            staff: { formId: 'staffForm', noticeId: 'staffNotice', label: 'Staf' },
            products: { formId: 'medicineForm', noticeId: 'medicineNotice', label: 'Obat' }
        };
        const selected = config[endpoint];
        if (!selected) return;

        try {
            const response = await apiRequest(`/${endpoint}/${id}`);
            const record = response.data && !Array.isArray(response.data)
                ? response.data
                : response;
            const form = document.getElementById(selected.formId);

            Object.entries(record).forEach(([key, value]) => {
                const field = form.elements.namedItem(key);
                if (!field) return;
                if (key === 'requires_prescription') {
                    field.value = value ? '1' : '0';
                } else if (value !== null && value !== undefined) {
                    field.value = key === 'expiry_date' || key === 'birth_date'
                        ? String(value).substring(0, 10)
                        : value;
                } else {
                    field.value = '';
                }
            });

            editingRecords[selected.formId] = Number(id);
            form.querySelector('button[type="submit"]').textContent = `Perbarui ${selected.label} ↗`;
            showNotice(selected.noticeId, `Mode edit ${selected.label.toLowerCase()} aktif. Ubah data lalu tekan Perbarui.`, true);
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } catch (error) {
            showNotice(selected.noticeId, `Gagal mengambil data: ${error.message}`, false);
        }
    }

    async function deleteRecord(endpoint, id, label) {
        if (!confirm(`Yakin ingin menghapus data ${label} ini?`)) return;

        try {
            const result = await apiRequest(`/${endpoint}/${id}`, {
                method: 'DELETE'
            });
            alert(result.message || 'Data berhasil dihapus.');
            await loadAllData();
        } catch (error) {
            alert('Gagal menghapus data: ' + error.message);
        }
    }

    function setupSearch(inputId, tableId) {
        const input = document.getElementById(inputId);
        input.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            document.querySelectorAll(`#${tableId} tr`).forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(keyword)
                    ? '' : 'none';
            });
        });
    }

    async function loadAllData() {
        await Promise.all([
            loadStats(),
            loadCustomers(),
            loadStaff(),
            loadMedicines(),
            loadInventory()
        ]);
    }

    setupSearch('searchCustomers', 'customerTable');
    setupSearch('searchStaff', 'staffTable');
    setupSearch('searchMedicines', 'medicineTable');

    document.querySelectorAll('.nav a').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.nav a').forEach(item => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        });
    });



    // Animasi kemunculan elemen saat halaman dibuka dan saat discroll.
    const motionTargets = document.querySelectorAll(
        '.stats .stat, .data-section, .section-heading, .form-card, .footer'
    );
    if ('IntersectionObserver' in window) {
        const motionObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    motionObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08 });
        motionTargets.forEach(element => {
            element.classList.add('medicare-reveal');
            motionObserver.observe(element);
        });
    } else {
        motionTargets.forEach(element => element.classList.add('is-visible'));
    }

    // Efek hitung naik pada angka statistik.
    function animateStatNumber(element, target) {
        const finalValue = Number(target) || 0;
        const duration = 650;
        const start = performance.now();
        function update(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            element.textContent = Math.round(finalValue * eased).toLocaleString('id-ID');
            if (progress < 1) requestAnimationFrame(update);
        }
        requestAnimationFrame(update);
    }


    // MOTION PACK II: progress scroll, ripple, tilt ringan, dan menu aktif otomatis.
    (function initMedicareMotion() {
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const progress = document.getElementById('medicareScrollProgress');
        const updateProgress = () => {
            if (!progress) return;
            const max = document.documentElement.scrollHeight - window.innerHeight;
            const percent = max > 0 ? (window.scrollY / max) * 100 : 0;
            progress.style.width = `${Math.min(100, Math.max(0, percent))}%`;
        };
        window.addEventListener('scroll', updateProgress, { passive: true });
        updateProgress();

        if (!reduceMotion) {
            document.addEventListener('click', event => {
                const target = event.target.closest('.btn, .table-refresh, .table-action, .hero-cta');
                if (!target || target.disabled) return;
                const rect = target.getBoundingClientRect();
                const ripple = document.createElement('span');
                ripple.className = 'medicare-ripple';
                ripple.style.left = `${event.clientX - rect.left - 9}px`;
                ripple.style.top = `${event.clientY - rect.top - 9}px`;
                target.appendChild(ripple);
                ripple.addEventListener('animationend', () => ripple.remove(), { once: true });
            });

            document.querySelectorAll('.stats .stat').forEach(card => {
                card.addEventListener('pointermove', event => {
                    if (event.pointerType !== 'mouse') return;
                    const rect = card.getBoundingClientRect();
                    const x = (event.clientX - rect.left) / rect.width - .5;
                    const y = (event.clientY - rect.top) / rect.height - .5;
                    card.style.transform = `perspective(800px) rotateX(${(-y * 3).toFixed(2)}deg) rotateY(${(x * 3).toFixed(2)}deg) translateY(-4px)`;
                });
                card.addEventListener('pointerleave', () => { card.style.transform = ''; });
            });
        }

        const sectionLinks = [...document.querySelectorAll('.mega-links a[href^="#"], .apple-link[href^="#"]')];
        const sections = sectionLinks.map(link => document.querySelector(link.getAttribute('href'))).filter(Boolean);
        if ('IntersectionObserver' in window && sections.length) {
            const navObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    const active = `#${entry.target.id}`;
                    sectionLinks.forEach(link => link.classList.toggle('active', link.getAttribute('href') === active));
                });
            }, { rootMargin: '-22% 0px -65% 0px', threshold: 0 });
            sections.forEach(section => navObserver.observe(section));
        }
    })();


    // Apple-inspired mega navigation: hover on desktop, click/tap on all devices.
    (function setupMegaNavigation() {
        const nav = document.getElementById('medicareAppleNav');
        const backdrop = document.getElementById('megaBackdrop');
        if (!nav || !backdrop) return;
        const triggers = [...nav.querySelectorAll('.apple-trigger')];
        const panels = [...nav.querySelectorAll('.apple-mega')];
        let closeTimer;
        function closeMenus() {
            triggers.forEach(button => button.setAttribute('aria-expanded', 'false'));
            panels.forEach(panel => { panel.classList.remove('open'); panel.setAttribute('aria-hidden', 'true'); });
            backdrop.classList.remove('open');
        }
        function openMenu(button) {
            const target = document.getElementById(button.dataset.panel);
            closeMenus();
            if (!target) return;
            button.setAttribute('aria-expanded', 'true');
            target.classList.add('open'); target.setAttribute('aria-hidden', 'false');
            backdrop.classList.add('open');
        }
        triggers.forEach(button => {
            button.addEventListener('click', event => {
                event.stopPropagation();
                const isOpen = button.getAttribute('aria-expanded') === 'true';
                closeMenus();
                if (!isOpen) openMenu(button);
            });
            button.addEventListener('mouseenter', () => {
                if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
                    clearTimeout(closeTimer); openMenu(button);
                }
            });
        });
        nav.addEventListener('mouseleave', () => {
            if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) closeTimer = setTimeout(closeMenus, 180);
        });
        panels.forEach(panel => panel.addEventListener('mouseenter', () => clearTimeout(closeTimer)));
        panels.forEach(panel => panel.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenus)));
        nav.querySelectorAll('.apple-link,.apple-account').forEach(link => link.addEventListener('click', closeMenus));
        backdrop.addEventListener('click', closeMenus);
        document.addEventListener('keydown', event => { if (event.key === 'Escape') closeMenus(); });
        document.addEventListener('click', event => { if (!nav.contains(event.target)) closeMenus(); });
    })();

    loadAllData();
</script>
</body>
</html>