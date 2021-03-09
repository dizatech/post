@component('panel.layouts.component', ['title' =>'لیست ' . $post->postTypePluralLabel])
    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i>لیست {{$post->postTypePluralLabel}}</h1>
        <p>این صفحه برای لیست {{$post->postTypePluralLabel}} است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"> لیست {{$post->postTypePluralLabel}}</li>
        <li class="breadcrumb-item"><a href="{{route($postType.'.create')}}">ثبت {{$post->postTypeLabel}}</a></li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        @component('components.collapse-card',['id' => $postType.'-index', 'show' => 'show','title' => ' لیست '. $post->postTypeLabel])
                            @slot('body')
                                @component('components.collapse-search')
                                    @slot('form')
                                        <form class="clearfix">
                                            <div class="form-group">
                                                <label for="text-name-input">نام {{$post->postTypeLabel }}</label>
                                                <input type="text" class="form-control" id="text-name-input"
                                                       placeholder={{$post->postTypeLabel}}"نام".>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-left">جستجو</button>
                                        </form>
                                    @endslot
                                @endcomponent
                                <div class="mt-4">
                                    <a href="{{route($postType.'.create')}}" type="button" class="btn btn-primary"><i
                                            class="fa fa-plus"></i>{{$post->postTypeLabel}} جدید</a>
                                </div>
                                @component('components.table')
                                    @slot('thead')
                                        <tr>
                                            <th>شناسه</th>
                                            <th>عنوان</th>
                                            <th>زیرعنوان</th>
                                            <th>نویسنده</th>
                                            <th>تاریخ انتشار</th>
                                            <th>دسته‌بندی</th>
                                            <th>عملیات</th>
                                        </tr>
                                    @endslot
                                    @slot('tbody')
                                        @forelse($posts as $post)
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->sub_title}}</td>
                                                <td>{{$post->creator->full_name}}</td>
                                                <td>{{jdate($post->published_at)->format('H:i:s - y/m/d')}}</td>
                                                <td>{{implode(',',$post->categories->pluck('title')->toArray())}}</td>
                                                <td>
                                                    <a href="{{route($postType.'.edit', $post->id)}}" type="button" class="btn btn-sm btn-primary">ویرایش</a>
                                                    <a href="" class="btn btn-sm btn-danger delete_post_ajax" data-post="{{$post->id}}">حذف</a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" style="text-align: center">موردی برای نمایش وجود ندارد.</td>
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
