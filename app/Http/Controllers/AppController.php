<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function install(Request $request)
    {
        $shop_name = $request->shop;
        $scopes = 'read_script_tags,write_script_tags';

        $url = 'https://'.$shop_name.'/admin/oauth/authorize?client_id='.env('SHOPIFY_KEY').'&scope='.$scopes.'&redirect_uri='.env('APP_URL').'/login/shopify/callback';
        return redirect($url);
    }
}
