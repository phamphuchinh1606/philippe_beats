<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
    protected $socialAccountService;

    public function __construct(SocialAccountService $socialAccountService)
    {
        $this->socialAccountService = $socialAccountService;
    }

    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $userInfo = Socialite::driver($social)->user();
        $user = $this->socialAccountService->createOrGetUser($userInfo, $social);
        auth()->login($user);

        return redirect()->to('/home');
    }
}
