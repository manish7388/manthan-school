<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Manthan School')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta
        name="description"
        content="@yield('meta_description', 'Manthan School - News, Events and Admissions')"
    >

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Frontend CSS -->
    <style>
    :root {
        --mant-pink: #ed0b72;
        --mant-pink-dark: #d60061;
        --mant-blue: #003f73;
        --mant-blue-dark: #002e57;
        --mant-yellow: #ffd33d;
        --mant-light: #fff8fb;
        --mant-text: #202124;
        --mant-muted: #687078;
        --mant-radius: 24px;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        color: var(--mant-text);
        background: #fff;
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

    /* ==============================
       NAVBAR
    ============================== */

    .navbar {
        background: #ffffff;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, .06);
        z-index: 1000;
    }

    .navbar-brand {
        font-size: 1.05rem;
        font-weight: 900;
        line-height: 1;
        color: var(--mant-blue);
    }

    .navbar-brand span {
        color: var(--mant-pink);
    }

    .navbar .nav-link {
        color: #30343b;
        font-size: .82rem;
        font-weight: 700;
        margin: 0 7px;
    }

    .navbar .nav-link:hover {
        color: var(--mant-pink);
    }

    .navbar .btn {
        font-size: .8rem;
        font-weight: 800;
    }

    /* ==============================
       BUTTONS
    ============================== */

    .btn-primary-mant {
        background: var(--mant-pink);
        border: 2px solid var(--mant-pink);
        color: #fff;
        border-radius: 999px;
        padding: 11px 25px;
        font-weight: 800;
    }

    .btn-primary-mant:hover {
        background: #fff;
        border-color: #fff;
        color: var(--mant-pink);
    }

    /* ==============================
       HERO
    ============================== */

    .hero-section {
        min-height: 680px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        color: #fff;

        background:
            linear-gradient(
                90deg,
                rgba(0, 42, 76, .88) 0%,
                rgba(0, 42, 76, .45) 48%,
                rgba(0, 42, 76, .05) 100%
            ),
            url("https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=2000&q=90")
            center/cover no-repeat;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(
                circle at 80% 20%,
                rgba(237, 11, 114, .2),
                transparent 35%
            );
    }

    .min-vh-75 {
        min-height: 680px;
    }

    .hero-eyebrow,
    .section-label {
        display: inline-block;
        font-size: .75rem;
        font-weight: 900;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .hero-eyebrow {
        color: #fff;
    }

    .hero-title {
        font-size: clamp(3rem, 7vw, 6.3rem);
        line-height: .9;
        letter-spacing: -3px;
        font-weight: 950;
        margin-bottom: 25px;
    }

    .hero-text {
        max-width: 520px;
        font-size: 1.1rem;
        line-height: 1.7;
        color: rgba(255,255,255,.9);
    }

    .hero-bottom-wave {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 70px;
        background: #fff;
        clip-path: ellipse(65% 65% at 50% 100%);
    }

    /* ==============================
       SECTIONS
    ============================== */

    .pink-section {
        position: relative;
        overflow: hidden;
        background: var(--mant-pink);
    }

    .navy-section {
        position: relative;
        overflow: hidden;
        background: var(--mant-blue);
    }

    .white-section {
        background: #fff;
    }

    .campus-section {
        background: #fff8fb;
    }

    .section-heading {
        max-width: 900px;
        margin: auto;
    }

    .section-title {
        font-size: clamp(2.1rem, 4vw, 4rem);
        line-height: .98;
        letter-spacing: -1.5px;
        font-weight: 950;
        margin-bottom: 22px;
    }

    .dark-text {
        color: var(--mant-blue-dark);
    }

    .pink-text {
        color: var(--mant-pink);
    }

    .section-description {
        max-width: 650px;
        color: rgba(255,255,255,.85);
        font-size: 1rem;
        line-height: 1.8;
    }

    .white-section .section-description,
    .campus-section .section-description {
        color: var(--mant-muted);
    }

    /* ==============================
       IMAGES
    ============================== */

    .image-stack {
        position: relative;
        padding: 20px;
    }

    .main-rounded-image {
        width: 100%;
        height: 470px;
        object-fit: cover;
        border-radius: 35px;
        border: 8px solid #fff;
        box-shadow: 0 25px 60px rgba(0,0,0,.15);
    }

    .floating-circle {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        background: var(--mant-yellow);
        position: absolute;
        right: -5px;
        bottom: 0;
        display: grid;
        place-items: center;
        color: var(--mant-blue);
        font-size: 2rem;
        border: 7px solid var(--mant-pink);
    }

    .illustration-card img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 40px;
        transform: rotate(2deg);
        box-shadow: 0 30px 60px rgba(0,0,0,.25);
    }

    .campus-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 35px;
    }

    /* ==============================
       FEATURE CARDS
    ============================== */

    .feature-card {
        height: 100%;
        overflow: hidden;
        border-radius: var(--mant-radius);
        background: #fff;
        box-shadow: 0 15px 45px rgba(0,0,0,.09);
        transition: .3s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 55px rgba(0,0,0,.14);
    }

    .feature-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
    }

    .feature-card-body {
        padding: 25px;
    }

    .feature-card-body > span {
        color: var(--mant-pink);
        font-size: .75rem;
        font-weight: 900;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        font-weight: 900;
        color: var(--mant-blue);
        margin: 8px 0;
    }

    .feature-card p {
        color: var(--mant-muted);
        line-height: 1.7;
        margin: 0;
    }

    /* ==============================
       MINI FEATURES
    ============================== */

    .mini-feature {
        border: 1px solid rgba(255,255,255,.18);
        background: rgba(255,255,255,.07);
        border-radius: 18px;
        padding: 18px;
        height: 100%;
    }

    .mini-feature strong {
        display: block;
        color: var(--mant-yellow);
        font-size: .8rem;
        margin-bottom: 8px;
    }

    .mini-feature span {
        color: #fff;
        font-weight: 700;
    }

    /* ==============================
       NEWS
    ============================== */

    .news-card {
        height: 100%;
        overflow: hidden;
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 15px 45px rgba(0,0,0,.08);
        transition: .3s ease;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 55px rgba(0,0,0,.13);
    }

    .news-image-wrapper {
        height: 245px;
        position: relative;
        overflow: hidden;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.06);
    }

    .news-category {
        position: absolute;
        left: 16px;
        top: 16px;
        background: var(--mant-pink);
        color: #fff;
        padding: 7px 13px;
        border-radius: 999px;
        font-size: .7rem;
        font-weight: 900;
        text-transform: uppercase;
    }

    .news-body {
        padding: 25px;
    }

    .news-date {
        color: var(--mant-pink);
        font-size: .75rem;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 9px;
    }

    .news-body h3 {
        color: var(--mant-blue);
        font-size: 1.35rem;
        line-height: 1.2;
        font-weight: 900;
    }

    .news-body p {
        color: var(--mant-muted);
        line-height: 1.7;
    }

    .read-more {
        color: var(--mant-pink);
        font-size: .85rem;
        font-weight: 900;
    }

    /* ==============================
       EVENT DIARY
    ============================== */

    .event-diary-card {
        display: block;
        height: 340px;
        position: relative;
        overflow: hidden;
        border-radius: 25px;
        background: #111;
    }

    .event-diary-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s ease;
    }

    .event-diary-card:hover img {
        transform: scale(1.08);
    }

    .event-overlay {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 60px 25px 25px;
        color: #fff;
        background: linear-gradient(
            transparent,
            rgba(0,0,0,.85)
        );
    }

    .event-overlay span {
        font-size: .72rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .event-overlay h3 {
        margin: 5px 0 0;
        font-size: 1.35rem;
        font-weight: 900;
    }

    /* ==============================
       SAFETY
    ============================== */

    .safety-card {
        text-align: center;
        height: 100%;
        padding: 30px 20px;
        border-radius: 25px;
        background: #fff8fb;
        border: 1px solid #f5dce9;
    }

    .safety-icon {
        width: 70px;
        height: 70px;
        display: grid;
        place-items: center;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: var(--mant-pink);
        font-size: 1.8rem;
    }

    .safety-card h3 {
        color: var(--mant-blue);
        font-size: 1.1rem;
        font-weight: 900;
    }

    .safety-card p {
        color: var(--mant-muted);
        font-size: .9rem;
        line-height: 1.7;
    }

    /* ==============================
       EMPTY
    ============================== */

    .empty-state {
        padding: 50px;
        text-align: center;
        background: #fff8fb;
        border-radius: 25px;
    }

    .empty-state.light {
        background: rgba(255,255,255,.1);
        color: #fff;
    }

    /* ==============================
       CTA
    ============================== */

    .cta-section {
        background:
            radial-gradient(
                circle at 85% 30%,
                rgba(237,11,114,.35),
                transparent 30%
            ),
            var(--mant-blue);
    }

    /* ==============================
       FOOTER
    ============================== */

    .site-footer {
        background: var(--mant-blue-dark);
        color: rgba(255,255,255,.8);
        padding: 60px 0 25px;
    }

    .site-footer h5 {
        color: #fff;
        font-weight: 900;
    }

    .site-footer a {
        color: rgba(255,255,255,.7);
    }

    .site-footer a:hover {
        color: #fff;
    }

    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 991px) {

        .hero-section,
        .min-vh-75 {
            min-height: 620px;
        }

        .hero-title {
            font-size: clamp(3rem, 12vw, 5rem);
        }

        .main-rounded-image {
            height: 380px;
        }

        .illustration-card img {
            height: 380px;
        }

        .campus-image {
            height: 350px;
        }
    }

    @media (max-width: 767px) {

        .hero-section,
        .min-vh-75 {
            min-height: 600px;
        }

        .hero-title {
            font-size: 3.3rem;
            letter-spacing: -2px;
        }

        .section-title {
            font-size: 2.3rem;
        }

        .hero-bottom-wave {
            height: 45px;
        }

        .main-rounded-image {
            height: 320px;
        }

        .illustration-card img {
            height: 300px;
        }

        .news-image-wrapper {
            height: 220px;
        }

        .event-diary-card {
            height: 280px;
        }

        .campus-image {
            height: 280px;
        }

        .navbar .btn {
            margin-top: 8px;
        }
    }

    /* ==========================================
   INNER PAGE HERO
========================================== */

.inner-hero {
    min-height: 500px;
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
    color: #fff;
}

.inner-hero-news {
    background:
        linear-gradient(
            90deg,
            rgba(0, 48, 86, .94),
            rgba(0, 48, 86, .55),
            rgba(0, 48, 86, .15)
        ),
        url("https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=2000&q=90")
        center/cover no-repeat;
}

.inner-hero-overlay {
    position: absolute;
    inset: 0;
}

.inner-hero-title {
    position: relative;
    font-size: clamp(3.5rem, 8vw, 7rem);
    line-height: .88;
    font-weight: 950;
    letter-spacing: -3px;
    margin: 10px 0 25px;
}

.inner-hero-text {
    position: relative;
    max-width: 580px;
    font-size: 1.05rem;
    line-height: 1.8;
    color: rgba(255,255,255,.88);
}

.inner-wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 65px;
    background: #fff;
    clip-path: ellipse(65% 65% at 50% 100%);
}


/* ==========================================
   NEWS FILTER
========================================== */

.news-filter-box {
    background: #fff8fb;
    border: 1px solid #f4dbe8;
    border-radius: 25px;
    padding: 18px 22px;
}

.filter-title {
    color: var(--mant-blue);
    font-size: .85rem;
    font-weight: 900;
    margin-right: 5px;
}

.filter-pill {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 40px;
    padding: 8px 18px;
    border-radius: 999px;
    border: 1px solid #ead5df;
    color: var(--mant-blue);
    background: #fff;
    font-size: .8rem;
    font-weight: 800;
    transition: .25s ease;
}

.filter-pill:hover {
    border-color: var(--mant-pink);
    color: var(--mant-pink);
}

.filter-pill.active {
    background: var(--mant-pink);
    border-color: var(--mant-pink);
    color: #fff;
}


/* ==========================================
   INNER NEWS CARDS
========================================== */

.inner-news-card {
    height: 100%;
    overflow: hidden;
    background: #fff;
    border-radius: 28px;
    border: 1px solid #edf0f3;
    box-shadow: 0 15px 45px rgba(0,0,0,.07);
    transition: .3s ease;
}

.inner-news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 55px rgba(0,0,0,.12);
}

.inner-news-image {
    height: 270px;
    position: relative;
    overflow: hidden;
}

.inner-news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .4s ease;
}

.inner-news-card:hover .inner-news-image img {
    transform: scale(1.07);
}

.inner-news-category {
    position: absolute;
    top: 18px;
    left: 18px;
    padding: 8px 14px;
    border-radius: 999px;
    background: var(--mant-pink);
    color: #fff;
    font-size: .68rem;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.inner-news-content {
    padding: 26px;
}

.inner-news-date {
    color: var(--mant-pink);
    font-size: .72rem;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .7px;
    margin-bottom: 10px;
}

.inner-news-content h3 {
    color: var(--mant-blue);
    font-size: 1.45rem;
    line-height: 1.2;
    font-weight: 900;
    margin-bottom: 12px;
}

.inner-news-content p {
    color: var(--mant-muted);
    font-size: .92rem;
    line-height: 1.7;
    margin-bottom: 20px;
}

.inner-read-more {
    color: var(--mant-pink);
    font-size: .82rem;
    font-weight: 900;
}

.inner-read-more span {
    display: inline-block;
    margin-left: 5px;
    transition: .2s ease;
}

.inner-read-more:hover span {
    transform: translateX(5px);
}


/* ==========================================
   EMPTY STATE
========================================== */

.inner-empty-state {
    text-align: center;
    padding: 80px 25px;
    border-radius: 30px;
    background: #fff8fb;
    border: 1px dashed #efbdd4;
}

.empty-icon {
    width: 75px;
    height: 75px;
    display: grid;
    place-items: center;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: var(--mant-pink);
    color: #fff;
    font-size: 2rem;
}

.inner-empty-state h3 {
    color: var(--mant-blue);
    font-weight: 900;
}

.inner-empty-state p {
    color: var(--mant-muted);
}


/* ==========================================
   PAGINATION
========================================== */

.custom-pagination nav {
    display: flex;
    justify-content: center;
}

.custom-pagination .pagination {
    gap: 7px;
}

.custom-pagination .page-link {
    border: 0;
    border-radius: 12px !important;
    color: var(--mant-blue);
    font-weight: 800;
    min-width: 42px;
    text-align: center;
}

.custom-pagination .page-item.active .page-link {
    background: var(--mant-pink);
    color: #fff;
}

.custom-pagination .page-link:hover {
    background: #fff0f6;
    color: var(--mant-pink);
}


/* ==========================================
   INNER CTA
========================================== */

.inner-bottom-cta {
    position: relative;
    overflow: hidden;
}

@media (max-width: 767px) {

    .inner-hero {
        min-height: 480px;
    }

    .inner-hero-title {
        font-size: 3.5rem;
    }

    .inner-news-image {
        height: 230px;
    }

    .filter-title {
        width: 100%;
        margin-bottom: 4px;
    }

    .inner-wave {
        height: 45px;
    }
}
</style>
    @stack('styles')
</head>

<body>

    <!-- Header -->
    <!-- <header class="site-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-3">

                <a href="{{ route('home') }}" class="site-logo">
                    Manthan School
                </a>

                <nav class="main-nav">
                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <a href="{{ route('news-events.index') }}">
                        News & Events
                    </a>

                    <a href="{{ route('enquiries.create') }}">
                        Admission Enquiry
                    </a>
                </nav>

            </div>
        </div>
    </header> -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                THE <span>MANTHAN</span><br>
                SCHOOL
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link"
                        href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="{{ route('news-events.index') }}">
                            News & Events
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="{{ route('enquiries.create') }}">
                            Admissions
                        </a>
                    </li>

                </ul>

                <a href="{{ route('enquiries.create') }}"
                class="btn btn-primary-mant">
                    Enquire Now
                </a>

            </div>

        </div>
    </nav>


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">

            <div class="row g-5">

                <div class="col-lg-5">

                    <h5 class="mb-3">
                        THE MANTHAN SCHOOL
                    </h5>

                    <p>
                        A joyful learning environment where
                        children explore, discover and grow.
                    </p>

                </div>

                <div class="col-6 col-lg-2">

                    <h5>Explore</h5>

                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('news-events.index') }}">
                                News & Events
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('enquiries.create') }}">
                                Admissions
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="col-6 col-lg-2">

                    <h5>Admissions</h5>

                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <a href="{{ route('enquiries.create') }}">
                                Enquire Now
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('enquiries.create') }}">
                                Campus Visit
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-3">

                    <h5>Get In Touch</h5>

                    <p class="mt-3 mb-1">
                        Delhi NCR
                    </p>

                    <p class="mb-0">
                        +91 00000 00000
                    </p>

                </div>

            </div>

            <hr class="border-secondary my-5">

            <div class="d-flex flex-wrap justify-content-between gap-2">
                <small>
                    © {{ date('Y') }} The Manthan School. All rights reserved.
                </small>

                <small>
                    Made with care for curious minds.
                </small>
            </div>

        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>
</html>