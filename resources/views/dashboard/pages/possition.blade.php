@extends('../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin settings admin-position')
@section('content')
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