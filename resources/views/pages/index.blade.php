@extends('../layouts.app')
@section('class','home')
@section('content')
    <h2 class="title">select your profile</h2>
    <div class="menu-bar">
        <div class="items">
            <a href="{{route('ederly')}}">
                <img src="{{ asset('images/icon_1.png') }}">
                <p>Elderly</p>
            </a>
        </div>
        <div class="items">
            <a>
                <img src="{{ asset('images/icon_2.png') }}">
                <p>Situational</p>
            </a>
        </div>
        <div class="items">
            <a>
                <img src="{{ asset('images/icon_3.png') }}">
                <p>Dislexia</p>
            </a>
        </div>
        <div class="items">
            <a>
                <img src="{{ asset('images/icon_4.png') }}">
                <p>Mobility Impaired</p>
            </a>
        </div>
        <div class="items">
            <a>
                <img src="{{ asset('images/icon_5.png') }}">
                <p>Visually Impaired</p>
            </a>
        </div>
    </div>
@endsection
