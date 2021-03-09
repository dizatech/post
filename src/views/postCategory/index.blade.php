@component('panel.layouts.component', ['title' => 'دسته‌بندی ' . $category->typeLabel])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i> دسته‌بندی {{$category->typeLabel}}</h1>
        <p>این صفحه برای دسته‌بندی {{$category->typeLabel}} است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"> دسته‌بندی {{$category->typeLabel}}</li>
        <li class="breadcrumb-item"><a href="">ثبت دسته‌بندی {{$category->typeLabel}}</a>
        </li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        @component('components.collapse-card', ['id' => '-index', 'show' => 'show', 'title' =>  ' دسته‌بندی '])
                            @slot('body')
                                @component('components.collapse-search')
                                    @slot('form')
                                        <form class="clearfix">
                                            <div class="form-group">
                                                <label for="text-name-input"></label>
                                                <input type="text" class="form-control" id="text-name-input"
                                                       placeholder="نام" .{{$category->typeLabel}}>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-left">جستجو</button>
                                        </form>
                                    @endslot
                                @endcomponent
                                <div class="mt-4">
                                    <a href="{{route($categoryType.'.create')}}" type="button" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> دسته‌بندی {{$category->typeLabel}} جدید</a>
                                </div>
                                @component('components.table')
                                    @slot('thead')
                                            <tr>
                                                <th>شناسه</th>
                                                <th>عنوان</th>
                                                <th>والد</th>
                                                <th>عملیات</th>
                                            </tr>
                                    @endslot
                                    @slot('tbody')
                                        @forelse($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->title}}</td>
                                                    <td>@if($category->parent)
                                                            {{ $category->parent->title }}
                                                        @else
                                                            -
                                                        @endif </td>
                                                    <td>
                                                        <a href="{{route($categoryType.'.edit', $category)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                                        <a href="" class="btn btn-sm btn-danger delete_post_category_ajax" data-post="{{$category->id}}">حذف</a>
                                                    </td>
                                                </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" style="text-align: center">موردی برای نمایش وجود ندارد.</td>
                                            </tr>
                                        @endforelse
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
        </div>
    @endslot

    @slot('script')
    @endslot
@endcomponent
