<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">--}}
    {{-- Styles --}}
    <link href="{{ mix('/css/app.css') }}" async  defer  rel="stylesheet">
    {{-- Scripts --}}
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>
    @yield('head')
</head>
<body class="index-admin @yield('class')">
<div id="app">
    <header class="nav-wrapper">
        <nav class="nav">
            <i class="fas fa-bars toggle-nav"></i>
            <ul class="nav-list" role="navigation">
                <div class="list -left">
                    <li class="item">
                        <a class="link" href="/">Dashboads</a>
                    </li>
                    <li class="item">
                        <a class="link" href="admin/profile">Profile</a>
                    </li>
                    <li class="item">
                        <a class="link" href="settings">Settings</a>
                    </li>
                    <li class="item">
                        <a class="link" href="admin/upload-font">Upload Font</a>
                    </li>
                </div>
                <div class="list -right">
                    <div class="overlay"></div>
                </div>
            </ul>
        </nav>
    </header>
    <main class="py-4 main-app">
        @yield('content')
    </main>
</div>

{{-- Scripts --}}
<script src="{{ mix('/js/app.js') }}"></script>
@yield('footer_scripts')
@if(config('shopify-app.appbridge_enabled'))
    <script src="https://unpkg.com/@shopify/app-bridge{{ config('shopify-app.appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
    <script>
        var AppBridge = window['app-bridge'];
        var createApp = AppBridge.default;
        var app = createApp({
            apiKey: '{{ config('shopify-app.api_key') }}',
            shopOrigin: '{{ ShopifyApp::shop()->shopify_domain }}',
            forceRedirect: true,
        });
    </script>

    @include('shopify-app::partials.flash_messages')
@endif
@yield('scripts')
</body>
</html>
