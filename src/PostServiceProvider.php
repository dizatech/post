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
                __DIR__.'/assets/js/dizatech_post.js' =>resource_path('js/modules/dizatech_post.js'),
                __DIR__.'/views/frontPost/indexArticles.blade.php' =>resource_path('views/vendor/post/home/indexArticles.blade.php'),
                __DIR__.'/views/frontPost/indexNews.blade.php' =>resource_path('views/vendor/post/home/indexNews.blade.php'),
                __DIR__.'/views/frontPost/indexVideos.blade.php' =>resource_path('views/vendor/post/home/indexVideos.blade.php'),
                __DIR__.'/views/frontPost/showArticle.blade.php' =>resource_path('views/vendor/post/home/showArticle.blade.php'),
                __DIR__.'/views/frontPost/showNew.blade.php' =>resource_path('views/vendor/post/home/showNew.blade.php'),
                __DIR__.'/views/frontPost/showVideo.blade.php' =>resource_path('views/vendor/post/home/showVideo.blade.php'),
         ], 'dizatechPost');

         \ModuleMenu::init('post');
     }
}
