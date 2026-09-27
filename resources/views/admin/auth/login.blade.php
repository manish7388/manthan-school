<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | The Manthan School</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --mant-pink: #ed0b72;
            --mant-pink-dark: #c90860;
            --mant-blue: #003f73;
            --mant-blue-dark: #002d55;
            --mant-light: #f6f8fc;
            --mant-border: #e7ebf2;
            --mant-text: #172033;
            --mant-muted: #718096;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--mant-light);
            color: var(--mant-text);
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: stretch;
        }

        /* =========================
           LEFT BRAND PANEL
        ========================= */

        .login-brand-panel {
            width: 46%;
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at 85% 15%,
                    rgba(237, 11, 114, 0.18),
                    transparent 28%
                ),
                linear-gradient(
                    145deg,
                    var(--mant-blue-dark),
                    var(--mant-blue)
                );

            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .login-brand-panel::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -150px;
            right: -120px;
        }

        .login-brand-panel::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(237, 11, 114, 0.22);
            border-radius: 50%;
            bottom: -120px;
            left: -100px;
        }

        .brand-content {
            max-width: 480px;
            position: relative;
            z-index: 2;
        }

        .brand-logo {
            width: 74px;
            height: 74px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            font-weight: 800;

            margin-bottom: 28px;
        }

        .brand-content h1 {
            font-size: 42px;
            line-height: 1.12;
            font-weight: 800;
            margin-bottom: 18px;
            letter-spacing: -1px;
        }

        .brand-content h1 span {
            color: var(--mant-pink);
        }

        .brand-content p {
            color: rgba(255,255,255,0.72);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 34px;
        }

        .brand-points {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .brand-point {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.88);
            font-size: 14px;
        }

        .brand-point-icon {
            width: 30px;
            height: 30px;
            border-radius: 9px;
            background: rgba(237, 11, 114, 0.14);
            color: var(--mant-pink);

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;
        }

        /* =========================
           RIGHT LOGIN PANEL
        ========================= */

        .login-form-panel {
            width: 54%;
            min-height: 100vh;
            background: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 70px;
        }

        .login-box {
            width: 100%;
            max-width: 450px;
        }

        .login-top {
            margin-bottom: 34px;
        }

        .login-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 13px;
            border-radius: 50px;

            background: rgba(237, 11, 114, 0.08);
            color: var(--mant-pink);

            font-size: 12px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 0.5px;

            margin-bottom: 18px;
        }

        .login-badge span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--mant-pink);
        }

        .login-top h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
            color: var(--mant-blue-dark);
        }

        .login-top p {
            color: var(--mant-muted);
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #273449;
            margin-bottom: 9px;
        }

        .form-control {
            min-height: 52px;
            border: 1px solid var(--mant-border);
            border-radius: 11px;

            padding: 13px 15px;

            font-size: 14px;
            color: var(--mant-text);

            background: #fff;

            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--mant-pink);
            box-shadow: 0 0 0 4px rgba(237, 11, 114, 0.08);
        }

        .form-control::placeholder {
            color: #a2aaba;
        }

        .input-icon-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);

            width: 20px;
            text-align: center;

            color: #9aa5b5;
            font-size: 15px;

            pointer-events: none;
        }

        .input-icon-wrap .form-control {
            padding-left: 44px;
        }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 4px 0 24px;
        }

        .form-check {
            margin: 0;
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--mant-pink);
            border-color: var(--mant-pink);
        }

        .form-check-label {
            color: #697586;
            font-size: 13px;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            min-height: 53px;

            border: 0;
            border-radius: 11px;

            background: var(--mant-pink);
            color: #fff;

            font-size: 14px;
            font-weight: 700;

            transition: all 0.2s ease;

            box-shadow: 0 8px 20px rgba(237, 11, 114, 0.18);
        }

        .login-button:hover {
            background: var(--mant-pink-dark);
            transform: translateY(-1px);
            box-shadow: 0 11px 25px rgba(237, 11, 114, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;

            color: #9aa3b2;
            font-size: 12px;
        }

        .login-footer strong {
            color: var(--mant-blue);
        }

        /* =========================
           ALERT
        ========================= */

        .login-alert {
            border: 0;
            border-radius: 11px;
            background: #fff1f4;
            color: #c81e4b;

            font-size: 13px;
            padding: 13px 15px;

            margin-bottom: 22px;
        }

        .invalid-feedback {
            font-size: 12px;
            margin-top: 6px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .login-brand-panel {
                width: 40%;
                padding: 35px;
            }

            .login-form-panel {
                width: 60%;
                padding: 40px;
            }

            .brand-content h1 {
                font-size: 32px;
            }
        }

        @media (max-width: 767px) {

            .login-page {
                display: block;
            }

            .login-brand-panel {
                width: 100%;
                min-height: auto;
                padding: 35px 25px;
            }

            .brand-content {
                max-width: 600px;
            }

            .brand-content h1 {
                font-size: 30px;
            }

            .brand-content p {
                margin-bottom: 22px;
            }

            .brand-points {
                display: none;
            }

            .login-brand-panel::before {
                width: 250px;
                height: 250px;
            }

            .login-form-panel {
                width: 100%;
                min-height: auto;
                padding: 45px 25px 35px;
            }

            .login-box {
                max-width: 520px;
            }

            .login-top h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <!-- LEFT BRAND PANEL -->
    <section class="login-brand-panel">

        <div class="brand-content">

            <div class="brand-logo">
                M
            </div>

            <h1>
                The Manthan<br>
                <span>School</span>
            </h1>

            <p>
                Welcome to the administration portal.
                Manage your school's news, events and
                admission enquiries from one secure dashboard.
            </p>

            <div class="brand-points">

                <div class="brand-point">
                    <div class="brand-point-icon">✓</div>
                    Manage News & Events
                </div>

                <div class="brand-point">
                    <div class="brand-point-icon">✓</div>
                    Manage Admission Enquiries
                </div>

                <div class="brand-point">
                    <div class="brand-point-icon">✓</div>
                    Secure Administration Panel
                </div>

            </div>

        </div>

    </section>


    <!-- RIGHT LOGIN PANEL -->
    <section class="login-form-panel">

        <div class="login-box">

            <div class="login-top">

                <div class="login-badge">
                    <span></span>
                    Admin Portal
                </div>

                <h2>
                    Welcome Back
                </h2>

                <p>
                    Sign in to access your administration dashboard.
                </p>

            </div>


            @if ($errors->any())

                <div class="login-alert">
                    {{ $errors->first() }}
                </div>

            @endif


            <form method="POST" action="{{ route('admin.login.submit') }}">

                @csrf

                <!-- EMAIL -->
                <div class="form-group">

                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <div class="input-icon-wrap">

                        <span class="input-icon">
                            ✉
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter your email address"
                            autocomplete="email"
                            required
                        >

                    </div>

                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- PASSWORD -->
                <div class="form-group">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="input-icon-wrap">

                        <span class="input-icon">
                            🔒
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                    </div>

                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- OPTIONS -->
                <div class="login-options">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="remember"
                            name="remember"
                            value="1"
                        >

                        <label
                            class="form-check-label"
                            for="remember"
                        >
                            Remember me
                        </label>

                    </div>

                </div>


                <!-- LOGIN -->
                <button
                    type="submit"
                    class="login-button"
                >
                    Sign In to Dashboard
                </button>

            </form>


            <div class="login-footer">
                © {{ date('Y') }}
                <strong>The Manthan School</strong>.
                Admin Portal
            </div>

        </div>

    </section>

</div>

</body>
</html>