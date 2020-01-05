<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blog', ['blogs' => $blogs]);
    }

    public function post()
    {
        $data = request()->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:5|max:1000',
            'author' => 'required|min:2|max:150',
        ]);

        Blog::create($data);

        return redirect()->back();
    }
}
