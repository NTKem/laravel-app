@extends('../../layouts.app')
@section('class','ederly')
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
    <div class="main-section">
        <div class="menu-bar active-bar hidden readable-text" id="tabs-1">
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
        <div class="menu-bar hidden change-font" id="tabs-2">
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
        <div class="menu-bar hidden color-more" id="tabs-3">
            <div class="items">
                <img src="{{ asset('images/color/Grayscale.png') }}">
                <p>Grayscale</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/color/invert-colors.png') }}">
                <p>Invert Colors</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/color/sepia.png') }}">
                <p>Sepia</p>
            </div>
        </div>
        <div class="menu-bar hidden highlight" id="tabs-4">
            <div class="items">
                <img src="{{ asset('images/highlight/title.png') }}">
                <p>Highlight Title</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/highlight/focus.png') }}">
                <p>Highlight Link</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/highlight/links.png') }}">
                <p>Highlight Focus</p>
            </div>
        </div>
        <div class="menu-bar hidden skip-link" id="tabs-5">
            <div class="items">
                <img src="{{ asset('images/skip/title.png') }}">
                <p>Skip Title</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/skip/focus.png') }}">
                <p>Skip Link</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/skip/links.png') }}">
                <p>Skip Focus</p>
            </div>
        </div>
        <div class="menu-bar hidden screen-settings" id="tabs-6">
            <div class="items">
                <img src="{{ asset('images/screen-settings/mask.png') }}">
                <p>Screen Mask</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/screen-settings/ruler.png') }}">
                <p>Screen Ruler</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/screen-settings/cursor.png') }}">
                <p>Blank Cursor</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/screen-settings/white-cursor.png') }}">
                <p>White Cursor</p>
            </div>
        </div>
        <div class="menu-bar hidden zoom" id="tabs-7">
            <div class="items">
                <img src="{{ asset('images/zoom/increase.png') }}">
                <p>Increase</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/zoom/decrease.png') }}">
                <p>Decrease</p>
            </div>
        </div>
        <div class="menu-bar hidden contrast" id="tabs-8">
            <div class="contrast-content">
                <?php for($i=1; $i <= 21; $i++):?>
                <?php if($i == 1):?>
                    <div class="contrast-items" data-index="<?= $i?>">
                        <i class="far fa-times-circle"></i>
                    </div>
                <?php else: ?>
                    <div class="contrast-items" data-index="<?= $i?>">
                        A
                    </div>
                <?php endif; ?>

                <?php endfor; ?>
            </div>
        </div>
        <div class="menu-bar hidden tooltips" id="tabs-9">
            <div class="items">
                <img src="{{ asset('images/tooltips/permanent.png') }}">
                <p>Permanent</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                <p>On Mouse Over</p>
            </div>
        </div>
        <div class="menu-bar hidden others" id="tabs-10">
            <div class="items">
                <img src="{{ asset('images/others/plain-text-mode.png') }}">
                <p>Plain Text Mode</p>
            </div>
            <div class="items">
                <img src="{{ asset('images/others/reset.png') }}">
                <p>Reset</p>
            </div>
        </div>
    </div>
@endsection