<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Http\Request;
use App\User;
use App\Store;
use App\UserProviders;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
class LoginShopifyController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(Request $request)
    {

        $this->validate($request, [
            'shop' => 'string|required'
        ]);
        $shop_name = $request->shop;
        $scopes = 'read_script_tags,write_script_tags';

        $kem =   'https://'.$shop_name.'/admin/oauth/authorize?client_id='.env('SHOPIFY_KEY').'&scope='.$scopes.'&redirect_uri='.env('APP_URL').'/login/shopify/callback';
        return redirect($kem);

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $shopifyUser = Socialite::driver('shopify')->stateless()->user();

        // Create user

        $user = User::firstOrCreate([
            'name' => $shopifyUser->name,
            'email' => $shopifyUser->email,
            'site' => $shopifyUser->nickname,
            'access_token'=> $shopifyUser->token
        ]);


        // Store the OAuth Identity
        UserProviders::firstOrCreate([
            'user_id' => $user->id,
            'provider' => 'shopify',
            'provider_user_id' => $shopifyUser->id,
            'provider_token' => $shopifyUser->token,
        ]);

        // Create shop
        $shop = Store::firstOrCreate([
            'name' => $shopifyUser->name,
            'domain' => $shopifyUser->nickname,
        ]);

        // Attach shop to user
        $shop->users()->syncWithoutDetaching([$user->id]);

        // Login with Laravel's Authentication system
        Auth::login($user, true);

        return redirect('/home');

    }

}