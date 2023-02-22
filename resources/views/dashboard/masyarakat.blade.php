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
              <div class="text-center">
                  @if($lelang->barang->image)
                  <img src="{{ asset('storage/' . $lelang->barang->image)}}" alt="{{ $lelang->barang->nama_barang }}" class="img-fluid mt-0">
                  @endif
                </div>
                <h3 class="profile-username text-center">{{ $lelang->barang->nama_barang}}</h3>

              <h5 class="text-muted text-center">{{ $lelang->barang->harga_awal }}</h5>

              <a href="{{ route('lelangin.create', $lelang->id)}}" class="btn btn-success btn-block"><b>Tawar</b></a>
            </div>
            <!-- /.card-body -->
         </div>

    </div>
    @endforeach
</div>
</section>

@endsection
