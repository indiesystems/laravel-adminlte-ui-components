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
