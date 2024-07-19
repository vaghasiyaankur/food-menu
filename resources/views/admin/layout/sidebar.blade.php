 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="javascript:void(0)" class="app-brand-link">
            <img src="{{ asset('images/logo.png') }}" height="60px" width="100px">
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        
        <!-- Dashboard -->
        <li class="menu-item {{ Route::currentRouteName() == 'super-admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('super-admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Restaurant -->
        <li class="menu-item {{ in_array(Route::currentRouteName(), ['super-admin.restaurant', 'super-admin.restaurant-request', 'super-admin.user']) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: #697a8c;transform: ;msFilter:;"><path d="M12 10h-2V3H8v7H6V3H4v8c0 1.654 1.346 3 3 3h1v7h2v-7h1c1.654 0 3-1.346 3-3V3h-2v7zm7-7h-1c-1.159 0-2 1.262-2 3v8h2v7h2V4a1 1 0 0 0-1-1z"></path></svg>
                </i>
                <div data-i18n="Layouts">Restaurant</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('super-admin.user') }}" class="menu-link">
                        <div data-i18n="Analytics">Users</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('super-admin.restaurant') }}" class="menu-link">
                        <div data-i18n="Without menu">Restaurant List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('super-admin.restaurant-request') }}" class="menu-link">
                        <div data-i18n="Without navbar">Restaurant Request</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Branch -->
        <li class="menu-item {{ Route::currentRouteName() == 'super-admin.branch' ? 'active' : '' }}">
            <a href="{{ route('super-admin.branch') }}" class="menu-link">
                <i class="menu-icon tf-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: #697a8c;transform: ;msFilter:;"><path d="M17.5 4C15.57 4 14 5.57 14 7.5c0 1.554 1.025 2.859 2.43 3.315-.146.932-.547 1.7-1.23 2.323-1.946 1.773-5.527 1.935-7.2 1.907V8.837c1.44-.434 2.5-1.757 2.5-3.337C10.5 3.57 8.93 2 7 2S3.5 3.57 3.5 5.5c0 1.58 1.06 2.903 2.5 3.337v6.326c-1.44.434-2.5 1.757-2.5 3.337C3.5 20.43 5.07 22 7 22s3.5-1.57 3.5-3.5c0-.551-.14-1.065-.367-1.529 2.06-.186 4.657-.757 6.409-2.35 1.097-.997 1.731-2.264 1.904-3.768C19.915 10.438 21 9.1 21 7.5 21 5.57 19.43 4 17.5 4zm-12 1.5C5.5 4.673 6.173 4 7 4s1.5.673 1.5 1.5S7.827 7 7 7s-1.5-.673-1.5-1.5zM7 20c-.827 0-1.5-.673-1.5-1.5a1.5 1.5 0 0 1 1.482-1.498l.13.01A1.495 1.495 0 0 1 7 20zM17.5 9c-.827 0-1.5-.673-1.5-1.5S16.673 6 17.5 6s1.5.673 1.5 1.5S18.327 9 17.5 9z"></path></svg>
                </i>
                <div data-i18n="Analytics">Branch</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->