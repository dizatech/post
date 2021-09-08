<?php

namespace Modules\Post\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\Post\Models\Post;

class PostRepository
{
    public function all($postType)
    {
        return Post::query()->where('post_type', $postType)->paginate(16);
    }

    public function getFromCategory($postType, $category_id, $count=NULL)
    {
        $query = Post::where('post_type', $postType)
        ->where('publish_status', 'published')
        ->whereHas('categories', function(Builder $query) use ($category_id){
            $query->where('category_id', $category_id);
        })
        ->orderBy('created_at', 'desc');
        if( $count ){
            return $query->take($count)->get();
        }
        else{
            return $query->paginate();
        }
    }
}
