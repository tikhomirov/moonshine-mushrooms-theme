<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Layouts;

use MoonShine\AssetManager\Css;
use MoonShine\Laravel\Components\Layout\Profile;
use MoonShine\Laravel\Layouts\AppLayout;
use Tikhomirov\MoonShineMushroomsTheme\Palettes\MushroomsPalette;

class MushroomsThemeLayout extends AppLayout
{
    /** @var class-string */
    protected ?string $palette = MushroomsPalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
            Css::make((string) config(
                'mushrooms-theme.css_path',
                '/vendor/moonshine-mushrooms-theme/admin.css',
            )),
        ];
    }

    protected function getProfileComponent(): Profile
    {
        return Profile::make();
    }
}
