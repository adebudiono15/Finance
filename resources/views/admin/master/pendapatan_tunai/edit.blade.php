<input type="hidden" name="id" value="{{ $pendapatan_tunai->id }}" id="id_data" />
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="tanggal" @error('tanggal') class="text-danger" @enderror>TANGGAL @error('tanggal')
                | {{ $message }}
                @enderror</label>
                <input type="text" class="form-control form-control-sm" value="{{ date('d F Y', strtotime ($pendapatan_tunai->tanggal)) }}" placeholder="Small Input">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="divisi" @error('divisi') class="text-danger" @enderror>DIVISI @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <select id="editdivisi" name="divisi" class="js-states form-control" style="width: 100%">
                    <option value="{{ $pendapatan_tunai->divisi }}">{{ $pendapatan_tunai->divisi }}</option>
                   @foreach ($divisi as $item)
                    <option value="{{ $item->nama_divisi }}">{{ $item->nama_divisi }}</option>
                   @endforeach
                </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="pengeluaran" @error('pengeluaran') class="text-danger" @enderror>NAMA JENIS PENDAPATAN @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <select id="editjenis_pendapatan" name="jenis_pendapatan" class="js-states form-control" style="width: 100%">
                    <option value="{{ $pendapatan_tunai->jenis_pendapatan }}">{{ $pendapatan_tunai->jenis_pendapatan }}</option>
                   {{-- @foreach ($jenis_pendapatan as $item) --}}
                   <option value=""></option>
                    <option value="Penjualan Tunai">Penjualan Tunai</option>
                    <option value="Pendapatan Lain-lain">Pendapatan Lain-lain</option>
                    <option value="Pendapatan Piutang">Pendapatan Piutang</option>
                   {{-- @endforeach --}}
                </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="jumlah_pendapatan" @error('jumlah_pendapatan') class="text-danger" @enderror>JUMLAH PENDAPATAN @error('tanggal')
                | {{ $message }}
                @enderror</label>
                <input type="number" class="form-control form-control-sm" value="{{ $pendapatan_tunai->jumlah_pendapatan }}" name="jumlah_pendapatan" id="smallInput" placeholder="-">
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="keterangan" @error('keterangan') class="text-danger" @enderror>KETERANGAN @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <input type="text" class="form-control form-control-sm" value="{{ $pendapatan_tunai->keterangan }}" name="keterangan" id="smallInput" placeholder="-">
        </div>
    </div>
</div>

<script>
$("#editjenis_pendapatan").select2({
    placeholder: "Pilih Jenis Pendapatan",
    allowClear: true
});
 $("#editdivisi").select2({
    placeholder: "Pilih Divisi",
    allowClear: true
});
</script>