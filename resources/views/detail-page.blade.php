@extends('layouts.app')

@section('title', $product->name . ' - Nounoufood')

@section('content')

<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="container mx-auto px-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('products.category', $product->category->slug) }}" class="text-gray-700 hover:text-primary">
                            {{ $product->category->name }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Product Images -->
            <div>
                @if($product->images->count() > 0)
                    <!-- Main Image -->
                    <div class="mb-4">
                        <img id="mainImage" 
                             src="{{ $product->main_image }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-96 object-cover rounded-2xl shadow-lg">
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    @if($product->images->count() > 1)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                        <div class="cursor-pointer hover-scale" 
                             onclick="changeMainImage('{{ $image->image_url }}')">
                            <img src="{{ $image->image_url }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-24 object-cover rounded-lg border-2 {{ $loop->first ? 'border-primary' : 'border-gray-200' }} hover:border-primary transition">
                        </div>
                        @endforeach
                    </div>
                    @endif
                @else
                    <div class="w-full h-96 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-image text-gray-400 text-6xl mb-4"></i>
                            <p class="text-gray-500">No image available</p>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Product Info -->
            <div>
                <!-- Category Badge -->
                <span class="inline-block bg-yellow-100 text-primary text-sm font-semibold px-4 py-2 rounded-full mb-4">
                    {{ $product->category->name }}
                </span>
                
                <!-- Product Name -->
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                
                <!-- Size -->
                <div class="mb-4">
                    <span class="text-gray-600">Ukuran: </span>
                    <span class="font-semibold text-gray-800">{{ $product->size }}</span>
                </div>
                
                <!-- Price -->
                <div class="mb-6">
                    <span class="text-4xl font-bold text-primary">{{ $product->formatted_price }}</span>
                </div>
                
                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                </div>
                
                <!-- Divider -->
                <hr class="my-6">
                
                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product->name }}" 
                       target="_blank"
                       class="block w-full bg-green-500 text-white text-center px-6 py-4 rounded-full font-semibold hover:bg-green-600 transition shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i> Pesan via WhatsApp
                    </a>
                    
                    <button onclick="shareProduct()" 
                            class="block w-full bg-blue-500 text-white text-center px-6 py-4 rounded-full font-semibold hover:bg-blue-600 transition shadow-lg">
                        <i class="fas fa-share-alt mr-2"></i> Bagikan Produk
                    </button>
                </div>
                
                <!-- Product Info Cards -->
                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <i class="fas fa-shield-alt text-primary text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">100% Halal</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <i class="fas fa-truck text-primary text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">Fast Delivery</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <i class="fas fa-star text-primary text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">Best Quality</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Produk Terkait</h2>
            <p class="text-gray-600">Anda mungkin juga suka produk ini</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $related)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover-scale">
                <a href="{{ route('product.detail', $related->slug) }}">
                    <img src="{{ $related->main_image }}" 
                         alt="{{ $related->name }}" 
                         class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <span class="inline-block bg-yellow-100 text-primary text-xs font-semibold px-2 py-1 rounded-full mb-2">
                        {{ $related->category->name }}
                    </span>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $related->name }}</h3>
                    <p class="text-gray-500 text-sm mb-2">{{ $related->size }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-xl font-bold text-primary">{{ $related->formatted_price }}</span>
                        <a href="{{ route('product.detail', $related->slug) }}" 
                           class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-yellow-600 transition">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
    // Change main image on thumbnail click
    function changeMainImage(imageUrl) {
        document.getElementById('mainImage').src = imageUrl;
        
        // Update border on thumbnails
        document.querySelectorAll('.grid img').forEach(img => {
            if (img.src === imageUrl) {
                img.classList.remove('border-gray-200');
                img.classList.add('border-primary');
            } else {
                img.classList.remove('border-primary');
                img.classList.add('border-gray-200');
            }
        });
    }
    
    // Share product function
    function shareProduct() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $product->name }}',
                text: '{{ $product->description }}',
                url: window.location.href
            }).then(() => {
                console.log('Thanks for sharing!');
            }).catch(console.error);
        } else {
            // Fallback: copy to clipboard
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link produk telah disalin!');
            });
        }
    }
</script>
@endpush