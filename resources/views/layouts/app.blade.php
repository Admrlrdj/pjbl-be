<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nounoufood - Cemilan Berkualitas')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .bg-primary {
            background-color: #FDB913;
        }
        
        .text-primary {
            color: #FB9E3A;
        }
        
        .border-primary {
            border-color: #FDB913;
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }

        .logo-blob .blob-bg {
            width: 489.773px;
height: 435.468px;
flex-shrink: 0;
    background: url("/images/bg.png") center / contain no-repeat;
    max-width: 90%; /* Buat agar tidak terlalu mepet, misal 90% dari parent */
    max-height: 90%;
}

.logo-blob .badge-image {
    width: 399px;
    height: 392px;
    background: url("/images/pisang.png") 50% / cover no-repeat;

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.marquee {
    animation: marquee 15s linear infinite;
}

@keyframes marquee-scroll {
  from {
    transform: translateX(0);
  }
  to {
    /* Geser ke kiri sejauh 50% untuk looping mulus */
    transform: translateX(-50%);
  }
}

/* 2. Aplikasikan Animasi */
#infinite-marquee {
  animation: marquee-scroll 10s linear infinite;
  /* Opsional: Efek pause saat mouse hover */
  /* animation-play-state: running;  <-- ini buat menghindari konflik jika kamu pake JS untuk pause */
}

#infinite-marquee:hover {
  animation-play-state: paused;
}

    </style>
    
    @stack('styles')
</head>
<body class="bg-white">
    
    <!-- Navbar -->
    @include('partials.navbar')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>