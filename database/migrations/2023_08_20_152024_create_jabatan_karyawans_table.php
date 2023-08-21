<?php

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan_karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Jabatan::class);
            $table->foreignIdFor(Karyawan::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan_karyawans');
    }
}
