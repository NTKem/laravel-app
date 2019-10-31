@extends('../layouts.admin')
@section('class','index-admin home')
@section('content')
    <div class="menu-bar">
        <div class="items">
            <a class="link-bar" href="admin/profile">
                <img src="{{ asset('images/profile/ederly.png') }}">
                <p>Profile</p>
            </a>
        </div>
        <div class="items">
            <a class="link-bar" href="admin/settings">
                <img src="{{ asset('images/profile/ederly.png') }}">
                <p>Settings</p>
            </a>
        </div>
        <div class="items">
            <a class="link-bar" href="admin/upload-font">
                <img src="{{ asset('images/profile/ederly.png') }}">
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
@endsection