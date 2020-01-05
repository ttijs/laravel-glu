<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
//    /**
//     * Onderstaand moet je toevoegen omdat standaard Mass Protection aan staat
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'title',
//        'content',
//        'author',
//    ];

    /**
     * Onderstaand geeft aan dat op geen van alle velden van de blog tabel
     * Mass protected is. Voorwaarde is dat $fillable uitgecomment staat.
     *
     * @var array
     */
    protected $guarded = [];
}
