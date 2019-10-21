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
    $('.list-items input,.contrast-items input').click(function(){
        $('.list-items,.contrast-items').removeClass('active-checkbox')
        $(this).parents('.list-items,.contrast-items').addClass('active-checkbox');
    });
    $(".form-settings").submit(function(e){
        // e.preventDefault();
    });
});