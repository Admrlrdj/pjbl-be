<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Logo & Tagline -->
            <div class="flex flex-col items-start">
                <div class="text-3xl font-bold mb-2">
                    <span class="italic text-primary">N</span><span class="text-white">ounoufood</span>
                </div>
                <p class="text-sm text-gray-400 mt-2">Terima Mitra Agen Dan Reseller</p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Link</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-primary transition">› Home</a></li>
                    <li><a href="{{ route('our-story') }}" class="hover:text-primary transition">› Our Story</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-primary transition">› FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-primary transition">› Contact Us</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li>
                        <i class="fas fa-phone-alt text-primary mr-2"></i>
                        Telp: +62 819-3681-0305
                    </li>
                    <li>
                        <i class="fas fa-envelope text-primary mr-2"></i>
                        hastikatrianggrainiis@gmail.com
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                        Kota Bogor, Jawa Barat
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Divider -->
        <div class="border-t border-gray-700 mt-8 pt-6 text-center">
            <p class="text-gray-500 text-sm">© 2025 Nounoufood. All right reserved. | Developed by LearnHub.id</p>
        </div>
    </div>
</footer>