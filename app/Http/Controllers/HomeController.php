<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Ticket;
use App\Models\Pemohon;
use App\Models\Informasi;
use Illuminate\Support\Str;
use App\Models\KatKeberatan;
use Illuminate\Http\Request;
use App\Models\LayananInformasi;

class HomeController extends Controller
{
    public function index()
    {
        $jenisLayanan = LayananInformasi::all();
        $katPemohon = Pemohon::all();
        $katBidang = Bidang::all();
        $katInformasi = Informasi::all();
        $katKeberatan = KatKeberatan::all();
        return view('home', compact('jenisLayanan','katPemohon','katBidang','katInformasi','katKeberatan'));
    }

public function store(Request $request)
{
    
    $validated = $request->validate([
        'subject'           => 'required|exists:master_layanan_informasi,id',
        'name'              => 'required|string|max:255',
        'applicant'         => 'required|exists:master_kat_pemohon,id',
        'identity'          => 'required|string|max:50',
        'ifiles'            => 'required|mimes:jpg,jpeg,png|max:200',
        'email'             => 'required|email',
        'handphone'         => 'required|string|max:15',
        'address'           => 'required|string',
        'rincian_informasi' => 'nullable|string',
        'category'          => 'nullable|exists:master_kat_bidang,id',
        'nama_pejabat'      => 'nullable|string|max:255',
        'jabatan'           => 'nullable|string|max:255',
        'nama_mitra'        => 'nullable|string|max:255',
        'jabatan_mitra'     => 'nullable|string|max:255',
        'penyalahgunaan'    => 'nullable|string',
        'dfiles'            => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:1024',
        'sfiles'            => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:1024',
        'keberatan'         => 'nullable|string',
        'purpose'           => 'nullable|string',
        'objection'         => 'nullable|array',
        'objection.*'       => 'exists:master_kat_keberatan,id',
        'getinfo'           => 'nullable|string',
        'terms'             => 'required',
    ]);

    // simpan file upload
    if ($request->hasFile('ifiles')) {
        $lampiran_identitas = $request->file('ifiles')->store('lampiran_identitas', 'public');
    }

    if ($request->hasFile('dfiles')) {
        $lampiran_dukung = $request->file('dfiles')->store('lampiran_data_dukung', 'public');
    }

    if ($request->hasFile('sfiles')) {
        $lampiran_bukti_pejabat = $request->file('sfiles')->store('lampiran_bukti', 'public');
    }

    // buat ticket baru
    $ticket = Ticket::create([
        'nomor_ticket'                  => 'TCK-' . strtoupper(Str::random(6)),
        'master_layanan_informasi_id'    => $validated['subject'],
        'master_kat_pemohon_id'          => $validated['applicant'],
        'nomor_identitas'                => $validated['identity'],
        'lampiran_identitas'             => $lampiran_identitas ?? null,
        'lampiran_dukung'                => $lampiran_dukung ?? null,
        'lampiran_bukti_pejabat'         => $lampiran_bukti_pejabat ?? null,
        'nama_lengkap'                  =>  $validated['name'],
        'email'                          => $validated['email'],
        'no_telepon'                     => $validated['handphone'],
        'alamat'                         => $validated['address'],
        'rincian_informasi'              => $validated['rincian_informasi'] ?? '',
        'master_kat_bidang_id'           => $validated['category'] ?? null,
        'nama_pejabat'                   => $validated['nama_pejabat'] ?? null,
        'jabatan_pejabat'                => $validated['jabatan'] ?? null,
        'nama_mitra'                     => $validated['nama_mitra'] ?? null,
        'jabatan_mitra'                  => $validated['jabatan_mitra'] ?? null,
        'penyalahgunaan_pejabat'         => $validated['penyalahgunaan'] ?? null,
        'tujuan_permohonan_informasi'    => $validated['purpose'] ?? null,
        'tujuan_keberatan'               => $validated['keberatan'] ?? null,
    ]);

    // simpan kategori keberatan ke pivot kalau ada
    if (!empty($validated['objection'])) {
        $ticket->kategoriKeberatan()->attach($validated['objection']);
    }

    return redirect()->back()->with('success', 'Data berhasil disimpan!');
}

}
