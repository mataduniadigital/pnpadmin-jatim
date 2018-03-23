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
        columnDefs: [ 
            { searchable: false, orderable: false, targets: 0 }
            ],
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nik', name: 'nik' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'file_wajib_1', name: 'file_wajib_1', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'Foto:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_1 == 1){
                        text = text+'Foto:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'KTP:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_2 == 1){
                        text = text+'KTP:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'NPWP:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_3 == 1){
                        text = text+'NPWP:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_4 == null || data.file_4 == 0){
                        text = text+'Surat sehat:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_4 == 1){
                        text = text+'Surat sehat:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_5 == null || data.file_5 == 0){
                        text = text+'Lamaran:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_5 == 1){
                        text = text+'Lamaran:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_6 == null || data.file_6 == 0){
                        text = text+'CV:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_6 == 1){
                        text = text+'CV:<span class="tag is-success">Verif</span><br><br>';
                    }
                    return text;
                } 
            },
            { data: 'file_wajib_2', name: 'file_wajib_2', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'Ijazah:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_1 == 1){
                        text = text+'Ijazah:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'Transkrip:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_2 == 1){
                        text = text+'Transkrip:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'SKCK:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_3 == 1){
                        text = text+'SKCK:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_4 == null || data.file_4 == 0){
                        text = text+'Surat Bebas Narkoba:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_4 == 1){
                        text = text+'Surat Bebas Narkoba:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_5 == null || data.file_5 == 0){
                        text = text+'Surat Pernyataan:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_5 == 1){
                        text = text+'Surat Pernyataan:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_6 == null || data.file_6 == 0){
                        text = text+'File Gabungan:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_6 == 1){
                        text = text+'File Gabungan:<span class="tag is-success">Verif</span><br><br>';
                    }
                    return text;
                } 
            },
            { data: 'file_tidak_wajib', name: 'file_tidak_wajib', searchable: false, orderable: false, 
                render: function(data) {
                    var text = '';
                    if(data.file_1 == null || data.file_1 == 0){
                        text = text+'Surat Pengalaman:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_1 == 1){
                        text = text+'Surat Pengalaman:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_2 == null || data.file_2 == 0){
                        text = text+'Seritf:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_2 == 1){
                        text = text+'Seritf:<span class="tag is-success">Verif</span><br><br>';
                    }
                    if(data.file_3 == null || data.file_3 == 0){
                        text = text+'BPJS:<span class="tag is-danger">x</span><br><br>';
                    }else if(data.file_3 == 1){
                        text = text+'BPJS:<span class="tag is-success">Verif</span><br><br>';
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

    berkas_proses_table.on( 'order.dt search.dt', function () {
        berkas_proses_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    
    $(document).on('click', '.lolos-btn', function(){
        var item = $(this);
        $.ajax({
			async: false,
			type: 'GET',
			url: url+'/loloskan/'+item.attr('data-id')+'/11',
			success: function(data){
				if(data == 1){
					alert('Success');
                    berkas_proses_table.ajax.reload(null, false);
				}else{
					alert('Failed');
				}
           	}
		});
    });
    
    $(document).on('click', '.batal-btn', function(){
        var item = $(this);
        $.ajax({
			async: false,
			type: 'GET',
			url: url+'/loloskan/'+item.attr('data-id')+'/10',
			success: function(data){
				if(data == 1){
					alert('Success');
                    berkas_proses_table.ajax.reload(null, false);
				}else{
					alert('Failed');
				}
           	}
		});
    });

    $(document).on('click', '.lihat-detil-btn', function(){
        var item = $(this);
        window.open(url+'/show-berkas/'+item.attr('data-id'),'_blank');
    });
</script>
@endpush