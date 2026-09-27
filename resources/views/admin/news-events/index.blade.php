@extends('layouts.admin')

@section('title', 'News & Events')
@section('page_title', 'News & Events')

@section('content')

<div class="mb-4">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">

        <div>

            <div class="text-uppercase fw-bold small"
                 style="color: var(--mant-pink); letter-spacing: 1px;">
                Content Management
            </div>

            <h2 class="fw-bold mb-1"
                style="color: var(--mant-blue);">
                News & Events
            </h2>

            <p class="text-muted mb-0">
                Manage the stories, events and achievements displayed on the website.
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


{{-- SUMMARY --}}
<div class="row g-4 mb-4">

    <div class="col-md-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                Total Items
            </div>

            <div class="admin-stat-number">
                {{ $newsEvents->total() }}
            </div>

            <div class="admin-stat-icon">
                ✦
            </div>

        </div>

    </div>


    <div class="col-md-4">

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


    <div class="col-md-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                This Page
            </div>

            <div class="admin-stat-number">
                {{ $newsEvents->count() }}
            </div>

            <div class="admin-stat-icon">
                #
            </div>

        </div>

    </div>

</div>


{{-- TABLE --}}
<div class="admin-card">

    <div class="admin-card-header">

        <div>

            <h3 class="admin-card-title">
                All News & Events
            </h3>

            <div class="small text-muted mt-1">
                Latest content appears first.
            </div>

        </div>

        <span
            class="badge rounded-pill"
            style="background:#fff0f6;color:var(--mant-pink);"
        >
            {{ $newsEvents->total() }} Items
        </span>

    </div>


    <div class="table-responsive">

        <table class="table admin-table align-middle mb-0">

            <thead>

                <tr>

                    <th style="min-width:260px;">
                        Content
                    </th>

                    <th>
                        Category
                    </th>

                    <th>
                        Date
                    </th>

                    <th>
                        Status
                    </th>

                    <th class="text-end">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($newsEvents as $item)

                    <tr>

                        {{-- CONTENT --}}
                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <div
                                    style="
                                        width:52px;
                                        height:52px;
                                        flex:0 0 52px;
                                        border-radius:13px;
                                        overflow:hidden;
                                        background:#fff0f6;
                                    "
                                >

                                    @if($item->image)

                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->title }}"
                                            style="
                                                width:100%;
                                                height:100%;
                                                object-fit:cover;
                                            "
                                        >

                                    @else

                                        <div
                                            class="w-100 h-100 d-flex align-items-center justify-content-center"
                                            style="
                                                color:var(--mant-pink);
                                                font-weight:900;
                                            "
                                        >
                                            ✦
                                        </div>

                                    @endif

                                </div>


                                <div>

                                    <div
                                        class="fw-bold"
                                        style="color:var(--mant-blue);"
                                    >
                                        {{ \Illuminate\Support\Str::limit($item->title, 55) }}
                                    </div>

                                    <div
                                        class="small text-muted mt-1"
                                    >
                                        /{{ $item->slug }}
                                    </div>

                                </div>

                            </div>

                        </td>


                        {{-- CATEGORY --}}
                        <td>

                            @php
                                $categoryClass = match($item->category) {
                                    'News' => 'background:#eef7ff;color:#00538f;',
                                    'Event' => 'background:#fff0f6;color:#c6005b;',
                                    'Achievement' => 'background:#fff7df;color:#8a6500;',
                                    default => 'background:#f1f3f5;color:#555;',
                                };
                            @endphp

                            <span
                                class="admin-status"
                                style="{{ $categoryClass }}"
                            >
                                {{ $item->category }}
                            </span>

                        </td>


                        {{-- DATE --}}
                        <td>

                            <div
                                class="fw-semibold"
                                style="color:#4d555d;"
                            >
                                {{ $item->date?->format('d M Y') }}
                            </div>

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($item->is_published)

                                <span class="admin-status admin-status-success">
                                    Published
                                </span>

                            @else

                                <span class="admin-status admin-status-new">
                                    Draft
                                </span>

                            @endif

                        </td>


                        {{-- ACTIONS --}}
                        <td>

                            <div class="d-flex justify-content-end gap-2">

                                <a
                                    href="{{ route('admin.news-events.edit', $item) }}"
                                    class="btn-admin-outline"
                                >
                                    Edit
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('admin.news-events.destroy', $item) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm"
                                        style="
                                            border:1px solid #ffd5dc;
                                            color:#b42335;
                                            border-radius:10px;
                                            font-size:.76rem;
                                            font-weight:800;
                                        "
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            <div class="text-center py-5">

                                <div
                                    class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="
                                        width:70px;
                                        height:70px;
                                        border-radius:50%;
                                        background:#fff0f6;
                                        color:var(--mant-pink);
                                        font-size:1.5rem;
                                    "
                                >
                                    ✦
                                </div>

                                <h5
                                    class="fw-bold"
                                    style="color:var(--mant-blue);"
                                >
                                    No News & Events Yet
                                </h5>

                                <p class="text-muted small">
                                    Create your first news or event item.
                                </p>

                                <a
                                    href="{{ route('admin.news-events.create') }}"
                                    class="btn btn-admin-primary"
                                >
                                    + Add News / Event
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    @if($newsEvents->hasPages())

        <div class="p-4 border-top">

            {{ $newsEvents->links() }}

        </div>

    @endif

</div>

@endsection