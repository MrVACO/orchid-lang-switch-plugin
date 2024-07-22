<?php

declare(strict_types = 1);

namespace MrVaco\LangSwitch;

use Illuminate\Http\Request;

class LangSwitchMiddleware
{
    public function handle(Request $request, mixed $next): mixed
    {
        $locale = auth()->user()?->locale;

        if ($locale)
            app()->setLocale($locale);

        return $next($request);
    }
}