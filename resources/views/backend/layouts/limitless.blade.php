<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.layouts.partials.meta')
    @stack("style")
</head>
<body>
@include('backend.layouts.partials.navbar')
<div class="page-content">
    @include('backend.layouts.partials.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            @include('backend.layouts.partials.header')
            <div class="content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            @include('backend.layouts.partials.footer')
        </div>
    </div>
</div>
@include('backend.layouts.partials.notifications')
@include('backend.layouts.partials.config')
@include('backend.layouts.partials.javascript')
@stack("javascript")
</body>
</html>
