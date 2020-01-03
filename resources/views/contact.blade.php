@extends('layouts.app')

@section('title')
    Contact informatie
@endsection

@section('content')
{{--    @component('components.alert')--}}
{{--        Het formulier is nog niet ingevuld!--}}
{{--    @endcomponent--}}
    <img src="<?= asset('img/contact.png') ?>" class="rounded mx-auto d-block" alt="Responsive image" width="30%">
    <h3>Contact
        <small class="text-muted">Vul het formulier in</small>
    </h3>

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail adres</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Uw e-mail adres zal niet aan derden worden verstrekt.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>
@endsection
