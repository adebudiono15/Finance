<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\JenisPengeluaran;
use App\Models\PengeluaranBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PengeluaranBankController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'divisi' => 'required',
        'jenis_pengeluaran' => 'required',
        'bank' => 'required',
        'jumlah_pengeluaran' => 'required',
        'keterangan' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'divisi.required' => 'Tidak Boleh Kosong',
        'jenis_pengeluaran.required' => 'Tidak Boleh Kosong',
        'bank.required' => 'Tidak Boleh Kosong',
        'jumlah_pengeluaran.required' => 'Tidak Boleh Kosong',
        'keterangan.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $pengeluaran_bank = PengeluaranBank::get();
        $jenis_pengeluaran = JenisPengeluaran::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $kode = rand(11,99);
  
        return view('admin.master.pengeluaran_bank.index', compact('pengeluaran_bank','jenis_pengeluaran','divisi','bank','kode'));
     }

     public function save(Request $request)
   {
        $this->_validation($request);
        try {
        $tanggal = $request->tanggal;
        $jenis_pengeluaran = $request->jenis_pengeluaran;
        $jumlah_pengeluaran_sementara = $request->jumlah_pengeluaran;
        $jumlah_pengeluaran = str_replace(["." , "Rp", " "], '', $jumlah_pengeluaran_sementara);
        $keterangan = $request->keterangan;
        $bank = $request->bank;
        $divisi = $request->divisi;
        $kode_satu = $request->kode_satu;
        $kode_dua = $request->kode_dua;
        $kode_pengeluaran_bank =  $kode_satu.$kode_dua;

        PengeluaranBank::insert([
            'tanggal' => $tanggal,
            'jenis_pengeluaran' => $jenis_pengeluaran,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'keterangan' => $keterangan,
            'bank' => $bank,
            'divisi' => $divisi,
            'kode_pengeluaran_bank' => $kode_pengeluaran_bank,
            'created_at' =>date('y-m-d h:i:s'),
            'updated_at' =>date('y-m-d h:i:s'),
            ]);
            // dd($request->all());

            
        \Session()->flash('success');
        return redirect()->back();
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
   }

   public function edit($id)
   {
       $pengeluaran_bank = PengeluaranBank::find($id);
       $jenis_pengeluaran = JenisPengeluaran::get();
       $divisi = Divisi::get();
       $bank = Bank::get();
       return view('admin.master.pengeluaran_bank.edit', compact('pengeluaran_bank','jenis_pengeluaran','divisi','bank'));
   }

    public function detail($id)
    {
        $pengeluaran_bank = PengeluaranBank::find($id);
        return view('admin.master.pengeluaran_bank.detail', compact('pengeluaran_bank'));
    }

   public function update(Request $request, $id)
   {
      PengeluaranBank::where('id', $id)->update([
           'jenis_pengeluaran' => $request->jenis_pengeluaran,
           'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
           'bank' => $request->bank,
           'divisi' => $request->divisi,
      ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('pengeluaran_bank')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
