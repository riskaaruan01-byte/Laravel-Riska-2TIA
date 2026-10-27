<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $pelanggan->nama ?? ($pelanggan->first_name ?? 'Pedro Fernandes') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .cv-card {
            max-width: 850px;
            margin: 40px auto;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        /* Sidebar Kiri */
        .cv-sidebar {
            background-color: #1e252b;
            color: #ffffff;
            padding: 40px 25px;
            position: relative;
        }

        .profile-img-container {
            width: 170px;
            height: 170px;
            margin: 0 auto 30px auto;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #ffffff;
            background-color: #333;
        }

        .profile-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-badge {
            background-color: #d8b05e;
            color: #000000;
            font-weight: bold;
            font-size: 0.85rem;
            letter-spacing: 1px;
            padding: 6px 16px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .sidebar-section {
            margin-bottom: 30px;
        }

        .sidebar-section h6 {
            font-size: 0.9rem;
            font-weight: bold;
            margin-bottom: 2px;
            color: #ffffff;
        }

        .sidebar-section p {
            font-size: 0.85rem;
            color: #cccccc;
            margin-bottom: 12px;
            word-break: break-all;
        }

        /* Main Content Kanan */
        .cv-main {
            padding: 50px 40px;
            position: relative;
        }

        .cv-header-name {
            font-size: 2.3rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #1a1a1a;
            margin: 0;
            text-transform: uppercase;
        }

        .cv-header-title {
            font-size: 1.1rem;
            font-style: italic;
            color: #555555;
            margin-bottom: 35px;
        }

        .cv-section-title {
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1px;
            color: #1a1a1a;
            text-transform: uppercase;
            border-bottom: 2px solid #1a1a1a;
            padding-bottom: 5px;
            margin-bottom: 15px;
            margin-top: 25px;
        }

        .cv-text {
            font-size: 0.9rem;
            line-height: 1.6;
            color: #444444;
            white-space: pre-line;
        }

        /* Hiasan Segitiga Emas */
        .gold-accent-top {
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 100px 100px 0;
            border-color: transparent #d8b05e transparent transparent;
            z-index: 1;
        }

        .dark-accent-top {
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 60px 120px 0;
            border-color: transparent #1e252b transparent transparent;
            z-index: 2;
        }

        .gold-accent-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 100px 0 0 100px;
            border-color: transparent transparent transparent #d8b05e;
        }

        @media print {
            body { background: white; }
            .cv-card { box-shadow: none; margin: 0; max-width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <!-- Tombol Cetak & Kembali -->
    <div class="text-center mt-4 no-print">
        <a href="{{ url('/biodata') }}" class="btn btn-secondary me-2">← Kembali ke Dashboard</a>
        <button onclick="window.print()" class="btn btn-primary">Cetak / Download PDF</button>
    </div>

    <!-- Container Utama CV -->
    <div class="cv-card">
        <!-- Hiasan Sudut Atas -->
        <div class="gold-accent-top"></div>
        <div class="dark-accent-top"></div>

        <div class="row g-0">
            <!-- Sidebar Kiri -->
            <div class="col-md-4 cv-sidebar">
                <!-- Foto Profil -->
                <div class="profile-img-container d-flex align-items-center justify-content-center">
                    @if(isset($pelanggan->foto) && $pelanggan->foto)
                        <img src="{{ asset('storage/' . $pelanggan->foto) }}" alt="Foto Profil">
                    @else
                        <span class="fs-1 text-white fw-bold">{{ strtoupper(substr($pelanggan->nama ?? ($pelanggan->first_name ?? 'P'), 0, 1)) }}</span>
                    @endif
                </div>

                <!-- Data Diri -->
                <div class="sidebar-section">
                    <span class="sidebar-badge">DATA DIRI</span>
                    
                    <h6>NIM / ID</h6>
                    <p>{{ $pelanggan->nim ?? ($pelanggan->id ?? '-') }}</p>

                    <h6>Tempat / Tanggal Lahir</h6>
                    <p>
                        @if(isset($pelanggan->tanggal_lahir))
                            {{ is_a($pelanggan->tanggal_lahir, 'DateTime') || is_a($pelanggan->tanggal_lahir, 'Carbon\Carbon') ? $pelanggan->tanggal_lahir->format('d F Y') : $pelanggan->tanggal_lahir }}
                        @else
                            {{ $pelanggan->birthday ?? '-' }}
                        @endif
                    </p>

                    <h6>Jenis Kelamin</h6>
                    <p>{{ $pelanggan->jenis_kelamin ?? ($pelanggan->gender ?? '-') }}</p>

                    <h6>Status</h6>
                    <p>{{ $pelanggan->status ?? 'Belum menikah' }}</p>

                    <h6>Kewarganegaraan</h6>
                    <p>{{ $pelanggan->kewarganegaraan ?? 'Indonesia' }}</p>
                </div>

                <!-- Kontak -->
                <div class="sidebar-section">
                    <span class="sidebar-badge">KONTAK</span>
                    <p>📞 {{ $pelanggan->no_hp ?? ($pelanggan->phone ?? '-') }}</p>
                    <p>✉️ {{ $pelanggan->email ?? '-' }}</p>
                    <p>📍 {{ $pelanggan->alamat ?? '-' }}</p>
                </div>

                <!-- Hiasan Sudut Bawah Kiri -->
                <div class="gold-accent-bottom"></div>
            </div>

            <!-- Konten Utama Kanan -->
            <div class="col-md-8 cv-main">
                <!-- Header Nama -->
                <h1 class="cv-header-name">{{ $pelanggan->nama ?? trim(($pelanggan->first_name ?? 'PEDRO') . ' ' . ($pelanggan->last_name ?? 'FERNANDES')) }}</h1>
                <div class="cv-header-title">{{ $pelanggan->jurusan ?? 'Mahasiswa / Lulusan Baru' }}</div>

                <!-- Tentang Saya -->
                <div class="cv-section-title">TENTANG SAYA</div>
                <p class="cv-text">
                    {{ $pelanggan->alamat ? "Berdomisili di " . $pelanggan->alamat . ". Memiliki motivasi tinggi, siap belajar hal baru, dan bekerja dalam tim maupun individu secara profesional." : "Saya merupakan seorang profesional yang berdedikasi tinggi dan memiliki semangat belajar yang kuat." }}
                </p>

                <!-- Pendidikan -->
                <div class="cv-section-title">PENDIDIKAN</div>
                <p class="cv-text">
                    {{ $pelanggan->pendidikan ?? "S1 Teknik Informatika / Sistem Informasi\nSMA Negeri / SMK Terkait" }}
                </p>

                <!-- Pengalaman Kerja -->
                <div class="cv-section-title">PENGALAMAN KERJA</div>
                <p class="cv-text">
                    {{ $pelanggan->pengalaman_kerja ?? "Pengalaman Proyek Web Development Laravel & MySQL\nPraktikum Pemrograman & Pengolahan Data" }}
                </p>

                <!-- Kemampuan -->
                <div class="cv-section-title">KEMAMPUAN</div>
                <p class="cv-text">
                    {{ $pelanggan->kemampuan ?? "• HTML, CSS, Bootstrap, PHP, Laravel\n• Database Management (MySQL, HeidiSQL)\n• Komunikasi & Kerja Sama Tim" }}
                </p>
            </div>
        </div>
    </div>

</body>
</html>