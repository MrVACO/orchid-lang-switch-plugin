<?php

declare(strict_types = 1);

namespace MrVaco\LangSwitch;

use Orchid\Platform\Dashboard;
use Orchid\Platform\OrchidServiceProvider;

class LangSwitchServiceProvider extends OrchidServiceProvider
{
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        $this->publish();
        $this->router();
        app('router')->pushMiddlewareToGroup('web', LangSwitchMiddleware::class);
    }

    public function router(): void
    {
        // TODO: тут переписать - https://orchid.software/en/docs/packages/#define-routes
        if ($this->app->routesAreCached()) return;

        app('router')
            ->domain((string) config('platform.domain'))
            ->middleware(config('platform.middleware.private'))
            ->name('lang-switch')
            ->prefix(Dashboard::prefix('lang-switch'))
            ->get('{lang}', LangSwitchController::class);
    }

    protected function publish(): void
    {
        if (!$this->app->runningInConsole()) return;

        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'plugin-config');

        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'plugin-migrations');
    }
}