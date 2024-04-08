<div class="nav-bar">
    <div class="container-lg">
        <div class="nav-bar-container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset($settings['website_dark_logo']) }}" alt="{{ $settings['website_name'] }}" />
            </a>
            <div class="nav-bar-menu">
                <div class="overlay"></div>
                <div class="nav-bar-links">
                    <div class="nav-bar-menu-header">
                        <a class="nav-bar-menu-close ms-auto">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    @foreach ($navbarMenuLinks as $navbarMenuLink)
                        <a class="link"
                            {{ !$navbarMenuLink->type ? 'href=' . $navbarMenuLink->link . '' : 'data-link=' . $navbarMenuLink->link . '' }}>
                            {{ $navbarMenuLink->name }}
                        </a>
                    @endforeach
                    @include('frontend.global.includes.language-menu')
                    @guest
                        <a href="{{ route('login') }}" class="link-btn">
                            <button class="btn btn-outline-primary btn-sm">{{ lang('Sign In', 'user') }}</button>
                        </a>
                        @if ($settings['website_registration_status'])
                            <a href="{{ route('register') }}" class="link-btn">
                                <button class="btn btn-primary btn-sm">{{ lang('Sign Up', 'user') }}</button>
                            </a>
                        @endif
                    @endguest
                </div>
            </div>
            <div class="nav-bar-actions">
                @auth
                    @include('frontend.global.includes.user-menu')
                @endauth
                <div class="nav-bar-menu-btn">
                    <i class="fa-solid fa-bars-staggered fa-lg"></i>
                </div>
            </div>
        </div>
    </div>
</div>
