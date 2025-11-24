<nav class="sticky top-0 z-50 bg-transparent">
    <div
        class="max-w-[1325px] mx-auto mt-4 px-4
               h-[80px] bg-white border-[4px] border-[#FFD700]
               rounded-[40px] shadow-md flex items-center justify-between">

        <!-- Logo -->
       <div class="w-[65px] h-[65px] md:w-[115px] md:h-[115px]
            bg-cover bg-center rounded-full
            m1 mt-1
            md:ml-4 md:mt-4"
     style="background-image: url('/images/logonounou.png');">
</div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-10">

            <!-- HOME -->
            <a href="{{ route('home') }}"
                class="
                    text-[24px] font-[Poppins]
                    @if(request()->routeIs('home'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Home
            </a>

            <!-- OUR STORY -->
            <a href="{{ route('our-story') }}"
                class="
                    text-[24px] font-[Poppins]
                    @if(request()->routeIs('our-story'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Our Story
            </a>

            <!-- FAQ -->
            <a href="{{ route('faq') }}"
                class="
                    text-[24px] font-[Poppins]
                    @if(request()->routeIs('faq'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                FAQ
            </a>

            <!-- CONTACT -->
            <a href="{{ route('contact') }}"
                class="
                    text-[24px] font-[Poppins]
                    @if(request()->routeIs('contact'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Contact Us
            </a>

            <!-- Language Selector -->
            <div class="flex items-center space-x-2 border-2 border-[#FFD700] rounded-full px-4 py-2">
                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3">
                <span class="font-semibold text-[#2C2C2C] text-lg font-[Poppins]">IDN</span>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden text-[#2C2C2C] focus:outline-none">
            <i class="fas fa-bars text-3xl"></i>
        </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 bg-white w-full px-6 rounded-lg shadow-md">
        <div class="flex flex-col space-y-4 text-center">

            <a href="{{ route('home') }}"
                class="
                    text-[22px] font-[Poppins]
                    @if(request()->routeIs('home'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Home
            </a>

            <a href="{{ route('our-story') }}"
                class="
                    text-[22px] font-[Poppins]
                    @if(request()->routeIs('our-story'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Our Story
            </a>

            <a href="{{ route('faq') }}"
                class="
                    text-[22px] font-[Poppins]
                    @if(request()->routeIs('faq'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                FAQ
            </a>

            <a href="{{ route('contact') }}"
                class="
                    text-[22px] font-[Poppins]
                    @if(request()->routeIs('contact'))
                        font-bold underline text-[#2C2C2C]
                    @else
                        font-normal text-[#2C2C2C]
                    @endif
                ">
                Contact Us
            </a>

        </div>
    </div>
</nav>
