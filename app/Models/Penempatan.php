<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penempatan
 */
class Penempatan extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'penempatan';

    protected $primaryKey = 'id_penempatan';

	public $timestamps = true;

    protected $fillable = [
        'nama_penempatan'
    ];

    protected $guarded = [];

}
