<div class="card-v v2 mb-4">
    <div class="card-v-body">
        <form action="{{ route('blog.index') }}" method="GET">
            <div class="form-search">
                <input type="text" name="q" placeholder="{{ lang('Search..', 'blog') }}"
                    value="{{ request()->input('q') ?? '' }}" required>
                <button class="icon">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<div class="card-v v2 mb-4">
    <div class="card-v-body">
        <div class="share justify-content-center">
            @include('frontend.blog.includes.share-buttons')
        </div>
    </div>
</div>
{!! ads_blog_page_sidebar_top() !!}
<div class="card-v v2 mb-4">
    <div class="card-v-body">
        <h5 class="card-v-title mb-4">{{ lang('Categories', 'blog') }}</h5>
        <div class="categories">
            @foreach ($blogCategories as $blogCategory)
                <a href="{{ route('blog.category', $blogCategory->slug) }}" class="category">
                    <span class="category-title">{{ $blogCategory->name }}</span>
                    <i class="fa {{ currentLanguage()->direction == 2 ? 'fa-angle-left' : 'fa-angle-right' }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</div>
<div class="card-v v2">
    <div class="card-v-body">
        <h5 class="card-v-title mb-4">{{ lang('Popular articles', 'blog') }}</h5>
        <div class="posts">
            @foreach ($recentBlogArticles as $recentBlogArticle)
                <div class="post">
                    <a href="{{ route('blog.article', $recentBlogArticle->slug) }}">
                        <img class="post-img" src="{{ asset($recentBlogArticle->image) }}"
                            alt="{{ $recentBlogArticle->title }}">
                    </a>
                    <div class="post-info">
                        <h6 class="post-title text-normal">
                            <a
                                href="{{ route('blog.article', $recentBlogArticle->slug) }}">{{ shortertext($recentBlogArticle->title, 60) }}</a>
                        </h6>
                        <div class="post-meta">
                            <div class="post-meta-item">
                                <i class="fa-regular fa-calendar"></i>
                                <time>{{ vDate($recentBlogArticle->created_at) }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
