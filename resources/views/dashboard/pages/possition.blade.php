@extends('../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin settings')
@section('content')
    <style>
        .mc-general-settings {
            padding:35px;
            text-align: center;
        }

        .picker-default {
            border: 1px solid #ddd;
            height: 200px;
            position: relative;
            max-width:300px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: auto;
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
        .Orders-trigger-container{
            display: block !important;
            position: fixed;
            z-index: 99999;
        }
        .Orders-trigger-container.middle-left{
            left:20px;
            top: 50%;
        }
        .Orders-trigger-container.middle-right{
            right:20px;
            top: 50%;
        }
        .Orders-trigger-container.bottom-left{
            bottom: 50px;
            left: 20px;
        }
        .Orders-trigger-container.bottom-right{
            bottom: 50px;
            right: 20px;
        }
        .Orders-trigger-container.bottom-middle{
            bottom: 50px;
            left: 0;
            right:0;
            margin: auto;
        }
        .Orders-trigger-container.default{
            bottom: 50px;
            right: 20px;
        }
    </style>
    <div class="main-picker">
        <div class="card-section mc-general-settings">
            <p>Choose the placement of the icon:</p>
            <div class="picker-default">
                <form method="post" action="add-picker">
                    @csrf
                <label class="container" style="top:50%;left:0">
                    <div class="check-container">
                        <input class="middle-left" data-text="Middle Left" value="middle-left" type="radio" name="check">
                        <span class="checkmark"></span>
                    </div>

                </label>
                <label class="container" style="top:50%;right:0">
                    <div class="check-container">
                    <input class="middle-right" data-text="Middle Right" value="middle-right"  type="radio" name="check">
                    <span class="checkmark"></span>
                    </div>
                </label>
                <label class="container" style="bottom:0;left:0">
                    <div class="check-container">
                    <input class="bottom-left" data-text="Bottom Left" value="bottom-left"  type="radio" name="check">
                    <span class="checkmark"></span>
                    </div>
                </label>
                <label class="container" style="bottom:0;right:0">
                    <div class="check-container">
                    <input class="bottom-right" data-text="Bottom Right" value="bottom-right"  type="radio" name="check">
                    <span class="checkmark"></span>
                    </div>
                </label>
                <label class="container" style="bottom:0;left:0;right:0;margin:auto;">
                    <div class="check-container">
                    <input class="bottom-middle" data-text="Bottom Middle" value="bottom-middle"  type="radio" name="check">
                    <span class="checkmark"></span>
                    </div>
                </label>
                <div> Placement:</div>
                <div class="picker-text"></div>
            </div>
            <button class="btn-general-settings"><span class="bv-button__text">Save</span><span class="bv-loading-spinner bv-button__spinner"></span></button>
            </form>
        </div>

    </div>
    <div class="Orders-trigger-container  @if(isset($id->picker)) {{$id->picker}} @else default  @endif">
        <div role="button" aria-expanded="false" tabindex="0" class="hikeOrders-trigger showNow">
            <span class="icon icon-a11y-0"></span>
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
                title: 'Settings',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endif
    <script>
        @if(isset($id->picker))
        $('.{{$id->picker}}').parents('.check-container').trigger('click');
        $('.picker-text').text($('.{{$id->picker}}').data('text'));
        @endif
        $(function(){
            $('input[name="check"]').click(function () {
                $('.Orders-trigger-container').removeClass().addClass('Orders-trigger-container '+ $(this).attr('class'));
                $('.picker-text').text($(this).data('text'));
            });
        });

    </script>
@endsection