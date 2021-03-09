@component('panel.layouts.component', ['title' => 'ویرایش '.$post->postTypeLabel ])

    @slot('style')
        <link rel="stylesheet" href="{{asset('modules/css/mahamax-core.css')}}">
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i>ویرایش {{$post->postTypeLabel}} </h1>
        <p>این صفحه برای ویرایش {{$post->postTypeLabel}} است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route($postType.'.index')}}">تمام {{$post->postTypePluralLabel}}</a></li>
        <li class="breadcrumb-item">ویرایش {{$post->postTypeLabel}}</li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        <form action="{{route($postType.'.update', $post)}}" method="POST" enctype="multipart/form-data"
                              autocomplete="off">
                            @csrf
                            @method('PATCH')
                            @component('components.collapse-card', ['id' => $post->postTypeLabel.'-edit', 'show' => 'show' , 'title' => 'ویرایش ' .$post->postTypeLabel])
                                @slot('body')
                                    @component('dizatechPost::components.post',[
                                        'categories' => $categories,
                                        'post'       => $post,
                                        'users'      => $users,
]                                               )
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
        <script>
            $(".select2").select2({
                theme: "bootstrap"
            });
        </script>
    @endslot


@endcomponent
