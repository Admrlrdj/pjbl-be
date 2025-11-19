@extends('layouts.app')

@section('title', 'Nounoufood - Our Story')

@section('content')
<section class="w-[80%] mx-auto">
  <img src="/images/logonounou.png" class="aspect-video object-cover h-[200px] mx-auto" alt="">
  <div class="border-t-4 border-[#FFD700] mb-10"></div>
  <main class="flex flex-col-reverse md:flex-row space-x-2 mb-8">
    <article class="md:w-1/2 pt-10">
      <h3 class="text-5xl font-bold mb-8 lg:mb-5">Our Story</h3>
      <p class="tracking-wide text-justify leading-7 text-[#2c2c2c] font-medium">Kisah kami berawal dari semangat yang besar dengan modal yang sangat terbatas hanya Rp100.000 untuk menciptakan keripik pisang dengan dua varian rasa unik. Dari dapur rumahan, usaha ini terus berkembang dan dikenal dengan nama Danggedang, yang kini bertransformasi menjadi identitas online kami, Nounoufood.id. Kisah perjuangan ini adalah fondasi kami, yang membuktikan bahwa kualitas terbaik lahir dari ketekunan.</p>
    </article>
    <div class="md:w-1/2">
      <img src="/images/pisang.png" class="md:w-[70%] w-[90%] mx-auto" alt="">
    </div>
  </main>
  <div class="w-full rounded-xl p-8 bg-[#FFE34F]/70 shadow-xl mb-10">
    <p class="tracking-wide text-justify leading-7 text-[#2c2c2c] font-semibold mb-7">Setelah mengenal perjalanan kami, kami yakin Anda juga memiliki semangat yang sama! Jangan hanya menjadi penikmat, kini saatnya Anda menjadi bagian dari keluarga besar Nounoufood.id sebagai Agen, Mitra, atau Reseller resmi. Kami siap membekali Anda dengan produk best seller yang teruji laris, support penuh dari tim, untuk sama-sama tumbuh dan memanen keuntungan dari cemilan yang dicintai semua kalangan.</p>
    <div class="flex flex-col gap-y-2 items-start">
      <p class="text-[#2c2c2c] font-semibold ml-2">Ingin Menjadi Mitra/Reseller?</p>
      <a href="#" class="px-4 py-2 bg-white rounded-xl border-[3px] border-[#ffd700] text-sm font-medium ">Gabung Sekarang!</a>
    </div>
  </div>
</section>
<section>
  <div class="bg-[#FFE34F] py-2 overflow-hidden whitespace-nowrap mb-10">
    <div id="infinite-marquee" class="flex">
        @for ($i = 0; $i < 4; $i++)
            <span class="text-xl font-semibold text-gray-800 tracking-wider flex items-center mx-10">
                <img src="/images/pisang.png" class="w-14 h-14 mr-5" alt="">
                Follow Instagram kami <a href="https://instagram.com/danggedang_official" target="_blank" class="hover:underline"> @danggedang_official</a>
            </span>
        @endfor
    </div>
</div>
<div class="w-full overflow-hidden pb-5">
    <!-- Container -->
    <div class="relative w-[2000px] flex marquee">
        <!-- Repeat 2x untuk efek looping sempurna -->
        <div class="flex">
            <!-- Foto 1 -->
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 1
            </div>
            <!-- Foto 2 -->
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 2
            </div>
            <!-- Foto 3 -->
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 3
            </div>
            <!-- Foto 4 -->
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 4
            </div>
        </div>

        <!-- Copy kedua (looping) -->
        <div class="flex">
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 1
            </div>
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 2
            </div>
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 3
            </div>
            <div class="w-[500px] h-[400px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 4
            </div>
        </div>
    </div>
</div>
</section>
@endsection