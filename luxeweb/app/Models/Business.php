<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'dealer_id', 'name', 'state', 'address', 'web_address', 'card', 'hours', 'description', 'keywords', 'phone_number', 'facebook', 'twitter', 'instagram', 'images', 'is_approved'
    ];
    protected $casts = [
        'images' => 'array',
        'keywords' => 'array'
    ];
}
