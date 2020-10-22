<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\JenisPendapatan;
use App\Models\PendapatanBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PendapatanBankController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'divisi' => 'required',
        'jenis_pendapatan' => 'required',
        'jumlah_pendapatan' => 'required',
        'bank' => 'required',
        'keterangan' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'divisi.required' => 'Tidak Boleh Kosong',
        'jenis_pendapatan.required' => 'Tidak Boleh Kosong',
        'jumlah_pendapatan.required' => 'Tidak Boleh Kosong',
        'bank.required' => 'Tidak Boleh Kosong',
        'keterangan.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $pendapatan_bank = PendapatanBank::get();
        $jenis_pendapatan = JenisPendapatan::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $kode = rand(11,99);
  
        return view('admin.master.pendapatan_bank.index', compact('pendapatan_bank','jenis_pendapatan','divisi','bank','kode'));
     }

     public function save(Request $request)
   {
       $this->_validation($request);
       try {
        $tanggal = $request->tanggal;
        $jenis_pendapatan = $request->jenis_pendapatan;
        $jumlah_pendapatan_sementara = $request->jumlah_pendapatan;
        $jumlah_pendapatan = str_replace(["." , "Rp", " "], '', $jumlah_pendapatan_sementara);
        $keterangan = $request->keterangan;
        $bank = $request->bank;
        $divisi = $request->divisi;
        $kode_satu = $request->kode_satu;
        $kode_dua = $request->kode_dua;
        $kode_pendapatan_bank =  $kode_satu.$kode_dua;
        
        // dd($request->all());
        PendapatanBank::insert([
            'tanggal' => $tanggal,
            'jenis_pendapatan' => $jenis_pendapatan,
            'jumlah_pendapatan' => $jumlah_pendapatan,
            'keterangan' => $keterangan,
            'bank' => $bank,
            'divisi' => $divisi,
            'kode_pendapatan_bank' => $kode_pendapatan_bank,
            'created_at' =>date('y-m-d h:i:s'),
            'updated_at' =>date('y-m-d h:i:s'),
            ]);

            
        \Session()->flash('success');
        return redirect()->back();
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
   }

   public function edit($id)
   {
        $pendapatan_bank = PendapatanBank::find($id);
        $jenis_pendapatan = JenisPendapatan::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
       return view('admin.master.pendapatan_bank.edit', compact('pendapatan_bank','divisi','bank'));
   }

    public function detail($id)
    {
        $pendapatan_bank = PendapatanBank::find($id);
        return view('admin.master.pendapatan_bank.detail', compact('pendapatan_bank'));
    }

   public function update(Request $request, $id)
   {
      PendapatanBank::where('id', $id)->update([
           'jenis_pendapatan' => $request->jenis_pendapatan,
           'jumlah_pendapatan' => $request->jumlah_pendapatan,
           'keterangan' => $request->keterangan,
           'bank' => $request->bank,
           'divisi' => $request->divisi,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('pendapatan_bank')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
