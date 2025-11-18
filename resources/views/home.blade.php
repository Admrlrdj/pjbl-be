@extends('layouts.app')

@section('title', 'Nounoufood - Cemilan Berkualitas')

@section('content')

<!-- Hero Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        
        <!-- Grid 2 kolom -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            
            <!-- LEFT BADGE -->
            <div class="flex justify-center lg:justify-start">
                <div class="relative logo-blob w-[300px] h-[260px] md:w-[490px] md:h-[435px]">

                    <!-- Blob background -->
                    <div class="blob-bg absolute inset-0"></div>

                    <!-- Badge / banana logo -->
                    <div class="badge-image absolute inset-0"></div>
                </div>
            </div>

            <!-- RIGHT TEXT -->
            <div class="text-center lg:text-left">
                
                <!-- Title -->
                <h1 class="text-[40px] md:text-[64px] font-bold leading-[1.43] text-[#2C2C2C] max-w-[593px]">
                    Nounoufood pasti enaknya.
                </h1>

                <!-- Description -->
                <p class="mt-4 text-[18px] md:text-[20px] font-medium leading-[40px] text-[#2C2C2C] max-w-[550px]">
                    Jangan Ragu, Dijamin ketagihan! Temukan Cemilan, Makanan, dan minuman dengan rasa yang autentik yang selalu bikin harimu bersemangat!
                </p>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-8 mb-8">
    @foreach($stats as $stat)
    <div class="flex w-[161px] px-[19px] pt-[11px] pb-[8px] flex-col justify-center items-center rounded-[15px] border-[3px] border-[#FFD700] bg-white shadow-[0_4px_10px_rgba(0,0,0,0.25)]">
        
        <h3 class="flex w-[74.174px] h-[45px] flex-col justify-center text-[#FFD700] text-center font-poppins font-bold text-[32px] leading-[51.2px]">
            {{ $stat['value'] }}
        </h3>

<p class="flex w-[123px] h-[26px] flex-col justify-center 
    text-[#2C2C2C] text-center 
    font-poppins font-bold text-[14.4px] leading-[25.92px]">
    {{ $stat['label'] }}
</p>
    </div>
    @endforeach
</div>

            </div>

        </div>

    </div>
</section>


<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($features as $feature)
            <div class="bg-white border-2 border-gray-200 rounded-xl p-6 text-center hover-scale hover:shadow-lg transition">
                <div class="text-5xl mb-4">{{ $feature['icon'] }}</div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $feature['title'] }}</h3>
                <p class="text-sm text-gray-600">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Best Seller Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 relative">
        
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="flex w-[611px] h-[78px] flex-shrink-0 items-center justify-center 
                        rounded-full border-[4px] border-[#FFD700] bg-white 
                        drop-shadow-[0_5px_10px_rgba(0,0,0,0.30)]">
                
                <h2 class="text-3xl font-bold text-gray-800">
                    Produk <span class="text-primary">Best Seller</span> Kami
                </h2>
            </div>
        </div>
        
        <div class="bg-[#FFEB84] rounded-tl-[80px] rounded-tr-[30px] rounded-bl-[30px] rounded-br-[80px] 
                    shadow-lg p-8 pt-20 max-w-[990px] mx-auto flex-shrink-0">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-items-center">
                
                @foreach($bestSellers as $product)
                <div class="flex w-full max-w-[380px] h-[425px] flex-col items-start 
                            rounded-[35px] bg-white p-5 pb-[15px]
                            shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover-scale transition-transform">
                    
                    <div class="relative w-full flex-shrink-0">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" 
                             class="w-full h-[220px] object-cover rounded-2xl self-stretch flex-shrink-0"> 
                    </div>
                    
                    <h3 class="font-['Poppins'] font-semibold text-2xl text-[#2C2C2C] tracking-[-0.96px] mt-4 self-stretch flex-shrink-0">
                        {{ $product['name'] }}
                    </h3>
                    
                    <p class="text-[#2C2C2C] font-['Poppins'] text-base font-normal leading-[15px] tracking-[0.16px] mt-2">
                        {{ $product['description'] }}
                    </p>

                    <div class="flex-grow"></div>

                    <span class="text-2xl font-bold text-primary mb-3">{{ $product['price'] }}</span>
        
                    <div class="flex gap-[24px]">
                        
                        <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}" 
                           target="_blank"
                           class="flex w-[160px] h-[40px] py-[10px] px-6 justify-center items-center 
                                  flex-shrink-0 rounded-xl border-2 border-[#FFE34F] bg-white
                                  font-semibold text-gray-800 hover:bg-[#FFE34F] transition-colors">
                            Beli
                        </a>
                        
                        <a href="{{ route('product.detail', $product['slug']) }}" 
                           class="flex w-[160px] h-[40px] py-[10px] px-6 justify-center items-center 
                                  flex-shrink-0 rounded-xl border-2 border-[#FFE34F] bg-white
                                  font-semibold text-gray-800 hover:bg-[#FFE34F] transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>

<!-- Product Catalog Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Katalog Produk</h2>
            
            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <a href="{{ route('products.all') }}" 
                   class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-yellow-600 transition">
                    <i class="fas fa-th mr-2"></i> Semua Produk
                </a>
                @foreach($categories as $category)
                <a href="{{ route('products.category', $category['slug']) }}" 
                   class="bg-white border-2 border-gray-300 text-gray-700 px-6 py-2 rounded-full font-semibold hover:border-primary hover:text-primary transition">
                    <i class="fas fa-cookie mr-2"></i> {{ $category['name'] }} ({{ $category['product_count'] }})
                </a>
                @endforeach
            </div>
            
            <!-- Search Bar -->
            <div class="max-w-md mx-auto">
                <form action="{{ route('products.all') }}" method="GET">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari produk..." 
                               class="w-full border-2 border-gray-300 rounded-full px-6 py-3 pr-12 focus:outline-none focus:border-primary">
                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary text-white w-10 h-10 rounded-full hover:bg-yellow-600 transition">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
            @foreach($products->take(6) as $product)
            <div class="bg-white border-2 border-yellow-300 rounded-2xl overflow-hidden hover-scale shadow-lg">
                <div class="grid grid-cols-2 gap-4 p-4">
                    <a href="{{ route('product.detail', $product['slug']) }}">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="w-full h-40 object-cover rounded-xl">
                    </a>
                    <div class="flex flex-col justify-between">
                        <div>
                            <span class="inline-block bg-yellow-100 text-primary text-xs font-semibold px-2 py-1 rounded-full mb-2">
                                {{ $product['category'] }}
                            </span>
                            <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $product['name'] }}</h3>
                            <p class="text-gray-500 text-xs mb-1">{{ $product['size'] }}</p>
                            <p class="text-gray-600 text-sm mb-2">{{ $product['description'] }}</p>
                            <span class="text-xl font-bold text-primary">{{ $product['price'] }}</span>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}" 
                               target="_blank"
                               class="flex-1 bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold text-center hover:bg-yellow-600 transition">
                               Beli
                            </a>
                            <a href="{{ route('product.detail', $product['slug']) }}" 
                               class="flex-1 border-2 border-primary text-primary px-4 py-2 rounded-full text-sm font-semibold text-center hover:bg-primary hover:text-white transition">
                               Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="text-center">
            <a href="{{ route('products.all') }}" 
               class="inline-block bg-white border-2 border-primary text-primary px-8 py-3 rounded-full font-semibold hover:bg-primary hover:text-white transition">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-16 bg-gradient-to-br from-yellow-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Testimoni</h2>
            <p class="text-gray-600">Apa kata mereka tentang produk kami???</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testimonial)
            <div class="bg-{{ $index === 1 ? 'primary' : 'white' }} rounded-2xl p-8 shadow-lg hover-scale {{ $index === 1 ? 'transform scale-105' : '' }}">
                <div class="text-4xl mb-4 {{ $index === 1 ? 'text-white' : 'text-primary' }}">"</div>
                <p class="text-sm {{ $index === 1 ? 'text-white' : 'text-gray-700' }} mb-6 italic">{{ $testimonial['message'] }}</p>
                
                <div class="flex items-center justify-center mb-4">
                    <img src="{{ asset('images/avatars/' . $testimonial['avatar']) }}" 
                         alt="{{ $testimonial['name'] }}" 
                         class="w-16 h-16 rounded-full border-4 {{ $index === 1 ? 'border-white' : 'border-primary' }}" >
                                          </div>
                
                <div class="text-center">
                    <h4 class="font-bold {{ $index === 1 ? 'text-white' : 'text-gray-800' }}">{{ $testimonial['name'] }}</h4>
                    <p class="text-sm {{ $index === 1 ? 'text-white' : 'text-gray-600' }}">{{ $testimonial['role'] }}</p>
                    
                    <div class="flex justify-center gap-1 mt-3">
                        @for($i = 0; $i < $testimonial['rating']; $i++)
                        <i class="fas fa-star {{ $index === 1 ? 'text-white' : 'text-yellow-400' }}"></i>
                        @endfor
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Lokasi Kami</h2>
            <p class="text-gray-600">Kami Tunggu Kedatanganmu</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Hubungi Kami</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-whatsapp text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">WhatsApp (Only)</h4>
                            <a href="{{ $contact['whatsapp_url'] }}" target="_blank" class="text-primary hover:underline">
                                {{ $contact['whatsapp'] }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Email</h4>
                            <a href="mailto:{{ $contact['email'] }}" class="text-primary hover:underline">
                                {{ $contact['email'] }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-instagram text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Instagram</h4>
                            <a href="{{ $contact['instagram_url'] }}" target="_blank" class="text-primary hover:underline">
                                {{ $contact['instagram'] }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Alamat Produksi</h4>
                            <p class="text-gray-600 text-sm">{{ $contact['address'] }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Table Office</h4>
                            <p class="text-gray-600 text-sm">{{ $contact['table_office'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div class="relative">
                <div class="bg-yellow-100 rounded-3xl p-4 shadow-lg">
                    <div class="bg-white rounded-2xl overflow-hidden" style="height: 450px;">
                        <iframe 
                            src="{{ $contact['maps_embed'] }}"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ $contact['maps_url'] }}" 
                           target="_blank"
                           class="inline-block bg-primary text-white px-8 py-3 rounded-full font-semibold hover:bg-yellow-600 transition shadow-lg">
                            <i class="fas fa-directions mr-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection