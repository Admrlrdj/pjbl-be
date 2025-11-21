@extends('layouts.app')


@section('title', $product->name . ' - Nounoufood')

@section('content')

<!-- Logo + Garis -->
<section class="bg-white pt-6">
    <div class="container mx-auto px-4 text-center">
        <img src="/images/logonounou.png" class="aspect-video object-cover h-[200px] mx-auto" alt="">
        <div class="border-t-4 border-[#FFD700] mt-4 mb-6"></div>
    </div>
</section>

<!-- Breadcrumb  -->

<!-- Product Detail -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Single Product Image -->
            <div>
                <img src="{{ asset('images/products/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-96 object-cover rounded-2xl shadow-lg">
            </div>
            
            <!-- Product Info -->
            <div>
                <span class="inline-block bg-white text-primary border border-primary text-sm font-semibold px-4 py-2 rounded-full mb-4">
                    {{ $product->category->name }}
                </span>

                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    {{ $product->name }}
                </h1>

                <div class="mb-4">
                    <span class="text-gray-600">Ukuran:</span>
                    <span class="font-semibold text-gray-800">{{ $product->size }}</span>
                </div>

                <div class="mb-6">
                    <span class="text-4xl font-bold text-primary">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <div class="mb-6">
                    
                    <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                </div>

                <hr class="my-6">

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

                

        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-2 ">Rekomendasi produk</h2>
            <p class="text-gray-600">Anda mungkin juga suka produk ini</p>
             <div class="border-t-4 border-[#FFD700] mt-4 mb-6"></div>
        </div>
        
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($relatedProducts as $related)
    <div class="bg-white rounded-[24px] border-4 border-[#FFD700] w-[500px] h-[192px] flex p-5 gap-5 shadow-md">

    <!-- Image -->
    <a href="{{ route('product.detail', $related->slug) }}" class="flex-shrink-0">
        <img src="{{ asset('images/products/' . $related->image) }}"
             alt="{{ $related->name }}"
             class="w-[220px] h-[152px] object-cover rounded-[5px] shadow-md">
    </a>

    <!-- Content -->
    <div class="flex flex-col justify-between py-1 w-full">

        <!-- Title + Description -->
        <div>
            <h3 class="text-[20px] font-semibold text-[#2C2C2C] leading-tight">
                {{ $related->name }}
            </h3>
            <p class="text-[16px] text-[#2C2C2C] mt-1">
                {{ $related->size }}
            </p>
            <p class="text-[20px] font-bold text-[#FB9E3A] mt-2">
                Rp {{ number_format($related->price, 0, ',', '.') }}
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4 mt-3">

            <a href="https://wa.me/6281936810305?text=Halo, saya ingin memesan {{ $related->name }}"
               class="w-[100px] h-[40px] flex items-center justify-center bg-white border-2 border-[#FFD700] rounded-[12px] font-bold text-[#2C2C2C] shadow-sm hover:bg-yellow-50 transition">
               Beli
            </a>

            <a href="{{ route('product.detail', $related->slug) }}"
               class="w-[100px] h-[40px] flex items-center justify-center bg-white border-2 border-[#FFD700] rounded-[12px] font-bold text-[#2C2C2C] shadow-sm hover:bg-yellow-50 transition">
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
function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $product->name }}',
            text: '{{ $product->description }}',
            url: window.location.href
        });
    } else {
        navigator.clipboard.writeText(window.location.href);
        alert('Link produk disalin!');
    }
}
</script>
@endpush

 