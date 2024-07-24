<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Home')</title>

    <meta name="description" content="" />

    @includeIf('admin.layout.style')

    @yield('css')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @includeIf('admin.layout.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                
                @includeIf('admin.layout.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    
                    @yield('content')

                    @includeIf('admin.layout.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @includeIf('admin.layout.script')

    @yield('script')
    
</body>

</html>
