@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<section class="py-10 bg-white">
    
    <div class="container mx-auto px-4 md:px-8 max-w-[1240px]">

        <div class="flex justify-center mb-8">
            <h2 class="text-zinc-800 text-4xl font-semibold font-['Poppins']">
                Katalog Produk
            </h2>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8 w-full">

            <div class="flex gap-3 flex-nowrap overflow-x-auto pb-2 w-full md:w-auto items-center scrollbar-hide mask-image-linear-gradient">
                
                <a href="{{ route('products.all') }}"
                   class="flex flex-shrink-0 items-center justify-center px-6 h-12 rounded-[50px] 
                          border-2 border-yellow-400 font-bold font-['Poppins'] text-sm 
                          transition-all duration-300 gap-2
                          {{ request()->routeIs('products.all') 
                             ? 'bg-orange-400 text-white shadow-md' 
                             : 'bg-white text-zinc-800 hover:bg-orange-400 hover:text-white' }}">
                    <i class="fas fa-th text-sm"></i> 
                    <span>Semua Produk</span>
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('products.category', $cat['slug']) }}"
                       class="flex flex-shrink-0 items-center justify-center px-6 h-12 rounded-[50px] 
                              border-2 border-yellow-400 font-bold font-['Poppins'] text-sm 
                              transition-all duration-300 gap-2
                              {{ (isset($currentSlug) && $currentSlug == $cat['slug']) 
                                 ? 'bg-orange-400 text-white shadow-md' 
                                 : 'bg-white text-zinc-800 hover:bg-orange-400 hover:text-[#FB9E3A]' }}">
                        
                        <i class="fas fa-cookie text-sm"></i>
                        <span>{{ $cat['name'] }}</span>
                    </a>
                @endforeach
            </div>

            <form action="{{ route('products.all') }}" method="GET" class="w-full md:w-[300px] flex-shrink-0">
                <div class="relative flex items-center w-full h-12
                            rounded-[50px] outline outline-3 outline-yellow-400
                            shadow-sm bg-white overflow-hidden transition-all focus-within:shadow-md">
                    
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search here..."
                           class="w-full h-full px-6 pr-12
                                  bg-transparent border-none focus:ring-0
                                  font-['Poppins'] text-zinc-800 text-sm placeholder:text-zinc-400">
                    <button type="submit" class="absolute right-4 w-6 h-6 flex justify-center items-center hover:scale-110 transition-transform">
                         <i class="fas fa-search text-zinc-800 text-md"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full h-[2px] bg-yellow-100 mb-8 rounded-full"></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 justify-items-center">
            @forelse($products as $product)
                <div class="flex flex-col w-full max-w-[380px] bg-white rounded-[35px] shadow-[0_4px_10px_rgba(0,0,0,0.1)] 
                            hover:-translate-y-2 hover:shadow-[0_10px_20px_rgba(0,0,0,0.15)] transition-all duration-300 
                            p-4 h-full border border-gray-100">
                    
                    <div class="relative w-full h-[220px] rounded-[25px] overflow-hidden mb-4 bg-gray-100">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex flex-col flex-grow gap-2 px-2">
                        <h3 class="font-['Poppins'] font-semibold text-xl text-zinc-800 line-clamp-1">
                            {{ $product['name'] }}
                        </h3>
                        
                        <p class="text-gray-500 font-['Poppins'] text-sm line-clamp-2 min-h-[40px]">
                            {{ $product['description'] }}
                        </p>

                        <div class="flex items-center justify-between mt-auto pt-3">
                            <span class="text-2xl font-bold text-orange-400 font-['Poppins']">
                                {{ $product['price'] }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-3">
                            <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product['name'] }}" target="_blank"
                               class="flex justify-center items-center h-10 rounded-xl border-2 border-[#FFD700] 
                                      text-zinc-800 font-bold text-sm hover:bg-[#FFD700] transition-colors">
                                Beli
                            </a>
                            <a href="{{ route('product.detail', $product['slug']) }}" 
                               class="flex justify-center items-center h-10 rounded-xl border-2 border-[#FFD700] 
                                      text-zinc-800 font-bold text-sm hover:bg-[#FFD700] transition-colors">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-gray-400 text-6xl mb-4"><i class="fas fa-box-open"></i></div>
                    <p class="text-gray-500 text-xl font-['Poppins']">Produk tidak ditemukan untuk kategori ini.</p>
                    <a href="{{ route('products.all') }}" class="mt-4 inline-block text-orange-500 font-bold hover:underline">Lihat Semua Produk</a>
                </div>
            @endforelse

        </div>

        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @endif

    </div>
</section>
@endsection