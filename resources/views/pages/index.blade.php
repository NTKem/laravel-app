<?php
    if(isset($_GET['shop'])){
    $domain = $_GET['shop'];
    if(isset($_GET['admin'])){
        $page = 'admin-page';
    }else{
        $page = 'fontend-pages';
    }
    }
?>
@extends('../layouts.app')
@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('class',$layout.' home fontend-pages '.$page)
@section('content')
    <h2 class="title">select your profile</h2>
    <div class="menu-bar profile-slick">
        <?php
        foreach ($profile as $item):
        ?>
        <div class="items">
            <a class="link-bar" data-value="{{$item->id}}" href="{{route($item->url,['id' => $item->id,'domain'=>$domain])}}">
                <img src="{{ asset('images/profile/'. $item->image.'') }}">
                <p>{{ $item->name }}</p>
            </a>
        </div>
        <?php
        endforeach
        ;?>
    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(function(){
            e = $.parseJSON(localStorage.data);
           if(e['profile'] != undefined){
               window.location.href = '{{$item->url}}/'+e['profile']+'/'+window.domain+'?shop=' +window.domain +'<?php if($page == 'admin-page'):?>&admin=true<?php endif;?>';
           }
        });
        function slick(){
            setTimeout(function(){
                if(window.innerWidth <= 767){
                    $('.profile-slick').not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 1,
                        arrows: false,
                        dots: false,
                        slidesToScroll: 1
                    });
                }else{
                    $('.profile-slick').slick('unslick');
                }
            },100);
        }
        slick();
        $( window ).resize(function() {
            slick();
        });
    </script>
@endsection
