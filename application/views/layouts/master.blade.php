@php (defined('BASEPATH') or exit('No direct script access allowed'))
<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <!-- begin::Body -->
    <body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            @include('layouts.header')
            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                @include('layouts.left-aside')
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    @include('layouts.subheader')
                    <div class="m-content">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            @include('layouts.footer')
        </div>
        <!-- end:: Page -->
        @include('layouts.scroll-top')
        <!-- @include('layouts.quick-nav') -->
        @include('layouts.global-theme-bundle')

        @yield('page-vendors')

        @yield('page-scripts')
    </body>
    <!-- end::Body -->
</html>