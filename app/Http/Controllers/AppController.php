<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Font;
use App\Layout;
use App\Contrast;
use App\Setting;
use App\Shop;
use Session;
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
        $this->shop = Shop::all();
        View::share('shop',$this->shop);
    }
    public function index(){
        return view('dashboard/index');
    }
    public function settings(){
        $domain = ShopifyApp::shop()->shopify_domain;
        $id = Shop::where('shopify_domain', '=', $domain)->first();
        $layout = Layout::where('shop_id', '=', $id->id)->first();
        return view('dashboard/pages/settings')->with(['layout'=>$layout]);
    }
    public function possitions(){
        $domain = ShopifyApp::shop()->shopify_domain;
        $id = Shop::where('shopify_domain', '=', $domain)->first();
        $layout = Layout::where('shop_id', '=', $id->id)->first();
        return view('dashboard/pages/possition')->with(['layout'=>$layout]);
    }
    public function layouts($value){
        $domain = ShopifyApp::shop()->shopify_domain;
        $id = Shop::where('shopify_domain', '=', $domain)->first();
        $layout = Layout::where('shop_id', '=', $id->id)->first();
        if ($layout === null) {
            $save = new Layout();
            $save->shop_id = $id->id;
            $save->value = $value;
            $save->save();
        }else{
            $layout->value = $value;
            $layout->save();
        }
    }
    public function checkdomain($value){
        $id = Shop::where('shopify_domain', '=', $value)->first();
        return  $id->layout['value'];
    }
    public function  elderly($id){
        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'id'=>$id]);
    }
    public function profile(){
        $profile = Profile::all();
        if(ShopifyApp::shop() == null){
            $domain = '';
        }else{
            $domain = ShopifyApp::shop()->shopify_domain;
        }


        return view('pages/index')->with(['profile'=>$profile,'shop'=>$this->shop,'domain'=>$domain]);
    }
}
