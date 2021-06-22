<?php

namespace Modules\Post\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Modules\Post\Models\Post;

class NewsCategoryController extends PostCategoryController
{

    public function __construct()
    {
        $this->post_type = 'news';
        $this->category_type = 'newsCategory';
    }

    public function userShow($slug)
    {
        $newsCategory = Category::where('category_type', $this->category_type)
            ->where('slug', $slug)->firstOrFail();

        \DB::enableQueryLog();
        $news = Post::where('post_type', $this->post_type);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $news = $news->wherePostStatus('publish');
        };
        $news = $news->whereHas('categories', function( $query ) use ( $newsCategory ){
            $query->where('category_id', $newsCategory->id);
        })->latest()->paginate();

        $title = $newsCategory->title;

        return view('vendor.post.home.indexNews', compact('title', 'news'));
    }
}
