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

    // Puedes especificar el nombre de la tabla si es diferente de la convención de Laravel
    protected $table = 'post_files'; // Asegúrate de que el nombre sea correcto

    public function post()
    {
        return $this->belongsTo(Daily_post::class, 'daily_post_id');
    }
}
