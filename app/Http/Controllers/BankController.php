<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class BankController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_bank' => 'required',
        ],
        [
        'nama_bank.required' => 'Tidak Boleh Kosong',
        ]);
    }

   public function index (){
      $bank = Bank::get();

      return view('admin.master.bank.index', compact('bank'));
   }

   public function save(Request $request)
   {
    $this->_validation($request);
      $bank = new Bank;
      $bank->nama_bank = $request->nama_bank;
      $bank->save();
      // dd($bank);
      Session::flash('success');
      return redirect('bank');
   }

   public function edit($id)
   {
       $bank = Bank::find($id);
       return view('admin.master.bank.edit', compact('bank'));
   }

   public function update(Request $request, $id)
   {
      Bank::where('id', $id)->update([
           'nama_bank' => $request->nama_bank,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('bank')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
