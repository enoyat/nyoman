<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_member extends Model
{

    use HasFactory;
    protected $table = 'member';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'kdmember';
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';    

    protected $fillable = [
			'kdmember',
			'namamember',
			'alamat',
			'email',
			'nohp',
			'aktif',
			'pwd',
			'groupuser'
    ];
}
