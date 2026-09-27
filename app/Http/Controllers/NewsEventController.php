<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsEvent::query()
            ->where('is_published', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $newsEvents = $query
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('frontend.news-events.index', compact('newsEvents'));
    }

    public function show(string $slug)
    {
        $newsEvent = NewsEvent::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('frontend.news-events.show', compact('newsEvent'));
    }
}