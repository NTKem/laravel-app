<?php
    if($domain != ''){
        foreach($shop as $items){
            if($items['shopify_domain'] == $domain){
                $layout =  $items->layout['value'];
            }
        }
    }else{
        $layout = 'show-default';
    }
?>
@extends('../layouts.app')
@section('class',$layout.' home fontend-pages')
@section('content')
    <h2 class="title">select your profile</h2>
    <div class="menu-bar">
        <?php
        foreach ($profile as $item):
        ?>
        <div class="items">
            <a class="link-bar" data-value="{{$item->id}}" href="{{route($item->url,['id' => $item->id])}}">
                <img src="{{ asset('images/profile/'. $item->image.'') }}">
                <p>{{ $item->name }}</p>
            </a>
        </div>
        <?php
        endforeach
        ;?>
    </div>
    <script>
        $(function(){
            e = $.parseJSON(localStorage.data);
           if(e['profile'] != undefined){
               window.location.href = '{{$item->url}}/'+e['profile']+'?shop='+window.domain;
           }
        });
    </script>
@endsection
