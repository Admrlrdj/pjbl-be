<?php

namespace App\Http\Controllers;

use App\Livewire\Admin\Testimonials;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
         $testimoniCount = Testimonial::where('rating', '>', 4)->count();
        // Stats
       $stats = [
        [
            'value' => $testimoniCount . '+', 
            'label' => 'Pelanggan Puas', 
            'modal_target' => null,
            'scroll_to' => 'testimonials' 
        ],
        [
            'value' => Product::count() . '+', 
            'label' => 'Varian Produk', 
            'modal_target' => null,
            'scroll_to' => 'products'
        ],
        [
            'value' => '✓', 
            'label' => 'Halal', 
            'modal_target' => 'halal-modal' // ID Modal target
        ],
    ];

        // Features
        $features = [
            ['icon' => '🏆', 'title' => 'Kualitas Terjamin', 'description' => 'Bahan premium, rasa konsisten'],
            ['icon' => '🚀', 'title' => 'Pelayanan Kilat', 'description' => 'Respon cepat, siap melayani Anda'],
            ['icon' => '🛡️', 'title' => 'Halal & Aman', 'description' => 'Aman dikonsumsi, bersih & Islamiah'],
            ['icon' => '🎯', 'title' => 'Pilihan Lengkap', 'description' => 'Aneka rasa dan menu, penuhi selera'],
        ];

        // Best Sellers (2 produk teratas berdasarkan ordering)
       $bestSellers = Product::with('category')
    ->where('is_best_seller', true)
    ->orderBy('ordering', 'asc')
    ->take(2)
    ->get()
    ->map(function ($product) {
        return [
            'id'          => $product->id,
            'name'        => $product->name,
            'description' => \Illuminate\Support\Str::limit($product->description, 60),
            'size'        => $product->size,
            'price'       => $product->formatted_price,
            'image'       => $product->image 
                ? asset('images/products/' . $product->image)
                : null,
            'slug'        => $product->slug,
            'category'    => $product->category->name ?? 'Uncategorized',
            'category_id' => $product->category_id,
        ];
    });

        // All products (untuk katalog)
        $products = Product::with('category')
            ->orderBy('ordering', 'asc')
            ->get()
            ->map(function ($product) {
                return [
                    'id'          => $product->id,
                    'name'        => $product->name,
                    'description' => \Illuminate\Support\Str::limit($product->description, 60),
                    'size'        => $product->size,
                    'price'       => $product->formatted_price,
                    'image'       => $product->image 
                        ? asset('images/products/' . $product->image)
                        : null,
                    'slug'        => $product->slug,
                    'category'    => $product->category->name ?? 'Uncategorized',
                    'category_id' => $product->category_id,
                ];
            });


        // Categories
        $categories = Category::with('products')
            ->orderBy('ordering', 'asc')
            ->get()
            ->map(function ($category) {
                return [
                    'id'            => $category->id,
                    'name'          => $category->name,
                    'slug'          => $category->slug,
                    'product_count' => $category->products->count(),
                ];
            });

        
       $testimonials = Testimonial::orderBy('id', 'asc')->take(3)->get();
       $testimonials = Testimonial::where('show_on_home', true)->get();
         $location = Location::first();
        // Contact info
        $contact = [

            'whatsapp'      => '+62 819-3611-0396',
            'whatsapp_url'  => 'https://wa.me/6281936110396',
            'email'         => 'nastiticahayagemilang@gmail.com',
            'instagram'     => '@danggedang_official',
            'instagram_url' => 'https://instagram.com/danggedang_official',
            'alamat'       => 'Taman Cimanggu, Kota Bogor, Jawa Barat',
            'toko_offline'  => 'Botani Square, Bogor',
            'maps_url'      => $location?->maps_url ?? 'https://www.google.com/maps/place/Bogor,+West+Java',
    'maps_embed'    => $location?->maps_embed ?? 'https://www.google.com/maps/embed?...',
        ];
       


        return view('home', compact(
            'stats',
            'features',
            'bestSellers',
            'products',
            'categories',
            'testimonials',
            'contact'
        ));
    }

    public function ourStory()
    {
        return view('our-story', ['pageTitle' => 'Our Story - Nounoufood']);
    }

   public function faq()
{
    $pageTitle = 'FAQ - Nounoufood';

    $faqs = \App\Models\FAQ::orderBy('id', 'asc')->get();

    return view('faq', compact('pageTitle', 'faqs'));
}

    public function contact()
    {
        $pageTitle = 'Contact Us - Nounoufood';

        $contact = [
          
        ];

        return view('contact', compact('pageTitle', 'contact'));
    }

    public function productDetail($slug)
    {   
        
        // Produk detail tanpa images[]
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        // Related products (same category)
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('ordering', 'asc')
            ->limit(4)
            ->get();

        $pageTitle = $product->name . ' - Nounoufood';

        return view('product-detail', compact('pageTitle', 'product', 'relatedProducts'));
    }
     
   // ... namespace dan use statements

public function productsByCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->orderBy('ordering', 'asc')
            ->paginate(12)
            ->through(function ($product) {
       
                return [
                    'id'          => $product->id,
                    'name'        => $product->name,
                    'slug'        => $product->slug,
                    'description' => \Illuminate\Support\Str::limit($product->description, 60),
                    'price'       => $product->formatted_price, 
                    'image'       => $product->image 
                                     ? asset('images/products/' . $product->image) 
                                     : 'https://placehold.co/400x300', 
                    'category'    => $product->category,
                ];
            });

        $categories = Category::with('products')
            ->orderBy('ordering', 'asc')
            ->get();

        return view('catalog', [
            'pageTitle'   => $category->name . ' - Nounoufood',
            'category'    => $category,
            'products'    => $products,
            'categories'  => $categories,
            'currentSlug' => $categorySlug
        ]);
    }

    public function allProducts(Request $request)
    {
        $query = Product::with('category');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->orderBy('ordering', 'asc')
            ->paginate(12)
            ->through(function ($product) {
                // Transformasi data yang sama
                return [
                    'id'          => $product->id,
                    'name'        => $product->name,
                    'slug'        => $product->slug,
                    'description' => \Illuminate\Support\Str::limit($product->description, 60),
                    'price'       => $product->formatted_price,
                    'image'       => $product->image 
                                     ? asset('images/products/' . $product->image) 
                                     : 'https://placehold.co/400x300',
                    'category'    => $product->category,
                ];
            });

        $categories = Category::with('products')->orderBy('ordering', 'asc')->get();

        return view('catalog', [
            'pageTitle'   => 'All Products - Nounoufood',
            'products'    => $products,
            'categories'  => $categories,
            'currentSlug' => null
        ]);
    }
}
