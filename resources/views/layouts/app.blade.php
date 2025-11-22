<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nounoufood - Cemilan Berkualitas')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- App CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .bg-primary {
            background-color: #FDB913;
        }
        
        .text-primary {
            color: #FB9E3A !important;
        }
        
        .border-primary {
            border-color: #FFD700 !important;
        }


        .hover-scale {
            transition: transform 0.3s ease;
        }

        .faq-title {
            background: rgba(255, 255, 255, 0.29);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.1px);
            -webkit-backdrop-filter: blur(6.1px);
            border: 1px solid rgba(255, 255, 255, 0.44);
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

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out, opacity 0.4s ease-in-out;
            opacity: 0;
        }

        .accordion-content.active {
            max-height: 500px;
            opacity: 1;
        }

        .icon {
            transition: transform .3 ease;
        }

        .icon.rotate {
            transform: rotate(180deg)
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

        const headers = document.querySelectorAll('.accordion-header');

        headers.forEach(header => {
            header.addEventListener('click', function(){
                const content = this.nextElementSibling;
                const icon = this.querySelector('.icon')
                const isActive = content.classList.contains('active')

                // biar yang lain nutup
                document.querySelectorAll('.accordion-content').forEach(item => {
                    item.classList.remove('active')
                })

                document.querySelectorAll('.icon').forEach(i => {
                    i.textContent = '+';
                    i.classList.remove('rotate')
                })

                // kalo diklik belom aktif, maka aktifin
                if (!isActive) {
                    content.classList.add('active')
                    icon.textContent = "-";
                    icon.classList.add('rotate')
                }
            })
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>