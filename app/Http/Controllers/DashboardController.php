<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Unit;

class DashboardController extends Controller
{
    public function getData()
    {
        $topKaryawans = Karyawan::where('total_login', '>', 25)->limit(10)->get();
        $data = [
            'karyawans' => Karyawan::count(),
            'units' => Unit::count(),
            'jabatans' => Jabatan::count(),
            'logins' => Karyawan::all()->sum("total_login"),
            'topKaryawans' => $topKaryawans
            
        ];
        return view('Admin', compact('data'));
    }
}
