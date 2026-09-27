@extends('layouts.admin')

@section('title', 'Add News & Event')
@section('page_title', 'Add News & Event')

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
                Add News & Event
            </h2>

            <p class="text-muted mb-0">
                Create a new story, event or student achievement.
            </p>

        </div>


        <a
            href="{{ route('admin.news-events.index') }}"
            class="btn-admin-outline"
        >
            ← Back to News & Events
        </a>

    </div>

</div>


<form
    method="POST"
    action="{{ route('admin.news-events.store') }}"
    enctype="multipart/form-data"
>

    @csrf


    <div class="row g-4">


        {{-- MAIN FORM --}}
        <div class="col-lg-8">

            <div class="admin-card mb-4">

                <div class="admin-card-header">

                    <div>

                        <h3 class="admin-card-title">
                            Content Details
                        </h3>

                        <div class="small text-muted mt-1">
                            Add the information that will appear on the website.
                        </div>

                    </div>

                </div>


                <div class="admin-card-body">

                    <div class="mb-4">

                        <label class="admin-form-label">
                            Title *
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="form-control admin-form-control @error('title') is-invalid @enderror"
                            placeholder="Enter news or event title"
                        >

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="admin-form-label">
                                Category *
                            </label>

                            <select
                                name="category"
                                class="form-select admin-form-select @error('category') is-invalid @enderror"
                            >

                                <option value="">
                                    Select category
                                </option>

                                <option
                                    value="News"
                                    {{ old('category') === 'News' ? 'selected' : '' }}
                                >
                                    News
                                </option>

                                <option
                                    value="Event"
                                    {{ old('category') === 'Event' ? 'selected' : '' }}
                                >
                                    Event
                                </option>

                                <option
                                    value="Achievement"
                                    {{ old('category') === 'Achievement' ? 'selected' : '' }}
                                >
                                    Achievement
                                </option>

                            </select>

                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-6">

                            <label class="admin-form-label">
                                Date *
                            </label>

                            <input
                                type="date"
                                name="date"
                                value="{{ old('date') }}"
                                class="form-control admin-form-control @error('date') is-invalid @enderror"
                            >

                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    <div class="mt-4">

                        <label class="admin-form-label">
                            Short Description
                        </label>

                        <textarea
                            name="short_description"
                            rows="4"
                            class="form-control admin-form-control @error('short_description') is-invalid @enderror"
                            placeholder="Write a short description..."
                        >{{ old('short_description') }}</textarea>

                        @error('short_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="small text-muted mt-2">
                            This text can appear on news/event cards.
                        </div>

                    </div>


                    <div class="mt-4">

                        <label class="admin-form-label">
                            Content *
                        </label>

                        <textarea
                            name="content"
                            rows="12"
                            class="form-control admin-form-control @error('content') is-invalid @enderror"
                            placeholder="Write the complete content here..."
                        >{{ old('content') }}</textarea>

                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT SIDEBAR --}}
        <div class="col-lg-4">


            {{-- PUBLISH --}}
            <div class="admin-card mb-4">

                <div class="admin-card-header">

                    <h3 class="admin-card-title">
                        Publishing
                    </h3>

                </div>


                <div class="admin-card-body">

                    <div
                        class="p-3 rounded-4 mb-3"
                        style="background:#f7f9fb;"
                    >

                        <div class="form-check form-switch">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="is_published"
                                name="is_published"
                                value="1"
                                {{ old('is_published', true) ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label fw-bold"
                                for="is_published"
                                style="color:var(--mant-blue);"
                            >
                                Publish this item
                            </label>

                        </div>

                        <div class="small text-muted mt-2">
                            Published items are visible on the public website.
                        </div>

                    </div>

                </div>

            </div>


            {{-- IMAGE --}}
            <div class="admin-card mb-4">

                <div class="admin-card-header">

                    <h3 class="admin-card-title">
                        Featured Image
                    </h3>

                </div>


                <div class="admin-card-body">

                    <div
                        id="imagePreview"
                        class="mb-3 d-none"
                        style="
                            height:190px;
                            border-radius:16px;
                            overflow:hidden;
                            background:#f7f8fb;
                        "
                    >

                        <img
                            id="previewImage"
                            src=""
                            alt="Preview"
                            style="
                                width:100%;
                                height:100%;
                                object-fit:cover;
                            "
                        >

                    </div>


                    <div
                        class="upload-placeholder"
                        id="uploadPlaceholder"
                    >

                        <div
                            class="text-center p-4 rounded-4"
                            style="
                                background:#fff8fb;
                                border:1px dashed #efb7d0;
                            "
                        >

                            <div
                                style="
                                    font-size:2rem;
                                    color:var(--mant-pink);
                                "
                            >
                                ↑
                            </div>

                            <div
                                class="fw-bold mt-2"
                                style="color:var(--mant-blue);"
                            >
                                Upload image
                            </div>

                            <div class="small text-muted mt-1">
                                JPG, PNG or WebP
                            </div>

                            <div class="small text-muted">
                                Maximum 2 MB
                            </div>

                        </div>

                    </div>


                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="form-control admin-form-control mt-3 @error('image') is-invalid @enderror"
                    >

                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- SAVE --}}
            <div class="admin-card">

                <div class="admin-card-body">

                    <button
                        type="submit"
                        class="btn btn-admin-primary w-100 py-3"
                    >
                        Publish / Save News & Event
                    </button>


                    <a
                        href="{{ route('admin.news-events.index') }}"
                        class="btn-admin-outline d-flex justify-content-center mt-2"
                    >
                        Cancel
                    </a>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const input =
        document.getElementById('image');

    const preview =
        document.getElementById('previewImage');

    const previewBox =
        document.getElementById('imagePreview');

    const placeholder =
        document.getElementById('uploadPlaceholder');


    input.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            previewBox.classList.add('d-none');
            placeholder.classList.remove('d-none');

            return;
        }


        const reader =
            new FileReader();


        reader.onload = function (event) {

            preview.src =
                event.target.result;

            previewBox.classList.remove('d-none');
            placeholder.classList.add('d-none');

        };


        reader.readAsDataURL(file);

    });

});

</script>

@endpush