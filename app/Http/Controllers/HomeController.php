<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;

class HomeController extends Controller
{
    public function index()
    {
        $latestNewsEvents = NewsEvent::query()
            ->where('is_published', true)
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $eventDiary = NewsEvent::query()
            ->where('is_published', true)
            ->where('category', 'Event')
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        return view('frontend.home', compact(
            'latestNewsEvents',
            'eventDiary'
        ));
    }
}