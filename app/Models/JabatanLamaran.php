<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JabatanLamaran
 */
class JabatanLamaran extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'jabatan_lamaran';

    protected $primaryKey = 'id_jabatan_lamaran';

	public $timestamps = true;

    protected $fillable = [
        'nama'
    ];

    protected $guarded = [];

}
