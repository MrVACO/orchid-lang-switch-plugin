<?php

declare(strict_types = 1);

namespace MrVaco\LangSwitch;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Orchid\Support\Facades\Toast;

class LangSwitchController
{
    public function __invoke(string $lang): RedirectResponse
    {
        $languages = config('orchid-lang-switch.languages');

        if (!array_key_exists($lang, $languages))
        {
            Toast::error(__('Localization not found'));

            return redirect()->back();
        }

        $key = auth()->guard(config('platform.guard'))->id() . '.locale';
        Cache::forever($key, $lang);
        app()->setLocale($lang);

        Toast::success(__('Localization changed'));

        return redirect()->back();
    }
}