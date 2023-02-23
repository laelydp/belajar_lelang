@extends('template.home')
@section('title', 'GO-LANG')

@section('content')
<section class="section">
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
    <div class="card-header">
        <h3 class="card-title">Data barang yang akan dilelang</h3>
    </div>
    @if (auth()->user()->level == 'petugas')
      <div class="card-header d-flex justify-content-between">
        <a href="{{ route('lelang.create') }}" class="btn btn-primary btn-md">{{ __('Tambah Lelang') }}</a>
      </div>
    @endif
      <div class="card-body">
          <table id="data-table" class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga Awal</th>
                      <th>Harga Lelang</th>
                      <th>Tanggal Lelang</th>
                      <th>Status</th>
                    @if (auth()->user()->level == 'petugas')
                      <th>Action</th>
                    @endif
                    @if(auth()->user()->level == 'admin')
                    <th></th>
                    @else
                    @endif
                  </tr>
              </thead>
        <tbody>
            @forelse ($lelangs as $lelang)
                <tr>
                    <td >{{ $loop -> iteration }}</td>
                    <td >{{ $lelang->barang->nama_barang}}</td>
                    <td > @currency($lelang->barang->harga_awal)  </td>
                    <td > @currency($lelang->harga_akhir)</td>
                    <td >{{ \Carbon\Carbon::parse($lelang->tanggal)->format('j-F-Y') }}</td>
                    <td>
                        <span class="badge {{ $lelang->status == 'ditutup' ? 'bg-danger': 'bg-success' }}">{{ Str::title($lelang->status)  }}</span>
                    </td>
                    <td>
                        @if (auth()->user()->level == 'petugas')
                        <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                            <form action="{{ route('lelang.destroy', [$lelang->id]) }}" method="POST">
                                <a href="{{ route('lelangpetugas.show', [$lelang->id]) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class=" fas fa-eye"></i>
                                </a>
                                </a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                         @endif
                </td>
            </tr>
            @empty
                  <tr>
                    <td colspan="5" style="text-align: center" class="text-danger">Data lelang Kosong</td>
                  </tr>
            @endforelse
              </tbody>
          </table>
      </div>
    </div>
</section>
@endsection

{{-- <!-- {{ route('lelang.create') }} --> --}}
