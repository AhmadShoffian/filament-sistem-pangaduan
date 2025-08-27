<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Ticket;
use App\Models\Comment;
use App\Models\Pemohon;
use App\Models\Informasi;
use Illuminate\Support\Str;
use App\Mail\AdminReplyMail;
use App\Models\KatKeberatan;
use Illuminate\Http\Request;
use App\Mail\TicketCreatedMail;
use App\Models\LayananInformasi;
use App\Mail\UserSendMessageMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $jenisLayanan = LayananInformasi::all();
        $katPemohon = Pemohon::all();
        $katBidang = Bidang::all();
        $katInformasi = Informasi::all();
        $katKeberatan = KatKeberatan::all();
        return view('home', compact('jenisLayanan', 'katPemohon', 'katBidang', 'katInformasi', 'katKeberatan'));
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
            'sfiles'            => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
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

        $nomorTicket = str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);

        // buat ticket baru
        $ticket = Ticket::create([
            'nomor_ticket'                  => $nomorTicket,
            'master_layanan_informasi_id'    => $validated['subject'],
            'master_kat_pemohon_id'          => $validated['applicant'],
            'nomor_identitas'                => $validated['identity'],
            'lampiran_identitas'             => $lampiran_identitas ?? null,
            'lampiran_dukung'                => $lampiran_dukung ?? null,
            'lampiran_bukti_pejabat'         => $lampiran_bukti_pejabat ?? null,
            'nama_lengkap'                   => $validated['name'],
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

        Mail::to($ticket->email)->send(new TicketCreatedMail($ticket));

        return redirect()->back()->with('success', 'Data berhasil disimpan! Silakan cek notifikasi di email Anda.');
    }

    public function permohonan()
    {
        return view('home.lacak_permohonan');
    }

    public function data(Request $request)
    {
        $applicationNumber = $request->applicationNumber;
        $data = Ticket::query();

        if ($applicationNumber) {
            $data->where('nomor_ticket', 'like', "%{$applicationNumber}%");
        }

        $result = $data->first();

        if (!$result) {
            return redirect()->back()->with('error', 'Nomor ticket tidak ditemukan. Silakan cek kembali.');
        }
        return view('home.data_permohonan', ['data' => $result]);
    }


    // public function storeComment(Request $request, $id)
    // {
    //     $ticket = Ticket::findOrFail($id);

    //     $request->validate([
    //         'message' => 'required|string',
    //         'attachment' => 'nullable|file|max:2048'
    //     ]);

    //     $path = $request->hasFile('attachment')
    //         ? $request->file('attachment')->store('comments', 'public')
    //         : null;


    //     Comment::create([
    //         'ticket_id' => $ticket->id,
    //         'sender' => 'user',
    //         'sender_name' => $ticket->nama_lengkap,
    //         'message' => $request->message,
    //         'attachment' => $path
    //     ]);

    //     return back()->with('success', 'Komentar berhasil dikirim.');
    // }

    public function storeComment(Request $request, $id)
{
    $ticket = Ticket::findOrFail($id);

    $request->validate([
        'message' => 'required|string',
        'attachment' => 'nullable|file|max:2048'
    ]);

    $path = $request->hasFile('attachment')
        ? $request->file('attachment')->store('comments', 'public')
        : null;

    // Simpan komentar user
    $comment = Comment::create([
        'ticket_id' => $ticket->id,
        'sender' => 'user',
        'sender_name' => $ticket->nama_lengkap,
        'message' => $request->message,
        'attachment' => $path
    ]);

    // Kirim email ke admin terkait
    // Pastikan Ticket punya relasi ke admin (atau email admin statis)
    if ($ticket->admin && !empty($ticket->admin->email)) {
        Mail::to($ticket->admin->email)->send(
            new UserSendMessageMail($ticket, $request->message)
        );
    } else {
        // fallback jika mau kirim ke email admin tetap
        Mail::to('admin@example.com')->send(
            new UserSendMessageMail($ticket, $request->message)
        );
    }

    return back()->with('success', 'Komentar berhasil dikirim.');
}

}
