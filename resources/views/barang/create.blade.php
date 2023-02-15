@extends('template.home')
@section('title', 'Lelang Online | create')
@section('content')
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Tambah Data Barang Yang Akan Di Lelang') }}</h4>
                        </div>
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                    <div class="card-content">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Input nama barang">
                        </div>
                        <div class="form-group">
                          <label for="tgl">Tanggal</label>
                          <input type="date" class="form-control" name="tgl" id="tgl" >
                        </div>
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal</label>
                            <input type="text" class="form-control" name="harga_awal" id=harga_awal" >
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_barang">Deskripsi Barang</label>
                            <textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" ></textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>

@endsection
