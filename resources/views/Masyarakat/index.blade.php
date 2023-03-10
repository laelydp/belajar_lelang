@extends('template.home')

@section('title', 'GO-LANG| INDEX')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">

  </div>
  <div class="card-body p-0">
  <table class="table table-hover">
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
              <a class="btn btn-primary btn-sm" href="#">
                <i class="fas fa-folder">
                </i>
                View
              </a>
            </td>
            @endif
            @if (auth()->user()->level == 'petugas')
            <td>
            <form action="#"method="POST">
            <a class="btn btn-primary btn-sm" href="#">
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

</div>

</section>
@endsection
