<div class="drop-down user-menu ms-3" data-dropdown>
    <div class="drop-down-btn">
        <img src="{{ asset(userAuthInfo()->avatar) }}" alt="{{ userAuthInfo()->name }}" class="user-img">
        <span class="user-name">{{ userAuthInfo()->name }}</span>
        <i class="fa fa-angle-down ms-2"></i>
    </div>
    <div class="drop-down-menu">
        <a href="{{ route('user.dashboard') }}" class="drop-down-item">
            <i class="fa-solid fa-table-columns"></i>{{ lang('Dashboard', 'user') }}
        </a>
        <a href="{{ route('user.videos.index') }}" class="drop-down-item">
            <i class="fa-solid fa-circle-play"></i>{{ lang('My Videos', 'user') }}
        </a>
        <a href="{{ route('user.settings') }}" class="drop-down-item">
            <i class="fa fa-cog"></i>{{ lang('Settings', 'user') }}
        </a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="drop-down-item text-danger">
            <i class="fa fa-power-off"></i>{{ lang('Logout', 'user') }}
        </a>
    </div>
</div>
<form id="logout-form" class="d-inline" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
