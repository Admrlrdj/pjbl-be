  @extends('layouts.app')

  @section('title', 'Nounoufood - Our Story')

  @section('content')
  <section class="w-full mt-0">
    <div class="relative w-full h-auto">
      <img src="/images/faq-bg.png" class="w-full md:h-auto h-[300px] object-cover object-center" alt="">

      <div class="absolute left-0 top-0 inset-0 flex justify-center items-center mt-18">
        <div class="md:h-[60%] md:w-[70%] w-[90%] h-[70%] faq-title rounded-3xl text-center p-5 flex flex-col justify-center items-center">
          <h1 class="text-4xl font-semibold">Frequently Asked Question</h1>
          <p class="text-2xl">Pertanyaanmu akan dijawab di sini</p>
        </div>
      </div>
    </div>
    
    <div class="md:max-w-3xl w-[90%]  mx-auto my-10">
    @foreach ($faqs as $faq)
    <div class="bg-[#FFE34F] shadow-md border-b-2 border-[#FFD700] overflow-hidden">
      <button class="accordion-header w-full px-6 py-3 flex justify-between items-center transition-all bg-[#FFE34F] duration-300">
          <span class="text-lg font-semibold text-zinc-800">{{ $faq->question }}</span>
          <span class="icon text-2xl font-bold text-amber-600">+</span>
      </button>
      <div class="accordion-content">
          <div class="px-6 py-4 text-gray-700">
              <p>{{ $faq->answer }}</p>
          </div>
      </div>
    </div>
    @endforeach
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
    <div class="marquee-container">
        <div class="marquee-track">
            <!-- Loop 1 -->
            <img src="/images/Gradient.png" class="marquee-img" />
            <img src="/images/Gradient2.png" class="marquee-img" />
            <img src="/images/Gradient3.png" class="marquee-img" />
            <img src="/images/Gradient.png" class="marquee-img" />

            <!-- Loop 2 (duplicate) -->
            <img src="/images/Gradient.png" class="marquee-img" />
            <img src="/images/Gradient2.png" class="marquee-img" />
            <img src="/images/Gradient3.png" class="marquee-img" />
            <img src="/images/Gradient.png" class="marquee-img" />
        </div>
    </div>
</div>
</section>
  @endsection