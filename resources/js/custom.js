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
        $(this).parents('.items').find('input').val(qty);
    });
    $('.fa-minus').click(function(){
        var qty = $(this).parents('.items').find('input').val();
        qty = parseInt(qty)  - 1;
        $(this).parents('.items').find('input').val(qty);
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
        if(qty <= 3 ){
            $(this).parents('.zoom').find('input').val(qty);
        }
        if(qty > 0){
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-increase').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_increase');
        }else{
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-decrease').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_decrease');
        }

    });
    $('.zoom-decrease').click(function(){
        var qty = $(this).parents('.zoom').find('input').val();
        qty = parseInt(qty)  - 1;
        if(qty >= -3){
            $(this).parents('.zoom').find('input').val(qty);
        }
        if(qty < 0){
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-decrease').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_decrease');
        }else{
            $('.zoom .items').removeClass('active-checkbox');
            $('.zoom-increase').addClass('active-checkbox');
            $(this).parents('.zoom').find('input').attr('name','zoom_increase');
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
$('body').delegate('input[type="checkbox"]','click',function(){
    var url= 'settings';
    $.ajax({
        type: "POST",
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        data: { grayscale: 'true' }
    });
});
});