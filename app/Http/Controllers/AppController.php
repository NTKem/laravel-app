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
use App\Upload_Font;
use Session;
use App\Profile_Default;
use OhMyBrew\ShopifyApp\Services\ShopSession;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use Illuminate\Support\Facades\Storage;

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
        return view('dashboard/pages/settings')->with(['layout'=>$layout,'domain'=>$domain]);
    }
    public function possitions(){
        $domain = ShopifyApp::shop()->shopify_domain;
        $id = Shop::where('shopify_domain', '=', $domain)->first();
        $layout = Layout::where('shop_id', '=', $id->id)->first();
        return view('dashboard/pages/possition')->with(['layout'=>$layout,'domain'=>$domain]);
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
    public function elderly($id,$domain){
        if($domain != ''){
            $shop = Shop::where('shopify_domain', '=', $domain)->first();
            $font = Upload_Font::where('shop_id', '=', $shop->id)->get();
            $layout = $shop->layout['value'];
        }else{
            $font = '';
        }

        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'id'=>$id,'custom_font'=>$font,'layout'=>$layout]);
    }
    public function profile(){
        $domain = $_GET['shop'];
        $profile = Profile::all();
        $shop = Shop::where('shopify_domain','=',$domain)->first();
        $layout = $shop->layout['value'];
        return view('pages/index')->with(['profile'=>$profile,'domain'=>$domain,'layout'=>$layout]);
    }
    public function AdminProfile(){
        $profile = Profile::all();
        return view('dashboard/pages/profiles/index')->with(['profile'=>$profile]);
    }
    public function AdminElderly($id){
        $domain = ShopifyApp::shop()->shopify_domain;
        $shop = Shop::where('shopify_domain', '=', $domain)->first();
        $setting = Setting::where('shop_id','=',$shop->id)->where('profile_id','=',$id)->first();
        if($setting == null){
            $setting = Profile_Default::where('profile_id','=',$id)->first();
        }
        return view('dashboard/pages/profiles/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast,'id'=>$id,'shop'=>$shop,'settings'=>$setting]);
    }
    public function AdminSettings(Request $request){
        $profile_id = $request->profile_id;
        $line_height = $request->line_height;
        $font_size = $request->font_size;
        $font_spacing = $request->font_spacing;
        $font_family = $request->font_family;
        $color_more = $request->color_more;
        $highlight_title = $request->highlight_title;
        $highlight_focus = $request->highlight_focus;
        $highlight_links = $request->highlight_links;
        $skip_title = $request->skip_title;
        $skip_focus = $request->skip_focus;
        $skip_links = $request->skip_links;
        $screen_settings = $request->screen_settings;
        $screen_ruler = $request->screen_ruler;
        $screen_cursor = $request->screen_cursor;
        $contrast = $request->contrast;
        $tooltip_permanent = $request->tooltip_permanent;
        $tooltip_mouseover = $request->tooltip_mouseover;
        $text_mode = $request->text_mode;
        if($request->zoom_increase > 0){
            $zoom = $request->zoom_increase;
        }
        else if($request->zoom_decrease < 0){
            $zoom = $request->zoom_decrease;
        }else{
            $zoom = 0;
        }
        $settings = Setting::where('shop_id', '=', $request->shop_id)->where('profile_id', '=', $profile_id)->first();
        if ($settings === null) {
            $save = new Setting();
            $save->shop_id = $request->shop_id;
            $save->profile_id = $profile_id;
            $save->line_height = $line_height;
            $save->font_size = $font_size;
            $save->font_spacing = $font_spacing;
            $save->font_family = $font_family;
            $save->color_more = $color_more;
            $save->highlight_title = $highlight_title;
            $save->highlight_focus = $highlight_focus;
            $save->highlight_links = $highlight_links;
            $save->skip_title = $skip_title;
            $save->skip_focus = $skip_focus;
            $save->skip_links = $skip_links;
            $save->screen_settings = $screen_settings;
            $save->screen_ruler = $screen_ruler;
            $save->screen_cursor = $screen_cursor;
            $save->contrast = $contrast;
            $save->zoom = $zoom;
            $save->tooltip_permanent = $tooltip_permanent;
            $save->tooltip_mouseover = $tooltip_mouseover;
            $save->text_mode = $save->text_mode;
            $save->save();
        }else{
            Setting::where(['shop_id' => $request->shop_id])->update([
                'profile_id' => $profile_id,
                'line_height'=>$line_height,
                'font_size'=>$font_size,
                'font_spacing'=>$font_spacing,
                'font_family'=>$font_family,
                'color_more'=>$color_more,
                'highlight_title'=>$highlight_title,
                'highlight_focus'=>$highlight_focus,
                'highlight_links'=>$highlight_links,
                'skip_title'=>$skip_title,
                'skip_focus'=>$skip_focus,
                'skip_links'=>$skip_links,
                'screen_settings'=>$screen_settings,
                'screen_ruler'=>$screen_ruler,
                'screen_cursor'=>$screen_cursor,
                'contrast'=>$contrast,
                'zoom'=>$zoom,
                'tooltip_permanent'=>$tooltip_permanent,
                'tooltip_mouseover'=>$tooltip_mouseover,
                'text_mode'=>$text_mode
            ]);
        }

         return  redirect('/');
    }
    public function GetProfile($id,$domain){
        $shop = Shop::where('shopify_domain', '=', $domain)->first();
        $setting = Setting::where('shop_id', '=', $shop->id)->where('profile_id', '=', $id)->first();
        $array =[
            'line_height'=>$setting->line_height,
            'font_size'=>$setting->font_size,
            'font_spacing'=>$setting->font_spacing,
            'font_family'=>$setting->font_family,
            'color_more'=>$setting->color_more,
            'highlight_title'=>$setting->highlight_title,
            'highlight_focus'=>$setting->highlight_focus,
            'highlight_links'=>$setting->highlight_links,
            'skip_title'=>$setting->skip_title,
            'skip_focus'=>$setting->skip_focus,
            'skip_links'=>$setting->skip_links,
            'screen_settings'=>$setting->screen_settings,
            'screen_ruler'=>$setting->screen_ruler,
            'screen_cursor'=>$setting->screen_cursor,
            'contrast'=>$setting->contrast,
            'zoom'=>$setting->zoom,
            'tooltip_permanent'=>$setting->tooltip_permanent,
            'tooltip_mouseover'=>$setting->tooltip_mouseover,
            'text_mode'=>$setting->text_mode
        ];
        return $array;
    }
    public function AdminUploadFont(){
        $domain = ShopifyApp::shop()->shopify_domain;
        $shop = Shop::where('shopify_domain', '=', $domain)->first();
        $font = Upload_Font::where('shop_id','=',$shop->id)->get();
        if(count($font) < 1){
            $font = '';
        }else{
            $shop = ShopifyApp::shop();
            $request = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json');
            foreach ($request->body->themes as $item){
                if($item->role == 'main'){
                    $id_themes = $item->id;
                }
            }
            $string = '<style>';
            foreach($font as $fonts){
                if($fonts->url != null){
                    $string.='@font-face{font-family:'.$fonts->font_face.';';
                    if(strpos($fonts->url,'eot') != false){
                        $string.= 'src:url('.env('APP_URL').'/fonts/'.$fonts->url.') format("embedded-opentype");';
                    }else if(strpos($fonts->url,'ttf') != false){
                        $string.= 'src:url('.env('APP_URL').'/fonts/'.$fonts->url.') format("truetype");';
                    }else if(strpos($fonts->url,'woff') != false){
                        $string.= 'src:url('.env('APP_URL').'/fonts/'.$fonts->url.') format("woff");';
                    }else{
                        $string.= 'src:url('.env('APP_URL').'/fonts/'.$fonts->url.');';
                    }
                    $string.='} body.'.$fonts->name.' :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:'.$fonts->font_face.';}';
                }else{
                    $string.="@import url('".$fonts->script."');";
                    $string.=' body.'.$fonts->name.' :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets){font-family:'.$fonts->font_face.';}';
                }
                $str = preg_replace('!\s+!', '', strtolower($fonts->name));
                dd($str);
            }
            $string.='</style>';
            $array = [
                'asset'=>[
                    'key'=> 'snippets/custom_font.liquid',
                    'value'=>$string
                ]
            ];
            $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
            $array = [
                'asset'=>[
                    'key'=> 'templates/index.liquid',
                    'value'=> ' {% include "custom_font" %} {{ content_for_index }}',

                ]
            ];

            $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
        }

        return view('dashboard/pages/uploads/index')->with(['font'=>$font]);
    }
    public function AdminPostUploadFont(Request $request){
        $domain = ShopifyApp::shop()->shopify_domain;
        $id = Shop::where('shopify_domain', '=', $domain)->first();
        if($request->has('up_script')){
            $script = new Upload_Font();
            $script->name = $request->name;
            $script->font_face = $request->font_face;
            $script->script =  $request->script;
        }else{
            $script = new Upload_Font();
            $script->name = $request->name;
            if($request->hasfile('url')){
                $file = $request->file('url');
                $font_face = explode('.', $file->getClientOriginalName())[0];
                $file->move('fonts/',$file->getClientOriginalName());
                $script->name = $font_face;
                $script->font_face = $font_face;
                $script->url = $file->getClientOriginalName();
            }
        }
        $script->shop_id = $id->id;
        $script->save();
        return redirect('admin/upload-font');
    }
    public function AdminEditFont($id){
        $font = Upload_Font::find($id);
        return view('dashboard/pages/uploads/edit')->with(['font'=>$font]);
    }
    public function AdminPostEditFont(Request $request,$id){
        $font = Upload_Font::find($id);
        if($request->has('up_script')){
            $font->name = $request->name;
            $font->font_face = $request->font_face;
            $font->script =  $request->script;
        }else{
            $font->name = $request->name;
            if($request->hasfile('url')){
                $file = $request->file('url');
                $font_face = explode('.', $file->getClientOriginalName())[0];
                $file->move('fonts/',$file->getClientOriginalName());
                $font->name = $font_face;
                $font->font_face = $font_face;
                $font->url = $file->getClientOriginalName();
            }
        }
        $font->save();
        return redirect('admin/upload-font');
    }
    public function AdminDeleteFont($id){
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json');
        foreach ($request->body->themes as $item){
            if($item->role == 'main'){
                $id_themes = $item->id;
            }
        }
        $font = Upload_Font::find($id);
        if($font->url != 'null'){
            Storage::delete('fonts/'.$font->url);
        }
        $request = $shop->api()->rest('DELETE', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json?asset[key]=assets/'.$font->url);
        $font->delete();
        return redirect('admin/upload-font');
    }
}
