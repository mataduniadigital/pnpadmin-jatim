<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pelamar
 */
class Pelamar extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'pelamar';

    protected $primaryKey = 'id_pelamar';

	public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'email',
        'password'
    ];

    protected $guarded = [];

}