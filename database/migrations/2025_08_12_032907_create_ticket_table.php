<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_ticket')->unique();
            $table->foreignId('master_kat_pemohon_id')->constrained('master_kat_pemohon')->onDelete('cascade');
            $table->foreignId('master_kat_bidang_id')->constrained('master_kat_bidang')->onDelete('cascade');
            $table->foreignId('master_layanan_informasi_id')->constrained('master_layanan_informasi')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nomor_identitas');
            $table->string('lampiran_identitas');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->text('rincian_informasi');
            $table->string('lampiran_dukung')->nullable();
            $table->string('status')->default('in_progress');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
