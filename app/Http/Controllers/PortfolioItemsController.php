<?php

namespace App\Http\Controllers;

use App\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemsController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::all();

        return view('my_work.index', ['items' => $items]);
    }

    public function show($slug)
    {
        $item = PortfolioItem::where('slug', $slug)->get();

        return view('my_work.show', ['item' => $item[0]]);
    }
}
