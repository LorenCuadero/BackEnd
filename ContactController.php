<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller {
    public function store( Request $request ) {
        // Validate the inputs
        $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',

        ] );

        // ensure the request has a file before we attempt anything else.
        // if ( $request->hasFile( 'image' ) ) {

        //     $request->validate( [
        //         'image' => 'required|mimes:png, jpg' // Only allow .jpg, .bmp and .png file types.
        // ] );

        // Save the file locally in the storage/public/ folder under a new folder named /product
        // $request->image->store( 'Contact', 'public' );

        // Store the record, using the new file hashname which will be it's new filename identity.
            return Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'message' => $request->message,
                // 'user_id' =>User::first()

            ]);
            $response[ 'name' ] = 'name';
            $response[ 'email' ] = 'email';
            $response [ 'contact' ] = 'contact';
            $response [ 'message' ] = 'message';
            return response()->json( $response );
        // }

        return view('controllers.create' );

    }
    public function updateContact(Request $request, $id)
    {
        //find the amazing youre going to update
        Contact::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'messages' => $request->messages
        ]);
        $response[ 'name' ] = 'name';
        $response[ 'email' ] = 'email';
        $response [ 'contact' ] = 'contact';
        $response [ 'messages' ] = 'messages';
        return response()->json( $response );
    // }

    return view('contacts.create');
    }

    public function removeContact($contact)
    {
      return Contact::find($contact)->delete();

        return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully' );
    }
    public function showContact($id) {
        return Contact::where('id', $id)->first();
    }
    public function indexContact() {
        return Contact::all();
    }


}
