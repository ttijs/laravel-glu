<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_items')->insert([
            [
                'title' => 'Avengers Artwork',
                'slug' => 'avengers-artwork',
                'description' => 'Dit is een korte beschrijving',
                'body' => 'Dit is de body',
                'image' => 'img/avengers_artwork.jpg'
            ],
            [
                'title' => 'Avengers',
                'slug' => 'avengers',
                'description' => 'Dus',
                'body' => 'Dit is een body',
                'image' => 'img/avengers_artwork2.jpg'
            ],
            [
                'title' => 'Avengers 3',
                'slug' => 'avengers-3',
                'description' => 'De derde',
                'body' => 'Dit is een body voor de derde',
                'image' => 'img/avengers_artwork3.jpg'
            ],
            [
                'title' => 'Marvel',
                'slug' => 'marvel',
                'description' => 'Omschrijving van Marvel',
                'body' => 'Marvel body',
                'image' => 'img/marvel.jpg'
            ],
        ]);
    }
}
