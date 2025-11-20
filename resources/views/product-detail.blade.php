@extends('layouts.app')

@section('title', 'Nounoufood - Our Story')

@section('content')
<section class="lg:w-[80%] w-[90%] mx-auto">
  <img src="/images/logonounou.png" class="aspect-video object-cover h-[200px] mx-auto " alt="">
  <div class="border-t-4 border-[#FFD700] mb-10"></div>
  <div class="flex w-full lg:gap-6 gap-2 mb-10 flex-col lg:flex-row">
    <div class="lg:w-1/2">
      <!-- image di sini, untuk sementara div dulu -->
      <img src="/images/products/detail-product.png" class="lg:w-full w-3/3 rounded-[30px] shadow-md object-cover object-center mb-8 mx-auto lg:mb-0" alt="">
    </div>
    <div class="lg:w-1/2">
      <h1 class="text-4xl font-semibold mb-3">Basreng</h1>
      <h6 class="text-2xl font-bold text-[#FB9E3A] mb-2">Rp17.000</h6>
      <p class="tracking-wide text-justify leading-7 text-[#2c2c2c] mb-10">This Basreng is our best-selling product, made from selected fish balls that are fried crispy with savoury and spicy Lime Leaf seasoning. We guarantee its quality with Halal Certification and display transparent expiry date information. To maintain maximum crispiness, store Basreng in an airtight container immediately after opening the packaging and keep it in a cool, dry place away from moisture.</p>
      <a href="#" class="lg:px-16 py-2 px-8 text-lg font-semibold text-gray-800 bg-white border border-yellow-400 rounded-xl shadow-md hover:bg-yellow-400 hover:text-white transition">Buy Now</a>
    </div>
  </div>
  <!-- product recommended -->
  <div class="w-full py-3">
    <h1 class="md:text-4xl text-3xl font-semibold text-center mb-5">Product Recommended</h1>
    <div class="border-t-4 border-[#FFD700] mb-10"></div>
    <div class="w-full flex gap-5 flex-col md:flex-row">
      <div class="lg:w-1/2 w-full rounded-2xl border-4 border-[#FFD700] flex lg:flex-row flex-col p-3 gap-4">
        <img src="/images/products/detail-product.png" alt="" class="lg:w-2/5 w-full object-cover object-center rounded-xl lg:max-h-40 max-h-[180px]">
        <div class="flex flex-col items-start lg:w-3/5 w-full">
          <h1 class="text-xl font-semibold mb-2">Risol Mayo Enak Makcoy</h1>
          <!-- product descriptionb akal kepotong kalo lebih dari 2 baris -->
          <p class="line-clamp-2 text-[#2c2c2c] text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur facere eum maiores aut quasi adipisci, consectetur maxime laborum quam. Cupiditate architecto explicabo ratione voluptates tenetur beatae. Cum quam quia consectetur voluptates optio aut alias quaerat blanditiis voluptatem eos quidem, praesentium dolores enim atque, nesciunt libero iste, accusantium vel. Sequi, rerum.</p>
          <p class="text-lg font-semibold">Rp17.000</p>
          <div class="flex items-start gap-3 mt-2">
            <a href="#" class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-yellow-400 rounded-xl border-2 shadow-md hover:bg-yellow-400 hover:text-white transition">Buy</a>
            <a href="#" class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-[#FFAE00] rounded-xl border-2 shadow-md hover:bg-[#FFAE00] hover:text-white transition">Detail</a>
          </div>
        </div>
      </div>
      <div class="lg:w-1/2 w-full rounded-2xl border-4 border-[#FFD700] flex lg:flex-row flex-col p-3 gap-4">
        <img src="/images/products/detail-product.png" alt="" class="lg:w-2/5 w-full object-cover object-center rounded-xl lg:max-h-40 max-h-[180px]">
        <div class="flex flex-col items-start lg:w-3/5 w-full">
          <h1 class="text-xl font-semibold mb-2">Risol Mayo Enak Makcoy</h1>
          <!-- product descriptionb akal kepotong kalo lebih dari 2 baris -->
          <p class="line-clamp-2 text-[#2c2c2c] text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur facere eum maiores aut quasi adipisci, consectetur maxime laborum quam. Cupiditate architecto explicabo ratione voluptates tenetur beatae. Cum quam quia consectetur voluptates optio aut alias quaerat blanditiis voluptatem eos quidem, praesentium dolores enim atque, nesciunt libero iste, accusantium vel. Sequi, rerum.</p>
          <p class="text-lg font-semibold">Rp17.000</p>
          <div class="flex items-start gap-3 mt-2">
            <a href="#" class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-yellow-400 rounded-xl border-2 shadow-md hover:bg-yellow-400 hover:text-white transition">Buy</a>
            <a href="#" class="px-8 py-0.5 text-lg font-semibold text-gray-800 bg-white border-[#FFAE00] rounded-xl border-2 shadow-md hover:bg-[#FFAE00] hover:text-white transition">Detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection