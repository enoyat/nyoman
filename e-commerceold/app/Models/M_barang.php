<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_barang extends Model
{

    use HasFactory;
    protected $table = 'barang';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'kdbarang';
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';    

    protected $fillable = [
			'kdbarang',
			'namabarang',
			'deskripsi',
			'foto',
			'hargabeli',
			'hargajual',
			'kdkategori',
			'stok'
    ];
    public function get_kategori(){
        return $this->belongsTo('App\\Models\\M_kategori', 'kdkategori');
    }
    public function get_foto(){
        return $this->hasMany('App\\Models\\M_fotobarang', 'kdbarang');
    }
}
