@extends('template.home')
@section('title','GO-LANG')

@section('content')
<div class="card">
    <div class="card-header">
    @if (auth()->user()->level == "admin")
    <a class="btn btn-primary mb-3"href="{{ route('user.create') }}">
        <li class="nav-icon fa fas fa-user-plus"></li>
        Registrasi Operator
      </a>
    @endif
    <div class= "card-body">
        <table id="data-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->level}}</td>
                <td>
                    <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                        <form action="{{ route('user.destroy', [$user->id]) }}" method="POST">
                            @csrf
                            <a href="{{ route('user.sh" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                <i class=" fas fa-eye"></i>
                            </a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
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
@endsection
