@extends('template.home')
@section('title', 'GO-LANG |detail')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title">{{ __('Registrasi Petugas') }}</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ $users->name }}" class="form-control" placeholder="Masukkan Nama Lengkap" disabled>
                      </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ $users->username }}" class="form-control" placeholder="Masukkan Username" disabled>
                      </div>
                    {{-- <div class="form-group">
                            <label for="form-label">Password</label>
                            <input type="text" id="password" name="password" value="{{ $users->password }}"class="form-control" placeholder="Masukkan Password" disabled>
                    </div>
                    <div class="form-group">
                        <label for="form-label">Ketik ulang password</label>
                        <input type="text" id="passwordshow" name="passwordshow"  value="{{ $users->passwordshow }} "class="form-control" placeholder="Ketik Ulang Password" disabled>
                    </div> --}}
                    <div class="form-group">
                        <label for="level" >Level</label>
                        <input type="text" id="level" name="level" value="{{ $users->level }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon" name="telepon" value="{{ $users->telepon }}" class="form-control" placeholder="Masukkan nomor telepon" disabled>
                    </div>
                    <div class="form-group">
                        <label>Waktu dibuat</label>
                        <input type="text" id="created_at" name="created_at" value="{{ $users->created_at }}"class="form-control" disabled>
                      </div>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <a href="{{ route('user.index') }}"class="btn btn-outline-info mb-1">
                              {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
