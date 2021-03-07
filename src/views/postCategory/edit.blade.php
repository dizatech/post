@component('panel.layouts.component', ['title' => ' دسته‌بندی  '.$postCategory->typeLabel.' ویرایش'])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i>  ویرایش دسته‌بندی {{$postCategory->typeLabel}} </h1>
        <p>این صفحه برای ویرایش دسته‌بندی {{$postCategory->typeLabel}} است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route($categoryType.'.index')}}">تمام دسته‌بندی {{$postCategory->typeLabel}}</a></li>
        <li class="breadcrumb-item">ویرایش دسته‌بندی {{$postCategory->typeLabel}}</li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        <form action="{{route($categoryType.'.update', $postCategory)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @component('components.collapse-card', ['show' => 'show', 'id' => 'edit_' . $postCategory->type , 'title'=> 'ویرایش دسته‌بندی ' . $postCategory->type])
                                @slot('body')
                                    @component('mahamaxPost::components.postCategory',[
                                        'postCategory'  => $postCategory,
                                        'categoryType'  => $categoryType
                                    ])
                                    @endcomponent
                                @endslot
                            @endcomponent
                        </form>
                    @endslot
                @endcomponent
            </div>
        </div>
    @endslot

    @slot('script')
        <script src="{{ asset('modules/js/mahamax-core.js') }}"></script>

    @endslot
@endcomponent
