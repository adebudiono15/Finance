    <input type="hidden" name="id" value="{{ $pendapatan_bank->id }}" id="id_data" />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="tanggal" @error('tanggal') class="text-danger" @enderror>TANGGAL @error('tanggal')
                    | {{ $message }}
                    @enderror</label>
                    <input type="text" class="form-control form-control-sm" value="{{ date('d F Y', strtotime ($pendapatan_bank->tanggal)) }}" placeholder="Small Input">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="divisi" @error('divisi') class="text-danger" @enderror>DIVISI @error('pengeluaran')
                    | {{ $message }}
                    @enderror</label>
                    <select id="editdivisi" name="divisi" class="js-states form-control" style="width: 100%">
                        <option value="{{ $pendapatan_bank->divisi }}">{{ $pendapatan_bank->divisi }}</option>
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
                        <option value="{{ $pendapatan_bank->jenis_pendapatan }}">{{ $pendapatan_bank->jenis_pendapatan }}</option>
                       {{-- @foreach ($jenis_pendapatan as $item) --}}
                       <option value=""></option>
                        <option value="Penjualan Bank">Penjualan Bank</option>
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
                    <input type="number" class="form-control form-control-sm" value="{{ $pendapatan_bank->jumlah_pendapatan }}" name="jumlah_pendapatan" id="smallInput" placeholder="-">
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
                        <option value="{{ $pendapatan_bank->bank }}">{{ $pendapatan_bank->bank }}</option>
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
                    <input type="text" class="form-control form-control-sm" value="{{ $pendapatan_bank->keterangan }}" name="keterangan" id="smallInput" placeholder="-">
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
     $("#editbank").select2({
        placeholder: "Pilih Bank",
        allowClear: true
    });
</script>