@extends('../../layouts.admin')
@section('class','index-admin settings')
@section('content')
    <div class="menu-bar">
        <div class="items radio-input  <?php if($layout['value'] == 'default' ):?> active-checkbox <?php endif; ?>">
                <img src="https://ntkem.test/images/profile/ederly.png">
                <p>Current Layout</p>
                <input type="radio" name="layout" value="default" />
        </div>
        <div class="items radio-input <?php if($layout['value'] == 'footer' ):?> active-checkbox <?php endif; ?>">
                <img src="https://ntkem.test/images/profile/ederly.png">
                <p>Footer</p>
                <input type="radio" name="layout" value="footer" />
        </div>
        <div class="items radio-input <?php if($layout['value'] != 'footer' && $layout['value'] != 'default' ):?> active-checkbox <?php endif; ?>">
            <a class="link-bar" href="possitions">
                <img src="https://ntkem.test/images/profile/ederly.png">
                <p>Settings</p>
            </a>
        </div>
    </div>
    <iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://accessibilityplus.ca/profile" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 350px;height:350px; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important; "></iframe>
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