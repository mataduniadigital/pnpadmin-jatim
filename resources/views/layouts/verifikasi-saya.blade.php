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
                Berkas Lamaran yang belum diverifikasi
            </h2>
        </div>
        <table class="table is-striped is-bordered is-fullwidth" id="berkas_proses_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Pengajuan Penempatan</th>
                    <th>Tanggal Daftar</th>
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
    
    var url = '{{env('APP_ASSET', '')}}';
    var berkas_proses_table = $('#berkas_proses_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url('datalist/berkas-proses-verif')}}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'status', name: 'status', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == 0){
                        return '<span class="tag is-danger">Revisi berkas</span>';
                    }else if(data == 1){
                        return '<span class="tag is-warning">Dalam proses</span>';
                    }else if(data == 10){
                        return '<span class="tag is-success">Sudah diverifikasi</span>';
                    }else if(data == 11){
                        return '<span class="tag is-success">Sudah diverifikasi</span><span class="tag is-link">Lolos</span>';
                    }
                }
            },
            { data: 'nama_penempatan', name: 'nama_penempatan' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', searchable: false, orderable: false, 
                render: function(data) {
                    if(data.status == 0){
                        return '';
                    }else if(data.status == 1){
                        return '<a class="button is-small is-primary verifikasi-item-btn" data-id="'+data.id+'">'+
                        '    <span class="icon is-small">'+
                        '        <i class="fa fa-download"></i>'+
                        '    </span>'+
                        '    <span>Proses</span>'+
                        '</a>';
                    }else if(data.status == 10 || data.status == 11){
                        return '';
                    }
                },
            }
        ]
    });
    
    $(document).on('click', '.verifikasi-item-btn', function(){
        var item = $(this);
        window.location.href = url+'/verifikasi/'+item.attr('data-id');
    });
</script>
@endpush