  @extends('layouts.app')

  @section('title', 'Nounoufood - Our Story')

  @section('content')
  <section class="w-full pt-20 md:pt-0">
    <div class="relative w-full h-auto">
      <img src="/images/faq-bg.png" class="w-full md:h-auto h-[300px] object-cover object-center" alt="">

      <div class="absolute left-0 top-0 inset-0 flex justify-center items-center">
        <div class="md:h-[50%] md:w-[70%] w-[90%] h-[70%] faq-title rounded-3xl text-center p-5 flex flex-col justify-center items-center">
          <h1 class="text-3xl font-semibold">Frequently Asked Question</h1>
          <p class="text-lg">Pertanyaanmu akan dijawab di sini</p>
        </div>
      </div>
    </div>
    
    <div class="md:max-w-3xl w-[90%]  mx-auto my-10">
      <div class="">
        <div class="bg-white shadow-md border-b-2 border-amber-200 overflow-hidden">
          <button class="accordion-header w-full px-6 py-3 flex justify-between items-center transition-all bg-amber-50 duration-300">
              <span class="text-lg font-semibold text-amber-900">What is your return policy?</span>
              <span class="icon text-2xl font-bold text-amber-600">+</span>
          </button>
          <div class="accordion-content">
              <div class="px-6 py-4 text-gray-700">
                  <p>We offer a 30-day return policy for all unused items in their original packaging. Simply contact our customer service team to initiate a return, and we'll provide you with a prepaid shipping label.</p>
              </div>
          </div>
        </div>
        <div class="bg-white shadow-md border-b-2 border-amber-200 overflow-hidden">
          <button class="accordion-header w-full px-6 py-3 flex justify-between items-center transition-all bg-amber-50 duration-300">
              <span class="text-lg font-semibold text-amber-900">What is your return policy?</span>
              <span class="icon text-2xl font-bold text-amber-600">+</span>
          </button>
          <div class="accordion-content">
              <div class="px-6 py-4 text-gray-700">
                  <p>We offer a 30-day return policy for all unused items in their original packaging. Simply contact our customer service team to initiate a return, and we'll provide you with a prepaid shipping label.</p>
              </div>
          </div>
        </div>
        <div class="bg-white shadow-md border-b-2 border-amber-200 overflow-hidden">
          <button class="accordion-header w-full px-6 py-3 flex justify-between items-center transition-all bg-amber-50 duration-300">
              <span class="text-lg font-semibold text-amber-900">What is your return policy?</span>
              <span class="icon text-2xl font-bold text-amber-600">+</span>
          </button>
          <div class="accordion-content">
              <div class="px-6 py-4 text-gray-700">
                  <p>We offer a 30-day return policy for all unused items in their original packaging. Simply contact our customer service team to initiate a return, and we'll provide you with a prepaid shipping label.</p>
              </div>
          </div>
        </div>
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
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 1
            </div>
            <!-- Foto 2 -->
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 2
            </div>
            <!-- Foto 3 -->
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 3
            </div>
            <!-- Foto 4 -->
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 4
            </div>
        </div>

        <!-- Copy kedua (looping) -->
        <div class="flex">
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 1
            </div>
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 2
            </div>
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 3
            </div>
            <div class="md:w-[500px] md:h-[400px] w-[300px] h-[200px] bg-zinc-600 rounded-xl  text-white text-4xl flex items-center justify-center m-2">
                Foto 4
            </div>
        </div>
    </div>
</div>
</section>
  @endsection