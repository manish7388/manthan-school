@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<div class="mb-4">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">

        <div>

            <div class="text-uppercase fw-bold small"
                 style="color: var(--mant-pink); letter-spacing: 1px;">
                Welcome back
            </div>

            <h2 class="fw-bold mb-1"
                style="color: var(--mant-blue);">
                {{ auth()->user()->name }}
            </h2>

            <p class="text-muted mb-0">
                Here's what's happening across your school website.
            </p>

        </div>

        <a
            href="{{ route('admin.news-events.create') }}"
            class="btn btn-admin-primary"
        >
            + Add News / Event
        </a>

    </div>

</div>


{{-- STATS --}}
<div class="row g-4 mb-4">

    <div class="col-sm-6 col-xl-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                News & Events
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\NewsEvent::count() }}
            </div>

            <div class="admin-stat-icon">
                ✦
            </div>

        </div>

    </div>


    <div class="col-sm-6 col-xl-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                Published
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\NewsEvent::where('is_published', true)->count() }}
            </div>

            <div class="admin-stat-icon">
                ✓
            </div>

        </div>

    </div>


    <div class="col-sm-6 col-xl-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                Enquiries
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\Enquiry::count() }}
            </div>

            <div class="admin-stat-icon">
                ✉
            </div>

        </div>

    </div>

</div>


{{-- QUICK ACTIONS --}}
<div class="row g-4 mb-4">

    <div class="col-lg-7">

        <div class="admin-card h-100">

            <div class="admin-card-header">

                <h3 class="admin-card-title">
                    Quick Actions
                </h3>

            </div>

            <div class="admin-card-body">

                <div class="row g-3">

                    <div class="col-md-6">

                        <a
                            href="{{ route('admin.news-events.create') }}"
                            class="d-block p-4 rounded-4"
                            style="background:#fff0f6;"
                        >

                            <div class="fs-4 mb-2">
                                ✦
                            </div>

                            <strong style="color:var(--mant-blue);">
                                Add News / Event
                            </strong>

                            <div class="small text-muted mt-1">
                                Create a new website update.
                            </div>

                        </a>

                    </div>


                    <div class="col-md-6">

                        <a
                            href="{{ route('admin.enquiries.index') }}"
                            class="d-block p-4 rounded-4"
                            style="background:#eef7ff;"
                        >

                            <div class="fs-4 mb-2">
                                ✉
                            </div>

                            <strong style="color:var(--mant-blue);">
                                View Enquiries
                            </strong>

                            <div class="small text-muted mt-1">
                                Manage admission enquiries.
                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="col-lg-5">

        <div class="admin-card h-100">

            <div class="admin-card-header">

                <h3 class="admin-card-title">
                    Website
                </h3>

            </div>

            <div class="admin-card-body">

                <p class="text-muted small">
                    Your public website is connected with
                    this administration panel.
                </p>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="btn btn-admin-outline"
                >
                    Open Website ↗
                </a>

            </div>

        </div>

    </div>

</div>

@endsection