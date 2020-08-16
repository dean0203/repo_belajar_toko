<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orde extends Model
{
    protected $table ='orde';
    public $timestamps = false;

    protected $fillable = ['kode_barang','tgl_pesan','jumlah_pesanan','id_customers'];
}
