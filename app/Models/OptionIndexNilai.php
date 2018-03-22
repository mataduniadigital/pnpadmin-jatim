<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OptionIndexNilai
 */
class OptionIndexNilai extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'option_index_nilai';

    protected $primaryKey = 'id_option_index_nilai';

	public $timestamps = true;

    protected $fillable = [
        'tipe',
        'text',
        'nilai'
    ];

    protected $guarded = [];

}
