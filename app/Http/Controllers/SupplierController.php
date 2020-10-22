<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_supplier' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'contact_person' => 'required',
        ],
        [
        'nama_supplier.required' => 'Tidak Boleh Kosong',
        'alamat.required' => 'Tidak Boleh Kosong',
        'telepon.required' => 'Tidak Boleh Kosong',
        'contact_person.required' => 'Tidak Boleh Kosong',
        ]);
    }
    
    public function index (){
        $supplier = Supplier::get();
        $kode_uniq = rand(1111,9999);
  
        return view('admin.master.supplier.index', compact('supplier','kode_uniq'));
     }

     public function save(Request $request)
   {
    $this->_validation($request);
      $supplier = new Supplier;
      $supplier->kode_supplier = $request->kode_supplier;
      $supplier->nama_supplier = $request->nama_supplier;
      $supplier->alamat = $request->alamat;
      $supplier->telepon = $request->telepon;
      $supplier->email = $request->email;
      $supplier->contact_person = $request->contact_person;
    //   dd($supplier);
      $supplier->save();
      Session::flash('success');
      return redirect('supplier');
   }

   public function edit($id)
   {
       $supplier = Supplier::find($id);
       return view('admin.master.supplier.edit', compact('supplier'));
   }

   public function detail($id)
   {
       $supplier = Supplier::find($id);
       return view('admin.master.supplier.detail', compact('supplier'));
   }

   public function update(Request $request, $id)
   {
         Supplier::where('id', $id)->update([
           'nama_supplier' => $request->nama_supplier,
           'alamat' => $request->alamat,
           'telepon' => $request->telepon,
           'email' => $request->email,
           'contact_person' => $request->contact_person,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('supplier')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
