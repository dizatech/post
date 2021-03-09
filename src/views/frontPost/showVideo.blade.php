@component('home.layouts.component', ['title' => 'ویدیو'])

    @slot('style')
    @endslot

    @slot('content_top')
        @component('home.layouts.breadcrumb')
        @endcomponent
    @endslot

    @slot('content')
        <div class="container-fluid">
            <!--page title-->
            <div class="row shadow">
                <div class="col-12 pt-3 pb-3 pb-1 page-title">
                    <div class="d-flex justify-content-between">
                        <h1 class="d-inline text-secondary font-weight-bold">
                            {{ $video->title }}
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row bg-blue-light">
                <div class="col-lg-8">
                    <div class="page-content pt-3 pb-3">
                        <div class="main-text mb-5">
                            <div class="post-content">
                                {!! $video->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="py-3 px-4">
                        @component('components.cards.video-player-with-cover', [
                            'imageSource'   =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->getUrl() : '',
                            'imageAlt'      =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->caption : '',
                            'videoLink'     =>  '',
                        ])
                        @endcomponent
                    </div>
                </div>
            </div>

            <div class="row bg-pink-dark">
                <div class="video-part-container px-4">
                    <div class="col-12 mr-0 ml-0">
                        <div class="video-part-title">
                            <div>
                                <h5>آخرین ویدیوها</h5>
                                <small>ویدیوهای آموزشی اختصاصی مهامکس</small>
                            </div>
                            <div class="video-part-title-btn">
                                <a href="{{ route('videos.user_index') }}" class="btn btn-sm btn-primary text-light">
                                    مشاهده همه ویدیوها
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="videos mt-5 justify-content-start">
                        @foreach( $videos as $video )
                            <div class="col-lg-4 col-sm-6 col-12 mb-2">
                                @component('components.cards.article-card', [
                                        'imageCover'    =>  true,
                                        'imageSource'   =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->getUrl() : '',
                                        'imageAlt'      =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->caption : '',
                                        'videoLink'     =>  '',
                                        'captionLink'   =>  route('video.user_show', ['slug' => $video->slug] ),
                                        'captionText'   =>  $video->title,
                                        'leadLink'      =>  route('video.user_show', ['slug' => $video->slug] ),
                                        'leadText'      =>  $video->lead ?? '',
                                        'publishedAt'   =>  digitsToEastern( jdate( $video->published_at )->format('%d %B %Y') ),
                                        'buttonClass'   =>  'btn-outline-primary',
                                        'buttonText'    =>  'مشاهده',
                                        'buttonLink'    =>  route('video.user_show', ['slug' => $video->slug] )
                                    ])
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot('script')
    @endslot

@endcomponent


