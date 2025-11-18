<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index($productId)
    {
        // Check if product exists
        $product = Product::findOrFail($productId);
        
        return view('back.pages.admin.product-images', [
            'pageTitle' => 'Product Images - ' . $product->name,
            'productId' => $productId,
        ]);
    }
}