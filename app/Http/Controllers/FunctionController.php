<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Auth;
use Excel;
use Session;

use App\Models\Pelamar;
use App\Models\BerkasLamaran;
use App\Models\Verifikator;
use App\Models\VerifikasiBerkasLamaran;
use App\Models\JabatanLamaran;
use App\Models\OptionIndexNilai;

use Yajra\DataTables\Facades\DataTables;

class FunctionController extends BaseController
{
	public function actionDaftar(Request $request){
        $verifikator = new Verifikator;
        $verifikator->nama                  = 'M FIkrie Ramadhan';
        $verifikator->nomor_verifikator     = '180320001';
        $verifikator->password              = Hash::make('180320001');
        $verifikator->save();

        Session::flash('success-msg', 'Akun Anda berhasil didaftarkan.');
        return Redirect::back();
    }

    public function actionLogin(Request $request){
        $input = (object) $request->input();

        $nomor_verifikator = str_replace(' ', '-', $input->nomor_verifikator);
        $nomor_verifikator = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '-', '.'), '', $nomor_verifikator);

        if(Auth::attempt(['nomor_verifikator' => $nomor_verifikator, 'password' => $input->password], true)){
            return Redirect::back();
        }else{
            Session::flash('error-msg', 'Login failed ...');
            return Redirect::back()->withInput();
        }
    }

    public function actionLogout(Request $request){
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function actionKerjakanBerkas(Request $request, $id = 0){
        $berkas_lamaran = BerkasLamaran::find($id);
        $verifikator = Auth::user();

        if($berkas_lamaran->status == 1 && empty($berkas_lamaran->id_verifikator)){
            $berkas_lamaran->id_verifikator = $verifikator->id_verifikator;
            $berkas_lamaran->save();

            return Redirect::to('/verifikasi/'.$id);
        }else{
            Session::flash('error-mas', 'Action Failed ...');
            return Redirect::back();
        }
    }

    public function actionVerifDokumen(Request $request, $id = 0, $tipe = 0){
        $verifikator = Auth::user();

        $verifikasi_berkas_lamaran = VerifikasiBerkasLamaran::where('id_berkas_lamaran', $id)->first();
        if(empty($verifikasi_berkas_lamaran)){
            $verifikasi_berkas_lamaran = new VerifikasiBerkasLamaran;
            $verifikasi_berkas_lamaran->id_berkas_lamaran = $id;
            $verifikasi_berkas_lamaran->save();
        }

        switch($tipe){
            case 1: 
                $verifikasi_berkas_lamaran->file_foto = 1;
                break;
            case 2: 
                $verifikasi_berkas_lamaran->file_ktp    = 1;
                break;
            case 3: 
                $verifikasi_berkas_lamaran->file_npwp   = 1;
                break;
            case 4: 
                $verifikasi_berkas_lamaran->file_keterangan_sehat   = 1;
                break;
            case 5: 
                $verifikasi_berkas_lamaran->file_surat_lamaran  = 1;
                break;
            case 6: 
                $verifikasi_berkas_lamaran->file_cv = 1;
                break;
            case 7: 
                $verifikasi_berkas_lamaran->file_ijazah = 1;
                break;
            case 8: 
                $verifikasi_berkas_lamaran->file_transkrip  = 1;
                break;
            case 9: 
                $verifikasi_berkas_lamaran->file_skck   = 1;
                break;
            case 10: 
                $verifikasi_berkas_lamaran->file_bebas_narkoba  = 1;
                break;
            case 11: 
                $verifikasi_berkas_lamaran->file_keterangan_pengalaman  = 1;
                break;
            case 12: 
                $verifikasi_berkas_lamaran->file_sertifikat = 1;
                break;
            case 13: 
                $verifikasi_berkas_lamaran->file_bukan_pns  = 1;
                break;
            case 14: 
                $verifikasi_berkas_lamaran->file_bpjs   = 1;
                break;
            case 15: 
                $verifikasi_berkas_lamaran->file_summary    = 1;
                break;
        }
        if($tipe<=15 && $tipe>0){
            $verifikasi_berkas_lamaran->save();
            Session::flash('success-msg', 'Verif berhasil ...');
        }
        
        return Redirect::back();
    }

    public function actionUbahPassword(Request $request){
        $input = (object) $request->input();
        $verifikator = Auth::user();
        if($input->new_password == $input->new_repassword){
            if(Auth::once(['nomor_verifikator' => $verifikator->nomor_verifikator, 'password' => $input->old_password])) {
                $verifikator->password      = Hash::make($input->new_password);
                $verifikator->save();

                Session::flash('success-msg', 'Password Anda berhasil diubah ...');
                return Redirect::to('/');
            }else{
                Session::flash('error-msg', 'Password lama Anda salah ...');
                return Redirect::back();
            }
        }else{
            Session::flash('error-msg', 'Ketik kembali kolom re-password sama dengan kolom password baru Anda.');
            return Redirect::back();
        }
    }

    public function actionSaveNilai(Request $request, $id){
        $input = (object) $request->input();

        $verifikator = Auth::user();
        $berkas_lamaran = BerkasLamaran::find($id);
        if($berkas_lamaran->id_verifikator == $verifikator->id_verifikator){
            if($verifikasi_berkas_lamaran = VerifikasiBerkasLamaran::where('id_berkas_lamaran', $berkas_lamaran->id_berkas_lamaran)->first()){
                $berkas_lamaran->id_jabatan_lamaran = $input->jabatan_lamaran;
                $berkas_lamaran->save();
    
                $verifikasi_berkas_lamaran->index_nilai_1 = $input->index_nilai_1;
                $verifikasi_berkas_lamaran->index_nilai_2 = $input->index_nilai_2;
                $verifikasi_berkas_lamaran->index_nilai_3 = $input->index_nilai_3;
                $verifikasi_berkas_lamaran->index_nilai_4 = $input->index_nilai_4;
                $verifikasi_berkas_lamaran->save();
                
                Session::flash('success-msg', 'Nilai sudah tersimpan ...');
                return Redirect::back();
            }else{
                Session::flash('error-msg', 'Verifikasi dokumen terkait terlebih dahulu ...');
                return Redirect::back();
            }
            
        }else{
            return Redirect::back();
        }
    }

    public function actionFinishBerkas(Request $request, $id = 0, $action){
        $verifikator = Auth::user();
        $berkas_lamaran = BerkasLamaran::find($id);
        if($berkas_lamaran->id_verifikator == $verifikator->id_verifikator){
            $verifikasi_berkas_lamaran = VerifikasiBerkasLamaran::where('id_berkas_lamaran', $berkas_lamaran->id_berkas_lamaran)->first();
            
            $berkas_lamaran->status = $action;
            $berkas_lamaran->save();

            Session::flash('success-msg', 'Berkas sudah ditindaklanjuti ...');
            return Redirect::to('verifikasi-saya');
        }
    }

}