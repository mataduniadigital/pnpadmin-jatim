@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
@if(!Auth::check())
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Silakan login menggunakan Nomor ID yang sudah terdaftar</b>
            </h2>
        </div>
        <div class="columns">
            <div class="column is-6">
                <form action="{{action('FunctionController@actionLogin')}}" method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">Nomor ID</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="nomor_id" name="nomor_verifikator" value="{{Request::old('nomor_verifikator')}}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="password" name="password">
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@else
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered" style="border: 1px solid #bbbbbb;">
                <div class="content">
                    Pelamar terdaftar
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_pelamar}}</b>
                </div>
            </div>
            <div class="column has-text-centered" style="border: 1px solid #bbbbbb;">
                <div class="content">
                    Pelamar sudah submit
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_berkas_tersubmit}}</b>
                </div>
            </div>
            <div class="column has-text-centered" style="border: 1px solid #bbbbbb;">
                <div class="content">
                    Pelamar sedang diverifikasi
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_berkas_sedang_diverif}}</b>
                </div>
            </div>
            <div class="column has-text-centered" style="border: 1px solid #bbbbbb;">
                <div class="content">
                    Pelamar ditolak
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_berkas_tolak}}</b>
                </div>
            </div>
            <div class="column has-text-centered" style="border: 1px solid #bbbbbb;">
                <div class="content">
                    Pelamar lolos
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_berkas_lolos}}</b>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Hai, Saudara/i {{Auth::user()->nama}}</b>
            </h2>
            <p>Silakan Anda verifikasi dengan klik link berikut atau klik tombol verifikasi di bagian navigasi</p>
            <a href="{{url('verifikasi-berkas')}}" class="button is-primary">
                <span class="icon is-small">
                    <i class="fa fa-check"></i>
                </span>
                <span>Verifikasi Berkas</span>
            </a>
        </div>
    </div>
</section>
@endif
@endsection 

@push('scripts')
<!-- Js -->
@endpush