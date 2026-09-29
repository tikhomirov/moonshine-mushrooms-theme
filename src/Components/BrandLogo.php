<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Components;

use MoonShine\UI\Components\MoonShineComponent;

final class BrandLogo extends MoonShineComponent
{
    protected string $view = 'mushrooms-theme::brand-logo';

    public function __construct(
        private readonly string $href,
        private readonly string $logo,
        private readonly ?string $logoSmall = null,
        private readonly ?string $title = null,
        private readonly bool $minimized = false,
    ) {
        parent::__construct();
    }

    public function minimized(): self
    {
        return new self(
            $this->href,
            $this->logo,
            $this->logoSmall,
            $this->title,
            true,
        );
    }

    /**
     * @return array<string, mixed>
     */
    protected function viewData(): array
    {
        return [
            'href' => $this->href,
            'logo' => $this->logo,
            'logoSmall' => $this->logoSmall,
            'title' => $this->title,
            'minimized' => $this->minimized,
        ];
    }
}
