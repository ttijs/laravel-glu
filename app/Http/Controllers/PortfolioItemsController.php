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

    /**
     * $slug is een woord dat opgezocht wordt in de tabel portfolio_items.
     * Onder water wordt de volgende query uitgevoerd: select * from portfolio_items where slug = $slug
     */
    public function show($slug)
    {
        $item = PortfolioItem::where('slug', $slug)->get();

        return view('my_work.show', ['item' => $item[0]]);
    }
}
