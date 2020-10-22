    <div class="col-md-12">
    <input type="hidden" name="id" value="{{ $divisi->id }}" id="id_data" />
        <div class="form-group">
            <label for="divisi" 
            @error('divisi') class="text-danger" 
            @enderror>DIVISI
            @error('divisi')
            | {{ $message }}
            @enderror</label>
            <input type="text" class="form-control" value="{{ $divisi->nama_divisi  }}"
                name="nama_divisi" style="height: 28px;">
        </div>
    </div>