@extends('layouts.app')

@section('title')
    BLOG
@endsection

@section('content')
    <h1>Blog</h1>

    <a href="/blog/create" class="btn btn-primary">Nieuw</a>
    <hr>
    <table class="table table-striped table-hover">
        <tr>
            <th>titel</th>
            <th>auteur</th>
            <th></th>
        </tr>
        @forelse($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->author }}</td>
                <td><a href="/blog/{{ $blog->id }}">Bekijk</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Er zijn geen blogs</td>
            </tr>
        @endforelse
    </table>

@endsection
