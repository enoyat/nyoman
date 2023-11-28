<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_order extends Model
{

    use HasFactory;
    protected $table = 'tborder';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'kdorder';
    public $incrementing = false;
    protected $keyType = 'string';  
    
    protected $fillable = [
			'kdorder',
			'tglorder',
            'total',
            'tglverifikasi',
            'tglkirim',
            'tglterima',
            'kdadmin',
            'kdmember',
            'totberat',
            'penerima',
            'alamatpenerima',
            'ongkir',
            'kurir',
            'f_proses',
            'f_status',
            'f_cancel'
    ];
    public function get_detailbarang(){
        return $this->hasMany('App\\Models\\M_detorder', 'kdorder');
    }
    public function get_member(){
        return $this->belongsTo('App\\Models\\M_member', 'kdmember');
    }
    
}
