@component('home.layouts.component', ['title' => ($article->meta_title != '') ? $article->meta_title : $article->title , 'description' => ($article->meta_description != '') ? $article->meta_description : $article->description])

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
                            {{ $article->title }}
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row">
                <!--main right part-->
                <div class="col-lg-9 pb-3 pt-3 px-lg-5 px-md-4 px-sm-3 px-3 bg-blue-light">
                    <div class="m-2 Section_of_Article px-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="detail_container">
                                    <div class="detail">
                                            <span>
                                                <small>تاریح انتشار:</small>
                                                <small>{{ digitsToEastern(jdate($article->published_at)->format('%d %B %Y')) }}</small>
                                            </span>
                                    </div>
                                    <div class="detail">
                                            <span>
                                                <small>تعداد بازدید:</small>
                                                <small class="d-inline">
                                                    <span class="post-views-count">{{ digitsToEastern( $article->hits ) }}</span>
                                                </small>
                                            </span>
                                    </div>
                                    @if( $article->categories->count() > 0 )
                                        <div class="detail">
                                            <span>
                                                <small>دسته‌بندی:</small>
                                                <small>
                                                    <span class="text-decoration-none">
                                                        @php $category_counter = 1; @endphp
                                                        @foreach($article->categories as $category)
                                                            <a href="{{ route('article_category.user_show', $category->slug) }}">
                                                                {{ $category->title }}
                                                            </a>@if( $category_counter++ < $article->categories->count() )،@endif
                                                        @endforeach
                                                    </span>
                                                </small>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--Article Text-->
                            <div class="col-12">
                                <div class="article_container page-content px-0 text-justify">
                                    <div class="article_text main-text">
                                        {!! $article->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 bg-pink-dark ">
                    <div class="row sticky-top">
                        <div class="col-12">
                            <div class="other_article_in_sidebar mt-2 ">
                                <div class="sidebar_header mb-2">
                                    <h5>سایر مقالات</h5>
                                </div>
                                @component('components.cards.aside-article-card', [
                                        'articleLink'   =>  route('article.user_show', ['slug' => $article->slug]),
                                        'imageSource'   =>  $article->getMedia('featured_image')->count() > 0 ? $article->getMedia('featured_image')->first()->findVariant('thumbnail')->getUrl() : '',
                                        'imageAlt'      =>  $article->getMedia('featured_image')->first()->caption ?? '',
                                        'captionText'   =>  $article->title ?? '',
                                        'leadText'      =>  $article->lead ?? '',
                                        'publishedAt'   =>  digitsToEastern(jdate($article->published_at)->format('%d %B %Y') ?? ''),
                                        'buttonText'    =>  'مشاهده'
                                    ])
                                @endcomponent
                            </div>
                            <div class="other_article_in_sidebar mt-3">
                                <div class="sidebar_header">
                                    <h5>اخبار اخیر</h5>
                                </div>
                                <div class="sidebar_content">
                                    <div class="sidebar_news">
                                        @foreach( $articles as $article )
                                            <div class="news">
                                                <a href="{{ route('article.user_show', ['slug' => $article->slug]) }}">
                                                    <h6>{{ $article->title }}</h6>
                                                </a>
                                                <small>{{ digitsToEastern(jdate( $article->publishet_at )->format('%d %B %Y')) }}</small>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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

