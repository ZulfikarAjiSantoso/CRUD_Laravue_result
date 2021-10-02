<?php

namespace App\Http\Controllers;

use App\Models\Crudmod;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class Crudcon extends Controller
{
   
    public function index(){
        $anggota = DB::table('anggota')->get();
        return response()->json($anggota);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'type'=> 'required',
            
        ]);
        $anggota = new Crudmod();
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->type = $request->type;  
        $anggota->save();
         return response()->json([
            'status'=> true,
            'message' => 'Berhasil Masuk',
            'data' => $anggota
        ]);
    }
    public function show($id){
        return Crudmod::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'type'=> 'required',
            
        ]);
        $anggota = Crudmod::findOrFail($id);
        $anggota->update($request->all());
        return response()->json([
            'status' => true,
            'message'=>'Data User Berhasil Diubah',
            'data' => $anggota
        ]); 
    }
    public function destroy ($id){
        $anggota = Crudmod::findOrFail($id);
        $anggota->delete();
        return response()->json([
            'status'=> true,
            'message'=>'Data User dihapus'
        ]);

    }
}
