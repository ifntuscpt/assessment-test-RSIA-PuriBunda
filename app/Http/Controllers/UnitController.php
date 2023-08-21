<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    //
    public function index()
    {
        $units = Unit::all();

        return view('Unit', compact('units'));
    }

    public function add()
    {
        return view('TambahUnit');
    }

    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'nama_unit' => 'required|unique:units'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error_message', "Gagal Menambah Data");
        }

        Unit::create([
            'nama_unit' => $request->nama_unit
        ]);

        return redirect()->route('data-unit');
    }

    public function destroy(Request $request)
    {
        $unit = Unit::find($request->id);
        $unit->delete();
        return redirect()->route('data-unit');
    }
}
