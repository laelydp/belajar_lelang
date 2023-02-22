@extends('template.home')
@section('title', 'GO-LANG |create')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title">{{ __('Registrasi Petugas') }}</h4>
                </div>
                <form action="{{ route('user.store')}}" method="POST">
                    @csrf
                <div class="card-content">
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama Lengkap">
                      </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username">
                      </div>
                    <div class="form-group">
                            <label for="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Ketik ulang password</label>
                        <input type="password" id="passwordshow" name="passwordshow" class="form-control" placeholder="Ketik Ulang Password">
                    </div>
                    <div class="form-group">
                        <label for="level" >Level</label>
                        <select class="form-control" name="level">
                          <option selected disabled>Pilih Level</option>
                            <option>admin</option>
                            <option>petugas</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon" name="telepon" class="form-control" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <a href="{{ route('user.index') }}"class="btn btn-outline-info mb-1">
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
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
