@extends('layouts.app')

@section('content')
    <h1>Nieuwe blog</h1>
    <form action="/blog" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input name="title" class="form-control" id="title" value="{{ old('title') }}"></input>
        </div>

        @error('title')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
        </div>

        @error('content')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="author">Auteur</label>
            <input name="author" class="form-control" id="author" value="{{ old('author') }}"></input>
        </div>

        @error('author')
        @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>
@endsection

