<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Excel;

use App\Models\Pelamar;
use App\Models\BerkasLamaran;
use App\Models\VerifikasiBerkasLamaran;
use App\Models\Penempatan;

use Yajra\DataTables\Facades\DataTables;

class LayoutController extends BaseController
{
	public function indexHome(Request $request){
        $jumlah_pelamar = Pelamar::get()->count();
        $jumlah_berkas_tersubmit = BerkasLamaran::where('status', 1)->get()->count();
        $jumlah_berkas_sedang_diverif = BerkasLamaran::where('status', 1)->whereNotNull('id_verifikator')->get()->count();
        $jumlah_berkas_tolak = BerkasLamaran::where('status', 11)->get()->count();
        $jumlah_berkas_lolos = BerkasLamaran::where('status', 10)->get()->count();

        $data = array(
            'jumlah_pelamar' => $jumlah_pelamar,
            'jumlah_berkas_tersubmit' => $jumlah_berkas_tersubmit,
            'jumlah_berkas_sedang_diverif' => $jumlah_berkas_sedang_diverif,
            'jumlah_berkas_tolak' => $jumlah_berkas_tolak,
            'jumlah_berkas_lolos' => $jumlah_berkas_lolos
        );
        return view('layouts/home', $data);
    }

	public function indexUbahPassword(Request $request){
        return view('layouts/ubah-password');
    }

	public function indexVerifikasi(Request $request, $id){
        $verifikator = Auth::user();
        $berkas_lamaran = BerkasLamaran::find($id);
        if($berkas_lamaran->id_verifikator == $verifikator->id_verifikator){
            $pelamar = Pelamar::find($berkas_lamaran->id_pelamar);
            $verifikasi_berkas_lamaran = VerifikasiBerkasLamaran::where('id_berkas_lamaran', $berkas_lamaran->id_berkas_lamaran)->first();

            $tindakan = 0;
            if(!empty($verifikasi_berkas_lamaran))
            if(!empty($verifikasi_berkas_lamaran->file_foto))
            if(!empty($verifikasi_berkas_lamaran->file_ktp))
            if(!empty($verifikasi_berkas_lamaran->file_npwp))
            if(!empty($verifikasi_berkas_lamaran->file_keterangan_sehat))
            if(!empty($verifikasi_berkas_lamaran->file_surat_lamaran))
            if(!empty($verifikasi_berkas_lamaran->file_cv))
            if(!empty($verifikasi_berkas_lamaran->file_ijazah))
            if(!empty($verifikasi_berkas_lamaran->file_transkrip))
            if(!empty($verifikasi_berkas_lamaran->file_skck))
            if(!empty($verifikasi_berkas_lamaran->file_bebas_narkoba))
            if(!empty($verifikasi_berkas_lamaran->file_bukan_pns))
            if(!empty($verifikasi_berkas_lamaran->file_summary))
                $tindakan = 1;

            $data = array(
                'pelamar' => $pelamar,
                'berkas_lamaran' => $berkas_lamaran,
                'penempatan' => Penempatan::find($berkas_lamaran->id_penempatan),
                'verifikasi_berkas_lamaran' => $verifikasi_berkas_lamaran,
                'tindakan' => $tindakan
            );
            return view('layouts/verifikasi', $data);
        }else{
            return Redirect::back();
        }
    }

	public function indexVerifikasiBerkas(Request $request){
        return view('layouts/verifikasi-berkas');
    }
    
	public function indexVerifikasiSaya(Request $request){
        return view('layouts/verifikasi-saya');
    }

}