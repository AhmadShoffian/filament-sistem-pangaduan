<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'master_kat_informasi_id',
        'master_kat_keberatan_id',
        'nama_lengkap',
        'nomor_identitas',
        'lampiran_identitas',
        'lampiran_apbh',
        'email',
        'alamat',
        'no_telepon',
        'rincian_informasi',
        'lampiran_dukung',
        'status',
        'nama_pejabat',
        'jabatan_pejabat',
        'nama_mitra',
        'jabatan_mitra',
        'penyalahgunaan_pejabat',
        'penyalahgunaan_mitra',
        'lampiran_bukti_pejabat',
        'lampiran_bukti_mitra',
        'tujuan_permohonan_informasi',
        'tujuan_keberatan',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // RELASI
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

    public function kategoriInformasi()
    {
        return $this->belongsTo(Informasi::class, 'master_kat_informasi_id');
    }

    public function kategoriKeberatan()
    {
        return $this->belongsToMany(KatKeberatan::class, 'ticket_kat_keberatan', 'ticket_id', 'kat_keberatan_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
