@component('panel.layouts.component', ['title' => $post->postTypeLabel.' جدید'])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i>{{$post->postTypeLabel}} جدید</h1>
        <p>این صفحه برای درج {{$post->postTypeLabel}} جدید است.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route($postType.'.index')}}">تمام {{$post->postTypePluralLabel}}</a></li>
        <li class="breadcrumb-item">{{$post->postTypeLabel}} جدید</li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        <form action="{{route($postType.'.store')}}" method="POST" autocomplete="off">
                            @csrf
                            @component('components.collapse-card', ['show' => 'show', 'id' => 'create_'.$post->postTypeLabel , 'title'=> $post->postTypeLabel .' جدید'])
                                @slot('body')
                                    @component('dizatechPost::components.post',[
                                         'categories' => $categories,
                                         'post'       => $post,
                                         'users'      => $users,
                                    ]
                                        )
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
