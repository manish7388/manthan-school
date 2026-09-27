@extends('layouts.frontend')

@section('title', 'The Manthan School | A Childhood Filled With Wonder')

@section('meta_description', 'Discover a joyful learning environment where children learn, explore, create and grow.')

@section('content')

{{-- =========================================================
    HERO
========================================================= --}}
<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-75">

            <div class="col-lg-6">
                <span class="hero-eyebrow">
                    THE MANTHAN SCHOOL
                </span>

                <h1 class="hero-title">
                    A LITTLE<br>
                    WORLD OF BIG<br>
                    BEGINNINGS
                </h1>

                <p class="hero-text">
                    A joyful space where children learn,
                    discover and grow with confidence.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('enquiries.create') }}"
                       class="btn btn-primary-mant">
                        Enquire Now
                    </a>

                    <a href="{{ route('news-events.index') }}"
                       class="btn btn-outline-light rounded-pill px-4">
                        Explore Events
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="hero-bottom-wave"></div>
</section>


{{-- =========================================================
    LEARNING BEGINS
========================================================= --}}
<section class="pink-section py-5">
    <div class="container py-lg-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="image-stack">
                    <img
                        src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1000&q=85"
                        alt="Children learning together"
                        class="main-rounded-image"
                    >

                    <div class="floating-circle">
                        <span>✦</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-white">
                <span class="section-label">
                    OUR APPROACH
                </span>

                <h2 class="section-title">
                    LEARNING BEGINS<br>
                    WITH WONDER.
                </h2>

                <p class="section-description">
                    Every child has a unique way of seeing the world.
                    We create experiences that encourage curiosity,
                    imagination, collaboration and confidence.
                </p>

                <a href="{{ route('enquiries.create') }}"
                   class="btn btn-light rounded-pill px-4">
                    Begin Your Journey
                </a>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    CHILDHOOD
========================================================= --}}
<section class="white-section py-5">
    <div class="container py-lg-5">

        <div class="text-center section-heading">
            <span class="section-label pink-text">
                THE MANTHAN EXPERIENCE
            </span>

            <h2 class="section-title dark-text">
                A CHILDHOOD FILLED WITH<br>
                WONDER, DISCOVERY AND POSSIBILITY.
            </h2>
        </div>

        <div class="row g-4 mt-4">

            <div class="col-md-4">
                <div class="feature-card">
                    <img
                        src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=85"
                        alt="Children exploring"
                    >

                    <div class="feature-card-body">
                        <span>01</span>
                        <h3>Explore</h3>
                        <p>
                            Children learn by asking questions,
                            exploring ideas and discovering new possibilities.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <img
                        src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=85"
                        alt="Children learning"
                    >

                    <div class="feature-card-body">
                        <span>02</span>
                        <h3>Imagine</h3>
                        <p>
                            Creative experiences help children express
                            themselves and turn ideas into reality.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <img
                        src="https://images.unsplash.com/photo-1560785496-3c9d27877182?auto=format&fit=crop&w=800&q=85"
                        alt="Children creating"
                    >

                    <div class="feature-card-body">
                        <span>03</span>
                        <h3>Create</h3>
                        <p>
                            Learning becomes meaningful when children
                            build, collaborate and create together.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    WHY MANTHAN
========================================================= --}}
<section class="navy-section py-5">
    <div class="container py-lg-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6 text-white">
                <span class="section-label">
                    WHY THE MANTHAN SCHOOL
                </span>

                <h2 class="section-title">
                    EXPERIENTIAL LEARNING<br>
                    FOR HOLISTIC GROWTH
                </h2>

                <p class="section-description">
                    We believe learning should go beyond textbooks.
                    Children learn through experiences, conversations,
                    projects, creativity and meaningful relationships.
                </p>

                <div class="row g-3 mt-4">

                    <div class="col-6">
                        <div class="mini-feature">
                            <strong>01</strong>
                            <span>Curiosity-led learning</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-feature">
                            <strong>02</strong>
                            <span>Creative expression</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-feature">
                            <strong>03</strong>
                            <span>Collaborative learning</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-feature">
                            <strong>04</strong>
                            <span>Confident learners</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="illustration-card">
                    <img
                        src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1000&q=85"
                        alt="Children learning"
                    >
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    LATEST NEWS - DYNAMIC
========================================================= --}}
<section class="white-section py-5">
    <div class="container py-lg-5">

        <div class="d-flex flex-wrap justify-content-between
                    align-items-end gap-3 mb-5">

            <div>
                <span class="section-label pink-text">
                    WHAT'S HAPPENING
                </span>

                <h2 class="section-title dark-text mb-0">
                    LATEST NEWS & EVENTS
                </h2>
            </div>

            <a href="{{ route('news-events.index') }}"
               class="btn btn-dark rounded-pill px-4">
                View All
            </a>
        </div>

        <div class="row g-4">

            @forelse($latestNewsEvents as $item)

                <div class="col-md-6 col-lg-4">

                    <article class="news-card">

                        <div class="news-image-wrapper">

                            @if($item->image)
                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    class="news-image"
                                >
                            @else
                                <img
                                    src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=900&q=85"
                                    alt="{{ $item->title }}"
                                    class="news-image"
                                >
                            @endif

                            <span class="news-category">
                                {{ $item->category }}
                            </span>

                        </div>

                        <div class="news-body">

                            <div class="news-date">
                                {{ $item->date?->format('d M Y') }}
                            </div>

                            <h3>
                                {{ $item->title }}
                            </h3>

                            <p>
                                {{ $item->short_description
                                    ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 120)
                                }}
                            </p>

                            <a href="{{ route('news-events.show', $item->slug) }}"
                               class="read-more">
                                Read More →
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">
                    <div class="empty-state">
                        <h4>No news or events available.</h4>
                        <p>Please check back soon.</p>
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>


{{-- =========================================================
    EVENT DIARY - DYNAMIC
========================================================= --}}
<section class="pink-section py-5">
    <div class="container py-lg-5">

        <div class="d-flex flex-wrap justify-content-between
                    align-items-end gap-3 mb-5">

            <div class="text-white">
                <span class="section-label">
                    EVENT DIARY
                </span>

                <h2 class="section-title mb-0">
                    MOMENTS WORTH<br>
                    REMEMBERING.
                </h2>
            </div>

            <a href="{{ route('news-events.index') }}"
               class="btn btn-light rounded-pill px-4">
                See All Events
            </a>

        </div>

        <div class="row g-4">

            @forelse($eventDiary as $event)

                <div class="col-md-6 col-lg-4">

                    <a href="{{ route('news-events.show', $event->slug) }}"
                       class="event-diary-card">

                        @if($event->image)

                            <img
                                src="{{ asset('storage/' . $event->image) }}"
                                alt="{{ $event->title }}"
                            >

                        @else

                            <img
                                src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=900&q=85"
                                alt="{{ $event->title }}"
                            >

                        @endif

                        <div class="event-overlay">
                            <span>
                                {{ $event->date?->format('d M Y') }}
                            </span>

                            <h3>
                                {{ $event->title }}
                            </h3>
                        </div>

                    </a>

                </div>

            @empty

                <div class="col-12">
                    <div class="empty-state light">
                        <h4>No events available.</h4>
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>


{{-- =========================================================
    SAFETY
========================================================= --}}
<section class="white-section py-5">
    <div class="container py-lg-5">

        <div class="text-center section-heading">

            <span class="section-label pink-text">
                CARE BEYOND CLASSROOMS
            </span>

            <h2 class="section-title dark-text">
                HOW WE KEEP<br>
                YOUR CHILD SAFE
            </h2>

        </div>

        <div class="row g-4 mt-4">

            @php
                $safetyFeatures = [
                    ['icon' => '🛡️', 'title' => 'Safe campus', 'text' => 'A secure environment designed around children.'],
                    ['icon' => '👩‍🏫', 'title' => 'Caring adults', 'text' => 'Supportive educators who know every child matters.'],
                    ['icon' => '🏫', 'title' => 'Child-first spaces', 'text' => 'Thoughtfully designed spaces for everyday learning.'],
                    ['icon' => '❤️', 'title' => 'Wellbeing', 'text' => 'Emotional and physical wellbeing remain a priority.'],
                ];
            @endphp

            @foreach($safetyFeatures as $feature)

                <div class="col-6 col-lg-3">

                    <div class="safety-card">

                        <div class="safety-icon">
                            {{ $feature['icon'] }}
                        </div>

                        <h3>
                            {{ $feature['title'] }}
                        </h3>

                        <p>
                            {{ $feature['text'] }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>


{{-- =========================================================
    CTA
========================================================= --}}
<section class="navy-section cta-section py-5">
    <div class="container py-5">

        <div class="row align-items-center g-4">

            <div class="col-lg-8 text-white">

                <span class="section-label">
                    BEGIN THE JOURNEY
                </span>

                <h2 class="section-title mb-3">
                    BRING YOUR CHILD'S<br>
                    WORLD TO LIFE.
                </h2>

                <p class="section-description mb-0">
                    Discover a school experience designed around curiosity,
                    confidence and joyful learning.
                </p>

            </div>

            <div class="col-lg-4 text-lg-end">

                <a href="{{ route('enquiries.create') }}"
                   class="btn btn-primary-mant btn-lg">
                    Admission Enquiry
                </a>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    CAMPUS CTA
========================================================= --}}
<section class="campus-section py-5">

    <div class="container py-lg-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <img
                    src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=85"
                    alt="School campus"
                    class="campus-image"
                >

            </div>

            <div class="col-lg-6">

                <span class="section-label pink-text">
                    COME & SEE THE CAMPUS
                </span>

                <h2 class="section-title dark-text">
                    COME AND SEE<br>
                    THE DIFFERENCE.
                </h2>

                <p class="text-muted">
                    Take the first step towards discovering a joyful
                    learning environment for your child.
                </p>

                <a href="{{ route('enquiries.create') }}"
                   class="btn btn-primary-mant mt-3">
                    Book a Campus Visit
                </a>

            </div>

        </div>

    </div>

</section>

@endsection