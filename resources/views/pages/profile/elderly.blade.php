@extends('../../layouts.app')
@section('class','ederly')
@section('content')

    <div class="tab-bar">
        <?php foreach ($site_menu as  $key => $menu_items):?>
        <div class="items <?php if($key == 0):?>items-active<?php endif; ?>" data-href="#tabs-{{$key}}">{{ $menu_items->name }}</div>
        <?php endforeach;?>
    </div>
    <div class="main-section">
        <form method="post" action="settings" class="form-settings">
            {{ csrf_field() }}
            <input hidden name="shop_id" value="{{ $shopDomain->id }}" />
            <input hidden name="profile_id" value="{{ $id }}" />
            <?php foreach ($site_menu as  $key => $menu_items):?>
            <?php if($menu_items->name == 'Readable Text'):?>
            <div class="menu-bar active-bar hidden readable-text" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/line-height.png') }}">
                    <p>Line<br> Height</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input type="hidden" name="line_height" value="16" min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-size.png') }}">
                    <p>Font<br> Size</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input type="hidden" name="font_size" value="16" min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-spacing.png') }}">
                    <p>Font<br> Spacing</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input type="hidden" name="font_spacing" value="16" min="0" max="100" />
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Change Font'): ?>
            <div class="menu-bar hidden change-font" id="tabs-{{$key}}">
                <div class="font-list">
                    <?php foreach ($site_font as $font_items):?>
                    <div class="list-items">
                        {{$font_items->name}}
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Color More'): ?>
            <div class="menu-bar hidden color-more" id="tabs-{{$key}}">
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
            <?php elseif ($menu_items->name == 'Highlight'): ?>
            <div class="menu-bar hidden highlight" id="tabs-{{$key}}">
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
            <?php elseif ($menu_items->name == 'Ship Link'): ?>
            <div class="menu-bar hidden skip-link" id="tabs-{{$key}}">
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
            <?php elseif ($menu_items->name == 'Screen Settings'): ?>
            <div class="menu-bar hidden screen-settings" id="tabs-{{$key}}">
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
            <?php elseif ($menu_items->name == 'Zoom'): ?>
            <div class="menu-bar hidden zoom" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/zoom/increase.png') }}">
                    <p>Increase</p>
                </div>
                <div class="items">
                    <img src="{{ asset('images/zoom/decrease.png') }}">
                    <p>Decrease</p>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Contrast'): ?>
            <div class="menu-bar hidden contrast" id="tabs-{{$key}}">
                <div class="contrast-content">
                    <?php foreach ($site_contrast as  $key => $color_items):?>
                    <?php if($color_items->color == 'null'):?>
                    <div class="contrast-items" data-index="<?= $key?>" data-id="{{$color_items->id}}">
                        <i class="far fa-times-circle"></i>
                    </div>
                    <?php else: ?>
                    <div class="contrast-items" data-index="<?= $key?>" style="background: {{$color_items->background}};color:{{$color_items->color}}" data-id="{{$color_items->id}}">
                        A
                    </div>
                    <?php endif; ?>

                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Tool Tip'): ?>
            <div class="menu-bar hidden tooltips" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/tooltips/permanent.png') }}">
                    <p>Permanent</p>
                </div>
                <div class="items">
                    <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                    <p>On Mouse Over</p>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Other'): ?>
            <div class="menu-bar hidden others" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/others/plain-text-mode.png') }}">
                    <p>Plain Text Mode</p>
                </div>
                <div class="items">
                    <img src="{{ asset('images/others/reset.png') }}">
                    <p>Reset</p>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
            <button>Save</button>
        </form>
    </div>
@endsection