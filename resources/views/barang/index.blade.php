@extends('template.dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
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
            <td>{{ $barang->tgl}}</td>
            <td>{{ $barang->harga_awal}}</td>
            <td>{{ $barang->deskripsi_barang}}</td>
              <td>
                <form action ="#" method="POST">
                
                <a class="btn btn-sm btn-info mr-3" href="{{ route('barang.show', $barang->id) }}">Detail</a>
                <a class="btn  btn-sm btn-warning mr-3" href="#">Edit</a>
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-sm btn-danger mr-3" value="Delete">
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
</div>
</div>
</body>
</html>
@endsection