    <input type="hidden" name="id" value="{{ $piutang->id }}" id="id_data" />
    {{-- detail --}}
    <div class="row">
        <div class="col-md-12  text-center">
            <h5><b>DETAIL TRANSAKSI</b></h5> 
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>ID TRANSAKSI</b></h6>
            <h6>{{ $piutang->kode_piutang }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>TANGGAL</b></h6>
            <h6>{{ date('d F Y', strtotime ($piutang->tanggal)) }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>NAMA CUSTOMER</b></h6>
            <h6>{{ $piutang->nama_customer_id }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>NO</th>
                            <th>NAMA BARANG</th>
                            <th>HARGA</th>
                            <th>QTY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($piutang->lines as $e=> $item)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $item->barangs->nama_barang }}</td>
                            <td class="text-right">{{ number_format($item->harga,0) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td class="text-right">{{ number_format($item->grand_total,0) }}</td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="float-right"><small>Grand Total : </small><b>Rp. {{ number_format($piutang->grand_total,0) }}</b></p>
        </div>
    </div>
    {{-- last detail --}}
<hr>
<hr>
    {{-- riwayat --}}
    <div class="row mt-5">
        <div class="col-md-12  text-center">
            <h5><b>RIWAYAT TRANSAKSI PEMBAYARAN SISA</b></h5> 
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
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
   
    {{-- last riwayat --}}
    <hr>
    <hr>
    {{-- bayar --}}
    @if ($piutang->sisa > 1)
    <div class="row mt-5">
        <div class="col-md-12  text-center">
            <h5><b>PEMBAYARAN BAYAR SISA</b></h5> 
        </div>
    </div>

    <form action="{{ url('update-piutang/'.$piutang->id) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center" style="width: 250px;">
                            <span class="stamp stamp-lg bg-danger mr-3 mb-4">
                                <small><b>SISA Rp. {{ number_format($piutang->sisa,0) }}</b></small>
                            </span>
                            <input type="text" class="form-control form-control-sm" id="rupiah" name="bayar">
                            <input type="hidden" name="id_piutang" value="{{ $piutang->id }}">
                            <input type="hidden" name="kode_piutang" value="{{ $kode_piutang }}">
                            <input type="hidden" name="total_sisa" value="{{ $piutang->sisa }}">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-sm btn-info mt-4"  style="height:28px">
                            Update Data Sisa
                        </button>
                    </div>
                </div>
    </form>

    @endif
    {{-- last bayar --}}
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
    
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa             = split[0].length % 3,
        rupiah             = split[0].substr(0, sisa),
        ribuan             = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>