<?php
if(isset($_GET['shop'])){
    $domain = $_GET['shop'];
}
if(isset($_GET['admin'])){
    $page = 'admin-page';
}else{
    $page = 'fontend-pages';
}
if($layout == ''){
    $layout = 'default';
}
?>
@extends('../../layouts.app')
@section('class',$layout.' ederly profile '.$page)
@section('content')
    <div class="tab-bar">
        <?php foreach ($site_menu as  $key => $menu_items):?>
        <div class="items <?php if($key == 0):?>items-active<?php endif; ?>" data-href="#tabs-{{$key}}">{{ $menu_items->name }}</div>
        <?php endforeach;?>
    </div>
    <div class="main-section">
            <?php foreach ($site_menu as  $key => $menu_items):?>
            <?php if($menu_items->name == 'Readable Text'):?>
            <div class="menu-bar active-bar hidden readable-text" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/line-height.png') }}">
                    <p>Line<br> Height</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input class="custom-input" type="hidden" name="line_height" value="16" min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-size.png') }}">
                    <p>Font<br> Size</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input class="custom-input" type="hidden" name="font_size" value="16" min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-spacing.png') }}">
                    <p>Font<br> Spacing</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input class="custom-input" type="hidden" name="font_spacing" value="0"  min="0" max="100" />
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Change Font'): ?>
            <div class="menu-bar hidden change-font" id="tabs-{{$key}}">
                <div class="font-list radio-check">
                    <?php foreach ($site_font as $font_items):?>
                        <div class="list-items radio-input">
                            <input type="radio" data-action="{{$font_items->font_face}}" name="font_family" value="{{$font_items->font_face}}"/>
                            {{$font_items->name}}
                        </div>
                    <?php endforeach;?>
                    <?php  if($custom_font != ''): ?>
                        <?php foreach ($custom_font as $font_items):?>
                        <?php if($font_items->url != null):?>
                        <div class="list-items radio-input">
                            <input type="radio" data-action="{{$font_items->font_face}}" name="font_family" value="{{$font_items->font_face}}"/>
                            {{$font_items->name}}
                        </div>
                        <?php else: ?>
                        <div class="list-items radio-input">
                            <input type="radio" data-action="{{$font_items->name}}" name="font_family" value="{{$font_items->name}}"/>
                            {{$font_items->name}}
                        </div>
                        <?php endif; ?>

                        <?php endforeach;?>
                    <?php endif; ?>
                </div>

            </div>
            <?php elseif ($menu_items->name == 'Color More'): ?>
            <div class="menu-bar hidden color-more radio-check" id="tabs-{{$key}}">
                <div class="items radio-input">
                    <img src="{{ asset('images/color/Grayscale.png') }}">
                    <p>Grayscale</p>
                    <input type="radio" name="color_more" value="grayscale"/>
                </div>
                <div class="items radio-input">
                    <img src="{{ asset('images/color/invert-colors.png') }}">
                    <p>Invert Colors</p>
                    <input type="radio" name="color_more" value="invert_colors" />
                </div>
                <div class="items radio-input">
                    <img src="{{ asset('images/color/sepia.png') }}">
                    <p>Sepia</p>
                    <input type="radio" name="color_more" value="sepia"/>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Highlight'): ?>
            <div class="menu-bar hidden highlight" id="tabs-{{$key}}">
                <div class="items" >
                    <img src="{{ asset('images/highlight/title.png') }}">
                    <p>Highlight Title</p>
                    <input type="checkbox" name="highlight_title" value="true"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/highlight/links.png') }}">
                    <p>Highlight Link</p>
                    <input type="checkbox" name="highlight_links" value="true"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/highlight/focus.png') }}">
                    <p>Highlight Focus</p>
                    <input type="checkbox" name="highlight_focus" value="true" />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Ship Link'): ?>
            <div class="menu-bar hidden skip-link" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/skip/title.png') }}">
                    <p>Skip Title</p>
                    <input type="checkbox" name="skip_title" value="true" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/skip/links.png') }}">
                    <p>Skip Link</p>
                    <input type="checkbox" name="skip_links" value="true" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/skip/focus.png') }}">
                    <p>Skip Focus</p>
                    <input type="checkbox" name="skip_focus" value="true" />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Screen Settings'): ?>
            <div class="menu-bar hidden screen_settings" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/screen-settings/mask.png') }}">
                    <p>Screen Mask</p>
                    <input type="checkbox" name="screen_settings" value="true"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/screen-settings/ruler.png') }}">
                    <p>Screen Ruler</p>
                    <input type="checkbox" name="screen_ruler" value="true"/>
                </div>
                <div class="items radio-items">
                    <img src="{{ asset('images/screen-settings/cursor.png') }}">
                    <p>Blank Cursor</p>
                    <input type="radio" name="screen_cursor" value="screen_cursor-blank"/>
                </div>
                <div class="items radio-items">
                    <img src="{{ asset('images/screen-settings/white-cursor.png') }}">
                    <p>White Cursor</p>
                    <input type="radio" name="screen_cursor" value="screen_cursor-white" />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Zoom'): ?>
            <div class="menu-bar hidden zoom" id="tabs-{{$key}}">
                <div class="items zoom-increase radio-input">
                    <img src="{{ asset('images/zoom/increase.png') }}">
                    <p>Increase</p>
                </div>
                <div class="items zoom-decrease radio-input">
                    <img src="{{ asset('images/zoom/decrease.png') }}">
                    <p>Decrease</p>
                </div>
                <input type="hidden" class="zoom-input" value="0"name="zoom" min="-3" max="3">
            </div>
            <?php elseif ($menu_items->name == 'Contrast'): ?>
            <div class="menu-bar hidden contrast" id="tabs-{{$key}}">
                <div class="contrast-content">
                    <?php foreach ($site_contrast as  $key => $color_items):?>
                    <?php if($color_items->color == 'null'):?>
                    <div class="contrast-items" data-index="<?= $key?>" data-id="{{$color_items->id}}">
                        <i class="far fa-times-circle"></i>
                        <input type="radio" name="contrast" value="default" />
                    </div>
                    <?php else: ?>
                    <div class="contrast-items" data-index="<?= $key?>" style="background: {{$color_items->background}};color:{{$color_items->color}}" data-id="{{$color_items->id}}">
                        A
                        <input type="radio" name="contrast" value="contrast-{{$color_items->id}}" />
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
                    <input type="checkbox" name="tooltip_permanent" value="true" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                    <p>On Mouse Over</p>
                    <input type="checkbox" name="tooltip_mouseover" value="true" />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Other'): ?>
            <div class="menu-bar hidden others" id="tabs-{{$key}}">
                <div class="items">
                    <img src="{{ asset('images/others/plain-text-mode.png') }}">
                    <p>Plain Text Mode</p>
                    <input type="checkbox" name="text_mode" value="true" />
                </div>
                <div class="items reset">
                    <img src="{{ asset('images/others/reset.png') }}">
                    <p>Reset</p>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
    </div>
@endsection