<?php

namespace App\Http\Controllers;

use App\Livewire\Admin\Testimonials;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // Stats
        $stats = [
            ['value' => '103+', 'label' => 'Pelanggan Puas'],
            ['value' => Product::count() . '+', 'label' => 'Varian Produk'],
            ['value' => '100%', 'label' => 'Halal'],
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
            ->orderBy('ordering', 'asc')
            ->limit(2)
            ->get()
            ->map(function ($product) {
                return [
                    'id'          => $product->id,
                    'name'        => $product->name,
                    'description' => $product->description,
                    'size'        => $product->size,
                    'price'       => $product->formatted_price,
                    'image'       => $product->image 
                        ? asset('images/products/' . $product->image)
                        : null,
                    'slug'        => $product->slug,
                    'category'    => $product->category->name ?? 'Uncategorized',
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

        // Contact info
        $contact = [
            'whatsapp'      => '+62 819-3611-0396',
            'whatsapp_url'  => 'https://wa.me/6281936110396',
            'email'         => 'nastiticahayagemilang@gmail.com',
            'instagram'     => '@danggedang_official',
            'instagram_url' => 'https://instagram.com/danggedang_official',
            'alamat'       => 'Taman Cimanggu, Kota Bogor, Jawa Barat',
            'toko_offline'  => 'Botani Square, Bogor',
            'maps_url'      => 'https://www.google.com/maps/place/Bogor,+West+Java',
            'maps_embed'    => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60503526016!2d106.72311!3d-6.597147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b5e3%3A0x25a12f0f97fac4ee!2sBogor%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1234567890',
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
            'whatsapp'      => '+62 819-3681-0305',
            'whatsapp_url'  => 'https://wa.me/6281936810305',
            'email'         => 'hastikatrianggrainiis@gmail.com',
            'instagram'     => '@nounoufood',
            'instagram_url' => 'https://instagram.com/nounoufood',
            'address'       => 'Jl.Hman Dremayu Kota Bogor, Jawa Barat',
            'table_office'  => 'Jl.Bank Syariah Bogor',
            'maps_url'      => 'https://www.google.com/maps/place/Bogor,+West+Java',
            'maps_embed'    => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60503526016!2d106.72311!3d-6.597147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b5e3%3A0x25a12f0f97fac4ee!2sBogor%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1234567890',
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
     
    public function productsByCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->orderBy('ordering', 'asc')
            ->get();

        $categories = Category::with('products')
            ->orderBy('ordering', 'asc')
            ->get();

        return view('products-by-category', [
            'pageTitle' => $category->name . ' - Nounoufood',
            'category'  => $category,
            'products'  => $products,
            'categories'=> $categories,
        ]);
    }

    public function allProducts(Request $request)
    {
        $query = Product::with('category');

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->orderBy('ordering', 'asc')->paginate(12);

        $categories = Category::with('products')->orderBy('ordering', 'asc')->get();

        return view('all-products', [
            'pageTitle' => 'All Products - Nounoufood',
            'products'  => $products,
            'categories'=> $categories,
        ]);
    }
}
