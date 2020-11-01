<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\PendapatanBank;
use App\Models\PendapatanTunai;
use App\Models\PengeluaranBank;
use App\Models\PengeluaranTunai;
use App\Models\Piutang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        // harian
        // Pendapatan Bank
        $pendapatan_bank = PendapatanBank::whereDay('created_at', date('d'))->sum('jumlah_pendapatan');
        $jumlah_pendapatan_bank = PendapatanBank::whereDay('created_at', date('d'))->count('jumlah_pendapatan');

        // Pendapatan Tunai
        $pendapatan_tunai = PendapatanTunai::whereDay('created_at', date('d'))->sum('jumlah_pendapatan');
        $jumlah_pendapatan_tunai = PendapatanTunai::whereDay('created_at', date('d'))->count('jumlah_pendapatan');
        
        // Piutang
        $pendapatan__piutang_grand_total = Piutang::whereDay('created_at', date('d'))->sum('grand_total');
        $pendapatan_piutang_sisa = Piutang::whereDay('created_at', date('d'))->sum('sisa');
        $pendapatan_piutang = $pendapatan__piutang_grand_total - $pendapatan_piutang_sisa;
        $jumlah_pendapatan_piutang = Piutang::whereDay('created_at', date('d'))->count('grand_total');
        
        // semua laporan bulanan
        $tot_pendapat_bulanan_bank = PendapatanBank::whereMonth('created_at', date('m'))->sum('jumlah_pendapatan');
        $tot_pendapatan_bulanan_tunai = PendapatanTunai::whereMonth('created_at', date('m'))->sum('jumlah_pendapatan');

        $pendapatan__piutang_grand_total = Piutang::whereMonth('created_at', date('m'))->sum('grand_total');
        $pendapatan_piutang_sisa = Piutang::whereMonth('created_at', date('m'))->sum('sisa');
        $jumlah_semua_pendapatan_piutang_bulanan = $pendapatan__piutang_grand_total - $pendapatan_piutang_sisa;

        //Total Pendapatan Bulanan
        $jumlah_semua_pendapatan = $tot_pendapat_bulanan_bank + $tot_pendapatan_bulanan_tunai + $jumlah_semua_pendapatan_piutang_bulanan;


        // harian
        //  Pengeluaran Bank
        $pengeluaran_bank = PengeluaranBank::whereDay('created_at', date('d'))->sum('jumlah_pengeluaran');
        $jumlah_pengeluaran_bank = PengeluaranBank::whereDay('created_at', date('d'))->count('jumlah_pengeluaran');

        // Pengeluaran harian
        $pengeluaran_tunai = PengeluaranTunai::whereDay('created_at', date('d'))->sum('jumlah_pengeluaran');
        $jumlah_pengeluaran_tunai = PengeluaranTunai::whereDay('created_at', date('d'))->count('jumlah_pengeluaran');

        // hutang
        $pengeluaran_hutang_grand_total = Hutang::whereDay('created_at', date('d'))->sum('grand_total');
        $pengeluaran_hutang_sisa = Hutang::whereDay('created_at', date('d'))->sum('sisa');
        $pengeluaran_hutang = $pengeluaran_hutang_grand_total - $pengeluaran_hutang_sisa;
        $jumlah_pengeluaran_hutang = Hutang::whereDay('created_at', date('d'))->count('grand_total');

        // semua laporan pengeluaran bulanan
        $tot_pengeluaran_bulanan_bank = PengeluaranBank::whereMonth('created_at', date('m'))->sum('jumlah_pengeluaran');
        $tot_pengeluaranan_bulanan_tunai = PengeluaranTunai::whereMonth('created_at', date('m'))->sum('jumlah_pengeluaran');

        $pengeluaran_hutang_grand_total = Hutang::whereMonth('created_at', date('m'))->sum('grand_total');
        $pengeluaran_hutang_sisa = Hutang::whereMonth('created_at', date('m'))->sum('sisa');
        $jumlah_semua_pengeluaran_hutang_bulanan = $pengeluaran_hutang_grand_total - $pengeluaran_hutang_sisa;

         //Total Pengeluaran Bulanan
         $jumlah_semua_pengeluaran = $tot_pengeluaran_bulanan_bank + $tot_pengeluaranan_bulanan_tunai + $jumlah_semua_pengeluaran_hutang_bulanan;

        //  Tahunan
        $pendapatan_bank_tahun = PendapatanBank::whereYear('created_at', date('Y'))->sum('jumlah_pendapatan');
        $pendapatan_tunai_tahun = PendapatanTunai::whereYear('created_at', date('Y'))->sum('jumlah_pendapatan');

        $pengeluaran_bank_tahun = PengeluaranBank::whereYear('created_at', date('Y'))->sum('jumlah_pengeluaran');
        $pengeluaran_tunai_tahun = PengeluaranTunai::whereYear('created_at', date('Y'))->sum('jumlah_pengeluaran');

        $pendapatan__piutang_grand_total_tahun = Piutang::whereYear('created_at', date('Y'))->sum('grand_total');
        $pendapatan_piutang_sisa_tahun = Piutang::whereYear('created_at', date('Y'))->sum('sisa');

        $pengeluaran_hutang_grand_total_tahun = Hutang::whereYear('created_at', date('Y'))->sum('grand_total');
        $pengeluaran_hutang_sisa_tahun = Hutang::whereYear('created_at', date('Y'))->sum('sisa');



        return view('admin.dashboard', compact(
        'pendapatan_bank',
        'jumlah_pendapatan_bank',
        'pendapatan_tunai',
        'jumlah_pendapatan_tunai',
        'pendapatan_piutang',
        'jumlah_pendapatan_piutang',
        'jumlah_semua_pendapatan',

        'pengeluaran_bank',
        'jumlah_pengeluaran_bank',
        'pengeluaran_tunai',
        'jumlah_pengeluaran_tunai',
        'pengeluaran_hutang',
        'jumlah_pengeluaran_hutang',
        'jumlah_semua_pengeluaran'
        ));
    }
}