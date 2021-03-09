<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class PostCategoryController extends Controller
{
    protected $category_type;

    public function index(Category $category)
    {
        $category->category_type = $this->category_type;

        return view('dizatechPost::postCategory.index', [
            'categories'    => Category::where('category_type', $this->category_type)->get(),
            'categoryType'  => $this->category_type,
            'category'      => $category
        ]);
    }

    public function create(Category $category)
    {
        $category->category_type = $this->category_type;
        $postCategory = new Category();

        return view("dizatechPost::postCategory.create", [
            'category'      => $category,
            'categoryType'  => $this->category_type,
            'postCategory'  => $postCategory
        ]);
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = $request->slug;
        $category->creator_id = auth()->user()->id;
        $category->category_type = $this->category_type;
        $category->save();

        session()->flash('success', 'ثبت دسته‌بندی ' . $category->typeLabel . ' با موفقیت انجام شد');
        return redirect()->route($this->category_type . '.edit', $category);
    }

    public function show($id)
    {
    }

    public function edit(Category $postCategory)
    {
        $category = $postCategory->query()->where('parent_id', 0)
            ->where('category_type', $this->category_type.'Category')
            ->get();

        return view("dizatechPost::postCategory.edit", [
            'postCategory'  => $postCategory,
            'categoryType'  => $this->category_type,
            'category'      => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $postCategory)
    {
        $postCategory->fill($request->all());
        $postCategory->save();

        session()->flash('success', $postCategory->typeLabel. ' با موفقیت ویرایش شد.');
        return redirect()->back();
    }

    public function destroy($id)
    {
    }

    public function PostCategoryAjax(Category $postCategory)
    {
        $postCategory->delete();
        return response()->json([ 'status' => 200 ]);
    }
}
