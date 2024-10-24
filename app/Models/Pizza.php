<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'pizzas_seite';

    // Specify the fillable attributes
    protected $fillable = [
        'PizzaName',
        'Preis',
        'Zutaten',
        'Beschreibung'
    ];
    public $timestamps = false;

}
