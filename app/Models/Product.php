<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $request_data)
 * @method static latest()
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'brand',
        'category',
        'description',
        'image'
    ];

    protected $appends = ['view'];

    public function getViewAttribute(): string
    {
        return route('products.show', $this->id);
    }
}
