@component('home.layouts.component', ['title' => 'لیست مقالات'])

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
                            {{ $title }}
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row mt-3">
                <!--main right part-->
                <div class="col-lg-10 pb-3 pt-3 px-md-5 px-sm-3 px-3 bg-light-gray">
                    <div class="row">
                        @foreach( $articles as $article )
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                @component('components.cards.article-card', [
                                    'imageLink'     => route('article.user_show', ['slug' => $article->slug]),
                                    'imageSource'   => $article->getMedia('featured_image')->count() > 0 ? $article->getMedia('featured_image')->first()->findVariant('thumbnail')->getUrl() : '',
                                    'imageAlt'      => $article->getMedia('featured_image')->count() > 0 ? $article->getMedia('featured_image')->first()->caption : '',
                                    'captionLink'   => route('article.user_show', ['slug' => $article->slug]),
                                    'captionText'   => $article->title ?? '',
                                    'leadLink'      => route('article.user_show', ['slug' => $article->slug]),
                                    'leadText'      => $article->lead ?? '',
                                    'publishedAt'   => digitsToEastern(jdate($article->published_at)->format('%d %B %Y') ?? ''),
                                    'buttonText'    => 'مشاهده',
                                    'buttonLink'    => route('article.user_show', ['slug' => $article->slug]) ?? '',
                                ])
                                @endcomponent
                            </div>
                        @endforeach

                        <div class="col-12 mt-4">
                            {{ $articles->links() }}
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
