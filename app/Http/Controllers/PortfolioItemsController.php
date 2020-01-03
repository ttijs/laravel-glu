<?php

namespace App\Http\Controllers;

use App\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemsController extends Controller
{
    public function list()
    {
        $items = PortfolioItem::all();

        return view('my_work', ['items' => $items]);
    }

    public function item($slug)
    {
        $item = PortfolioItem::where('slug', $slug)->get();

        return view('portfolio-item', ['item' => $item[0]]);
    }
}
