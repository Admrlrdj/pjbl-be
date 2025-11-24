@extends('layouts.app')

@section('title', $product->name . ' - Nounoufood')

@section('content')
<section class="lg:w-[80%] w-[90%] mx-auto">
  <img src="/images/logonounou.png" class="aspect-video object-cover h-[200px] mx-auto " alt="">
  <div class="border-t-4 border-[#FFD700] mb-10"></div>

 <div class="flex w-full gap-8 mb-10 flex-col lg:flex-row">

    <!-- Product Image -->
    <div class="lg:w-1/2">
      <img 
        src="{{ asset('images/products/' . $product->image) }}" 
        class="lg:w-[500] h-[400]  rounded-[30px] shadow-md object-cover object-center mb-8 mx-auto lg:mb-0" 
        alt="{{ $product->name }}">
    </div>

    <!-- Product Info -->
    <div class="lg:w-1/2">
      <h1 class="text-4xl font-semibold mb-3">{{ $product->name }}</h1>

      <h6 class="text-2xl font-bold text-[#FB9E3A] mb-2">
        Rp{{ number_format($product->price, 0, ',', '.') }}
      </h6>

      <p class="tracking-wide text-justify leading-7 text-[#2c2c2c] mb-10">
        {{ $product->description }}
      </p>

      <a 
            href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $product->name }}" 
            class="lg:px-16 py-2 px-8 text-lg font-semibold text-gray-800 bg-white border-2 border-[#FFD700] rounded-xl shadow-md hover:bg-yellow-400 hover:text-[#ffd700] transition"
        >
            Buy Now
        </a>
    </div>

  </div>

  <!-- Product Recommended -->
 <div class="w-full py-3" x-data="{ current: 0 }">
    <h1 class="md:text-4xl text-3xl font-semibold text-center mb-5">Product Recommended</h1>

    <div class="border-t-4 border-[#FFD700] mb-10"></div>

    <!-- Wrapper Slider -->
    <div class="relative overflow-hidden">

        <!-- Slider Items -->
        <div class="flex transition-transform duration-500"
             :style="'transform: translateX(-' + (current * 100) + '%)'">

            @foreach($relatedProducts as $related)
            <div class="min-w-full px-4">
                <div class="rounded-2xl border-4 border-[#FFD700] flex lg:flex-row flex-col p-3 gap-4">

                    <img 
                        src="{{ asset('images/products/' . $related->image) }}"
                        alt="{{ $related->name }}"
                        class="lg:w-2/5 w-full object-cover object-center rounded-xl lg:max-h-40 max-h-[180px]">

                    <div class="flex flex-col items-start lg:w-3/5 w-full">

                        <h1 class="text-xl font-semibold mb-2">{{ $related->name }}</h1>

                        <p class="line-clamp-2 text-[#2c2c2c] text-sm mb-4">
                            {{ $related->description }}
                        </p>

                        <p class="text-lg font-semibold">
                            Rp{{ number_format($related->price, 0, ',', '.') }}
                        </p>

                        <div class="flex items-start gap-3 mt-2">

                            <a 
                                href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $related->name }}"
                                class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-yellow-400 rounded-xl border-2 shadow-md hover:bg-yellow-400 hover:text-[#FFD700] transition">
                                Buy
                            </a>

                            <a 
                                href="{{ route('product.detail', $related->slug) }}"
                                class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-yellow-400 rounded-xl border-2 shadow-md hover:bg-[#FFAE00] hover:text-[#FFD700] transition">
                                Detail
                            </a>

                        </div>

                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <!-- Navigation Buttons -->
        <button 
            x-show="current > 0" 
            @click="current--"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#FFD700] text-black px-3 py-1 rounded-full shadow">
            ‹
        </button>

        <button 
            x-show="current < {{ count($relatedProducts) - 1 }}" 
            @click="current++"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#FFD700] text-black px-3 py-1 rounded-full shadow">
            ›
        </button>

        <!-- Dots -->
        <div class="flex justify-center mt-4 gap-2">
            @foreach($relatedProducts as $index => $p)
                <div  
                    class="w-3 h-3 rounded-full cursor-pointer"
                    :class="current === {{ $index }} ? 'bg-[#FFD700]' : 'bg-gray-300'"
                    @click="current = {{ $index }}">
                </div>
            @endforeach
        </div>

    </div>

</div>

</section>
@endsection
<style>
  /* Tailwind CSS line-clamp plugin alternative */
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
</style>