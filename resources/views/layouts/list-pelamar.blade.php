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
                Daftar semua pelamar terdaftar
            </h2>
        </div>
        <table class="table is-striped is-bordered is-fullwidth" id="berkas_proses_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Status</th>
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
        ajax: '{{url('datalist/pelamar')}}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false, orderable: false},
            { data: 'nik', name: 'nik' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'status', name: 'status', searchable: false, orderable: false, 
                render: function(data) {
                    if(data == 0){
                        return '<span class="tag is-danger">Belum submit Lamaran</span>';
                    }else if(data == 1){
                        return '<span class="tag is-success">Sudah submit</span>';
                    }else if(data == 10){
                        return '<span class="tag is-success">Sudah submit</span><span class="tag is-link">Sudah terverifikasi</span>';
                    }
                } 
            }
            
        ]
    });
</script>
@endpush