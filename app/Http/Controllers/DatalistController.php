<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use DB;
use Excel;

use App\Models\BerkasLamaran;
use App\Models\Penempatan;

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
}