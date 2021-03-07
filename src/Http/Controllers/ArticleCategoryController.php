<?php


namespace Modules\Post\Http\Controllers;

use App\Models\Category;
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

        $articles = Post::where('post_type', $this->post_type)
            ->whereHas('categories', function( $query ) use ( $category ){
                $query->where('category_id', $category->id);
            })->latest()->paginate();

        $title = $category->title;

        return view('dizatechPost::frontPost.indexArticles', compact('title', 'articles'));
    }
}
