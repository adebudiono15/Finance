    <div class="col-md-12">
    <input type="hidden" name="id" value="{{ $jenis_pengeluaran->id }}" id="id_data" />
        <div class="form-group">
            <label for="jenis_pengeluaran" 
            @error('jenis_pengeluaran') class="text-danger" 
            @enderror>NAMA JENIS PENGELUARAN
            @error('jenis_pengeluaran')
            | {{ $message }}
            @enderror</label>
            <input type="text" class="form-control" value="{{ $jenis_pengeluaran->nama_jenis_pengeluaran  }}"
                name="nama_jenis_pengeluaran" style="height: 28px;">
        </div>
    </div>