@extends('../../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin home show-default main-bottom admin-custom-checkbox')
@section('content')
    <h2 class="title">select your profile</h2>
    <form action="hidden-profile" method="post" style="text-align: center;">
    @csrf
    <div class="menu-bar">
        <?php
        $array = explode(",", $id->namespace);
        unset($array[count($array) - 1]);
        foreach ($profile as $item):
        ?>
            <div class="items">
            <label class="container" style="top:0;left:0">
                <div class="check-container">
                    <input class="middle-left" data-text="Middle Left" value="{{$item->name}}" @if (in_array($item->name, $array)) checked @endif type="checkbox" name="profile[]">
                    <span class="checkmark"></span>
                </div>

            </label>
            <a class="link-bar" href="{{route('admin/'.$item->url,['id' => $item->id])}}">
                <img src="{{ asset('images/profile/'. $item->image.'') }}">
                <p>{{ $item->name }}</p>
            </a>
        </div>

        <?php
        endforeach
        ;?>
    </div>
        <br>
        <button class="btn-general-settings"><span class="bv-button__text">Save</span><span class="bv-loading-spinner bv-button__spinner"></span></button>
    </form>
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
        $('input').click(function(e){
            if($('input:checked').length > 4){
                e.preventDefault();
                alert('You can hidden 4 item');
            }
        });
    </script>
@endsection