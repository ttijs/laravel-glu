@extends('layouts.app')

@section('content')
    <h1>Nieuwe blog</h1>
    <form action="/blog" method="post">
        @include('blog.form')

        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>
@endsection

