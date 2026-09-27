<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsEventRequest;
use App\Http\Requests\UpdateNewsEventRequest;

use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsEventController extends Controller
{
    /**
     * Display a listing of news/events.
     */
    public function index()
    {
        $newsEvents = NewsEvent::orderByDesc('date')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.news-events.index', compact('newsEvents'));
    }

    /**
     * Show the form for creating a new news/event.
     */
    public function create()
    {
        return view('admin.news-events.create');
    }

    /**
     * Store a newly created news/event.
     */
    public function store(StoreNewsEventRequest  $request)
    {
        $validated = $request->validated();

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('news-events', 'public');
        }

        NewsEvent::create($validated);

        return redirect()
            ->route('admin.news-events.index')
            ->with('success', 'News/Event created successfully.');
    }

    /**
     * Show the form for editing the specified news/event.
     */
    public function edit(NewsEvent $newsEvent)
    {
        return view('admin.news-events.edit', compact('newsEvent'));
    }

    /**
     * Update the specified news/event.
     */
    public function update(UpdateNewsEventRequest  $request, NewsEvent $newsEvent)
    {
        $validated = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Regenerate slug if title has changed
        |--------------------------------------------------------------------------
        */
        if ($newsEvent->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $newsEvent->id
            );
        }

        $validated['is_published'] = $request->boolean('is_published');

        /*
        |--------------------------------------------------------------------------
        | Replace old image if a new image is uploaded
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {
            if ($newsEvent->image) {
                Storage::disk('public')->delete($newsEvent->image);
            }

            $validated['image'] = $request->file('image')
                ->store('news-events', 'public');
        }

        $newsEvent->update($validated);

        return redirect()
            ->route('admin.news-events.index')
            ->with('success', 'News/Event updated successfully.');
    }

    /**
     * Remove the specified news/event.
     */
    public function destroy(NewsEvent $newsEvent)
    {
        if ($newsEvent->image) {
            Storage::disk('public')->delete($newsEvent->image);
        }

        $newsEvent->delete();

        return redirect()
            ->route('admin.news-events.index')
            ->with('success', 'News/Event deleted successfully.');
    }

    /**
     * Generate a unique slug.
     */
    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            NewsEvent::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}