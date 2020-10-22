<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_divisi' => 'required',
        ],
        [
        'nama_divisi.required' => 'Tidak Boleh Kosong',
        ]);
    }
    
    public function index (){
        $divisi = Divisi::get();
  
        return view('admin.master.divisi.index', compact('divisi'));
     }

     public function save(Request $request)
   {
    $this->_validation($request);
      $divisi = new Divisi;
      $divisi->nama_divisi = $request->nama_divisi;
      $divisi->save();
      // dd($bank);
      Session::flash('success');
      return redirect('divisi');
   }

   public function edit($id)
   {
       $divisi = Divisi::find($id);
       return view('admin.master.divisi.edit', compact('divisi'));
   }

   public function update(Request $request, $id)
   {
      Divisi::where('id', $id)->update([
           'nama_divisi' => $request->nama_divisi,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('divisi')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
