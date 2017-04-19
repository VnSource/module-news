<?php namespace VnsModules\News;

use Illuminate\Support\ServiceProvider;
use VnSource\Traits\ModuleServiceProviderTrait;

class ModuleServiceProvider extends ServiceProvider
{
    use ModuleServiceProviderTrait;

    public $hookView = [
        'admin.layout' => 'hook.admin'
    ];
    public $permissions = [
        'news' => 'News management',
        'news_cat' => 'News Category management',
    ];
    public $castPost = [
        'VnsModules\News\News' => 'VnsModules\News\Controllers\NewsController'
    ];
    public $castCategory = [
        'VnsModules\News\NewsCategory' => 'VnsModules\News\Controllers\NewsController'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initializationModule();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            NewsRepositoryInterface::class,
            NewsRepository::class
        );
    }
}
