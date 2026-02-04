<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class ClerkPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('clerk')
            ->path('clerk')
            ->login()
            ->topNavigation()
            ->passwordReset()
            ->brandName('Clerk Panel')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->brandLogo('/images/SDAConnect_logo.png')
            ->brandLogoHeight('45px')
            ->profile()
            ->maxContentWidth(true)
            ->topbar()
            ->plugin(
                AuthDesignerPlugin::make()
                    ->login(
                        fn($config) => $config
                            ->media(asset('SDAConnect.png'))
                            ->mediaPosition(MediaPosition::Left)
                            ->mediaSize('65%')
                    )
                    ->passwordReset(
                        fn($config) => $config
                            ->media(asset('SDAConnect.png'))
                            ->mediaPosition(MediaPosition::Left)
                            ->mediaSize('65%')
                    ),
            )
            ->discoverResources(in: app_path('Filament/Clerk/Resources'), for: 'App\Filament\Clerk\Resources')
            ->discoverPages(in: app_path('Filament/Clerk/Pages'), for: 'App\Filament\Clerk\Pages')
            ->pages([
                // Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Clerk/Widgets'), for: 'App\Filament\Clerk\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
