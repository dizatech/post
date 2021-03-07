<?php

namespace Modules\Post\Http\Controllers;

use Modules\Post\Models\Post;

class VideoController extends PostController
{

    public function __construct()
    {
        $this->postType = 'video';
    }

    public function userIndex()
    {
        $videos = Post::where('post_type', $this->postType)->latest()->paginate(12);

        return view('dizatechPost::frontPost.indexVideos', compact('videos'));
    }

    public function userShow($slug)
    {
        $video  = Post::where('slug', $slug)->firstOrFail();

        Post::query()->where('slug', $slug)->update([
            'hits'  => $video->hits + 1
        ]);

        $video->hits = $video->hits + 1;


        $videos = Post::where('post_type', $this->postType)->latest()->limit(3)->get();

        return view('dizatechPost::frontPost.showVideo', compact('video', 'videos'));
    }
}
