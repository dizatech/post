<?php

namespace Modules\Post\Http\Controllers;


use Modules\Post\Models\Post;

class ArticleController extends PostController
{
    public function __construct()
    {
        $this->postType = 'article';
    }

    public function userIndex()
    {
        $articles = Post::where('post_type', $this->postType)->latest()->paginate(16);
        $title = "مقالات مفید";

        return view('vendor.post.home.indexArticles' , compact('articles', 'title'));
    }

    public function userShow($slug)
    {
        $article    = Post::where('slug', $slug)->firstOrFail();

        Post::query()->where('slug', $slug)->update([
            'hits' => $article->hits + 1
        ]);

        $article->hits    = $article->hits + 1;

        $articles   = Post::where('post_type', $this->postType)->limit(3)->get();

        return view('vendor.post.home.showArticle' , compact('article', 'articles'));
    }
}
