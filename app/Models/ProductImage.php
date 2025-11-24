<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
        'is_primary',
        'ordering',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/products/' . $this->image) : asset('images/no-image.png');
    }

    // Get thumbnail URL (you can create thumbs later)
    public function getThumbnailUrlAttribute()
    {
        return $this->image ? asset('storage/products/thumbs/' . $this->image) : asset('images/no-image.png');
    }

    // Delete image file when model is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            if ($image->image && Storage::disk('public')->exists('products/' . $image->image)) {
                Storage::disk('public')->delete('products/' . $image->image);
                
                // Delete thumbnail if exists
                if (Storage::disk('public')->exists('products/thumbs/' . $image->image)) {
                    Storage::disk('public')->delete('products/thumbs/' . $image->image);
                }
            }
        });
    }

    // Scope for primary image
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }
}