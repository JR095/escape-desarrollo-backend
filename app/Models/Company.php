<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'user_type_id',
        'category_id',
        'sub_categories_id',
        'email',
        'description',
        'image',
        'canton_id',
        'district_id',
        'latitude',
        'longitude',
        'followers_count',
        'password',
        'whatsapp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canton()
    {
        return $this->belongsTo(Canton::class, 'canton_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
