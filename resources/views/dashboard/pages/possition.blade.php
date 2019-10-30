@extends('../../layouts.admin')
@section('class','index-admin settings')
@section('content')
    <div class="menu-bar">
        <div class="items radio-input  <?php if($layout['value'] == 'right' ):?> active-checkbox <?php endif; ?>">
            <img src="https://ntkem.test/images/profile/ederly.png">
            <p>Right</p>
            <input type="radio" name="layout" value="right" />
        </div>
        <div class="items radio-input  <?php if($layout['value'] == 'left' ):?> active-checkbox <?php endif; ?>">
            <img src="https://ntkem.test/images/profile/ederly.png">
            <p>Left</p>
            <input type="radio" name="layout" value="left" />
        </div>
        <div class="items radio-input <?php if($layout['value'] == 'middle' ):?> active-checkbox <?php endif; ?>">
            <img src="https://ntkem.test/images/profile/ederly.png">
            <p>Middle</p>
            <input type="radio" name="layout" value="middle" />
        </div>
    </div>
    <iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://ntkem.test/profile" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 350px; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important; "></iframe>
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
@endsection