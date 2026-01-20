<?php

namespace IndieSystems\AdminLteUiComponents\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use IndieSystems\AdminLteUiComponents\Console\CreateResourceViewsCommand;

class AdminLteUiComponentsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewComponentsAs('AdminLteUiComponents', [
            \IndieSystems\AdminLteUiComponents\Components\Pages\PageHeader::class,
            \IndieSystems\AdminLteUiComponents\Components\Pages\Templates\CreatePage::class,
            \IndieSystems\AdminLteUiComponents\Components\Pages\Templates\EditPage::class,
            \IndieSystems\AdminLteUiComponents\Components\Pages\Templates\IndexPage::class,
            \IndieSystems\AdminLteUiComponents\Components\Pages\Templates\ShowPage::class,
            \IndieSystems\AdminLteUiComponents\Components\Pages\ShowCard::class,
            \IndieSystems\AdminLteUiComponents\Components\Forms\Create::class,
            \IndieSystems\AdminLteUiComponents\Components\Forms\CrudControls::class,
            \IndieSystems\AdminLteUiComponents\Components\Forms\Edit::class,
            \IndieSystems\AdminLteUiComponents\Components\Forms\ModelTable::class,
            \IndieSystems\AdminLteUiComponents\Components\Widgets\CollapsibleCard::class,
            \IndieSystems\AdminLteUiComponents\Components\Widgets\ProgressBar::class,
            \IndieSystems\AdminLteUiComponents\Components\Widgets\InfoBox::class,
            \IndieSystems\AdminLteUiComponents\Components\Widgets\SmallBox::class,
            \IndieSystems\AdminLteUiComponents\Components\Alert::class,
            \IndieSystems\AdminLteUiComponents\Components\ImageGallery::class,
            \IndieSystems\AdminLteUiComponents\Components\Pill::class,
            \IndieSystems\AdminLteUiComponents\Components\Ecommerce\SaasPackage::class,
            \IndieSystems\AdminLteUiComponents\Components\Ecommerce\SaasPackageList::class,
            \IndieSystems\AdminLteUiComponents\Components\Ecommerce\ProductCard::class,
            \IndieSystems\AdminLteUiComponents\Components\Ecommerce\ProductCardList::class,
        ]);

        // if ($this->app->runningInConsole()) {
        //   // Publish view components
        //   $this->publishes([
        //       __DIR__.'/../src/View/Components/' => app_path('View/Components'),
        //       __DIR__.'/../resources/views/components/' => resource_path('views/components'),
        //   ], 'view-components');
        // }

        $this->loadViewsFrom(__DIR__ . '/../views/', 'AdminLteUiComponentsView');
        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateResourceViewsCommand::class,
            ]);

            // Publish view components
            $this->publishes([
                __DIR__ . '/../Components/'        => app_path('View/Components'),
                __DIR__ . '/../views/components/' => resource_path('views/components'),
            ], 'view-components');

            $this->publishes([
                __DIR__ . '/../views/layouts/public.blade.php' => resource_path('views/layouts/public.blade.php'),
                __DIR__ . '/../views/welcome.blade.php' => resource_path('views/welcome.blade.php'),
            ], 'view-layouts-public');
        }
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'middleware' => ['web', 'auth'],
        ];
    }
}
