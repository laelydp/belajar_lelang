@extends('template.home')
@section('title','GO-LANG | detail')
@section('content')
<div class="row">

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
                    <input type="text" class="form-control" name="harga_awal" id="harga_awal" placeholder="Input Harga Awal" value="@currency($barangs->harga_awal)" disabled>
                </div>
                        <!-- left column -->
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        @if( $barangs->image )
                        <div class="form-group">
                            <label> </label>
                            <br>
                            <img src="{{ asset('storage/' . $barangs->image)}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3" width="50%">
                        </div>
                        @else

                        @endif
                    </div>
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
