<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Palettes;

use MoonShine\Contracts\ColorManager\PaletteContract;

final class MushroomsPalette implements PaletteContract
{
    public function getDescription(): string
    {
        return 'Mushrooms palette for MoonShine';
    }

    public function getColors(): array
    {
        return [
            'body'           => 'oklch(97.4% 0.006 220)',
            'primary'        => 'oklch(24.5% 0.042 240)',
            'primary-text'   => 'oklch(100% 0 0)',
            'secondary'      => 'oklch(72% 0.11 130)',
            'secondary-text' => 'oklch(24.5% 0.042 240)',
            'success'        => 'oklch(71% 0.12 135)',
            'success-text'   => 'oklch(38% 0.08 135)',
            'warning'        => 'oklch(79% 0.14 85)',
            'warning-text'   => 'oklch(42% 0.08 75)',
            'error'          => 'oklch(64% 0.17 25)',
            'error-text'     => 'oklch(42% 0.12 25)',
            'info'           => 'oklch(75% 0.09 210)',
            'info-text'      => 'oklch(38% 0.07 220)',
            'base'           => [
                'text'    => 'oklch(24.5% 0.042 240)',
                'stroke'  => 'oklch(84% 0.014 220)',
                'default' => 'oklch(100% 0 0)',
                50        => 'oklch(97.4% 0.006 220)',
                100       => 'oklch(93.5% 0.012 220)',
                200       => 'oklch(89% 0.018 220)',
                300       => 'oklch(82% 0.025 220)',
                400       => 'oklch(67% 0.035 220)',
                500       => 'oklch(51% 0.04 225)',
                600       => 'oklch(42% 0.042 230)',
                700       => 'oklch(34% 0.043 235)',
                800       => 'oklch(28% 0.042 240)',
                900       => 'oklch(24.5% 0.042 240)',
            ],
        ];
    }

    public function getDarkColors(): array
    {
        return [
            'body'           => 'oklch(16% 0.025 235)',
            'primary'        => 'oklch(91% 0.02 150)',
            'primary-text'   => 'oklch(16% 0.04 150)',
            'secondary'      => 'oklch(73% 0.1 135)',
            'secondary-text' => 'oklch(20% 0.03 235)',
            'success'        => 'oklch(72% 0.11 135)',
            'success-text'   => 'oklch(88% 0.07 135)',
            'warning'        => 'oklch(80% 0.13 85)',
            'warning-text'   => 'oklch(91% 0.06 85)',
            'error'          => 'oklch(67% 0.15 25)',
            'error-text'     => 'oklch(80% 0.1 25)',
            'info'           => 'oklch(74% 0.09 210)',
            'info-text'      => 'oklch(86% 0.05 210)',
            'base'           => [
                'text'    => 'oklch(94% 0.012 180)',
                'stroke'  => 'oklch(30% 0.026 230)',
                'default' => 'oklch(20% 0.03 235)',
                50        => 'oklch(21% 0.03 235)',
                100       => 'oklch(24% 0.03 235)',
                200       => 'oklch(28% 0.03 230)',
                300       => 'oklch(34% 0.034 225)',
                400       => 'oklch(42% 0.038 220)',
                500       => 'oklch(52% 0.04 215)',
                600       => 'oklch(63% 0.036 210)',
                700       => 'oklch(74% 0.028 205)',
                800       => 'oklch(84% 0.02 195)',
                900       => 'oklch(92% 0.014 185)',
            ],
        ];
    }
}
