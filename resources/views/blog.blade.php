@extends('layouts.app')

@section('title')
    BLOG
@endsection

@section('content')
    <h1>Blog</h1>

    <form action="/blog" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input name="title" class="form-control" id="title"></input>
        </div>

        @error('titel')
            @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        </div>

        @error('content')
            @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="author">Auteur</label>
            <input name="author" class="form-control" id="author"></input>
        </div>

        @error('author')
            @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>

    <hr>
    <table class="table table-striped table-hover">
        <tr>
            <th>titel</th>
            <th>auteur</th>
        </tr>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->author }}</td>
            </tr>
        @endforeach
    </table>

@endsection
