<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnquiryRateLimit
{
    public function __construct(
        protected RateLimiter $limiter
    ) {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $key = 'enquiry:' . $request->ip();

        if ($this->limiter->tooManyAttempts($key, 5)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many enquiries submitted. Please try again later.',
            ], 429);
        }

        $this->limiter->hit($key, 60);

        return $next($request);
    }
}