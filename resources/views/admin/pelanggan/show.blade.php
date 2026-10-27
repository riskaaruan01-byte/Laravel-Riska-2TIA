
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV {{ $data->nama }}</title>
    <link href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    <style>
        body { background: #f3f5f8; }
        .cv {
            max-width: 1000px;
            margin: 25px auto;
            background: white;
            display: grid;
            grid-template-columns: 32% 68%;
            box-shadow: 0 3px 15px #0001;
        }
        .cv-left {
            background: #202a32;
            color: white;
            padding: 30px 25px;
            overflow-wrap: anywhere;
        }
        .cv-right {
            padding: 35px;
            overflow-wrap: anywhere;
        }
        .foto {
            width: 145px;
            height: 145px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 2px solid currentColor;
            padding-bottom: 7px;
            margin: 25px 0 15px;
        }
        .cv-left .section-title {
            background: #dfc477;
            color: #202a32;
            border: 0;
            padding: 9px 12px;
            border-radius: 18px;
        }
        .isi { white-space: pre-line; line-height: 1.8; }
        @media(max-width:650px) {
            .cv { grid-template-columns: 1fr; margin: 10px; }
        }
        @media print {
            body { background: white; }
            .no-print { display: none !important; }
            .cv { margin: 0; box-shadow: none; }
        }
    </style>
</head>
<body>

<div class="text-center my-3 no-print">
    <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('biodata.edit', $data->getKey()) }}" class="btn btn-warning">Edit CV</a>
    <button onclick="window.print()" class="btn btn-primary">Cetak / Simpan PDF</button>
</div>

<div class="cv">
    <aside class="cv-left">
        @if($data->foto)
            <img src="{{ asset('storage/'.$data->foto) }}"
                 class="foto" alt="Foto {{ $data->nama }}">
        @else
            <div class="foto d-flex align-items-center justify-content-center bg-secondary">
                Foto belum tersedia
            </div>
        @endif

        <h5 class="section-title">DATA DIRI</h5>
        <p><strong>Tanggal Lahir</strong><br>
            {{ $data->tanggal_lahir?->format('d-m-Y') ?? '-' }}
        </p>
        <p><strong>Jenis Kelamin</strong><br>{{ $data->jenis_kelamin ?: '-' }}</p>
        <p><strong>Status</strong><br>{{ $data->status ?: '-' }}</p>
        <p><strong>Kewarganegaraan</strong><br>{{ $data->kewarganegaraan ?: '-' }}</p>

        <h5 class="section-title">KONTAK</h5>
        <p><strong>Email</strong><br>{{ $data->email ?: '-' }}</p>
        <p><strong>No. HP</strong><br>{{ $data->no_hp ?: '-' }}</p>
        <p><strong>Alamat</strong><br>{{ $data->alamat ?: '-' }}</p>
    </aside>

    <main class="cv-right">
        <h1 class="fw-bold">{{ $data->nama }}</h1>
        <h4 class="text-secondary">Curriculum Vitae</h4>
        <p>{{ $data->jurusan ?: 'Mahasiswa' }}</p>

        <h5 class="section-title">TENTANG SAYA</h5>
        <p>
            Saya adalah pribadi yang ingin terus mengembangkan kemampuan,
            menambah pengalaman, dan bekerja sama dengan baik dalam tim.
        </p>

        <h5 class="section-title">PENDIDIKAN</h5>
        <div class="isi">{{ $data->pendidikan ?: 'Belum ada data pendidikan.' }}</div>

        <h5 class="section-title">PENGALAMAN KERJA</h5>
        <div class="isi">{{ $data->pengalaman_kerja ?: 'Belum ada pengalaman kerja yang dicantumkan.' }}</div>

        <h5 class="section-title">KEMAMPUAN</h5>
        <div class="isi">{{ $data->kemampuan ?: 'Belum ada data kemampuan.' }}</div>

        <div class="mt-4">
            <strong>NIM:</strong> {{ $data->nim }}<br>
            <strong>Jurusan:</strong> {{ $data->jurusan ?: '-' }}
        </div>
    </main>
</div>

<script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
