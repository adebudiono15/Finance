@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pendapatan Bank Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pendapatan_bank,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pendapatan_bank }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pendapatan Tunai Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pendapatan_tunai,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pendapatan_tunai }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pendapatan Piutang Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pendapatan_piutang,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pendapatan_piutang }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Semua Pendapatan Bulan ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($jumlah_semua_pendapatan,0) }}-,</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <hr>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pengeluaran Bank Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pengeluaran_bank,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pengeluaran_bank }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pengeluaran Tunai Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pengeluaran_tunai,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pengeluaran_tunai }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Pengeluaran Hutang Hari ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($pengeluaran_hutang,0) }}-,</b></p>
                                <p class="text-muted mb-0">{{ $jumlah_pengeluaran_hutang }} Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><b>Semua Pengeluaran Bulan ini</b></h5>
                                    <p class="text-muted"></p>
                                </div>
                                <h3 class="text-info fw-bold"></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0"><b>Rp. {{ number_format($jumlah_semua_pengeluaran,0) }}-,</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection