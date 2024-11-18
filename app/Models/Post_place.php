<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_place extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'description', 'image', 'address', 'average_rating', 'aproximate_place'];

    public function company()
    {
        return $this->belongsTo(company_id::class, 'company_id');
    }

    public function ratings()
    {
    return $this->hasMany(Rating::class, 'post_place_id');
    }

    public function updateAverageRating()
    {
        $averageRating = $this->ratings()->avg('rating');
        $this->average_rating = $averageRating;
        $this->save();
    }
}
