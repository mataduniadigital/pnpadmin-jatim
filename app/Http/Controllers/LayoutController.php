<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use DB;
use Excel;

use App\Models\Pelamar;
use App\Models\BerkasLamaran;
use App\Models\VerifikasiBerkasLamaran;
use App\Models\Penempatan;
use App\Models\JabatanLamaran;
use App\Models\OptionIndexNilai;

use Yajra\DataTables\Facades\DataTables;

class LayoutController extends BaseController
{
	public function indexHome(Request $request){
        $jumlah_pelamar = Pelamar::get()->count();
        $jumlah_berkas_tersubmit = BerkasLamaran::where('status', 1)->get()->count();
        $jumlah_berkas_sedang_diverif = BerkasLamaran::where('status', 1)->whereNotNull('id_verifikator')->get()->count();
        $jumlah_berkas_verif = BerkasLamaran::where('status', 10)->get()->count();
        $jumlah_berkas_lolos = BerkasLamaran::where('status', 11)->get()->count();
        $jumlah_berkas_per_penempatan_belum_verif = BerkasLamaran::select('penempatan.id_penempatan', 'nama_penempatan', DB::raw('count(berkas_lamaran.id_penempatan) as jumlah'))
                                                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                                                        ->where('status', 1)
                                                        ->groupBy('penempatan.id_penempatan', 'penempatan.nama_penempatan')
                                                        ->orderBy('penempatan.id_penempatan')
                                                        ->get();
        $jumlah_berkas_per_penempatan_sudah_verif = BerkasLamaran::select('penempatan.id_penempatan', 'nama_penempatan', DB::raw('count(berkas_lamaran.id_penempatan) as jumlah'))
                                                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                                                        ->where('status', 10)
                                                        ->groupBy('penempatan.id_penempatan', 'penempatan.nama_penempatan')
                                                        ->orderBy('penempatan.id_penempatan')
                                                        ->get();

        $data = array(
            'jumlah_pelamar' => $jumlah_pelamar,
            'jumlah_berkas_tersubmit' => $jumlah_berkas_tersubmit,
            'jumlah_berkas_sedang_diverif' => $jumlah_berkas_sedang_diverif,
            'jumlah_berkas_verif' => $jumlah_berkas_verif,
            'jumlah_berkas_lolos' => $jumlah_berkas_lolos,
            'list_penempatan' => Penempatan::get(),
            'jumlah_berkas_per_penempatan_belum_verif' => $jumlah_berkas_per_penempatan_belum_verif,
            'jumlah_berkas_per_penempatan_sudah_verif' => $jumlah_berkas_per_penempatan_sudah_verif
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

            $data = array(
                'pelamar' => $pelamar,
                'berkas_lamaran' => $berkas_lamaran,
                'penempatan' => Penempatan::find($berkas_lamaran->id_penempatan),
                'verifikasi_berkas_lamaran' => $verifikasi_berkas_lamaran,
                'list_jabatan_lamatan' => JabatanLamaran::get(),
                'option_index_nilai_1' => OptionIndexNilai::where('tipe', 1)->get(),
                'option_index_nilai_2' => OptionIndexNilai::where('tipe', 2)->get(),
                'option_index_nilai_3' => OptionIndexNilai::where('tipe', 3)->get(),
                'option_index_nilai_4' => OptionIndexNilai::where('tipe', 4)->get()
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