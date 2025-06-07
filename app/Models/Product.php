<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'price_200_gram',
        'price_500_gram',
        'description',
        'img',
        'buy_link_description'
    ];
}
