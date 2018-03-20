@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-8">
                <div class="field">
                    <label class="label">NIK</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->nik}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Nama Lengkap</label>
                    <div class="control">
                        <input class="input" type="text" value="{{ucwords(strtolower($pelamar->nama_lengkap))}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->email}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Permintaan Penempatan</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$penempatan->nama_penempatan}}" disabled>
                    </div>
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">a. Scan foto 4x6 (Background merah)</label>
                    </div>
                    @if(empty($berkas_lamaran->file_foto))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_foto))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/1')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_foto)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">b. Scan Kartu Tanda Penduduk</label>
                    </div>
                    @if(empty($berkas_lamaran->file_ktp))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_ktp))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/2')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_ktp)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">c. Scan Nomor Pokok Wajib Pajak</label>
                    </div>
                    @if(empty($berkas_lamaran->file_npwp))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_npwp))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/3')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_npwp)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">d. Scan Surat Keterangan Sehat Jasmani dan Rohani</label>
                    </div>
                    @if(empty($berkas_lamaran->file_keterangan_sehat))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_keterangan_sehat))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/4')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_keterangan_sehat)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">e. Scan Surat Lamaran</label>
                    </div>
                    @if(empty($berkas_lamaran->file_surat_lamaran))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_surat_lamaran))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/5')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_surat_lamaran)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">f. Scan Daftar Riwayat Hidup</label>
                    </div>
                    @if(empty($berkas_lamaran->file_cv))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_cv))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/6')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_cv)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">g. Scan Ijazah Terakhir</label>
                    </div>
                    @if(empty($berkas_lamaran->file_ijazah))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_ijazah))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/7')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_ijazah)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">h. Scan Transkrip</label>
                    </div>
                    @if(empty($berkas_lamaran->file_transkrip))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_transkrip))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/8')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_transkrip)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">i. Scan SKCK yang masih berlaku</label>
                    </div>
                    @if(empty($berkas_lamaran->file_skck))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_skck))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/9')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_skck)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">j. Scan Surat Keterangan bebas narkoba, psikotropika, dan zat adiktif lainnya</label>
                    </div>
                    @if(empty($berkas_lamaran->file_bebas_narkoba))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_bebas_narkoba))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/10')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_bebas_narkoba)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">k. Scan Surat Keterangan pengalaman kerja sejenis</label>
                    </div>
                    @if(empty($berkas_lamaran->file_keterangan_pengalaman))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Jika ada)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_keterangan_pengalaman))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/11')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_keterangan_pengalaman)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">l. Scan sertifikat kursus/pelatihan Keahlian khusus terkait</label>
                    </div>
                    @if(empty($berkas_lamaran->file_sertifikat))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Jika ada)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_sertifikat))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/12')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_sertifikat)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">m. Scan Surat Pernyataan Bukan PNS, pengurus LSM,
                            <br> bukan anggota dan simpatisan partai politik serta bukan
                            <br> tim sukses dari calon kepala desa, calon pasangan kepala daerah,
                            <br> dan calon pasangan Presiden Republik Indonesia dan
                            <br> Surat Pernyataan bersedia bekerja penuh waktu (full time)
                            <br> sesuai dengan jam kerja selama masa kontrak (bermaterai)
                            <br> dengan format terlampir</label>
                    </div>
                    @if(empty($berkas_lamaran->file_bukan_pns))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_bukan_pns))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/13')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_bukan_pns)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">n. Scan BPJS</label>
                    </div>
                    @if(empty($berkas_lamaran->file_bpjs))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Jika ada)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_bpjs))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/14')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_bpjs)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="field is-grouped">
                    <div class="control">
                        <label class="label">o. File Kesatuan</label>
                    </div>
                    @if(empty($berkas_lamaran->file_summary))
                    <div class="control">
                        <small>
                            <i style="color: #ff3860">(Wajib diupload)</i>
                        </small>
                    </div>
                    @else
                    @if(!empty($verifikasi_berkas_lamaran) && !empty($verifikasi_berkas_lamaran->file_summary))
                    <div class="control">
                        <span class="icon is-success is-rounded">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    @else
                    <div class="control">
                        <a class="button is-success" href="{{url('verif-dokumen/'.$berkas_lamaran->id_berkas_lamaran.'/15')}}">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>Verif Dokumen</span>
                        </a>
                    </div>
                    @endif
                    <div class="control">
                        <a href="{{asset($berkas_lamaran->file_summary)}}" target="_blank">
                            <i>(Lihat upload)</i>
                        </a>
                    </div>
                    @endif
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <a class="button is-warning" href="{{url('finish-lamaran/'.$berkas_lamaran->id_berkas_lamaran.'/0')}}">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span>Izinkan revisi berkas</span>
                </a>
            </div>
            @if(!empty($tindakan))
            <div class="control">
                <a class="button is-link" href="{{url('finish-lamaran/'.$berkas_lamaran->id_berkas_lamaran.'/10')}}">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span>Lolos</span>
                </a>
            </div>
            <div class="control">
                <a class="button is-danger" href="{{url('finish-lamaran/'.$berkas_lamaran->id_berkas_lamaran.'/11')}}">
                    <span class="icon">
                        <i class="fa fa-close"></i>
                    </span>
                    <span>Tolak</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush