<?php

namespace Modules\Post\Repositories;

use Modules\Post\Models\Post;

class PostRepository
{
    public function all($postType)
    {
        return Post::query()->where('post_type', $postType)->paginate();
    }
}
