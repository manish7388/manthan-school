<div class="row">

    {{-- Title --}}
    <div class="col-md-8 mb-3">
        <label for="title" class="form-label">
            Title <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $newsEvent->title ?? '') }}"
            placeholder="Enter news/event title"
            required
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Category --}}
    <div class="col-md-4 mb-3">
        <label for="category" class="form-label">
            Category <span class="text-danger">*</span>
        </label>

        <select
            name="category"
            id="category"
            class="form-select @error('category') is-invalid @enderror"
            required
        >
            <option value="">Select Category</option>

            <option value="News"
                {{ old('category', $newsEvent->category ?? '') === 'News' ? 'selected' : '' }}>
                News
            </option>

            <option value="Event"
                {{ old('category', $newsEvent->category ?? '') === 'Event' ? 'selected' : '' }}>
                Event
            </option>

            <option value="Achievement"
                {{ old('category', $newsEvent->category ?? '') === 'Achievement' ? 'selected' : '' }}>
                Achievement
            </option>
        </select>

        @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Date --}}
    <div class="col-md-4 mb-3">
        <label for="date" class="form-label">
            Date <span class="text-danger">*</span>
        </label>

        <input
            type="date"
            name="date"
            id="date"
            class="form-control @error('date') is-invalid @enderror"
            value="{{ old('date', isset($newsEvent) && $newsEvent->date ? $newsEvent->date->format('Y-m-d') : '') }}"
            required
        >

        @error('date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Image --}}
    <div class="col-md-8 mb-3">
        <label for="image" class="form-label">
            Image
        </label>

        <input
            type="file"
            name="image"
            id="image"
            class="form-control @error('image') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
        >

        <div class="form-text">
            JPG, PNG or WebP. Maximum size: 2MB.
        </div>

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @if(isset($newsEvent) && $newsEvent->image)

            <div class="mt-3">

                <p class="small text-muted mb-2">
                    Current image:
                </p>

                <img
                    src="{{ asset('storage/' . $newsEvent->image) }}"
                    alt="{{ $newsEvent->title }}"
                    style="width: 150px; height: 100px; object-fit: cover;"
                    class="rounded border"
                >

            </div>

        @endif
    </div>


    {{-- Short Description --}}
    <div class="col-12 mb-3">
        <label for="short_description" class="form-label">
            Short Description
        </label>

        <textarea
            name="short_description"
            id="short_description"
            rows="3"
            class="form-control @error('short_description') is-invalid @enderror"
            placeholder="Enter a short description"
        >{{ old('short_description', $newsEvent->short_description ?? '') }}</textarea>

        @error('short_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Content --}}
    <div class="col-12 mb-3">
        <label for="content" class="form-label">
            Content <span class="text-danger">*</span>
        </label>

        <textarea
            name="content"
            id="content"
            rows="8"
            class="form-control @error('content') is-invalid @enderror"
            placeholder="Enter full content"
            required
        >{{ old('content', $newsEvent->content ?? '') }}</textarea>

        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Published --}}
    <div class="col-12 mb-4">

        <div class="form-check">

            <input
                type="checkbox"
                name="is_published"
                value="1"
                id="is_published"
                class="form-check-input"
                {{ old('is_published', $newsEvent->is_published ?? false) ? 'checked' : '' }}
            >

            <label
                for="is_published"
                class="form-check-label"
            >
                Published
            </label>

        </div>

        <div class="form-text">
            Uncheck this option to save the item as a draft.
        </div>

    </div>


    {{-- Buttons --}}
    <div class="col-12">

        <button type="submit" class="btn btn-primary">
            {{ $buttonText ?? 'Save' }}
        </button>

        <a
            href="{{ route('admin.news-events.index') }}"
            class="btn btn-outline-secondary ms-2"
        >
            Cancel
        </a>

    </div>

</div>