@extends('layouts.app')

@section('content')
<div class="container">

  <h1>Modifica: 
    <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></h1>
  <div>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
      @csrf
      @method('PATCH')

      <div class="mb-3">
        <label class="label-control" for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}">
      </div>

      <div class="mb-3">
        <label class="label-control" for="content">contenuto</label>
        <textarea class="form-control" type="text" id="content" name="content" rows="5">{{ $post->content }}</textarea>
      </div>

      <div>
        <button class="btn btn-success" type="submit">Invio</button>
      </div>

    </form>
  </div>
</div>
@endsection
