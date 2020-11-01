<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}">

    <title>{{ $piutang->kode_piutang }}-{{ $piutang->nama_customer_id }}</title>
  </head>
  <body>
     
    <div class="row" style=" margin-bottom:30px;">
        <div class="col-lg-6 text-left">
            <img src="{{ public_path('assets/img/logo.png') }}" width="100px" alt="">
            <p style="font-size: 12px">Jln. Empang No. 12 Bogor Selatan, Kota Bogor</p> 
        </div>
        <div class="col-lg-6 text-right">
            <h6 style="font-size: 20px"><b>INVOICE</b></h6> 
            <h6 style="font-size: 12px">{{ $inv }}</h6>
        </div>
    </div>
    <hr style="margin-top: -80px;">
    <hr style=" margin-bottom:30px;">
    <div class="row" style="margin-top: -80px;">
        <div class="col-lg-4 text-right">
            <h6>ID Transaksi</h6>
            <h6>{{ $piutang->kode_piutang }}</h6>
        </div>
        <div class="col-lg-4 text-center">
            <h6>Tanggal</h6>
            <h6>{{ date('d F Y', strtotime ($piutang->tanggal)) }}</h6>
        </div>
        <div class="col-lg-4 text-left">
            <h6>Nama Customer</h6>
            <h6>{{ $piutang->nama_customer_id }}</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>NO</th>
                            <th class="text-center">NAMA BARANG</th>
                            <th class="text-center">HARGA</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($piutang->lines as $e=> $item)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $item->barangs->nama_barang }}</td>
                            <td class="text-right">{{ number_format($item->harga,0) }}</td>
                            <td class="text-center">{{ $item->qty }}</td>
                            <td class="text-right">{{ number_format($item->grand_total,0) }}</td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="float-right" style="font-size: 13px"><b>Grand Total : Rp. {{ number_format($piutang->grand_total,0) }}</b></p>
        </div>
    </div>
    <hr style="margin-top: 30px; margin-bottom: 50px;">

    <div class="row">
        <div class="col-md-12  text-center">
            <h6>RIWAYAT TRANSAKSI PEMBAYARAN</h6> 
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>NO</th>
                            <th>JUMLAH BAYAR</th>
                            <th>TANGGAL BAYAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($piutang->riwayat as $e=> $item)
                        <tr>
                            <td>
                               {{ $e+1 }}
                            </td>
                            <td>
                               Rp. {{ number_format($item->total_pembayaran,0) }}
                            </td>
                            <td>
                                {{ date('d F Y ', strtotime ($piutang->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12  text-center">
            <h6>STATUS TAGIHAN</h6> 
        </div>
    </div>

    @if ($piutang->sisa > 1)
    <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-12  text-center">
            <h6>SISA Rp. {{ number_format($piutang->sisa,0) }}</h6> 
        </div>
    </div>
    <div class="row">
        <div class="class col-lg-6">
            <h6  style="font-size: 12px">No. Rekening :</h6>
            <h6 style="font-size: 12px">BCA 0952923127</h6>
            <h6 style="font-size: 12px">BRI 090901027215533</h6>
            <h6 style="font-size: 12px">BNI 0336029133</h6>
            <h6 style="font-size: 12px">MANDIRI 1330021120084</h6>
            <h6 style="font-size: 12px">a/n Syarif Salim Bahana</h6>
        </div>
        <div class="class col-lg-6 text-right">
            <h6 style="font-size: 12px; margin-top:70px;">{{ $inv }}</h6>
            <h6 style="font-size: 12px">DIDIN MUHIDIN</h6>
        </div>
    </div>
    @endif

    @if ($piutang->sisa == 0)
    <div class="row">
        <div class="col-md-12  text-center">
            <h6>LUNAS</h6> 
        </div>
    </div>
    @endif

  </body>
</html>