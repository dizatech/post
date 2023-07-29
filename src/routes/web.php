<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Models\Post;

if( config('dizatech_post.manage_panel_routes') ){
    Route::group([
        'namespace'  => 'Modules\Post\Http\Controllers',
        'prefix'     => 'panel',
        'middleware' => ['web', 'auth', 'verified']
    ], function () {
        Route::resource('page', 'PageController')->parameters([
            'page'          => 'post'
        ]);
        Route::resource('article', 'ArticleController')->parameters([
            'article'      => 'post'
        ]);
        Route::resource('news', 'NewsController')->parameters([
            'news'         => 'post'
        ]);
        Route::resource('video', 'VideoController')->parameters([
            'video'        => 'post'
        ]);
        Route::resource('articleCategory', 'ArticleCategoryController')->parameters([
            'articleCategory'   => 'postCategory'
        ]);
        Route::resource('newsCategory', 'NewsCategoryController')->parameters([
            'newsCategory' => 'postCategory'
        ]);
        Route::resource('videoCategory', 'VideoCategoryController')->parameters([
            'videoCategory' => 'postCategory'
        ]);
        Route::delete('/post/delete_post_ajax/{post}', 'PostController@PostDeleteAjax');
        Route::delete('/post/delete_post_category_ajax/{postCategory}', 'PostCategoryController@PostCategoryAjax');
    });
}

if( config('dizatech_post.manage_home_routes') ){
    Route::group([
        'namespace' => 'Modules\Post\Http\Controllers',
        'middleware' => ['web']
    ], function () {
        //post type indices
        Route::get(config('dizatech_post.news_archive_url'), 'NewsController@userIndex')->name('news.user_index');
        Route::get(config('dizatech_post.article_archive_url'), 'ArticleController@userIndex')->name('articles.user_index');
        Route::get(config('dizatech_post.video_archive_url'), 'VideoController@userIndex')->name('videos.user_index');

        //post type singles
        Route::get(config('dizatech_post.news_base_url') . '/{slug}', 'NewsController@userShow')->name('news.user_show');
        Route::get(config('dizatech_post.article_base_url') . '/{slug}', 'ArticleController@userShow')->name('generic_show');
        Route::get(config('dizatech_post.video_base_url') . '/{slug}', 'VideoController@userShow')->name('video.user_show');
        Route::get(config('dizatech_post.page_base_url') . '/{slug}', 'PageController@userShow')->name('page.user_show');
        Route::get(config('dizatech_post.video_category_base_url'). '/{slug}','VideoController@videoCategory')->name('video.category');

        //post type catgories
        Route::get('اخبار/دسته-بندی/' . '{slug}', 'NewsCategoryController@userShow')->name('news_category.user_show');
        Route::get('مقالات/دسته-بندی/' . '{slug}', 'ArticleCategoryController@userShow')->name('article_category.user_show');
    });
}
