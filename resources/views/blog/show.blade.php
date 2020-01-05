@extends('layouts.app')

@section('title')
    BLOG - {{ $blog->title }}
@endsection

@section('content')
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->content }}</p>
    <p>auteur: <i>{{ $blog->author }}</i></p>
@endsection
