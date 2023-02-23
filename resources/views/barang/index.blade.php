@extends('template.home')
@section('title', 'GO-LANG ')
@section('content')
<style>
    .card {
       background-image: url("{{asset('')}}");
       height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <section class="content">
    @if(session()->has('success'))
    <div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-success" role="alert">
            {{session('success')}}
            <li class="fas fa-check-circle"></li>
          </div>
        </div>
      </div>
    </div>
    @elseif(session()->has('editsuccess'))
    <<div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-success" role="alert">
            {{session('editsuccess')}}
            <li class="fas fa-check-circle"></li>
          </div>
        </div>
      </div>
    </div>
    @elseif(session()->has('deletesuccess'))
    <div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-success" role="alert">
            {{session('deletesuccess')}}
            <li class="fas fa-check-circle"></li>
          </div>
        </div>
      </div>
    </div>
    @endif
<div class="card">
  <div class="col-md-12">
    <div class="card-header">
      <h3 class="card-title">Data Barang</h3>
    </div>
     <div class="card-body">
      <table id="data-table" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Tanggal </th>
            <th>Harga Awal</th>
            <th>Deksripsi Barang</th>
            <th>Action</th>
            </tr>
            </thead>
    <tbody>
      @forelse ($barangs as $barang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barang->nama_barang}}</td>
            <td>{{ \Carbon\Carbon::parse($barang->tgl)->format('j-F-Y') }}</td>
            <td>@currency($barang->harga_awal)</td>
            <td>{{ $barang->deskripsi_barang}}</td>
              <td>
                <form action ="{{ route('barang.destroy', [$barang->id]) }}" method="POST">
                    <a class="btn btn-sm btn-info mr-3" href="{{ route('barang.show', $barang->id) }}">
                        <i class="material-icons opacity-10">visibility</i>
                        {{-- <span>Detail</span> --}}
                    </a>
                    <a class="btn  btn-sm btn-warning mr-3" href="{{ route('barang.edit', $barang->id) }}">
                        <i class="material-icons opacity-10">edit</i>
                        {{-- <span>Edit</span> --}}
                    </a>
                @csrf
                @method ('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                    <i class="material-icons opacity-10">delete</i>
                    {{-- <span>Delete</span> --}}
                </button>
                </form>
              </td>
              </tr>
        @empty
        <tr>
            <td>Data Masih Kosong</td>
        </tr>
      @endforelse
    </tbody>
    </table>
  </div>
              <div class="card-header">
              <a class="btn btn-primary" href="{{ route('barang.create')}}">
                  <i class="fas fa-plus"></i>
                  Tambah Barang
             </a>
              </div>
</div>
</div>
@endsection
