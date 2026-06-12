<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In | Raab Shoes</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800" rel="stylesheet" />

        <style>
            :root {
                --orange: #f78a05;
                --orange-deep: #d27b13;
                --cream: #fef5e7;
                --panel: #ffffff;
                --text: #111111;
                --muted: #8c8c8c;
                --line: #d6d6d6;
                --blue: #6a9cff;
                --shadow: 0 28px 70px rgba(25, 16, 5, 0.18);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Poppins', sans-serif;
                color: var(--text);
                background: linear-gradient(90deg, var(--orange) 0 50%, #f1e4d0 50% 100%);
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .login-layout {
                min-height: 100vh;
                display: grid;
                grid-template-columns: 1fr 1fr;
                position: relative;
                overflow: hidden;
            }

            .left-panel,
            .right-panel {
                position: relative;
                min-height: 100vh;
            }

            .left-panel {
                background: linear-gradient(180deg, #ff8b08 0%, #f58700 100%);
            }

            .left-panel::before {
                content: '';
                position: absolute;
                left: 14%;
                bottom: 40%;
                width: min(480px, 46vw);
                aspect-ratio: 1.23;
                background: url("{{ asset('images/auth-scooter-illustration.png') }}") center / contain no-repeat;
                transform: translateY(10%);
                z-index: 1;
            }

            .left-panel::after {
                content: none;
                position: absolute;
                left: 22%;
                right: 0;
                bottom: 39%;
                height: 2px;
                background: rgba(17, 17, 17, 0.78);
            }

            .scooter-scene {
                position: absolute;
                left: 26%;
                bottom: 41%;
                width: 360px;
                max-width: 44vw;
                display: none;
            }

            .right-panel {
                background:
                    linear-gradient(90deg, rgba(244, 230, 207, 0.76) 0%, rgba(244, 230, 207, 0.2) 42%, rgba(244, 230, 207, 0.08) 100%),
                    url("{{ asset('images/login-shoe-cleaning-bg.png') }}") center / cover no-repeat,
                    linear-gradient(180deg, #f3e5ce 0%, #e2ceb0 100%);
            }

            .photo-scene {
                position: absolute;
                inset: 0;
                overflow: hidden;
            }

            .photo-scene > * {
                display: none;
            }

            .cleaner-bottle {
                position: absolute;
                top: 34px;
                left: 12%;
                width: 170px;
                height: 380px;
                background: linear-gradient(180deg, #f9eedc 0%, #d9bf97 100%);
                border-radius: 44px 44px 28px 28px;
                box-shadow: 0 18px 35px rgba(88, 61, 28, 0.14);
                transform: rotate(1deg);
            }

            .cleaner-bottle::before {
                content: '';
                position: absolute;
                top: -26px;
                left: 42px;
                width: 86px;
                height: 54px;
                background: #efe3cf;
                border-radius: 24px 24px 12px 12px;
            }

            .cleaner-bottle::after {
                content: 'PREMIUM\A SHOE\A CLEANER\A\A DEEP CLEAN\A GENTLE FORMULA';
                white-space: pre;
                position: absolute;
                inset: 36px 22px auto;
                color: rgba(20, 20, 20, 0.9);
                font-size: 0.72rem;
                line-height: 1.05;
                font-weight: 700;
                text-align: center;
                letter-spacing: 0.06em;
            }

            .cleaner-bottle.small {
                top: 46px;
                left: auto;
                right: 9%;
                width: 118px;
                height: 290px;
                filter: blur(0.2px);
            }

            .cleaner-bottle.small::before {
                left: 29px;
                width: 60px;
                height: 38px;
            }

            .cleaner-bottle.small::after {
                font-size: 0.55rem;
                inset: 32px 15px auto;
            }

            .brush {
                position: absolute;
                width: 110px;
                height: 70px;
                background: linear-gradient(180deg, #d4aa72 0%, #b78b53 100%);
                border-radius: 12px;
                box-shadow: 0 8px 18px rgba(77, 51, 22, 0.18);
            }

            .brush::before {
                content: '';
                position: absolute;
                left: 10px;
                right: 10px;
                top: -18px;
                height: 26px;
                background:
                    repeating-linear-gradient(90deg, #1f1f1f 0 6px, transparent 6px 10px);
                border-radius: 10px 10px 0 0;
            }

            .brush.one {
                top: 318px;
                right: 13%;
                transform: rotate(14deg);
            }

            .brush.two {
                bottom: 120px;
                right: -8px;
                transform: rotate(-14deg);
            }

            .glove {
                position: absolute;
                left: 38%;
                top: 332px;
                width: 210px;
                height: 96px;
                background: linear-gradient(180deg, #202020 0%, #0f0f0f 100%);
                border-radius: 60px 20px 46px 30px;
                transform: rotate(13deg);
                opacity: 0.95;
                box-shadow: 0 18px 25px rgba(0, 0, 0, 0.22);
            }

            .foam {
                position: absolute;
                background: rgba(255, 255, 255, 0.86);
                filter: blur(1px);
                border-radius: 999px;
            }

            .foam.a {
                width: 180px;
                height: 120px;
                left: 43%;
                top: 430px;
            }

            .foam.b {
                width: 160px;
                height: 96px;
                left: 60%;
                bottom: 138px;
            }

            .foam.c {
                width: 110px;
                height: 74px;
                right: 8%;
                bottom: 64px;
            }

            .shoe-photo {
                position: absolute;
                right: 2%;
                bottom: -32px;
                width: 540px;
                height: 520px;
                border-radius: 54% 46% 20% 32% / 44% 38% 22% 30%;
                background:
                    radial-gradient(circle at 54% 40%, rgba(255, 255, 255, 0.92) 0 10%, transparent 10%),
                    radial-gradient(circle at 34% 68%, rgba(255, 255, 255, 0.7) 0 8%, transparent 8%),
                    linear-gradient(180deg, #f1e8d8 0%, #e7d6bb 55%, #c8af88 100%);
                box-shadow: 0 14px 40px rgba(90, 67, 37, 0.15);
                transform: rotate(-12deg);
                opacity: 0.95;
            }

            .shoe-photo::before,
            .shoe-photo::after {
                content: '';
                position: absolute;
                background: linear-gradient(180deg, #f8f0e3 0%, #ddc8a7 100%);
                border-radius: 36% 40% 30% 30%;
                box-shadow: inset 0 -8px 16px rgba(131, 99, 50, 0.12);
            }

            .shoe-photo::before {
                width: 280px;
                height: 230px;
                left: 20px;
                bottom: 70px;
                transform: rotate(-10deg);
            }

            .shoe-photo::after {
                width: 250px;
                height: 210px;
                right: 34px;
                bottom: 28px;
                transform: rotate(4deg);
            }

            .card-wrap {
                position: absolute;
                inset: 50% auto auto 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
            }

            .login-card {
                width: min(100vw - 40px, 760px);
                min-height: 860px;
                padding: 56px 62px 38px;
                border-radius: 42px;
                background: rgba(255, 255, 255, 0.97);
                box-shadow: var(--shadow);
                backdrop-filter: blur(10px);
            }

            .card-top {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 20px;
            }

            .home-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 14px;
                color: var(--orange-deep);
                font-size: 0.94rem;
                font-weight: 600;
            }

            .home-link svg {
                width: 18px;
                height: 18px;
            }

            .welcome {
                margin: 10px 0 0;
                font-size: 1rem;
                color: #222222;
            }

            .title {
                margin: 8px 0 0;
                font-size: clamp(4.1rem, 7vw, 4.8rem);
                line-height: 0.95;
                letter-spacing: -0.05em;
                font-weight: 700;
            }

            .signup-hint {
                margin-top: 12px;
                font-size: 0.96rem;
                line-height: 1.45;
                color: var(--muted);
            }

            .signup-hint a {
                color: var(--orange-deep);
            }

            .form-block {
                margin-top: 56px;
            }

            .flash-message {
                margin: 26px 0 -10px;
                padding: 14px 18px;
                border-radius: 16px;
                background: #fff4e7;
                border: 1px solid rgba(245, 124, 0, 0.22);
                color: #9a5b17;
                font-size: 0.94rem;
                font-weight: 500;
            }

            .flash-message.error {
                background: #fff0ef;
                border-color: rgba(220, 65, 53, 0.2);
                color: #b33a2f;
            }

            .field {
                margin-bottom: 30px;
            }

            .field label {
                display: block;
                margin-bottom: 14px;
                font-size: 1rem;
                font-weight: 500;
            }

            .input-shell {
                position: relative;
            }

            .input-shell input {
                width: 100%;
                height: 78px;
                padding: 0 28px;
                border-radius: 16px;
                border: 1.5px solid var(--line);
                outline: none;
                font: inherit;
                font-size: 1rem;
                color: #222222;
                background: #ffffff;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .input-shell input:focus {
                border-color: var(--blue);
                box-shadow: 0 0 0 3px rgba(106, 156, 255, 0.12);
            }

            .field.is-primary .input-shell input {
                border-color: var(--blue);
            }

            .password-toggle {
                position: absolute;
                top: 50%;
                right: 22px;
                transform: translateY(-50%);
                border: 0;
                background: transparent;
                color: #9d9d9d;
                cursor: pointer;
                padding: 4px;
            }

            .password-toggle svg {
                width: 28px;
                height: 28px;
                display: block;
            }

            .forgot {
                display: inline-block;
                width: 100%;
                margin-top: -8px;
                text-align: right;
                color: #c9541a;
                font-size: 0.95rem;
            }

            .submit-btn {
                width: 100%;
                height: 78px;
                margin-top: 36px;
                border: 0;
                border-radius: 18px;
                background: linear-gradient(180deg, #eda000 0%, #e19100 100%);
                color: #ffffff;
                font: inherit;
                font-size: 1.12rem;
                font-weight: 600;
                cursor: pointer;
                box-shadow: 0 14px 30px rgba(233, 145, 0, 0.24);
            }

            .divider {
                margin: 42px 0 28px;
                text-align: center;
                color: #a5a5a5;
                font-size: 0.98rem;
            }

            .social-row {
                display: grid;
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .social-btn {
                height: 74px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 14px;
                font-size: 1rem;
                font-weight: 500;
                background: #f7f7f7;
                color: #333333;
            }

            .social-btn.google {
                justify-content: center;
                padding: 0 26px;
                background: #fff3dd;
                color: #bb7a08;
            }

            .social-icon {
                width: 38px;
                height: 38px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 1.6rem;
                flex-shrink: 0;
            }

            .google .social-icon {
                background: #ffffff;
            }

            .google .social-icon svg {
                width: 22px;
                height: 22px;
                display: block;
            }

            @media (max-width: 1180px) {
                .card-wrap {
                    position: relative;
                    inset: auto;
                    transform: none;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 36px 20px;
                }

                .login-layout {
                    grid-template-columns: 1fr;
                }

                .left-panel,
                .right-panel {
                    min-height: 320px;
                }

                .left-panel::after {
                    left: 12%;
                    right: 12%;
                    bottom: 54px;
                }

                .scooter-scene {
                    left: 50%;
                    bottom: 58px;
                    transform: translateX(-50%);
                    width: 260px;
                    max-width: none;
                }

                .left-panel::before {
                    left: 50%;
                    bottom: 58px;
                    width: 330px;
                    max-width: 82vw;
                    transform: translateX(-50%);
                }

                .right-panel {
                    min-height: 420px;
                }

                .shoe-photo {
                    right: 50%;
                    transform: translateX(50%) rotate(-9deg);
                    width: 420px;
                    height: 390px;
                }

                .glove {
                    left: 50%;
                    transform: translateX(-30%) rotate(13deg);
                }
            }

            @media (max-width: 760px) {
                body {
                    background: linear-gradient(180deg, var(--orange) 0 26%, #f1e4d0 26% 100%);
                }

                .left-panel {
                    min-height: 220px;
                }

                .right-panel {
                    min-height: 300px;
                }

                .login-card {
                    width: min(100vw - 24px, 100%);
                    min-height: 0;
                    padding: 28px 20px 24px;
                    border-radius: 28px;
                }

                .card-top {
                    flex-direction: column;
                }

                .title {
                    font-size: 3.3rem;
                }

                .form-block {
                    margin-top: 34px;
                }

                .input-shell input,
                .submit-btn {
                    height: 64px;
                }

                .social-row {
                    grid-template-columns: 1fr;
                }

                .social-btn.google {
                    justify-content: center;
                }

                .shoe-photo,
                .glove,
                .foam,
                .brush,
                .cleaner-bottle.small {
                    display: none;
                }

                .cleaner-bottle {
                    left: 50%;
                    transform: translateX(-50%);
                    width: 128px;
                    height: 280px;
                    top: 10px;
                }

                .left-panel::after {
                    bottom: 30px;
                }

                .left-panel::before {
                    bottom: 30px;
                    width: 245px;
                }
            }
        </style>
    </head>
    <body>
        <div class="login-layout">
            <section class="left-panel" aria-hidden="true">
                <svg class="scooter-scene" viewBox="0 0 420 340" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="scooterBody" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#f6c530"/>
                            <stop offset="100%" stop-color="#d68a0d"/>
                        </linearGradient>
                        <linearGradient id="shirtTone" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#ef724f"/>
                            <stop offset="100%" stop-color="#ca472f"/>
                        </linearGradient>
                    </defs>
                    <ellipse cx="346" cy="296" rx="58" ry="34" fill="#f8e2a3"/>
                    <circle cx="140" cy="286" r="22" fill="#2f2d2d"/>
                    <circle cx="286" cy="286" r="22" fill="#2f2d2d"/>
                    <circle cx="140" cy="286" r="13" fill="#f8e9c7"/>
                    <circle cx="286" cy="286" r="13" fill="#f8e9c7"/>
                    <path d="M100 230c0-22 15-38 38-38h95c17 0 31 13 31 30v60H108c-5-16-8-33-8-52Z" fill="url(#scooterBody)"/>
                    <path d="M176 194h65c20 0 36 16 36 36v20h-54c-15 0-28-10-32-24l-15-32Z" fill="#d45844"/>
                    <rect x="104" y="196" width="36" height="74" rx="18" fill="#f0b826"/>
                    <rect x="193" y="208" width="66" height="54" rx="12" fill="#c94f3d"/>
                    <rect x="205" y="189" width="70" height="18" rx="8" fill="#8f5647"/>
                    <path d="M108 195c8-35 22-57 42-67 10-5 23-8 40-7l-8 20c-13 0-22 3-29 8-12 9-20 26-25 52l-20-6Z" fill="#f0b826"/>
                    <path d="M204 129c17 0 29 5 38 16 10 11 15 29 15 52h-21c0-19-4-32-11-39-5-6-12-9-23-9l2-20Z" fill="#202020"/>
                    <path d="M229 102c14 0 25 11 25 25s-11 25-25 25-25-11-25-25 11-25 25-25Z" fill="#2d2c2c"/>
                    <path d="M188 146c10 9 17 21 22 38l17 53-28 10-18-46-28 17-15-19 42-31 8-22Z" fill="#c67d48"/>
                    <path d="M182 140c18 0 33 11 44 33l-16 13-40-13 12-33Z" fill="url(#shirtTone)"/>
                    <path d="M170 175l-4 40-28 18-16-25 48-33Z" fill="#c67d48"/>
                    <path d="M154 176c-4 29-4 60 1 94h35l-7-57 52-9-8-28h-73Z" fill="url(#shirtTone)"/>
                    <path d="M156 269l-18 31 39 8 30-38-51-1Z" fill="#e2a35f"/>
                    <path d="M206 269l-2 38 45 0 19-39-62 1Z" fill="#d98b19"/>
                    <path d="M135 295l-10 31 50 0-1-20-39-11Z" fill="#d87574"/>
                    <path d="M206 307l0 19 54 0-11-25-43 6Z" fill="#b46058"/>
                    <path d="M112 158c7 4 13 5 18 3 5-2 8-5 11-11l8 4c-3 9-9 16-18 20-9 4-19 4-29 0l10-16Z" fill="#f06a39"/>
                    <path d="M98 98l16 18-12 15-18-12 14-21Z" fill="#b9452e"/>
                    <path d="M92 86l30 16-9 11-28-6 7-21Z" fill="#8c2c24"/>
                    <circle cx="127" cy="188" r="10" fill="#f8f2df"/>
                    <path d="M273 229h24l18 21" stroke="#2d2c2c" stroke-width="4" stroke-linecap="round"/>
                </svg>
            </section>

            <section class="right-panel" aria-hidden="true">
                <div class="photo-scene">
                    <div class="cleaner-bottle"></div>
                    <div class="cleaner-bottle small"></div>
                    <div class="brush one"></div>
                    <div class="brush two"></div>
                    <div class="glove"></div>
                    <div class="foam a"></div>
                    <div class="foam b"></div>
                    <div class="foam c"></div>
                    <div class="shoe-photo"></div>
                </div>
            </section>

            <div class="card-wrap">
                <main class="login-card">
                    <a href="{{ url('/') }}" class="home-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6"></path>
                            <path d="M9 12h10"></path>
                        </svg>
                        <span>Kembali ke Home</span>
                    </a>
                    <div class="card-top">
                        <div>
                            <p class="welcome">Welcome to RaabShoes</p>
                            <h1 class="title">Sign in</h1>
                        </div>

                        <p class="signup-hint">
                            No Account ?<br>
                            <a href="{{ route('register') }}">Sign up</a>
                        </p>
                    </div>

                    @if(session('success'))
                        <div class="flash-message">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="flash-message error">{{ session('error') }}</div>
                    @endif

                    <form class="form-block" action="{{ route('login.attempt') }}" method="post">
                        @csrf
                        <div class="field is-primary">
                            <label for="email">Enter your username or email address</label>
                            <div class="input-shell">
                                <input id="email" name="email" type="text" value="{{ old('email') }}" placeholder="Username or email address">
                            </div>
                        </div>

                        <div class="field">
                            <label for="password">Enter your Password</label>
                            <div class="input-shell">
                                <input id="password" name="password" type="password" placeholder="Password">
                                <button class="password-toggle" type="button" id="password-toggle" aria-label="Tampilkan password" aria-pressed="false">
                                    <svg id="password-toggle-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                        <path d="M4 4l16 16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <a class="forgot" href="{{ route('password.request') }}">Forgot Password</a>

                        <button class="submit-btn" type="submit">Sign in</button>

                        <div class="divider">OR</div>

                        <div class="social-row">
                            <a href="{{ route('social.redirect', 'google') }}" class="social-btn google">
                                <span class="social-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#EA4335" d="M12 10.2v3.9h5.4c-.2 1.3-1.5 3.9-5.4 3.9-3.2 0-5.9-2.7-5.9-6s2.7-6 5.9-6c1.8 0 3.1.8 3.8 1.5l2.6-2.5C16.8 3.4 14.6 2.5 12 2.5A9.5 9.5 0 0 0 2.5 12 9.5 9.5 0 0 0 12 21.5c5.5 0 9.1-3.8 9.1-9.2 0-.6-.1-1.1-.2-1.6H12Z"/>
                                        <path fill="#4285F4" d="M2.5 12c0 1.5.4 2.9 1.2 4.1l3.1-2.4c-.2-.5-.3-1.1-.3-1.7s.1-1.2.3-1.7L3.7 7.9A9.4 9.4 0 0 0 2.5 12Z"/>
                                        <path fill="#FBBC05" d="M12 21.5c2.6 0 4.8-.9 6.4-2.4l-3.1-2.4c-.8.6-1.9 1.1-3.3 1.1-2.5 0-4.6-1.7-5.3-4l-3.1 2.4c1.6 3.2 4.8 5.3 8.4 5.3Z"/>
                                        <path fill="#34A853" d="M6.7 13.8c-.2-.5-.3-1.1-.3-1.8s.1-1.2.3-1.8L3.6 7.8A9.5 9.5 0 0 0 2.5 12c0 1.5.4 2.9 1.1 4.2l3.1-2.4Z"/>
                                    </svg>
                                </span>
                                <span>Sign in with Google</span>
                            </a>
                        </div>
                    </form>
                </main>
            </div>
        </div>
        <script>
            (() => {
                const passwordInput = document.getElementById('password');
                const passwordToggle = document.getElementById('password-toggle');
                const passwordToggleIcon = document.getElementById('password-toggle-icon');

                if (!passwordInput || !passwordToggle || !passwordToggleIcon) {
                    return;
                }

                const setPasswordVisible = (visible) => {
                    passwordInput.type = visible ? 'text' : 'password';
                    passwordToggle.setAttribute('aria-pressed', String(visible));
                    passwordToggle.setAttribute('aria-label', visible ? 'Sembunyikan password' : 'Tampilkan password');
                    passwordToggleIcon.innerHTML = visible
                        ? '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle>'
                        : '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle><path d="M4 4l16 16"></path>';
                };

                passwordToggle.addEventListener('click', () => {
                    setPasswordVisible(passwordInput.type === 'password');
                });
            })();
        </script>
    </body>
</html>
