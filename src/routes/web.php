<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'Modules\Post\Http\Controllers',
    'middleware' => ['web']
], function () {
    Route::get('/page/{slug}', 'PageController@userShow')->name('page.user_show');

    Route::get('/اخبار', 'NewsController@userIndex')->name('news.user_index');
    Route::get('/اخبار' . '/{slug}', 'NewsController@userShow')->name('news.user_show');
    Route::get('اخبار/دسته-بندی/' . '{slug}', 'NewsCategoryController@userShow')->name('news_category.user_show');

    Route::get('/مقالات', 'ArticleController@userIndex')->name('articles.user_index');
    Route::get('/مقالات' . '/{slug}', 'ArticleController@userShow')->name('article.user_show');
    Route::get('مقالات/دسته-بندی/' . '{slug}', 'ArticleCategoryController@userShow')->name('article_category.user_show');

    Route::get('/ویدیو', 'VideoController@userIndex')->name('videos.user_index');
    Route::get('/ویدیو' . '/{slug}', 'VideoController@userShow')->name('video.user_show');
});


