<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raab Shoes - We Care About Your Shoes</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800" rel="stylesheet" />

    <style>
        :root {
            --bg: #f8f7f4;
            --panel: rgba(255, 255, 255, 0.88);
            --text: #3c3c40;
            --muted: #6e6f76;
            --accent: #f47b00;
            --accent-soft: #fff2e4;
            --blue: #0e5d86;
            --shadow: 0 26px 60px rgba(31, 35, 52, 0.12);
            --shadow-soft: 0 18px 42px rgba(31, 35, 52, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        #home,
        #services,
        #about,
        #faq,
        #contact {
            scroll-margin-top: 120px;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background:
                radial-gradient(circle at top left, #ffffff 0%, #ffffff 32%, transparent 55%),
                linear-gradient(135deg, #fbfaf8 0%, #f2efe9 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page-shell {
            width: 100%;
            max-width: none;
            margin: 0;
            min-height: 100vh;
            padding: clamp(32px, 3.2vw, 58px) clamp(42px, 6vw, 116px) clamp(42px, 4vw, 64px);
            border-radius: 0;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: none;
            overflow: visible;
            position: relative;
        }

        .page-shell::before,
        .page-shell::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(10px);
        }

        .page-shell::before {
            inset: auto auto -120px -100px;
            width: 360px;
            height: 360px;
            background: radial-gradient(circle, rgba(244, 123, 0, 0.14), transparent 68%);
        }

        .page-shell::after {
            inset: 100px -140px auto auto;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(14, 93, 134, 0.08), transparent 68%);
        }

        .nav {
            position: sticky;
            top: 0;
            z-index: 80;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            min-width: 150px;
        }

        .brand-logo {
            display: block;
            width: 172px;
            height: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 38px;
            flex: 1;
            justify-content: center;
            font-size: 1.02rem;
            font-weight: 500;
        }

        .nav-links a {
            color: #4d4e53;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .nav-links a:hover,
        .nav-links a.is-active {
            color: var(--blue);
        }

        .nav-links a:hover {
            transform: translateY(-1px);
        }

        .nav-links .with-caret {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .services-dropdown {
            position: relative;
        }

        .services-toggle {
            appearance: none;
            border: 0;
            padding: 0;
            background: transparent;
            cursor: pointer;
            color: #4d4e53;
            font: inherit;
            font-weight: inherit;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .services-dropdown.is-open .services-toggle,
        .services-dropdown:hover .services-toggle,
        .services-dropdown:focus-within .services-toggle {
            color: var(--blue);
            transform: translateY(-1px);
        }

        .services-menu {
            position: absolute;
            top: calc(100% + 14px);
            left: 50%;
            width: 230px;
            padding: 10px;
            border: 1px solid rgba(244, 123, 0, 0.16);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 18px 38px rgba(31, 35, 52, 0.14);
            display: grid;
            gap: 4px;
            opacity: 0;
            pointer-events: none;
            transform: translateX(-50%);
            visibility: hidden;
            z-index: 20;
            transition: opacity 0.16s ease, visibility 0.16s ease;
        }

        .services-dropdown.is-open .services-menu,
        .services-dropdown:hover .services-menu,
        .services-dropdown:focus-within .services-menu {
            opacity: 1;
            pointer-events: auto;
            visibility: visible;
        }

        .services-menu a,
        .services-menu-item {
            padding: 11px 12px;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: #4d4e53;
            cursor: pointer;
            font: inherit;
            font-size: 0.92rem;
            text-align: left;
            white-space: nowrap;
        }

        .services-menu a:hover,
        .services-menu-item:hover {
            background: var(--accent-soft);
            color: var(--accent);
            transform: none;
        }

        .caret {
            width: 10px;
            height: 10px;
            border-right: 2px solid currentColor;
            border-bottom: 2px solid currentColor;
            transform: rotate(45deg) translateY(-2px);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 144px;
            padding: 12px 26px;
            border-radius: 16px;
            border: 2px solid transparent;
            font-size: 1rem;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(244, 123, 0, 0.18);
        }

        .button-primary {
            background: var(--accent);
            color: #ffffff;
        }

        .button-secondary {
            background: transparent;
            color: #111111;
            border-color: var(--accent);
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 0.95fr) minmax(0, 1.05fr);
            align-items: center;
            gap: 22px;
            min-height: calc(100vh - 158px);
            padding: 64px 0 10px;
        }

        .hero-copy {
            padding-left: 52px;
            max-width: 620px;
        }

        .eyebrow {
            margin: 0 0 4px;
            font-size: clamp(4.4rem, 7.2vw, 6rem);
            font-weight: 800;
            line-height: 0.98;
            color: var(--accent);
            letter-spacing: -0.06em;
        }

        .headline {
            margin: 0;
            font-size: clamp(4.5rem, 7.4vw, 6rem);
            font-weight: 700;
            line-height: 0.96;
            letter-spacing: -0.06em;
            color: #434348;
        }

        .description {
            margin: 24px 0 0;
            max-width: 590px;
            font-size: clamp(1.26rem, 1.7vw, 1.5rem);
            line-height: 1.5;
            font-weight: 500;
            color: #141414;
        }

        .management-box {
            margin-top: 26px;
            padding: 18px 20px;
            border-radius: 18px;
            background: var(--accent-soft);
            border-left: 7px solid var(--accent);
            box-shadow: var(--shadow-soft);
        }

        .management-box h2 {
            margin: 0 0 8px;
            color: var(--accent);
            font-size: 1.25rem;
        }

        .management-box p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.6;
            color: #3c3c40;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-top: 34px;
            flex-wrap: wrap;
        }

        .hero-visual {
            position: relative;
            min-height: 620px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 28px;
        }

        .orbit {
            position: absolute;
            width: min(100%, 520px);
            aspect-ratio: 1;
            border-radius: 50%;
            background:
                radial-gradient(circle at center, rgba(255, 237, 217, 0.75) 0 34%, transparent 34%),
                radial-gradient(circle at center, transparent 0 58%, rgba(115, 118, 126, 0.14) 58% 64%, transparent 64% 100%);
        }

        .orbit::before,
        .orbit::after {
            content: '';
            position: absolute;
            inset: 8.5%;
            border-radius: 50%;
            border: 18px solid rgba(118, 122, 130, 0.08);
        }

        .orbit::after {
            inset: 22%;
            border-width: 12px;
            border-color: rgba(244, 123, 0, 0.09);
        }

        .feature-card {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 250px;
            padding: 14px 18px;
            border-radius: 24px;
            background: var(--panel);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(14px);
        }

        .feature-card.top {
            top: 118px;
            left: 2px;
        }

        .feature-card.bottom {
            left: 30px;
            top: 232px;
        }

        .contact-card {
            position: absolute;
            right: 86px;
            top: 278px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            border-radius: 24px;
            background: var(--panel);
            box-shadow: var(--shadow-soft);
            min-width: 242px;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--blue);
            background: rgba(14, 93, 134, 0.08);
            flex-shrink: 0;
        }

        .icon-box svg {
            width: 30px;
            height: 30px;
        }

        .feature-title,
        .contact-title {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: #2f3136;
            line-height: 1.25;
        }

        .feature-text,
        .contact-text {
            margin: 4px 0 0;
            font-size: 0.95rem;
            line-height: 1.45;
            color: #9a9ca4;
        }

        .shoe-showcase {
            position: relative;
            z-index: 2;
            width: min(100%, 360px);
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 92px;
        }

        .shoe-pair {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 0;
            filter: drop-shadow(0 34px 38px rgba(20, 20, 22, 0.22));
        }

        .shoe {
            width: 218px;
            height: 474px;
        }

        .shoe-photo {
            position: relative;
            z-index: 2;
            width: min(100%, 360px);
            height: auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0 26px 30px rgba(20, 20, 22, 0.18));
        }

        .labels {
            position: absolute;
            left: 50%;
            bottom: 24px;
            z-index: 1;
            width: min(100%, 360px);
            margin-top: 0;
            display: flex;
            justify-content: center;
            gap: 0;
            transform: translateX(-50%);
        }

        .label {
            flex: 1 1 0;
            min-width: 0;
            text-align: center;
            padding: 8px 20px;
            border-radius: 999px;
            color: #ffffff;
            font-size: 1.05rem;
            font-weight: 600;
            box-shadow: var(--shadow-soft);
        }

        .label.before {
            background: #3f3f43;
        }

        .label.after {
            background: var(--accent);
        }

        .faq-section {
            margin-top: 34px;
            padding: 34px;
            border-radius: 32px;
            background: linear-gradient(180deg, rgba(255, 250, 242, 0.96) 0%, rgba(255, 255, 255, 0.96) 100%);
            box-shadow: var(--shadow-soft);
        }

        .faq-header {
            max-width: 760px;
            margin-bottom: 24px;
        }

        .faq-eyebrow {
            margin: 0 0 8px;
            color: var(--accent);
            font-size: 0.92rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .faq-title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 700;
            line-height: 1.02;
            letter-spacing: -0.05em;
            color: #202127;
        }

        .faq-description {
            margin: 14px 0 0;
            font-size: 1rem;
            line-height: 1.7;
            color: var(--muted);
        }

        .faq-list {
            display: grid;
            gap: 16px;
        }

        .faq-item {
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(244, 123, 0, 0.16);
            box-shadow: 0 16px 34px rgba(31, 35, 52, 0.06);
            overflow: hidden;
        }

        .faq-item[open] {
            border-color: rgba(244, 123, 0, 0.26);
        }

        .faq-question {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 22px 24px;
            cursor: pointer;
            font-size: 1.02rem;
            font-weight: 700;
            color: #202127;
        }

        .faq-question::-webkit-details-marker {
            display: none;
        }

        .faq-icon {
            position: relative;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(244, 123, 0, 0.1);
            color: var(--accent);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.2s ease;
        }

        .faq-icon::before,
        .faq-icon::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 2px;
            border-radius: 999px;
            background: currentColor;
        }

        .faq-icon::after {
            transform: rotate(90deg);
        }

        .faq-item[open] .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 24px 22px;
            color: #666973;
            font-size: 0.98rem;
            line-height: 1.75;
        }

        @media (max-width: 1280px) {
            .page-shell {
                padding: 30px 28px 38px;
            }

            .hero-copy {
                padding-left: 28px;
            }

            .nav-links {
                gap: 28px;
            }

            .faq-section {
                padding: 28px;
            }

        }

        @media (max-width: 1080px) {
            .nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-links {
                order: 3;
                width: 100%;
                flex-wrap: wrap;
                gap: 18px 24px;
            }

            .services-menu {
                left: auto;
                right: 0;
                transform: none;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 10px;
                min-height: auto;
            }

            .hero-copy {
                max-width: none;
                padding: 24px 12px 0;
                text-align: center;
            }

            .description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .management-box {
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-visual {
                min-height: 820px;
            }

            .feature-card.top {
                top: 40px;
                left: 0;
            }

            .feature-card.bottom {
                top: 206px;
                left: 0;
            }

            .contact-card {
                right: 0;
                top: 330px;
            }
        }

        @media (max-width: 768px) {
            .page-shell {
                width: min(100% - 18px, 100%);
                margin: 9px auto;
                min-height: calc(100vh - 18px);
                border-radius: 24px;
                padding: 20px 16px 28px;
            }

            .brand {
                min-width: 0;
                align-items: center;
            }

            .brand-logo {
                width: 142px;
            }

            .nav-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .services-dropdown {
                position: static;
            }

            .services-menu {
                left: 16px;
                right: 16px;
                width: auto;
                transform: none;
            }

            .button {
                min-width: 138px;
                padding: 12px 22px;
                border-radius: 15px;
            }

            .hero-copy {
                padding: 8px 0 0;
            }

            .eyebrow,
            .headline {
                font-size: clamp(3.5rem, 16vw, 4.5rem);
            }

            .description {
                font-size: 1.18rem;
                line-height: 1.6;
            }

            .management-box {
                text-align: left;
            }

            .hero-buttons .button {
                width: 100%;
            }

            .hero-visual {
                min-height: 760px;
                padding-top: 20px;
            }

            .feature-card,
            .contact-card {
                position: relative;
                top: auto;
                left: auto;
                right: auto;
                width: min(100%, 360px);
                margin: 0 auto 16px;
            }

            .orbit {
                width: min(100%, 420px);
                top: 220px;
            }

            .shoe-showcase {
                width: 100%;
                margin-top: 220px;
            }

            .shoe {
                width: 160px;
                height: 348px;
            }

            .shoe-photo {
                width: min(100%, 300px);
            }

            .labels {
                gap: 10px;
            }

            .label {
                min-width: 140px;
                padding: 12px 18px;
                font-size: 1rem;
            }

            .faq-section {
                padding: 24px 20px;
                border-radius: 24px;
            }

            .faq-question {
                padding: 18px;
                align-items: flex-start;
            }

            .faq-answer {
                padding: 0 18px 18px;
            }
        }
    </style>
</head>

<body>
    <div class="page-shell">
        <header class="nav">
            <a href="/" class="brand" aria-label="Raab Shoes">
                <img src="{{ asset('images/raabshoes-logo.svg') }}" alt="Raab Shoes" class="brand-logo">
            </a>

            <nav class="nav-links" aria-label="Primary navigation">
                <a href="#home" class="is-active">Home</a>
                <div class="services-dropdown">
                    <button type="button" class="services-toggle with-caret" aria-expanded="false">
                        Services <span class="caret" aria-hidden="true"></span>
                    </button>
                    <div class="services-menu">
                        <button type="button" class="services-menu-item" data-target="#services">Professional Cleaning</button>
                        <a href="#contact">Hubungi Kami</a>
                    </div>
                </div>
                <a href="#about">About us</a>
                <a href="#faq">FAQ</a>
                <a href="#contact">Contact us</a>
            </nav>

            <div class="nav-actions">
                <a href="{{ route('login') }}" class="button button-primary">Sign in</a>
                <a href="{{ route('register') }}" class="button button-secondary">Sign up</a>
            </div>
        </header>

        <main class="hero" id="home">
            <section class="hero-copy">
                <p class="eyebrow">We care</p>
                <h1 class="headline">about your shoes</h1>

                <p class="description">
                    Professional cleaning and care to keep your shoes fresh, clean, and like new.
                </p>

                <div class="management-box" id="about">
                    <h2>RAABSHOES Manajemen</h2>
                    <p>
                        Sistem untuk mengelola data pelanggan, layanan, pesanan,
                        pembayaran, dan laporan laundry sepatu dengan lebih mudah.
                    </p>
                </div>

                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="button button-primary">Masuk Manajemen</a>
                    <a href="https://raabshoes.vercel.app/" target="_blank" rel="noopener" class="button button-secondary">Lihat Layanan</a>
                </div>
            </section>

            <section class="hero-visual" aria-label="Before and after shoe cleaning">
                <div class="orbit" aria-hidden="true"></div>

                <article class="feature-card top" id="services">
                    <div class="icon-box" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="M20 20l-3.5-3.5"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="feature-title">Professional Cleaning</h2>
                        <p class="feature-text">Deep clean &amp; care for your shoes</p>
                    </div>
                </article>

                <article class="feature-card bottom">
                    <div class="icon-box" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                            <path d="M9 2h6"></path>
                            <path d="M9 9h6"></path>
                            <path d="M9 13h6"></path>
                            <path d="M9 17h3"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="feature-title">Easy Order</h2>
                        <p class="feature-text">Book cleaning in seconds</p>
                    </div>
                </article>

                <article class="contact-card" id="contact">
                    <div>
                        <h2 class="contact-title">Contact no</h2>
                        <p class="contact-text">085385260457</p>
                    </div>
                    <div class="icon-box" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72l.34 2.71a2 2 0 0 1-.57 1.7L7.1 9.91a16 16 0 0 0 7 7l1.78-1.78a2 2 0 0 1 1.7-.57l2.71.34A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                </article>

                <div class="shoe-showcase">
                    <img
                        class="shoe-photo"
                        src="{{ asset('images/shoes-before-after.png') }}"
                        alt="Before and after shoe cleaning"
                    >

                    <div class="labels">
                        <span class="label before">Before</span>
                        <span class="label after">After</span>
                    </div>
                </div>
            </section>
        </main>

        <section class="faq-section" id="faq">
            <div class="faq-header">
                <p class="faq-eyebrow">FAQ</p>
                <h2 class="faq-title">Pertanyaan yang sering ditanyakan pelanggan</h2>
                <p class="faq-description">
                    FAQ ini membantu pelanggan memahami layanan Raab Shoes sebelum order, mulai dari jenis treatment,
                    estimasi pengerjaan, pengambilan barang, sampai metode pembayaran.
                </p>
            </div>

            <div class="faq-list">
                <details class="faq-item" open>
                    <summary class="faq-question">
                        <span>Layanan apa saja yang tersedia di Raab Shoes?</span>
                        <span class="faq-icon" aria-hidden="true"></span>
                    </summary>
                    <div class="faq-answer">
                        Raab Shoes melayani deep clean, express clean, reglue, unyellowing, repaint/custom,
                        serta cleaning untuk tas dan topi. Detail pilihan layanan bisa dilihat pelanggan
                        lewat tombol <strong>Lihat Layanan</strong> di halaman utama.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">
                        <span>Berapa lama estimasi pengerjaan tiap order?</span>
                        <span class="faq-icon" aria-hidden="true"></span>
                    </summary>
                    <div class="faq-answer">
                        Estimasi mengikuti layanan yang dipilih. Misalnya Deep Clean Reguler sekitar 1-3 hari,
                        Express sekitar 1 hari, dan beberapa layanan repair memiliki durasi berbeda. Saat order dibuat,
                        admin juga bisa melihat dan membagikan estimasi tanggal pengambilan.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">
                        <span>Bagaimana pelanggan tahu barang sudah siap diambil?</span>
                        <span class="faq-icon" aria-hidden="true"></span>
                    </summary>
                    <div class="faq-answer">
                        Setelah pengerjaan selesai, status order bisa diubah menjadi <strong>Siap Diambil</strong>.
                        Dari sistem, admin juga bisa mengirim ringkasan order ke WhatsApp pelanggan sebagai pengingat.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">
                        <span>Metode pembayaran apa yang tersedia?</span>
                        <span class="faq-icon" aria-hidden="true"></span>
                    </summary>
                    <div class="faq-answer">
                        Saat ini tersedia pembayaran tunai, transfer bank, dan QRIS. Untuk pembayaran tunai,
                        sistem dapat mencatat nominal uang dibayar dan menghitung kembalian pelanggan secara otomatis.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">
                        <span>Apakah ada program member untuk pelanggan tetap?</span>
                        <span class="faq-icon" aria-hidden="true"></span>
                    </summary>
                    <div class="faq-answer">
                        Ada. Pelanggan bisa mengumpulkan stempel member dari layanan cuci yang memenuhi syarat.
                        Setiap 8 kali layanan, pelanggan berhak mendapatkan 1 free service sesuai aturan member card.
                    </div>
                </details>
            </div>
        </section>
    </div>

    <script>
        (() => {
            const dropdown = document.querySelector('.services-dropdown');
            const toggle = document.querySelector('.services-toggle');

            if (!dropdown || !toggle) {
                return;
            }

            const setOpen = (open) => {
                dropdown.classList.toggle('is-open', open);
                toggle.setAttribute('aria-expanded', String(open));
            };

            const scrollToSection = (selector) => {
                const target = document.querySelector(selector);

                if (!target) {
                    return;
                }

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: selector === '#home' || selector === '#faq' ? 'start' : 'center',
                });

                window.history.replaceState(null, '', selector);
            };

            toggle.addEventListener('click', (event) => {
                event.stopPropagation();
                setOpen(!dropdown.classList.contains('is-open'));
            });

            document.querySelectorAll('.nav-links a[href^="#"]').forEach((link) => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    setOpen(false);
                    scrollToSection(link.getAttribute('href'));
                });
            });

            dropdown.querySelectorAll('.services-menu a, .services-menu-item').forEach((item) => {
                item.addEventListener('click', (event) => {
                    const selector = item.dataset.target || item.getAttribute('href');

                    if (selector && selector.startsWith('#')) {
                        event.preventDefault();
                        scrollToSection(selector);
                    }

                    setOpen(false);
                });
            });

            document.addEventListener('click', (event) => {
                if (!dropdown.contains(event.target)) {
                    setOpen(false);
                }
            });

            window.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setOpen(false);
                }
            });
        })();
    </script>
</body>
</html>
