@extends('template.home')
@section('title','Golang')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
              <p class="text-muted text-center">{{Auth::user()->level}}</p>
            </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="details">
                    <form class="form-horizontal">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="name" readonly>
                          </div>
                          <div class="form-row">
                          <div class="form-group col-md-4">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control" id="username" readonly>
                          </div>
                          <div class="form-group col-md-4">
                            <label>Telepon</label>
                            <input type="text" name="telepon" value="{{ Auth::user()->telepon }}"class="form-control" id="telepon" readonly>
                          </div>
                          <div class="form-grou col-md-4">
                            <label>Level</label>
                            <input type="text" name="level" value="{{ Auth::user()->level }}" class="form-control" id="level" readonly>
                          </div>
                        </div>
                          <div class="form-group">
                            <label>Waktu dibuat</label>
                            <input type="text" name="created_at" value="{{ Auth::user()->created_at }}"class="form-control" id="created_at" readonly>
                          </div>
                          {{-- <button type="submit" class="btn btn-danger">Simpan</button> --}}
                    </form>
                  </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="{{route('user.updateprofile')}}" method="POST">
                      @csrf
                      @method('PUT')
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telepon" value="{{ Auth::user()->telepon }}">
                        </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection


