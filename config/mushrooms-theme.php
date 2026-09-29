<?php

declare(strict_types=1);

return [
    /*
     |--------------------------------------------------------------------------
     | Application Title
     |--------------------------------------------------------------------------
     |
     | Shows the application name next to the logo in the sidebar header.
     | The text is taken from the MoonShine config (config('moonshine.title')).
     |
     */
    'show_title' => env('MOONSHINE_MUSHROOMS_SHOW_TITLE', true),
    'css_path'            => '/vendor/moonshine-mushrooms-theme/admin.css',
    'avatar_preview_path' => '/vendor/moonshine-mushrooms-theme/avatar-preview.js',
];
