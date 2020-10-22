<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'nama_customer' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'contact_person' => 'required',
        ],
        [
        'nama_customer.required' => 'Tidak Boleh Kosong',
        'alamat.required' => 'Tidak Boleh Kosong',
        'telepon.required' => 'Tidak Boleh Kosong',
        'contact_person.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $customer = Customer::get();
        $kode_uniq = rand(1111,9999);
  
        return view('admin.master.customer.index', compact('customer','kode_uniq'));
     }

     public function save(Request $request)
   {
    $this->_validation($request);
      $customer = new Customer;
      $customer->kode_customer = $request->kode_customer;
      $customer->nama_customer = $request->nama_customer;
      $customer->alamat = $request->alamat;
      $customer->telepon = $request->telepon;
      $customer->email = $request->email;
      $customer->contact_person = $request->contact_person;
    //   dd($customer);
      $customer->save();
      Session::flash('success');
      return redirect('customer');
   }

   public function edit($id)
   {
       $customer = Customer::find($id);
       return view('admin.master.customer.edit', compact('customer'));
   }

   public function detail($id)
   {
       $customer = Customer::find($id);
       return view('admin.master.customer.detail', compact('customer'));
   }

   public function update(Request $request, $id)
   {
      Customer::where('id', $id)->update([
           'nama_customer' => $request->nama_customer,
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
        DB::table('customer')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
