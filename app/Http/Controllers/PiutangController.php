<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\HistoryPiutang;
use App\Models\Piutang;
use App\Models\PiutangLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Session;

class PiutangController extends Controller
{
    public function index (){
        $piutang = Piutang::get();
        $barang = Barang::get();
        $customer = Customer::get();
        $kode = rand(11,99);
  
        return view('admin.master.piutang.index', compact('piutang','barang','customer','kode'));
     }

     public function get_barang($id)
     {
         $item = Barang::where('id', $id)->first();
 
         return response()->json([
             'data' => $item
         ]);
     }

     public function save(Request $request)
    {
        try {
            $tanggal = $request->tanggal;
            $nama = $request->nama;
            $nama_customer_id = $request->nama_customer_id;
            $harga = $request->harga;
            $qty = $request->qty;
            $kode_satu = $request->kode_satu;
            $kode_dua = $request->kode_dua;
            $kode_piutang =  $kode_satu.$kode_dua;


            \DB::transaction(function () use ($kode_piutang,$tanggal,$nama_customer_id,$nama,$harga,$qty) {
                $header = Piutang::insertGetId([
                    'kode_piutang' => $kode_piutang,
                    'nama_customer_id' => $nama_customer_id,
                    'tanggal' => $tanggal,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]);

                foreach ($nama as $e => $nm) {
                        PiutangLine::insert([
                            'piutang' => $header,
                            'barang' => $nm,
                            'harga' => $harga[$e],
                            'qty' => $qty[$e],
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d'),
                            'grand_total' => (int)$qty[$e] * (int) $harga[$e]
                        ]);
                }

                $sum_total = PiutangLine::where('piutang', $header)->sum('grand_total');

                Piutang::where('id', $header)->update([
                    'barang' => $nama,
                    'grand_total' => $sum_total,
                    'sisa' => $sum_total,
                ]);
            });

            \Session()->flash('success', 'Berhasil Melakukan Transaksi');
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }

        // dd($request->all());
        return redirect()->back();
        
    }

    public function drb($id)
    {
         $piutang = Piutang::find($id);
         $kode_piutang = $piutang->kode_piutang;
        return view('admin.master.piutang.detail', compact('piutang','kode_piutang'));
    }

    public function update(Request $request, $id){
        try{

            $total_sisa = $request->total_sisa;
            $bayar_sementara = $request->bayar;
            $bayar = str_replace(["." , "Rp", " "], '', $bayar_sementara);
            $id_piutang = $request->id_piutang;
            $kode_piutang = $request->kode_piutang;
           
           $data['sisa'] = $total_sisa - $bayar;
           if ($bayar > $total_sisa) {
               \Session()->flash('lebih');
               return redirect()->back();
           }else{
            Piutang::where('id', $id_piutang)->update($data);

            HistoryPiutang::insert([
                'piutang' => $id_piutang,
                'kode_piutang' =>$kode_piutang,
                'total_pembayaran' =>  $bayar,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
            // dd($request->all());
            \Session()->flash('update');
           }
            

        }catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('piutang')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
