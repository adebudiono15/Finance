<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\JenisPengeluaran;
use App\Models\PengeluaranTunai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PengeluaranTunaiController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'divisi' => 'required',
        'jenis_pengeluaran' => 'required',
        'jumlah_pengeluaran' => 'required',
        'keterangan' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'divisi.required' => 'Tidak Boleh Kosong',
        'jenis_pengeluaran.required' => 'Tidak Boleh Kosong',
        'jumlah_pengeluaran.required' => 'Tidak Boleh Kosong',
        'keterangan.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $pengeluaran_tunai = PengeluaranTunai::get();
        $jenis_pengeluaran = JenisPengeluaran::get();
        $divisi = Divisi::get();
        $kode = rand(11,99);
  
        return view('admin.master.pengeluaran_tunai.index', compact('pengeluaran_tunai','jenis_pengeluaran','divisi','kode'));
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
        $divisi = $request->divisi;
        $kode_satu = $request->kode_satu;
        $kode_dua = $request->kode_dua;
        $kode_pengeluaran_tunai =  $kode_satu.$kode_dua;

        PengeluaranTunai::insert([
            'tanggal' => $tanggal,
            'jenis_pengeluaran' => $jenis_pengeluaran,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'keterangan' => $keterangan,
            'divisi' => $divisi,
            'kode_pengeluaran_tunai' => $kode_pengeluaran_tunai,
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
        $pengeluaran_tunai = PengeluaranTunai::find($id);
        $jenis_pengeluaran = JenisPengeluaran::get();
        $divisi = Divisi::get();
       return view('admin.master.pengeluaran_tunai.edit', compact('pengeluaran_tunai','jenis_pengeluaran','divisi'));
   }

    public function detail($id)
    {
        $pengeluaran_tunai = PengeluaranTunai::find($id);
        return view('admin.master.pengeluaran_tunai.detail', compact('pengeluaran_tunai'));
    }

   public function update(Request $request, $id)
   {
    PengeluaranTunai::where('id', $id)->update([
        'jenis_pengeluaran' => $request->jenis_pengeluaran,
        'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
        'divisi' => $request->divisi,
        'keterangan' => $request->keterangan,
   ]);
      Session::flash('update');
       // dd($request->all());
   }

   public function delete($id)
    {
        DB::table('pengeluaran_tunai')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
