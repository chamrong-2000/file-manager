@extends('frontend.layouts.pages')
@section('hide_header', true)
@section('section_class', 'pt-0 pb-0')
@section('section', lang('Watch', 'video page'))
@section('title', $fileEntry->name)
@section('content')
    <div class="fileviewer">
        <div class="container-lg">
            <div class="fileviewer-body">
                {!! ads_video_page_video_top() !!}
                <div class="fileviewer-cont">
                    <iframe class="fileviewer-file" src="{{ route('file.embed', $fileEntry->shared_id) }}"></iframe>
                </div>
                {!! ads_video_page_video_bottom() !!}
                <div class="border-top mt-5 pt-4 mb-4">
                    <div class="row row-cols-auto align-items-center justify-content-between g-3">
                        <div class="col">
                            <div class="fileviewer-user">
                                <div class="fileviewer-user-img">
                                    <img src="{{ fileUser($fileEntry)->avatar }}" alt="{{ fileUser($fileEntry)->name }}" />
                                </div>
                                <div class="fileviewer-user-info">
                                    <h5 class="fileviewer-user-title mb-2">{{ fileUser($fileEntry)->name }}</h5>
                                    <div class="fileviewer-user-meta">
                                        <div class="fileviewer-user-meta-item">
                                            <i class="fa-solid fa-calendar me-1"></i>
                                            {{ vDate($fileEntry->created_at) }}
                                        </div>
                                        <div class="fileviewer-user-meta-item ms-2">
                                            <i class="fa-solid fa-eye me-1"></i>
                                            {{ formatNumber($fileEntry->views) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row row-cols-auto g-2">
                                @if (uploadSettings()->upload->allow_downloading)
                                    <div class="col">
                                        <button class="btn btn-primary btn-md download-file"
                                            data-id="{{ $fileEntry->shared_id }}">
                                            <i class="fa fa-download me-1"></i>
                                            {{ lang('Download', 'video page') }}
                                        </button>
                                    </div>
                                @endif
                                <div class="col">
                                    <button class="fileviewer-sidebar-open btn btn-danger btn-md">
                                        <i class="fa-solid fa-share-nodes me-1"></i>
                                        {{ lang('Share', 'video page') }}
                                    </button>
                                </div>
                                @php
                                    $reportFileStatus = auth()->user() && $fileEntry->user_id == userAuthInfo()->id ? false : true;
                                @endphp
                                @if ($reportFileStatus)
                                    <div class="col">
                                        <a data-bs-toggle="modal" data-bs-target="#report" class="btn btn-secondary btn-md">
                                            <i class="fa-regular fa-flag me-1"></i>
                                            {{ lang('Report', 'video page') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="fileviewer-sidebar">
            <div class="overlay"></div>
            <div class="fileviewer-sidebar-content">
                <div class="fileviewer-sidebar-header">
                    <h5 class="fileviewer-sidebar-title">{{ lang('Share', 'video page') }}</h5>
                    <a class="fileviewer-sidebar-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="fileviewer-sidebar-body" data-simplebar>
                    @if ($fileEntry->access_status)
                        <div class="fileviewer-sidebar-section">
                            <div class="share v2">
                                @include('frontend.blog.includes.share-buttons')
                            </div>
                        </div>
                        <div class="fileviewer-sidebar-section">
                            <p class="fileviewer-sidebar-section-title">{{ lang('Share Link', 'video page') }}</p>
                            <div class="input-group">
                                <input id="downloadLink" type="text" class="form-control form-control-md"
                                    value="{{ route('file.view', $fileEntry->shared_id) }}" readonly />
                                <button type="button" class="btn btn-primary btn-copy px-20p"
                                    data-clipboard-target="#downloadLink">
                                    <i class="fa-regular fa-clone fa-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="fileviewer-sidebar-section">
                            <p class="fileviewer-sidebar-section-title">{{ lang('Embed Code', 'video page') }}</p>
                            <div class="textarea-btn">
                                <textarea id="embedLink" class="form-control" rows="5" readonly><iframe width="560" height="315"  src="{{ route('file.embed', $fileEntry->shared_id) }}" title="{{ $fileEntry->name }}" frameborder="0" allowfullscreen></iframe></textarea>
                                <button class="btn btn-primary btn-copy"
                                    data-clipboard-target="#embedLink">{{ lang('Copy', 'video page') }}</button>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fas fa-exclamation-circle me-2 fa-lg"></i>
                                </div>
                                <div class="col">
                                    {{ lang('Videos with private access cannot be shared', 'video page') }}
                                    <a
                                        href="{{ route('user.videos.edit', $fileEntry->shared_id) }}">{{ lang('Change access status', 'videos') }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </aside>
    </div>
    {!! ads_video_page_center() !!}
    @if ($blogArticles->count() > 0 && $settings['website_blog_status'])
        <section class="section">
            <div class="container-lg">
                <div class="section-inner">
                    <div class="section-header">
                        <div class="section-title">
                            <h5>{{ lang('Latest blog posts', 'video page') }}</h5>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 justify-content-center g-3">
                            @foreach ($blogArticles as $blogArticle)
                                <div class="col">
                                    <div class="blog-post">
                                        <div class="blog-post-header">
                                            <a href="{{ route('blog.article', $blogArticle->slug) }}">
                                                <img src="{{ asset($blogArticle->image) }}"
                                                    alt="{{ $blogArticle->title }}" class="blog-post-img" />
                                            </a>
                                        </div>
                                        <div class="blog-post-body">
                                            <a class="blog-post-cate"
                                                href="{{ route('blog.category', $blogArticle->blogCategory->slug) }}">
                                                {{ $blogArticle->blogCategory->name }}
                                            </a>
                                            <a href="{{ route('blog.article', $blogArticle->slug) }}"
                                                class="blog-post-title">
                                                <h6>{{ $blogArticle->title }}</h6>
                                            </a>
                                            <p class="blog-post-text">
                                                {{ shortertext($blogArticle->short_description, 120) }}
                                            </p>
                                        </div>
                                        <div class="blog-post-footer">
                                            <div class="blog-post-user-img">
                                                <img src="{{ asset($blogArticle->admin->avatar) }}"
                                                    alt="{{ oneName($blogArticle->admin) }}" />
                                            </div>
                                            <div class="blog-post-user-info">
                                                <span class="blog-post-user-name">{{ oneName($blogArticle->admin) }}</span>
                                                <time class="blog-post-time">{{ vDate($blogArticle->created_at) }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="{{ route('blog.index') }}"
                                class="btn btn-primary-icon btn-md">{{ lang('View More', 'video page') }}<i
                                    class="fas {{ currentLanguage()->direction == 2 ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {!! ads_video_page_bottom() !!}
    @if ($reportFileStatus)
        <div id="report" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ lang('Report this video', 'video page') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('file.report', $fileEntry->shared_id) }}" method="POST">
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">{{ lang('Name', 'video page') }} : <span
                                            class="red">*</span></label>
                                    <input type="name" name="name" class="form-control form-control-md"
                                        value="{{ userAuthInfo()->name ?? '' }}" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">{{ lang('Email', 'video page') }} : <span
                                            class="red">*</span></label>
                                    <input type="email" name="email" class="form-control form-control-md"
                                        value="{{ userAuthInfo()->email ?? '' }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ lang('Reason for reporting', 'video page') }} :
                                    <span class="red">*</span></label>
                                <select name="reason" class="form-select form-select-md" required>
                                    @foreach (reportReasons() as $reasonsKey => $reasonsValue)
                                        <option value="{{ $reasonsKey }}">{{ $reasonsValue }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ lang('Details', 'video page') }} : <span
                                        class="red">*</span></label>
                                <textarea name="details" class="form-control" rows="7"
                                    placeholder="{{ lang('Describe the reason why you reported the video to a maximum of 600 characters', 'video page') }}"
                                    required></textarea>
                            </div>
                            {!! display_captcha() !!}
                            <button type="submit"
                                class="btn btn-primary btn-md">{{ lang('Send', 'video page') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
    @endpush
    @push('scripts')
        {!! google_captcha() !!}
    @endpush
@endsection
