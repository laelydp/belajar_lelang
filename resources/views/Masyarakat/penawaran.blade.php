@extends('template.home')

@section('title', 'GO-LANG | Penawaran')

@section('content')
@if($lelangs->status == 'ditutup')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Selamat kepada <strong>{{ $lelangs->pemenang }}</strong></h5>
    <p class="card-text"> Telah memenangkan lelang untuk barang <strong>{{ $lelangs->barang->nama_barang }}</strong> dengan harga <strong>Rp{{ number_format($lelangs->harga_akhir) }}</strong></p>
  </div>
</div>
@endif


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
  <div class="form-group">
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
    <div class="container-fluid">
        @error('harga_penawaran')
        <b class="form-control is-invalid mb-3">Erorr! {{ $message }}</b>
        @enderror
        @if(!empty($lelangs))
      <div class="row">
        <div class="col-md-5">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <span class="badge {{ $lelangs->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelangs->status) }}</span>
              <div class="text-center">
               @if($lelangs->barang->image)
                <img class="img-fluid mt-3" src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="User profile picture">
                @endif
            </div>

            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <!-- /.col -->
        <div class="col-md-7">
          <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details Barang</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
               <div class="tab-pane active" id="details">
                    <form action="{{route('lelangin.store', $lelangs->id)}}" method="post" class="form-horizontal" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" value="{{ $lelangs->barang->nama_barang}}"readonly>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="harga_awal" value="@currency($lelangs->barang->harga_awal)"readonly>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="harga_akhir">Harga akhir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="harga_akhir" value="@currency($lelangs->harga_akhir)"readonly>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="tgl_lelang">Tanggal Lelang</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tgl_lelang" value="{{ \Carbon\Carbon::parse($lelangs->tanggal_lelang)->format('j F Y')}}" readonly>
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="status">Status</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="status" value="{{ $lelangs->status}}"readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="deskripsi">Deskripsi Barang</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="deskripsi" readonly>{{ $lelangs->barang->deskripsi_barang}}</textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Tawarkan Harga </label>
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                <input type="text" name="harga"class="form-control @error('harga_penawaran') is-invalid @enderror" placeholder="Masukan Harga harus lebih dari @currency($lelangs->barang->harga_awal)">
                                @error('harga_penawaran')
                                <div class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            @if($lelangs->status == 'dibuka')
                            <div class="">
                                <button type="submit" class="btn btn-danger">Tawarkan</button>
                            </div>
                            @else
                            @endif
                        </div>
                        <!-- /.modal -->
                        @if(auth()->user()->level == 'admin')
                            <a href="{{route('lelangadmin.index')}}" class="btn btn-outline-info">Kembali</a>
                        @elseif(auth()->user()->level == 'masyarakat')
                            <a href="{{route('dashboard.masyarakat')}}" class="btn btn-outline-info">Kembali</a>
                        @elseif(auth()->user()->level == 'petugas')
                            <a href="{{ route('lelangpetugas.index')}}" class="btn btn-outline-info">Kembali</a>
                        @endif
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
    <div class="card">
        <div class="card-header">
          <strong>Data Pelelang {{ $lelangs->barang->nama_barang }}</strong>
      <div class="card-body p-4">
      <table class="table table-bordered table-hover">
            <thead>
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Pelelang</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal Penawaran</th>
                        <th>Status</th>
                        @if(auth()->user()->level == 'petugas')
                        <th></th>
                        @else
                        @endif
                        @if(auth()->user()->level == 'admin')
                        <th></th>
                        @else
                        @endif

                    </tr>
                </tbody>
            </thead>
            @forelse ($historyLelangs as $item)
            <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>@currency($item->harga)</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                <td>
                  <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                </td>
                @if (auth()->user()->level == 'admin')
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('lelangadmin.show', $item->id)}}">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                </td>
                @endif
                @if (auth()->user()->level == 'petugas')
                <td>
                <form action="{{ route('barang.destroy', [$item->id]) }}"method="POST">
                {{-- <a class="btn btn-primary"href="{{ route('barang.show', $item->id)}}">Detail</a>
                <a class="btn btn-warning"href="{{ route('barang.edit', $item->id)}}">Edit</a> --}}

                <a class="btn btn-primary btn-sm" href="{{ route('lelangpetugas.show', $item->id)}}">
                  <i class="fas fa-folder">
                  </i>
                  View
              </a>
              <a class="btn btn-info btn-sm" href="">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
              </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"value="Delete">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </button>
              </form>
            </td>
            @else
            @endif
            </tr>
            @empty
            <tr>
              <td colspan="5" style="text-align: center" class="text-danger"><strong>Data masih kosong</strong></td>
            </tr>
            @endforelse
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
  </section>
@endsection
@push('style')
<style>
    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 2rem;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }

    .btn-primary:focus,
    .btn-primary.focus {
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }
    </style>
@endpush
