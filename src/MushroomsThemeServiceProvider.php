<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme;

use Illuminate\Support\ServiceProvider;

final class MushroomsThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mushrooms-theme.php', 'mushrooms-theme');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mushrooms-theme');

        $this->publishes([
            __DIR__ . '/../config/mushrooms-theme.php' => config_path('mushrooms-theme.php'),
        ], 'moonshine-mushrooms-theme-config');

        $this->publishes([
            __DIR__ . '/../resources/css/admin.css' => public_path('vendor/moonshine-mushrooms-theme/admin.css'),
            __DIR__ . '/../resources/avatar-preview.js' => public_path('vendor/moonshine-mushrooms-theme/avatar-preview.js'),
        ], 'moonshine-mushrooms-theme-assets');
    }
}
