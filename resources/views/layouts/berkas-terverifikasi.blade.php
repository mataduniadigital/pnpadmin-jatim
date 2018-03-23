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
                    <th>Berkas Wajib 1</th>
                    <th>Berkas Wajib 2</th>
                    <th>Berkas Tidak Wajib</th>
                    <th>Nilai Poin 1</th>
                    <th>Nilai Poin 2</th>
                    <th>Nilai Poin 3</th>
                    <th>Nilai Poin 4</th>
                    <th>Total Nilai</th>
                    <th>Action</th>
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
        fixedHeader: {
            header: true
        },
        ajax: '{{url('datalist/list-berkas')}}?penempatan={{$input->penempatan}}&jabatan={{$input->jabatan}}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nik', name: 'nik' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'file_wajib_1', name: 'file_wajib_1', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'FOTO: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_1 == 1){
                        text = text+'FOTO:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'KTP: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_2 == 1){
                        text = text+'KTP:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'NPWP: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_3 == 1){
                        text = text+'NPWP:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_4 == null || data.file_4 == 0){
                        text = text+'KETERANGAN SEHAT: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_4 == 1){
                        text = text+'KETERANGAN SEHAT:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_5 == null || data.file_5 == 0){
                        text = text+'SURAT LAMARAN: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_5 == 1){
                        text = text+'SURAT LAMARAN:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_6 == null || data.file_6 == 0){
                        text = text+'CV: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_6 == 1){
                        text = text+'CV:<span class="tag is-success">Verif</span><br>';
                    }
                    return text;
                } 
            },
            { data: 'file_wajib_2', name: 'file_wajib_2', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'IJAZAH: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_1 == 1){
                        text = text+'IJAZAH:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'TRANSKRIP: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_2 == 1){
                        text = text+'TRANSKRIP:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'SKCK: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_3 == 1){
                        text = text+'SKCK:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_4 == null || data.file_4 == 0){
                        text = text+'BEBAS NARKOBA: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_4 == 1){
                        text = text+'BEBAS NARKOBA:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_5 == null || data.file_5 == 0){
                        text = text+'PERNYATAAN: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_5 == 1){
                        text = text+'PERNYATAAN:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_6 == null || data.file_6 == 0){
                        text = text+'FILE GABUNGAN: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_6 == 1){
                        text = text+'FILE GABUNGAN:<span class="tag is-success">Verif</span><br>';
                    }
                    return text;
                } 
            },
            { data: 'file_tidak_wajib', name: 'file_tidak_wajib', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'PENGALAMAN: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_1 == 1){
                        text = text+'PENGALAMAN:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'SERTIF: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_2 == 1){
                        text = text+'SERTIF:<span class="tag is-success">Verif</span><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'BPJS: <span class="tag is-danger">x</span><br>';
                    }else if(data.file_3 == 1){
                        text = text+'BPJS:<span class="tag is-success">Verif</span><br>';
                    }
                    return text;
                } 
            },
            { data: 'nilai1', name: 'nilai1' },
            { data: 'nilai2', name: 'nilai2' },
            { data: 'nilai3', name: 'nilai3' },
            { data: 'nilai4', name: 'nilai4' },
            { data: 'total_nilai', name: 'total_nilai' },
            { data: 'action', name: 'action', searchable: false, orderable: false, 
                render: function(data) {
                    if(data.status == 10){
                        return '<a class="button is-small is-primary lolos-btn" data-id="'+data.id+'">'+
                        '    <span class="icon is-small">'+
                        '        <i class="fa fa-check"></i>'+
                        '    </span>'+
                        '    <span>Loloskan</span>'+
                        '</a>'+
                        '<a class="button is-small is-link lihat-detil-btn" data-id="'+data.id+'">'+
                        '    <span class="icon is-small">'+
                        '        <i class="fa fa-eye"></i>'+
                        '    </span>'+
                        '    <span>Lihat Berkas</span>'+
                        '</a>';
                    }else if(data.status == 11){
                        return '<a class="button is-small is-danger batal-btn" data-id="'+data.id+'">'+
                        '    <span class="icon is-small">'+
                        '        <i class="fa fa-check"></i>'+
                        '    </span>'+
                        '    <span>Batalkan</span>'+
                        '</a>'+
                        '<a class="button is-small is-link lihat-detil-btn" data-id="'+data.id+'">'+
                        '    <span class="icon is-small">'+
                        '        <i class="fa fa-eye"></i>'+
                        '    </span>'+
                        '    <span>Lihat Berkas</span>'+
                        '</a>';
                    }else if(data.status == 1){
                        return '<a class="button is-rounded is-small is-link lihat-detil-btn" data-id="'+data.id+'">'+
                            '    <span class="icon is-small">'+
                            '        <i class="fa fa-eye"></i>'+
                            '    </span>'+
                            '    <span>Lihat Berkas</span>'+
                            '</a>';
                    }else{
                        return '';
                    }
                } 
            }
        ]
    });
    
    $(document).on('click', '.lolos-btn', function(){
        var item = $(this);
        window.location.href = url+'/loloskan/'+item.attr('data-id')+'/11';
    });
    
    $(document).on('click', '.batal-btn', function(){
        var item = $(this);
        window.location.href = url+'/loloskan/'+item.attr('data-id')+'/10';
    });

    $(document).on('click', '.lihat-detil-btn', function(){
        var item = $(this);
        window.location.href = url+'/show-berkas/'+item.attr('data-id');
    });
</script>
@endpush