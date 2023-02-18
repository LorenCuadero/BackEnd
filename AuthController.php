<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller {

    // show

    public function show( $id ) {

       $respone [ 'response '] = User::where( 'email', $id );
       return response()->json( $respone );
    }

    //register

    public function register( Request $request ) {
        return User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'position' => 'user',
            
        ] );
        $response[ 'status' ] = 1;
        $response[ 'message' ] = 'User registered successfully';
        $response[ 'code' ] = 200;
        $response [ 'position' ] = 'user';
        return response()->json( $response );

    }

    //login

    public function login( Request $request ) {

        $validateData = $request->validate( [
            'email'=>'required|email',
            'password'=>'required|min:8'
        ] );

        $user = User::where( 'email', $validateData[ 'email' ] )->first();

        if ( $user && Hash::check( $validateData[ 'password' ], $user->password ) ) {
            $token = $user->createToken( 'api', [ 'create' ] );
            return[
                'token'=>$token->plainTextToken
            ];

        } else {
            return[
                'Error: '=>'Invalid Credentials'
            ];
        }
    }


    //
}
