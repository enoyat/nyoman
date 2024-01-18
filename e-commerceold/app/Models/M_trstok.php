<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_trstok extends Model
{

    use HasFactory;
    protected $table = 'trstok';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'id';

    protected $fillable = [
 			'tgltransaksi',
			'kdbarang',
			'qty',
			'harga',
			'jumlah'
    ];
    public function get_barang(){
        return $this->belongsTo('App\\Models\\M_barang', 'kdbarang');
    }
}
