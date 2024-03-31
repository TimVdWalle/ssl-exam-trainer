<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    /**
     * @param Request $request
     * @param string $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function store(Request $request, string $provider)
    {
        Log::info('SocialiteController google callback');

        if ($provider !== 'google') {
            return redirect(route('register'));
        }

        $result = $this->storeGoogle($request);
        if (!$result) {
            return redirect(route('register'));
        }

        return redirect(route('home', ['showLoggedIn' => true]));
    }

    /**
     * @param Request $request
     * @return boolean
     */
    public function storeGoogle(Request $request)
    {
        $externalUser = Socialite::driver('google')->user();

        $name = $externalUser->getName();
        $email = $externalUser->getEmail();
        $id = $externalUser->getId();

        if (!$email) {
            return false;
        }

        $user = User::query()
            ->where('email', '=', $email)
            ->first();

        if (!$user) {
            // user does not exist yet => create the user
            $user = new User();
            $user->name = $name ?? '';
            $user->email = $email;
            $user->socialite_token = $id;
            $user->save();
        } else {
            $user->socialite_token = $id;
            $user->save();
        }

        Auth::login($user);
        return true;
    }
}

/*

develop.INFO: {"id":"111593926194920932260","nickname":null,"name":"Tim Vande Walle","email":"tim@vandewalle.mobi","avatar":"https:\/\/lh3.googleusercontent.com\/a\/ACg8ocIKDG3snKWLta_ZvfXeW5Hy40uq0La0YvL5imdDg8ER=s96-c","user":{"sub":"111593926194920932260","name":"Tim Vande Walle","given_name":"Tim Vande","family_name":"Walle","picture":"https:\/\/lh3.googleusercontent.com\/a\/ACg8ocIKDG3snKWLta_ZvfXeW5Hy40uq0La0YvL5imdDg8ER=s96-c","email":"tim@vandewalle.mobi","email_verified":true,"locale":"nl","hd":"vandewalle.mobi","id":"111593926194920932260","verified_email":true,"link":null},"attributes":{"id":"111593926194920932260","nickname":null,"name":"Tim Vande Walle","email":"tim@vandewalle.mobi","avatar":"https:\/\/lh3.googleusercontent.com\/a\/ACg8ocIKDG3snKWLta_ZvfXeW5Hy40uq0La0YvL5imdDg8ER=s96-c","avatar_original":"https:\/\/lh3.googleusercontent.com\/a\/ACg8ocIKDG3snKWLta_ZvfXeW5Hy40uq0La0YvL5imdDg8ER=s96-c"},"token":"ya29.a0Ad52N38Epo211gSE6rksVl_YdOudfLulpFAPlFaHplfVCXXuI1XEqzufmkjlY4Y--kndn-PuGG7H6NYbfFDa1dAE4iSTSUnvIoMO-5LoR1ARYPnezuzjtwQBXozs_PLuf767wkFCkCL720vq-0wbS_uczI-ILo1__waCgYKASQSARASFQHGX2MiLDerjMp-AFA374izQnsObA0169","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\/\/www.googleapis.com\/auth\/userinfo.profile","openid","https:\/\/www.googleapis.com\/auth\/userinfo.email"]}

 */
