<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'nomor_ticket',
        'master_kat_pemohon_id',
        'master_kat_bidang_id',
        'master_layanan_informasi_id',
        'nama_lengkap',
        'nomor_identitas',
        'lampiran_identitas',
        'email',
        'alamat',
        'no_telepon',
        'rincian_informasi',
        'lampiran_dukung',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function jenisLayanan()
    {
        return $this->belongsTo(LayananInformasi::class, 'master_layanan_informasi_id');
    }

    public function kategoriPemohon()
    {
        return $this->belongsTo(Pemohon::class, 'master_kat_pemohon_id');
    }

    public function kategoriBidang()
    {
        return $this->belongsTo(Bidang::class, 'master_kat_bidang_id');
    }

    // public function kategoriInformasi()
    // {
    //     return $this->belongsTo(Informasi::class, 'master_kat_informasi_id');
    // }
}
