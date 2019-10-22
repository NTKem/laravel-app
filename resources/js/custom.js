$(function(){
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
    window.onload = function() {}
        var  e  = {
            origin: "ACCESSIBILITY",
            type: 'test',
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
                parent.postMessage(e, "*");
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


});