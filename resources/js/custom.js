$(function(){
    function check_data(){
        e = $.parseJSON(localStorage.data);
        e['menu_bar'] = 'true';
        $('.main-content').hide();
        $('body').toggleClass('activeBar');
        parent.postMessage(e, "*");
        Object.keys(e).forEach(key => {
            if(e[key] != ''){
                e;
                if($('input[name='+key+']').length >= 1){
                    $('input[name=' + key + ']').parents('.items').addClass('active-checkbox');
                }
            }
        });
    }
        if(localStorage.data != undefined || localStorage.data != '{}' ){
            // check_data();
            if(localStorage.data == undefined){
                var  e  = {
                    origin: "ACCESSIBILITY",
                };
                localStorage.setItem('data', JSON.stringify(e.data));
                check_data();
            }else{
                check_data();
            }

        }else{
            var  e  = {
                origin: "ACCESSIBILITY",
            };
            localStorage.setItem('data', JSON.stringify(e.data));
            check_data();
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


            $('.font-list input[type="radio"]').click(function () {
                var name = $(this).attr('name');
                e[name]= $(this).data('action');
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
                e  = {
                    origin: "ACCESSIBILITY",
                };
                e['reset']= 'true';
                parent.postMessage(e, "*");
                e['reset']= 'false';
                $('.active-checkbox').removeClass('active-checkbox');
            });
            $('.tool-bar .right').click(function(){
                $('.main-content').toggle();
                $(this).parents('body').toggleClass('activeBar');
                if($(this).parents('body').hasClass('activeBar')){
                    e['menu_bar']= 'true';
                }else{
                    e['menu_bar']= 'false';
                }

                parent.postMessage(e, "*");
            });
    var eventMethod = window.addEventListener
        ? "addEventListener"
        : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent"
        ? "onmessage"
        : "message";
    eventer(messageEvent, function (e) {
        localStorage.setItem('data', JSON.stringify(e.data));
    });
});