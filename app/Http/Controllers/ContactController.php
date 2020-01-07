<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Met store() schrijven we gegevens weg naar de database.
     */
    public function store()
    {
        /**
         * Met request()->validate() kun je validatie toepassen op velden die in
         * het formulier gedefinieerd staan.
         *
         * email: Is een verplicht veld, moet minimaal 3 karakters bevatten en maximaal 150 karakters lang
         *      en moet een valide email adres bevatten
         * Content: Is een verplicht veld, moet minimaal 5 karakters bevatten en maximaal 500 karakters lang
         */
        request()->validate([
            'email' => 'required|min:3|max:150|email',
            'content' => 'required|min:5|max:500',
        ]);

        // Prepareren van data voor de contacts tabel
        $contactModel = new Contact();
        $contactModel->email = request('email');
        $contactModel->content = request('content');

        // Nu slaan we de geprepareerde data op in de contacts tabel
        $contactModel->save();

        Mail::to(request('email'))->send(new ContactMail());

        // De pagina terug laten redirecten
        return redirect()->back();
    }
}
