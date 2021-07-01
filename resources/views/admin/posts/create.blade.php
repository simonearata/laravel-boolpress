@extends('layouts.app')

@section('content')
<div class="container">

  <h1>Nuovo post<h1>
  <div>
    <form action="{{ route('admin.posts.store') }}" method="POST">
      @csrf
      @method('POST')

      <div class="mb-3">
        <label class="label-control" for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title">
      </div>

      <div class="mb-3">
        <label class="label-control" for="content">contenuto</label>
        <textarea class="form-control" type="text" id="content" name="content" rows="5"></textarea>
      </div>

      <div>
        <button class="btn btn-success" type="submit">Invio</button>
        <button class="btn btn-secondary" type="reset">Reset</button>
      </div>

    </form>
  </div>
</div>
@endsection
