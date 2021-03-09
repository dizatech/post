@component('home.layouts.component', ['title' => 'لیست اخبار'])

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
                            {{$title}}
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row mt-3">
                <!--main right part-->
                <div class="col-lg-10 pb-3 pt-3 px-md-5 px-sm-3 px-3 bg-light-gray">
                    <div class="row">
                        @foreach($news as $news_post)
                            <div class="col-lg-4 col-sm-6 col-12 mb-2">
                                @component('components.cards.news-card', [
                                    'captionText'   => $news_post->title ?? '',
                                    'publishedAt'   => digitsToEastern(jdate($news_post->published_at)->format('%d %B %Y') ) ?? '',
                                    'leadText'      => $news_post->lead ?? '',
                                    'buttonLink'    => route('news.user_show', ['slug' => $news_post->slug]) ?? '',
                                    'buttonText'    => 'ادامه مطلب'
                                ])
                                @endcomponent
                            </div>
                        @endforeach

                        <div class="col-12 mt-4">
                            {{ $news->render() }}
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

