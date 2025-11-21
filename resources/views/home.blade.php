@extends('layouts.app')

@section('title', 'Nounoufood - Cemilan Berkualitas')

@section('content')

<!-- Hero Section -->
<section class="py-16 lg:w-[90%] mx-auto">
    <div class="container mx-auto px-4">
        
        <!-- Grid 2 kolom -->
        <div class="flex md:flex-row flex-col gap-8">
            
            <div class="flex justify-center lg:justify-center lg:w-1/2">
                <div class="relative logo-blob w-[300px] h-[260px] md:w-[490px] md:h-[435px]">

                    <div class="blob-bg absolute inset-0"></div>

                    <div class="badge-image absolute inset-0"></div>
                </div>
            </div>

            <!-- RIGHT TEXT -->
            <div class="text-center md:text-left md:w-1/2 flex flex-col justify-center">
                
                <!-- Title -->
                <h1 class="lg:text-5xl md:text-4xl text-3xl font-semibold mb-2">
                    Nounoufood pasti enaknya.
                </h1>

                <!-- Description -->
                <p class="lg:mt-4 mt-2 lg:text-lg md:text-md">
                    Jangan Ragu, Dijamin ketagihan! Temukan Cemilan, Makanan, dan minuman dengan rasa yang autentik yang selalu bikin harimu bersemangat!
                </p>

                <!-- Stats -->
                <div class="flex md:flex-row flex-col gap-4 mt-4 items-center">
                @foreach($stats as $stat)
                <div class="md:w-[200px] min-h-10 w-full border-4 flex flex-col items-center justify-center border-[#FFD700] gap-2 rounded-2xl text-center py-6 px-2 shadow-md">
        
                    <h3 class="text-3xl text-[#FFD700] font-bold">
                        {{ $stat['value'] }}
                    </h3>

                    <p class="text-md font-semibold">
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
<section class="py-16 bg-white md:w-[]">
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
<div class="flex items-start w-[90%] mx-auto justify-between gap-4 px-5 overflow-x-auto mb-5">

    <!-- Kategori List -->
    <div class="flex gap-4 flex-nowrap width-auto">
        <!-- Semua Produk (Active) -->
        <a href="{{ route('products.all') }}"
           class="
               px-7 py-3
               text-sm
               rounded-full
               border-2 border-[#FFD700]
               bg-white
               shadow-inner shadow-[inset_5px_8px_6px_rgba(0,0,0,0.30)]
               font-semibold text-[#2C2C2C] whitespace-nowrap
           ">
            <i class="fas fa-th mr-2"></i> Semua Produk
        </a>

        <!-- Dynamic Categories -->
        @foreach($categories as $category)
            <a href="{{ route('products.category', $category['slug']) }}"
                class="
                px-7 py-3
                text-sm
                rounded-full
                font-semibold text-[#2C2C2C] whitespace-nowrap
                transition
                   @if(request()->routeIs('products.category') && request()->route('slug') === $category['slug'])
                       border-2 border-[#FFD700] bg-white shadow-inner shadow-[inset_5px_8px_6px_rgba(0,0,0,0.30)]
                   @else
                       shadow-[5px_5px_6px_rgba(0,0,0,0.25)]
                   @endif
               ">
                <i class="fas fa-cookie mr-2"></i> {{ $category['name'] }}
            </a>
        @endforeach
    </div>

    <!-- Search Bar -->
    <form action="{{ route('products.all') }}" method="GET" class="flex-shrink-0">
    <div class="relative flex items-center w-[188px] h-[47px]
                rounded-[20px] border-[2px] border-[#FFD700]
                bg-white">

        <input type="text"
            name="search"
            placeholder="Search here"
            class="
                w-full h-full
                px-5 pr-12
                bg-transparent
                focus:outline-none
                rounded-[20px]
            "
        >

        <!-- Search Icon -->
        <button type="submit" class="absolute right-4 text-gray-600">
            <i class="fas fa-search"></i>
        </button>

    </div>
</form>

</div>

<div class="w-[1199px] h-[3px] bg-[#FFD700] mx-auto mb-8"></div>

<!-- Product Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 justify-items-center mb-8">

    @foreach($products->take(6) as $product)
    <div class="w-[579px] h-[192px] bg-white border-[4px] border-[#FFD700] rounded-[24px] shadow-lg flex p-4 mt-3 mb-2">

        <!-- Left: Image -->
        <a href="{{ route('product.detail', $product['slug']) }}">
            <img src="{{ $product['image'] }}"
                 alt="{{ $product['name'] }}"
                 class="w-[220px] h-[152px] object-cover rounded-[5px] shadow-md">
        </a>

        <!-- Right Content -->
        <div class="flex flex-col justify-between ml-4 flex-grow">

            <!-- Category → optional keep -->
            <span class="  px-2 py-1l mb-1">
              
            </span>

            <!-- Title -->
            <h3 class="text-[#2C2C2C] font-[Poppins] font-semibold text-[20px] leading-[0] tracking-[-0.8px]">
                {{ $product['name'] }}
            </h3>

            <!-- Size -->
            <!-- Description -->
            <p class="text-gray-600 text-[12px] mt-1">
                {{ $product['description'] }}
            </p>

            <!-- Price -->
            <span class="text-[#FB9E3A] font-[Poppins] text-[20px] font-bold">
                {{ $product['price'] }}
            </span>

            <!-- Buttons (20px gap) -->
            <div class="flex gap-[20px] mt-2">

                <!-- BUY -->
                <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}"
                   target="_blank"
                   class="w-[100px] h-[40px] flex items-center justify-center
                          border-2 border-[#FFD700] rounded-[12px]
                          bg-white font-semibold text-black text-[14px]
                          hover:bg-[#FFD700] hover:text-white transition">
                    Beli
                </a>

               
                <a href="{{ route('product.detail', $product['slug']) }}"
                   class="w-[100px] h-[40px] flex items-center justify-center
                          border-2 border-[#FFD700] rounded-[12px]
                          bg-white font-semibold text-black text-[14px]
                          hover:bg-[#FFD700] hover:text-white transition">
                    Detail
                </a>

            </div>
        </div>
    </div>
    @endforeach

</div>

<!-- Load More -->
<div class="text-center mt-6">
    <a href="{{ route('products.all') }}"
       class="inline-block bg-[FFD700] border-2 border-primary text-black  px-8 py-3 rounded-full font-semibold hover:bg-primary">
        Lihat Semua Produk
    </a>
</div>

<!-- Testimonial Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Testimoni Pelanggan</h2>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-start gap-10">

            @foreach($testimonials as $index => $t)

                @php
                    $isCenter = $index === 1; // box tengah
                @endphp

                <div class="
                    relative flex flex-col items-center text-center px-6 pt-16 pb-10
                    {{ $isCenter 
                        ? 'w-[415px] h-[290px] bg-[#FB9E3A] mt-0 rounded-[20px] shadow-lg'
                        : 'w-[368px] h-[290px] bg-white mt-10 rounded-[10px] shadow-[0_0_50px_rgba(0,0,0,0.20)]'
                    }}
                ">

                    <!-- Quote Icon -->
                    <img src="{{ asset('images/testimonials/quote.svg') }}"
                        class="w-[50px] h-[50px] absolute -top-6 left-1/2 -translate-x-1/2"
                        alt="Quote">

                    <!-- Avatar -->
                    <div class="absolute -bottom-10 left-1/2 -translate-x-1/2">
                        <img src="{{ asset('images/testimonials/' . $t->image) }}"
                            class="w-[70px] h-[70px] rounded-full border border-[#2C2C2C] object-cover">
                    </div>

                    <!-- Comment Text -->
                    <p class="{{ $isCenter ? 'text-white' : 'text-[#2C2C2C]' }}
                        text-[18px] leading-[30px] font-normal
                        text-center mt-4 px-2
                        h-[122px] overflow-hidden">
                        {{ $t->comment }}
                    </p>

                    <!-- Rating Stars -->
                    <div class="flex gap-1 mt-8"> <!-- dibuat lebih kebawah -->
                        @for($i = 0; $i < $t->rating; $i++)
                            <img src="{{ asset('images/testimonials/star.png') }}"
                                class="w-[18px] h-[18px]">
                        @endfor
                    </div>

                    <!-- Name -->
                    <div class="mt-14">
                        <p class="font-semibold text-[24px] leading-[34px] {{ $isCenter ? 'text-white' : 'text-[#2C2C2C]' }}">
                            {{ $t->name }}
                        </p>
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
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Lokasi Kami</h2>
            <p class="text-gray-600">Kami Tunggu Kedatanganmu</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start max-w-7xl mx-auto">
            
            <!-- Contact Info -->
           <div class="text-black"
     style="
        display: flex;
        width: 544px;
        padding-bottom: 16px;
        flex-direction: column;
        align-items: flex-start;
        gap: 15.3px;
     "
>
    <h3 class="text-2xl font-bold mb-2">Hubungi Kami</h3>

    <div class="space-y-6 w-full">

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fab fa-whatsapp text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">WhatsApp (Only)</h4>
                <a href="{{ $contact['whatsapp_url'] }}" target="_blank" class="text-yellow-300 hover:underline">
                    {{ $contact['whatsapp'] }}
                </a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-envelope text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">Email</h4>
                <a href="mailto:{{ $contact['email'] }}" class="text-yellow-300 hover:underline break-all">
                    {{ $contact['email'] }}
                </a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fab fa-instagram text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">Instagram</h4>
                <a href="{{ $contact['instagram_url'] }}" target="_blank" class="text-yellow-300 hover:underline">
                    {{ $contact['instagram'] }}
                </a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-map-marker-alt text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">Alamat Produksi</h4>
                <p class="text-yellow text-sm">{{ $contact['alamat'] }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-building text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">Toko Offline</h4>
                <p class="text-yellow text-sm">{{ $contact['toko_offline'] }}</p>
                <p class="text-yellow text-xs mt-1">Buka setiap hari: 10.00 - 21.00 WIB</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-star text-white text-lg"></i>
            </div>
            <div>
                <h4 class="font-semibold mb-1">Belanja Online</h4>
                <a href="https://shopee.com/Danggedang Official" target="_blank" class="text-yellow-300 hover:underline">
                    Shopee: Danggedang Official
                </a>
            </div>
        </div>

    </div>

</div>

            
            <!-- Map -->
<div class="flex">
    <div class="relative w-full">

        <!--FRAME -->
        <div class="overflow-hidden md:w-[450px] md:h-[450px] w-full aspect-square"
            style="
                border-radius: 15px;
                border: 3px solid #FFD700;
                box-shadow: inset 8px 12px 10px rgba(0, 0, 0, 0.25);
            "
        >
            <iframe 
                src="{{ $contact['maps_embed'] }}"
                width="100%" 
                height="100%"
                style="border:0; border-radius: 15px;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

            
                <a href="{{ $contact['maps_url'] }}" target="_blank" class="absolute bottom-4 left-1/2 -translate-x-1/2 px-7 py-3 rounded-full border-3 border-[#FFD700] bg-white shadow-xl text-xs font-bold text-[#2c2c2c] whitespace-nowrap">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Buka di Google Maps
                </a>

        </div>
    </div>
</div>

</section>

@endsection