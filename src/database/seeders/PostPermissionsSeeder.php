<?php

namespace Modules\Post\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('permissions')->where('name','mahamax_posts')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_posts',
                'display_name' => 'مدیریت محتوا',
                'description' => 'دسترسی به مدیریت محتوا',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }

        if (DB::table('permissions')->where('name','mahamax_pages')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_pages',
                'display_name' => 'لیست برگه‌ها',
                'description' => 'دسترسی به لیست برگه‌ها',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
        if (DB::table('permissions')->where('name','mahamax_news')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_news',
                'display_name' => 'لیست خبرها',
                'description' => 'دسترسی به لیست خبرها',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
        if (DB::table('permissions')->where('name','mahamax_news_category')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_news_category',
                'display_name' => 'لیست دسته‌بندی خبرها',
                'description' => 'دسترسی به لیست دسته‌بندی خبرها',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }

        if (DB::table('permissions')->where('name','mahamax_articles')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_articles',
                'display_name' => 'لیست مقاله',
                'description' => 'دسترسی به لیست مقاله',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
        if (DB::table('permissions')->where('name','mahamax_articles_category')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_articles_category',
                'display_name' => 'لیست دسته‌بندی مقاله',
                'description' => 'دسترسی به لیست دسته‌بندی مقاله',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }

        if (DB::table('permissions')->where('name','mahamax_videos')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_videos',
                'display_name' => 'لیست ویدیوها',
                'description' => 'دسترسی به لیست ویدیوها',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
        if (DB::table('permissions')->where('name','mahamax_videos_category')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'mahamax_videos_category',
                'display_name' => 'لیست دسته‌بندی ویدیوها',
                'description' => 'دسترسی به لیست دسته‌بندی ویدیوها',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
        if (DB::table('permissions')->where('name','change_slugs')->count() == 0){
            DB::table('permissions')->insert([
                'name' => 'change_slugs',
                'display_name' => 'تغییر آدرس',
                'description' => 'تغییر آدرس',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }
    }
}
