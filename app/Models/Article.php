<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Article extends Model
{
    use Rateable;

    public $table = 'articles';

    protected $fillable = [
        'title', 'body', 'date', 'author',
    ];
}
