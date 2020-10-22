<input type="hidden" name="id" value="{{ $pengeluaran_bank->id }}" id="id_data" />
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="tanggal" @error('tanggal') class="text-danger" @enderror>TANGGAL @error('tanggal')
                | {{ $message }}
                @enderror</label>
                <input type="text" readonly class="form-control form-control-sm" value="{{ date('d F Y', strtotime ($pengeluaran_bank->tanggal)) }}" placeholder="Small Input">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="divisi" @error('divisi') class="text-danger" @enderror>DIVISI @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <select id="editdivisi" name="divisi" class="js-states form-control" style="width: 100%">
                    <option value="{{ $pengeluaran_bank->divisi }}">{{ $pengeluaran_bank->divisi }}</option>
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
            <label for="pengeluaran" @error('pengeluaran') class="text-danger" @enderror>NAMA JENIS PENGELUARAN @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <select id="editjenis_pengeluaran" name="jenis_pengeluaran" class="js-states form-control" style="width: 100%">
                    <option value="{{ $pengeluaran_bank->jenis_pengeluaran }}">{{ $pengeluaran_bank->jenis_pengeluaran }}</option>
                   @foreach ($jenis_pengeluaran as $item)
                    <option value="{{ $item->nama_jenis_pengeluaran }}">{{ $item->nama_jenis_pengeluaran }}</option>
                   @endforeach
                </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="jumlah_pengeluaran" @error('jumlah_pengeluaran') class="text-danger" @enderror>JUMLAH PENGELUARAN @error('tanggal')
                | {{ $message }}
                @enderror</label>
                <input type="number" class="form-control form-control-sm" value="{{ $pengeluaran_bank->jumlah_pengeluaran }}" name="jumlah_pengeluaran" id="smallInput" placeholder="-">
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="bank" @error('bank') class="text-danger" @enderror>BANK @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <select id="editbank" name="bank" class="js-states form-control" style="width: 100%">
                    <option value="{{ $pengeluaran_bank->bank }}">{{ $pengeluaran_bank->bank }}</option>
                   @foreach ($bank as $item)
                    <option value="{{ $item->nama_bank }}">{{ $item->nama_bank }}</option>
                   @endforeach
                </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="keterangan" @error('keterangan') class="text-danger" @enderror>KETERANGAN @error('pengeluaran')
                | {{ $message }}
                @enderror</label>
                <input type="text" class="form-control form-control-sm" value="{{ $pengeluaran_bank->keterangan }}" name="keterangan" id="smallInput" placeholder="-">
        </div>
    </div>
</div>
<script>
    $("#editjenis_pengeluaran").select2({
       placeholder: "Pilih Jenis Pengeluaran",
       allowClear: true
   });
    $("#editdivisi").select2({
       placeholder: "Pilih Divisi",
       allowClear: true
   });
    $("#editbank").select2({
       placeholder: "Pilih Bank",
       allowClear: true
   });
</script>