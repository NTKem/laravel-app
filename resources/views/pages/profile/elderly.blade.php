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
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
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
                <div class="custom-slide">
                <div class="items">
                    <img src="{{ asset('images/line-height.png') }}">
                    <p>Line<br> Height</p>
                    <div class="main-action">
                        <button class="fa fa-plus"></button>
                        <input class="custom-input" type="hidden" name="line_height" value="16" min="1" max="100"/>
                        <button class="fa fa-minus"></button>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-size.png') }}">
                    <p>Font<br> Size</p>
                    <div class="main-action">
                        <button class="fa fa-plus"></button>
                        <input class="custom-input" type="hidden" name="font_size" value="16" min="1" max="100"/>
                        <button class="fa fa-minus"></button>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-spacing.png') }}">
                    <p>Font<br> Spacing</p>
                    <div class="main-action">
                        <button class="fa fa-plus"></button>
                        <input class="custom-input" type="hidden" name="font_spacing" value="0"  min="0" max="100" />
                        <button class="fa fa-minus"></button>
                    </div>
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
                <div class="custom-slide">
                <div class="items radio-input">
                    <img src="{{ asset('images/color/Grayscale.png') }}">
                    <p>Grayscale</p>
                    <input type="radio" name="color_more" data-name="grayscale" value="grayscale"/>
                </div>
                <div class="items radio-input">
                    <img src="{{ asset('images/color/invert-colors.png') }}">
                    <p>Invert Colors</p>
                    <input type="radio" name="color_more" data-name="invert_colors" value="invert_colors" />
                </div>
                <div class="items radio-input">
                    <img src="{{ asset('images/color/sepia.png') }}">
                    <p>Sepia</p>
                    <input type="radio" name="color_more" data-name="sepia" value="sepia"/>
                </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Highlight'): ?>
            <div class="menu-bar hidden highlight" id="tabs-{{$key}}">
                <div class="custom-slide">
                <div class="items" >
                    <img src="{{ asset('images/highlight/title.png') }}">
                    <p>Highlight Title</p>
                    <input type="checkbox" name="highlight_title" data-name="highlight_title" value="highlight_title"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/highlight/links.png') }}">
                    <p>Highlight Link</p>
                    <input type="checkbox" name="highlight_links" data-name="highlight_links" value="highlight_links"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/highlight/focus.png') }}">
                    <p>Highlight Focus</p>
                    <input type="checkbox" name="highlight_focus" data-name="highlight_focus" value="highlight_focus" />
                </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Ship Link'): ?>
            <div class="menu-bar hidden skip-link" id="tabs-{{$key}}">
                <div class="custom-slide">
                <div class="items">
                    <img src="{{ asset('images/skip/title.png') }}">
                    <p>Skip Title</p>
                    <input type="checkbox" name="skip_title" data-name="skip_title" value="skip_title" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/skip/links.png') }}">
                    <p>Skip Link</p>
                    <input type="checkbox" name="skip_links" data-name="skip_links" value="skip_links" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/skip/focus.png') }}">
                    <p>Skip Focus</p>
                    <input type="checkbox" name="skip_focus" data-name="skip_focus" value="skip_focus" />
                </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Screen Settings'): ?>
            <div class="menu-bar hidden screen_settings" id="tabs-{{$key}}">
                <div class="custom-slide">
                <div class="items">
                    <img src="{{ asset('images/screen-settings/mask.png') }}">
                    <p>Screen Mask</p>
                    <input type="checkbox" name="screen_settings" data-name="screen_settings" value="screen_settings"/>
                </div>
                <div class="items">
                    <img src="{{ asset('images/screen-settings/ruler.png') }}">
                    <p>Screen Ruler</p>
                    <input type="checkbox" name="screen_ruler" data-name="screen_ruler" value="screen_ruler"/>
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
            </div>
            <?php elseif ($menu_items->name == 'Zoom'): ?>
            <div class="menu-bar hidden zoom" id="tabs-{{$key}}">
                <div class="custom-slide">
                <div class="items zoom-increase radio-input">
                    <img src="{{ asset('images/zoom/increase.png') }}">
                    <p>Increase</p>
                </div>
                <div class="items zoom-decrease radio-input">
                    <img src="{{ asset('images/zoom/decrease.png') }}">
                    <p>Decrease</p>
                </div>
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
                <div class="custom-slide">
                <div class="items">
                    <img src="{{ asset('images/tooltips/permanent.png') }}">
                    <p>Permanent</p>
                    <input type="checkbox" name="tooltip_permanent" data-name="tooltip_permanent" value="tooltip_permanent" />
                </div>
                <div class="items">
                    <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                    <p>On Mouse Over</p>
                    <input type="checkbox" name="tooltip_mouseover" data-name="tooltip_mouseover" value="tooltip_mouseover" />
                </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Other'): ?>
            <div class="menu-bar hidden others" id="tabs-{{$key}}">
                <div class="custom-slide">
                <div class="items">
                    <img src="{{ asset('images/others/plain-text-mode.png') }}">
                    <p>Plain Text Mode</p>
                    <input type="checkbox" name="text_mode" data-name="text_mode" value="text_mode" />
                </div>
                <div class="items reset">
                    <img src="{{ asset('images/others/reset.png') }}">
                    <p>Reset</p>
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function slick(){
            if(window.innerWidth <= 767){
                $('.custom-slide').slick({
                    infinite: true,
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                    slidesToScroll: 1
                });
                $('.tab-bar').slick({
                    infinite: true,
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                    slidesToScroll: 1
                });
            }else{
                $('.custom-slide').slick('unslick');
                $('.tab-bar').slick('unslick');
            }
        };
        slick();
        $( window ).resize(function() {
            setTimeout(function(){
                slick();
            }, 3000);
        });
    </script>
@endsection