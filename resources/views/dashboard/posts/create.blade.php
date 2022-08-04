@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Post</h1>
  </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="user_id" class="form-label">User</label>
      <select class="form-select" name="user_id">
          @foreach ($users as $user)
          @if(old('user_id') == $user->id)
          <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
          @else     
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endif
          @endforeach
        </select>
    </div>
    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
      @error('judul')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      @error('deskripsi')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
      <trix-editor input="deskripsi"></trix-editor>
    </div>
  
    <button type="submit" class="btn btn-primary mt-3">Create New Post</button>
  </form>
</div>

<script>
    

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

</script>

@endsection