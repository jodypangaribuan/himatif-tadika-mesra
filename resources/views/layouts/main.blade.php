<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <link rel="icon" href="{{ asset('images/logo-himatif-removebg.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #414544;
            --text-color: #ffffff;
            --hover-color: #5a5e5d;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            min-height: 100vh;
        }

        .social-bar {
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-custom {
            background-color: var(--primary-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo-container img {
            height: 120px;
            width: auto;
        }

        .nav-link {
            color: var(--text-color) !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            padding: 0.5rem 1rem !important;
            font-weight: 500;
        }

        /* Regular nav links underline effect */
        .nav-item:not(.dropdown) .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--text-color);
            transition: width 0.3s ease;
        }

        .nav-item:not(.dropdown) .nav-link:hover::after {
            width: 100%;
        }

        /* Custom dropdown styling */
        .dropdown .nav-link {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dropdown-toggle::after {
            display: none; /* Hide default Bootstrap caret */
        }

        .dropdown-arrow {
            margin-left: 4px;
            transition: transform 0.3s ease;
        }

        .dropdown.show .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            padding: 0.25rem;
            min-width: 220px;
            transform-origin: top center;
            animation: dropdown-anim 0.2s ease forwards;
            overflow: hidden;
        }

        @keyframes dropdown-anim {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 20px;
            width: 12px;
            height: 12px;
            background-color: var(--primary-color);
            transform: rotate(45deg);
            z-index: -1;
        }

        .dropdown-item {
            color: var(--text-color);
            padding: 0.8rem 1.2rem;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: all 0.25s ease;
            position: relative;
            border-radius: 6px;
            margin: 2px 5px;
            display: flex;
            align-items: center;
        }

        .dropdown-item:not(:last-child) {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .dropdown-item:hover, .dropdown-item:focus {
            background-color: var(--hover-color);
            color: var(--text-color);
            transform: translateX(5px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding-left: 1.6rem;
        }

        .dropdown-item::after {
            content: '›';
            position: absolute;
            right: 15px;
            opacity: 0;
            transition: all 0.25s ease;
        }

        .dropdown-item:hover::after {
            opacity: 1;
        }

        .navbar-toggler {
            border-color: var(--text-color);
        }

        .navbar-toggler-icon {
            color: var(--text-color);
        }

        /* Carousel Styling */
        .carousel-container {
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
            z-index: 1;
        }

        #heroCarousel {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            cursor: grab;
            position: relative;
            z-index: 2;
            touch-action: pan-y;
            user-select: none;
        }

        #heroCarousel:active {
            cursor: grabbing;
        }

        .carousel-item {
            height: 600px;
            position: relative;
            overflow: hidden;
        }

        .carousel-item img {
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: saturate(1.1) contrast(1.1);
            transition: all 0.7s ease;
        }

        .carousel-item.active img {
            transform: scale(1.05);
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.7) 100%);
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            bottom: 0;
            top: auto;
            left: 0;
            right: 0;
            z-index: 2;
            text-align: left;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .caption-content {
            position: relative;
            margin-left: 8%;
            max-width: 600px;
            transform: translateY(30px);
            opacity: 0;
            animation: fadeUp 1s forwards 0.5s;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .carousel-caption h2 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.4);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            letter-spacing: -1px;
        }

        .carousel-caption h2::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 5px;
            background-color: var(--text-color);
            border-radius: 5px;
        }

        .carousel-caption h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50px;
            width: 80px;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
        }

        .carousel-caption p {
            font-size: 1.2rem;
            max-width: 90%;
            margin-top: 1.5rem;
            line-height: 1.6;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            position: relative;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .carousel-caption .highlight {
            color: #ffe57f;
            font-weight: 500;
        }

        .carousel-caption .btn {
            position: relative;
            padding: 0.8rem 2.2rem;
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            overflow: hidden;
            background-color: transparent;
            border: 2px solid var(--text-color);
            color: var(--text-color);
            border-radius: 0;
            transition: all 0.4s ease;
            z-index: 1;
            margin-top: 10px;
        }

        .carousel-caption .btn::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0%;
            height: 100%;
            background-color: var(--text-color);
            transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
            z-index: -1;
        }

        .carousel-caption .btn:hover {
            color: var(--primary-color);
        }

        .carousel-caption .btn:hover::before {
            width: 100%;
        }

        .carousel-indicators {
            margin-bottom: 20px;
        }

        .carousel-indicators button {
            width: 12px !important;
            height: 12px !important;
            border-radius: 50%;
            margin: 0 5px !important;
            opacity: 0.6;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .carousel-indicators button.active {
            opacity: 1;
            transform: scale(1.2);
            background-color: var(--text-color);
        }

        .carousel-indicators button .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background-color: var(--text-color);
            z-index: 1;
            border-radius: inherit;
        }

        .carousel-indicators button.active .progress-bar {
            animation: progressAnimation 5s linear;
        }

        @keyframes progressAnimation {
            0% { width: 0; }
            100% { width: 100%; }
        }

        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.5);
            pointer-events: auto;
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
            background-color: var(--primary-color);
            cursor: pointer;
            transform: translateY(-50%) scale(1.1);
            border-color: white;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            width: 25px;
            height: 25px;
            position: relative;
            z-index: 10;
            filter: drop-shadow(0px 0px 3px rgba(0, 0, 0, 0.7));
        }
        
        /* Responsive adjustments for carousel */
        @media (max-width: 992px) {
            .carousel-item {
                height: 500px;
            }
            
            .carousel-caption h2 {
                font-size: 2.8rem;
            }
            
            .caption-content {
                margin-left: 6%;
                max-width: 80%;
            }
        }
        
        @media (max-width: 768px) {
            .carousel-item {
                height: 450px;
            }
            
            .carousel-caption h2 {
                font-size: 2.3rem;
            }
            
            .carousel-caption p {
                font-size: 1.1rem;
            }
            
            .caption-content {
                margin-left: 5%;
            }
            
            .carousel-control-prev, .carousel-control-next {
                width: 40px;
                height: 40px;
            }
        }
        
        @media (max-width: 576px) {
            .carousel-item {
                height: 400px;
            }
            
            .carousel-caption h2 {
                font-size: 1.8rem;
                padding-bottom: 10px;
            }
            
            .carousel-caption p {
                font-size: 1rem;
                margin-bottom: 20px;
            }
            
            .carousel-caption .btn {
                padding: 0.6rem 1.5rem;
                letter-spacing: 1px;
            }
            
            .caption-content {
                margin-left: 5%;
                max-width: 90%;
            }
            
            .carousel-caption h2::before {
                height: 3px;
                width: 30px;
            }
            
            .carousel-caption h2::after {
                height: 3px;
                width: 60px;
                left: 40px;
            }
            
            .carousel-control-prev, .carousel-control-next {
                width: 35px;
                height: 35px;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Social Bar -->
    <div class="social-bar py-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-none d-md-block">
                    <span class="text-secondary"><i class="far fa-envelope me-2"></i>himatif@example.com</span>
                </div>
                <div class="social-icons d-flex gap-3">
                    <a href="#" class="text-secondary" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-secondary" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-secondary" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-secondary" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-secondary" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom py-0">
        <div class="container flex-column">
            <!-- Logo -->
            <div class="text-center my-3">
                <img src="{{ asset('images/logo-himatif-removebg.png') }}" alt="Logo HIMATIF" class="img-fluid" style="height: 120px; width: auto;">
            </div>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto py-2">
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#">Acara</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#">Galeri</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#">Berita</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#">Laporan Keuangan</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#">Visi Misi</a></li>
                    
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="prokerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Proker
                            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="prokerDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-alt me-2"></i>Proker 2023</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-alt me-2"></i>Proker 2022</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-alt me-2"></i>Proker 2021</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="proposalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Proposal
                            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="proposalDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt me-2"></i>Proposal Acara</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-clipboard-list me-2"></i>Proposal Kegiatan</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-handshake me-2"></i>Proposal Kerjasama</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item mx-2"><a class="nav-link" href="#">BPH</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    @if(Route::currentRouteName() == 'home')
    <div class="carousel-container">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-overlay"></div>
                    <img src="https://images.unsplash.com/photo-1537861295351-76bb831ece99?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Campus Event">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <h2>Lorem Ipsum Dolor Sit</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="highlight">Sed do eiusmod tempor</span> incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="btn mt-3">Discover</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-overlay"></div>
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Workshop">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <h2>Ut Enim Ad Minim</h2>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation <span class="highlight">ullamco laboris</span> nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="#" class="btn mt-3">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-overlay"></div>
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Community">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <h2>Duis Aute Irure Dolor</h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate <span class="highlight">velit esse cillum</span> dolore eu fugiat nulla pariatur.</p>
                            <a href="#" class="btn mt-3">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Carousel Enhancement Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the carousel with options
            const heroCarousel = document.getElementById('heroCarousel');
            if (heroCarousel) {
                const carousel = new bootstrap.Carousel(heroCarousel, {
                    interval: 5000, // 5 seconds between slides
                    pause: 'hover',
                    ride: 'carousel', // Auto-start sliding
                    wrap: true // Loop back to the first slide
                });
                
                // Ensure navigation buttons work
                const prevButton = heroCarousel.querySelector('.carousel-control-prev');
                const nextButton = heroCarousel.querySelector('.carousel-control-next');
                
                prevButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    carousel.prev();
                });
                
                nextButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    carousel.next();
                });
                
                // Add keyboard navigation
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        carousel.prev();
                    } else if (e.key === 'ArrowRight') {
                        carousel.next();
                    }
                });
                
                // Add swipe gesture support for touch devices
                let touchStartX = 0;
                let touchEndX = 0;
                
                heroCarousel.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                }, false);
                
                heroCarousel.addEventListener('touchend', e => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                }, false);
                
                function handleSwipe() {
                    if (touchEndX < touchStartX - 50) {
                        // Swipe left, go to next slide
                        carousel.next();
                    } else if (touchEndX > touchStartX + 50) {
                        // Swipe right, go to previous slide
                        carousel.prev();
                    }
                }
                
                // Enable mouse drag for desktop
                let isDragging = false;
                let startPosition = 0;
                let currentTranslate = 0;
                
                heroCarousel.addEventListener('mousedown', dragStart);
                heroCarousel.addEventListener('mouseup', dragEnd);
                heroCarousel.addEventListener('mouseleave', dragEnd);
                heroCarousel.addEventListener('mousemove', drag);
                
                function dragStart(e) {
                    isDragging = true;
                    startPosition = e.clientX;
                    heroCarousel.style.cursor = 'grabbing';
                }
                
                function drag(e) {
                    if (isDragging) {
                        currentTranslate = e.clientX - startPosition;
                    }
                }
                
                function dragEnd() {
                    isDragging = false;
                    heroCarousel.style.cursor = 'grab';
                    
                    if (currentTranslate < -100) {
                        carousel.next();
                    } else if (currentTranslate > 100) {
                        carousel.prev();
                    }
                    
                    currentTranslate = 0;
                }
                
                // Pause on hover functionality (enhanced)
                heroCarousel.addEventListener('mouseenter', () => {
                    carousel.pause();
                });
                
                heroCarousel.addEventListener('mouseleave', () => {
                    carousel.cycle();
                });
                
                // Add visual progress indicator
                const indicators = heroCarousel.querySelectorAll('.carousel-indicators button');
                
                // Create progress bars inside indicators
                indicators.forEach((indicator) => {
                    indicator.innerHTML = '<span class="progress-bar"></span>';
                    indicator.style.position = 'relative';
                    indicator.style.overflow = 'hidden';
                });
                
                // Update progress bar for active slide
                function updateProgressBar() {
                    const activeIndicator = heroCarousel.querySelector('.carousel-indicators button.active .progress-bar');
                    if (activeIndicator) {
                        activeIndicator.style.transition = 'none';
                        activeIndicator.style.width = '0%';
                        
                        setTimeout(() => {
                            activeIndicator.style.transition = 'width 5s linear';
                            activeIndicator.style.width = '100%';
                        }, 50);
                    }
                }
                
                // Reset and start progress on slide change
                heroCarousel.addEventListener('slide.bs.carousel', () => {
                    updateProgressBar();
                });
                
                // Initial start
                updateProgressBar();
            }
        });
    </script>
</body>
</html> 