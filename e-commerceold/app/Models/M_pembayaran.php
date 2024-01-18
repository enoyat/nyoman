<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pembayaran extends Model
{

    use HasFactory;
    protected $table = 'pembayaran';

    #kalau kolom primary keynya bernama id, maka baris dibawah ini boleh diisi, dan boleh juga tidak buat
    protected $primaryKey = 'transaction_id';
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';    

    protected $fillable = [
			'transaction_id',
            'order_id',
			'gross_amount',
			'payment_type',
			'transaction_time',
			'transaction_status',
			'fraud_status',
			'pdf_url',
			'finish_redirect_url',
            'batas_pembayaran',
            'payment_code',
            'permata_va_number',
            'bank',
            'bill_key',
            'va_number',
            'biller_code',
            'bca_va_number',
             'id_user',
            'status'           

    ];

}
