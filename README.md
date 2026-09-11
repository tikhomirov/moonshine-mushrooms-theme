# MoonShine Mushrooms Theme

Independent visual theme for MoonShine 4. It contains the palette, layout asset registration, CSS and optional avatar preview asset. It has no dependency on a particular application, model, resource or menu.

## Requirements

- PHP 8.3+
- MoonShine 4.8+

## Installation

```bash
composer require tikhomirov/moonshine-mushrooms-theme
php artisan vendor:publish --tag=moonshine-mushrooms-theme-config
php artisan vendor:publish --tag=moonshine-mushrooms-theme-assets --force
```

Use the package layout and palette in `config/moonshine.php`:

```php
'layout' => Tikhomirov\MoonShineMushroomsTheme\Layouts\MushroomsThemeLayout::class,
'palette' => Tikhomirov\MoonShineMushroomsTheme\Palettes\MushroomsPalette::class,
```

The layout is intentionally extendable. Applications can inherit it and add their own menu without coupling the theme to application classes.

Theme CSS and JS assets use automatic cache busting via `ThemeAssetVersion`: the published public file mtime is preferred, otherwise the package source mtime or package version from `composer.json`.
