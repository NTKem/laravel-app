var $ = jQuery;
$(function(e){
      window.data  = {
    };
    var body = $('body'),
    new_ob;
    body.append('<iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://18.221.221.44" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 100vh; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important; min-height:350px"></iframe>');;
setTimeout(function(){
    var eventMethod = window.addEventListener
        ? "addEventListener"
        : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent"
        ? "onmessage"
        : "message";
    eventer(messageEvent, function (e) {
        if(e.data.origin === 'ACCESSIBILITY'){
             new_ob = e.data;
            Object.keys(new_ob).forEach(key => {
                if(new_ob[key] != ''){
                    $('body').removeClass(window.data[key]);
                    if(key == 'contrast'){
                        window.data[key] ='contrast-'+new_ob[key];
                    }
                    else if(key == 'reset'){
                        if( new_ob[key] == 'true' ){
                            Object.keys(window.data).forEach(item => {
                                $('body').removeClass(item);
                            });
                            window.data  = {};
                            new_ob={};
                            $('#readtext').remove();
                            new_ob[key] = 'false';
                        }
                    }else if(key == 'menu_bar'){
                        if(new_ob[key] == 'true'){
                            $('#hkoAccessibilityAssets').css({'height':'35px','min-height':'auto'});
                        }else{
                            $('#hkoAccessibilityAssets').css({'height':'350px','min-height':'350px'});
                        }
                        window.data[key] =new_ob[key];

                    }else{
                            window.data[key] =new_ob[key];
                    }
                }else{
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
                    }else{
                        $('body').addClass(window.data[key]);
                    }

                }else{
                    $('body').removeClass(key);
                }
            });
            if($('body').hasClass('tooltip_permanent')){
                $('img').each(function(){
                    var left =$(this).offset().left+'px',
                        top = $(this).offset().top -30+'px',
                        alt = $(this).attr('alt')
                    $('body').append('<div class="app-tooltip" style="left:'+left+';top:'+top+';opacity:1">'+alt+'</div>');
                });
            }else{
                $('.app-tooltip').remove();
            }
            var iframeEl = document.getElementById('hkoAccessibilityAssets');
            iframeEl.contentWindow.postMessage(window.data,'*');
        }

    });

},5000);
    $('body').append('<div class="mask-screen-top screen_items"></div><div class="mask-screen-bottom screen_items"></div><div class="screen-ruler-box"></div>');
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
            b = a.clientY;
                g = $(".screen-ruler-box");
                g.css('top', b + 'px');
        }
        if($(this).hasClass('tooltip_mouseover')){
            $("img").mousemove(function(a){
                var b = a.clientX + 10,
                c=a.clientY + 10;
                alt = $(this)[0].alt;
                $('.tooltip-on-fly').remove();
                $('body').append('<div class="tooltip-on-fly" style="display: inline-block; top: '+c+'px; left:'+b+'px;opacity: 1;">'+alt+'</div>')
            });
            $("img").mouseleave(function(a){
                $('.tooltip-on-fly').remove();
            });
        }
    });

});

