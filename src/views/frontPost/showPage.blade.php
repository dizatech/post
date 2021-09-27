@component('home.layouts.component', ['title' => ($page->meta_title != '') ? $page->meta_title : $page->title , 'description' => ($page->meta_description != '') ? $page->meta_description : $page->description])

    @slot('style')
    @endslot

    @slot('content_top')
        <div class="container">
            @component('home.layouts.breadcrumb')
            @endcomponent
        </div>
    @endslot

    @slot('content')
        <div class="container">
            <div class="row new-single-page">
                <!--main right part-->
                <div class="col-lg-9">
                    <div class="show-new-holder">
                        <div class="container">
                            <div class="detail-holder">
                                <div class="detail-container">
                                    <div class="detail-title">
                                        {{ $page->title }}
                                    </div>
                                </div>

                                <div class="deatil-img-holder">
                                    @if( $page->media->count() > 0 )
                                        <a target="_blank" href="{{ $page->firstMedia('featured_image')->getUrl() }}">
                                            <img src="{{ $page->firstMedia('featured_image')->findVariant('thumbnail')->getUrl() }}" alt="img">
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!--Article Text-->
                            <div class="news-text">
                                {!! $page->description !!}

                                @if( $page->getMedia('video')->count() > 0 )
                                    @foreach( $page->getMedia('video') as $video )
                                    <div class="post_video_container">
                                        <h3 class="text-primary">{{ $video->caption }}</h3>

                                        <div class="text-center">
                                            <video controls><source src="{{ $video->getUrl() }}"></video>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="img-advertising-holder">
                                @for($i= 0; $i<3; $i++)
                                    @component('components.cards.aside-advertising-card', [
                                        'imageLink'=>'https://mahamax.com/equipment/%d8%ae%d8%af%d9%85%d8%a7%d8%aa-%d8%aa%d8%ad%d9%84%db%8c%d9%84-%d8%a2%d9%86%d8%a7%d9%84%db%8c%d8%b2%d9%87%d8%a7/',
                                        'imageAlt'=>'نمونه',
                                        'imageSource'=>'https://cinematest.ir/images/home/banner/250-250/gif/g5.gif'
                                    ])
                                    @endcomponent
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endslot

    @slot('script')
        <script>

        </script>
    @endslot

@endcomponent
