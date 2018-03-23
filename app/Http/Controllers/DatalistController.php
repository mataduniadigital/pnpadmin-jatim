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
use App\Models\Penempatan;
use App\Models\VerifikasiBerkasLamaran;

use Yajra\DataTables\Facades\DataTables;

class DatalistController extends BaseController
{
	public function berkasNotVerif(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        if(!empty($request->input('start'))){
            $start = $request->input('start');
        }else{
            $start = 0;
        }

        if(!empty($request->input('length'))){
            $length = $request->input('length');
        }else{
            $length = 10;
        }

        $list_berkas = BerkasLamaran::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 
                                            'id_berkas_lamaran', 
                                            'pelamar.nama_lengkap', 
                                            'penempatan.nama_penempatan',
                                            'berkas_lamaran.created_at')
                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                        ->where('status', 1)->whereNull('id_verifikator')->get();
        
        $total_records = BerkasLamaran::select(DB::raw('count(id_berkas_lamaran) as total'))
                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                        ->where('status', 1)->whereNull('id_verifikator')->first();

        return Datatables::of($list_berkas)
                ->editColumn('nama_lengkap', function($item){
                    return ucwords(strtolower($item->nama_lengkap));
                })
                ->editColumn('created_at', function($item){
                    return $item->created_at->format('j M Y H:i').' WIB';
                })
                ->addColumn('action', function($item){
                    $data = array(
                        'id' => $item->id_berkas_lamaran
                    );
                    return $data;
                })
                ->setTotalRecords($total_records->total)
                ->make(true);
    }

    public function listPelamar(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        if(!empty($request->input('start'))){
            $start = $request->input('start');
        }else{
            $start = 0;
        }

        if(!empty($request->input('length'))){
            $length = $request->input('length');
        }else{
            $length = 10;
        }

        $list_pelamar = Pelamar::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 
                                            'pelamar.nik', 
                                            'pelamar.nama_lengkap', 
                                            'berkas_lamaran.status',
                                            'berkas_lamaran.id_berkas_lamaran')
                        ->join('berkas_lamaran', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->get();
        
        $total_records = $list_pelamar->count();

        return Datatables::of($list_pelamar)
                ->editColumn('nama_lengkap', function($item){
                    return ucwords(strtolower($item->nama_lengkap));
                })
                ->setTotalRecords($total_records)
                ->make(true);
    }
    
	public function berkasProses(Request $request){
        $verifikator = Auth::user();
        DB::statement(DB::raw('set @rownum=0'));
        if(!empty($request->input('start'))){
            $start = $request->input('start');
        }else{
            $start = 0;
        }

        if(!empty($request->input('length'))){
            $length = $request->input('length');
        }else{
            $length = 10;
        }

        $list_berkas = BerkasLamaran::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 
                                            'id_berkas_lamaran', 
                                            'pelamar.nama_lengkap', 
                                            'penempatan.nama_penempatan',
                                            'status',
                                            'berkas_lamaran.created_at')
                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                        ->where('id_verifikator', $verifikator->id_verifikator)->get();
        
        $total_records = BerkasLamaran::select(DB::raw('count(id_berkas_lamaran) as total'))
                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                        ->where('id_verifikator', $verifikator->id_verifikator)->first();

        return Datatables::of($list_berkas)
                ->editColumn('nama_lengkap', function($item){
                    return ucwords(strtolower($item->nama_lengkap));
                })
                ->editColumn('created_at', function($item){
                    return $item->created_at->format('j M Y H:i').' WIB';
                })
                ->addColumn('action', function($item){
                    $data = array(
                        'id' => $item->id_berkas_lamaran,
                        'status' => $item->status
                    );
                    return $data;
                })
                ->setTotalRecords($total_records->total)
                ->make(true);
    }

	public function listBerkas(Request $request){
        $verifikator = Auth::user();
        DB::statement(DB::raw('set @rownum=0'));
        if(!empty($request->input('start'))){
            $start = $request->input('start');
        }else{
            $start = 0;
        }

        if(!empty($request->input('length'))){
            $length = $request->input('length');
        }else{
            $length = 10;
        }

        $list_berkas = VerifikasiBerkasLamaran::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 
                                            'berkas_lamaran.id_berkas_lamaran', 
                                            'berkas_lamaran.status', 
                                            'pelamar.nik', 
                                            'pelamar.nama_lengkap', 
                                            'penempatan.nama_penempatan',
                                            'verifikasi_berkas_lamaran.file_foto',
                                            'verifikasi_berkas_lamaran.file_ktp',
                                            'verifikasi_berkas_lamaran.file_npwp',
                                            'verifikasi_berkas_lamaran.file_keterangan_sehat',
                                            'verifikasi_berkas_lamaran.file_surat_lamaran',
                                            'verifikasi_berkas_lamaran.file_cv',
                                            'verifikasi_berkas_lamaran.file_ijazah',
                                            'verifikasi_berkas_lamaran.file_transkrip',
                                            'verifikasi_berkas_lamaran.file_skck',
                                            'verifikasi_berkas_lamaran.file_bebas_narkoba',
                                            'verifikasi_berkas_lamaran.file_keterangan_pengalaman',
                                            'verifikasi_berkas_lamaran.file_sertifikat',
                                            'verifikasi_berkas_lamaran.file_bukan_pns',
                                            'verifikasi_berkas_lamaran.file_bpjs',
                                            'verifikasi_berkas_lamaran.file_summary',
                                            DB::raw('in1.nilai as nilai1'),
                                            DB::raw('in2.nilai as nilai2'),
                                            DB::raw('in3.nilai as nilai3'),
                                            DB::raw('in4.nilai as nilai4'),
                                            'berkas_lamaran.created_at',
                                            DB::raw('(in1.nilai + in2.nilai + in3.nilai + in4.nilai) as total_nilai'))
                        ->join('berkas_lamaran', 'berkas_lamaran.id_berkas_lamaran', '=', 'verifikasi_berkas_lamaran.id_berkas_lamaran')
                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                        ->join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                        ->join(DB::raw('option_index_nilai as in1'), 'in1.id_option_index_nilai', '=', 'verifikasi_berkas_lamaran.index_nilai_1')
                        ->join(DB::raw('option_index_nilai as in2'), 'in2.id_option_index_nilai', '=', 'verifikasi_berkas_lamaran.index_nilai_2')
                        ->join(DB::raw('option_index_nilai as in3'), 'in3.id_option_index_nilai', '=', 'verifikasi_berkas_lamaran.index_nilai_3')
                        ->join(DB::raw('option_index_nilai as in4'), 'in4.id_option_index_nilai', '=', 'verifikasi_berkas_lamaran.index_nilai_4')
                        ->whereIn('status', [10, 11]);

        if(!empty($request->input('penempatan'))){
            $list_berkas->where('berkas_lamaran.id_penempatan', $request->input('penempatan'));
        }
        
        if(!empty($request->input('jabatan'))){
            $list_berkas->where('berkas_lamaran.id_jabatan_lamaran', $request->input('jabatan'));
        }

        $list_berkas->orderByDesc('total_nilai')->get();
        
        $total_records = $list_berkas->count();

        return Datatables::of($list_berkas)
                ->editColumn('nama_lengkap', function($item){
                    return ucwords(strtolower($item->nama_lengkap));
                })
                ->editColumn('created_at', function($item){
                    return $item->created_at->format('j M Y H:i').' WIB';
                })
                ->addColumn('action', function($item){
                    $data = array(
                        'id' => $item->id_berkas_lamaran,
                        'status' => $item->status
                    );
                    return $data;
                })
                ->setTotalRecords($total_records)
                ->make(true);
    }
}