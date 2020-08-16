<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orde;
use Illuminate\Support\Facades\Validator;

class OrdeController extends Controller
{
  public function store(Request $request)
  {
    $validator=Validator::make($request->all(),
    [
      'kode_barang' => 'required',
      'tgl_pesan' => 'required',
      'jumlah_pesanan' => 'required',
      'id_customers' => 'required'
    ]
    );

    if ($validator->fails()) {
      return Response()-> json($validator->errors());
    }
  $simpan = Orde::create([
    'kode_barang' => $request->kode_barang,
    'tgl_pesan' => $request->tgl_pesan,
    'jumlah_pesanan' => $request->jumlah_pesanan,
    'id_customers' => $request->id_customers
  ]);
  if ($simpan) {
    return Response()->json(['status'=>1]);
  }
  else {
    return Response()->json(['status'=>0]);
  }
  }
}
