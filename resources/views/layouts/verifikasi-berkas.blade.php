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
        <table class="table is-striped is-bordered is-fullwidth" id="berkas_not_verif_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
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
    
    var url = '{{env('APP_URL', '')}}';
    var berkas_table = $('#berkas_not_verif_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url('datalist/berkas-not-verif')}}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'nama_penempatan', name: 'nama_penempatan' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', searchable: false, orderable: false, 
                render: function(data) {
                    return '<a class="button is-small is-primary verifikasi-item-btn" data-id="'+data.id+'">'+
                    '    <span class="icon is-small">'+
                    '        <i class="fa fa-download"></i>'+
                    '    </span>'+
                    '    <span>Kerjakan Verifikasi</span>'+
                    '</a>';
                },
            }
        ]
    });
    
    $(document).on('click', '.verifikasi-item-btn', function(){
        var item = $(this);
        swal({
            title: 'Yakin mengerjakannya?',
            text: "Yang kamu Ambil tidak akan muncul di verifikator lain",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
            }).then((result) => {
                window.location.href = url+'/kerjakan-berkas/'+item.attr('data-id');
        })
    });
</script>
@endpush