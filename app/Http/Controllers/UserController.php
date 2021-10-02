<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function upload($id, Request $request)
    {
        $user = User::find($id);
        $imageName = time().'.'. $request->photo->extension();
        $user->photo = $imageName;
        $user->save();


        $request->photo->move(public_path('images'), $imageName);
        return response()->json([
            'status'=> true,
            'message' => 'Uploaded Succes'
        ]);


    }
    
}
