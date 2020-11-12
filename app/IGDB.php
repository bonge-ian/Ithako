<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Exceptions\AuthenticationException;

class IGDB
{
    public static function auth()
    {
        // check if token is in cache
        if ($access_token = Cache::get('igdb-token', false)) {
            return $access_token;
        }

        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('TWITCH_APP_ID'),
            'client_secret' => env('TWITCH_APP_SECRET'),
            'grant_type' => 'client_credentials'
        ])->object();

        if (!$response->access_token && $response->expires_in) {
            throw new AuthenticationException('Sorry. We could not retrieve an access token from twitch');
        }


        Cache::put('igdb-token', $response->access_token, $response->expires_in);

        return $response->access_token;
    }
}
