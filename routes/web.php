<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function(){

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Bank
Route::get('bank', 'BankController@index')->name('bank');
Route::post('save-bank', 'BankController@save')->name('save-bank');
Route::get('{id}/edit-bank', 'BankController@edit')->name('edit-bank');
Route::patch('bank/update/{id}', 'BankController@update')->name('update-bank');
Route::delete('bank/{id}', 'BankController@delete')->name('delete-bank');

// Barang
Route::get('barang', 'BarangController@index')->name('barang');
Route::post('save-barang', 'BarangController@save')->name('save-barang');
Route::get('{id}/edit-barang', 'BarangController@edit')->name('edit-barang');
Route::patch('barang/update/{id}', 'BarangController@update')->name('update-barang');
Route::delete('barang/{id}', 'BarangController@delete')->name('delete-barang');

// Divisi
Route::get('divisi', 'DivisiController@index')->name('divisi');
Route::post('save-divisi', 'DivisiController@save')->name('save-divisi');
Route::get('{id}/edit-divisi', 'DivisiController@edit')->name('edit-divisi');
Route::patch('divisi/update/{id}', 'DivisiController@update')->name('update-divisi');
Route::delete('divisi/{id}', 'DivisiController@delete')->name('delete-divisi');

// customer
Route::get('customer', 'CustomerController@index')->name('customer');
Route::post('save-customer', 'CustomerController@save')->name('save-customer');
Route::get('{id}/edit-customer', 'CustomerController@edit')->name('edit-customer');
Route::get('{id}/detail-customer', 'CustomerController@detail')->name('detail-customer');
Route::patch('customer/update/{id}', 'CustomerController@update')->name('update-customer');
Route::delete('customer/{id}', 'CustomerController@delete')->name('delete-customer');

// supplier
Route::get('supplier', 'SupplierController@index')->name('supplier');
Route::post('save-supplier', 'SupplierController@save')->name('save-supplier');
Route::get('{id}/edit-supplier', 'SupplierController@edit')->name('edit-supplier');
Route::get('{id}/detail-supplier', 'SupplierController@detail')->name('detail-supplier');
Route::patch('supplier/update/{id}', 'SupplierController@update')->name('update-supplier');
Route::delete('supplier/{id}', 'SupplierController@delete')->name('delete-supplier');

// Jenis Pengeluaran
Route::get('jenis-pengeluaran', 'JenisPengeluaranController@index')->name('jenis-pengeluaran');
Route::post('save-pengeluaran', 'JenisPengeluaranController@save')->name('save-pengeluaran');
Route::get('{id}/edit-pengeluaran', 'JenisPengeluaranController@edit')->name('edit-pengeluaran');
Route::patch('pengeluaran/update/{id}', 'JenisPengeluaranController@update')->name('update-pengeluaran');
Route::delete('pengeluaran/{id}', 'JenisPengeluaranController@delete')->name('delete-pengeluaran');


// Jenis Pendapatan
Route::get('jenis-pendapatan', 'JenisPendapatanController@index')->name('jenis-pendapatan');
Route::post('save-pendapatan', 'JenisPendapatanController@save')->name('save-pendapatan');
Route::get('{id}/edit-pendapatan', 'JenisPendapatanController@edit')->name('edit-pendapatan');
Route::patch('pendapatan/update/{id}', 'JenisPendapatanController@update')->name('update-pendapatan');
Route::delete('pendapatan/{id}', 'JenisPendapatanController@delete')->name('delete-pendapatan');

// Pendapatan Bank
Route::get('pendapatan-bank', 'PendapatanBankController@index')->name('pendapatan-bank');
Route::post('save-pendapatan-bank', 'PendapatanBankController@save')->name('save-pendapatan-bank');
Route::get('{id}/edit-pendapatan-bank', 'PendapatanBankController@edit')->name('edit-pendapatan-bank');
Route::patch('pendapatan-bank/update/{id}', 'PendapatanBankController@update')->name('update-pendapatan-bank');
Route::delete('pendapatan-bank/{id}', 'PendapatanBankController@delete')->name('delete-pendapatan-bank');
Route::get('{id}/detail-pendapatan-bank', 'PendapatanBankController@detail')->name('detail-pendapatan-bank');

// Pendapatan Tunai
Route::get('pendapatan-tunai', 'PendapatanTunaiController@index')->name('pendapatan-tunai');
Route::post('save-pendapatan-tunai', 'PendapatanTunaiController@save')->name('save-pendapatan-tunai');
Route::get('{id}/edit-pendapatan-tunai', 'PendapatanTunaiController@edit')->name('edit-pendapatan-tunai');
Route::patch('pendapatan-tunai/update/{id}', 'PendapatanTunaiController@update')->name('update-pendapatan-tunai');
Route::delete('pendapatan-tunai/{id}', 'PendapatanTunaiController@delete')->name('delete-pendapatan-tunai');
Route::get('{id}/detail-pendapatan-tunai', 'PendapatanTunaiController@detail')->name('detail-pendapatan-tunai');

// Pengeluaran Bank
Route::get('pengeluaran-bank', 'PengeluaranBankController@index')->name('pengeluaran-bank');
Route::post('save-pengeluaran-bank', 'PengeluaranBankController@save')->name('save-pengeluaran-bank');
Route::get('{id}/edit-pengeluaran-bank', 'PengeluaranBankController@edit')->name('edit-pengeluaran-bank');
Route::patch('pengeluaran-bank/update/{id}', 'PengeluaranBankController@update')->name('update-pengeluaran-bank');
Route::delete('pengeluaran-bank/{id}', 'PengeluaranBankController@delete')->name('delete-pengeluaran-bank');
Route::get('{id}/detail-pengeluaran-bank', 'PengeluaranBankController@detail')->name('detail-pengeluaran-bank');

// Pengeluaran Tunai
Route::get('pengeluaran-tunai', 'PengeluaranTunaiController@index')->name('pengeluaran-tunai');
Route::post('save-pengeluaran-tunai', 'PengeluaranTunaiController@save')->name('save-pengeluaran-tunai');
Route::get('{id}/edit-pengeluaran-tunai', 'PengeluaranTunaiController@edit')->name('edit-pengeluaran-tunai');
Route::patch('pengeluaran-tunai/update/{id}', 'PengeluaranTunaiController@update')->name('update-pengeluaran-tunai');
Route::delete('pengeluaran-tunai/{id}', 'PengeluaranTunaiController@delete')->name('delete-pengeluaran-tunai');
Route::get('{id}/detail-pengeluaran-tunai', 'PengeluaranTunaiController@detail')->name('detail-pengeluaran-tunai');

// get barang
Route::get('barang/ajax/{id}', 'PiutangController@get_barang');

// Piutang
Route::get('piutang', 'PiutangController@index')->name('piutang');
Route::post('save-piutang', 'PiutangController@save')->name('save-piutang');
Route::post('save-barang-piutang', 'PiutangController@barang')->name('save-barang-piutang');
Route::get('{id}/drb-piutang', 'PiutangController@drb')->name('drb-piutang');
Route::put('update-piutang/{id}', 'PiutangController@update');
Route::delete('piutang/{id}', 'PiutangController@delete')->name('delete-piutang');
Route::get('piutang/pdf/{id}', 'PiutangController@pdf');
// Route::get('download-pdf' ,  'PiutangController@pdf')->name('pdf.download');
Route::get('{id}/detail-piutang', 'PiutangController@detail')->name('detail-piutang');

// hutang
Route::get('hutang', 'HutangController@index')->name('hutang');
Route::post('save-hutang', 'HutangController@save')->name('save-hutang');
Route::post('save-barang-hutang', 'HutangController@barang')->name('save-barang-hutang');
Route::get('{id}/drb-hutang', 'HutangController@drb')->name('drb-hutang');
Route::put('update-hutang/{id}', 'HutangController@update');
Route::delete('hutang/{id}', 'HutangController@delete')->name('delete-hutang');
Route::get('{id}/detail-hutang', 'HutangController@detail')->name('detail-hutang');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
