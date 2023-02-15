@extends('template.home')
@section('title', 'Lelang Online ')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Data Barang Yang Akan Di Lelang') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('lelang.store') }}" data-parsley-validate>
                          @csrf
                          <div class="row">
                                  {{-- <div class="mb-3">
                                    <label for="nama_barang" class="form-label">{{ __('Nama Barang') }}</label>
                                    <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang" name="barangs_id" data-parsley-required="true" value="{{ old('nama_barang', Str::of($barangs[0]->nama_barang)->title()) }}">
                                  </div>
                                  @error('nama_barang')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                  @enderror --}}
                                  <div class="col-12">
                                    <div class="form-group mandatory">
                                      <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
                                      <select class="form-select form-control @error('barangs_id') is-invalid @enderror" id="barangs_id" name="barangs_id" data-parsley-required="true">
                                        <option value="" disabled><strong>Pilih Barang</strong></option>
                                        @forelse ($barangs as $item)
                                          <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} -  {{ str::of($item->harga_awal) }}</option>
                                        @empty
                                          <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
                                        @endforelse
                                      </select>
                                    </div>
                                    @error('barangs_id')
                                      <div class="aler alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                  </div>
                              </div>
                              <div class="col-md-4 col-12">
                                  <div class="form-group mandatory">
                                      <label for="tanggal_lelang" class="form-label">{{ __('Tanggal') }}</label>
                                      <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" placeholder="Tanggal" name="tanggal_lelang" data-parsley-required="true" value="{{ old('tanggal_lelang', $barangs[0]->tanggal_lelang) }}">
                                  </div>
                                  @error('tanggal_lelang')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="col-md-4 col-12">
                                  <div class="form-group mandatory">
                                      <label for="harga_akhir" class="form-label">{{ __('Harga Akhir') }}</label>
                                      <input type="text" id="harga_akhir" class="form-control @error('harga_akhir') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_akhir" data-parsley-required="true" value="{{ old('harga_akhir', $barangs[0]->harga_akhir) }}">
                                  </div>
                                  @error('harga_akhir')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="row mt-3">
                                  <div class="col-6 d-flex justify-content-start">
                                      <a href="{{ route('barang.index') }}"class="btn btn-outline-info mb-1">
                                        {{ __('Kembali') }}
                                      </a>
                                  </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                      {{ __('Submit') }}
                                    </button>
                                </div>

                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- {{ route('barang.update', $barangs[0]->id) }} --}}
