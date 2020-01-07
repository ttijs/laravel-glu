@extends('layouts.app')

@section('title')
    BLOG
@endsection

@section('content')
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/blog?active=1">Actief</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/blog?active=0">Inactief</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/blog/create">Nieuw</a>
        </li>
    </ul>
    <hr>
    <h1>Blog</h1>
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
