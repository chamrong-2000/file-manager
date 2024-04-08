<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @section('title', $SeoConfiguration->title ?? '')
    @include('frontend.global.includes.head')
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/aos/aos.min.css') }}">
    @endpush
    @include('frontend.global.includes.styles')
</head>

<body>
    <header class="header">
        @include('frontend.includes.navbar')
        <div id="dropzone-wrapper" class="wrapper">
            <div class="container-lg">
                <div class="wrapper-content">
                    <div data-aos="fade-down" data-aos-duration="1000">
                        <div class="file-upload-icon" {{ uploadSettings()->active ? 'data-upload-btn' : '' }}>
                            <i class="fa-solid fa-circle-play"></i>
                        </div>
                    </div>
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="text-center mb-3">{{ lang('Upload And Share Your Videos', 'home page') }}</h2>
                    </div>
                    <div class="text-center col-md-8 col-lg-7 col-xl-6" data-aos="fade-right" data-aos-duration="1000"
                        data-aos-delay="300">
                        <p class="lead mb-4">
                            {{ lang('Drag and drop anywhere or click to upload your videos and start sharing them everywhere for free.', 'home page') }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        @if (uploadSettings()->active)
                            <button class="btn btn-light btn-md" data-dz-click>
                                <i class="fa fa-upload me-1"></i>
                                <span>{{ lang('Upload', 'home page') }}</span>
                            </button>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-light btn-md">
                                <i class="fa fa-user-plus me-1"></i>
                                <span>{{ lang('Get Started', 'home page') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="wrapper-wave">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            @if (uploadSettings()->active)
                @include('frontend.global.includes.uploadbox')
            @endif
        </div>
    </header>
    {!! ads_home_page_top() !!}
    @if ($features->count() > 0)
        <section id="features" class="section">
            <div class="container-lg">
                <div class="section-inner">
                    <div class="section-header">
                        <div class="section-title">
                            <h5>{{ lang('Features', 'home page') }}</h5>
                        </div>
                        <div class="section-text text-center col-lg-7 mx-auto">
                            <p>{{ lang('Features description', 'home page') }}</p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 justify-content-center g-3">
                            @foreach ($features as $feature)
                                <div class="col" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="card-v text-center h-100">
                                        <div class="card-v-icon">
                                            <img src="{{ asset($feature->image) }}" alt="{{ $feature->title }}" />
                                        </div>
                                        <div class="card-v-title">
                                            <p>{{ $feature->title }}</p>
                                        </div>
                                        <div class="card-v-text">
                                            <p>{{ $feature->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($blogArticles->count() > 0 && $settings['website_blog_status'])
        <section id="blog" class="section bg-white">
            <div class="container-lg">
                <div class="section-inner">
                    <div class="section-header">
                        <div class="section-title">
                            <h5>{{ lang('Blog', 'home page') }}</h5>
                        </div>
                        <div class="section-text text-center col-lg-7 mx-auto">
                            <p>{{ lang('Blog description', 'home page') }}</p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 justify-content-center g-3">
                            @foreach ($blogArticles as $blogArticle)
                                <div class="col" data-aos="fade-up" data-aos-duration="1000">
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
                                                <span
                                                    class="blog-post-user-name">{{ oneName($blogArticle->admin) }}</span>
                                                <time
                                                    class="blog-post-time">{{ vDate($blogArticle->created_at) }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ route('blog.index') }}"
                                class="btn btn-primary-icon btn-md">{{ lang('View More', 'home page') }}<i
                                    class="fas {{ currentLanguage()->direction == 2 ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {!! ads_home_page_center() !!}
    @if ($faqs->count() > 0 && $settings['website_faq_status'])
        <section id="faq" class="section">
            <div class="container-lg">
                <div class="section-inner">
                    <div class="section-header">
                        <div class="section-title">
                            <h5>{{ lang('FAQ', 'home page') }}</h5>
                        </div>
                        <div class="section-text text-center col-lg-7 mx-auto">
                            <p>{{ lang('FAQ description', 'home page') }}</p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="faqs" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="accordion-custom">
                                <div class="accordion" id="vironeer-accordion">
                                    @foreach ($faqs as $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ hashid($faq->id) }}">
                                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ hashid($faq->id) }}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse{{ hashid($faq->id) }}">
                                                    {{ $faq->title }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ hashid($faq->id) }}"
                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                aria-labelledby="heading{{ hashid($faq->id) }}"
                                                data-bs-parent="#vironeer-accordion">
                                                <div class="accordion-body">
                                                    <p class="mb-0">{!! $faq->content !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="{{ route('faq') }}"
                                class="btn btn-primary-icon btn-md">{{ lang('Find out more answers on our FAQ', 'home page') }}<i
                                    class="fas {{ currentLanguage()->direction == 2 ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {!! ads_home_page_bottom() !!}
    @if ($settings['website_contact_form_status'])
        <section id="contact"
            class="section {{ $faqs->count() > 0 && $settings['website_faq_status'] ? 'bg-white' : '' }}">
            <div class="container-lg">
                <div class="section-inner">
                    <div class="section-header">
                        <div class="section-title">
                            <h5>{{ lang('Contact Us', 'home page') }}</h5>
                        </div>
                        <div class="section-text text-center col-lg-7 mx-auto">
                            <p>{{ lang('Contact Us description', 'home page') }}</p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="contact-us" data-aos="zoom-in" data-aos-duration="1000">
                            @include('frontend.includes.contact-form')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @include('frontend.global.includes.footer')
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/aos/aos.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
    @endpush
    @include('frontend.configurations.config')
    @include('frontend.configurations.widgets')
    @include('frontend.global.includes.scripts')
</body>

</html>
