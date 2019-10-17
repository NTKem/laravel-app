@extends('shopify-app::layouts.default')

@section('content')
    <p>You are: {{ ShopifyApp::shop()->shopify_domain }}</p>
@endsection

