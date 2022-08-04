@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
  </div>

  <div class="row">
    <div class="col-md-6">
      <form action="/dashboard/users">
      <div class="input-group mb-4 mt-3">
  <input type="text" class="form-control" placeholder="Search Nama User" name="search" value="{{ request('search') }}">
  <button class="btn btn-outline-secondary" type="submit">Search</button>
</div>
      </form>
    </div>
  </div>

  @if(session()->has('success'))

  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>

  @endif

  <div class="table-responsive col-lg-6">
    <a href="/dashboard/users/create" class="btn btn-primary mb-3">Create Users</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

  @endsection



