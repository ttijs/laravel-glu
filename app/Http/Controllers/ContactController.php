<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function post()
    {
        // Voor meer informatie zie: https://laravel.com/docs/5.7/validation
        request()->validate([
            'email' => 'required|min:3|max:150',
            'content' => 'required|min:5|max:500',
        ]);

        // Prepareren van data voor de contacts tabel
        $contactModel = new Contact();
        $contactModel->email = request('email');
        $contactModel->content = request('content');

        // Nu slaan we de geprepareerde data op in de contacts tabel
        $contactModel->save();

        // De pagina terug laten redirecten
        return redirect()->back();
    }
}
