<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Setting;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use FilamentQuickCreate\Facades\QuickCreate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $brandName = Setting::where('key', 'Title_Website')->first()->value;
        $brandLogo = 'storage/' . Media::where('title', 'Logo Web')->first()->image;
        config(['filament.brand' => $brandName]);
        config(['filament.favicon' => $brandLogo]);

        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');

            QuickCreate::excludes([
                \App\Filament\Resources\KecamatanResource::class,
                \App\Filament\Resources\SettingResource::class,
                \App\Filament\Resources\OrganisasiResource::class,
                \App\Filament\Resources\PendidikanResource::class,
                \App\Filament\Resources\RiwayatHidupResource::class,
                \App\Filament\Resources\UserResource::class,
                \App\Filament\Resources\AspirasiResource::class,
                \App\Filament\Resources\MediaResource::class,
            ]);

            Filament::registerNavigationItems([
                NavigationItem::make('visit_website')
                    ->label('Kunjungi Website')
                    ->url(route('welcome'), shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->activeIcon('heroicon-s-globe-alt')
                    ->group('Website')
                    ->sort(1),
            ]);
        });
    }
}
