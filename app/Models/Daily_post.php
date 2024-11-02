<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_post extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'description',
    ];

    public function files()
    {
        return $this->hasMany(Post_File::class, 'daily_post_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'daily_post_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'daily_post_id');
    }
}
