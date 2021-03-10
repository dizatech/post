@component('home.layouts.component', ['title' => 'لیست ویدیوها'])

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
                            ویدیوها
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row mt-3">
                <!--main right part-->
                <div class="col-lg-10 pb-3 pt-3 px-md-5 px-sm-3 px-3 bg-light-gray">
                    <div class="row">
                        @foreach( $videos as $video )
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">
                                @component('components.cards.article-card', [
                                        'imageCover'    =>  true,
                                        'imageSource'   =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->getUrl() : '',
                                        'imageAlt'      =>  $video->getMedia('featured_image')->count() > 0 ? $video->getMedia('featured_image')->first()->caption : '',
                                        'videoLink'     =>  $video->getMedia('video')->count() > 0 ? $video->getMedia('video')->first()->getUrl() : '',
                                        'captionLink'   =>  route( 'video.user_show', [ 'slug' => $video->slug ] ),
                                        'captionText'   =>  $video->title,
                                        'leadLink'      =>  route( 'video.user_show', [ 'slug' => $video->slug ] ),
                                        'leadText'      =>  $video->lead ,
                                        'publishedAt'   =>  digitsToEastern(jdate($video->published_at)->format('%d %B %Y')),
                                        'buttonClass'   =>  'btn-primary',
                                        'buttonText'    =>  'مشاهده',
                                        'buttonLink'    =>  route( 'video.user_show', [ 'slug' => $video->slug ] ),
                                    ])
                                @endcomponent
                            </div>
                        @endforeach
                            <div class="col-12 mt-4">
                                {{ $videos->withQueryString()->links() }}
                            </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="row sticky-top side-banners">
                        <div class="col-12">
                            <div class="d-flex flex-column justify-content-center">
                                @component('components.cards.holder-aside-advertising-card')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot('script')
    @endslot

@endcomponent

