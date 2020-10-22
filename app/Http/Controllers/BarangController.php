<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;

class BarangController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_barang' => 'required',
        'harga' => 'required',
        ],
        [
        'nama_barang.required' => 'Tidak Boleh Kosong',
        'harga.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $barang = Barang::get();
  
        return view('admin.master.barang.index', compact('barang'));
     }

     public function save(Request $request)
   {
        $this->_validation($request);
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $harga = $request->harga;
        $barang->harga = str_replace(["." , "Rp", " "], '', $harga);
      
    //   dd($barang);
      $barang->save();
      Session::flash('success');
      return redirect('barang');
   }

   public function edit($id)
   {
       $barang = Barang::find($id);
       return view('admin.master.barang.edit', compact('barang'));
   }

   public function update(Request $request, $id)
   {
      barang::where('id', $id)->update([
           'nama_barang' => $request->nama_barang,
           'harga' => $request->harga,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
