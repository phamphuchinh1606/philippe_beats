<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;
use App\Common\Utils;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $social)
    {
        if(Utils::$API_NAME_INSTAGRAM == $social){
            $user = $this->createUserFromInstagram($providerUser);
        }else if(Utils::$API_NAME_FACEBOOK == $social){
            $user = $this->creaetUserFacebook($providerUser);
        }
        return $user;
    }

    private function createUserFromInstagram($userInfo){
        $social = Utils::$API_NAME_INSTAGRAM;

        $userInstagram = $userInfo->accessTokenResponseBody['user'];
        $id = $userInstagram['id'];
        $token = $userInfo->accessTokenResponseBody['access_token'];
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($id)
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $email = $userInfo->getEmail() ?? $id;
            $account = new SocialAccount([
                'provider_user_id' => $id,
                'provider' => $social
            ]);
            $account->token = $token;
            if(isset($userInfo->nickname)){
                $account->nickname = $userInfo->nickname;
            }
            if(isset($userInfo->name)){
                $account->name = $userInfo->name;
            }

            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $userInstagram['username'].$id,
                    'username' => $userInstagram['username'],
                    'password' => $userInstagram['username'],
                    'image_profile' => $userInstagram['profile_picture'],
                    'token_api' => $token,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

    private function creaetUserFacebook($userInfo){
        $social = Utils::$API_NAME_INSTAGRAM;
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($userInfo->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $email = $userInfo->getEmail() ?? $userInfo->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $userInfo->getId(),
                'provider' => $social
            ]);
            if(isset($userInfo->token)){
                $account->token = $userInfo->token;
            }
            if(isset($providerUser->nickname)){
                $account->nickname = $userInfo->nickname;
            }
            if(isset($providerUser->name)){
                $account->name = $userInfo->name;
            }

            $user = User::whereEmail($email)->first();
            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'username' => $userInfo->name,
                    'password' => $userInfo->name,
                    'image_profile' => $userInfo->avatar,
                    'token_api' => $userInfo->token,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}