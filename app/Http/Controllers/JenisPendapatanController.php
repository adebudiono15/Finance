<?php

namespace App\Http\Controllers;

use App\Models\JenisPendapatan;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class JenisPendapatanController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_jenis_pendapatan' => 'required',
        ],
        [
        'nama_jenis_pendapatan.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $jenis_pendapatan = JenisPendapatan::get();
  
        return view('admin.master.jenis_pendapatan.index', compact('jenis_pendapatan'));
     }

     public function save(Request $request)
   {
       $this->_validation($request);
      $jenis_pendapatan = new JenisPendapatan;
      $jenis_pendapatan->nama_jenis_pendapatan = $request->nama_jenis_pendapatan;
      $jenis_pendapatan->save();
      // dd($bank);
      Session::flash('success');
      return redirect('jenis-pendapatan');
   }

   public function edit($id)
   {
       $jenis_pendapatan = JenisPendapatan::find($id);
       return view('admin.master.jenis_pendapatan.edit', compact('jenis_pendapatan'));
   }

   public function update(Request $request, $id)
   {
      JenisPendapatan::where('id', $id)->update([
           'nama_jenis_pendapatan' => $request->nama_jenis_pendapatan,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('jenis_pendapatan')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
