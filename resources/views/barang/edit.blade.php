@extends('template.home')
@section('title', 'Lelang Online | Edit')

@section('content')
 <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Barang</h3>
              </div>
                <form action="{{ route('barang.update', [$barangs->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Input nama barang" value="{{ $barangs->nama_barang }}">
                    </div>
                    <div class="form-group">
                      <label for="tgl">Tanggal</label>
                      <input type="date" class="form-control" name="tgl" id="tgl" value="{{ $barangs->tgl }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="text" class="form-control" name="harga_awal" id="harga_awal" placeholder="Input Harga Awal" value="{{ $barangs->harga_awal }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_barang">Deskripsi Barang</label>
                        <textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" >{{ $barangs->deskripsi_barang }}</textarea>
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                    </form>
                  </div>
            </div>
        </div>
@endsection
