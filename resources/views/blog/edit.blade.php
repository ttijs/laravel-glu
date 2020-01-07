@extends('layouts.app')

@section('title')
    EDIT BLOG - {{ $blog->title }}
@endsection

@section('content')
    <h1>Bewerken: {{ $blog->title }}</h1>
    <form action="/blog/{{ $blog->id }}" method="post">
        @method('PUT')
        @include('blog.form')

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection
