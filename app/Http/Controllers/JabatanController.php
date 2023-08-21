<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    //
    public function index()
    {
        $jabatans =  Jabatan::all();

        return view("Jabatan", compact("jabatans"));
    }
    public function add()
    {
        return view("TambahJabatan");
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|unique:jabatans'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error_message', "Gagal Menambah Data");
        }

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        return redirect()->route('data-jabatan');
    }

    public function destroy(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        $jabatan->delete();
        return redirect()->route('data-jabatan');
    }


    public function edit(Request $request){
        $jabatan = Jabatan::find($request->jabatan_id);
        return view('EditJabatan', compact('jabatan'));
    }

    public function update(Request $request){

        $jabatan = Jabatan::find($request->id);

        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|unique:jabatans'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error_message', "Gagal Menambah Data");
        }

        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        return redirect()->route('data-jabatan');

    }
}
    // public function update()
    // {
    //     return view("UpdateJabatan");
    // }
    // public function delete()
    // {
    //     return view("DeleteJabatan");
    // }