@extends('frontend.layouts.pages')
@section('hide_header', true)
@section('title', $blogArticle->title)
@section('description', $blogArticle->short_description)
@section('og_image', asset($blogArticle->image))
@section('content')
    <div class="container-lg">
        <div class="section-inner">
            <div class="section-body">
                <div class="row g-4">
                    <div class="col-12 col-xl-8">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="blog-post v2 p-4">
                                    <div class="blog-post-header">
                                        <img src="{{ asset($blogArticle->image) }}" alt="{{ $blogArticle->title }}"
                                            class="blog-post-img" />
                                    </div>
                                    <div class="blog-post-body px-0">
                                        <a href="{{ route('blog.article', $blogArticle->slug) }}"
                                            class="blog-post-title text-normal">
                                            <h6>{{ $blogArticle->title }}</h6>
                                        </a>
                                        <div class="post-meta mb-3">
                                            <div class="post-meta-item">
                                                <i class="far fa-user"></i>
                                                <span>{{ oneName($blogArticle->admin) }}</span>
                                            </div>
                                            <div class="post-meta-item">
                                                <i class="fa-regular fa-calendar"></i>
                                                <time>{{ vDate($blogArticle->created_at) }}</time>
                                            </div>
                                        </div>
                                        {!! ads_blog_page_article_top() !!}
                                        <div class="post-content">{!! $blogArticle->content !!}</div>
                                        {!! ads_blog_page_article_Bottom() !!}
                                        <div class="share mt-3">
                                            <h6 class="mb-0 me-3">{{ lang('Share On', 'blog') }}:</h6>
                                            @include('frontend.blog.includes.share-buttons')
                                        </div>
                                    </div>
                                    <div class="blog-post-footer px-0 pb-0">
                                        <div class="comments">
                                            <h5 class="comments-title">
                                                <i class="far fa-comments me-2"></i> {{ lang('Comments', 'blog') }}
                                                ({{ count($blogArticleComments) }})
                                            </h5>
                                            @forelse ($blogArticleComments as $blogArticleComment)
                                                <div class="comment">
                                                    <div class="comment-img">
                                                        <img src="{{ asset($blogArticleComment->user->avatar) }}"
                                                            alt="{{ oneName($blogArticleComment->user) }}">
                                                    </div>
                                                    <div class="comment-info">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="comment-title mb-1">
                                                                {{ oneName($blogArticleComment->user) }}</h6>
                                                            <time
                                                                class="text-muted mb-2 small">{{ vDate($blogArticleComment->created_at) }}</time>
                                                        </div>
                                                        <p class="comment-text mb-0 text-muted">{!! allowBr($blogArticleComment->comment) !!}</p>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert mb-0 p-0">
                                                    {{ lang('No comments available', 'blog') }}
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-v v2">
                                    <div class="card-v-body">
                                        @auth
                                            <div class="blog-card-header">
                                                <p class="blog-card-title h5">{{ lang('Leave a comment', 'blog') }}</p>
                                            </div>
                                            <div class="blog-card-body mt-4">
                                                <form action="{{ route('blog.article.comment', $blogArticle->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <textarea name="comment" class="form-control" rows="6" placeholder="{{ lang('Your comment', 'blog') }}" required></textarea>
                                                    </div>
                                                    {!! display_captcha() !!}
                                                    <button
                                                        class="btn btn-primary btn-md">{{ lang('Publish', 'blog') }}</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="alert mb-0 text-center p-1">
                                                {{ lang('Login or create account to leave comments', 'blog') }}
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        @include('frontend.blog.includes.blog-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {!! google_captcha() !!}
    @endpush
@endsection
