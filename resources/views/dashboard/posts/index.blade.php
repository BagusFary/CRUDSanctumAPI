@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Data</h1>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form action="/dashboard/posts">
      <div class="input-group mb-4 mt-3">
  <input type="text" class="form-control" placeholder="Search Judul/Deskripsi Post" name="search" value="{{ request('search') }}">
  <button class="btn btn-outline-secondary" type="submit">Search</button>
</div>
      </form>
    </div>
  </div>

  @if(session()->has('success'))

  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>

  @endif

  <div class="table-responsive col-lg-9">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User</th>
          <th scope="col">Judul</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->judul }}</td>
            <td>{!! $post->deskripsi !!}</td>
            <td>
                <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
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



