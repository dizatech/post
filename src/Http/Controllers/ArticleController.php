<?php

namespace Modules\Post\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Modules\Post\Models\Post;

class ArticleController extends PostController
{
    public function __construct()
    {
        $this->postType = 'article';
    }

    public function userIndex()
    {
        $articles = Post::where('post_type', $this->postType);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $articles = $articles->wherePublishStatus('published');
        }
        $articles = $articles->orderBy('published_at', 'desc')->paginate(16);
        $title = "مقالات مفید";

        return view('vendor.post.home.indexArticles' , compact('articles', 'title'));
    }

    public function userShow($article)
    {
        if( !$article instanceof Post ){
            $article = Post::whereSlug($article)->firstOrFail();
        }

        if( $article->publish_status != 'published' && (Auth::guest() || !Auth::user()->is_admin) ){
            abort(404);
        }

        $article->hits    = $article->hits + 1;
        $article->save();

        $articles   = Post::where('post_type', $this->postType)->limit(3)->get();

        return view('vendor.post.home.showArticle' , compact('article', 'articles'));
    }
}
