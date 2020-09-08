<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orde;
use Illuminate\Support\Facades\Validator;

class OrdeController extends Controller
{
  public function update($id, Request $request)
  {

    $validator=Validator::make($request->all(),
      [
        // 'id_transaksi' => 'required', otomatis ini juga nggak perlu divalidasi lagi
        'kode_barang' => 'required',
        'tgl_pesan' => 'required',
        'jumlah_pesanan' => 'required',
        'id_customers' => 'required'
      ]
    );
    if($validator->fails()){
      return Response()->json($validator->errors());
    }
    $ubah = Orde::where('id_transaksi',$id)->update([
      // 'id_transaksi'=> $request->id_transaksi, ini nggak perlu karena sudah auto increment
      'kode_barang'=>$request->kode_barang,
      'tgl_pesan'=>$request->tgl_pesan,
      'jumlah_pesanan'=>$request->jumlah_pesanan,
      'id_customers'=>$request->id_customers
    ]);
    if ($ubah) {
      return Response()->json(['status'=>1]);
    }
    else {
      return Response()->json(['status'=>0]);
    }
  }
  public function show()
    {
        $data_Orde = Orde::join('customers', 'orde.id_customers', 'customers.id_customers')
                            ->join('product', 'orde.id_transaksi', 'product.id_product')
                            ->select('orde.id_transaksi',
                                     'orde.jumlah_pesanan',
                                     'orde.tgl_pesan',
                                     'product.id_product',
                                     'customers.id_customers',
                                     'customers.nama_customers')
                                     ->get();
        return Response()->json($data_Orde);
    }
  public function detail($id)
   {
        if(order::where('id_transaksi', $id)->exists()){
            $data_orde = orde::join('customers', 'customer.id_customers', 'orde.id_customers')
                                ->where('id_transaksi', '=', $id)
                                ->select('orde.id_transaksi',
                                         'orde.jumlah_pesanan',
                                         'orde.tgl_pesan',
                                         'product.id_barang',
                                         'customers.id_customers',
                                         'customers.nama_customers')
                                ->get();
            return Response()->json($data_orde);
        }
        else{
            return Response()->json(['message' => 'Tidak Ditemukan']);
        }
    }
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
