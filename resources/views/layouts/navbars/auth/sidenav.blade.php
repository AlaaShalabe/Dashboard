<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <img src="./img/Asset 51icon.svg" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>

    <div id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @can('user-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
            @endcan

            @can('role-list')
                <li class="nav-item">

                    <a class="nav-link {{ str_contains(request()->url(), 'role-management') == true ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Role Management</span>
                    </a>
                </li>
            @endcan

            @can('news-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'news-management') == true ? 'active' : '' }}"
                        href="{{ route('news.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>

                        </div>
                        <span class="nav-link-text ms-1">News Management</span>
                    </a>
                </li>
            @endcan

            @can('topics-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'news-management') == true ? 'active' : '' }}"
                        href="{{ route('topics.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Topic Management</span>
                    </a>
                </li>
            @endcan
            @can('email-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'emails-management') == true ? 'active' : '' }}"
                        href="{{ route('emails.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Emails</span>
                    </a>
                </li>
            @endcan

            @can('article-list')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'article-management') == true ? 'active' : '' }}"
                        href="{{ route('articles.index') }}">
                        <div
                            class="icon icon-setting icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Article Management</span>
                    </a>
                </li>
            @endcan

</aside>
