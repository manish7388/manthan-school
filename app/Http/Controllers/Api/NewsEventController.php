<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsEventResource;
use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    /**
     * Get published news & events.
     */
    public function index(Request $request)
    {
        $query = NewsEvent::query()
            ->where('is_published', true)
            ->orderByDesc('date')
            ->orderByDesc('id');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $newsEvents = $query
            ->paginate(9)
            ->withQueryString();

        return NewsEventResource::collection($newsEvents);
    }

    /**
     * Get a single published news/event by slug.
     */
    public function show(string $slug)
    {
        $newsEvent = NewsEvent::query()
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return new NewsEventResource($newsEvent);
    }
}