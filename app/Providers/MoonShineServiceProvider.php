<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\CustomPage;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Utilities\AssetManager;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $moonShineMenu = [];

        foreach (config('menu', []) as $group => $items) {
            $title = str($group);
            $moonShineItems = [];

            foreach ($items as $item) {
                $menuItem = MenuItem::make(
                    $item['label'],
                    CustomPage::make(
                        $item['label'],
                        $item['slug'],
                        fn() => $this->getPageView($item['slug'])
                    )->translatable(),
                    'heroicons.hashtag'
                )->translatable();

                if ($item['badge'] ?? false) {
                    $menuItem->badge(fn() => $item['badge']);
                }

                $moonShineItems[] = $menuItem;
            }

            $moonShineMenu[] = MenuGroup::make(
                $title->before(':')->value(),
                $moonShineItems,
                $title->contains(':') ? $title->after(':')
                    ->prepend('heroicons.')
                    ->value() : 'heroicons.squares-2x2'
            )->translatable();
        }

        app(MoonShine::class)->registerResources($moonShineMenu);

        app(AssetManager::class)->add(['/assets/css/style.css']);
    }

    private function getPageView(string $slug): string
    {
        $view = "pages.".session('change-moonshine-locale', app()->getLocale()).".".str_replace('-', '.', $slug);

        if (!view()->exists($view)) {
            $view = 'translation-in-progress';
        }

        return $view;
    }
}
