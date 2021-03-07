<?php

namespace Modules\Post\database\seeders;

use App\Models\Permission;
use Dizatech\ModuleMenu\Models\ModuleMenu;
use Illuminate\Database\Seeder;

class PostMenuPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahamaxPost = ModuleMenu::where('name', 'post')->first();
//        $mahamaxPostCategory = ModuleMenu::where('name', 'mahamaxPostsCategory')->first();
        $news_index = ModuleMenu::where('name', 'mahamax_news')->first();
        $news_category_index = ModuleMenu::where('name', 'mahamax_news_category')->first();
        $articles_index = ModuleMenu::where('name', 'mahamax_articles')->first();
        $articles_category_index = ModuleMenu::where('name', 'mahamax_articles_category')->first();
        $videos_index = ModuleMenu::where('name', 'mahamax_videos')->first();
        $videos_category_index = ModuleMenu::where('name', 'mahamax_videos_category')->first();

        $mahamaxPost->permissions()->sync(Permission::where('name', 'mahamax_posts')->pluck('id'));
//        $mahamaxPostCategory->permissions()->sync(Permission::where('name', 'mahamax_posts_category')->pluck('id'));
        $news_index->permissions()->sync(Permission::where('name', 'mahamax_news')->pluck('id'));
        $news_category_index->permissions()->sync(Permission::where('name', 'mahamax_news_category')->pluck('id'));
        $articles_index->permissions()->sync(Permission::where('name', 'mahamax_articles')->pluck('id'));
        $articles_category_index->permissions()->sync(Permission::where('name', 'mahamax_articles_category')->pluck('id'));
        $videos_index->permissions()->sync(Permission::where('name', 'mahamax_videos')->pluck('id'));
        $videos_category_index->permissions()->sync(Permission::where('name', 'mahamax_videos_category')->pluck('id'));
    }
}
