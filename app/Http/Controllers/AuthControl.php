<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthControl extends Controller
{
    // public function index(){
    //     $users = DB::table('users')->select('id', 'name')->get();
    //     return response()->json($users);
    // }
    // ATAU
    public function index(){
        $users = User::all();
        return response()->json($users);
    }
    public function show($id){
        $user = User::all($id);
        return response()->json($user);

    }
    public function store(Request $request){
       
        $validated = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
     
        $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
 
         $user->save();

        //  cara 1
        // $user = User::create([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "password" => Hash::make($request->password),

        // ]);
        
        return response()->json([
            'status'=> true,
            'message' => 'Berhasil Masuk',
            'data' => $user
        ]);
    }
    public function destroy ($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status'=> true,
            'message' => 'Data User Dihapus'
        ]);
    }

  
}