@extends('../../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin home show-default main-bottom')
@section('content')
    <h2 class="title">select your profile</h2>
    <div class="menu-bar">
        <?php
        foreach ($profile as $item):
        ?>
        <div class="items">
            <a class="link-bar" href="{{route('admin/'.$item->url,['id' => $item->id])}}">
                <img src="{{ asset('images/profile/'. $item->image.'') }}">
                <p>{{ $item->name }}</p>
            </a>
        </div>
        <?php
        endforeach
        ;?>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @parent
    @if(config('shopify-app.appbridge_enabled'))
        <script type="text/javascript">
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var titleBarOptions = {
                title: 'Profile',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endif
    <script>

        function slick(){
            setTimeout(function(){
                if(window.innerWidth <= 767){
                    $('.menu-bar').not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 1,
                        arrows: false,
                        dots: false,
                        slidesToScroll: 1
                    });
                }else{
                    $('.menu-bar').slick('unslick');
                }
            },100);
        }
        slick();
        $( window ).resize(function() {
            slick();
        });
    </script>
@endsection