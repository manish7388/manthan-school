<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Admin Panel') | The Manthan School
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --mant-pink: #ed0b72;
            --mant-pink-dark: #d80062;
            --mant-blue: #003f73;
            --mant-blue-dark: #002d55;
            --mant-bg: #f7f8fb;
            --mant-border: #e9edf2;
            --mant-text: #20252b;
            --mant-muted: #7a838d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--mant-bg);
            color: var(--mant-text);
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* ==========================================
           ADMIN WRAPPER
        ========================================== */

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
        }


        /* ==========================================
           SIDEBAR
        ========================================== */

        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1050;

            display: flex;
            flex-direction: column;

            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(237, 11, 114, .22),
                    transparent 30%
                ),
                var(--mant-blue-dark);

            color: #fff;
        }

        .admin-brand {
            padding: 28px 25px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .admin-brand-name {
            color: #fff;
            font-size: 1.15rem;
            line-height: 1.05;
            font-weight: 950;
            letter-spacing: -.4px;
        }

        .admin-brand-name span {
            color: var(--mant-pink);
        }

        .admin-brand small {
            display: block;
            color: rgba(255,255,255,.5);
            font-size: .68rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 8px;
        }


        /* ==========================================
           SIDEBAR NAV
        ========================================== */

        .admin-nav {
            padding: 25px 15px;
            flex: 1;
        }

        .admin-nav-label {
            padding: 0 12px;
            color: rgba(255,255,255,.4);
            font-size: .65rem;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 12px 14px;
            margin-bottom: 6px;

            border-radius: 13px;

            color: rgba(255,255,255,.7);
            font-size: .88rem;
            font-weight: 700;

            transition: .2s ease;
        }

        .admin-nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.08);
        }

        .admin-nav-link.active {
            color: #fff;
            background: var(--mant-pink);
            box-shadow: 0 8px 20px rgba(237,11,114,.25);
        }

        .admin-nav-icon {
            width: 25px;
            text-align: center;
            font-size: 1rem;
        }


        /* ==========================================
           SIDEBAR BOTTOM
        ========================================== */

        .admin-sidebar-bottom {
            padding: 18px 15px;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            margin-bottom: 8px;
        }

        .admin-user-avatar {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;

            display: grid;
            place-items: center;

            border-radius: 50%;
            background: var(--mant-pink);

            color: #fff;
            font-weight: 900;
        }

        .admin-user-name {
            color: #fff;
            font-size: .8rem;
            font-weight: 800;
        }

        .admin-user-role {
            color: rgba(255,255,255,.45);
            font-size: .68rem;
        }

        .admin-logout {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;

            border: 0;
            background: rgba(255,255,255,.06);
            color: rgba(255,255,255,.7);

            border-radius: 12px;
            padding: 11px 14px;

            font-size: .82rem;
            font-weight: 700;

            transition: .2s ease;
        }

        .admin-logout:hover {
            background: rgba(237,11,114,.18);
            color: #fff;
        }


        /* ==========================================
           MAIN
        ========================================== */

        .admin-main {
            width: calc(100% - 260px);
            margin-left: 260px;
            min-height: 100vh;
        }


        /* ==========================================
           TOPBAR
        ========================================== */

        .admin-topbar {
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            background: #fff;
            border-bottom: 1px solid var(--mant-border);
        }

        .admin-page-title {
            margin: 0;
            color: var(--mant-blue);
            font-size: 1.1rem;
            font-weight: 900;
        }

        .admin-page-subtitle {
            color: var(--mant-muted);
            font-size: .72rem;
            margin-top: 2px;
        }

        .admin-view-site {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 9px 15px;

            border-radius: 999px;
            border: 1px solid #e3e7eb;

            color: var(--mant-blue);

            font-size: .76rem;
            font-weight: 800;
        }

        .admin-view-site:hover {
            color: var(--mant-pink);
            border-color: var(--mant-pink);
        }


        /* ==========================================
           CONTENT
        ========================================== */

        .admin-content {
            padding: 30px;
        }


        /* ==========================================
           DASHBOARD CARDS
        ========================================== */

        .admin-stat-card {
            position: relative;
            overflow: hidden;

            height: 100%;
            padding: 24px;

            border-radius: 20px;

            background: #fff;
            border: 1px solid var(--mant-border);

            box-shadow: 0 8px 30px rgba(0,0,0,.04);
        }

        .admin-stat-card::after {
            content: "";
            position: absolute;

            width: 90px;
            height: 90px;

            right: -25px;
            top: -25px;

            border-radius: 50%;

            background: rgba(237,11,114,.07);
        }

        .admin-stat-label {
            color: var(--mant-muted);
            font-size: .72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .admin-stat-number {
            margin-top: 8px;

            color: var(--mant-blue);
            font-size: 2rem;
            line-height: 1;
            font-weight: 950;
        }

        .admin-stat-icon {
            position: absolute;
            right: 22px;
            bottom: 20px;

            width: 42px;
            height: 42px;

            display: grid;
            place-items: center;

            border-radius: 13px;

            background: #fff0f6;
            color: var(--mant-pink);

            font-size: 1.1rem;
        }


        /* ==========================================
           ADMIN CARD
        ========================================== */

        .admin-card {
            background: #fff;
            border: 1px solid var(--mant-border);
            border-radius: 20px;

            box-shadow: 0 8px 30px rgba(0,0,0,.04);
        }

        .admin-card-header {
            padding: 20px 22px;

            border-bottom: 1px solid var(--mant-border);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .admin-card-title {
            margin: 0;

            color: var(--mant-blue);
            font-size: 1rem;
            font-weight: 900;
        }

        .admin-card-body {
            padding: 22px;
        }


        /* ==========================================
           BUTTONS
        ========================================== */

        .btn-admin-primary {
            background: var(--mant-pink);
            border: 1px solid var(--mant-pink);
            color: #fff;

            border-radius: 10px;
            padding: 9px 16px;

            font-size: .78rem;
            font-weight: 800;
        }

        .btn-admin-primary:hover {
            background: var(--mant-pink-dark);
            border-color: var(--mant-pink-dark);
            color: #fff;
        }

        .btn-admin-outline {
            background: #fff;
            border: 1px solid #dfe4e8;
            color: var(--mant-blue);

            border-radius: 10px;
            padding: 8px 14px;

            font-size: .76rem;
            font-weight: 800;
        }

        .btn-admin-outline:hover {
            border-color: var(--mant-pink);
            color: var(--mant-pink);
        }


        /* ==========================================
           TABLE
        ========================================== */

        .admin-table {
            margin: 0;
        }

        .admin-table thead th {
            padding: 13px 15px;

            background: #fafbfc;
            border-bottom: 1px solid var(--mant-border);

            color: var(--mant-muted);

            font-size: .68rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        .admin-table tbody td {
            padding: 15px;

            color: #454d55;
            font-size: .8rem;

            border-bottom: 1px solid #f0f2f4;
            vertical-align: middle;
        }

        .admin-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .admin-table tbody tr:hover {
            background: #fffafd;
        }


        /* ==========================================
           STATUS
        ========================================== */

        .admin-status {
            display: inline-flex;
            align-items: center;

            padding: 5px 10px;

            border-radius: 999px;

            font-size: .65rem;
            font-weight: 900;
        }

        .admin-status-new {
            background: #fff3cd;
            color: #8a6500;
        }

        .admin-status-success {
            background: #dff7e7;
            color: #16713a;
        }

        .admin-status-danger {
            background: #ffe1e5;
            color: #a51d2d;
        }


        /* ==========================================
           FORMS
        ========================================== */

        .admin-form-label {
            color: var(--mant-blue);
            font-size: .76rem;
            font-weight: 850;
            margin-bottom: 7px;
        }

        .admin-form-control,
        .admin-form-select {
            min-height: 45px;

            border: 1px solid #dfe4e8;
            border-radius: 10px;

            font-size: .82rem;

            box-shadow: none !important;
        }

        .admin-form-control:focus,
        .admin-form-select:focus {
            border-color: var(--mant-pink);
        }


        /* ==========================================
           MOBILE
        ========================================== */

        .admin-mobile-toggle {
            display: none;

            border: 0;
            background: transparent;

            color: var(--mant-blue);
            font-size: 1.3rem;
        }

        @media (max-width: 991px) {

            .admin-sidebar {
                transform: translateX(-100%);
                transition: .25s ease;
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                width: 100%;
                margin-left: 0;
            }

            .admin-mobile-toggle {
                display: inline-block;
            }

            .admin-content {
                padding: 20px;
            }

        }

        @media (max-width: 575px) {

            .admin-topbar {
                height: 65px;
                padding: 0 15px;
            }

            .admin-content {
                padding: 15px;
            }

            .admin-page-subtitle {
                display: none;
            }

            .admin-view-site {
                padding: 7px 10px;
                font-size: .7rem;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

<div class="admin-wrapper">


    {{-- SIDEBAR --}}
    <aside class="admin-sidebar" id="adminSidebar">

        <div class="admin-brand">

            <div class="admin-brand-name">
                THE <span>MANTHAN</span><br>
                SCHOOL
            </div>

            <small>
                Administration Panel
            </small>

        </div>


        <nav class="admin-nav">

            <div class="admin-nav-label">
                Main Menu
            </div>


            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-nav-link
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >
                <span class="admin-nav-icon">⌂</span>
                Dashboard
            </a>


            <a
                href="{{ route('admin.news-events.index') }}"
                class="admin-nav-link
                    {{ request()->routeIs('admin.news-events.*') ? 'active' : '' }}"
            >
                <span class="admin-nav-icon">✦</span>
                News & Events
            </a>


            <a
                href="{{ route('admin.enquiries.index') }}"
                class="admin-nav-link
                    {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}"
            >
                <span class="admin-nav-icon">✉</span>
                Enquiries
            </a>

        </nav>


        <div class="admin-sidebar-bottom">

            @auth

                <div class="admin-user">

                    <div class="admin-user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>

                        <div class="admin-user-name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="admin-user-role">
                            Administrator
                        </div>

                    </div>

                </div>

            @endauth


            <form
                method="POST"
                action="{{ route('admin.logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="admin-logout"
                >
                    <span>↪</span>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}
    <main class="admin-main">


        {{-- TOPBAR --}}
        <header class="admin-topbar">

            <div class="d-flex align-items-center gap-3">

                <button
                    type="button"
                    class="admin-mobile-toggle"
                    onclick="toggleAdminSidebar()"
                >
                    ☰
                </button>

                <div>

                    <h1 class="admin-page-title">
                        @yield('page_title', 'Dashboard')
                    </h1>

                    <div class="admin-page-subtitle">
                        The Manthan School Administration
                    </div>

                </div>

            </div>


            <a
                href="{{ route('home') }}"
                target="_blank"
                class="admin-view-site"
            >
                View Website ↗
            </a>

        </header>


        {{-- CONTENT --}}
        <div class="admin-content">

            @if(session('success'))

                <div class="alert alert-success rounded-3">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger rounded-3">
                    {{ session('error') }}
                </div>

            @endif

            @yield('content')

        </div>

    </main>

</div>


<script>

function toggleAdminSidebar()
{
    const sidebar =
        document.getElementById('adminSidebar');

    sidebar.classList.toggle('show');
}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>

</html>