@extends('../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin settings')
@section('content')
    <div class="menu-bar">
        <div class="items radio-input  <?php if($layout['value'] == 'right' ):?> active-checkbox <?php endif; ?>">
            <img src="images/profile/ederly.png">
            <p>Right</p>
            <input type="radio" name="layout" value="right" />
        </div>
        <div class="items radio-input  <?php if($layout['value'] == 'left' ):?> active-checkbox <?php endif; ?>">
            <img src="images/profile/ederly.png">
            <p>Left</p>
            <input type="radio" name="layout" value="left" />
        </div>
        <div class="items radio-input <?php if($layout['value'] == 'middle' ):?> active-checkbox <?php endif; ?>">
            <img src="images/profile/ederly.png">
            <p>Middle</p>
            <input type="radio" name="layout" value="middle" />
        </div>
    </div>
    <iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="{{ env('APP_URL') }}/profile?shop={{$domain}}&admin=true" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 350px; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important;height:350px "></iframe>
@endsection

@section('scripts')
    @parent
    @if(config('shopify-app.appbridge_enabled'))
        <script type="text/javascript">
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var titleBarOptions = {
                title: 'Settings',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endif
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function slick() {
            setTimeout(function(){
                if (window.innerWidth <= 767) {
                    $(".menu-bar").not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 1,
                        arrows: false,
                        dots: false,
                        slidesToScroll: 1
                    });

                } else {
                    $('.menu-bar').slick('unslick');
                }
            },100);
        };
        slick();
        $(window).resize(function () {
            slick();
        });
    </script>
@endsection