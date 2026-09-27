@extends('layouts.admin')

@section('title', 'Edit News & Event')

@section('content')

<div class="mb-4">
    <h1 class="h3 mb-1">Edit News & Event</h1>

    <p class="text-muted mb-0">
        Update this news, event or achievement.
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('admin.news-events.update', $newsEvent) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')

            @include('admin.news-events._form', [
                'buttonText' => 'Update'
            ])

        </form>

    </div>

</div>

@endsection