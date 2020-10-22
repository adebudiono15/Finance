    <div class="col-md-12">
    <input type="hidden" name="id" value="{{ $jenis_pendapatan->id }}" id="id_data" />
        <div class="form-group">
            <label for="jenis_pendapatan" 
            @error('jenis_pendapatan') class="text-danger" 
            @enderror>NAMA JENIS PENDAPATAN
            @error('jenis_pendapatan')
            | {{ $message }}
            @enderror</label>
            <input type="text" class="form-control" value="{{ $jenis_pendapatan->nama_jenis_pendapatan  }}"
                name="nama_jenis_pendapatan" style="height: 28px;">
        </div>
    </div>