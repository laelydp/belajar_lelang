@extends('template.home')

@section('title', 'G0-LANG | Masyarakat')

@section('content')
<section class="content">
    <div class="row">
        @foreach($lelangs as $lelang)
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <span class="mb-2 badge {{ $lelang->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelang->status) }}</span>
                <div class="text-center">
                    @if($lelang->barang->image)
                    <img src="{{ asset('storage/' . $lelang->barang->image)}}" alt="{{ $lelang->barang->nama_barang }}" class="img-fluid mt-0">
                    @endif
                    </div>
                    <h3 class="profile-username text-center">{{ $lelang->barang->nama_barang}}</h3>

                <h5 class="text-muted text-center">@currency($lelang->barang->harga_awal) </h5>

                <a href="{{ route('lelangg.create', $lelang->id) }}" class="btn btn-primary"><b>Tawar</b></a>
            </div>
            <!-- /.card-body -->

            {{-- @if($item->pemenang == Auth::user()->name)
        <!-- Modal notifikasi pop up --> --}}
        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Selamat, Anda Terpilih Menjadi Pemenang!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda telah terpilih sebagai pemenang lelang barang dengan nama <strong>{{ $lelang->barang->nama_barang }}</strong>. Mohon segera menghubungi panitia lelang untuk informasi lebih lanjut mengenai pengambilan barang.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="{{route('lelangg.create', $lelang->id )}}" class="btn btn-primary">Lihat Detail</a>
            </div>
            </div>
        </div>
        </div>
         </div>
    </div>
@endforeach
</div>
</section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#notificationModal').modal('show');
    });
    </script>
@endsection
