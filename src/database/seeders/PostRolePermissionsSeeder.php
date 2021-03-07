<?php

namespace Modules\Post\database\seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostRolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programmer = Role::where('name', 'programmer')->first();

        $permissions = DB::table('permissions')->whereIn('name', [
            'mahamax_posts',
            'mahamax_posts_category',
            'mahamax_news',
            'mahamax_news_category',
            'mahamax_videos',
            'mahamax_videos_category',
            'mahamax_articles',
            'mahamax_articles_category',
        ])->get()->pluck('id');
        $programmer->permissions()->sync($permissions, false);
    }
}
