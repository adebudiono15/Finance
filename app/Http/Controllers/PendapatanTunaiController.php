<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\JenisPendapatan;
use App\Models\PendapatanTunai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PendapatanTunaiController extends Controller
{
    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'divisi' => 'required',
        'jenis_pendapatan' => 'required',
        'jumlah_pendapatan' => 'required',
        'keterangan' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'divisi.required' => 'Tidak Boleh Kosong',
        'jenis_pendapatan.required' => 'Tidak Boleh Kosong',
        'jumlah_pendapatan.required' => 'Tidak Boleh Kosong',
        'keterangan.required' => 'Tidak Boleh Kosong',
        ]);
    }

        public function index (){
            $pendapatan_tunai = PendapatanTunai::get();
            $jenis_pendapatan = JenisPendapatan::get();
            $divisi = Divisi::get();
            $kode = rand(11,99);
      
            return view('admin.master.pendapatan_tunai.index', compact('pendapatan_tunai','jenis_pendapatan','divisi','kode'));
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
            $divisi = $request->divisi;
            $kode_satu = $request->kode_satu;
            $kode_dua = $request->kode_dua;
            $kode_pendapatan_tunai =  $kode_satu.$kode_dua;
    
            PendapatanTunai::insert([
                'tanggal' => $tanggal,
                'jenis_pendapatan' => $jenis_pendapatan,
                'jumlah_pendapatan' => $jumlah_pendapatan,
                'keterangan' => $keterangan,
                'divisi' => $divisi,
                'kode_pendapatan_tunai' => $kode_pendapatan_tunai,
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
           $pendapatan_tunai = PendapatanTunai::find($id);
           $jenis_pendapatan = JenisPendapatan::get();
           $divisi = Divisi::get();
           return view('admin.master.pendapatan_tunai.edit', compact('pendapatan_tunai','jenis_pendapatan','divisi'));
       }
    
        public function detail($id)
        {
            $pendapatan_tunai = PendapatanTunai::find($id);
            return view('admin.master.pendapatan_tunai.detail', compact('pendapatan_tunai'));
        }
    
       public function update(Request $request, $id)
       {
        PendapatanTunai::where('id', $id)->update([
            'jenis_pendapatan' => $request->jenis_pendapatan,
            'jumlah_pendapatan' => $request->jumlah_pendapatan,
            'keterangan' => $request->keterangan,
            'divisi' => $request->divisi,
       ]);
          Session::flash('update');
           // dd($request->all());
       }
    
       public function delete($id)
        {
            DB::table('pendapatan_tunai')->where('id', $id)->delete();
            Session::flash('delete');
            return redirect()->back();
        }
}
