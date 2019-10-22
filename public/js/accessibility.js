var $ = jQuery;
$(function(e){
      window.data  = {
          font:'',
          line_height:'',
          font_size:'',
          font_spacing:'',
          grayscale:'',
          invert_colors:'',
          sepia:'',
          highlight_title:'',
          highlight_focus:'',
          highlight_links:'',
          skip_title:'',
          skip_focus:'',
          skip_links:'',
          screen_settings:'',
          screen_ruler:'',
          screen_cursor:'',
          zoom:'',
          contrast:'',
          tooltip_permanent:'',
          tooltip_mouseover:'',

    };
    var body = $('body'),
    new_ob;
    body.append('<iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://ntkem.test" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 100vh; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important; min-height:350px"></iframe>');;
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
                if(new_ob[key] != '' || new_ob[key] != 'null' || new_ob[key] != undefined){
                    $('body').removeClass(window.data[key]);
                    window.data[key] =new_ob[key];
                    $('#readtext').remove();
                }
            });
            Object.keys(window.data).forEach(key => {
                if(window.data[key] != '' || window.data[key] != 'null' || window.data[key] != undefined){
                    if(window.data[key] == 'line_height'){
                        debugger;
                        $('head').append('<style id="readtext">body, h1, h2, h3, h4, h5, h6, p, blockquote, li, a, *:not(.fa){ font-size:'+ window.data['font_size'] +'%  ;line-height:'+ window.data['line_height'] +' % ;letter-spacing:'+ window.data['font_spacing'] +'px  ;}</style>')
                    }else{
                        $('body').addClass(window.data[key]);
                    }
                }
            });
        }

    });

},5000)

});

