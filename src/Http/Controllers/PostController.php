<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Modules\Post\Facades\PostFacade;
use Modules\Post\Http\Requests\PostRequest;
use Modules\Post\Models\Post;
use Plank\Mediable\Media;

class PostController extends Controller
{
    protected $postType;

    public function index(Post $post)
    {
        $post->post_type = $this->postType;

        return view("vendor.post.home.post.index",[
            'posts'       => PostFacade::all($this->postType),
            'postType'    => $this->postType,
            'post'        => $post
        ]);
    }

    public function create()
    {
        $categories = Category::query()->where('parent_id', 0)
            ->where('category_type', $this->postType.'Category')
            ->get();
        $users = User::query()->get();
        $post  = new Post();
        $post->post_type = $this->postType;

        return view("vendor.post.home.post.create", [
            'post'          => $post,
            'categories'    => $categories,
            'postType'      => $this->postType,
            'users'         => $users
        ]);
    }

    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->published_at = $request->publish_date ?? Carbon::now();
        $post->creator_id   = auth()->user()->id;
        $post->slug         = $request->slug;
        $post->save();

        $post->syncMedia($request->featured_image, 'featured_image');
        if($request->has('featured_image')) {
            foreach ($request->featured_image as $index => $feature) {
                Media::query()->whereId($feature)->update([
                    'caption' => $request->featured_image_caption[$index] ?? null
                ]);
            }
        }
        $post->syncMedia($request->video, 'video');

        $post->categories()->sync($request->categories);

        session()->flash('success', ' ثبت '.$post->postTypeLabel.' با موفقیت انجام شد.');
        return redirect()->route($this->postType.'.edit', $post);
    }

    public function edit(Post $post, Category $category)
    {
        $categories = $category->query()->where('parent_id', 0)
            ->where('category_type', $this->postType.'Category')
            ->get();
        $users = User::query()->get();

        /*$selected_categories = old('categories') ? ("[" .implode(",", old('categories') ) . "]") : "";*/
        $post->featured_image = $post->getMedia('featured_image')->pluck('id');
        $post->video = $post->getMedia('video')->pluck('id');

        return view("vendor.post.home.post.edit",[
            'post'          => $post,
            'categories'    => $categories,
            'postType'      => $this->postType,
            'users'         => $users
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->published_at = $request->publish_date;
        $post->save();

        $post->syncMedia($request->featured_image, 'featured_image');
        if($request->has('featured_image')) {
            foreach ($request->featured_image as $index => $feature) {
                Media::query()->whereId($feature)->update([
                    'caption' => $request->featured_image_caption[$index] ?? null
                ]);
            }
        }
        $post->syncMedia($request->video, 'video');

        $post->categories()->sync($request->categories);

        session()->flash('success',$post->postTypeLabel .' با موفقیت ویرایش شد.');
        return redirect()->back();
    }

    public function show()
    {
    }

    public function destroy()
    {
    }

    public function PostDeleteAjax(Post $post)
    {
        $post->delete();
        return response()->json(['status' =>  200]);
    }

}
