@extends('layouts.frontend')

@section('title', $newsEvent->title . ' | Manthan School')

@section(
    'meta_description',
    $newsEvent->short_description ?: $newsEvent->title
)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-9">

                    <!-- Category -->
                    <div class="news-category mb-2">
                        {{ $newsEvent->category }}
                    </div>


                    <!-- Title -->
                    <h1 class="display-5 fw-bold mb-3">
                        {{ $newsEvent->title }}
                    </h1>


                    <!-- Date -->
                    <p class="text-muted mb-4">
                        {{ $newsEvent->date->format('d M Y') }}
                    </p>


                    <!-- Image -->
                    @if($newsEvent->image)

                        <img
                            src="{{ asset('storage/' . $newsEvent->image) }}"
                            alt="{{ $newsEvent->title }}"
                            class="img-fluid rounded mb-4"
                        >

                    @endif


                    <!-- Short Description -->
                    @if($newsEvent->short_description)

                        <p class="lead">
                            {{ $newsEvent->short_description }}
                        </p>

                    @endif


                    <!-- Content -->
                    <div class="mt-4">

                        {!! nl2br(e($newsEvent->content)) !!}

                    </div>


                    <!-- Back -->
                    <div class="mt-5">

                        <a
                            href="{{ route('news-events.index') }}"
                            class="btn btn-outline-primary"
                        >
                            ← Back to News & Events
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection