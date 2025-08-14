<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin />
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="" />
    <meta name="description" content="Portal Digital Desa - Layanan terpadu untuk warga desa" />
    <meta name="theme-color" content="#047857" />

    <!-- SEO Tags -->
    <title>Layanan Pengaduan</title>
    <meta name="keywords" content="desa digital, login, masuk, akses desa" />
    <meta name="author" content="Desa Digital" />


    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Base Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{ asset('../front/assets/css/LineIcons.2.0.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/lineicons.css" />

    <!-- Additional Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/477ed9a08c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .subscribe-section {
            position: relative;
        }

        .subscribe-section .subscribe-form {
            position: relative;
        }

        .subscribe-section .subscribe-form input {
            border: 2px solid transparent;
            border-radius: 50px;
            width: 100%;
            border: 2px solid #ccc;
            box-shadow: 0px 3px 9px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            padding: 18px 30px;
            background: #fff;
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }

        .subscribe-section .subscribe-form input:focus {
            -webkit-box-shadow: 0 0 30px rgba(255, 255, 255, 0.15);
            -moz-box-shadow: 0 0 30px rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.15);
        }

        .subscribe-section .subscribe-form button {
            border-radius: 50px;
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            border: none;
            background: linear-gradient(to left, #3763eb 0%, #6f58e8 50.39%, #3763eb 100%);
            background-size: 200%;
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
            position: absolute;
            height: 54px;
            width: 54px;
            top: 5px;
            right: 5px;
        }

        .subscribe-section .subscribe-form button:hover {
            background-position: right center;
        }
    </style>
</head>

<body>
    <a class='fixed top-4 right-4 z-50 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-md hover:shadow-lg transition-all duration-200 border border-emerald-100 group'
        href='/'>
        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
            </path>
        </svg>
        <span
            class="absolute right-full mr-2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Beranda</span>
    </a>
    <div class="flex h-screen overflow-hidden font-sans flex flex-col md:flex-row text-gray-900 antialiased">
        <!-- LEFT SIDE (tidak scroll) -->
        <div
            class="hidden md:flex md:w-1/2 bg-gradient-to-br from-emerald-700 to-emerald-900 text-white flex-col relative overflow-hidden">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            <div class="w-full h-full flex flex-col justify-between relative z-10 p-8 lg:p-12 h-screen overflow-hidden">
                <!-- Top Area -->
                <div class="flex items-center">
                    <img src="{{ asset('frontend/image/LOGO-ISI.svg') }}" alt="ISI Yogyakarta"
                        class="w-16 h-16 object-contain rounded-full bg-white p-1" />
                    <div class="ml-4">
                        <h1 class="text-xl font-bold">ISI Yogyakarta</h1>
                        <p class="text-sm text-emerald-50">Sistem Layanan Pengaduan</p>
                    </div>
                </div>

                <!-- Middle Area with Image -->
                <div class="flex-grow flex flex-col justify-center py-4">
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang di Layanan Informasi Publik</h2>
                    <p class="text-emerald-50 mb-4">Anda busa menggunakan formulir disamping untuk membuat permohonan
                        informasi, pengajuan keberatan, pengaduan pungli & gratifikasi, dan penyalagunaan wewenang dan
                        jabatan. <br><br>
                        Jika anda sudah membuat permohonan/pengaduan, silahkan klik tombol dibawah ini untuk melacak
                        permohonan/pengaduan.
                    </p>
                    <div class="flex space-x-2">
                        <!-- Button: Lacak Permohonan (Aktif) -->
                        <button type="button" class="btn-lacak">
                            Lacak Permohonan
                        </button>



                        <!-- Button: Beranda (Nonaktif) -->
                        <button type="button"
                            class="flex items-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white rounded-full shadow border hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L2 8h2v8a1 1 0 001 1h4V12h2v5h4a1 1 0 001-1V8h2L10 2z" />
                            </svg>
                            Beranda
                        </button>
                    </div>

                    <div class="subscribe-section mt-5">
                        <form action="#" method="GET" class="subscribe-form wow fadeInRight" data-wow-delay=".4s">
                            <input type="text" name="ticket_number" id="ticket_number" value=""
                                placeholder="Lacak Permohonan" required>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <!-- Bottom Area -->
                <div class="text-sm text-emerald-50">&copy; 2025 ISI Yogyakarta</div>
            </div>
        </div>

        <!-- <div class="h-full w-2/3 bg-white flex items-center justify-center p-6 sm:p-6 md:p-8 overflow-y-auto"> -->
        <div class="h-full md:w-1/2 bg-white flex items-center justify-center p-4 sm:p-6 md:p-8 overflow-y-auto">
            <div class="h-full max-w-md min-h-screen md:min-h-0 flex flex-col justify-between py-6">
                <!-- Mobile Header (visible only on mobile) -->
                <div class="md:hidden">
                    <!-- Top Logo and Text -->
                    <div class="flex items-start justify-start sm:items-center sm:justify-center mb-6">
                        <img src="{{ asset('frontend/image/LOGO-ISI.svg') }}" alt="ISI Yogyakarta"
                            class="w-16 h-16 object-contain rounded-full bg-white p-1 shadow-sm" />
                        <div class="ml-4">
                            <h1 class="text-xl font-bold text-gray-900">ISI Yogyakarta</h1>
                            <p class="text-sm text-emerald-600">Sistem Pelayanan Pengaduan</p>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div>
                    <!-- Modern Welcome Header -->
                    <div class="mb-8 relative">
                        <div class="absolute -top-10 -left-10 w-20 h-20 bg-emerald-100 rounded-full opacity-50"></div>
                        <div class="absolute -bottom-4 right-0 w-12 h-12 bg-emerald-100 rounded-full opacity-30"></div>

                        <div class="relative">
                            <!-- Modern Badge with Home Icon -->
                            <div class="flex items-center gap-2 mb-3">
                                <div
                                    class="flex items-center bg-gradient-to-r from-emerald-600 to-emerald-400 text-white text-xs font-medium py-1 px-3 rounded-full shadow-sm">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    <span>Sistem Pelayanan Pengaduan</span>
                                </div>

                                <!-- Responsive additions for larger screens -->
                                <div class="hidden sm:block bg-gray-200 h-px flex-grow mx-2"></div>
                                <div class="hidden sm:flex gap-1 text-xs text-gray-500">
                                    <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Layanan Pengaduan</span>
                                </div>
                            </div>

                            <h2
                                class="text-3xl font-bold bg-gradient-to-r from-emerald-700 to-emerald-500 bg-clip-text text-transparent">
                                Selamat Datang!</h2>
                            <p class="text-gray-600 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Masuk untuk mengakses layanan pengaduan
                            </p>
                        </div>
                    </div><br>

                    <!-- Session Status (empty div for spacing matching Laravel app) -->
                    <div class="mb-4"></div>

                    <form action="{{ route('home/store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                                <b>Jenis Layanan Informasi</b> <span class="text-red-500">*</span>
                            </label>
                            <select name="subject" id="subject" required
                                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                <option value="">Pilih jenis layanan</option>
                                @foreach ($jenisLayanan as $layanan)
                                    <option value="{{ $layanan->id }}"
                                        data-slug="{{ Str::slug($layanan->name, '-') }}">
                                        {{ $layanan->name }}
                                    </option>
                                @endforeach
                            </select>

                            <small class="text-gray-500">
                                Silahkan pilih jenis layanan informasi: Permohonan Informasi, Pengajuan Keberatan,
                                Pengaduan Pungli / Gratifikasi, Pengaduan Penyalagunaan Wewenang / Pelanggaran Pejabat
                            </small>
                            <div class="text-red-500 text-sm mt-1 hidden" id="subject-error">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Lengkap (Tanpa Gelar) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                <div class="text-red-500 text-sm mt-1 hidden" id="name-error">

                                </div>
                            </div>

                            <div>
                                <label for="applicant" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kategori Pemohon <span class="text-red-500">*</span>
                                </label>
                                <select name="applicant" id="applicant" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="">Pilih kategori</option>
                                    @foreach ($katPemohon as $pemohon)
                                        <option value="{{ $pemohon->id }}"
                                            data-slug="{{ Str::slug($pemohon->name, '-') }}">
                                            {{ $pemohon->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="text-red-500 text-sm mt-1 hidden" id="applicant-error">

                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">
                                Nomor Identitas (KTP/SIM/Paspor) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="identity"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none"
                                required pattern="\d*">
                            <p class="text-red-500 text-sm mt-1 hidden" id="identity-error">Nomor identitas wajib
                                diisi.
                            </p>
                        </div>

                        <div class="mb-4">
                            <label for="ifiles" class="block text-gray-700 font-medium mb-2">
                                Lampiran KTP/SIM/PASPOR <span class="text-red-500">*</span>
                            </label>
                            <input id="ifiles" name="ifiles" type="file" required accept=".jpg,.jpeg,.png"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <p class="text-red-500 text-sm mt-1 hidden" id="ifiles-error">Lampiran wajib diunggah.</p>
                            <small class="text-gray-500 block mt-1">File berekstensi jpeg, png, jpg dengan ukuran
                                maksimal 200kb</small>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input id="email" type="email" name="email" required
                                    pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="email-error">Email tidak valid.</p>
                            </div>

                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">
                                    Handphone <span class="text-red-500">*</span>
                                </label>
                                <input id="phone" type="tel" name="handphone" required
                                    placeholder="082121346578"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="phone-error">Nomor handphone wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="address" class="block text-gray-700 font-medium mb-2">
                                Alamat <span class="text-red-500">*</span>
                            </label>
                            <input id="address" type="text" name="address" required value=""
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <p class="text-red-500 text-sm mt-1 hidden" id="address-error">Alamat wajib diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label for="rincian_informasi" class="block text-gray-700 font-medium mb-2">
                                Rincian Informasi <span class="text-red-500">*</span>
                            </label>
                            <textarea name="rincian_informasi" id="rincian_informasi" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="rincian_informasi-error">Tujuan wajib
                                diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label for="category" class="block text-gray-700 font-medium mb-2">
                                Kategori Bidang <span class="text-red-500">*</span>
                            </label>
                            <select id="category" name="category" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Pilih kategori</option>
                                @foreach ($katBidang as $bidang)
                                    <option value="{{ $bidang->id }}"
                                        data-slug="{{ Str::slug($bidang->name, '-') }}">
                                        {{ $bidang->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-red-500 text-sm mt-1 hidden" id="category-error">Kategori wajib dipilih.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama_pejabat" class="block text-gray-700 font-medium mb-2">
                                    Nama Pejabat <span class="text-red-500">*</span>
                                </label>
                                <input id="nama_pejabat" type="text" name="nama_pejabat" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="nama_pejabat-error">Nama pejabat wajib
                                    diisi.</p>
                            </div>

                            <div>
                                <label for="jabatan" class="block text-gray-700 font-medium mb-2">
                                    Jabatan <span class="text-red-500">*</span>
                                </label>
                                <input id="jabatan" type="text" name="jabatan" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="jabatan-error">Jabatan wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama_mitra" class="block text-gray-700 font-medium mb-2">
                                    Nama Mitra <span class="text-red-500">*</span>
                                </label>
                                <input id="nama_mitra" type="text" name="nama_mitra" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="nama_mitra-error">Nama mitra wajib
                                    diisi.</p>
                            </div>

                            <div>
                                <label for="jabatan_mitra" class="block text-gray-700 font-medium mb-2">
                                    Jabatan <span class="text-red-500">*</span>
                                </label>
                                <input id="jabatan_mitra" type="text" name="jabatan_mitra" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="jabatan_mitra-error">Jabatan wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="penyalahgunaan" class="block text-gray-700 font-medium mb-2">
                                Penyalahgunaan yang dilakukan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="penyalahgunaan" id="penyalahgunaan" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="penyalahgunaan-error">Tujuan wajib
                                diisi.</p>
                        </div>

                        <div class="mb-4">
                            <label for="dfiles" class="block text-gray-700 font-medium mb-2">
                                Lampiran Data Dukung (opsional)
                            </label>
                            <input id="dfiles" name="dfiles" type="file" required
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            {{-- <p class="text-red-500 text-sm mt-1 hidden" id="ifiles-error">Lampiran wajib diunggah.</p> --}}
                            <small class="text-gray-500 block mt-1">File berekstensi <strong>.doc, .docx, .pdf, .jpeg,
                                    .png, .jpg</strong> dengan ukuran
                                maksimal <strong>1Mb</strong></small>
                        </div>

                        <div class="mb-4">
                            <label for="sfiles" class="block text-gray-700 font-medium mb-2">
                                Berkas Bukti
                            </label>
                            <input id="sfiles" name="sfiles" type="file" required
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            {{-- <p class="text-red-500 text-sm mt-1 hidden" id="ifiles-error">Lampiran wajib diunggah.</p> --}}
                            <small class="text-gray-500 block mt-1">File berekstensi <strong>.doc, .docx, .pdf, .jpeg,
                                    .png, .jpg</strong> dengan ukuran
                                maksimal <strong>1Mb</strong></small>
                        </div>

                        <div class="mb-6">
                            <label for="keberatan" class="block text-gray-700 font-medium mb-2">
                                Tujuan Mengajukan Keberatan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="keberatan" id="keberatan" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="keberatan-error">Tujuan wajib diisi.</p>
                        </div>
                        <div class="mb-6">
                            <label for="purpose" class="block text-gray-700 font-medium mb-2">
                                Tujuan Permohonan Informasi <span class="text-red-500">*</span>
                            </label>
                            <textarea name="purpose" id="purpose" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="purpose-error">Tujuan wajib diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">
                                Alasan mengajukan keberatan <span class="text-red-500">*</span>
                            </label>

                            <div class="space-y-2">
                                @foreach ($katKeberatan as $keberatan)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="objection[]" value="{{ $keberatan->id }}"
                                            class="form-checkbox text-emerald-600">
                                        <span>{{ $keberatan->name }}</span>
                                    </label>
                                @endforeach
                            </div>

                            <p class="text-red-500 text-sm mt-2 hidden" id="objection-error">Silakan pilih minimal
                                satu
                                alasan keberatan.</p>
                        </div>

                        <div class="mb-6 info">
                            <label class="block text-gray-700 font-semibold mb-2 require">
                                Cara memperoleh informasi
                            </label>

                            <select name="getinfo"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih salah satu</option>
                                @foreach ($katInformasi as $informasi)
                                    <option value="{{ $informasi->id }}"
                                        data-slug="{{ Str::slug($informasi->name, '-') }}">
                                        {{ $informasi->name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="text-red-500 text-sm mt-1 hidden">

                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-start space-x-2">
                                <input id="field_terms" name="terms" type="checkbox" required
                                    onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');"
                                    class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-300">
                                <label for="field_terms" class="text-sm text-gray-700">
                                    Dengan ini saya menyatakan bahwa data yang diisi dalam formulir ini adalah benar dan
                                    dapat dipertanggungjawabkan.
                                </label>
                            </div>
                        </div>

                        <div class="submit-container">
                            <input type="hidden" name="status" value="In Progress" />
                            <button type="submit" class="btn-submit">Submit</button><br><br><br><br><br><br>
                        </div>
                    </form>
                </div>

                <!-- Mobile Footer -->
                <div class="text-center text-sm text-gray-600 mt-auto pt-8 md:hidden">&copy; 2025 UPA TIK ISI
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const subjectSelect = document.getElementById("subject");

        // Mapping ID layanan dari database → action di JS
        const layananMapping = @json($jenisLayanan->pluck('name', 'id'));

        const tujuanInfoField = document.getElementById("purpose").closest(".mb-6");
        const getInfoField = document.querySelector(".info");

        const tujuanKeberatanField = document.getElementById("keberatan").closest(".mb-6");
        // const alasanKeberatanField = document.getElementById("objection-error").closest(".mb-6");
        const alasanKeberatanField = document.querySelector("#objection-error").parentElement;


        const namapejabatFields = document.getElementById("nama_pejabat").closest(".mb-6");
        const pejabatFields = document.getElementById("jabatan").closest(".mb-6");
        const namamitraFields = document.getElementById("nama_mitra").closest(".mb-6");
        const mitraFields = document.getElementById("jabatan_mitra").closest(".mb-6");
        const penyalahgunaanField = document.getElementById("penyalahgunaan").closest(".mb-6");

        const lampiranDataDukung = document.getElementById("dfiles").closest(".mb-4");
        const lampiranBuktiBerkas = document.getElementById("sfiles").closest(".mb-4");

        const rincianInformasiField = document.getElementById("rincian_informasi").closest(".mb-6");

        function hideAll() {
            tujuanInfoField.style.display = "none";
            getInfoField.style.display = "none";
            tujuanKeberatanField.style.display = "none";
            alasanKeberatanField.style.display = "none";
            namapejabatFields.style.display = "none";
            pejabatFields.style.display = "none";
            namamitraFields.style.display = "none";
            mitraFields.style.display = "none";
            penyalahgunaanField.style.display = "none";
            lampiranDataDukung.style.display = "";
            lampiranBuktiBerkas.style.display = "none";
            rincianInformasiField.style.display = "";
        }

        hideAll();

        subjectSelect.addEventListener("change", function() {
            hideAll();
            const selectedId = this.value;
            const layananName = layananMapping[selectedId];

            if (layananName?.toLowerCase() === "permohonan informasi") {
                tujuanInfoField.style.display = "";
                getInfoField.style.display = "";
            } else if (layananName?.includes("Pengajuan Keberatan")) {
                tujuanKeberatanField.style.display = "";
                alasanKeberatanField.style.display = "";
            } else if (layananName?.includes("Pelanggaran Pejabat")) {
                namapejabatFields.style.display = "";
                pejabatFields.style.display = "";
                penyalahgunaanField.style.display = "";
                lampiranBuktiBerkas.style.display = "";
                lampiranDataDukung.style.display = "none";
                rincianInformasiField.style.display = "none";
            } else if (layananName?.includes("Pelanggaran Mitra")) {
                namamitraFields.style.display = "";
                mitraFields.style.display = "";
                penyalahgunaanField.style.display = "";
                lampiranBuktiBerkas.style.display = "";
                lampiranDataDukung.style.display = "none";
                rincianInformasiField.style.display = "none";
            }
        });
    });
</script>






</html>
