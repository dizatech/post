<?php


namespace Modules\Post\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Modules\Post\Models\Post;

class ArticleCategoryController extends PostCategoryController
{

    public function __construct()
    {
        $this->category_type = 'articleCategory';
        $this->post_type = 'article';
    }

    public function userShow($slug)
    {
        $category = Category::where('category_type', $this->category_type)
            ->where('slug', $slug)->firstOrFail();

        $articles = Post::where('post_type', $this->post_type);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $articles = $articles->wherePostStatus('published');
        };

        $articles = $articles->whereHas('categories', function( $query ) use ( $category ){
            $query->where('category_id', $category->id);
        })->latest()->paginate();

        $title = $category->title;

        return view('vendor.post.home.indexArticles', compact('title', 'articles'));
    }
}
