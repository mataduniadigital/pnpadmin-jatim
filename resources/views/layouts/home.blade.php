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
                    Pelamar sudah diverifikasi
                    <br>
                    <b style="font-size: 46px;">{{$jumlah_berkas_verif}}</b>
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
<section class="section">
    <div class="container">
        <table class="table" style="border: 1px solid #eeeeee">
            <thead>
                <tr>
                    <th>
                        <abbr>No</abbr>
                    </th>
                    <th>Penempatan</th>
                    <th class="has-text-centered">
                        <abbr>Berkas belum <br>terverifikasi</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>Berkas sudah <br>terverifikasi</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>Terverif lamaran<br> KORFAS</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>Terverif lamaran<br> TFL</abbr>
                    </th>
                </tr>
            </thead>
            @php
                $jumlah_berkas_korfas = 0;
                $jumlah_berkas_tfl = 0;
            @endphp
            <tbody>
                @foreach($list_penempatan as $no => $penempatan)
                <tr>
                    <th>{{$no+1}}</th>
                    <td>
                        <b>{{$penempatan->nama_penempatan}}</b>
                    </td>
                    @php
                        $berkas_belum_verif = $jumlah_berkas_per_penempatan_belum_verif->filter(
                            function ($item) use ($penempatan) {
                                return $item->id_penempatan == $penempatan->id_penempatan;
                            })->values();

                        $berkas_sudah_verif = $jumlah_berkas_per_penempatan_sudah_verif->filter(
                            function ($item) use ($penempatan) {
                                return $item->id_penempatan == $penempatan->id_penempatan;
                            })->values();

                        $berkas_korfas = \App\Models\BerkasLamaran::where(['id_penempatan' => $penempatan->id_penempatan, 'status' => 10, 'id_jabatan_lamaran' => 1])->get()->count();
                        $jumlah_berkas_korfas = $jumlah_berkas_korfas + $berkas_korfas;

                        $berkas_tfl = \App\Models\BerkasLamaran::where(['id_penempatan' => $penempatan->id_penempatan, 'status' => 10, 'id_jabatan_lamaran' => 2])->get()->count();
                        $jumlah_berkas_tfl = $jumlah_berkas_tfl + $berkas_tfl;
                    @endphp
                    @if(!empty($berkas_belum_verif[0]))
                        @php
                            $jumlah_belum_verif = $berkas_belum_verif[0]->jumlah;
                        @endphp
                    @else
                        @php
                            $jumlah_belum_verif = 0;
                        @endphp
                    @endif
                    @if(!empty($berkas_sudah_verif[0]))
                        @php
                            $jumlah_sudah_verif = $berkas_sudah_verif[0]->jumlah;
                        @endphp
                    @else
                        @php
                            $jumlah_sudah_verif = 0;
                        @endphp
                    @endif
                    
                    <td class="has-text-centered">{{$jumlah_belum_verif}}</td>
                    <td class="has-text-centered">{{$jumlah_sudah_verif}}</td>
                    <td class="has-text-centered">{{$berkas_korfas}}</td>
                    <td class="has-text-centered">{{$berkas_tfl}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th class="has-text-centered">
                        <abbr>{{$jumlah_berkas_tersubmit}}</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>{{$jumlah_berkas_verif}}</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>{{$jumlah_berkas_korfas}}</abbr>
                    </th>
                    <th class="has-text-centered">
                        <abbr>{{$jumlah_berkas_tfl}}</abbr>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</section>
@endif
@endsection 

@push('scripts')
<!-- Js -->
@endpush