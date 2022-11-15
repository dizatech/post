<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\Auth;

class Helpers{
    public static function canEditSlug()
    {
        return config('dizatech_post.allow_slug_change') && Auth::user()->hasPermission('change_slugs');
    }
}
