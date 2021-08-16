<?php

namespace Modules\Post\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Modules\Post\Models\Post;

class NewsController extends PostController
{

    public function __construct()
    {
        $this->postType = 'news';
    }

    public function userIndex()
    {
        $news = Post::where('post_type', $this->postType);

        if( Auth::guest() || !Auth::user()->is_admin ){
            $news = $news->wherePublishStatus('published');
        }

        $news = $news->latest()->paginate(16);
        $title = "اخبار";

        return view('vendor.post.home.indexNews', compact('news', 'title'));
    }

    public function userShow($slug)
    {
        $news = Post::where('slug', $slug)->firstOrFail();
        if( ( Auth::guest() || !Auth::user()->is_admin ) && $news->publish_status != 'published' ){
            abort(404);
        }

        Post::query()->where('slug', $slug)->update([
            'hits'  => $news->hits + 1
        ]);
        $news->hits = $news->hits + 1;
        $title = $news->title;

        return view('vendor.post.home.showNew', compact('news', 'title'));
    }
}
