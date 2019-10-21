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
                        <input type="hidden" name="line_height" <?php if($settings->line_height):?> value="{{$settings->line_height}}" <?php else: ?>value="16" <?php endif?>min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-size.png') }}">
                    <p>Font<br> Size</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input type="hidden" name="font_size" <?php if($settings->font_size):?> value="{{$settings->font_size}}" <?php else: ?>value="16" <?php endif?> min="1" max="100"/>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="items">
                    <img src="{{ asset('images/Font-spacing.png') }}">
                    <p>Font<br> Spacing</p>
                    <div class="main-action">
                        <i class="fa fa-plus"></i>
                        <input type="hidden" name="font_spacing" <?php if($settings->font_spacing):?> value="{{$settings->font_spacing}}" <?php else: ?>value="0" <?php endif?>  min="0" max="100" />
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Change Font'): ?>
            <div class="menu-bar hidden change-font" id="tabs-{{$key}}">
                <div class="font-list">
                    <?php foreach ($site_font as $font_items):?>
                    <div class="list-items <?php if($settings->font_family == $font_items->id ):?> active-checkbox <?php endif?>">
                        <input type="radio" name="font" value="{{$font_items->id}}" <?php if($settings->font_family == $font_items->id ):?> checked <?php endif?>/>
                        {{$font_items->name}}
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Color More'): ?>
            <div class="menu-bar hidden color-more" id="tabs-{{$key}}">
                <div class="items <?php if($settings->grayscale == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/color/Grayscale.png') }}">
                    <p>Grayscale</p>
                    <input type="checkbox" name="grayscale" value="true" <?php if($settings->grayscale == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->invert_colors == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/color/invert-colors.png') }}">
                    <p>Invert Colors</p>
                    <input type="checkbox" name="invert_colors" value="true" <?php if($settings->invert_colors == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->sepia == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/color/sepia.png') }}">
                    <p>Sepia</p>
                    <input type="checkbox" name="sepia" value="true" <?php if($settings->sepia == 'true'):?> checked <?php endif?> />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Highlight'): ?>
            <div class="menu-bar hidden highlight" id="tabs-{{$key}}">
                <div class="items <?php if($settings->highlight == 'true'):?> active-checkbox <?php endif?>" >
                    <img src="{{ asset('images/highlight/title.png') }}">
                    <p>Highlight Title</p>
                    <input type="checkbox" name="highlight" value="true" <?php if($settings->highlight == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->highlight_focus == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/highlight/focus.png') }}">
                    <p>Highlight Link</p>
                    <input type="checkbox" name="highlight_focus" value="true"  <?php if($settings->highlight_focus == 'true'):?> checked <?php endif?>/>
                </div>
                <div class="items <?php if($settings->highlight_links == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/highlight/links.png') }}">
                    <p>Highlight Focus</p>
                    <input type="checkbox" name="highlight_links" value="true" <?php if($settings->highlight_links == 'true'):?> checked <?php endif?> />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Ship Link'): ?>
            <div class="menu-bar hidden skip-link" id="tabs-{{$key}}">
                <div class="items <?php if($settings->skip_title == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/skip/title.png') }}">
                    <p>Skip Title</p>
                    <input type="checkbox" name="skip_title" value="true" <?php if($settings->skip_title == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->skip_focus == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/skip/focus.png') }}">
                    <p>Skip Link</p>
                    <input type="checkbox" name="skip_focus" value="true" <?php if($settings->skip_focus == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->skip_links == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/skip/links.png') }}">
                    <p>Skip Focus</p>
                    <input type="checkbox" name="skip_links" value="true"  <?php if($settings->skip_links == 'true'):?> checked <?php endif?> />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Screen Settings'): ?>
            <div class="menu-bar hidden screen_settings" id="tabs-{{$key}}">
                <div class="items <?php if($settings->screen_settings == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/screen-settings/mask.png') }}">
                    <p>Screen Mask</p>
                    <input type="checkbox" name="screen_settings" value="true" <?php if($settings->screen_settings == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->screen_ruler == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/screen-settings/ruler.png') }}">
                    <p>Screen Ruler</p>
                    <input type="checkbox" name="screen_ruler" value="true" <?php if($settings->screen_ruler == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items radio-items <?php if($settings->screen_cursor == 'blank'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/screen-settings/cursor.png') }}">
                    <p>Blank Cursor</p>
                    <input type="radio" name="screen_cursor" value="blank" <?php if($settings->screen_cursor == 'blank'):?> checked <?php endif?> />
                </div>
                <div class="items radio-items <?php if($settings->screen_cursor == 'white'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/screen-settings/white-cursor.png') }}">
                    <p>White Cursor</p>
                    <input type="radio" name="screen_cursor" value="white" <?php if($settings->screen_cursor == 'white'):?> checked <?php endif?> />
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Zoom'): ?>
            <div class="menu-bar hidden zoom" id="tabs-{{$key}}">
                <div class="items zoom-increase <?php if($settings->zoom > 0):?>active-checkbox<?php endif?>">
                    <img src="{{ asset('images/zoom/increase.png') }}">
                    <p>Increase</p>
                </div>
                <div class="items zoom-decrease <?php if($settings->zoom < 0):?>active-checkbox<?php endif?>">
                    <img src="{{ asset('images/zoom/decrease.png') }}">
                    <p>Decrease</p>
                </div>
                <input type="hidden" class="zoom-input" <?php if($settings->zoom):?> value="{{$settings->zoom}}"<?php else:?>value="0"<?php endif?> name="zoom" min="-3" max="3">
            </div>
            <?php elseif ($menu_items->name == 'Contrast'): ?>
            <div class="menu-bar hidden contrast" id="tabs-{{$key}}">
                <div class="contrast-content">
                    <?php foreach ($site_contrast as  $key => $color_items):?>
                    <?php if($color_items->color == 'null'):?>
                    <div class="contrast-items <?php if($settings->contrast == $color_items->id):?> active-checkbox <?php endif?>" data-index="<?= $key?>" data-id="{{$color_items->id}}">
                        <i class="far fa-times-circle"></i>
                        <input type="radio" name="contrast" value="default" <?php if($settings->contrast == $color_items->id):?> checked <?php endif?> />
                    </div>
                    <?php else: ?>
                    <div class="contrast-items <?php if($settings->contrast == $color_items->id):?> active-checkbox <?php endif?>" data-index="<?= $key?>" style="background: {{$color_items->background}};color:{{$color_items->color}}" data-id="{{$color_items->id}}">
                        A
                        <input type="radio" name="contrast" value="{{$color_items->id}}" <?php if($settings->contrast == $color_items->id):?> checked <?php endif?> />
                    </div>
                    <?php endif; ?>

                    <?php endforeach;?>
                </div>
            </div>
            <?php elseif ($menu_items->name == 'Tool Tip'): ?>
            <div class="menu-bar hidden tooltips" id="tabs-{{$key}}">
                <div class="items <?php if($settings->tooltip_permanent == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/tooltips/permanent.png') }}">
                    <p>Permanent</p>
                    <input type="checkbox" name="tooltip_permanent" value="true" <?php if($settings->tooltip_permanent == 'true'):?> checked <?php endif?> />
                </div>
                <div class="items <?php if($settings->tooltip_mouseover == 'true'):?> active-checkbox <?php endif?>">
                    <img src="{{ asset('images/tooltips/on-mouse-over.png') }}">
                    <p>On Mouse Over</p>
                    <input type="checkbox" name="tooltip_mouseover" value="true" <?php if($settings->tooltip_mouseover == 'true'):?> checked <?php endif?> />
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