<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Font;
use App\Contrast;
use App\Setting;
use App\Shop;
use OhMyBrew\ShopifyApp\Services\ShopSession;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class AppController extends Controller
{

    public $site_menu, $site_font,$site_contrast,$shopDomain;
    public function __construct()
    {

        // Fetch the Site Settings object
        $this->site_menu = Menu::all();
        View::share('site_menu',  $this->site_menu);
        $this->site_font = Font::all();
        View::share('site_font',  $this->site_font);
        $this->site_contrast = Contrast::all();
        View::share('site_contrast', $this->site_contrast);


    }
    public function index(){
        $profile = Profile::all();
        return view('pages/index')->with(['profile'=>$profile]);
    }

    public function  elderly($id){
        $shop =ShopifyApp::shop()->shopify_domain;
        $shopDomain = Shop::where(['shopify_domain' => $shop])->first();
        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'shopDomain'=>$shopDomain,'id'=>$id]);
    }
    public function Settings_Css(){

        $shop = ShopifyApp::shop();
        $shop2 =$shop->shopify_domain;
        $shopDomain = Shop::where(['shopify_domain' => $shop2])->first();
        $settings = Setting::where(['shop_id' => $shopDomain->id])->first();
        //
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json');

        foreach ($request->body->themes as $item){
            if($item->role == 'main'){
                $id_themes = $item->id;
            }
        }
        //admin/api/2019-10/themes/#{theme_id}/assets.json

        $array = [
            'asset'=>[
                'key'=> 'layout/theme.bk.liquid',
                'source_key'=> 'layout/theme.liquid',
            ]
        ];

        $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
        ///admin/api/2019-10/themes/#{theme_id}/assets.json
        $array = [
            'asset'=>[
                'key'=> 'snippets/Accessibility.liquid',
                'value'=>'
                <style id="kem">
                   body, h1, h2, h3, h4, h5, h6, p, blockquote, li, a, *:not(.fa){
                        font-size: '.$settings->font_size.'px;
                        line-height: '.$settings->line_height.'px;
                        letter-spacing: '.$settings->font_spacing.'px;
                    }
                </style>
                ' ,
            ]
        ];
        $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
        $array = [
            'asset'=>[
                'key'=> 'templates/index.liquid',
                'value'=> '{% include "Accessibility" %} {{ content_for_index }}',
            ]
        ];
        $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
        return  redirect('/');
    }

    public function settings(Request $request){
        $profile_id = $request->profile_id;
        $line_height = $request->line_height;
        $font_size = $request->font_size;
        $font_spacing = $request->font_spacing;
        Setting::where(['shop_id' => $request->shop_id])->update(['profile_id' => $profile_id,'line_height'=>$line_height,'font_size'=>$font_size,'font_spacing'=>$font_spacing]);
        return  redirect('settings-css');
    }
}
