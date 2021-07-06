@extends('layouts.app')

@section('content')
<div class="container">

  <h1>{{ $post->title }}</h1>
  <h3>
    @if ($post->category)
      Categoria: {{ $post->category->name }}
    @else
      nessuna categoria assocciata
    @endif
  </h3>
  <p>{{ $post->content }}</p>
  <div>
    <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
  </div>

</div>
@endsection
