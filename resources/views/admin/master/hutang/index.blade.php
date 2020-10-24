@extends('layouts.master')

@section('title', 'Data Hutang')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" />
@endpush

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
            <div class="row mt--2 justify-content-center">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th hidden>#</th>
                                            <th hidden>NO</th>
                                            <th>ID TRANSAKSI</th>
                                            <th>SUPPLIER</th>
                                            <th hidden>TANGGAL</th>
                                            <th hidden>TOTAL</th>
                                            <th>TOTAL</th>
                                            <th class="text-center">STATUS</th>
                                            <th style="width: 300px" class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hutang as $e=>$item)
                                        <tr>
                                            <td hidden>{{ $item->id }}</td>
                                            <td hidden>{{ $e+1 }}</td>
                                            <td>{{ $item->kode_hutang }}</td>
                                            <td>{{ $item->nama_supplier_id }}</td>
                                            <td hidden>{{ date('d F Y ', strtotime ($item->created_at)) }}</td>
                                            <td hidden>{{ $item->grand_total }}</td>
                                            <td class="text-right">{{ number_format($item->grand_total,0) }}</td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center" style="width: 150px;">
                                                        @if ($item->sisa > 1)
                                                        <span class="stamp stamp-lg bg-danger mr-3">
                                                                <small><b>BERSISA</b></small>
                                                        </span>
                                                        <div>
                                                            <small class="text-muted">{{ number_format($item->sisa,0) }}</small>
                                                        </div>
                                                        @endif
                                                        @if ($item->sisa == 0)
                                                        <span class="stamp stamp-lg bg-success" style="width:200px">
                                                                <small><b>LUNAS</b></small>
                                                        </span>
                                                        
                                                        @endif
                                                </div>
                                            </td>
                                            <td class="text-center" style="width: 200px">
                                                <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-info btn-shadow mr-2 mt-2 mb-2 btn-drb">
                                                    <i class="far fa-edit"></i>
                                                    <span class="align-middle">DETAIL</span>
                                                </a>
                
                                                <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-danger btn-shadow mt-2 mb-2 swal-confirm">
                                                    <form action="{{ route('delete-hutang', $item->id) }}"
                                                        id="delete{{ $item->id }}" method="POST">
                                                        @csrf
                                                        
                                                        @method('delete')
                                                        <i data-id="{{ $item->id }}" class="fas fa-trash-alt"></i>
                                                        <span data-id="{{ $item->id }}" class="align-middle">HAPUS
                                                    </form>
                                                </a>
                                            </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-template">
			<div class="custom-toggle" href="#insert" data-toggle="modal">
				<i class="fas fa-plus-circle"></i>
			</div>
    </div>
    
    {{-- Insert --}}
    <div id="insert" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">TAMBAH DATA HUTANG</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                <input type="hidden" name="grand_total" value="0">
                <form class="form form-vertical" method="post" enctype="multipart/form-data"
                    action="{{ route('save-hutang') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal" @error('tanggal') class="text-danger" @enderror>TANGGAL @error('tanggal')
                                        | {{ $message }}
                                        @enderror</label>
                                        <input type="date" class="form-control form-control-sm" name="tanggal" onchange="myFunctionTanggal()" id="tanggal" placeholder="Small Input">
                                        <input type="hidden" value="{{ $kode }}" name="kode_dua">
                                        <input type="text" name="kode_satu" id="kode_dua" hidden>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_supplier_id" @error('nama_supplier_id') class="text-danger" @enderror>SUPPLIER @error('nama_supplier_id')
                                        | {{ $message }}
                                        @enderror</label>
                                        <select id="nama_supplier_id" name="nama_supplier_id" class="js-states form-control" style="width: 100%">
                                            <option value=""></option>
                                           @foreach ($supplier as $item)
                                            <option value="{{ $item->nama_supplier }}">{{ $item->nama_supplier }}</option>
                                           @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><b>NAMA</b></th>
                                                <th><b>HARGA</b></th>
                                                <th><b>QTY</b></th>
                                                <th><b>AKSI</b></th>
                                            </tr>
                                        </thead>
                                        <tbody class="produk-ajax">
            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="btn btn-dark btn-sm float-right insertbarang" href="#insertbarang" data-toggle="modal" style="margin-top: 35px;">Tambah Data Barang</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="barang" @error('barang') class="text-danger" @enderror>Pilih Item Untuk Tambah Barang @error('barang')
                                                | {{ $message }}
                                                @enderror</label>
                                           <select id="barang" class="js-states form-control" style="width: 100%" name="barang">
                                            <option value=""></option>
                                           @foreach ($barang as $item)
                                               <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                           @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-info btn-shadow">Simpan</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- last Insert --}}

     {{-- Detail --}}
    <div id="drb" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">DETAIL , RIWAYAT & BAYAR</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                    <div class="modal-body">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                    </div>
            </div>
        </div>
    </div>
    {{-- last Detail --}}

    {{-- insert barang --}}
    <div id="insertbarang" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">TAMBAH DATA BARANG</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                <form class="form form-vertical" method="post" enctype="multipart/form-data"
                    action="{{ route('save-barang-hutang') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="nama_barang" @error('nama_barang') class="text-danger" @enderror>NAMA BARANG @error('nama_barang')
                                        | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" value="{{ old('nama_barang') }}"
                                        name="nama_barang" placeholder="-" style="height: 28px;">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="harga" @error('harga') class="text-danger" @enderror>HARGA BARANG @error('harga')
                                        | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" id="rupiah" value="{{ old('harga') }}"
                                        name="harga" placeholder="-" style="height: 28px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-info btn-shadow">Simpan</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- last insert barang --}}
@endsection

@push('js')

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $('#barang').select2();
   $("input[name='grand_total']").val(0);
   $('#barang').on('select2:select', function (e) { 
       console.log('select event');
               var id = $(this).val();
               var nama_customer = $(this).val();
               var url = "{{ url('barang/ajax') }}"+'/'+id;
               var _this= $(this);
               $.ajax({
                   type:'get',
                   dataType: 'json',
                   url:url,
                   success : function(data){
                       console.log(data);
                       _this.val('');
                       var nilai = '';
                       nilai +='<tr>';
                           
                       nilai +='<td style="width:300px;" style="height:40px;">';
                       nilai +=data.data.nama_barang;
                       nilai +='<input type="hidden" class="form-control form-control-sm" name="nama[]" value="'+data.data.id+'"></input>';
                       nilai +='</td>';
                       nilai +='<td class="harga" style="height:40px;">';
                       nilai +='<input type="number" class="form-control form-control-sm" name="harga[]" value="'+data.data.harga+'" style="width: auto;"></input>';
                       nilai +='</td>';
                       nilai +='<td style="height:40px;">';
                       nilai +='<input type="number" class="form-control form-control-sm" name="qty[]" value="1" style="width: 70px;"></input>';
                       nilai +='</td>';
                       nilai +='<td style="height:40px;">';
                       nilai +='<button class="btn btn-sm btn-danger hapus">Hapus</button>';
                       nilai +='</td>';
                       
                       nilai +='</tr>';
                       var total = parseInt($("input[name='grand_total']").val());
                       total += data.data.harga;
                       
                       $("input[name='grand_total']").val(total);
                       $('.produk-ajax').append(nilai);
                   }
               })      
      
   });
   $('body').on('click', '.hapus', function(e){
       e.preventDefault();
       $(this).closest('tr').remove();
   })
    $("button[type='submit']").click(function(e){
      
       var grand_total = parseInt($("input[name='grand_total']").val());
   })
   $("#barang").select2({
       placeholder: "Cari Barang",
       allowClear: true
   });
</script>
<script>
     $("#nama_supplier_id").select2({
        placeholder: "Pilih Supplier",
        allowClear: true
    });
</script>
<script>
    function myFunctionTanggal() { 
        // alert('zzzzz');
       var kode = document.getElementById("tanggal").value; 
       var satu = kode.substring(8);
       var dua = kode.substring(5,7);
       var tiga = kode.substring(2,4);
       $('#kode_dua').val("KH"+satu+dua+tiga);
      }
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script >
   $(document).ready(function() {
			$('#basic-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                        columns: [ 1,2,3,4,5]
                    }   
                    }
                ],
                        aaSorting: [[0, 'desc']]
			});
		});
</script>
<script>
     $('.insertbarang').on('click', function() {
            let id = $(this).data('id')
            $('#insert').modal('hide')
        })
</script>
<script>
        $('.btn-drb').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/drb-hutang`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    $('#drb').find('.modal-body').html(data)
                    $('#drb').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

        $('.btn-update').on('click', function() {
            // console.log($(this).data('id'))
            let id = $('#form-edit').find('#id_data').val()
            let formData = $('#form-edit').serialize()
            console.log(formData)
            $.ajax({
                url: `/pengeluaran-tunai/update/${id}`,
                method: "PATCH",
                data:formData,
                success: function(data) {
                    // console.log(data)
                    $('#edit').modal('hide')
                    window.location.assign('/pengeluaran-tunai')
                },
                error: function(err) {
                    console.log(err.responseJSON)
                    let err_log = err.responseJSON.errors;
                    if (err.status == 422){
                        if (typeof(err_log.satuan) !== 'undefined'){
                            $('#edit').find('[name="nama_jenis_pengeluaran"]').prev().html('<span style="color:red">Jenis Pengeluaran | '+err_log.divisi[0]+'</span>')
                        }else{
                            $('#edit').find('[name="nama_jenis_pengeluaran"]').prev().html('<span>Jenis Pengeluaran</span>')
                        }
                    }
                }
            })
        })

        @if ($errors->any()) {
            $('#insert').modal('show')
        }
        @endif
        @if ($errors->any()) {
            $('#insertbarang').modal('show')
        }
        @endif

        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            Swal.fire({
                    title: 'YAKIN MAU HAPUS DATA?',
                    text: "Data Akan Dihapus Permanen",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'YA, HAPUS!'
                    })
                .then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire({
                        // position: 'center',
                        // icon: 'success',
                        // title: 'Data Berhasil Dihapus',
                        // showConfirmButton: false,
                        // timer: 1800
                        // })
                        $(`#delete${id}`).submit();
                    } else {
                        // swal("Data ini batal dihapus!");
                    }
                });
        });

        $('.btn-detail').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/detail-pengeluaran-tunai`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    $('#detail').find('.modal-body').html(data)
                    $('#detail').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
</script>
@endpush