<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Components;

use MoonShine\UI\Components\MoonShineComponent;

/**
 * Application name rendered next to the logo in the sidebar header.
 */
final class BrandTitle extends MoonShineComponent
{
    protected string $view = 'mushrooms-theme::brand-title';

    public function __construct(
        private readonly string $title,
    ) {
        parent::__construct();
    }

    public function isRenderable(): bool
    {
        return $this->title !== '';
    }

    /**
     * @return array<string, mixed>
     */
    protected function viewData(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
