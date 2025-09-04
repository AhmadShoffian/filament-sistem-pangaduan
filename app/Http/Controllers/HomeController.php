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

use App\Models\LayananInformasi;
use App\Mail\UserSendMessageMail;
use App\Jobs\SendUserMessageEmail;
use App\Jobs\SendTicketCreatedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
            'name'              => 'nullable|string|max:255',
            'applicant'         => 'nullable|exists:master_kat_pemohon,id',
            'identity'          => 'nullable|string|max:50',
            'ifiles'            => 'nullable|mimes:jpg,jpeg,png|max:200',
            'email'             => 'required|email',
            'phone'             => 'nullable|string|max:15',
            'address'           => 'nullable|string',
            'rincian_informasi' => 'nullable|string',
            'category'          => 'nullable|exists:master_kat_bidang,id',
            'nama_pejabat'      => 'nullable|string|max:255',
            'jabatan'           => 'nullable|string|max:255',
            'nama_mitra'        => 'nullable|string|max:255',
            'jabatan_mitra'     => 'nullable|string|max:255',
            'penyalahgunaan'    => 'nullable|string',
            'dfiles'            => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:1024',
            'sfiles'            => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'lapbhfile'         => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'keberatan'         => 'nullable|string',
            'purpose'           => 'nullable|string',
            'objection'         => 'nullable|array',
            'objection.*'       => 'exists:master_kat_keberatan,id',
            'getinfo'           => 'nullable|string',
            'terms'             => 'required',
        ]);

        // simpan file upload
        // if ($request->hasFile('ifiles')) {
        //     $lampiran_identitas = $request->file('ifiles')->store('lampiran_identitas', 'public');
        // }

        // if ($request->hasFile('dfiles')) {
        //     $lampiran_dukung = $request->file('dfiles')->store('lampiran_data_dukung', 'public');
        // }

        // if ($request->hasFile('sfiles')) {
        //     $lampiran_bukti_pejabat = $request->file('sfiles')->store('lampiran_bukti', 'public');
        // }

        // if ($request->hasFile('ifiles')) {
        //     $lampiran_identitas = $request->file('ifiles')->store('lampiran_identitas', 'public');
        //     $lampiran_identitas = Storage::url($lampiran_identitas);
        // }

        if ($request->hasFile('ifiles')) {
            $lampiran_identitas = $request->file('ifiles')->store('lampiran_identitas', 'public');
        }

        if ($request->hasFile('dfiles')) {
            $lampiran_dukung = $request->file('dfiles')->store('lampiran_data_dukung', 'public');
        }

        if ($request->hasFile('sfiles')) {
            $lampiran_bukti_pejabat = $request->file('sfiles')->store('lampiran_bukti', 'public');
        }

        if ($request->hasFile('lapbhfile')) {
            $lampiran_apbh = $request->file('lapbhfile')->store('lampiran_apbh', 'public');
        }


        $nomorTicket = str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);

        // buat ticket baru
        $ticket = Ticket::create([
            'nomor_ticket'                  => $nomorTicket,
            'master_layanan_informasi_id'    => $validated['subject'] ?? null,
            'master_kat_pemohon_id'          => $validated['applicant'] ?? null,
            'nomor_identitas'                => $validated['identity'] ?? null,
            'lampiran_identitas'             => $lampiran_identitas ?? null,
            'lampiran_dukung'                => $lampiran_dukung ?? null,
            'lampiran_bukti_pejabat'         => $lampiran_bukti_pejabat ?? null,
            'lampiran_apbh'                  => $lampiran_apbh ?? null,
            'nama_lengkap'                   => $validated['name'] ?? 'Anonim',
            'email'                          => $validated['email'],
            'no_telepon'                     => $validated['phone'] ?? null,
            'alamat'                         => $validated['address'] ?? null,
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

        SendTicketCreatedEmail::dispatch($ticket, $ticket->email);

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

        if ($ticket->admin && !empty($ticket->admin->email)) {
            SendUserMessageEmail::dispatch(
                $ticket,
                $request->message,
                $ticket->admin->email
            );
        }

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
