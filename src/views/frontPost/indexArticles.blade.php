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
            <div class="row">
                <!--main right part-->
                <div class="col-lg-10 pb-3 pt-3 px-md-5 px-sm-3 px-3 bg-blue-light">
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
                            <div class="wp-pagenavi" role="navigation">
                                <span class="pages">صفحه 1 از 4</span>
                                <span aria-current="page" class="current">1</span>
                                <a class="page larger" title="صفحه 2"
                                   href="https://mahamax.com/category/%d9%85%d9%82%d8%a7%d9%84%d8%a7%d8%aa/page/2/">2</a>
                                <a class="page larger" title="صفحه 3"
                                   href="https://mahamax.com/category/%d9%85%d9%82%d8%a7%d9%84%d8%a7%d8%aa/page/3/">3</a>
                                <a class="page larger" title="صفحه 4"
                                   href="https://mahamax.com/category/%d9%85%d9%82%d8%a7%d9%84%d8%a7%d8%aa/page/4/">4</a>
                                <a class="nextpostslink" rel="next"
                                   href="https://mahamax.com/category/%d9%85%d9%82%d8%a7%d9%84%d8%a7%d8%aa/page/2/">»</a>
                            </div>

                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 bg-pink-dark ">
                    <div class="row sticky-top side-banners">
                        <div class="col-12">
                            <div class="d-flex flex-column justify-content-center">
                                @for($i= 0; $i<9; $i++)
                                    @component('components.cards.aside-advertising-card', [
                                        'imageLink'=>'https://mahamax.com/equipment/%d8%ae%d8%af%d9%85%d8%a7%d8%aa-%d8%aa%d8%ad%d9%84%db%8c%d9%84-%d8%a2%d9%86%d8%a7%d9%84%db%8c%d8%b2%d9%87%d8%a7/',
                                        'imageAlt'=>'تحلیل نتایج آنالیزها',
                                        'imageSource'=>'https://mahamax.com/wp-content/themes/mahamax-v2/dist/images/banners/banners/1.jpg'
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
    @endslot

@endcomponent
