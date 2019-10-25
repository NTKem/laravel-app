<?php

namespace App\Http\Controllers;
use phpDocumentor\Reflection\Types\Null_;
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
        $shop = ShopifyApp::shop();
        $shop2 =$shop->shopify_domain;
        $shopDomain = Shop::where(['shopify_domain' => $shop2])->first();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json');
        foreach ($request->body->themes as $item){
            if($item->role == 'main'){
                $id_themes = $item->id;
            }
        }
        $string = '';
        foreach($this->site_contrast as $items){
                $color= $items->color;
                $background =$items->background;
                $string .=  '
                body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets), body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) div, body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) footer, body.contrast-'.$items->id.'>:not(#hkoAccessibilityAssets) header{
                color: '. $color.'!important;
                background-color: '. $background.'!important;
                }';
        }
        $array = [
            'asset'=>[
                'key'=> 'assets/Accessibility.scss.liquid',
                'value'=>'
             body.highlight_title h1,
             body.highlight_title h1 *,
             body.highlight_title h2,
             body.highlight_title h2 *,
             body.highlight_title h3,
             body.highlight_title h3 *,
             body.highlight_title h4,
             body.highlight_title h4 *,
             body.highlight_title h5,
             body.highlight_title h5 *,
             body.highlight_title h6,
             body.highlight_title h6 * {
              color: #03344e !important;
              border-radius: 4px;
              font-weight: 900;
              background-color: #c6f710 !important;
              box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            }
            @font-face {
              font-family: Open-Dyslexic;
              src: url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.eot);
              src: url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.eot?#iefix) format("embedded-opentype"), url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.woff) format("woff"), url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.ttf) format("truetype"), url(https://jsappcdn.hikeorders.com/assets/open-dyslexic/opendyslexic-regular-webfont.svg#opendyslexicregular) format("svg");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Arial;
              src: url(https://jsappcdn.hikeorders.com/assets/arial.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Verdana;
              src: url(https://jsappcdn.hikeorders.com/assets/verdana.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: ComicSansMS;
              src: url(https://jsappcdn.hikeorders.com/assets/ComicSansMS.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Georgia;
              src: url(https://jsappcdn.hikeorders.com/assets/Georgia.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Tahoma;
              src: url(https://jsappcdn.hikeorders.com/assets/tahoma.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Trebuchet;
              src: url(https://jsappcdn.hikeorders.com/assets/Trebuchet.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @font-face {
              font-family: Tiresias;
              src: url(https://jsappcdn.hikeorders.com/assets/Tiresias.ttf) format("truetype");
              font-weight: 400;
              font-style: normal;
            }
            @import url("https://fonts.googleapis.com/css?family=Roboto&display=swap");
             
             
            body.readable-fonts-default :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: inherit;
            }
            body.readable-fonts-arial :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Arial !important;
            }
            body.readable-fonts-verdana :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Verdana !important;
            }
            body.readable-fonts-comic-sans-ms :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: ComicSansMS !important;
            }
            body.readable-fonts-georgia :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Georgia !important;
            }
            body.readable-fonts-tohoma :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Tahoma !important;
            }
            body.readable-fonts-trebuchet :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Trebuchet !important;
            }
            body.readable-fonts-tiresias :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Tiresias !important;
            }
            body.readable-fonts-open-dyslexic :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: Open-Dyslexic !important;
            }
            body.readable-fonts-open-sans :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
              font-family: "Open Sans", sans-serif; !important;
            }
            body.readable-fonts-roboto :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
             font-family: "Roboto", sans-serif; !important;
            }
            body.readable-fonts-helvetica :not(i):not(.fa):not(.fab):not(.fas):not(.glyphicon):not([class*=icons]):not([class*=icon]):not(.material-icons):not(#hkoAccessibilityAssets) {
             font-family: "Roboto", sans-serif; !important;
            }
            body.grayscale > :not(#hkoAccessibilityAssets) a,
            body.grayscale > :not(#hkoAccessibilityAssets) a span,
            body.grayscale > :not(#hkoAccessibilityAssets) b,
            body.grayscale > :not(#hkoAccessibilityAssets) blockquote,
            body.grayscale > :not(#hkoAccessibilityAssets) button,
            body.grayscale > :not(#hkoAccessibilityAssets) canvas,
            body.grayscale > :not(#hkoAccessibilityAssets) caption,
            body.grayscale > :not(#hkoAccessibilityAssets) center,
            body.grayscale > :not(#hkoAccessibilityAssets) cite,
            body.grayscale > :not(#hkoAccessibilityAssets) code,
            body.grayscale > :not(#hkoAccessibilityAssets) col,
            body.grayscale > :not(#hkoAccessibilityAssets) colgroup,
            body.grayscale > :not(#hkoAccessibilityAssets) dd,
            body.grayscale > :not(#hkoAccessibilityAssets) details,
            body.grayscale > :not(#hkoAccessibilityAssets) dfn,
            body.grayscale > :not(#hkoAccessibilityAssets) dir,
            body.grayscale > :not(#hkoAccessibilityAssets) div,
            body.grayscale > :not(#hkoAccessibilityAssets) dl,
            body.grayscale > :not(#hkoAccessibilityAssets) dt,
            body.grayscale > :not(#hkoAccessibilityAssets) em,
            body.grayscale > :not(#hkoAccessibilityAssets) embed,
            body.grayscale > :not(#hkoAccessibilityAssets) fieldset,
            body.grayscale > :not(#hkoAccessibilityAssets) figcaption,
            body.grayscale > :not(#hkoAccessibilityAssets) figure,
            body.grayscale > :not(#hkoAccessibilityAssets) font,
            body.grayscale > :not(#hkoAccessibilityAssets) footer,
            body.grayscale > :not(#hkoAccessibilityAssets) form,
            body.grayscale > :not(#hkoAccessibilityAssets) header,
            body.grayscale > :not(#hkoAccessibilityAssets) i,
            body.grayscale > :not(#hkoAccessibilityAssets) iframe,
            body.grayscale > :not(#hkoAccessibilityAssets) img,
            body.grayscale > :not(#hkoAccessibilityAssets) input,
            body.grayscale > :not(#hkoAccessibilityAssets) kbd,
            body.grayscale > :not(#hkoAccessibilityAssets) label,
            body.grayscale > :not(#hkoAccessibilityAssets) legend,
            body.grayscale > :not(#hkoAccessibilityAssets) li,
            body.grayscale > :not(#hkoAccessibilityAssets) mark,
            body.grayscale > :not(#hkoAccessibilityAssets) menu,
            body.grayscale > :not(#hkoAccessibilityAssets) meter,
            body.grayscale > :not(#hkoAccessibilityAssets) nav,
            body.grayscale > :not(#hkoAccessibilityAssets) nobr,
            body.grayscale > :not(#hkoAccessibilityAssets) object,
            body.grayscale > :not(#hkoAccessibilityAssets) ol,
            body.grayscale > :not(#hkoAccessibilityAssets) option,
            body.grayscale > :not(#hkoAccessibilityAssets) pre,
            body.grayscale > :not(#hkoAccessibilityAssets) progress,
            body.grayscale > :not(#hkoAccessibilityAssets) q,
            body.grayscale > :not(#hkoAccessibilityAssets) s,
            body.grayscale > :not(#hkoAccessibilityAssets) section,
            body.grayscale > :not(#hkoAccessibilityAssets) select,
            body.grayscale > :not(#hkoAccessibilityAssets) small,
            body.grayscale > :not(#hkoAccessibilityAssets) span,
            body.grayscale > :not(#hkoAccessibilityAssets) strike,
            body.grayscale > :not(#hkoAccessibilityAssets) strong,
            body.grayscale > :not(#hkoAccessibilityAssets) sub,
            body.grayscale > :not(#hkoAccessibilityAssets) summary,
            body.grayscale > :not(#hkoAccessibilityAssets) sup,
            body.grayscale > :not(#hkoAccessibilityAssets) table,
            body.grayscale > :not(#hkoAccessibilityAssets) td,
            body.grayscale > :not(#hkoAccessibilityAssets) textarea,
            body.grayscale > :not(#hkoAccessibilityAssets) th,
            body.grayscale > :not(#hkoAccessibilityAssets) time,
            body.grayscale > :not(#hkoAccessibilityAssets) tr,
            body.grayscale > :not(#hkoAccessibilityAssets) tt,
            body.grayscale > :not(#hkoAccessibilityAssets) u,
            body.grayscale > :not(#hkoAccessibilityAssets) ul,
            body.grayscale > :not(#hkoAccessibilityAssets) var {
              filter: grayscale(100%);
              -webkit-filter: grayscale(100%);
            }
            body.sepia > :not(#hkoAccessibilityAssets) {
              -webkit-filter: sepia(0.75) contrast(0.95);
              filter: sepia(0.75) contrast(0.95);
              background: #fec;
            }
            body.invert_colors > :not(#hkoAccessibilityAssets) {
              -webkit-filter: invert(100%);
              filter: invert(100%);
              -o-filter: invert(100%);
              -moz-filter: invert(100%);
              background: #000 !important;
            }
            body.highlight_links a {
              text-decoration: none;
              background: 0 0;
              background-color: #07a8d4 !important;
              color: #fff !important;
              box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            }
            body.zoom_increase-1 > :not(#hkoAccessibilityAssets) {
              zoom: 1.2;
              -ms-zoom: 1.2;
              -webkit-zoom: 1.2;
              -moz-transform: scale(1.15);
              -moz-transform-origin: top center;
            }
            body.zoom_increase-2 > :not(#hkoAccessibilityAssets) {
              zoom: 1.3;
              -ms-zoom: 1.3;
              -webkit-zoom: 1.3;
              -moz-transform: scale(1.2);
              -moz-transform-origin: top center;
            }
            body.zoom_increase-3 > :not(#hkoAccessibilityAssets) {
              zoom: 1.5;
              -ms-zoom: 1.5;
              -webkit-zoom: 1.5;
              -moz-transform: scale(1.4);
              -moz-transform-origin: top center;
            }
            body.zoom_decrease--1 > :not(#hkoAccessibilityAssets) {
              zoom: 0.8;
              -ms-zoom: 0.8;
              -webkit-zoom: 0.8;
              -moz-transform: scale(0.8);
              -moz-transform-origin: top center;
            }
            body.zoom_decrease--2 > :not(#hkoAccessibilityAssets) {
              zoom: 0.7;
              -ms-zoom: 0.7;
              -webkit-zoom: 0.7;
              -moz-transform: scale(0.7);
              -moz-transform-origin: top center;
            }
            body.zoom_decrease--3 > :not(#hkoAccessibilityAssets) {
              zoom: 0.6;
              -ms-zoom: 0.6;
              -webkit-zoom: 0.6;
              -moz-transform: scale(0.6);
              -moz-transform-origin: top center;
            }
            body.stop-animation * {
              -webkit-animation: none!important;
              animation: none!important;
              transition: none!important;
              -webkit-animation-play-state: paused;
              -moz-animation-play-state: paused;
              -o-animation-play-state: paused;
              animation-play-state: paused;
            }
            body.screen_cursor-white {
              cursor: url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_white.png), url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_white.cur), auto !important;
              z-index: 2147483635;
            }
            body.screen_cursor-white a {
              cursor: url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_white.png), url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_white.cur), auto !important;
              z-index: 2147483635;
            }
            body.screen_cursor-blank {
              cursor: url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_black.png), url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_arrow_black.cur), auto !important;
              z-index: 2147483635;
            }
            body.screen_cursor-blank a {
              cursor: url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_black.png), url(https://jsappcdn.hikeorders.com/assets/accessibility_cursors/cursor_hand_black.cur), auto !important;
              z-index: 2147483635;
            }
            body.highlight_focus :focus,
            body.highlight_focus a:hover {
              background-color: #c6f710 !important;
              outline: 2px dashed #e65e34 !important;
              color: #000 !important;
              box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            }
            body.tooltip-permanent .app-tooltip {
              opacity: 1;
            }
            body.tooltip-mouseover .tooltip-on-fly {
              opacity: 1;
            }
            .app-tooltip {
              -ms-transform: translateZ(0);
              -moz-transform: translateZ(0);
              -webkit-transform: translateZ(0);
              transform: translateZ(0);
              position: absolute;
              max-width: 300px;
              padding: 8px 10px 10px;
              font-size: 13px!important;
              word-break: break-all;
              line-break: auto;
              background-color: #2d2d2d;
              color: #fff;
              border-radius: 4px;
              opacity: 0;
              z-index: 2147483646;
              -webkit-box-shadow: 3px 3px 30px 0 #4d4e2d;
              -moz-box-shadow: 3px 3px 30px 0 #4d4e2d;
              box-shadow: 3px 3px 30px 0 #4d4e2d;
            }
            .app-tooltip:after {
              content: "";
              position: absolute;
              top: 100%;
              left: 5%;
              margin-left: -5px;
              border-width: 5px;
              border-style: solid;
              border-color: #555 transparent transparent transparent;
            }
            .tooltip-on-fly {
              -ms-transform: translateZ(0);
              -moz-transform: translateZ(0);
              -webkit-transform: translateZ(0);
              transform: translateZ(0);
              position: fixed;
              max-width: 200px;
              padding: 8px 10px 10px;
              font-size: 13px!important;
              word-break: break-all;
              line-break: auto;
              background-color: #2d2d2d;
              color: #fff;
              border-radius: 4px;
              opacity: 0;
              z-index: 2147483646;
              -webkit-box-shadow: 3px 3px 30px 0 #4d4e2d;
              -moz-box-shadow: 3px 3px 30px 0 #4d4e2d;
              box-shadow: 3px 3px 30px 0 #4d4e2d;
            }
             
            body.screen_settings .mask-screen-bottom,
            body.screen_settings .mask-screen-top {
              display: block;
            }
            .mask-screen-bottom,
            .mask-screen-top {
              background-color: #000;
              z-index: 2147483646;
              position: fixed;
              opacity: 1;
              left: 0;
              right: 0;
              width: 100%;
              display: none;
            }
            .mask-screen-bottom {
              bottom: 0;
            }
            .mask-screen-top {
              top: 0;
            }
            body.screen-ruler .screen-ruler-box {
              display: block;
            }
            .screen-ruler-box {
              background-color: #000;
              z-index: 2147483646;
              position: fixed;
              left: 0;
              right: 0;
              width: 100%;
              top: 0;
              display: none;
              height: 10px;
            }
            .acc-style {
              width: auto!important;
              color: inherit!important;
              float: none!important;
              text-align: inherit!important;
              box-shadow: unset !important;
            }
            .highlight-element {
              background-color: #c6f710 !important;
              border: 2px dashed red;
              color: #000 !important;
              box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            }
            .skip-to-content-btn {
              position: absolute;
              z-index: 50000!important;
              display: inline-block !important;
              width: 1px;
              height: 1px;
              overflow: hidden;
              top: auto;
              background: 0 0;
            }
            .skip-to-content-btn:focus {
              left: 0;
              background: #fff;
              color: #000;
              border: 4px solid #555;
              padding: 10px;
              font-size: 16px;
              width: auto;
              height: auto;
              box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            }
            .external-link:after {
              font-family: hko-icons;
              content: " \\f08e";
            }
            .scroll-to-top {
              position: fixed;
              z-index: 2147483646;
              height: 48px;
              width: 48px;
              cursor: pointer;
              bottom: 20px;
              padding: 5px 0;
              border-color: transparent;
              background-color: #ccc9c9;
              opacity: 0.6;
              background-image: none!important;
              line-height: 1;
              border-radius: 80%;
              display: none;
              transition: 0.3s;
            }
            .scroll-to-top .up-icon {
              font-size: 34px;
              color: #fff;
            }
            .scroll-to-top-align-left {
              left: 20px;
            }
            .scroll-to-top-align-right {
              right: 20px;
            }
            .show-scroll-top {
              display: inline-block;
            }
            @media print {
              .scroll-to-top {
                display: none;
              }
            }
            .lite-version-badge {
              bottom: 0;
              position: fixed;
              right: 20px;
              z-index: 2147483644;
              display: none;
              line-height: 0!important;
              height: 40px;
              width: 250px;
              border-top-left-radius: 10px;
              border-top-right-radius: 10px;
              border: 1px solid #f15822;
              background-color: #f15822;
              border-bottom: 0;
              font-family: Verdana!important;
              text-align: center!important;
              padding: 10px 10px;
              color: #fff !important;
              -webkit-box-sizing: border-box !important;
              box-sizing: border-box !important;
            }
            .lite-version-badge:after,
            .lite-version-badge:before {
              -webkit-box-sizing: border-box !important;
              box-sizing: border-box !important;
            }
            .lite-version-badge .badge-heading {
              min-height: 35px;
              border-bottom: 1px solid #fff;
              margin-bottom: 10px;
              cursor: pointer !important;
            }
            .lite-version-badge .badge-heading .recommend {
              font-size: 12px;
              font-weight: 400;
              margin-bottom: 16px;
              font-family: Verdana !important;
            }
            .lite-version-badge .badge-heading .prod-name {
              font-size: 16px;
              font-weight: bolder;
              font-family: Verdana !important;
            }
            .lite-version-badge .badge-content .a11y-content {
              font-size: 14px!important;
              line-height: 20px!important;
              min-height: 30px!important;
              font-family: Verdana!important;
              margin-bottom: 20px!important;
              max-height: 30px!important;
              color: #fff !important;
            }
            .lite-version-badge .badge-content .banner_image {
              width: 100%;
              margin-bottom: 5px;
              background: #000;
              height: 130px;
              background-image: url(https://jsappcdn.hikeorders.com/assets/trail-badge-image-2.png);
              background-repeat: no-repeat;
            }
            .lite-version-badge .badge-content .a11y-get-btn {
              padding: 10px 5px!important;
              background-color: #000 !important;
              color: #fff !important;
              font-size: 14px!important;
              font-weight: 700!important;
              line-height: 16px!important;
              width: 100%!important;
              text-decoration: none!important;
              margin-bottom: 20px!important;
              display: inline-block !important;
              border-radius: 5px!important;
              font-family: Verdana!important;
              cursor: pointer!important;
              background-color: #45484d !important;
              background-image: -webkit-gradient(linear, left top, left bottom, from(#45484d), to(#000)) !important;
              background-image: -webkit-linear-gradient(top, #45484d, #000) !important;
              background-image: -moz-linear-gradient(top, #45484d, #000) !important;
              background-image: -ms-linear-gradient(top, #45484d, #000) !important;
              background-image: -o-linear-gradient(top, #45484d, #000) !important;
              background-image: linear-gradient(to bottom, #45484d, #000) !important;
              box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.25), 0 1px 2px 0 rgba(0, 0, 0, 0.1) !important;
              -webkit-transform: scale(1.03) !important;
              -ms-transform: scale(1.03) !important;
              vertical-align: baseline!important;
              -webkit-box-sizing: border-box !important;
              box-sizing: border-box !important;
            }
            .lite-version-badge .badge-content .a11y-get-btn:after,
            .lite-version-badge .badge-content .a11y-get-btn:before {
              -webkit-box-sizing: border-box !important;
              box-sizing: border-box !important;
            }
            .lite-version-badge .a11y-remove-link {
              color: #f1efef !important;
              font-size: 11px!important;
              text-decoration: none!important;
              font-family: Verdana!important;
              cursor: pointer!important;
              text-align: left!important;
              display: block !important;
            }'.$string.'
           
                '
            ]
        ];
        $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
        $array = [
            'asset'=>[
                'key'=> 'templates/index.liquid',
                'value'=> '
                 {{ "Accessibility.scss" | asset_url | stylesheet_tag }} {{ content_for_index }}
                 ',

            ]
        ];
        $request = $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'.$id_themes.'/assets.json',$array);
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
