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
    }
}