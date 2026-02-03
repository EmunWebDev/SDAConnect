<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Widgets\AccountWidget;
use Filament\Navigation\NavigationGroup;
use Filament\Widgets\FilamentInfoWidget;
use Openplain\FilamentShadcnTheme\Color;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandLogo('/images/SDAConnect_logo.png')
            ->brandLogoHeight('45px')
            // ->registration()
            ->resourceCreatePageRedirect('index')
            ->resourceEditPageRedirect('index')
            ->profile(isSimple: false)
            ->passwordReset()
            ->colors([
                'primary' => Color::Default,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->multiFactorAuthentication([
                AppAuthentication::make()
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Church Operations'),
                NavigationGroup::make()
                    ->label('Community'),
                NavigationGroup::make()
                    ->label('Systems Management'),
            ])
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
                    )
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
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
