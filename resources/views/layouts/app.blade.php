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
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
<body class="@yield('class')">
<div id="app">
    <main class="py-4 hidden-timeout @if(isset($id->picker)){{ $id->picker }} @else middle-right @endif" style="display: none">

        <div class="Orders-trigger-container trigger-position-right">
            <div role="button" aria-expanded="false" tabindex="0" class="hikeOrders-trigger showNow">
                <span class="icon icon-a11y-0"></span>
            </div>
        </div>
        <div class="main-bottom Orders-popup-full">
            <div class="tool-bar">
                <div class="left reset"><i class="fa fa-sync"></i></div>
                <div class="center">accessibility</div>
                <div class="right"><i class="fa fa-times"></i></div>
            </div>
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </main>
</div>

{{-- Scripts --}}
<script>
    <?php if(isset($_GET['shop'])):?>
    window.domain  = "{{ $_GET['shop'] }}";
    <?php endif; ?>
        window.position = '@if(isset($id->picker)){{ $id->picker }}@else default @endif';
        setTimeout(function(){
            $('.hidden-timeout').show();
        },2000)
</script>
<script src="{{ mix('/js/app.js') }}"></script>
@yield('footer_scripts')

</body>
</html>
