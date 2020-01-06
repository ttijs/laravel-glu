@extends('layouts.app')

@section('title')
    EDIT BLOG - {{ $blog->title }}
@endsection

@section('content')
    <h1>Bewerken: {{ $blog->title }}</h1>
    <form action="/blog/{{ $blog->id }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input name="title" class="form-control" id="title" value="{{ $blog->title }}"></input>
        </div>

        @error('title')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ $blog->content }}</textarea>
        </div>

        @error('content')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="author">Auteur</label>
            <input name="author" class="form-control" id="author" value="{{ $blog->author }}"></input>
        </div>

        @error('author')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection
