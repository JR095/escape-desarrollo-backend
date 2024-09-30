<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_File extends Model
{
    use HasFactory;

    protected $fillable = [
        'daily_post_id',
        'file_path',
        'file_type',
    ];

    protected $table = 'post_files';

    public function post()
    {
        return $this->belongsTo(Daily_post::class, 'daily_post_id');
    }
}
