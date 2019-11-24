@extends('../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin home admin-home ')
@section('content')
    <div class="menu-bar">
        <div class="items">
            <a class="link-bar" href="admin/profile">
                <img src="{{ asset('images/profile/ederly.png') }}">
                <p>Profile</p>
            </a>
        </div>
        <div class="items">
            <a class="link-bar" href="possitions">
                <img src="{{ asset('images/profile/settings.png') }}">
                <p>Settings</p>
            </a>
        </div>
        <div class="items">
            <a class="link-bar" href="admin/upload-font">
                <img src="{{ asset('images/profile/upload.png') }}">
                <p>Upload Font</p>
            </a>
        </div>
    </div>
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
                title: 'Welcome',
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