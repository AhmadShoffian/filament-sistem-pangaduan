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
    <meta name="description" content="Portal Layanan Pengaduan - ISI Yogyakarta" />
    <meta name="theme-color" content="#047857" />

    <!-- SEO Tags -->
    <title>Layanan Pengaduan</title>
    <meta name="keywords" content="layanan pengaduan, login, masuk, akses pengaduan" />
    <meta name="author" content="ISI Yogyakarta" />
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

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }


        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            color: #fff;
            transition: 0.3s;
            text-align: center;
            padding: 15px;
        }

        .card i {
            font-size: 36px;
            color: #f1c40f;
            margin-bottom: 10px;
        }

        .card h3 {
            font-size: 16px;
            font-weight: bold;
        }

        .card:hover {
            border-color: #f1c40f;
            transform: translateY(-5px);
        }

        /* Tambahan untuk mobile */
        @media (max-width: 768px) {
            .card {
                height: 150px;
            }

            .card i {
                font-size: 28px;
            }

            .card h3 {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .card {
                height: auto;
                padding: 20px 10px;
            }

            .card i {
                font-size: 24px;
            }
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
            class="hidden md:flex md:w-1/2 relative text-white flex-col overflow-hidden bg-gradient-to-br from-emerald-700 to-emerald-900">

            <!-- Background pattern -->
            <div class="absolute inset-0 bg-pattern opacity-10 z-0"></div>

            <!-- Background floating circles -->
            <ul class="circles z-0">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>

            <!-- Content -->
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

                <!-- Middle Area -->
                <div class="flex-grow flex flex-col justify-center py-4">
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang di Layanan Informasi Publik</h2>
                    <p class="text-emerald-50 mb-4">Anda bisa menggunakan formulir disamping untuk membuat permohonan
                        informasi,
                        pengajuan keberatan, pengaduan pungli & gratifikasi, dan penyalahgunaan wewenang dan jabatan.
                        <br><br>
                        Jika anda sudah membuat permohonan/pengaduan, silahkan klik tombol dibawah ini untuk melacak.
                    </p>
                    <div class="flex space-x-2">
                        <!-- Button: Lacak -->
                        <button type="button" class="btn-lacak"
                            onclick="window.location.href='{{ route('permohonan.lacak') }}'">
                            Lacak Permohonan
                        </button>

                        <!-- Button: Beranda -->
                        <a href="https://pandu.isi.ac.id/"
                            class="flex items-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white 
                    rounded-full shadow border hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L2 8h2v8a1 1 0 001 1h4V12h2v5h4a1 1 0 001-1V8h2L10 2z" />
                            </svg>
                            Beranda
                        </a>
                    </div>
                    {{-- <div class="subscribe-section mt-5">
                        <form action="#" method="GET" class="subscribe-form wow fadeInRight" data-wow-delay=".4s"
                            style="color:#000000">
                            <input type="text" name="ticket_number" id="ticket_number" value=""
                                placeholder="Lacak Permohonan" required>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div> --}}


                    <div class="card-container mt-8">
                        <a href="https://siak.isi.ac.id/">
                            <div class="card">
                                <!-- Siakad (Akademik) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-yellow-400 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l6.16-3.422A12.083 12.083 0 0118 20H6a12.083 12.083 0 01-.16-9.422L12 14z" />
                                </svg>
                                <h3>Siakad</h3>
                            </div>
                        </a>

                        <a href="https://pmb.isi.ac.id">
                            <div class="card">
                                <!-- PMB ISI -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2a3 3 0 00-5.356-1.857M17 20H7m0 0v-2a3 3 0 015.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>
                                <h3>PMB ISI</h3>
                            </div>
                        </a>

                        <a href="https://elearning.isi.ac.id">
                            <div class="card">
                                <!-- Elearning -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-400 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 .5L7 17m10 0l-.75 3 .75.5 1-3m-5.25-6.25h.008v.008h-.008V10.75zM9.75 13h4.5a2.25 2.25 0 012.25 2.25V18h-9v-2.75a2.25 2.25 0 012.25-2.25z" />
                                </svg>
                                <h3>Elearning</h3>
                            </div>
                        </a>

                        <a href="https://journal.isi.ac.id/">
                            <div class="card">
                                <!-- Jurnal -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-purple-400 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 20h9M12 4h9M12 12h9M4 6h16M4 18h16" />
                                </svg>
                                <h3>Jurnal</h3>
                            </div>
                        </a>

                        {{-- <div class="card">
                            <!-- Lapor -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-400 mb-2"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.25 3v8.25H5.25l7.5 9 7.5-9h-6V3h-3z" />
                            </svg>
                            <h3>Lapor</h3>
                        </div> --}}
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
                    @if (session('success'))
                        <div id="alert-success"
                            class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300">
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>

                        <script>
                            setTimeout(() => {
                                const alert = document.getElementById('alert-success');
                                if (alert) {
                                    alert.style.transition = 'opacity 0.5s ease';
                                    alert.style.opacity = '0';
                                    setTimeout(() => alert.remove(), 500);
                                }
                            }, 3000);
                        </script>
                    @endif

                    <form action="{{ route('home.store') }}" method="POST" class="space-y-5"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                                <b>Jenis Layanan Informasi</b> <span class="text-red-500">*</span>
                            </label>
                            <select name="subject" id="subject" required
                                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                <option value="">Pilih jenis layanan</option>
                                @foreach ($jenisLayanan as $layanan)
                                    <option value="{{ $layanan->id }}">{{ $layanan->name }}</option>
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
                                    Nama Lengkap (Tanpa Gelar)
                                </label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                <div class="text-red-500 text-sm mt-1 hidden" id="name-error">

                                </div>
                            </div>

                            <div>
                                <label for="applicant" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kategori Pemohon
                                </label>
                                <select name="applicant" id="applicant"
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
                            <label for="identity" class="block text-gray-700 font-medium mb-2">
                                Nomor Identitas (KTP/SIM/Paspor)
                            </label>
                            <input type="number" name="identity" id="identity"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none"
                                pattern="\d*">
                            <p class="text-red-500 text-sm mt-1 hidden" id="identity-error">Nomor identitas wajib
                                diisi.
                            </p>
                        </div>

                        <div class="mb-4">
                            <label for="ifiles" class="block text-gray-700 font-medium mb-2">
                                Lampiran KTP/SIM/PASPOR
                            </label>
                            <input id="ifiles" name="ifiles" type="file" accept=".jpg,.jpeg,.png"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <p class="text-red-500 text-sm mt-1 hidden" id="ifiles-error">Lampiran wajib diunggah.</p>
                            <small class="text-gray-500 block mt-1">File berekstensi jpeg, png, jpg dengan ukuran
                                maksimal 200kb</small>
                        </div>

                        <div class="mb-4">
                            <label for="lapbhfile" class="block text-gray-700 font-medium mb-2">
                                Lampiran Akta Pendirian Badan Hukum <span class="text-red-500">*</span>
                            </label>
                            <input id="lapbhfile" name="lapbhfile" type="file"
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <p class="text-red-500 text-sm mt-1 hidden" id="lapbhfile-error">Lampiran wajib diunggah.
                            </p>
                            <small class="text-gray-500 block mt-1">File berekstensi jpeg, png, jpg, pdf, docx dengan
                                ukuran
                                maksimal 200kb</small>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">
                                    Email
                                </label>
                                <input id="email" type="email" name="email"
                                    pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="email-error">Email tidak valid.</p>
                            </div>

                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">
                                    Handphone
                                </label>
                                <input id="phone" type="tel" name="phone" placeholder="082121346578"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="phone-error">Nomor handphone wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="address" class="block text-gray-700 font-medium mb-2">
                                Alamat
                            </label>
                            <input id="address" type="text" name="address" value=""
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <p class="text-red-500 text-sm mt-1 hidden" id="address-error">Alamat wajib diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label for="rincian_informasi" class="block text-gray-700 font-medium mb-2">
                                Rincian Informasi
                            </label>
                            <textarea name="rincian_informasi" id="rincian_informasi" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="rincian_informasi-error">Tujuan wajib
                                diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label for="category" class="block text-gray-700 font-medium mb-2">
                                Kategori Bidang
                            </label>
                            <select id="category" name="category"
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
                                    Nama Pejabat
                                </label>
                                <input id="nama_pejabat" type="text" name="nama_pejabat"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="nama_pejabat-error">Nama pejabat wajib
                                    diisi.</p>
                            </div>

                            <div>
                                <label for="jabatan" class="block text-gray-700 font-medium mb-2">
                                    Jabatan
                                </label>
                                <input id="jabatan" type="text" name="jabatan"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="jabatan-error">Jabatan wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama_mitra" class="block text-gray-700 font-medium mb-2">
                                    Nama Mitra
                                </label>
                                <input id="nama_mitra" type="text" name="nama_mitra"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="nama_mitra-error">Nama mitra wajib
                                    diisi.</p>
                            </div>

                            <div>
                                <label for="jabatan_mitra" class="block text-gray-700 font-medium mb-2">
                                    Jabatan
                                </label>
                                <input id="jabatan_mitra" type="text" name="jabatan_mitra"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <p class="text-red-500 text-sm mt-1 hidden" id="jabatan_mitra-error">Jabatan wajib
                                    diisi.</p>
                            </div>
                        </div>

                        <div class="mb-6" id="field-penyalahgunaan">
                            <label for="penyalahgunaan" class="block text-gray-700 font-medium mb-2">
                                Penyalahgunaan yang dilakukan
                            </label>
                            <textarea name="penyalahgunaan" id="penyalahgunaan" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="penyalahgunaan-error">Tujuan wajib
                                diisi.</p>
                        </div>

                        <div class="mb-4">
                            <label for="dfiles" class="block text-gray-700 font-medium mb-2">
                                Lampiran Data Dukung
                            </label>
                            <input id="dfiles" name="dfiles" type="file"
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <small class="text-gray-500 block mt-1">File berekstensi <strong>.doc, .docx, .pdf, .jpeg,
                                    .png, .jpg</strong> dengan ukuran
                                maksimal <strong>1Mb</strong></small>
                        </div>

                        <div class="mb-4" id="field-sfiles">
                            <label for="sfiles" class="block text-gray-700 font-medium mb-2">
                                Berkas Bukti
                            </label>
                            <input id="sfiles" name="sfiles" type="file"
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <small class="text-gray-500 block mt-1">File berekstensi <strong>.doc, .docx, .pdf, .jpeg,
                                    .png, .jpg</strong> dengan ukuran
                                maksimal <strong>1Mb</strong></small>
                        </div>

                        <div class="mb-6">
                            <label for="keberatan" class="block text-gray-700 font-medium mb-2">
                                Tujuan Mengajukan Keberatan
                            </label>
                            <textarea name="keberatan" id="keberatan" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="keberatan-error">Tujuan wajib diisi.</p>
                        </div>
                        <div class="mb-6"> <label for="purpose" class="block text-gray-700 font-medium mb-2">
                                Tujuan Permohonan Informasi <span class="text-red-500">*</span></label>
                            <textarea name="purpose" id="purpose" required rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-y"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="purpose-error">Tujuan wajib diisi.</p>
                        </div>

                        <div class="mb-6">
                            <label id="alasanKeberatanLabel" class="block text-gray-700 font-medium mb-2">
                                Alasan mengajukan keberatan
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
                                Cara memperoleh informasi <span class="text-red-500">*</span>
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
        const applicantSelect = document.getElementById("applicant");
        const pungliRequired = ["email", "rincian_informasi", "dfiles"];
        const wewenangRequired = ["email", "rincian_informasi", "sfiles"];
        const requiredLabels = document.querySelectorAll("label span.text-red-500");
        if (!subjectSelect) return;

        const layananMapping = @json($jenisLayanan->pluck('name', 'id'));

        const safeClosest = (el, selector) => el ? el.closest(selector) : null;

        // ambil wrapper & input untuk setiap field
        const tujuanInfoField = safeClosest(document.getElementById("purpose"), ".mb-6");
        const tujuanInfoInput = document.getElementById("purpose");

        const getInfoWrapper = document.querySelector(".info");
        const getInfoInput = getInfoWrapper?.querySelector("select");

        const tujuanKeberatanField = safeClosest(document.getElementById("keberatan"), ".mb-6");
        const tujuanKeberatanInput = document.getElementById("keberatan");

        const alasanKeberatanField = document.querySelector("#objection-error")?.parentElement || null;
        const alasanKeberatanInputs = document.querySelectorAll("input[name='objection[]']");

        const namapejabatFields = safeClosest(document.getElementById("nama_pejabat"), ".mb-6");
        const pejabatFields = safeClosest(document.getElementById("jabatan"), ".mb-6");
        const namaPejabatInput = document.getElementById("nama_pejabat");
        const jabatanPejabatInput = document.getElementById("jabatan");

        const namamitraFields = safeClosest(document.getElementById("nama_mitra"), ".mb-6");
        const mitraFields = safeClosest(document.getElementById("jabatan_mitra"), ".mb-6");
        const namaMitraInput = document.getElementById("nama_mitra");
        const jabatanMitraInput = document.getElementById("jabatan_mitra");

        const penyalahgunaanField = safeClosest(document.getElementById("penyalahgunaan"), ".mb-6");
        const penyalahgunaanInput = document.getElementById("penyalahgunaan");

        const lampiranDataDukung = safeClosest(document.getElementById("dfiles"), ".mb-4");
        const lampiranBuktiBerkas = safeClosest(document.getElementById("sfiles"), ".mb-4");
        const lampiranAktaPendirianHukum = safeClosest(document.getElementById("lapbhfile"), ".mb-4");
        const categoryField = document.getElementById("category")?.closest(".mb-6");

        const rincianInformasiField = safeClosest(document.getElementById("rincian_informasi"), ".mb-6");

        // helper toggle required
        function showField(wrapper, input) {
            if (wrapper) wrapper.style.display = "block";
            if (input) input.setAttribute("required", "required");
        }

        function hideField(wrapper, input) {
            if (wrapper) wrapper.style.display = "none";
            if (input) input.removeAttribute("required");
        }

        function checkApplicantCategory() {
            if (!applicantSelect) return;
            const selectedOption = applicantSelect.options[applicantSelect.selectedIndex];
            const name = selectedOption?.text.trim().toLowerCase() || "";

            console.log("Kategori dipilih:", name);

            const needsAkta = ["lsm/ngo", "instansi pemerintah", "lembaga pemerintah"];

            if (needsAkta.includes(name)) {
                if (lampiranAktaPendirianHukum) {
                    lampiranAktaPendirianHukum.style.display = "block";
                    lampiranAktaPendirianHukum.querySelector("input")?.setAttribute("required", "required");
                }
            } else {
                if (lampiranAktaPendirianHukum) {
                    lampiranAktaPendirianHukum.style.display = "none";
                    lampiranAktaPendirianHukum.querySelector("input")?.removeAttribute("required");
                }
            }
        }

        // jalankan pertama kali + saat berubah
        checkApplicantCategory();
        applicantSelect?.addEventListener("change", checkApplicantCategory);

        function hideAll() {
            hideField(tujuanInfoField, tujuanInfoInput);
            if (getInfoWrapper) {
                getInfoWrapper.style.display = "none";
                if (getInfoInput) getInfoInput.removeAttribute("required");
            }
            hideField(tujuanKeberatanField, tujuanKeberatanInput);
            if (alasanKeberatanField) alasanKeberatanField.style.display = "none";
            // alasanKeberatanInputs.forEach(cb => cb.removeAttribute("required"));
            alasanKeberatanInputs.forEach(cb => cb.required = false);


            hideField(namapejabatFields, namaPejabatInput);
            hideField(pejabatFields, jabatanPejabatInput);
            hideField(namamitraFields, namaMitraInput);
            hideField(mitraFields, jabatanMitraInput);
            hideField(penyalahgunaanField, penyalahgunaanInput);

            if (lampiranDataDukung) lampiranDataDukung.style.display = "block";
            if (lampiranBuktiBerkas) lampiranBuktiBerkas.style.display = "none";
            if (rincianInformasiField) rincianInformasiField.style.display = "block";
            if (lampiranAktaPendirianHukum) lampiranAktaPendirianHukum.style.display = "none";
        }

        hideAll();

        // helper toggle bintang merah
        function toggleRequiredLabel(input, required = true) {
            if (!input) return;

            // Cari label berdasarkan atribut for
            const label = document.querySelector(`label[for='${input.id}']`);
            if (!label) return;

            let star = label.querySelector("span.text-red-500");
            if (required) {
                input.setAttribute("required", "required");
                if (!star) {
                    const span = document.createElement("span");
                    span.className = "text-red-500";
                    span.innerText = "*";
                    label.appendChild(document.createTextNode(" "));
                    label.appendChild(span);
                }
            } else {
                input.removeAttribute("required");
                if (star) star.remove();
            }
        }


        function clearAllRequired() {
            const fields = [
                "name", "email", "applicant", "identity", "ifiles", "phone", "address",
                "category", "dfiles", "sfiles", "lapbhfile", "nama_pejabat", "jabatan",
                "nama_mitra", "jabatan_mitra", "penyalahgunaan", "rincian_informasi",
                "purpose", "keberatan"
            ];

            fields.forEach(id => {
                const el = document.getElementById(id);
                if (el) toggleRequiredLabel(el, false);
            });
        }


        subjectSelect.addEventListener("change", function() {
            hideAll();
            clearAllRequired();
            const selectedId = this.value;
            const layananName = (layananMapping[selectedId] || "").toLowerCase();

            if (layananName === "permohonan informasi") {
                showField(tujuanInfoField, tujuanInfoInput);
                if (getInfoWrapper) {
                    getInfoWrapper.style.display = "block";
                    if (getInfoInput) getInfoInput.setAttribute("required", "required");
                }

                toggleRequiredLabel(document.getElementById("rincian_informasi"), true);
                toggleRequiredLabel(document.getElementById("name"), true);
                toggleRequiredLabel(document.getElementById("email"), true);
                toggleRequiredLabel(document.getElementById("applicant"), true);
                toggleRequiredLabel(document.getElementById("identity"), true);
                toggleRequiredLabel(document.getElementById("ifiles"), true);
                toggleRequiredLabel(document.getElementById("phone"), true);
                toggleRequiredLabel(document.getElementById("address"), true);
                toggleRequiredLabel(document.getElementById("category"), true);
                toggleRequiredLabel(document.getElementById("dfiles"), true);
                toggleRequiredLabel(document.getElementById("purpose"), true);

                if (rincianInformasiField) {
                    rincianInformasiField.style.display = "block";
                    rincianInformasiField.querySelector("textarea")?.setAttribute("required",
                        "required");
                }

                // Field khusus permohonan informasi
                if (tujuanInfoField) {
                    tujuanInfoField.style.display = "block";
                    tujuanInfoInput?.setAttribute("required", "required");
                }

                if (getInfoWrapper) {
                    getInfoWrapper.style.display = "block";
                    getInfoInput?.setAttribute("required", "required");
                }

                // Nonaktifkan field lain
                hideField(tujuanKeberatanField, tujuanKeberatanInput);
                hideField(namapejabatFields, namaPejabatInput);
                hideField(pejabatFields, jabatanPejabatInput);
                hideField(namamitraFields, namaMitraInput);
                hideField(mitraFields, jabatanMitraInput);
                if (penyalahgunaanField) hideField(penyalahgunaanField, penyalahgunaanInput);
                if (lampiranBuktiBerkas) hideField(lampiranBuktiBerkas, lampiranBuktiBerkas
                    .querySelector("input"));
                if (lampiranAktaPendirianHukum) hideField(lampiranAktaPendirianHukum,
                    lampiranAktaPendirianHukum.querySelector("input"));
                if (alasanKeberatanField) alasanKeberatanField.style.display = "none";
                alasanKeberatanInputs.forEach(cb => cb.required = false);
                checkApplicantCategory();
            } else if (layananName.includes("pengajuan keberatan")) {
                showField(tujuanKeberatanField, tujuanKeberatanInput);
                if (alasanKeberatanField) alasanKeberatanField.style.display = "block";
                if (alasanKeberatanInputs.length > 0) {
                    // minimal 1 required → kasih ke checkbox pertama
                    alasanKeberatanInputs[0].setAttribute("required", "required");
                }

                toggleRequiredLabel(document.getElementById("name"), true);
                toggleRequiredLabel(document.getElementById("email"), true);
                toggleRequiredLabel(document.getElementById("rincian_informasi"), true);
                toggleRequiredLabel(document.getElementById("applicant"), true);
                toggleRequiredLabel(document.getElementById("identity"), true);
               toggleRequiredLabel(document.getElementById("ifiles"), true);
                toggleRequiredLabel(document.getElementById("phone"), true);
                toggleRequiredLabel(document.getElementById("address"), true);
                toggleRequiredLabel(document.getElementById("category"), true);
                toggleRequiredLabel(document.getElementById("dfiles"), true);

                if (layananName.includes("pengajuan keberatan")) {
                    showField(tujuanKeberatanField, tujuanKeberatanInput);
                    toggleRequiredLabel(document.getElementById("keberatan"), true);

                    const alasanLabel = document.getElementById("alasanKeberatanLabel");
                    if (alasanLabel && !alasanLabel.querySelector("span.text-red-500")) {
                        const span = document.createElement("span");
                        span.className = "text-red-500";
                        span.innerText = " *";
                        alasanLabel.appendChild(span);
                    }
                    if (alasanKeberatanInputs.length > 0) {
                        alasanKeberatanInputs[0].setAttribute("required", "required");
                    }

                }



                // } else if (layananName.includes("pelanggaran pejabat")) {
                //     showField(namapejabatFields, namaPejabatInput);
                //     showField(pejabatFields, jabatanPejabatInput);
                //     showField(penyalahgunaanField, penyalahgunaanInput);
                //     if (lampiranBuktiBerkas) lampiranBuktiBerkas.style.display = "block";
                //     if (lampiranDataDukung) lampiranDataDukung.style.display = "none";
                //     if (rincianInformasiField) rincianInformasiField.style.display = "none";
            } else if (layananName.includes("pengaduan pungli & gratifikasi")) {
                toggleRequiredLabel(document.getElementById("email"), true);
                toggleRequiredLabel(document.getElementById("rincian_informasi"), true);
                toggleRequiredLabel(document.getElementById("category"), true);
                toggleRequiredLabel(document.getElementById("dfiles"), true);
            } else if (layananName.includes("penyalahgunaan wewenang") ||
                layananName.includes("pelanggaran mitra") ||
                layananName.includes("pelanggaran pejabat")) {

                // Field umum
                showField(penyalahgunaanField, penyalahgunaanInput);
                if (lampiranBuktiBerkas) lampiranBuktiBerkas.style.display = "block";
                if (lampiranDataDukung) lampiranDataDukung.style.display = "none";
                if (rincianInformasiField) rincianInformasiField.style.display = "none";

                toggleRequiredLabel(document.getElementById("email"), true);
                toggleRequiredLabel(document.getElementById("rincian_informasi"), true);
                toggleRequiredLabel(document.getElementById("category"), true);
                toggleRequiredLabel(document.getElementById("penyalahgunaan"), true);
                toggleRequiredLabel(document.getElementById("sfiles"), true);

                // Khusus pelanggaran mitra
                if (layananName.includes("pelanggaran mitra")) {
                    showField(namamitraFields, namaMitraInput);
                    showField(mitraFields, jabatanMitraInput);

                    toggleRequiredLabel(document.getElementById("nama_mitra"), true);
                    toggleRequiredLabel(document.getElementById("jabatan_mitra"), true);
                }

                // Khusus pelanggaran pejabat
                if (layananName.includes("pelanggaran pejabat")) {
                    showField(namapejabatFields, namaPejabatInput);
                    showField(pejabatFields, jabatanPejabatInput);

                    toggleRequiredLabel(document.getElementById("nama_pejabat"), true);
                    toggleRequiredLabel(document.getElementById("jabatan"), true);
                }
            }

        });

    });
</script>


</html>
