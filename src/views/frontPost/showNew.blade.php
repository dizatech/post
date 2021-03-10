@component('home.layouts.component', ['title' => 'خبر'])

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
                            {{ $news->title }}
                        </h1>
                    </div>
                </div>
            </div>
            <!--End of header-->
            <div class="row">
                <!--main right part-->
                <div class="col-lg-10 pb-3 pt-3 px-md-5 px-sm-3 px-3 bg-blue-light">
                    <div class="m-2 Section_of_Article px-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="detail_container">
                                    <div class="detail">
                                            <span>
                                                <small>تاریح انتشار:</small>
                                                <small>{{ digitsToEastern(jdate($news->published_at)->format('%d %B %Y')) }}</small>
                                            </span>
                                    </div>
                                    <div class="detail">
                                            <span>
                                                <small>تعداد بازدید:</small>
                                                <small class="d-inline">
                                                    <span class="post-views-count">{{ digitsToEastern($news->hits) }}</span>
                                                </small>
                                            </span>
                                    </div>
                                    @if( $news->categories->count() > 0 )
                                        <div class="detail">
                                            <span>
                                                <small>دسته‌بندی:</small>
                                                <small>
                                                    <span class="text-decoration-none">
                                                        @php $category_counter = 1; @endphp
                                                        @foreach($news->categories as $category)
                                                            <a href="{{ route('news_category.user_show', $category->slug) }}">
                                                                {{ $category->title }}
                                                            </a>@if( $category_counter++ < $news->categories->count() )،@endif
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
                                        <h2></h2>
                                        {!! $news->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 bg-pink-dark">
                    <div class="row sticky-top side-banners">
                        <div class="col-12">
                            <div class="d-flex flex-column justify-content-center">
                                @for($i= 0; $i<5; $i++)
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
        <script>

        </script>
    @endslot

@endcomponent


