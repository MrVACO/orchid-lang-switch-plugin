<?php

declare(strict_types = 1);

namespace MrVaco\LangSwitch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LangSwitchMiddleware
{
    public function handle(Request $request, mixed $next): mixed
    {
        $lang = Cache::get(auth()->guard(config('platform.guard'))->id() . '.locale');

        if ($lang)
            app()->setLocale($lang);

        return $next($request);
    }
}