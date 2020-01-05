@extends('layouts.app')

@section('title')
    Mijn creaties
@endsection

@section('content')
    <blockquote class="blockquote text-center">
        <p class="mb-0">Mijn werk</p>
        <footer class="blockquote-footer">Met trots gecreëerd</footer>
    </blockquote>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titel</th>
            <th scope="col">Afbeelding</th>
            <th scope="col">Link</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>
                    {{ $item->description }}
                </td>
                <td>
                    <img src="{{$item->image}}" class="img-thumbnail" alt="{{$item->title}}" width="200">
                </td>
                <td>
                    <a href="/mijn-werk/{{ $item->slug }}">Klik hier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
