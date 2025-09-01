<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'qty',
        'type',
        'vendor',
        'image',
        'tags',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'qty'   => 'integer',
    ];
}
