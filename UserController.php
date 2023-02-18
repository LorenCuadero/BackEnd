<?php

namespace App\Http\Controllers;
use App\Models\Format;
use Illuminate\Http\Request;

Use App\Models\User;

class UserController extends Controller
{

  
    public function index()
    {
        return User::all();

    }

    public function store(Request $request)

    // dependency injection - automatic create an instance


    {
      $data =  $request->validate([
            'name ' => 'required|min:3|max:100'

    ]);

    // return $data;

      return User::create([

        //    'name' => $request->input('name'),

        'name' => $request->name,
        'color' => $request->color,
        'test' => $request->test

        ]);
        // return User::create([

        // //    'name' => $request->input('name'),

        // 'name' => $request->name,
        // 'color' => $request->color,
        // 'test' => $request->test

        // ]);
    }

    public function show($id)
    {

        return User::where('id', $id)->first();

    }

    public function update(Request $request, $id)
    {
        //find the User youre going to update
        User::find($id)->update([
            'name' => $request->name,
            'color' => $request->color,
            'test' => $request->test
        ]);
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
