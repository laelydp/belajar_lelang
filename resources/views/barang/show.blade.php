@extends('template.home')
@section('title','Lelang Online | detail')
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Detail Barang</h3>
              </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Input nama barang" value="{{ $barangs->nama_barang }}" disabled>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control" name="tgl" id="tgl" value="{{ $barangs->tgl }}" disabled>
                </div>
                <div class="form-group">
                    <label for="harga_awal">Harga Awal</label>
                    <input type="text" class="form-control" name="harga_awal" id="harga_awal" placeholder="Input Harga Awal" value="{{ $barangs->harga_awal }}" disabled>
                </div>
                <div class="form-group">
                    <label for="deskripsi_barang">Deskripsi Barang</label>
                    <textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" disabled>{{ $barangs->deskripsi_barang }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <a type="submit" class="btn btn-primary" href="{{ route ('barang.index') }}">Kembali</a>
              </div>
           </div>
        </div>

@endsection
