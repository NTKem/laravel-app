$(function(){
    var  e  = {
        origin: "ACCESSIBILITY",
    };
    //
    var eventMethod = window.addEventListener
        ? "addEventListener"
        : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent"
        ? "onmessage"
        : "message";
    eventer(messageEvent, function (e) {
        localStorage.setItem('data', JSON.stringify(e.data));
            $.get('checkdomain/'+e.data.domain).done(function(data){
                e.data.layout = data;
                localStorage.setItem('data', JSON.stringify(e.data));
            });

    });
        if(localStorage.data == undefined || localStorage.data == '{}' ){
            localStorage.setItem('data', JSON.stringify(e));
        }else{
            e = $.parseJSON(localStorage.data);
            if(e['layout'] != ''){
                $('body').addClass(e['layout']);
                $('body').addClass('trigger-'+e['menu_bar']);
            }

            Object.keys(e).forEach(key => {
                if(e[key] != ''){
                    if($('input[name='+key+']').length == 1){
                        $('input[name=' + key + ']').parents('.items').addClass('active-checkbox');
                    }else{
                        var val = $('input[name=' + key + ']').parents('.radio-input');
                        val.find('input').each(function(item){
                            if($(this).val() == e[key]){
                                $(this).parents('.radio-input').addClass('active-checkbox')
                            }
                        });
                    }
                }
            });
            setTimeout(function () {
            parent.postMessage(e, "*");
            },1000);
        }
    $('.tab-bar .items').click(function(){
        $('.tab-bar .items').removeClass('items-active');
        $(this).addClass('items-active');
        var id = $(this).data('href');
        $('.menu-bar').removeClass('active-bar');
        $(id).addClass('active-bar');
    });
    $('.fa-plus').click(function(){
       var qty = $(this).parents('.items').find('input').val();
       qty = parseInt(qty)  + 1;
        $(this).parents('.items').find('input').val(qty).change();
    });

    $('.fa-minus').click(function(){
        var qty = $(this).parents('.items').find('input').val();
        qty = parseInt(qty)  - 1;
        $(this).parents('.items').find('input').val(qty).change();
    });
    $('.ederly input[type="checkbox"]').click(function(){
        if($(this).is(':checked')){
            $(this).parents('.items').addClass('active-checkbox');
            $(this).val('true');
        }else{
            $(this).parents('.items').removeClass('active-checkbox');
            $(this).val('null');
        }

    });
    $('.list-items input').click(function(){
        $('.list-items').removeClass('active-checkbox')
        $(this).parents('.list-items').addClass('active-checkbox');

    });

    $('.screen_settings input[type="radio"]').click(function(){
        $('.radio-items').removeClass('active-checkbox');
        $(this).parents('.items').addClass('active-checkbox');
    });

    $('.contrast-items input').click(function(){
        $('.contrast-items').removeClass('active-checkbox');
        $(this).parents('.contrast-items').addClass('active-checkbox');
    });
    $('.zoom-increase').click(function(){
        var qty = $(this).parents('.zoom').find('input').val();
        qty = parseInt(qty)  + 1;
        if(qty > 0){
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-increase').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_increase');
        }else{
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-decrease').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_decrease');
        }
        if(qty <= 3 ){
            $(this).parents('.zoom').find('input').val(qty).change();
        }
    });
    $('.zoom-decrease').click(function(){
        var qty = $(this).parents('.zoom').find('input').val();
        qty = parseInt(qty)  - 1;
        if(qty < 0){
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-decrease').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_decrease');
        }else{
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-increase').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_increase');
        }
        if(qty >= -3){
            $(this).parents('.zoom').find('input').val(qty).change();
        }
    });
    if($('.zoom-input').val() > 0){
        $('.zoom .items').removeClass('active-checkbox');
        $('.zoom-increase').addClass('active-checkbox')
    }else if($('.zoom-input').val() == 0){
        $('.zoom .items').removeClass('active-checkbox');
    }else{
        $('.zoom .items').removeClass('active-checkbox');
        $('.zoom-decrease').addClass('active-checkbox')
    }


                $('.radio-check input[type="radio"]').click(function () {
                    var name = $(this).attr('name');
                    e[name]= $(this).val();
                    $('.radio-check').find('.radio-input').removeClass('active-checkbox');
                    $(this).parents('.radio-input').addClass('active-checkbox');
                    parent.postMessage(e, "*");
                });
                $('.custom-input').change(function(){
                    var name = $(this).attr('name');
                    e[name] = $(this).val();
                    parent.postMessage(e, "*");
                });
                $('.contrast-items input').change(function(){
                    var name = $(this).attr('name');
                    e[name] = $(this).val();
                    parent.postMessage(e, "*");
                });
                $('input[type="checkbox"]').click(function () {
                    var name = $(this).attr('name');
                    e[name]= name;
                    if($(this).parents('.items').hasClass('active-checkbox')){
                        parent.postMessage(e, "*");
                    }else{
                        e[name]= '';
                        parent.postMessage(e, "*");
                    }
                });
                $('.radio-items input').click(function () {
                    var name = $(this).attr('name');
                    e[name]= name+'-'+$(this).val();
                    parent.postMessage(e, "*");
                });
                $('.zoom-input').change(function () {
                    var name = $(this).attr('name');
                    e['zoom']= name+'-'+$(this).val();
                    parent.postMessage(e, "*");
                });
                $('.reset').click(function(){
                    var ob = e;
                    e  = {
                        origin: "ACCESSIBILITY",
                    };
                    e['layout'] = ob['layout'];
                    if(ob['menu_bar'] != undefined){
                        e['menu_bar'] = ob['menu_bar'];
                    }else{
                         e['menu_bar'] = 'false';
                    }
                    e['reset']= 'true';
                    parent.postMessage(e, "*");
                    e['reset']= 'false';
                    $('.active-checkbox').removeClass('active-checkbox');
                });
                $('.tool-bar .right').click(function(){

                    if($(this).parents('body').hasClass('default')){
                        $('.Orders-trigger-container').hide();
                        $('.main-content').toggle();
                        $(this).parents('body').toggleClass('activeBar');
                        if($(this).parents('body').hasClass('activeBar')){
                            e['menu_bar']= 'true';
                        }else{
                            e['menu_bar']= 'false';
                        }
                    }else{
                        $(this).parents('body').removeClass('activeBar');
                        e['menu_bar']= 'false';
                        $('.Orders-trigger-container').show();
                        $('.Orders-popup-full').hide();
                    }
                    parent.postMessage(e, "*");
                });
                $('.Orders-trigger-container').click(function(){
                    $('.main-content').show();
                    $(this).parents('body').addClass('activeBar');
                        e['menu_bar']= 'true';
                    parent.postMessage(e, "*");
                });
    //admin js
    $('.index-admin.settings .items').click(function(){
        $('.items').removeClass('active-checkbox');
        $(this).addClass('active-checkbox');
    });
    $('.index-admin.settings input[type="radio"]').click(function(){
        $value =  $(this).val();
        $e = $(this);
        $('iframe#hkoAccessibilityAssets').remove();
        $.get('layouts/'+$value+'').done(function(){

            if($e.val() == 'footer' || $e.val() == 'left' || $e.val() == 'right' || $e.val() == 'middle'){
                $('body').append('<iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://ntkem.test/profile" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed;   transition: all 0.3s ease 0s; max-height: 41px;   visibility: visible; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important;height:41px;bottom: 20px;"></iframe>');
                $('.Orders-popup-full').hide();
                $('.Orders-trigger-container').show();
            }else if($e.val() == 'default'){
                $('.Orders-popup-full').show();
                $('.Orders-trigger-container').hide();
                $('body').append('<iframe id="hkoAccessibilityAssets" name="hkoAccessibilityFrame" allowpaymentrequest="yes" allowfullscreen="yes" allow="midi; geolocation; microphone; camera" id="hkoAccessibilityFrame" scrolling="no" src="https://ntkem.test/profile" tabindex="0" frameborder="0" title="Open Accessibility Toolbar" style="z-index: 2147483647; border: none; display: block; opacity: 1; position: fixed; left: auto; transition: all 0.3s ease 0s; max-height: 350px; max-width: 100vw; visibility: visible; bottom: 0px; right: 0px; background: none transparent !important; margin-bottom: 0px !important; width: 100% !important; "></iframe>');
            }
        });
    });
    $('.Orders-trigger-container').click(function(){
        $(this).hide();
        $('.Orders-popup-full').show();
    });
});