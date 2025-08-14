<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Informasi;
use App\Models\KatKeberatan;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use App\Models\LayananInformasi;
use App\Models\Ticket;

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
        // validate input
         $validated = $request->validate([
            'subject'           => 'required|exists:jenis_layanan,id',
            'name'              => 'required|string|max:255',
            'applicant'         => 'required|exists:kategori_pemohon,id',
            'identity'          => 'required|string|max:50',
            'ifiles'            => 'required|mimes:jpg,jpeg,png|max:200',
            'email'             => 'required|email',
            'handphone'         => 'required|string|max:15',
            'address'           => 'required|string',
            'rincian_informasi' => 'nullable|string',
            'category'          => 'nullable|exists:kategori_bidang,id',
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
            'getinfo'           => 'nullable|string',
            'terms'             => 'required',
        ]);

        if ($request->hasFile('ifiles')) {
            $validated['ifiles'] = $request->file('ifiles')->store('lampiran_identitas', 'public');
        }
        if ($request->hasFile('dfiles')) {
            $validated['dfiles'] = $request->file('dfiles')->store('lampiran_data_dukung', 'public');
        }
        if ($request->hasFile('sfiles')) {
            $validated['sfiles'] = $request->file('sfiles')->store('lampiran_bukti', 'public');
        }

        Ticket::create($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
