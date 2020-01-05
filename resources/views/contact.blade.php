@extends('layouts.app')

@section('title')
    Contact informatie
@endsection

@section('content')
    <img src="<?= asset('img/contact.png') ?>" class="rounded mx-auto d-block" alt="Responsive image" width="30%">
    <h3>Contact
        <small class="text-muted">Vul het formulier in</small>
    </h3>

    <form method="post" action="/contact">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail adres</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Uw e-mail adres zal niet aan derden worden verstrekt.</small>
        </div>
        @error('email')
            @component('components.alert') {{ $message }} @endcomponent
        @enderror

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        @error('content')
            @component('components.alert') {{ $message }} @endcomponent
        @enderror
        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>
@endsection
