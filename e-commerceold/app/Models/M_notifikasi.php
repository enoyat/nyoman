<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_notifikasi extends Model
{

    use HasFactory;
    protected $table = 'notifikasi';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'id';
    
    protected $fillable = [
			'id',
            'tglnotifikasi',
            'kdmember',            
			'kdorder',
            'isinotifikasi',
            'f_baca',
            'f_admbaca'
    ];
    
}
