@extends('../../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin home show-default main-bottom')
@section('content')
    <style>
        .items {
            position: relative;
        }

        .picker-default .container {
            position: absolute;
            width: 25px;
        }
        .check-container {
            display: block;
            position: relative;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 25px;
            height: 25px;
        }
        .check-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .check-container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .check-container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .check-container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .check-container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .btn-general-settings{
            width: 120px;
            color: #fff;
            background-color: #000;
            border: 1px solid rgba(0,0,0,.1);
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0,0,0,.1);
            cursor: pointer;
            font-size: .8125rem;
            font-weight: 600;
            letter-spacing: -.5px;
            line-height: 1.5rem;
            max-width: 100%;
            overflow: hidden;
            padding: .3125rem .75rem;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-overflow: ellipsis;
            text-transform: uppercase;
            vertical-align: middle;
            white-space: nowrap;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            transition: all .15s linear;
            margin: 10px 0 0 0;
        }
    </style>
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