@extends('../../layouts.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class','index-admin ederly profile main-bottom')
@section('content')
    <div class="tab-bar">
        <?php foreach ($site_menu as  $key => $menu_items):?>
        <div class="items <?php if($key == 0):?>items-active<?php endif; ?>"
             data-href="#tabs-{{$key}}">{{ $menu_items->name }}</div>
        <?php endforeach;?>
    </div>
    <div class="main-section">
        <form method="post" action="admin/settings" class="form-settings">
            {{ csrf_field() }}
            <input hidden name="shop_id" value="{{ $shop->id }}"/>
            <input hidden name="profile_id" value="{{ $id }}"/>
            <?php foreach ($site_menu as  $key => $menu_items):?>
            <?php if($menu_items->name == 'Readable Text'):?>
            <div class="menu-bar active-bar hidden readable-text" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items">
                        <img src="{{ asset('images/line-height.png') }}">
                        <p>Line<br> Height</p>
                        <div class="main-action">
                            <i class="fa fa-plus"></i>
                            <input class="custom-input" type="text" name="line_height"
                                   <?php if($settings->line_height):?> value="{{$settings->line_height}}"
                                   <?php else: ?>value="10" <?php endif?> min="1" max="100"/>
                            <i class="fa fa-minus"></i>
                        </div>
                    </div>
                    <div class="items">
                        <img src="{{ asset('images/Font-size.png') }}">
                        <p>Font<br> Size</p>
                        <div class="main-action">
                            <i class="fa fa-plus"></i>
                            <input class="custom-input" type="text" name="font_size"
                                   <?php if($settings->font_size):?> value="{{$settings->font_size}}"
                                   <?php else: ?>value="10" <?php endif?> min="1" max="100"/>
                            <i class="fa fa-minus"></i>
                        </div>
                    </div>
                    <div class="items">
                        <img src="{{ asset('images/Font-spacing.png') }}">
                        <p>Font<br> Spacing</p>
                        <div class="main-action">
                            <i class="fa fa-plus"></i>
                            <input class="custom-input" type="text" name="font_spacing"
                                   <?php if($settings->font_spacing):?> value="{{$settings->font_spacing}}"
                                   <?php else: ?>value="0" <?php endif?>  min="0" max="100"/>
                            <i class="fa fa-minus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Change Font'): ?>
            <div class="menu-bar hidden change-font" id="tabs-{{$key}}">
                <div class="font-list radio-check">
                    <?php foreach ($site_font as $font_items):?>
                    <div class="list-items radio-input <?php if($settings->font_family == $font_items->font_face):?> active-checkbox <?php endif;?>">
                        <input type="radio" data-action="{{$font_items->font_face}}" name="font_family"
                               value="{{$font_items->font_face}}"
                               <?php if($settings->font_family == $font_items->font_face):?>checked <?php endif;?>/>
                        {{$font_items->name}}
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Color More'): ?>
            <div class="menu-bar hidden color-more radio-check" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items radio-input <?php if($settings->color_more == 'grayscale'):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/color/Grayscale.png') }}">
                        <p>Grayscale</p>
                        <input type="radio" name="color_more" data-name="grayscale" value="grayscale"
                               <?php if($settings->color_more == 'grayscale'):?> checked <?php endif?> />
                    </div>
                    <div class="items radio-input <?php if($settings->color_more == 'invert_colors'):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/color/invert-colors.png') }}">
                        <p>Invert Colors</p>
                        <input type="radio" name="color_more" data-name="invert_colors" value="invert_colors"
                               <?php if($settings->color_more == 'invert_colors'):?> checked <?php endif?> />
                    </div>
                    <div class="items radio-input <?php if($settings->color_more == 'invert_colors'):?> sepia <?php endif?>">
                        <img src="{{ asset('images/color/sepia.png') }}">
                        <p>Sepia</p>
                        <input type="radio" name="color_more" data-name="sepia" value="sepia"
                               <?php if($settings->color_more == 'sepia'):?> checked <?php endif?>/>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Highlight'): ?>
            <div class="menu-bar hidden highlight" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items <?php if($settings->highlight_title):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/highlight/title.png') }}">
                        <p>Highlight Title</p>
                        <input type="checkbox" name="highlight_title" data-name="highlight_title"
                               value="highlight_title" <?php if($settings->highlight_title):?> checked <?php endif?>/>
                    </div>
                    <div class="items <?php if($settings->highlight_links):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/highlight/links.png') }}">
                        <p>Highlight Link</p>
                        <input type="checkbox" name="highlight_links" value="highlight_links"
                               data-name="highlight_links"
                               <?php if($settings->highlight_links):?> checked <?php endif?> />
                    </div>
                    <div class="items <?php if($settings->highlight_focus):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/highlight/focus.png') }}">
                        <p>Highlight Focus</p>
                        <input type="checkbox" name="highlight_focus" data-name="highlight_focus"
                               value="highlight_focus" <?php if($settings->highlight_focus):?> checked <?php endif?> />
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Ship Link'): ?>
            <div class="menu-bar hidden skip-link" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items <?php if($settings->skip_title):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/skip/title.png') }}">
                        <p>Skip Title</p>
                        <input type="checkbox" name="skip_title" data-name="skip_title" value="skip_title"
                               <?php if($settings->skip_title):?> checked <?php endif?>/>
                    </div>
                    <div class="items <?php if($settings->skip_links):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/skip/links.png') }}">
                        <p>Skip Link</p>
                        <input type="checkbox" name="skip_links" data-name="skip_links" value="skip_links"
                               <?php if($settings->skip_links):?> checked <?php endif?>/>
                    </div>
                    <div class="items <?php if($settings->skip_focus):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/skip/focus.png') }}">
                        <p>Skip Focus</p>
                        <input type="checkbox" name="skip_focus" data-name="skip_focus" value="skip_focus"
                               <?php if($settings->skip_focus):?> checked <?php endif?>/>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Screen Settings'): ?>
            <div class="menu-bar hidden screen_settings" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items <?php if($settings->screen_settings):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/screen-settings/mask.png') }}">
                        <p>Screen Mask</p>
                        <input type="checkbox" name="screen_settings" value="screen_settings"
                               data-name="screen_settings"
                               <?php if($settings->screen_settings):?> checked <?php endif?>/>
                    </div>
                    <div class="items <?php if($settings->screen_ruler):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/screen-settings/ruler.png') }}">
                        <p>Screen Ruler</p>
                        <input type="checkbox" name="screen_ruler" value="screen_ruler" data-name="screen_ruler"
                               <?php if($settings->screen_ruler):?> checked <?php endif?>/>
                    </div>
                    <div class="items radio-items <?php if($settings->screen_cursor == 'screen_cursor-blank'):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/screen-settings/cursor.png') }}">
                        <p>Blank Cursor</p>
                        <input type="radio" name="screen_cursor" value="screen_cursor-blank"
                               <?php if($settings->screen_cursor == 'screen_cursor-blank'):?> checked <?php endif?>/>
                    </div>
                    <div class="items radio-items <?php if($settings->screen_cursor == 'screen_cursor-white'):?> active-checkbox <?php endif?>">
                        <img src="{{ asset('images/screen-settings/white-cursor.png') }}">
                        <p>White Cursor</p>
                        <input type="radio" name="screen_cursor" value="screen_cursor-white"
                               <?php if($settings->screen_cursor == 'screen_cursor-white'):?> checked <?php endif?> />
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Zoom'):
            ?>
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
                <input type="hidden" class="zoom-input" value="{{ $settings->zoom }}"
                       name="<?php if($settings->zoom > 0): ?>zoom_increase<?php elseif($settings->zoom < 0):?>zoom_decrease<?php else:?>zoom<?php endif; ?> "
                       min="-3" max="3">
            </div>
            <?php elseif ($menu_items->name == 'Contrast'): ?>
            <div class="menu-bar hidden contrast" id="tabs-{{$key}}">
                <div class="contrast-content">
                    <?php foreach ($site_contrast as  $key => $color_items):?>
                    <?php if($color_items->color == 'null'):?>
                    <div class="contrast-items <?php if($settings->contrast == 'contrast-' . $color_items->id . ''):?> active-checkbox <?php endif?>"
                         data-index="<?= $key?>" data-id="{{$color_items->id}}">
                        <i class="far fa-times-circle"></i>
                        <input type="radio" name="contrast" value="default"
                               <?php if($settings->contrast == 'contrast-' . $color_items->id . ''):?> checked <?php endif?> />
                    </div>
                    <?php else: ?>
                    <div class="contrast-items <?php if($settings->contrast == 'contrast-' . $color_items->id . ''):?> active-checkbox <?php endif?>"
                         data-index="<?= $key?>"
                         style="background: {{$color_items->background}};color:{{$color_items->color}}"
                         data-id="{{$color_items->id}}">
                        A
                        <input type="radio" name="contrast" value="contrast-{{$color_items->id}}"
                               <?php if($settings->contrast == 'contrast-' . $color_items->id . ''):?> checked <?php endif?>/>
                    </div>
                    <?php endif; ?>

                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Tool Tip'): ?>
            <div class="menu-bar hidden tooltips" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items <?php if($settings->tooltip_permanent ):?>active-checkbox<?php endif; ?>">
                        <img src="{{ asset('images/tooltips/permanent.png') }}">
                        <p>Permanent</p>
                        <input type="checkbox" name="tooltip_permanent" data-name="tooltip_permanent"
                               value="tooltip_permanent"
                               <?php if($settings->tooltip_permanent ):?>checked<?php endif; ?> />
                    </div>
                    <div class="items <?php if($settings->tooltip_mouseover ):?>active-checkbox<?php endif; ?>">
                        <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                        <p>On Mouse Over</p>
                        <input type="checkbox" name="tooltip_mouseover" value="tooltip_mouseover"
                               data-name="tooltip_mouseover"
                               <?php if($settings->tooltip_mouseover ):?>checked<?php endif; ?>/>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Other'): ?>
            <div class="menu-bar hidden others" id="tabs-{{$key}}">
                <div class="custom-slide">
                    <div class="items <?php if($settings->text_mode ):?>active-checkbox<?php endif; ?>">
                        <img src="{{ asset('images/others/plain-text-mode.png') }}">
                        <p>Plain Text Mode</p>
                        <input type="checkbox" name="text_mode" data-name="text_mode" value="text_mode"
                               <?php if($settings->text_mode ):?>checked<?php endif; ?>/>
                    </div>
                    <div class="items reset">
                        <img src="{{ asset('images/others/reset.png') }}">
                        <p>Reset</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
            <button class="btn-submit">SAVE</button>
        </form>
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
                title: 'Profile/Settings',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endif
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function slick() {
            setTimeout(function(){
                if (window.innerWidth <= 767) {
                    $(".custom-slide").not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 1,
                        arrows: false,
                        dots: false,
                        slidesToScroll: 1
                    });
                    $(".tab-bar").not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 1,
                        arrows: false,
                        dots: false,
                        slidesToScroll: 1
                    });

                } else {
                    $('.custom-slide').slick('unslick');
                    $('.tab-bar').slick('unslick');
                }
            },100);
        };
        slick();
        $(window).resize(function () {
            slick();
        });
    </script>
@endsection