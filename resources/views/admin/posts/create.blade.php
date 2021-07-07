@extends('layouts.app')

@section('content')
<div class="container">

  <h1>Nuovo post<h1>

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
    <form action="{{ route('admin.posts.store') }}" method="POST">
      @csrf
      @method('POST')

      <div class="mb-3">
        <label class="label-control" for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title"
          value="{{ old('title') }}"
          class="form-control @error('title') is-invalid @enderror"
        >
        @error('title')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label class="label-control" for="content">contenuto</label>
        <textarea class="form-control @error('content') is-invalid @enderror" type="text" id="content" name="content" rows="5">{{ old('content') }}</textarea>
        @error('content')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label class="label-control" for="category_id">Categoria</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
          <option value=""> - selezionare una categoria -</option>
          @foreach($categories  as $category)
            <option 
              @if (old('category_id') == $category->id ) selected @endif 
              value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error('category_id')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <h5>Tag</h5>
        @foreach($tags as $tag)
          <span class="d-inline-block mr-3">
            <input type="checkbox" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}" name="tags[]">
            <label for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
          </span>
        @endforeach
      </div>

      <div>
        <button class="btn btn-success" type="submit">Invio</button>
        <button class="btn btn-secondary" type="reset">Reset</button>
      </div>

    </form>
  </div>
</div>
@endsection
