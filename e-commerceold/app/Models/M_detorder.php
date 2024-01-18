<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_detorder extends Model
{

    use HasFactory;
    protected $table = 'detorder';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'kdetorder';

    protected $fillable = [
            'kdorder',
            'kdbarang',
            'qty',
            'harga',
            'jumlah',
            'f_header'
    ];
    public function get_order(){
        return $this->belongsTo('App\\Models\\M_order', 'kdorder');
    }
}
