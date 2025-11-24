<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'rating',
    'comment',
    'image',
    'avatar',
    'product_id',
    'show_on_home',
];

public function product()
{
    return $this->belongsTo(Product::class);
}

}
