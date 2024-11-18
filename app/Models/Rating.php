<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['post_place_id', 'user_id', 'rating'];

    public function post_place()
    {
        return $this->belongsTo(Post_place::class, 'post_place_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}