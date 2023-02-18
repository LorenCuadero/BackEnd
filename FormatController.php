<?php

namespace App\Http\Controllers;
use App\Models\Format;
use Illuminate\Http\Request;
use App\Models\User;

class FormatController extends Controller {
    public function show($id) {
        return Format::where('id', $id)->first();
    }
    public function index() {
        return Format::all();
    }


    public function create() {
        return view( 'formats.create' );
    }


    public function store( Request $request ) {
        // Validate the inputs
        $request->validate( [
            'title' => 'required',
            'content' => 'required',
            'spot' => 'required',
            'author' => 'required',

        ] );

        // ensure the request has a file before we attempt anything else.
        // if ( $request->hasFile( 'image' ) ) {

        //     $request->validate( [
        //         'image' => 'required|mimes:png, jpg' // Only allow .jpg, .bmp and .png file types.
        // ] );

        // Save the file locally in the storage/public/ folder under a new folder named /product
        // $request->image->store( 'format', 'public' );

        // Store the record, using the new file hashname which will be it's new filename identity.
            return Format::create([
                'title' => $request->title,
                'content' => $request->content,
                'spot' => $request->spot,
                'author' => $request->author,
                // 'user_id' =>User::first()

            ]);
            $response[ 'title' ] = 'title';
            $response[ 'content' ] = 'content';
            $response [ 'spot' ] = 'spot';
            $response [ 'author' ] = 'author';
            return response()->json( $response );
        // }

        return view('formats.create');

    }
    // public function show(Format $format)
    // {
    //     return view('formats.show',compact('format'));
    // }


    // public function destroy($id)
    // {
    //     return Amazing::find($id)->delete();
    // }


    // public function update(Request $request, Format $Format)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'spot' => 'required',
    //         'author' => 'required',
    //     ]);

    //     $input = $request->all();

    //     $Format->update($input);

    //     return redirect()->route('formats.index')
    //                     ->with('success','format updated successfully');
    // }
    public function update(Request $request, $id)
    {
        //find the amazing youre going to update
        Format::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'spot' => $request->spot,
            'author' => $request->author
        ]);
        $response[ 'title' ] = 'title';
        $response[ 'content' ] = 'content';
        $response [ 'spot' ] = 'spot';
        $response [ 'author' ] = 'author';
        return response()->json( $response );
    // }

    return view('formats.create');
    }

    public function remove($format)
    {
      return Format::find($format)->delete();

        return redirect()->route('formats.index')
                        ->with('success','Format deleted successfully' );
    }


}
