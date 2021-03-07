@component('panel.layouts.component', ['title' => ' دسته‌بندی '.$category->typeLabel.' جدید'])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i>  دسته‌بندی {{$category->typeLabel}} جدید</h1>
        <p>این صفحه برای درج دسته‌بندی {{$category->typeLabel}} جدید است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route($categoryType.'.index')}}">تمام دسته‌بندی {{$category->typeLabel}}</a></li>
        <li class="breadcrumb-item">دسته‌بندی {{$category->typeLabel}} جدید</li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                 @slot('cards')
                        <form action="{{route($categoryType.'.store')}}" method="POST" autocomplete="off">
                            @csrf
                            @component('components.collapse-card', ['show' => 'show', 'id' => 'create_'.$category->typeLabel , 'title'=> 'دسته‌بندی '.$category->typeLabel .' جدید'])
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
