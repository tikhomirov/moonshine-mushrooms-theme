<?php

declare(strict_types=1);

namespace Tikhomirov\MoonShineMushroomsTheme\Layouts;

use MoonShine\AssetManager\Css;
use MoonShine\Crud\Components\Fragment;
use MoonShine\Laravel\Components\Layout\Profile;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\UI\Components\Breadcrumbs;
use MoonShine\UI\Components\Layout\Body;
use MoonShine\UI\Components\Layout\BottomBar;
use MoonShine\UI\Components\Layout\Burger;
use MoonShine\UI\Components\Layout\Content;
use MoonShine\UI\Components\Layout\Div;
use MoonShine\UI\Components\Layout\Flash;
use MoonShine\UI\Components\Layout\Footer;
use MoonShine\UI\Components\Layout\Header;
use MoonShine\UI\Components\Layout\Html;
use MoonShine\UI\Components\Layout\Layout;
use MoonShine\UI\Components\Layout\Menu;
use MoonShine\UI\Components\Layout\Sidebar;
use MoonShine\UI\Components\Layout\ThemeSwitcher;
use MoonShine\UI\Components\Layout\Wrapper;
use MoonShine\UI\Components\When;
use Tikhomirov\MoonShineMushroomsTheme\Palettes\MushroomsPalette;
use Tikhomirov\MoonShineMushroomsTheme\Support\ThemeAssetVersion;

class MushroomsThemeLayout extends AppLayout
{
    private const string THEME_NAMESPACE = 'mushrooms-theme';

    /** @var class-string */
    protected ?string $palette = MushroomsPalette::class;

    protected bool $bottomBar = true;

    public function build(): Layout
    {
        return Layout::make([
            Html::make([
                $this->getHeadComponent(),
                Body::make([
                    Wrapper::make([
                        $this->getSidebarComponent(),
                        Div::make([
                            Fragment::make([
                                Flash::make(),
                                $this->getHeaderComponent(),
                                Content::make($this->getContentComponents()),
                                $this->getFooterComponent(),
                            ])->name(self::CONTENT_FRAGMENT_NAME),
                        ])->class('layout-main')
                            ->customAttributes(['id' => self::CONTENT_ID]),
                        When::make(
                            fn (): bool => $this->bottomBar && $this->mobileMode,
                            fn (): array => [$this->getBottomBarComponent()],
                        ),
                    ])
                        ->customView(self::THEME_NAMESPACE . '::components.layout.wrapper'),
                ])
                    ->customView(self::THEME_NAMESPACE . '::components.layout.body'),
            ])
                ->customAttributes(['lang' => $this->getHeadLang()])
                ->withAlpineJs()
                ->when(
                    $this->hasThemes() || $this->isAlwaysDark(),
                    fn (Html $html): Html => $html->withThemes($this->isAlwaysDark()),
                ),
        ]);
    }

    protected function assets(): array
    {
        $cssPath = (string) config(
            'mushrooms-theme.css_path',
            '/vendor/moonshine-mushrooms-theme/admin.css',
        );

        return [
            ...parent::assets(),
            Css::make($cssPath)->version(ThemeAssetVersion::resolve($cssPath)),
        ];
    }

    protected function getSidebarComponent(): Sidebar
    {
        $profile = $this->getProfileComponent();

        return Sidebar::make([
            Fragment::make([
                Div::make([
                    $this->getLogoComponent()->minimized(),
                ])->class('menu-logo'),
                Div::make([
                    When::make(
                        fn (): bool => $this->hasThemes() && ! $this->isAlwaysDark(),
                        static fn (): array => [ThemeSwitcher::make()],
                    ),
                ])->class('menu-actions'),
                Div::make(array_filter([
                    $this->mobileMode ? null : Burger::make()->sidebar(),
                ]))->class('menu-burger'),
            ])->class('menu-header')->name('sidebar-top'),

            Fragment::make([
                Menu::make(),
            ])->class('menu menu--vertical')->name('sidebar-content'),

            Fragment::make([
                $profile,
            ])->class('sidebar-profile')->name('sidebar-profile'),
        ])
            ->collapsed()
            ->customView(self::THEME_NAMESPACE . '::components.layout.sidebar');
    }

    protected function getHeaderComponent(): Header
    {
        $homeLabel = $this->getCore()->getTranslator()->get('moonshine::ui.home');

        if ($homeLabel === 'moonshine::ui.home') {
            $homeLabel = 'Home';
        }

        return Header::make([
            Div::make(array_filter([
                $this->mobileMode ? null : Burger::make(),
            ]))->class('menu-burger'),
            Div::make([
                $this->getLogoComponent(),
            ])->class('mobile-header-logo'),
            Breadcrumbs::make(
                $this->getPage()->getBreadcrumbs(),
            )->prepend(
                $this->getHomeUrl(),
                label: $homeLabel,
            ),
            $this->getSearchComponent(),
        ]);
    }

    protected function getProfileComponent(): Profile
    {
        return Profile::make()
            ->customView(self::THEME_NAMESPACE . '::components.layout.profile');
    }

    protected function getBottomBarComponent(): BottomBar
    {
        return BottomBar::make([
            Menu::make()->top(),
        ]);
    }

    protected function getFooterComponent(): Footer
    {
        return Footer::make()
            ->copyright('')
            ->menu([]);
    }
}
