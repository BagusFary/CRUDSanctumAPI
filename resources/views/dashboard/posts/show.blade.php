@extends('dashboard.layouts.main')


@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-4">{{ $post->judul }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to list</a>
                <a href="/dashboard/posts/{{ $post->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                    </form>
                    <h4 class="mb-3 mt-3">Deskripsi</h4> 
                <article class="my-3 fs-5">
                    {!! $post->deskripsi !!}
                </article>

            
        </div>
    </div>
</div>


  @endsection