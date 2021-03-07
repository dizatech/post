<?php

namespace Modules\Post\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('module_menus')->where('name', 'post')->count() == 0) {
            $mahamaxPost = DB::table('module_menus')->insertGetId([
                'name' => 'post',
                'title' => 'مدیریت محتوا',
                'icon' => 'fa fa-newspaper-o',
                'route' => 'post.index',
                'parent_id' => '0',
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }

        if (DB::table('module_menus')->where('name', 'mahamax_news')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_news',
                'title' => 'خبرها',
                'icon' => 'fa fa-circle-o',
                'route' => 'news.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }
        if (DB::table('module_menus')->where('name', 'mahamax_news_category')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_news_category',
                'title' => 'دسته‌بندی خبرها',
                'icon' => 'fa fa-circle-o',
                'route' => 'newsCategory.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }
        if (DB::table('module_menus')->where('name', 'mahamax_articles')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_articles',
                'title' => 'مقاله',
                'icon' => 'fa fa-circle-o',
                'route' => 'article.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }
        if (DB::table('module_menus')->where('name', 'mahamax_articles_category')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_articles_category',
                'title' => 'دسته‌بندی مقاله‌ها',
                'icon' => 'fa fa-circle-o',
                'route' => 'articleCategory.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }
        if (DB::table('module_menus')->where('name', 'mahamax_videos')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_videos',
                'title' => 'ویدیوها',
                'icon' => 'fa fa-circle-o',
                'route' => 'video.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }
        if (DB::table('module_menus')->where('name', 'mahamax_videos_category')->count() == 0) {
            DB::table('module_menus')->insert([
                'name' => 'mahamax_videos_category',
                'title' => 'دسته‌بندی ویدیوها',
                'icon' => 'fa fa-circle-o',
                'route' => 'videoCategory.index',
                'parent_id' => $mahamaxPost,
                'creator_id' => '1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'deleted_at' => null,
            ]);
        }

    }
}
