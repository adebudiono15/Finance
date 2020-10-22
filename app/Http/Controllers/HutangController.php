<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryHutang;
use App\Models\Hutang;
use App\Models\HutangLine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'nama_supplier_id' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'nama_supplier_id.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $hutang = Hutang::get();
        $barang = Barang::get();
        $supplier = Supplier::get();
        $kode = rand(11,99);
  
        return view('admin.master.hutang.index', compact('hutang','barang','supplier','kode'));
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
        $this->_validation($request);
        try {
            $tanggal = $request->tanggal;
            $nama = $request->nama;
            $nama_supplier_id = $request->nama_supplier_id;
            $harga = $request->harga;
            $qty = $request->qty;
            $kode_satu = $request->kode_satu;
            $kode_dua = $request->kode_dua;
            $kode_hutang =  $kode_satu.$kode_dua;


            \DB::transaction(function () use ($kode_hutang,$tanggal,$nama_supplier_id,$nama,$harga,$qty) {
                $header = hutang::insertGetId([
                    'kode_hutang' => $kode_hutang,
                    'nama_supplier_id' => $nama_supplier_id,
                    'tanggal' => $tanggal,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]);

                foreach ($nama as $e => $nm) {
                        hutangLine::insert([
                            'hutang' => $header,
                            'barang' => $nm,
                            'harga' => $harga[$e],
                            'qty' => $qty[$e],
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d'),
                            'grand_total' => (int)$qty[$e] * (int) $harga[$e]
                        ]);
                }

                $sum_total = HutangLine::where('hutang', $header)->sum('grand_total');

                hutang::where('id', $header)->update([
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
         $hutang = Hutang::find($id);
         $kode_hutang = $hutang->kode_hutang;
        return view('admin.master.hutang.detail', compact('hutang','kode_hutang'));
    }

    public function update(Request $request, $id){
        try{

            $total_sisa = $request->total_sisa;
            $bayar_sementara = $request->bayar;
            $bayar = str_replace(["." , "Rp", " "], '', $bayar_sementara);
            $id_hutang = $request->id_hutang;
            $kode_hutang = $request->kode_hutang;
           
           $data['sisa'] = $total_sisa - $bayar;
           if ($bayar > $total_sisa) {
               \Session()->flash('lebih');
               return redirect()->back();
           }else{
            hutang::where('id', $id_hutang)->update($data);

            HistoryHutang::insert([
                'hutang' => $id_hutang,
                'kode_hutang' =>$kode_hutang,
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
        DB::table('hutang')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
