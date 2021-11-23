<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Post\Models\Post;

class VideoController extends PostController
{

    public function __construct()
    {
        $this->postType = 'video';
    }

    public function userIndex()
    {
        $videos = Post::where('post_type', $this->postType);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $videos = $videos->wherePublishStatus('published');
        }
        $videos = $videos->latest()->paginate(12);
        $title = 'ویدیو';

        return view('vendor.post.home.indexVideos', compact('videos', 'title'));
    }

    public function userShow($video)
    {
        if( !$video instanceof Post ){
            $video = Post::whereSlug($video)->firstOrFail();
        }
        if( $video->publish_status != 'published' && (Auth::guest() || !Auth::user()->is_admin) ){
            abort(404);
        }

        $video->hits = $video->hits + 1;
        $video->save();

        $videos = Post::where('post_type', $this->postType)->latest()->limit(3)->get();

        return view('vendor.post.home.showVideo', compact('video', 'videos'));
    }
}
