<?php

namespace Modules\Post\Http\Controllers;

use App\Models\Category;
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
        $videos = $videos->orderBy('published_at', 'desc')->paginate(12);
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

        $videos = Post::where('post_type', $this->postType)->orderBy('published_at', 'desc')->limit(3)->get();

        return view('vendor.post.home.showVideo', compact('video', 'videos'));
    }

    public function videoCategory($category)
    {
        $video_cat = Category::whereSlug($category)->where('category_type','videoCategory')->first();

        $videos = Post::where('post_type', $this->postType);
        if( Auth::guest() || !Auth::user()->is_admin ){
            $videos = $videos->wherePublishStatus('published');
        }
        $videos->whereHas('categories', function( $query ) use ( $video_cat ){
            $query->where('category_id', $video_cat->id);
        });
        $videos = $videos->orderBy('published_at', 'desc')->paginate(12);
        $title = 'ویدیو';

        return view('vendor.post.home.indexVideos', compact('videos', 'title'));
    }
}
