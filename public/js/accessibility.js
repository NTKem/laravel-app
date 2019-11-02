var $ = jQuery;
$(function(e){
      window.data  = {
    };
    var body = $('body'),
    new_ob,
    domain = Shopify.shop;
    window.data['domain'] = domain;
function text_mode_off(){
    $('*').each(function(){
        if($(this)[0].tagName == "IMG" || $(this)[0].tagName == "svg"){
            $(this).show();
        }else if($(this).attr('style') != '' && $(this)[0].tagName != 'LINK'){
            if($(this)[0].tagName != "IFRAME"){
                var style = $(this).attr('mode-style');
                $(this).removeAttr('mode-style').attr('style',style);
            }
        }else if($(this)[0].tagName == 'LINK'){
            if($(this).attr('rel') == 'stylesheet'){
                var src = $(this).attr('mode-href');
                $(this).removeAttr('mode-href');
                $(this).attr('href',src);
            }
        }
    });
}
    function text_mode_on(){
        $('*').each(function(){
            if($(this)[0].tagName == "IMG" || $(this)[0].tagName == "svg"){
                $(this).hide();
            }else if($(this).attr('style') != '' && $(this)[0].tagName != 'LINK'){
                if($(this)[0].tagName != "IFRAME"){
                    var style = $(this).attr('style');
                    $(this).removeAttr('style').attr('mode-style',style);
                }
            }else if($(this)[0].tagName == 'LINK'){
                if($(this).attr('rel') == 'stylesheet'){
                    var src = $(this).attr('href');
                    $(this).removeAttr('href');
                    $(this).attr('mode-href',src);
                }
            }
        });
    }
setTimeout(function(){
    var iframeSource = 'https://accessibilityplus.ca/profile?shop='+domain,
        iframeStyle ='height:350px;z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 100vh; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important;',
        iframe = document.createElement('iframe');

    iframe.setAttribute('src',iframeSource);
    iframe.setAttribute('id','hkoAccessibilityAssets');
    iframe.setAttribute('style',iframeStyle);
    document.body.appendChild(iframe);
    setTimeout(function(){
        var eventMethod = window.addEventListener
            ? "addEventListener"
            : "attachEvent";
        var eventer = window[eventMethod];
        var messageEvent = eventMethod === "attachEvent"
            ? "onmessage"
            : "message";
        eventer(messageEvent, function (e) {
            if(e.data.access === 'ACCESSIBILITY'){
                new_ob = e.data;
                Object.keys(new_ob).forEach(key => {
                    if(new_ob[key] != ''){
                        $('body').removeClass(window.data[key]);
                        if(key == 'contrast'){
                            window.data[key] = new_ob[key];
                        }
                        else if(key == 'reset'){
                            if( new_ob[key] == 'true' ){
                                Object.keys(window.data).forEach(item => {
                                    $('body').removeClass(window.data[item]);
                                });
                                text_mode_off();
                                window.data  = {};
                                window.data['layout'] = new_ob['layout'];
                                window.data['menu_bar'] = new_ob['menu_bar'];
                                new_ob={};
                                $('#readtext').remove();
                                new_ob[key] = 'false';
                            }
                        }else if(key == 'menu_bar'){
                            if(new_ob[key] == 'true'){
                                if(new_ob['layout'] != 'default'){
                                    $('#hkoAccessibilityAssets').css({'height':'350px','min-height':'350px'});
                                }else{
                                    $('#hkoAccessibilityAssets').css({'height':'50px','min-height':'auto'});
                                }
                            }else{
                                if(new_ob['layout'] != 'default'){
                                    $('#hkoAccessibilityAssets').css({'height':'50px','min-height':'auto'});
                                }else{
                                    $('#hkoAccessibilityAssets').css({'height':'350px','min-height':'350px'});
                                }
                            }
                            window.data[key] =new_ob[key];
                        }else if(key == 'text_mode'){
                            text_mode_on();
                            window.data[key] =new_ob[key];
                        }else{
                            window.data[key] =new_ob[key];
                        }
                    }else{
                        if(new_ob['text_mode'] == ''){
                            text_mode_off();
                        }
                        window.data[key] = '';
                    }
                });
                Object.keys(window.data).forEach(key => {
                    if(window.data[key] != ''){
                        if(key == 'line_height' || key == 'font_size' || key == 'font_spacing' && window.data[key] != ''){
                            var style = '<style id="readtext">  h1, h2, h3, h4, h5, h6, p, blockquote, li, a{';
                            style +='line-height:'+ window.data['line_height']+'0% !important; letter-spacing:'+ window.data['font_spacing'] +'px !important;font-size:'+ window.data['font_size']+'0% !important;';
                            style +='}</style>';
                            $('#readtext').remove();
                            $('head').append(style);
                        }else if(key == 'layout' || key == 'menu_bar' || key == 'domain' || key == 'access' ){

                        }else{
                            $('body').addClass(window.data[key]);
                            if(window.data['tooltip_mouseover'] != ''){
                                $(".tooltip_mouseover img").mousemove(function(a){
                                    var b = a.clientX + 10,
                                        c=a.clientY + 10;
                                    alt = $(this)[0].alt;
                                    $('.tooltip-on-fly').show();
                                    $('.tooltip-on-fly').text(alt).css({'top':''+c+'px','left':''+b+'px','visibility':'visible'});
                                });
                                $(".tooltip_mouseover img").mouseleave(function(){
                                    $('.tooltip-on-fly').hide().css('visibility','hidden');
                                });
                            }
                        }
                    }else{
                        $('body').removeClass(key);
                    }
                });
                if($('body').hasClass('tooltip_permanent')){
                    $('img').each(function(){
                        var left =$(this).offset().left+'px',
                            top = $(this).offset().top -30+'px',
                            alt = $(this).attr('alt');
                        if(alt != ''){
                            $('body').append('<div class="app-tooltip" style="left:'+left+';top:'+top+';opacity:1">'+alt+'</div>');
                        }
                    });
                }else{
                    $('.app-tooltip').remove();
                }
                var iframeEl = document.getElementById('hkoAccessibilityAssets');
                iframeEl.contentWindow.postMessage(window.data,'*');
            }
        });
    },100);
},1000);
    $('body').append('<div class="mask-screen-top screen_items"></div><div class="mask-screen-bottom screen_items"></div><div class="screen-ruler-box"></div>');
    $('body').append('<div class="tooltip-on-fly" style="display: inline-block;opacity: 1;"></div>');
    $("body").mousemove(function(a){
        if($(this).hasClass('screen_settings')){
            var b = a.clientY
                , c = b - 100
                , d = b + 100
                , e = $(".mask-screen-top")
                , f = $(".mask-screen-bottom");
            e.css('height',c+'px');
            f.css('top', d + 'px');
        }
        if($(this).hasClass('screen_ruler')){
            b = a.clientY+30;
                g = $(".screen-ruler-box");
                g.css('top', b + 'px');
        }
        if($(this).hasClass('tooltip_mouseover') != true){
            $('.tooltip-on-fly').hide();
        }
    });
    var css ='<style>@font-face{@import url(https://fonts.googleapis.com/css?family=Roboto&display=swap);body.highlight_title h1,body.highlight_title h1 *,body.highlight_title h2,body.highlight_title h2 *,body.highlight_title h3,body.highlight_title h3 *,body.highlight_title h4,body.highlight_title h4 *,body.highlight_title h5,body.highlight_title h5 *,body.highlight_title h6,body.highlight_title h6 *{color:#03344e!important;border-radius:4px;font-weight:900;background-color:#c6f710!important;box-shadow:0 4px 10px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)}@font-face{font-family:Open-Dyslexic;src:url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.eot);src:url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.eot?#iefix) format("embedded-opentype"),url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.woff) format("woff"),url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.ttf) format("truetype"),url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.svg#opendyslexicregular) format("svg");font-weight:400;font-style:normal}@font-face{font-family:Arial;src:url(https://jsappcdn.hikeorders.com/assets/arial.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Verdana;src:url(https://jsappcdn.hikeorders.com/assets/verdana.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:ComicSansMS;src:url(https://jsappcdn.hikeorders.com/assets/ComicSansMS.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Georgia;src:url(https://jsappcdn.hikeorders.com/assets/Georgia.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Tahoma;src:url(https://jsappcdn.hikeorders.com/assets/tahoma.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Trebuchet;src:url(https://jsappcdn.hikeorders.com/assets/Trebuchet.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Tiresias;src:url(https://jsappcdn.hikeorders.com/assets/Tiresias.ttf) format("truetype");font-weight:400;font-style:normal};body.readable-fonts-default :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:inherit}body.readable-fonts-arial :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Arial!important}body.readable-fonts-verdana :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Verdana!important}body.readable-fonts-comic-sans-ms :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:ComicSansMS!important}body.readable-fonts-georgia :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Georgia!important}body.readable-fonts-tohoma :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Tahoma!important}body.readable-fonts-trebuchet :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Trebuchet!important}body.readable-fonts-tiresias :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Tiresias!important}body.readable-fonts-open-dyslexic :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:Open-Dyslexic!important}body.readable-fonts-open-sans :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:"Open Sans",sans-serif;!important}body.readable-fonts-roboto :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:"Roboto",sans-serif;!important}body.readable-fonts-helvetica :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:"Roboto",sans-serif;!important}body.grayscale>:not(#hkoAccessibilityAssets) a,body.grayscale>:not(#hkoAccessibilityAssets) a span,body.grayscale>:not(#hkoAccessibilityAssets) b,body.grayscale>:not(#hkoAccessibilityAssets) blockquote,body.grayscale>:not(#hkoAccessibilityAssets) button,body.grayscale>:not(#hkoAccessibilityAssets) canvas,body.grayscale>:not(#hkoAccessibilityAssets) caption,body.grayscale>:not(#hkoAccessibilityAssets) center,body.grayscale>:not(#hkoAccessibilityAssets) cite,body.grayscale>:not(#hkoAccessibilityAssets) code,body.grayscale>:not(#hkoAccessibilityAssets) col,body.grayscale>:not(#hkoAccessibilityAssets) colgroup,body.grayscale>:not(#hkoAccessibilityAssets) dd,body.grayscale>:not(#hkoAccessibilityAssets) details,body.grayscale>:not(#hkoAccessibilityAssets) dfn,body.grayscale>:not(#hkoAccessibilityAssets) dir,body.grayscale>:not(#hkoAccessibilityAssets) div,body.grayscale>:not(#hkoAccessibilityAssets) dl,body.grayscale>:not(#hkoAccessibilityAssets) dt,body.grayscale>:not(#hkoAccessibilityAssets) em,body.grayscale>:not(#hkoAccessibilityAssets) embed,body.grayscale>:not(#hkoAccessibilityAssets) fieldset,body.grayscale>:not(#hkoAccessibilityAssets) figcaption,body.grayscale>:not(#hkoAccessibilityAssets) figure,body.grayscale>:not(#hkoAccessibilityAssets) font,body.grayscale>:not(#hkoAccessibilityAssets) footer,body.grayscale>:not(#hkoAccessibilityAssets) form,body.grayscale>:not(#hkoAccessibilityAssets) header,body.grayscale>:not(#hkoAccessibilityAssets) i,body.grayscale>:not(#hkoAccessibilityAssets) iframe,body.grayscale>:not(#hkoAccessibilityAssets) img,body.grayscale>:not(#hkoAccessibilityAssets) input,body.grayscale>:not(#hkoAccessibilityAssets) kbd,body.grayscale>:not(#hkoAccessibilityAssets) label,body.grayscale>:not(#hkoAccessibilityAssets) legend,body.grayscale>:not(#hkoAccessibilityAssets) li,body.grayscale>:not(#hkoAccessibilityAssets) mark,body.grayscale>:not(#hkoAccessibilityAssets) menu,body.grayscale>:not(#hkoAccessibilityAssets) meter,body.grayscale>:not(#hkoAccessibilityAssets) nav,body.grayscale>:not(#hkoAccessibilityAssets) nobr,body.grayscale>:not(#hkoAccessibilityAssets) object,body.grayscale>:not(#hkoAccessibilityAssets) ol,body.grayscale>:not(#hkoAccessibilityAssets) option,body.grayscale>:not(#hkoAccessibilityAssets) pre,body.grayscale>:not(#hkoAccessibilityAssets) progress,body.grayscale>:not(#hkoAccessibilityAssets) q,body.grayscale>:not(#hkoAccessibilityAssets) s,body.grayscale>:not(#hkoAccessibilityAssets) section,body.grayscale>:not(#hkoAccessibilityAssets) select,body.grayscale>:not(#hkoAccessibilityAssets) small,body.grayscale>:not(#hkoAccessibilityAssets) span,body.grayscale>:not(#hkoAccessibilityAssets) strike,body.grayscale>:not(#hkoAccessibilityAssets) strong,body.grayscale>:not(#hkoAccessibilityAssets) sub,body.grayscale>:not(#hkoAccessibilityAssets) summary,body.grayscale>:not(#hkoAccessibilityAssets) sup,body.grayscale>:not(#hkoAccessibilityAssets) table,body.grayscale>:not(#hkoAccessibilityAssets) td,body.grayscale>:not(#hkoAccessibilityAssets) textarea,body.grayscale>:not(#hkoAccessibilityAssets) th,body.grayscale>:not(#hkoAccessibilityAssets) time,body.grayscale>:not(#hkoAccessibilityAssets) tr,body.grayscale>:not(#hkoAccessibilityAssets) tt,body.grayscale>:not(#hkoAccessibilityAssets) u,body.grayscale>:not(#hkoAccessibilityAssets) ul,body.grayscale>:not(#hkoAccessibilityAssets) var{filter:grayscale(100%);-webkit-filter:grayscale(100%)}body.sepia>:not(#hkoAccessibilityAssets){-webkit-filter:sepia(.75) contrast(.95);filter:sepia(.75) contrast(.95);background:#fec}body.invert_colors>:not(#hkoAccessibilityAssets){-webkit-filter:invert(100%);filter:invert(100%);-o-filter:invert(100%);-moz-filter:invert(100%);background:#000!important}body.highlight_links a{text-decoration:none;background:0 0;background-color:#07a8d4!important;color:#fff!important;box-shadow:0 4px 10px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)}body.zoom_increase-1>:not(#hkoAccessibilityAssets){zoom:1.2;-ms-zoom:1.2;-webkit-zoom:1.2;-moz-transform:scale(1.15);-moz-transform-origin:top center}body.zoom_increase-2>:not(#hkoAccessibilityAssets){zoom:1.3;-ms-zoom:1.3;-webkit-zoom:1.3;-moz-transform:scale(1.2);-moz-transform-origin:top center}body.zoom_increase-3>:not(#hkoAccessibilityAssets){zoom:1.5;-ms-zoom:1.5;-webkit-zoom:1.5;-moz-transform:scale(1.4);-moz-transform-origin:top center}body.zoom_decrease--1>:not(#hkoAccessibilityAssets){zoom:.8;-ms-zoom:.8;-webkit-zoom:.8;-moz-transform:scale(.8);-moz-transform-origin:top center}body.zoom_decrease--2>:not(#hkoAccessibilityAssets){zoom:.7;-ms-zoom:.7;-webkit-zoom:.7;-moz-transform:scale(.7);-moz-transform-origin:top center}body.zoom_decrease--3>:not(#hkoAccessibilityAssets){zoom:.6;-ms-zoom:.6;-webkit-zoom:.6;-moz-transform:scale(.6);-moz-transform-origin:top center}body.stop-animation *{-webkit-animation:none!important;animation:none!important;transition:none!important;-webkit-animation-play-state:paused;-moz-animation-play-state:paused;-o-animation-play-state:paused;animation-play-state:paused}body.screen_cursor-white{cursor:url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_white.png),url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_white.cur),auto!important;z-index:2147483635}body.screen_cursor-white a{cursor:url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_white.png),url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_white.cur),auto!important;z-index:2147483635}body.screen_cursor-blank{cursor:url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_black.png),url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_black.cur),auto!important;z-index:2147483635}body.screen_cursor-blank a{cursor:url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_black.png),url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_black.cur),auto!important;z-index:2147483635}body.highlight_focus :focus,body.highlight_focus a:hover{background-color:#c6f710!important;outline:2px dashed #e65e34!important;color:#000!important;box-shadow:0 4px 10px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)}body.tooltip-permanent .app-tooltip{opacity:1}body.tooltip-mouseover .tooltip-on-fly{opacity:1}.app-tooltip{-ms-transform:translateZ(0);-moz-transform:translateZ(0);-webkit-transform:translateZ(0);transform:translateZ(0);position:absolute;max-width:300px;padding:8px 10px 10px;font-size:13px!important;word-break:break-all;line-break:auto;background-color:#2d2d2d;color:#fff;border-radius:4px;opacity:0;z-index:2147483646;-webkit-box-shadow:3px 3px 30px 0 #4d4e2d;-moz-box-shadow:3px 3px 30px 0 #4d4e2d;box-shadow:3px 3px 30px 0 #4d4e2d}.app-tooltip:after{content:"";position:absolute;top:100%;left:5%;margin-left:-5px;border-width:5px;border-style:solid;border-color:#555 transparent transparent transparent}.tooltip-on-fly{-ms-transform:translateZ(0);-moz-transform:translateZ(0);-webkit-transform:translateZ(0);transform:translateZ(0);position:fixed;max-width:200px;padding:8px 10px 10px;font-size:13px!important;word-break:break-all;line-break:auto;background-color:#2d2d2d;color:#fff;border-radius:4px;opacity:0;z-index:2147483646;-webkit-box-shadow:3px 3px 30px 0 #4d4e2d;-moz-box-shadow:3px 3px 30px 0 #4d4e2d;box-shadow:3px 3px 30px 0 #4d4e2d}body.screen_settings .mask-screen-bottom,body.screen_settings .mask-screen-top{display:block}.mask-screen-bottom,.mask-screen-top{background-color:#000;z-index:2147483646;position:fixed;opacity:1;left:0;right:0;width:100%;display:none}.mask-screen-bottom{bottom:0}.mask-screen-top{top:0}body.screen_ruler .screen-ruler-box{display:block}.screen-ruler-box{background-color:#000;z-index:2147483646;position:fixed;left:0;right:0;width:100%;top:0;display:none;height:10px}.acc-style{width:auto!important;color:inherit!important;float:none!important;text-align:inherit!important;box-shadow:unset!important}.highlight-element{background-color:#c6f710!important;border:2px dashed red;color:#000!important;box-shadow:0 4px 10px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)}.skip-to-content-btn{position:absolute;z-index:50000!important;display:inline-block!important;width:1px;height:1px;overflow:hidden;top:auto;background:0 0}.skip-to-content-btn:focus{left:0;background:#fff;color:#000;border:4px solid #555;padding:10px;font-size:16px;width:auto;height:auto;box-shadow:0 4px 10px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)}.external-link:after{font-family:hko-icons;content:" \\f08e"}.scroll-to-top{position:fixed;z-index:2147483646;height:48px;width:48px;cursor:pointer;bottom:20px;padding:5px 0;border-color:transparent;background-color:#ccc9c9;opacity:.6;background-image:none!important;line-height:1;border-radius:80%;display:none;transition:0.3s}.scroll-to-top .up-icon{font-size:34px;color:#fff}.scroll-to-top-align-left{left:20px}.scroll-to-top-align-right{right:20px}.show-scroll-top{display:inline-block}@media print{.scroll-to-top{display:none}}.lite-version-badge{bottom:0;position:fixed;right:20px;z-index:2147483644;display:none;line-height:0!important;height:40px;width:250px;border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #f15822;background-color:#f15822;border-bottom:0;font-family:Verdana!important;text-align:center!important;padding:10px 10px;color:#fff!important;-webkit-box-sizing:border-box!important;box-sizing:border-box!important}.lite-version-badge:after,.lite-version-badge:before{-webkit-box-sizing:border-box!important;box-sizing:border-box!important}.lite-version-badge .badge-heading{min-height:35px;border-bottom:1px solid #fff;margin-bottom:10px;cursor:pointer!important}.lite-version-badge .badge-heading .recommend{font-size:12px;font-weight:400;margin-bottom:16px;font-family:Verdana!important}.lite-version-badge .badge-heading .prod-name{font-size:16px;font-weight:bolder;font-family:Verdana!important}.lite-version-badge .badge-content .a11y-content{font-size:14px!important;line-height:20px!important;min-height:30px!important;font-family:Verdana!important;margin-bottom:20px!important;max-height:30px!important;color:#fff!important}.lite-version-badge .badge-content .banner_image{width:100%;margin-bottom:5px;background:#000;height:130px;background-image:url(https://jsappcdn.hikeorders.com/assets/trail-badge-image-2.png);background-repeat:no-repeat}.lite-version-badge .badge-content .a11y-get-btn{padding:10px 5px!important;background-color:#000!important;color:#fff!important;font-size:14px!important;font-weight:700!important;line-height:16px!important;width:100%!important;text-decoration:none!important;margin-bottom:20px!important;display:inline-block!important;border-radius:5px!important;font-family:Verdana!important;cursor:pointer!important;background-color:#45484d!important;background-image:-webkit-gradient(linear,left top,left bottom,from(#45484d),to(#000))!important;background-image:-webkit-linear-gradient(top,#45484d,#000)!important;background-image:-moz-linear-gradient(top,#45484d,#000)!important;background-image:-ms-linear-gradient(top,#45484d,#000)!important;background-image:-o-linear-gradient(top,#45484d,#000)!important;background-image:linear-gradient(to bottom,#45484d,#000)!important;box-shadow:0 4px 25px 0 rgba(0,0,0,.25),0 1px 2px 0 rgba(0,0,0,.1)!important;-webkit-transform:scale(1.03)!important;-ms-transform:scale(1.03)!important;vertical-align:baseline!important;-webkit-box-sizing:border-box!important;box-sizing:border-box!important}.lite-version-badge .badge-content .a11y-get-btn:after,.lite-version-badge .badge-content .a11y-get-btn:before{-webkit-box-sizing:border-box!important;box-sizing:border-box!important}.lite-version-badge .a11y-remove-link{color:#f1efef!important;font-size:11px!important;text-decoration:none!important;font-family:Verdana!important;cursor:pointer!important;text-align:left!important;display:block!important}body.contrast-1>:not(#hkoAccessibilityAssets),body.contrast-1>:not(#hkoAccessibilityAssets) div,body.contrast-1>:not(#hkoAccessibilityAssets) footer,body.contrast-1>:not(#hkoAccessibilityAssets) header{color:null!important;background-color:null!important}body.contrast-2>:not(#hkoAccessibilityAssets),body.contrast-2>:not(#hkoAccessibilityAssets) div,body.contrast-2>:not(#hkoAccessibilityAssets) footer,body.contrast-2>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#fff!important}body.contrast-3>:not(#hkoAccessibilityAssets),body.contrast-3>:not(#hkoAccessibilityAssets) div,body.contrast-3>:not(#hkoAccessibilityAssets) footer,body.contrast-3>:not(#hkoAccessibilityAssets) header{color:#b33016!important;background-color:#fff!important}body.contrast-4>:not(#hkoAccessibilityAssets),body.contrast-4>:not(#hkoAccessibilityAssets) div,body.contrast-4>:not(#hkoAccessibilityAssets) footer,body.contrast-4>:not(#hkoAccessibilityAssets) header{color:#0a5e82!important;background-color:#fff!important}body.contrast-5>:not(#hkoAccessibilityAssets),body.contrast-5>:not(#hkoAccessibilityAssets) div,body.contrast-5>:not(#hkoAccessibilityAssets) footer,body.contrast-5>:not(#hkoAccessibilityAssets) header{color:#1e6c13!important;background-color:#fff!important}body.contrast-6>:not(#hkoAccessibilityAssets),body.contrast-6>:not(#hkoAccessibilityAssets) div,body.contrast-6>:not(#hkoAccessibilityAssets) footer,body.contrast-6>:not(#hkoAccessibilityAssets) header{color:#fff!important;background-color:#1e6c13!important}body.contrast-7>:not(#hkoAccessibilityAssets),body.contrast-7>:not(#hkoAccessibilityAssets) div,body.contrast-7>:not(#hkoAccessibilityAssets) footer,body.contrast-7>:not(#hkoAccessibilityAssets) header{color:#ffffff!important;background-color:#0a5e82!important}body.contrast-8>:not(#hkoAccessibilityAssets),body.contrast-8>:not(#hkoAccessibilityAssets) div,body.contrast-8>:not(#hkoAccessibilityAssets) footer,body.contrast-8>:not(#hkoAccessibilityAssets) header{color:#ffffff!important;background-color:#b33016!important}body.contrast-9>:not(#hkoAccessibilityAssets),body.contrast-9>:not(#hkoAccessibilityAssets) div,body.contrast-9>:not(#hkoAccessibilityAssets) footer,body.contrast-9>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#c3bfb8!important}body.contrast-10>:not(#hkoAccessibilityAssets),body.contrast-10>:not(#hkoAccessibilityAssets) div,body.contrast-10>:not(#hkoAccessibilityAssets) footer,body.contrast-10>:not(#hkoAccessibilityAssets) header{color:#aba7a1!important;background-color:#000000!important}body.contrast-11>:not(#hkoAccessibilityAssets),body.contrast-11>:not(#hkoAccessibilityAssets) div,body.contrast-11>:not(#hkoAccessibilityAssets) footer,body.contrast-11>:not(#hkoAccessibilityAssets) header{color:#fff!important;background-color:#000000!important}body.contrast-12>:not(#hkoAccessibilityAssets),body.contrast-12>:not(#hkoAccessibilityAssets) div,body.contrast-12>:not(#hkoAccessibilityAssets) footer,body.contrast-12>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#3fe32a!important}body.contrast-13>:not(#hkoAccessibilityAssets),body.contrast-13>:not(#hkoAccessibilityAssets) div,body.contrast-13>:not(#hkoAccessibilityAssets) footer,body.contrast-13>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#18a9eb!important}body.contrast-14>:not(#hkoAccessibilityAssets),body.contrast-14>:not(#hkoAccessibilityAssets) div,body.contrast-14>:not(#hkoAccessibilityAssets) footer,body.contrast-14>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#f2421e!important}body.contrast-15>:not(#hkoAccessibilityAssets),body.contrast-15>:not(#hkoAccessibilityAssets) div,body.contrast-15>:not(#hkoAccessibilityAssets) footer,body.contrast-15>:not(#hkoAccessibilityAssets) header{color:#ffffff!important;background-color:#4a54f3!important}body.contrast-16>:not(#hkoAccessibilityAssets),body.contrast-16>:not(#hkoAccessibilityAssets) div,body.contrast-16>:not(#hkoAccessibilityAssets) footer,body.contrast-16>:not(#hkoAccessibilityAssets) header{color:#f2421e!important;background-color:#000000!important}body.contrast-17>:not(#hkoAccessibilityAssets),body.contrast-17>:not(#hkoAccessibilityAssets) div,body.contrast-17>:not(#hkoAccessibilityAssets) footer,body.contrast-17>:not(#hkoAccessibilityAssets) header{color:#18a9eb!important;background-color:#000000!important}body.contrast-18>:not(#hkoAccessibilityAssets),body.contrast-18>:not(#hkoAccessibilityAssets) div,body.contrast-18>:not(#hkoAccessibilityAssets) footer,body.contrast-18>:not(#hkoAccessibilityAssets) header{color:#3fe32a!important;background-color:#000000!important}body.contrast-19>:not(#hkoAccessibilityAssets),body.contrast-19>:not(#hkoAccessibilityAssets) div,body.contrast-19>:not(#hkoAccessibilityAssets) footer,body.contrast-19>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#f22aa9!important}body.contrast-20>:not(#hkoAccessibilityAssets),body.contrast-20>:not(#hkoAccessibilityAssets) div,body.contrast-20>:not(#hkoAccessibilityAssets) footer,body.contrast-20>:not(#hkoAccessibilityAssets) header{color:#fff630!important;background-color:#000000!important}body.contrast-21>:not(#hkoAccessibilityAssets),body.contrast-21>:not(#hkoAccessibilityAssets) div,body.contrast-21>:not(#hkoAccessibilityAssets) footer,body.contrast-21>:not(#hkoAccessibilityAssets) header{color:#000000!important;background-color:#fff630!important}</style>';
    $('head').append(css);
});

