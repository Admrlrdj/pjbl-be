@extends('layouts.app')

@section('title', 'Nounoufood - Cemilan Berkualitas')

@section('content')

<!-- Hero Section -->
<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="flex md:flex-row flex-col gap-8 lg:gap-16 items-center">
        
        <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative logo-blob w-[300px] h-[260px] md:w-[490px] md:h-[435px]">
                <div class="blob-bg absolute inset-0"></div>
                <div class="badge-image absolute inset-0"></div>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col justify-center text-left">
            
            <h1 class="lg:text-5xl md:text-4xl text-3xl font-bold mb-4 text-gray-900 leading-tight">
                Nounoufood pasti enaknya.
            </h1>

            <p class="text-gray-600 lg:text-lg md:text-md leading-relaxed mb-8">
                Jangan Ragu, dijamin ketagihan! temukan cemilan, makanan, dan minuman dengan rasa yang autentik yang selalu bikin harimu bersemangat!
            </p>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
    @foreach($stats as $stat)
        @if($stat['modal_target'])
            <button onclick="toggleModal('{{ $stat['modal_target'] }}')"
               class="w-full border-[3px] border-[#FFD700] rounded-2xl flex flex-col items-center justify-center py-4 px-2 shadow-sm hover:shadow-md hover:bg-yellow-50 transition-all bg-white cursor-pointer group">
                <h3 class="text-3xl md:text-4xl text-[#FFD700] font-bold group-hover:scale-110 transition-transform">
                    {{ $stat['value'] }}
                </h3>
                <p class="text-sm md:text-base font-semibold text-gray-700 mt-1">
                    {{ $stat['label'] }} <span class="text-xs text-blue-500 block">(Lihat Sertifikat)</span>
                </p>
            </button>
        @else
            {{-- Item Statistik Biasa (Div statis) --}}
            <div class="w-full border-[3px] border-[#FFD700] rounded-2xl flex flex-col items-center justify-center py-4 px-2 shadow-sm bg-white">
                <h3 class="text-3xl md:text-4xl text-[#FFD700] font-bold">
                    {{ $stat['value'] }}
                </h3>
                <p class="text-sm md:text-base font-semibold text-gray-700 mt-1">
                    {{ $stat['label'] }}
                </p>
            </div>
        @endif
    @endforeach
</div>
<!--Modal halal--->
<div id="halal-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" onclick="toggleModal('halal-modal')"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-t-8 border-[#FFD700]">
            
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                
                <div class="w-full">
                    <h3 class="text-2xl font-bold leading-6 text-gray-900 mb-2" id="modal-title">
                        Dokumen Sertifikasi Halal
                    </h3>
                    <div class="h-1 w-20 bg-[#FFD700] rounded mb-4"></div> <p class="text-sm text-gray-500 mb-6">
                        Nounoufood berkomitmen menjaga kehalalan produk. Berikut adalah dokumen resmi sertifikasi kami yang dapat Anda unduh atau lihat:
                    </p>
                    
                    <div class="flex flex-col gap-3">
                        @php
                            // Sesuaikan 'filename' dengan nama file asli di folder public/sertifikat_halal Anda
                            $documents = [
                                ['label' => 'Sertifikat Halal Utama', 'filename' => 'halaldanggedang.pdf'],
                                ['label' => 'Sertifikat Halal Minuman', 'filename' => 'halalminuman.pdf'],
                                ['label' => 'Sertifikat Halal Keripik', 'filename' => 'halalkeripik.pdf'],
                            
                            ];
                        @endphp

                        @foreach($documents as $doc)
                            {{-- Fungsi asset() otomatis mengarah ke folder public --}}
                            <a href="{{ asset('sertifikat_halal/' . $doc['filename']) }}" 
                               target="_blank" 
                               class="flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:bg-[#FFE34F]/20 hover:border-[#FFD700] transition-all group">
                                
                                <div class="flex items-center gap-4">
                                    <div class="bg-red-50 p-2 rounded-lg">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-800 group-hover:text-black block">{{ $doc['label'] }}</span>
                                        <!-- <span class="text-xs text-gray-400 font-mono">{{ $doc['filename'] }}</span> -->
                                    </div>
                                </div>

                                <svg class="w-5 h-5 text-gray-300 group-hover:text-[#FFD700] transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100">
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-100 sm:mt-0 sm:w-auto transition-colors" onclick="toggleModal('halal-modal')">
                    Tutup
                </button>
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
        
         <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10 w-full px-4">
            <div class="flex w-full max-w-[611px] h-[90px] sm:h-[70px] md:h-[78px] mx-auto
                        items-center justify-center mb-4
                        rounded-full border-[3px] md:border-[4px] border-[#FFD700] bg-white 
                        drop-shadow-[0_5px_10px_rgba(0,0,0,0.30)] px-4">
                
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 text-center">
                    Produk <span class="text-primary">Best Seller</span> Kami
                </h2>
            </div>
        </div>
        
      <div class="bg-[#FFE34F] rounded-tl-[40px] md:rounded-tl-[80px] 
                    rounded-tr-[20px] md:rounded-tr-[30px] 
                    rounded-bl-[20px] md:rounded-bl-[30px] 
                    rounded-br-[40px] md:rounded-br-[80px] 
                   shadow-lg p-5 sm:p-7 md:p-9 pt-18 sm:pt-22 md:pt-24 pb-8 sm:pb-10 md:pb-12
                    max-w-[990px] max- mx-auto">
            
           <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 justify-items-center">

                @foreach($bestSellers as $product)
                <div class="flex flex-col justify-start items-start gap-3 sm:gap-4 
                            w-full max-w-[380px] px-4 sm:px-5 pt-4 sm:pt-5 pb-3 sm:pb-3.5 
                            bg-white rounded-[25px] sm:rounded-[35px] 
                            shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]
                            hover:scale-[1.02] transition-transform duration-300">

                    <img src="{{ $product['image'] }}" 
                         alt="{{ $product['name'] }}"
                         class="w-full h-[180px] sm:h-[200px] md:h-[220px] 
                                rounded-[15px] sm:rounded-[20px] object-cover shadow-sm">

                    <div class="w-full flex flex-col justify-start items-start gap-2 sm:gap-3.5">
                        <div class="w-full text-zinc-800 text-xl sm:text-2xl font-semibold font-['Poppins'] truncate">
                            {{ $product['name'] }}
                        </div>

                        <div class="w-full text-zinc-800 text-sm sm:text-base font-normal font-['Poppins'] 
                                    leading-tight tracking-tight line-clamp-2 min-h-[36px] sm:min-h-[40px]">
                            {{ $product['description'] }}
                        </div>

                        <div class="w-full text-orange-400 text-xl sm:text-2xl font-semibold font-['Poppins'] leading-8 sm:leading-10">
                            {{ $product['price'] }}
                        </div>
                    </div>

                    <div class="w-full flex justify-between items-center gap-3 sm:gap-5 mt-auto">
                        <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}" 
                           target="_blank"
                           class="flex-1 h-9 sm:h-10 px-4 sm:px-6 py-2 sm:py-2.5 
                                  rounded-lg sm:rounded-xl border-2 border-[#FFD700] 
                                  flex justify-center items-center 
                                  text-zinc-800 text-sm sm:text-base font-bold font-['Poppins'] 
                                  hover:bg-[#FFD700] transition-colors duration-300">
                            Beli
                        </a>

                        <a href="{{ route('product.detail', $product['slug']) }}" 
                           class="flex-1 h-9 sm:h-10 px-4 sm:px-6 py-2 sm:py-2.5 
                                  rounded-lg sm:rounded-xl border-2 border-[#FFD700] 
                                  flex justify-center items-center 
                                  text-zinc-800 text-sm sm:text-base font-bold font-['Poppins'] whitespace-nowrap
                                  hover:bg-[#FFD700] transition-colors duration-300">
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
<section class="py-10 bg-white">
    
    <div class="container mx-auto px-4 md:px-8 max-w-[1240px]">

        <!-- Title -->
        <div class="flex justify-center mb-6 sm:mb-8">
            <h2 class="text-zinc-800 text-2xl sm:text-3xl md:text-4xl font-semibold font-['Poppins'] text-center">
                Katalog Produk
            </h2>
        </div>

        <!-- Filter & Search - Responsive -->
        <div class="flex flex-col lg:flex-row items-center justify-between gap-4 mb-6 sm:mb-8 w-full">

            <!-- Category Tabs - Horizontal Scroll on Mobile -->
            <div class="flex gap-2 sm:gap-3 flex-nowrap overflow-x-auto pb-2 w-full lg:w-auto items-center scrollbar-hide">
                
                <a href="{{ route('products.all') }}"
                   class="flex flex-shrink-0 items-center justify-center px-4 sm:px-6 h-10 sm:h-12 
                          rounded-[50px] border-2 border-[#FFD700] font-bold font-['Poppins'] 
                          text-xs sm:text-sm transition-all duration-300 gap-2
                          {{ request()->routeIs('products.all') 
                             ? 'bg-orange-400 text-white shadow-md' 
                             : 'bg-white text-zinc-800 hover:bg-[#FB9E3A] hover:text-white' }}">
                    <i class="fas fa-th text-xs sm:text-sm"></i> 
                    <span>Semua Produk</span>
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('products.category', $cat['slug']) }}"
                       class="flex flex-shrink-0 items-center justify-center px-4 sm:px-6 h-10 sm:h-12 
                              rounded-[50px] border-2 border-[#FFD700] font-bold font-['Poppins'] 
                              text-xs sm:text-sm transition-all duration-300 gap-2
                              {{ (isset($currentSlug) && $currentSlug == $cat['slug']) 
                                 ? 'bg-orange-400 text-white shadow-md' 
                                 : 'bg-white text-zinc-800 hover:bg-orange-400 hover:text-[#FB9E3A]' }}">
                        
                        <i class="fas fa-cookie text-xs sm:text-sm"></i>
                        <span>{{ $cat['name'] }}</span>
                    </a>
                @endforeach
            </div>

            <!-- Search Box - Full width on mobile -->
            <form action="{{ route('products.all') }}" method="GET" class="w-full lg:w-[300px] flex-shrink-0">
                <div class="relative flex items-center w-full h-10 sm:h-12
                            rounded-[50px] outline outline-2 sm:outline-3 outline-yellow-400
                            shadow-sm bg-white overflow-hidden transition-all focus-within:shadow-md">
                    
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search here..."
                           class="w-full h-full px-4 sm:px-6 pr-10 sm:pr-12
                                  bg-transparent border-none focus:ring-0
                                  font-['Poppins'] text-zinc-800 text-xs sm:text-sm placeholder:text-zinc-400">

                    <button type="submit" class="absolute right-3 sm:right-4 w-5 sm:w-6 h-5 sm:h-6 
                                                 flex justify-center items-center hover:scale-110 transition-transform">
                         <i class="fas fa-search text-zinc-800 text-sm sm:text-md"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <!-- Divider - Responsive Width -->
    <div class="w-[90%] sm:w-[95%] lg:w-[1199px] h-[2px] sm:h-[3px] bg-[#FFD700] mx-auto mb-6 sm:mb-8"></div>

    <!-- Product Grid - RESPONSIVE -->
    <div class="container mx-auto px-4 md:px-8 max-w-[1240px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 justify-items-center mb-6 sm:mb-8">

            @foreach($products->take(6) as $product)
            <div class="w-full max-w-[540px] bg-white border-[3px] sm:border-[4px] border-[#FFD700]
                        rounded-[15px] sm:rounded-[20px] shadow-lg flex flex-col sm:flex-row p-3 sm:p-4">
                
                <!-- Image - Full width on mobile, fixed width on desktop -->
                <a href="{{ route('product.detail', $product['slug']) }}" class="w-full sm:w-auto flex-shrink-0">
                    <img src="{{ $product['image'] }}"
                         alt="{{ $product['name'] }}"
                         class="w-full sm:w-[180px] md:w-[220px] 
                                h-[180px] sm:h-[130px] md:h-[152px] 
                                object-cover rounded-[10px] sm:rounded-[5px] shadow-md">
                </a>

                <!-- Content - Full width on mobile, flex on desktop -->
                <div class="flex flex-col justify-between mt-3 sm:mt-0 sm:ml-3 md:ml-4 flex-grow">

                    <!-- Title -->
                    <h3 class="text-[#2C2C2C] font-[Poppins] font-semibold 
                               text-lg sm:text-[18px] md:text-[20px] 
                               leading-tight sm:leading-[0] tracking-[-0.8px] mb-2 sm:mb-0">
                        {{ $product['name'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-xs sm:text-[11px] md:text-[12px] mt-1 sm:mt-1 line-clamp-2">
                        {{ $product['description'] }}
                    </p>

                    <!-- Price -->
                    <span class="text-[#FB9E3A] font-[Poppins] text-lg sm:text-[18px] md:text-[20px] 
                                 font-bold mt-2 sm:mt-1">
                        {{ $product['price'] }}
                    </span>

                    <!-- Buttons - Responsive -->
                    <div class="flex gap-3 sm:gap-[15px] md:gap-[20px] mt-3 sm:mt-2">

                        <!-- Buy Button -->
                        <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}"
                           target="_blank"
                           class="flex-1 sm:w-[90px] md:w-[100px] h-9 sm:h-[36px] md:h-[40px] 
                                  flex justify-center items-center rounded-lg sm:rounded-xl 
                                  border-2 border-[#FFD700] text-zinc-800 font-bold 
                                  text-xs sm:text-sm hover:bg-[#FFD700] transition-colors">
                            Beli
                        </a>

                        <!-- Detail Button -->
                        <a href="{{ route('product.detail', $product['slug']) }}"
                           class="flex-1 sm:w-[90px] md:w-[100px] h-9 sm:h-[36px] md:h-[40px] 
                                  flex justify-center items-center rounded-lg sm:rounded-xl 
                                  border-2 border-[#FFD700] text-zinc-800 font-bold 
                                  text-xs sm:text-sm hover:bg-[#FFD700] transition-colors">
                            Detail
                        </a>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Load More Button - Responsive -->
        <div class="text-center mt-6">
            <a href="{{ route('products.all') }}"
               class="inline-block bg-[FFD700] border-2 border-primary text-black 
                      px-6 sm:px-8 py-2.5 sm:py-3 rounded-full font-semibold 
                      text-sm sm:text-base hover:bg-[#FB9E3A] transition-colors">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>


   <div class="w-[90%] sm:w-[95%] lg:w-[1199px] h-[2px] sm:h-[3px] bg-[#FFD700] mx-auto mb-6 sm:mb-8"></div>

<!-- Product Grid -->

<!-- Testimonial Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Testimoni Pelanggan</h2>
        </div>

        @php
            $totalTestimonials = count($testimonials);
        @endphp

        @if($totalTestimonials === 0)
    <div class="text-center py-16">
         <div class="col-span-full text-center py-20">
                    <div class="text-gray-400 text-6xl mb-4"><i class="fa-regular fa-comment"></i></div>
                    <p class="text-gray-500 text-xl font-['Poppins']">Belum ada testimoni yang tersedia</p>
    </div>

        @elseif($totalTestimonials === 1)
            {{-- Single Testimonial --}}
            <div class="flex justify-center">
              <div class="inline-flex flex-col justify-start items-center gap-3.5 w-96 bg-[#FB9E3A] rounded-[20px] border-2 border-gray-200 p-6 text-white">
                    <div class="self-stretch flex flex-col justify-start items-center gap-3.5">
                        <div class="self-stretch flex flex-col justify-start items-center gap-2.5">
                            <!-- Quote Icon -->
                            <div class="size-12 relative overflow-hidden">
                                <img src="{{ asset('images/testimonials/quote.svg') }}"
                                    class="w-10 h-8 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                    alt="Quote">
                            </div>
                            
                            <!-- Comment Text -->
                            <div class="self-stretch h-32 text-center text-white text-lg font-normal font-['Poppins'] leading-8">
                                {{ $testimonials[0]->comment }}
                            </div>
                        </div>
                        
                        <!-- Rating Stars -->
                        <div class="flex gap-1">
                            @for($i = 0; $i < $testimonials[0]->rating; $i++)
                                <div class="size-4 relative overflow-hidden">
                                    <img src="{{ asset('images/testimonials/star.png') }}"
                                        class="size-3.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                </div>
                            @endfor
                        </div>
                    </div>
                    
                    <!-- Avatar & Name -->
                    <div class="w-28 flex flex-col justify-start items-center gap-3.5">
                        <img src="{{ asset('images/testimonials/' . $testimonials[0]->image) }}"
                            class="size-14 rounded-full border border-white object-cover">
                        
                        <div class="self-stretch flex flex-col justify-start items-center">
                            <div class="w-36 text-center text-white text-2xl font-semibold font-['Poppins'] leading-8">
                                {{ $testimonials[0]->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($totalTestimonials === 2)
            {{-- Two Testimonials --}}
          <div class="flex flex-wrap justify-center items-start gap-10">
                @foreach($testimonials as $t)
                    <div class="inline-flex flex-col justify-start items-center gap-3.5 w-96 bg-white rounded-[10px] border-2 border-gray-200 p-6">
                        <div class="self-stretch flex flex-col justify-start items-center gap-3.5">
                            <div class="self-stretch flex flex-col justify-start items-center gap-2.5">
                                <!-- Quote Icon -->
                                <div class="size-12 relative overflow-hidden">
                                    <img src="{{ asset('images/testimonials/quote.svg') }}"
                                        class="w-10 h-8 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                        alt="Quote">
                                </div>
                                
                                <!-- Comment Text -->
                                <div class="self-stretch h-32 text-center text-zinc-800 text-lg font-normal font-['Poppins'] leading-8">
                                    {{ $t->comment }}
                                </div>
                            </div>
                            
                            <!-- Rating Stars -->
                            <div class="flex gap-1">
                                @for($i = 0; $i < $t->rating; $i++)
                                    <div class="size-4 relative overflow-hidden">
                                        <img src="{{ asset('images/testimonials/star.png') }}"
                                            class="size-3.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                    </div>
                                @endfor
                            </div>
                        </div>
                        
                        <!-- Avatar & Name -->
                        <div class="w-28 flex flex-col justify-start items-center gap-3.5">
                            <img src="{{ asset('images/testimonials/' . $t->image) }}"
                                class="size-14 rounded-full border border-white object-cover">
                            
                            <div class="self-stretch flex flex-col justify-start items-center">
                                <div class="w-36 text-center text-zinc-800 text-2xl font-semibold font-['Poppins'] leading-8">
                                    {{ $t->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @elseif($totalTestimonials === 3)
           <div class="flex flex-nowrap justify-center items-start gap-6 w-full">
                @foreach($testimonials as $index => $t)
                    @php
                        $isCenter = $index === 1;
                    @endphp

                   <div class="flex flex-col flex-shrink-0 w-1/3 max-w-[28rem] justify-start items-center gap-3.5 transition-all duration-300 cursor-pointer testimonial-card
    {{ $isCenter 
        ? 'bg-[#FB9E3A] rounded-[20px] border-2 border-gray-200 p-6 text-[#ffd700]'
        : 'bg-white rounded-[10px] border-2 border-gray-200 p-6 mt-10'
    }}
"data-index="{{ $index }}">
                        <div class="self-stretch flex flex-col justify-start items-center gap-3.5">
                            <div class="self-stretch flex flex-col justify-start items-center gap-2.5">
                                <!-- Quote Icon -->
                                <div class="size-12 relative overflow-hidden">
                                    <img src="{{ asset('images/testimonials/quote.svg') }}"
                                        class="w-10 h-8 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                        alt="Quote">
                                </div>
                                
                                <!-- Comment Text -->
                                <div class="self-stretch h-32 text-center {{ $isCenter ? 'text-white' : 'text-zinc-800' }} text-lg font-normal font-['Poppins'] leading-8">
                                    {{ $t->comment }}
                                </div>
                            </div>
                            
                            <!-- Rating Stars -->
                            <div class="flex gap-1">
                                @for($i = 0; $i < $t->rating; $i++)
                                    <div class="size-4 relative overflow-hidden">
                                        <img src="{{ asset('images/testimonials/star.png') }}"
                                            class="size-3.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                    </div>
                                @endfor
                            </div>
                        </div>
                        
                        <!-- Avatar & Name -->
                        <div class="w-28 flex flex-col justify-start items-center gap-3.5">
                            <img src="{{ asset('images/testimonials/' . $t->image) }}"
                                class="size-14 rounded-full border border-white object-cover">
                            
                            <div class="self-stretch flex flex-col justify-start items-center">
                               <div class="w-36 text-center {{ $isCenter ? 'text-white' : 'text-zinc-800' }} text-2xl font-semibold font-['Poppins'] leading-8">
                                    {{ $t->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            {{-- More than 3 Testimonials - Marquee Slider --}}
            <div class="relative overflow-hidden py-4" id="testimonialSlider">
                <div class="testimonial-track flex gap-10">
                    @foreach($testimonials as $index => $t)
                        <div class="testimonial-slide flex-shrink-0">
                            @php
                                $isCenter = $index % 3 === 1;
                            @endphp

                            <div class="inline-flex flex-col justify-start items-center gap-3.5 w-96 transition-all duration-300 cursor-pointer testimonial-card
                                {{ $isCenter 
                                    ? 'bg-[#FB9E3A] rounded-[20px] border-2 border-gray-200 p-6'
                                    : 'bg-white rounded-[10px] border-2 border-gray-200 p-6 mt-10'
                                }}
                            " data-index="{{ $index }}">
                                <div class="self-stretch flex flex-col justify-start items-center gap-3.5">
                                    <div class="self-stretch flex flex-col justify-start items-center gap-2.5">
                                        <!-- Quote Icon -->
                                        <div class="size-12 relative overflow-hidden">
                                            <img src="{{ asset('images/testimonials/quote.svg') }}"
                                                class="w-10 h-8 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                                alt="Quote">
                                        </div>
                                        
                                        <!-- Comment Text -->
                                        <div class="self-stretch h-32 text-center {{ $isCenter ? 'text-white' : 'text-zinc-800' }} text-lg font-normal font-['Poppins'] leading-8">
                                            {{ $t->comment }}
                                        </div>
                                    </div>
                                    
                                    <!-- Rating Stars -->
                                    <div class="flex gap-1">
                                        @for($i = 0; $i < $t->rating; $i++)
                                            <div class="size-4 relative overflow-hidden">
                                                <img src="{{ asset('images/testimonials/star.png') }}"
                                                    class="size-3.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <!-- Avatar & Name -->
                                <div class="w-28 flex flex-col justify-start items-center gap-3.5">
                                    <img src="{{ asset('images/testimonials/' . $t->image) }}"
                                        class="size-14 rounded-full border border-white object-cover">
                                    
                                    <div class="self-stretch flex flex-col justify-start items-center">
                                        <div class="w-36 text-center {{ $isCenter ? 'text-white' : 'text-zinc-800' }} text-2xl font-semibold font-['Poppins'] leading-8">
                                            {{ $t->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Dots -->
                <!-- <div class="flex justify-center gap-2 mt-20" id="sliderDots">
                    @for($i = 0; $i < ceil($totalTestimonials / 3); $i++)
                        <button class="slider-dot w-3 h-3 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-[#FB9E3A] w-8' : 'bg-gray-300' }}"
                            data-index="{{ $i }}"></button>
                    @endfor
                </div>
            </div> -->

            <style>
                @keyframes marquee {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(-50%);
                    }
                }
                
                .testimonial-track {
                    animation: marquee 15s linear infinite;
                }
                
                .testimonial-track:hover {
                    animation-play-state: paused;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const slider = document.getElementById('testimonialSlider');
                    if (!slider) return;

                    const track = slider.querySelector('.testimonial-track');
                    const slides = Array.from(track.children);

                    // Duplicate slides for infinite marquee effect
                    slides.forEach(slide => {
                        const clone = slide.cloneNode(true);
                        track.appendChild(clone);
                    });

                    // Query all cards after cloning
                    const allCards = slider.querySelectorAll('.testimonial-card');

                    allCards.forEach(card => {
                        // Event Mouse Enter (Hover)
                        card.addEventListener('mouseenter', function() {
                            // Pause marquee animation
                            track.style.animationPlayState = 'paused';

                            // Check if this card is already active (orange)
                            if (this.classList.contains('bg-[#FB9E3A]')) return;

                            // Reset all cards to default (white)
                            allCards.forEach(c => {
                                // Reset container styles
                                c.classList.remove('bg-[#FB9E3A]', 'rounded-[20px]');
                                c.classList.add('bg-white', 'rounded-[10px]', 'mt-10');

                                // Reset text colors
                                const texts = c.querySelectorAll('.text-white');
                                texts.forEach(p => {
                                    p.classList.remove('text-white');
                                    p.classList.add('text-zinc-800');
                                });
                            });

                            // Set hovered card to active (orange)
                            this.classList.remove('bg-white', 'rounded-[10px]', 'mt-10');
                            this.classList.add('bg-[#FB9E3A]', 'rounded-[20px]');

                            // Set text colors to white
                            const myTexts = this.querySelectorAll('.text-zinc-800');
                            myTexts.forEach(p => {
                                p.classList.remove('text-zinc-800');
                                p.classList.add('text-white');
                            });
                        });

                        // Event Mouse Leave
                        card.addEventListener('mouseleave', function() {
                            // Resume marquee animation
                            track.style.animationPlayState = 'running';
                        });
                    });
                });
            </script>
        @endif

    </div>
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Lokasi Kami</h2>
            <p class="text-gray-600">Kami Tunggu Kedatanganmu</p>
        </div>

        <!-- Wrapper grid agar center -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start place-items-center">

            <!-- Contact Info -->
            <div class="text-black w-full max-w-md">
                <h3 class="text-2xl font-bold mb-4">Hubungi Kami</h3>

                <div class="space-y-6">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
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
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
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
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
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
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Alamat Produksi</h4>
                            <p class="text-yellow text-sm">{{ $contact['alamat'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-building text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Toko Offline</h4>
                            <p class="text-yellow text-sm">{{ $contact['toko_offline'] }}</p>
                            <p class="text-yellow text-xs mt-1">Buka setiap hari: 10.00 - 21.00 WIB</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
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
            <div class="flex justify-center w-full">
                <div class="relative md:w-[475px] md:h-[455px] w-full max-w-md overflow-hidden"
                    style="
                        border-radius: 15px;
                        border: 3px solid #FFD700;
                        box-shadow: inset 8px 12px 10px rgba(0,0,0,0.25);
                    ">
                    
                    <iframe 
                        src="{{ $contact['maps_embed'] }}"
                        width="100%"
                        height="100%"
                        class="rounded-lg"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>

                    <a href="{{ $contact['maps_url'] }}" 
                        target="_blank" 
                        class="absolute bottom-4 left-1/2 -translate-x-1/2 px-7 py-3 rounded-full border-3 border-[#FFD700] bg-white shadow-xl text-xs font-bold text-[#2c2c2c]">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Buka di Google Maps
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>


@endsection