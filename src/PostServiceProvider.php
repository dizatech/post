<?php

namespace Modules\Post;

use Modules\Post\Facades\PostFacade;
use Modules\Post\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        PostFacade::shouldProxyTo(PostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
     public function boot()
     {
         $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
         $this->loadViewsFrom(__DIR__ . '/views','dizatechPost');
         $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
         $this->publishes([
                __DIR__.'/assets/js/dizatech_post.js' =>resource_path('js/modules'),
         ], 'dizatechPost');

         \ModuleMenu::init('post');
     }
}
