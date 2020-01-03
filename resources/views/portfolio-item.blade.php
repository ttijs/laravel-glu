@extends('layouts.app')

@section('title')
    {{ $item->slug }}
@endsection

@section('content')
    <blockquote class="blockquote text-center">
        <p class="mb-0">{{ $item->title }}</p>
        <footer class="blockquote-footer">{{ $item->description }}</footer>
    </blockquote>
    <img src="/{{ $item->image }}" class="img-fluid" alt="{{ $item->title }}">
    <p>{{ $item->body }}</p>

@endsection
