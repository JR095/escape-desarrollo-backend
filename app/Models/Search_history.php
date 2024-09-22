<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_history extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'search_term',
        'user_id',
        'searched_at'
    ];
}
