<?php

declare(strict_types = 1);

namespace MrVaco\LangSwitch;

use Illuminate\Http\RedirectResponse;
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

        auth()->user()->update(['locale' => $lang]);
        app()->setLocale($lang);

        Toast::success(__('Localization changed'));

        return redirect()->back();
    }
}