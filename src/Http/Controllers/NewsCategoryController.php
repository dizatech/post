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

    public function userShow($category)
    {
        if( !$category instanceof Category ){
            $category = Category::where('category_type', $this->category_type)
                ->where('slug', $category)->firstOrFail();
        }

        $news = Post::where('post_type', $this->post_type);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $news = $news->wherePublishStatus('published');
        };
        $news = $news->whereHas('categories', function( $query ) use ( $category ){
            $query->where('category_id', $category->id);
        })->orderBy('published_at', 'desc')->paginate();

        $title = $category->title;

        return view('vendor.post.home.indexNews', compact('title', 'news', 'category'));
    }
}
