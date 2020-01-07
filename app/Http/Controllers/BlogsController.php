<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::where('active', $request->query('active', 1))->get();

        return view('blog.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        $blog = new Blog();

        return view('blog.create', compact('blog'));
    }

    /**
     * Met store() schrijven we gegevens weg naar de database.
     */
    public function store()
    {
        Blog::create($this->getValidateData());

        // Na het opslaan wordt de gebruiker weer terug gestuurd naar de url /blog
        return redirect('/blog');
    }

    /**
     * Omdat het een veel voorkomende taak is om 1 item op te halen
     * van de database, kun je in de show() een argument opgeven dat meteen
     * de $blog variabele vult met het Blog object.
     *
     * Op deze manier hoef je niet steeds find() of findOrFail() aan te roepen!
     */
    public function show(Blog $blog)
    {
        /**
         * find(): Als de model een niet bestaande blogId op probeert te halen
         * dan krijg je een lelijke error pagina van Laravel. Dit willen we niet
         * omdat het rauwe code van de template getoond wordt.
         *
         * find() werkt alleen op basis van een ID
         */
//        $blog = Blog::find($blogId);

        /**
         * findOrFail(): Als de model een niet bestaande blogId op probeert te halen
         * dan wordt er een nette 404 | error pagina getoond
         *
         * findOrFail() werkt enkel op basis van een ID
         */
//        $blog = Blog::findOrFail($blogId);

        return view('blog.show', ['blog' => $blog]);
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog)
    {
//        $data = $this->getValidateData();
//        dd($data);

        /**
         * Het verschil ten opzichte van store() is dat we een bestaande blog willen updaten
         * en geen nieuwe blog aan willen maken.
         */
        $blog->update($this->getValidateData());

        // Na het opslaan wordt de gebruiker weer terug gestuurd naar de url /blog
        return redirect('/blog');
    }

    protected function getValidateData()
    {
        /**
         * Met request()->validate() kun je validatie toepassen op velden die in
         * het formulier gedefinieerd staan.
         *
         * Title: Is een verplicht veld, moet minimaal 5 karakters bevatten en maximaal 200 karakters lang
         * Content: Is een verplicht veld, moet minimaal 5 karakters bevatten en maximaal 1000 karakters lang
         * Author: Is een verplicht veld, moet minimaal 2 karakters bevatten en maximaal 150 karakters lang
         */
        $data = request()->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:5|max:1000',
            'author' => 'required|min:2|max:150',
            'active' => '',
        ]);

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        return $data;
    }
}
