<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edited;

class EditedController extends Controller {
    public function storeEdit( Request $request ) {
        // Validate the inputs
        $request->validate( [
            'content' => 'required',

        ] );

        return Edited::create( [
            'content' => $request->content,

            // 'user_id' =>User::first()

        ] );
        $response[ 'content' ] = 'content';

        return response()->json( $response );
        // }

        return view( 'controllers.create' );

    }

    public function updateEdit( Request $request, $id ) {
        //find the amazing youre going to update
        Edited::find( $id )->update( [
            'content' => $request->content,

        ] );
        $response[ 'content' ] = 'content';

        return response()->json( $response );
        // }

        return view( 'contents.create' );
    }

    public function removeEdit( $contact ) {
        return Edited::find( $contact )->delete();

        return redirect()->route( 'editeds.index' )
        ->with( 'success', 'Contact deleted successfully' );
    }

    public function showEdit( $id ) {
        return Edited::where( 'id', $id )->first();
    }

    public function indexEdit() {
        return Edited::all();
    }

}
