<div class="drop-down languages" data-dropdown>
    <div class="drop-down-btn">
        <div class="language-img">
            <img src="{{ getLangFlag() }}" alt="{{ getLangName() }}" />
        </div>
        <span>{{ getLangName() }}</span>
        <i class="fa fa-angle-down ms-2"></i>
    </div>
    <div class="drop-down-menu">
        @foreach ($languages as $language)
            <a class="drop-down-item {{ app()->getLocale() == $language->code ? 'active' : '' }}"
                href="{{ langURL($language->code) }}">
                <div class="language-img">
                    <img src="{{ asset($language->flag) }}" alt="{{ $language->name }}" />
                </div>
                {{ $language->name }}
            </a>
        @endforeach
    </div>
</div>
