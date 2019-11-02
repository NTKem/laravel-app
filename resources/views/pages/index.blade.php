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
@section('class',$layout.' home fontend-pages '.$page)
@section('content')
    <h2 class="title">select your profile</h2>
    <div class="menu-bar">
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
    <script>
        $(function(){
            e = $.parseJSON(localStorage.data);
           if(e['profile'] != undefined){
               window.location.href = '{{$item->url}}/'+e['profile']+'/'+window.domain+'&admin={{$page}}';
           }
        });
    </script>
@endsection
