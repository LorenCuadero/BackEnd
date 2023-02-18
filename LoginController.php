<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller {
    //login

    public function login( Request $request ) {
        $http = new \GuzzleHttp\Client();
        $response = $http->post( 'http://127.0.0.1:8000/api/login',
        [ 'headers' =>
        [ 'Authorization' => 'Bearer '.session()->get( 'token.access_token' ) ],
        'query' => [
            'email' => 'leta.collier@example.com',
            'password' => 'password'
        ] ] );

        $result = json_decode((string)$response->getBody(),true);
        return dd( $result);
        return view( 'login' );
    }
}
