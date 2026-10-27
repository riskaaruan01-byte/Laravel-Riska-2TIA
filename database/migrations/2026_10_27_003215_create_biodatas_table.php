
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biodata_nya', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('status')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('foto')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('pengalaman_kerja')->nullable();
            $table->text('kemampuan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biodata_nya');
    }
};
