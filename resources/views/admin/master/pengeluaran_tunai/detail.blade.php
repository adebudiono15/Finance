    <input type="hidden" name="id" value="{{ $pengeluaran_tunai->id }}" id="id_data" />
    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>KODE TRANSAKSI</b></h6>
            <h6>{{ $pengeluaran_tunai->kode_pengeluaran_tunai }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>TANGGAL</b></h6>
            <h6>{{ date('d F Y', strtotime ($pengeluaran_tunai->tanggal)) }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>JENIS PENGELUARAN</b></h6>
            <h6>{{ $pengeluaran_tunai->jenis_pengeluaran }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>JUMLAH PENGELUARAN</b></h6>
            <h6>Rp. {{ number_format($pengeluaran_tunai->jumlah_pengeluaran,0) }},-</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>DIVISI</b></h6>
            <h6>{{ $pengeluaran_tunai->divisi }}</h6>
        </div>
        <div class="col-md-6 mt-3">
            <h6><b>KETERANGAN</b></h6>
            <h6>{{ $pengeluaran_tunai->keterangan }}</h6>
        </div>
    </div>
