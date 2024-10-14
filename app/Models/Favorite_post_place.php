<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite_post_place extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'company_id'];

}
