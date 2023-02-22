@extends('template.home')
@section('title', 'GO-LANG | Edit')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title">{{ __('Edit Petugas') }}</h4>
                </div>
                <form action="{{ route('user.update', [$users->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="card-content">
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $users->id }}">
                    <input type="hidden" name="password" value="{{ $users->password }}">
                    <input type="hidden" name="passwordshow" value="{{ $users->passwordshow }}">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name"   value="{{ $users->name }}" class="form-control" placeholder="Masukkan Nama Lengkap">
                      </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ $users->username}}" class="form-control" placeholder="Masukkan Username">
                      </div>
                    <div class="form-group">
                        <label for="level" >Level</label>
                        <select class="form-control" name="level">
                          <option selected readonly>{{ $users->level }}</option>
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon"name="telepon" value="{{ $users->telepon}}" class="form-control" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <a href="{{ route('user.index') }}"class="btn btn-outline-info mb-1">
                              {{ __('Kembali') }}
                            </a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
