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
        $shop =ShopifyApp::shop()->shopify_domain;
        $shopDomain = Shop::where(['shopify_domain' => $shop])->first();
        $settings = Setting::where(['shop_id' => $shopDomain->id])->first();
        $profile = Profile::all();
        return view('pages/index')->with(['profile'=>$profile,'settings'=>$settings]);
    }
    public function  elderly($id){
        $shop =ShopifyApp::shop()->shopify_domain;
        $shopDomain = Shop::where(['shopify_domain' => $shop])->first();
        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'shopDomain'=>$shopDomain,'id'=>$id]);
    }
    public function settings(Request $request){


        $profile_id = $request->profile_id;
        $line_height = $request->line_height;
        $font_size = $request->font_size;
        $font_spacing = $request->font_spacing;
        Setting::where(['shop_id' => $request->shop_id])->update(['profile_id' => $profile_id,'line_height'=>$line_height,'font_size'=>$font_size,'font_spacing'=>$font_spacing]);

    }
}
