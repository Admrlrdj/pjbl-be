<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;

class Console extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
