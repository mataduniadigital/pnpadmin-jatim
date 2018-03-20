@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Pengumuman Berkas</b>
            </h2>
            <p>Rincian berkas yang diperlukan untuk pendaftaran (Urutkan dari yang paling depan)</p>
            <ol>
                <li>Pas Foto 4x6 = 1 lembar (scan background warna merah).</li>
                <li>Scan KTP.</li>
                <li>Scan NPWP.</li>
                <li>Scan Surat Keterangan Sehat Jasmani dan Rohani (asli diserahkan pada saat dinyatakan Lolos Seleksi Administrasi).</li>
                <li>Scan Surat lamaran (format terlampir).</li>
                <li>Scan Daftar Riwayat Hidup (Curriculum Vitae) yang memuat foto pelamar,Detail kontak (No. HP dan alamat email),
                    riwayat pendidikan,pengalaman kerja, keahlian terkait, kursus/pelatihan yang pernah diikuti, serta pengalaman
                    berorganisasi (jika ada).</li>
                <li>Scan Ijazah terakhir (legalisir diserahkan pada saat dinyatakan Lolos Seleksi Administrasi).</li>
                <li>Scan Transkrip (legalisir diserahkan pada saat dinyatakan Lolos Seleksi Administrasi).
                </li>
                <li>Scan SKCK yang masih berlaku (legalisir diserahkan pada saat dinyatakan Lolos Seleksi Administrasi).</li>
                <li>Scan Surat Bebas Narkoba, Psikotropika, dan Zat Aditif lainnya (asli diserahkan pada saat dinyatakan Lolos
                    Seleksi Administrasi).</li>
                <li>Scan Surat Keterangan Pengalaman Kerja sejenis (jika ada).</li>
                <li>Scan Sertifikat kursus/pelatihan keahlian terkait (jika ada).</li>
                <li>Scan Surat Pernyataan Bukan PNS, pengurus LSM, bukan anggota dan simpatisan partai politik serta bukan tim
                    sukses dari calon kepala desa, calon pasangan kepala daerah, dan calon pasangan Presiden Republik Indonesia
                    dan Surat Pernyataan bersedia bekerja penuh waktu (full time) sesuai dengan jam kerja selama masa kontrak
                    (bermaterai) dengan format terlampir (asli diserahkan pada saat dinyatakan Lolos Seleksi Administrasi).</li>
                <li>Bagi yang sudah memiliki BPJS harap dilampirkan (copy), apabila belum memiliki,bersedia mengikuti BPJS apabila
                    diterima.</li>
            </ol>
        </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush