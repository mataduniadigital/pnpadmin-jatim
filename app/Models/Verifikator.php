<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Verifikator
 */
class Verifikator extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'verifikator';

    protected $primaryKey = 'id_verifikator';

	public $timestamps = true;

    protected $fillable = [
        'nama',
        'nomor_verifikator',
        'password',
    ];

    protected $guarded = [];

}