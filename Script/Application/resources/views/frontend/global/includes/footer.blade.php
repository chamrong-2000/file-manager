<footer class="footer">
    <div class="container-lg">
        <div class="row justify-content-between g-3">
            <div class="col-auto">
                <div class="footer-copyright">
                    <p class="mb-0">&copy; <span data-year></span> {{ $settings['website_name'] }} -
                        {{ lang('All rights reserved') }}.</p>
                </div>
            </div>
            @if ($footerMenuLinks->count() > 0)
                <div class="col-auto">
                    <div class="footer-links">
                        @foreach ($footerMenuLinks as $footerMenuLink)
                            <div class="link">
                                <a href="{{ $footerMenuLink->link }}">{{ $footerMenuLink->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</footer>
