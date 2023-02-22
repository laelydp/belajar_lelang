@extends('template.home')
@section('title', 'GO-LANG| Edit')

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
                    <div class="col-md-12">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                            <div class="form-group">
                                @if( $barangs->image )
                                <img src="{{ asset('storage/' . $barangs->image)}}" alt="{{ $barangs->nama_barang }}" class="img-fluid mt-3" width="50%">
                                @else
                                <img class="img-preview img-fluid col-sm-5 mb-3" alt="">
                                @endif
                              </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Gambar Barang</label>
                        <img class="img-preview img-fluid col-sm-5 mb-3" alt="">
                        <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
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
