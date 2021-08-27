<?php

namespace Modules\Post\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Modules\Post\Http\Requests\PostRequest;
use Modules\Post\Models\Post;

class PageController extends PostController
{
    public function __construct()
    {
        $this->postType = 'page';
    }

    public function create()
    {
        return abort(403);
    }

    public function store(PostRequest $request, Post $post)
    {
        return abort(403);
    }

    public function userShow($slug)
    {
        $page = Post::where('slug', $slug)->firstOrFail();

        Post::query()->where('slug', $slug)->update([
            'hits'  => $page->hits + 1
        ]);
        $page->hits = $page->hits + 1;
        $title = $page->title;

        return view('vendor.post.home.showPage', compact('page', 'title'));
    }
}
