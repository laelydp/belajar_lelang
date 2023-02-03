@extends('template.dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Barang</title>
</head>
<body>
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('barang.store') }}" method="POST">
                 @csrf
                <div class="card-body">
                <input type="text" name="nama_barang" placeholder="Nama Barang">
                <input type="date" name="tgl" placeholder="Tanggal">
                <input type="text" name="harga_awal" placeholder="Harga Awal">
                <input type="text" name="deskripsi_barang" placeholder="Deskripsi Barang">
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </form>
</body>
</html>
@endsection