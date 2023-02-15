@extends('template.home')
@section('title', 'Lelang Online')

@section('content')
<section class="section">
  <div class="card">
      <div class="card-header d-flex justify-content-between">
        <a href="{{ route('lelang.create') }}" class="btn btn-primary btn-md">{{ __('Tambah Lelang') }}</a>
      </div>

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
                      <th>Action</th>
                  </tr>
              </thead>
        <tbody>
            @forelse ($lelangs as $lelang)
                <tr>
                    <td >{{ $loop -> iteration }}</td>
                    <td >{{ $lelang->barang->nama_barang}}</td>
                    <td >{{ $lelang->barang->harga_awal }}</td>
                    <td >{{ $lelang->harga_akhir }}</td>
                    <td >{{ \Carbon\Carbon::parse($lelang->tanggal)->format('j-F-Y') }}</td>
                    <td>
                        <span class="badge {{ $lelang->status == 'ditutup' ? 'bg-danger': 'bg-success' }}">{{ Str::title($lelang->status)  }}</span>
                    </td>
                    <td>
                        <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                            <form action="#" method="POST">
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class=" fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                        <i class="fas fa-trash"></i>
                        </button>
                            </form>
                     </div>
                </td>
            </tr>
            @empty
                  <tr>
                    <td colspan="5" style="text-align: center" class="text-danger">Data lelang Kosong</td>
                  </tr>

                @endforelse

              </tbody>
          </table>
        </tbody>

@endsection

{{-- <!-- {{ route('lelang.create') }} --> --}}
