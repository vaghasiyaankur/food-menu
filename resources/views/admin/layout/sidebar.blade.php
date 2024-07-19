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
        <li class="menu-item {{ in_array(Route::currentRouteName(), ['super-admin.restaurant', 'super-admin.restaurant-request']) ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: #697a8c;transform: ;msFilter:;"><path d="M12 10h-2V3H8v7H6V3H4v8c0 1.654 1.346 3 3 3h1v7h2v-7h1c1.654 0 3-1.346 3-3V3h-2v7zm7-7h-1c-1.159 0-2 1.262-2 3v8h2v7h2V4a1 1 0 0 0-1-1z"></path></svg>
                </i>
                <div data-i18n="Layouts">Restaurant</div>
            </a>

            <ul class="menu-sub">
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
    </ul>
</aside>
<!-- / Menu -->