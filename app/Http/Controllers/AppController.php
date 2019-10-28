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
//        $shop = ShopifyApp::shop();
//        $shop2 =$shop->shopify_domain;
//        $shopDomain = Shop::where(['shopify_domain' => $shop2])->first();
//        $request = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json');
//        foreach ($request->body->themes as $item){
//            if($item->role == 'main'){
//                $id_themes = $item->id;
//            }
//        }
//        $string = '';
//        foreach($this->site_contrast as $items){
//                $color= $items->color;
//                $background =$items->background;
//                $string .=  '
//                body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets), body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) div, body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) footer, body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) header{
//                color: '. $color.'!important;
//                background-color: '. $background.'!important;
//                }';
//        }
        return redirect('profile');
    }

    public function  elderly($id){
        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'id'=>$id]);
    }
    public function profile(){
        $profile = Profile::all();
        return view('pages/index')->with(['profile'=>$profile]);
    }
}
