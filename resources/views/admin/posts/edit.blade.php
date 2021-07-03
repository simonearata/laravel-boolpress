@extends('layouts.app')

@section('content')
<div class="container">

  <h1>Modifica: 
    <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  <div>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
      @csrf
      @method('PATCH')

      <div class="mb-3">
        <label class="label-control" for="title">Titolo</label>
        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label class="label-control" for="content">contenuto</label>
        <textarea class="form-control @error('content') is-invalid @enderror" type="text" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
        @error('content')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <button class="btn btn-success" type="submit">Invio</button>
      </div>

    </form>
  </div>
</div>
@endsection
