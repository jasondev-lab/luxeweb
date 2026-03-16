<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'inventory', 'short_description', 'full_description', 'link', 'etsy_link', 'status', 'images', 'category_id', 'sold', 'email_button', 'ebay_button'
    ];
    protected $casts = [
        'images' => 'array'
    ];
}
