@extends('template.home')

@section('title', 'GO-LANG| DATA PENAWARAN')

@section('content')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <a href="#" target="_blank"class="btn btn-info">
        <li class="fas fa fa-print"></li>
        Cetak Data
      </a>
      <a href="#" target="_blank"class="btn btn-info">
        <li class="fas fa fa-print"></li>
        Download Data
      </a>
  <div class="card-body p-0">
  <table class="table table-hover">
        <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama Penawar</th>
                    <th>Nama Barang</th>
                    <th>Harga lelang</th>
                    <th>Tanggal lelang</th>
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

            @endif
            @if (auth()->user()->level == 'petugas')
            <td>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">
                  <i class="fas fa-check"></i> Pilih Jadi Pemenang
                </button>
                <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pemenang Lelang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin memilih ini sebagai pemenang lelang?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('lelangpetugas.setpemenang', $item->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-success">Ya, Pilih</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </td>
        @else
        @endif
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center" class="text-danger"><strong>Data penawaran kosong</strong></td>
        </tr>
        @endforelse
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <!-- /.card-footer-->
</div>
<!-- /.card -->
  </div>
</section>
<!-- /.content -->
@endsection
