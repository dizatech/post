<?php

namespace Modules\Post\Http\Controllers;


class VideoCategoryController extends PostCategoryController
{

    public function __construct()
    {
        $this->category_type = 'videoCategory';
    }
}
