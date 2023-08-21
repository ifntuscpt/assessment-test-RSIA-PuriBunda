<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\JabatanKaryawan;
use App\Models\Karyawan;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    //
    public function add()
    {
        $jabatans = Jabatan::all();
        $units = Unit::all();

        $jabatans = $jabatans->map(function($jabatan){
            return [
                'id'=> $jabatan->id,
                'text' => $jabatan->nama_jabatan
            ];
        });

        $jabatans = json_encode($jabatans);

        $units = $units->map(function($unit){
            return [
                'id'=> $unit->id,
                'text' => $unit->nama_unit
            ];
        });

        $units = json_encode($units);

        return view('TambahKaryawan', compact('jabatans', 'units'));
    }

    public function index()
    {
        $karyawans = Karyawan::all();

        return view('Karyawan', compact('karyawans'));
    }

    public function create(Request $request)
    {

        // dd($request);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:karyawans',
            'password' => ['required', 'min:10'],
            'unit' => 'required',
            'jabatans' => 'required|array',
            'joined_at' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error_message', "Gagal Menambah Data");
        }

        DB::beginTransaction();

        try{
            // Save Karyawan
            $karyawan = Karyawan::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'joined_at' => Carbon::createFromFormat('d/m/Y', $request->joined_at)->toDateString()
                
            ]);
            
            // Save Jabatan Karyawan
            foreach($request->jabatans as $jabatan){
                if(intval($jabatan) != 0){
                    JabatanKaryawan::create([
                        'karyawan_id' => $karyawan->id,
                        'jabatan_id' => $jabatan
                    ]);
                }else{
                    $jabatanNew = Jabatan::create([
                        "nama_jabatan" => $jabatan
                    ]);
                    JabatanKaryawan::create([
                        'karyawan_id' => $karyawan->id,
                        'jabatan_id' => $jabatanNew->id
                    ]);
                }
            }

            // Save Unit Karyawan
            if(intval($request->unit) != 0){
                $karyawan->unit_id = $request->unit;
                $karyawan->save();
            }else{
                $unit = Unit::create([
                    "nama_unit" =>$request->unit
                ]);
                $karyawan->unit_id = $unit->id;
                $karyawan->save();
            }

            DB::commit();
            
        }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return redirect()->route('data-karyawan');

    }

    public function destroy(Request $request)
    {
        $karyawan = Karyawan::find($request->id);
        $karyawan->delete();
        return redirect()->route('data-karyawan');
    }

    public function edit(Request $request){
        $karyawan = Karyawan::find($request->karyawan_id);

        $allJabatans = Jabatan::all()->map(function($jabatan){
            return [
                'id'=> $jabatan->id,
                'text' => $jabatan->nama_jabatan
            ];
        });
        $allUnits = Unit::all()->map(function($unit){
            return [
                'id'=> $unit->id,
                'text' => $unit->nama_unit
            ];
        });

        $selectedJabatans = $karyawan->jabatans->map(function($jabatan){
            return [
                'id'=> $jabatan->id,
                'text' => $jabatan->nama_jabatan,
                'selected' => true
            ];
        });
        $selectedUnit =  [
            [
                'id'=> $karyawan->unit->id,
                'text' => $karyawan->unit->nama_unit,
                'selected' => true
            ]
            ];
        

        $finalJabatans = $allJabatans->merge($selectedJabatans);
        $finalUnit = $allUnits->merge($selectedUnit);

        $jabatans = json_encode($finalJabatans);
        $units = json_encode($finalUnit);

        // dd($finalJabatans,$finalUnit);
        

        return view('EditKaryawan', compact('karyawan', 'jabatans', 'units'));
    }

    public function update(Request $request){
        // dd($request);
        $karyawan = Karyawan::find($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'username' => 'required|unique:karyawans',
            'unit' => 'required',
            'jabatans' => 'required|array',
            'joined_at' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error_message', "Gagal Menambah Data");
        }

        DB::beginTransaction();

        try{
            $karyawan->jabatans()->detach();

            if($request->password){
                $karyawan->password = Hash::make($request->password);
                $karyawan->save();
            }

            // Save Karyawan
            $karyawan->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'joined_at' => Carbon::createFromFormat('d/m/Y', $request->joined_at)->toDateString()
            ]);
            
            // Save Jabatan Karyawan
            foreach($request->jabatans as $jabatan){
                if(intval($jabatan) != 0){
                    JabatanKaryawan::create([
                        'karyawan_id' => $karyawan->id,
                        'jabatan_id' => $jabatan
                    ]);
                }else{
                    $jabatanNew = Jabatan::create([
                        "nama_jabatan" => $jabatan
                    ]);
                    JabatanKaryawan::create([
                        'karyawan_id' => $karyawan->id,
                        'jabatan_id' => $jabatanNew->id
                    ]);
                }
            }

            // Save Unit Karyawan
            if(intval($request->unit) != 0){
                $karyawan->unit_id = $request->unit;
                $karyawan->save();
            }else{
                $unit = Unit::create([
                    "nama_unit" =>$request->unit
                ]);
                $karyawan->unit_id = $unit->id;
                $karyawan->save();
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }
        return redirect()->route('data-karyawan');
    }
}
