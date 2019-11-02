@extends('../../../layouts.admin')
@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('class','home show-default upload-page edit-upload')
@section('content')
    <h2 class="title">Upload</h2>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php if($font->script != null){ ?>
        <li class="nav-item">
            <a class="nav-link " id="home-tab" data-toggle="tab" href="#gg_font" role="tab" aria-controls="home" aria-selected="true">Use Google Font</a>
        </li>
            <?php } ?>
            <?php if($font->url != null){   ?>
        <li class="nav-item">
            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#upload_font" role="tab" aria-controls="profile" aria-selected="false">Upload Font</a>
        </li>
        <?php } ?>
    </ul>
<!--   --><?php // dd($font); ?>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade <?php if($font->script != null)  { echo 'show active'; } ?>" id="gg_font" role="tabpanel" aria-labelledby="home-tab">
            <form method="POST" action="admin/edit-font/{{ $font->id }}">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input required type="text" class="form-control" placeholder="Name Font" value="{{$font->name}}" name="name" aria-label="Name Font" aria-describedby="button-addon2">
                </div>
                <div class="input-group mb-3">
                    <input required type="text" class="form-control" placeholder="Font Face" name="font_face" value="{{$font->font_face}}" aria-label="Name Font" aria-describedby="button-addon2">
                </div>
                <div class="input-group mb-3">
                    <input required type="text" class="form-control" placeholder="Google Script" name="script" aria-label="Google Script" value="{{ $font->script }}" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="up_script">Button</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade <?php if($font->url != null){ echo 'show active';} ?>" id="upload_font" role="tabpanel" aria-labelledby="profile-tab">
            <form method="POST" action="admin/upload-font" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" required class="form-control" placeholder="Name Font" value="{{$font->name}}"  name="name" aria-label="Name Font" aria-describedby="button-addon2">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="up_url">Button</button>
                    </div>
                    <div class="custom-file">
                        <input required type="file" accept=".woff,.woff2,.eot,.ttf" class="custom-file-input" name="url" id="upload-font" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">{{$font->name}}</label>
                    </div>
                </div>
            </form>
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
                title: 'Upload',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endif
    <script>
        $(function(){
            var file = document.getElementById('upload-font');
            file.onchange = function(e) {
                var ext = this.value.match(/\.([^\.]+)$/)[1];
                switch (ext) {
                    case 'woff':
                    case 'woff2':
                    case 'eot':
                    case 'ttf':
                        $('.custom-file-label').text($(this)[0].files[0].name);
                        break;
                    default:
                        $('.custom-file-label').text('Choose file');
                        this.value = '';
                }
            };
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection