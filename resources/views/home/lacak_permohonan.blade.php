<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor Permohonan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-slate-700 relative overflow-hidden">
    <!-- Background dots pattern -->
    <div class="absolute inset-0 opacity-10"
        style="
      background-image: radial-gradient(circle, white 1px, transparent 1px);
      background-size: 30px 30px;
    ">
    </div>

    <div class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-sm">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-orange-400 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-orange-400 text-xl">ISI Yogyakarta</span>
                </div>
            </div>

            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-danger mb-4"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('permohonan.data') }}" method="GET" id="permohonanForm" class="space-y-6">
                <div>
                    <label class="block text-gray-700 text-sm mb-3">
                        Masukan Nomor Permohonan/Pengajuan
                    </label>
                    <input type="text" name="applicationNumber" id="applicationNumber"
                        class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan nomor ticket anda" required />
                </div>
                <button type="submit"
                    class="w-full block text-center bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                    Submit
                </button>
            </form>
        </div>
    </div>

    {{-- <script>
        document.getElementById("permohonanForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const value = document.getElementById("applicationNumber").value;
            console.log("Nomor Permohonan:", value);
            alert("Nomor Permohonan: " + value);
        });
    </script> --}}
</body>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
