<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('Login');
    }


    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $karyawan = Karyawan::where('username', $request->username)->first();

        if($karyawan){
            if(Hash::check($request->password, $karyawan->password)){
                $karyawan->total_login += 1;
                $karyawan->save();
                return "BERHASIL LOGIN";
            }else{
                return "PASSWORD SALAH";
            }
        }else{
            return "AKUN TIDAK DITEMUKAN";
        }

    }
}
