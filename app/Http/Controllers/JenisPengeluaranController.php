<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_jenis_pengeluaran' => 'required',
        ],
        [
        'nama_jenis_pengeluaran.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $jenis_pengeluaran = JenisPengeluaran::get();
  
        return view('admin.master.jenis_pengeluaran.index', compact('jenis_pengeluaran'));
     }

     public function save(Request $request)
    {
        $this->_validation($request);
      $jenis_pengeluaran = new JenisPengeluaran;
      $jenis_pengeluaran->nama_jenis_pengeluaran = $request->nama_jenis_pengeluaran;
      $jenis_pengeluaran->save();
      // dd($bank);
      Session::flash('success');
      return redirect('jenis-pengeluaran');
   }

   public function edit($id)
   {
       $jenis_pengeluaran = JenisPengeluaran::find($id);
       return view('admin.master.jenis_pengeluaran.edit', compact('jenis_pengeluaran'));
   }

   public function update(Request $request, $id)
   {
      JenisPengeluaran::where('id', $id)->update([
           'nama_jenis_pengeluaran' => $request->nama_jenis_pengeluaran,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('jenis_pengeluaran')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
