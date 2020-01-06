<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:5|max:1000',
            'author' => 'required|min:2|max:150',
        ]);

        Blog::create($data);

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
         */
//        $blog = Blog::find($blogId);

        /**
         * findOrFail(): Als de model een niet bestaande blogId op probeert te halen
         * dan wordt er een nette 404 | error pagina getoond
         */
//        $blog = Blog::findOrFail($blogId);

        return view('blog.show', ['blog' => $blog]);
    }
}
