<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Stats untuk hero section
        $stats = [
            [
                'value' => '103+',
                'label' => 'Pelanggan Puas'
            ],
            [
                'value' => Product::count() . '+',
                'label' => 'Varian Produk'
            ],
            [
                'value' => '100%',
                'label' => 'Halal'
            ]
        ];

        // Features section
        $features = [
            [
                'icon' => '🏆',
                'title' => 'Kualitas Terjamin',
                'description' => 'Bahan premium, rasa konsisten'
            ],
            [
                'icon' => '🚀',
                'title' => 'Pelayanan Kilat',
                'description' => 'Respon cepat, siap melayani Anda'
            ],
            [
                'icon' => '🛡️',
                'title' => 'Halal & Aman',
                'description' => 'Aman dikonsumsi, bersih & Islamiah'
            ],
            [
                'icon' => '🎯',
                'title' => 'Pilihan Lengkap',
                'description' => 'Aneka rasa dan menu, penuhi selera'
            ]
        ];

        // Best Seller Products (ambil produk yang paling banyak gambarnya sebagai featured)
      // 1. Best Sellers
    // Hapus with('images') dan withCount('images')
    $bestSellers = Product::with('category') 
        // Hapus sorting by images_count karena relasinya tidak dipakai
        ->orderBy('ordering', 'asc') 
        ->limit(2)
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'size' => $product->size,
                'price' => $product->price, // Asumsi accessor ini tetap ada
                
                // PERUBAHAN UTAMA:
                // Ambil langsung dari kolom 'image' dan tambahkan path folder
                'image' => $product->image ? asset('images/products/' . $product->image) : null, 
                
                'slug' => $product->slug,
                'category' => $product->category->name ?? 'Uncategorized',
            ];
        });

    // 2. All Products untuk catalog
    $products = Product::with('category')
        ->orderBy('ordering', 'asc')
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => \Illuminate\Support\Str::limit($product->description, 60),
                'size' => $product->size,
                'price' => $product->formatted_price,
                
                // PERUBAHAN UTAMA:
                'image' => $product->image ? asset('images/products/' . $product->image) : null,
                
                'slug' => $product->slug,
                'category' => $product->category->name ?? 'Uncategorized',
                'category_id' => $product->category_id,
            ];
        });

    // 3. Categories (Tidak berubah, karena logicnya sudah benar)
    $categories = Category::with('products')
        ->orderBy('ordering', 'asc')
        ->get()
        ->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'product_count' => $category->products->count(),
            ];
        });

        // Testimonials
        $testimonials = [
            [
                'name' => 'Kalis Puteri',
                'role' => 'Pemilik Snopsis',
                'message' => 'Makasih basreng jalan nagih! Pada dapet jadinya nomor chat berani juga!!',
                'rating' => 5,
                'avatar' => 'avatar1.jpg'
            ],
            [
                'name' => 'Faiza',
                'role' => 'Pemilik Warung Mie',
                'message' => 'Enak pisang varian Coklat pedas tuh Sumpah nagih banget pasti nyesel kalo gak ngerasain penuh!',
                'rating' => 5,
                'avatar' => 'avatar2.jpg'
            ],
            [
                'name' => 'Dita Mellita',
                'role' => 'Pemilik Snopsis',
                'message' => 'Orangnya baik dan teliti. Cari infonya produk di web gampang, jadi inginin balik chat admin lagi',
                'rating' => 5,
                'avatar' => 'avatar3.jpg'
            ]
        ];

        // Contact Info
        $contact = [
            'whatsapp' => '+62 819-3681-0305',
            'whatsapp_url' => 'https://wa.me/6281936810305',
            'email' => 'hastikatrianggrainiis@gmail.com',
            'instagram' => '@nounoufood',
            'instagram_url' => 'https://instagram.com/nounoufood',
            'address' => 'Jl.Hman Dremayu Kota Bogor, Jawa Barat',
            'table_office' => 'Jl.Bank Syariah Bogor',
            'maps_url' => 'https://www.google.com/maps/place/Bogor,+West+Java',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60503526016!2d106.72311!3d-6.597147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b5e3%3A0x25a12f0f97fac4ee!2sBogor%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1234567890',
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
        $pageTitle = 'Our Story - Nounoufood';
        
        return view('our-story', compact('pageTitle'));
    }

    public function faq()
    {
        $pageTitle = 'FAQ - Nounoufood';
        
        // FAQ Data
        $faqs = [
            [
                'question' => 'Apakah produk Nounoufood halal?',
                'answer' => 'Ya, semua produk Nounoufood dijamin halal dan menggunakan bahan-bahan berkualitas yang aman dikonsumsi.'
            ],
            [
                'question' => 'Bagaimana cara memesan produk?',
                'answer' => 'Anda bisa memesan melalui WhatsApp di nomor +62 819-3681-0305 atau langsung datang ke lokasi kami.'
            ],
            [
                'question' => 'Apakah ada minimum order?',
                'answer' => 'Tidak ada minimum order. Anda bisa memesan sesuai kebutuhan Anda.'
            ],
            [
                'question' => 'Berapa lama waktu pengiriman?',
                'answer' => 'Untuk wilayah Bogor, pengiriman biasanya 1-2 hari kerja. Untuk luar Bogor akan disesuaikan dengan jarak.'
            ],
            [
                'question' => 'Apakah bisa menjadi reseller?',
                'answer' => 'Tentu! Kami membuka kesempatan untuk mitra dan reseller. Silakan hubungi kami untuk informasi lebih lanjut.'
            ],
            [
                'question' => 'Bagaimana cara penyimpanan produk?',
                'answer' => 'Untuk produk frozen, simpan di freezer. Untuk snack kering, simpan di tempat kering dan tertutup rapat.'
            ],
        ];

        return view('faq', compact('pageTitle', 'faqs'));
    }

    public function contact()
    {
        $pageTitle = 'Contact Us - Nounoufood';
        
        $contact = [
            'whatsapp' => '+62 819-3681-0305',
            'whatsapp_url' => 'https://wa.me/6281936810305',
            'email' => 'hastikatrianggrainiis@gmail.com',
            'instagram' => '@nounoufood',
            'instagram_url' => 'https://instagram.com/nounoufood',
            'address' => 'Jl.Hman Dremayu Kota Bogor, Jawa Barat',
            'table_office' => 'Jl.Bank Syariah Bogor',
            'maps_url' => 'https://www.google.com/maps/place/Bogor,+West+Java',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60503526016!2d106.72311!3d-6.597147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b5e3%3A0x25a12f0f97fac4ee!2sBogor%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1234567890',
        ];

        return view('contact', compact('pageTitle', 'contact'));
    }

    public function productDetail($slug)
    {
        // Ambil product berdasarkan slug
        $product = Product::with(['category', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Related products (same category, exclude current product)
        $relatedProducts = Product::with(['category', 'images'])
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
        // Ambil category berdasarkan slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Ambil products dalam category
        $products = Product::with(['category', 'images'])
            ->where('category_id', $category->id)
            ->orderBy('ordering', 'asc')
            ->get();

        // All categories untuk filter
        $categories = Category::with('products')
            ->orderBy('ordering', 'asc')
            ->get();

        $pageTitle = $category->name . ' - Nounoufood';

        return view('products-by-category', compact('pageTitle', 'category', 'products', 'categories'));
    }

    public function allProducts(Request $request)
    {
        $query = Product::with(['category', 'images']);

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->orderBy('ordering', 'asc')->paginate(12);

        // All categories untuk filter
        $categories = Category::with('products')
            ->orderBy('ordering', 'asc')
            ->get();

        $pageTitle = 'All Products - Nounoufood';

        return view('all-products', compact('pageTitle', 'products', 'categories'));
    }
}