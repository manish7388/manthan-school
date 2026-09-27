@extends('layouts.frontend')

@section('title', 'News & Events | The Manthan School')

@section('meta_description', 'Explore the latest news, events and achievements from The Manthan School.')

@section('content')

{{-- PAGE HERO --}}
<section class="inner-hero inner-hero-news">

    <div class="inner-hero-overlay"></div>

    <div class="container position-relative">

        <div class="row">
            <div class="col-lg-8">

                <span class="hero-eyebrow">
                    THE MANTHAN SCHOOL
                </span>

                <h1 class="inner-hero-title">
                    NEWS &<br>
                    EVENTS
                </h1>

                <p class="inner-hero-text">
                    Discover the moments, achievements and experiences
                    that make life at Manthan special.
                </p>

            </div>
        </div>

    </div>

    <div class="inner-wave"></div>

</section>


{{-- NEWS & EVENTS --}}
<section class="white-section py-5">

    <div class="container py-lg-5">

        {{-- HEADER --}}
        <div class="row align-items-end mb-5">

            <div class="col-lg-7">

                <span class="section-label pink-text">
                    EXPLORE WHAT'S HAPPENING
                </span>

                <h2 class="section-title dark-text mb-3">
                    MOMENTS THAT<br>
                    MATTER.
                </h2>

                <p class="text-muted mb-0">
                    From school celebrations to student achievements,
                    explore the latest happenings at The Manthan School.
                </p>

            </div>

        </div>


        {{-- FILTER --}}
        <div class="news-filter-box mb-5">

            <div class="d-flex flex-wrap align-items-center gap-2">

                <span class="filter-title">
                    Explore:
                </span>

                <a href="{{ route('news-events.index') }}"
                   class="filter-pill {{ !request('category') ? 'active' : '' }}">
                    All
                </a>

                <a href="{{ route('news-events.index', ['category' => 'News']) }}"
                   class="filter-pill {{ request('category') === 'News' ? 'active' : '' }}">
                    News
                </a>

                <a href="{{ route('news-events.index', ['category' => 'Event']) }}"
                   class="filter-pill {{ request('category') === 'Event' ? 'active' : '' }}">
                    Events
                </a>

                <a href="{{ route('news-events.index', ['category' => 'Achievement']) }}"
                   class="filter-pill {{ request('category') === 'Achievement' ? 'active' : '' }}">
                    Achievements
                </a>

            </div>

        </div>


        {{-- CARDS --}}
        <div class="row g-4">

            @forelse($newsEvents as $item)

                <div class="col-md-6 col-lg-4">

                    <article class="inner-news-card">

                        <div class="inner-news-image">

                            @if($item->image)

                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                >

                            @else

                                <img
                                    src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=85"
                                    alt="{{ $item->title }}"
                                >

                            @endif

                            <span class="inner-news-category">
                                {{ $item->category }}
                            </span>

                        </div>

                        <div class="inner-news-content">

                            <div class="inner-news-date">
                                {{ $item->date?->format('d M Y') }}
                            </div>

                            <h3>
                                {{ $item->title }}
                            </h3>

                            <p>
                                {{ $item->short_description
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($item->content),
                                        130
                                    )
                                }}
                            </p>

                            <a
                                href="{{ route('news-events.show', $item->slug) }}"
                                class="inner-read-more"
                            >
                                Discover More
                                <span>→</span>
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="inner-empty-state">

                        <div class="empty-icon">
                            ✦
                        </div>

                        <h3>
                            Nothing here yet.
                        </h3>

                        <p>
                            New stories and events will appear here soon.
                        </p>

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-primary-mant"
                        >
                            Back Home
                        </a>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        @if($newsEvents->hasPages())

            <div class="custom-pagination mt-5">

                {{ $newsEvents->links() }}

            </div>

        @endif

    </div>

</section>


{{-- CTA --}}
<section class="pink-section inner-bottom-cta">

    <div class="container py-5">

        <div class="row align-items-center g-4">

            <div class="col-lg-8 text-white">

                <span class="section-label">
                    BE PART OF THE JOURNEY
                </span>

                <h2 class="section-title mb-2">
                    WANT TO DISCOVER<br>
                    MANTHAN YOURSELF?
                </h2>

                <p class="mb-0 text-white-50">
                    Take the first step towards your child's
                    joyful learning journey.
                </p>

            </div>

            <div class="col-lg-4 text-lg-end">

                <a
                    href="{{ route('enquiries.create') }}"
                    class="btn btn-light btn-lg rounded-pill px-4"
                >
                    Admission Enquiry
                </a>

            </div>

        </div>

    </div>

</section>

@endsection