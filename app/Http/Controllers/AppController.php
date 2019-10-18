<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Font;
use App\Contrast;
use App\Setting;
class AppController extends Controller
{
    public $site_menu, $site_font,$site_contrast;
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
        return view('pages/index')->with('profile',$profile);
    }
    public function  elderly(){
        return view('pages/profile/elderly')->with(['site_menu'=>$this->site_menu,'site_font'=>$this->site_font,'contrast'=>$this->site_contrast]);
    }
}
