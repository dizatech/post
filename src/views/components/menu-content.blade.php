<li class="treeview {{ isActive( ['news.index', 'newsCategory.index', 'article.index', 'articleCategory.index', 'video.index', 'videoCategory.index'], 'is-expanded' ) }}">
    <a class="app-menu__item" href="" data-toggle="treeview">
        <i class="app-menu__icon fa fa-newspaper-o"></i>
        <span class="app-menu__label">مدیریت محتوا</span>
        <i class="treeview-indicator fa fa-angle-left"></i>
    </a>
    <ul class="treeview-menu">
        <li><a class="treeview-item pl-3 {{ isActive('news.index') }}" href="{{ route('news.index') }}"><i class="icon fa fa-circle-o"></i>خبرها</a></li>
        <li><a class="treeview-item pl-3 {{ isActive('newsCategory.index') }}" href="{{ route('newsCategory.index') }}"><i class="icon fa fa-circle-o"></i>دسته‌بندی خبرها</a></li>
        <li><a class="treeview-item pl-3 {{ isActive('article.index') }}" href="{{ route('article.index') }}"><i class="icon fa fa-circle-o"></i>مقاله</a></li>
        <li><a class="treeview-item pl-3 {{ isActive('articleCategory.index') }}" href="{{ route('articleCategory.index') }}"><i class="icon fa fa-circle-o"></i>دسته‌بندی مقاله‌ها</a></li>
        <li><a class="treeview-item pl-3 {{ isActive('video.index') }}" href="{{ route('video.index') }}"><i class="icon fa fa-circle-o"></i>ویدیوها</a></li>
        <li><a class="treeview-item pl-3 {{ isActive('videoCategory.index') }}" href="{{ route('
        videoCategory.index') }}"><i class="icon fa fa-circle-o"></i>دسته‌بندی ویدیوها</a></li>
    </ul>
</li>
