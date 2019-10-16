@extends('../../layouts.app')

@section('content')
    <div class="tab-bar">
        <div class="items items-active" data-href="#tabs-1">Readable Text</div>
        <div class="items" data-href="#tabs-2">Change Font</div>
        <div class="items" data-href="#tabs-3">Color More</div>
        <div class="items" data-href="#tabs-4">Highlight</div>
        <div class="items" data-href="#tabs-5">Ship Link</div>
        <div class="items" data-href="#tabs-6">Screen Settings</div>
        <div class="items" data-href="#tabs-7">Zoom</div>
        <div class="items" data-href="#tabs-8">Contrast</div>
        <div class="items" data-href="#tabs-9">Tool Tip</div>
        <div class="items" data-href="#tabs-10">Other</div>
    </div>
    <div class="menu-bar active-bar hidden" id="tabs-1">
        <div class="items">
                <img src="{{ asset('images/line-height.png') }}">
                <p>Line<br> Height</p>
                <div class="main-action">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                </div>
        </div>
        <div class="items">
                <img src="{{ asset('images/Font-size.png') }}">
                <p>Font<br> Size</p>
                <div class="main-action">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                </div>
        </div>
        <div class="items">
                <img src="{{ asset('images/Font-spacing.png') }}">
                <p>Font<br> Spacing</p>
                <div class="main-action">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                </div>
        </div>
    </div>
    <div class="menu-bar hidden" id="tabs-2">
        <div class="font-list">
                <div class="list-items">
                    Default
                </div>
            <div class="list-items">
                 Arial
            </div>
            <div class="list-items">
                Comic Sans MS
            </div>
            <div class="list-items">
                Roboto
            </div>
            <div class="list-items">
                VerDana
            </div>
            <div class="list-items">
                Tohoma
            </div>
            <div class="list-items">
                Open Sans
            </div>
            <div class="list-items">
                Helvetica
            </div>

        </div>
    </div>
@endsection