<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
  protected $table = 'Customers';
  public $timestamps = false;

  protected $fillable = ['nama_customers', 'alamat', 'provinsi', 'nomor_hp'] ;
}
