<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'author',
        'publisher',
        'details'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Book', 'title', 'id');
    }
}
