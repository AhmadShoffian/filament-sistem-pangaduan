<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Balasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-700 relative">

    <!-- Background dots pattern -->
    <div class="absolute inset-0 opacity-20"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-10 w-full max-w-3xl">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.894.553l2.991 5.982a.869.869 0 010 .778l-1.874 3.747a1 1 0 11-1.788-.894L13.618 10l-1.894-3.789A1 1 0 0112 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-orange-400 text-2xl font-semibold">ISI Yogyakarta</span>
                </div>
            </div>

            <!-- Header dengan nomor permohonan -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-gray-700 font-medium text-lg">
                        Nomor Permohonan - {{ $data->nomor_ticket }}
                    </span>
                    <span
                        class="px-3 py-1 rounded text-xs font-medium
                @if ($data->status == 'closed') bg-red-500 text-white 
                @else bg-yellow-400 text-yellow-800 @endif">
                        {{ $data->status }}
                    </span>
                </div>
            </div>


            <form action="{{ route('ticket.comment', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col h-[600px] space-y-4">
                @csrf

                <!-- Riwayat komentar -->
                <div class="flex-1 overflow-y-auto space-y-4 pr-2 border rounded-lg p-4 bg-gray-50" x-data
                    x-init="$el.scrollTop = $el.scrollHeight">

                    <!-- Komentar awal -->
                    <div class="border border-gray-200 rounded-xl p-4 bg-white">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-gray-800 font-semibold">{{ $data->nama_lengkap }}</span>
                            <span class="text-gray-400 text-sm">{{ $data->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-600">{{ $data->rincian_informasi }}</p>
                    </div>

                    <!-- Loop komentar -->
                    @foreach ($data->comments as $comment)
                        <div class="border rounded-lg shadow-sm overflow-hidden">
                            <div class="flex items-center justify-between bg-gray-100 px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-gray-700">{{ $comment->sender_name }}</span>
                                    <span
                                        class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                @if ($comment->attachment)
                                    @php
                                        $ext = strtolower(pathinfo($comment->attachment, PATHINFO_EXTENSION));
                                    @endphp

                                    <a href="{{ Storage::url($comment->attachment) }}" download
                                        class="flex items-center gap-1 text-blue-500 hover:text-blue-700 text-sm"
                                        title="Unduh Lampiran">

                                        {{-- PDF --}}
                                        @if ($ext === 'pdf')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M6 2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                                <text x="9" y="17" font-size="8" fill="red">PDF</text>
                                            </svg>
                                            <span>Unduh PDF</span>

                                            {{-- Word --}}
                                        @elseif (in_array($ext, ['doc', 'docx']))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M6 2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                                <text x="8" y="17" font-size="8" fill="blue">W</text>
                                            </svg>
                                            <span>Unduh Dokumen</span>

                                            {{-- Gambar --}}
                                        @elseif (in_array($ext, ['jpg', 'jpeg', 'png']))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" />
                                                <path d="M21 15l-5-5L5 21" />
                                            </svg>
                                            <span>Unduh Gambar</span>

                                            {{-- Default --}}
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0
                         0 1-2-2v-4" />
                                                <polyline points="7 10 12 15 17 10" />
                                                <line x1="12" y1="15" x2="12" y2="3" />
                                            </svg>
                                            <span>Unduh Lampiran</span>
                                        @endif
                                    </a>
                                @endif

                            </div>
                            <div class="px-3 py-2 bg-white">
                                <p class="text-gray-600">{{ $comment->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Form input komentar (selalu di bawah, tidak ikut scroll) -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2 font-medium">Tulis Komentar</label>
                        <textarea name="message"
                            class="w-full h-24 p-3 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ketik pesan di sini..." required></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2 font-medium">Lampiran (Opsional)</label>
                        <input type="file" name="attachment"
                            class="w-full border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-3 rounded-xl hover:bg-blue-600 transition-colors duration-200">
                        Kirim
                    </button>
                </div>
            </form>

        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
