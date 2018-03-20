<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BerkasLamaran
 */
class BerkasLamaran extends Model
{
    use SoftDeletes;
    
    protected $table = 'berkas_lamaran';

    protected $primaryKey = 'id_berkas_lamaran';

	public $timestamps = true;

    protected $fillable = [
        'id_pelamar',
        'id_verifikator',
        'id_penempatan',
        'status',
        'file_foto',
        'file_ktp',
        'file_npwp',
        'file_keterangan_sehat',
        'file_surat_lamaran',
        'file_cv',
        'file_ijazah',
        'file_transkrip',
        'file_skck',
        'file_bebas_narkoba',
        'file_keterangan_pengalaman',
        'file_sertifikat',
        'file_bukan_pns',
        'file_bpjs',
        'file_summary'
    ];

    protected $guarded = [];

}