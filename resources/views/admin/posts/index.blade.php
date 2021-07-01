@extends('layouts.app')

@section('content')
<div class="container">
  <h1>I miei post</h1>
  @if (session('deleted'))
    <span class="alert alert-success">
      <strong>{{ session('deleted') }}</strong>
      eliminato correttamente
    </span>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>
            <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-success">SHOW</a>
          </td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
          </td>
          <td>
            <form action="{{ route('admin.destroy', $post) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
