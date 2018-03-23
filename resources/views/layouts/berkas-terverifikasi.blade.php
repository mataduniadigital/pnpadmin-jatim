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
                Berkas Lamaran Terverifikasi Penempatan {{$penempatan->nama_penempatan}} dan melamar sebagai {{$jabatan_lamaran->nama}}
            </h2>
        </div>
        <table class="table is-striped is-bordered is-fullwidth" id="berkas_proses_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Penempatan</th>
                    <th>Berkas Foto</th>
                    <th>Berkas KTP</th>
                    <th>Berkas NPWP</th>
                    <th>Surat Keterangan Sehat</th>
                    <th>Surat Lamaran</th>
                    <th>CV</th>
                    <th>Ijazah</th>
                    <th>Transkrip</th>
                    <th>SKCK</th>
                    <th>Surat Keterangan Bebas Narkoba</th>
                    <th>Surat Keterangan Pengalaman</th>
                    <th>Sertifikat</th>
                    <th>Surat Keterangan Poin M</th>
                    <th>BPJS</th>
                    <th>Arsip Semua File</th>
                    <th>Nilai Poin 1</th>
                    <th>Nilai Poin 2</th>
                    <th>Nilai Poin 3</th>
                    <th>Nilai Poin 4</th>
                    <th>Total Nilai</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
        </table>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    
    var url = '{{env('APP_URL', '')}}';
    var berkas_proses_table = $('#berkas_proses_table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: '{{url('datalist/list-berkas')}}?penempatan={{$input->penempatan}}&jabatan={{$input->jabatan}}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nik', name: 'nik' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'nama_penempatan', name: 'nama_penempatan' },
            { data: 'file_foto', name: 'file_foto', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_ktp', name: 'file_ktp', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_npwp', name: 'file_npwp', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_keterangan_sehat', name: 'file_keterangan_sehat', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_surat_lamaran', name: 'file_surat_lamaran', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_cv', name: 'file_cv', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_ijazah', name: 'file_ijazah', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_transkrip', name: 'file_transkrip', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_skck', name: 'file_skck', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_bebas_narkoba', name: 'file_bebas_narkoba', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_keterangan_pengalaman', name: 'file_keterangan_pengalaman', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_sertifikat', name: 'file_sertifikat', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_bukan_pns', name: 'file_bukan_pns', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_bpjs', name: 'file_bpjs', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'file_summary', name: 'file_summary', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == null || data == 0){
                        return '<span class="tag is-danger">Tidak diverifikasi</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }
                } 
            },
            { data: 'nilai1', name: 'nilai1' },
            { data: 'nilai2', name: 'nilai2' },
            { data: 'nilai3', name: 'nilai3' },
            { data: 'nilai4', name: 'nilai4' },
            { data: 'total_nilai', name: 'total_nilai' },
            { data: 'created_at', name: 'created_at' }
        ]
    });
    
    $(document).on('click', '.verifikasi-item-btn', function(){
        var item = $(this);
        window.location.href = url+'/verifikasi/'+item.attr('data-id');
    });
</script>
@endpush