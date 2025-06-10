<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Rift - Campus Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/ItemRift/home') }}" class="navbar-logo">Item<span>Rift</span></a>

            <!-- Desktop menu -->
            <div class="navbar-links desktop-menu">
                <a href="{{ url('/ItemRift/home') }}" class="{{ request()->is('ItemRift/home') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/ItemRift/browse') }}" class="{{ request()->is('ItemRift/browse') ? 'active' : '' }}">Browse</a>
                <a href="{{ url('/ItemRift/help') }}" class="{{ request()->is('ItemRift/help') ? 'active' : '' }}">Help</a>
                <a href="{{ url('/ItemRift/sell') }}" class="{{ request()->is('ItemRift/sell') ? 'active' : '' }}">Sell</a>
                <a href="{{ url('/ItemRift/forum') }}" class="{{ request()->is('ItemRift/forum') ? 'active' : '' }}">Forum</a>
                <a href="{{ url('/ItemRift/messages') }}" class="{{ request()->is('ItemRift/messages') ? 'active' : '' }}">Messages</a>
                <a href="{{ url('/ItemRift/profile') }}" class="{{ request()->is('ItemRift/profile') ? 'active' : '' }}">Profile</a>
                <a href="{{ url('/ItemRift/login') }}" class="{{ request()->is('ItemRift/login') ? 'active' : '' }}">Login</a>
            </div>

            <!-- Mobile menu button -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <!-- Mobile menu (hidden by default) -->
        <div class="mobile-menu" id="mobile-menu">
            <div class="mobile-menu-links">
                <a href="{{ url('/ItemRift/home') }}" class="{{ request()->is('ItemRift/home') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/ItemRift/browse') }}" class="{{ request()->is('ItemRift/browse') ? 'active' : '' }}">Browse</a>
                <a href="{{ url('/ItemRift/help') }}" class="{{ request()->is('ItemRift/help') ? 'active' : '' }}">Help</a>
                <a href="{{ url('/ItemRift/sell') }}" class="{{ request()->is('ItemRift/sell') ? 'active' : '' }}">Sell</a>
                <a href="{{ url('/ItemRift/forum') }}" class="{{ request()->is('ItemRift/forum') ? 'active' : '' }}">Forum</a>
                <a href="{{ url('/ItemRift/messages') }}" class="{{ request()->is('ItemRift/messages') ? 'active' : '' }}">Messages</a>
                <a href="{{ url('/ItemRift/profile') }}" class="{{ request()->is('ItemRift/profile') ? 'active' : '' }}">Profile</a>
                <a href="{{ url('/ItemRift/login') }}" class="mobile-login-btn {{ request()->is('ItemRift/login') ? 'active' : '' }}">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Campus Iteming <span>Made Simple</span></h1>
                <p class="hero-text">Buy and sell pre-loved items within your university community. Save money, reduce waste, and connect with fellow students.</p>
                <div class="hero-buttons">
                    <a href="{{ url('/ItemRift/browse') }}" class="btn primary-btn">Browse Items</a>
                    <a href="{{ url('/ItemRift/sell') }}" class="btn outline-btn">Sell Something</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f" alt="Students in library">
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Browse Categories</h2>
            <p class="section-subtitle">Find exactly what you need for your studies and campus life</p>
            
            <div class="category-grid">
                <a href="{{ url('/ItemRift/browse?category=textbooks') }}" class="category-card">
                    <div class="category-icon">📚</div>
                    <h3>Textbooks</h3>
                </a>
                <a href="{{ url('/ItemRift/browse?category=electronics') }}" class="category-card">
                    <div class="category-icon">💻</div>
                    <h3>Electronics</h3>
                </a>
                <a href="{{ url('/ItemRift/browse?category=clothing') }}" class="category-card">
                    <div class="category-icon">👕</div>
                    <h3>Clothing</h3>
                </a>
                <a href="{{ url('/ItemRift/browse?category=furniture') }}" class="category-card">
                    <div class="category-icon">🪑</div>
                    <h3>Furniture</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Items -->
    <section class="featured-items">
        <div class="container">
            <h2 class="section-title">Featured Items</h2>
            
            <div class="item-grid" id="home-featured-items">
                <!-- Items will be loaded here by JS -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Item Rift. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>