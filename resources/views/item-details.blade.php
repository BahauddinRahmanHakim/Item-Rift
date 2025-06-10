<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details - Item Rift</title>
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

    <!-- Item Details Section -->
    <section class="item-details">
        <div class="container">
            <div class="item-details-container">
                <div class="item-image-container">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="item-main-image">
                </div>
                
                <div class="item-info">
                    <h1>{{ $item->title }}</h1>
                    <p class="item-price">${{ $item->price }}</p>
                    <p class="item-condition">Condition: {{ ucfirst($item->condition) }}</p>
                    <p class="item-location">Location: {{ $item->location }}</p>
                    <p class="item-category">Category: {{ ucfirst($item->category) }}</p>
                    
                    <div class="item-description">
                        <h2>Description</h2>
                        <p>{{ $item->description }}</p>
                    </div>
                    
                    @if($item->user)
                    <div class="seller-info">
                        <h2>Seller Information</h2>
                        <div class="seller-profile">
                            <div class="profile-avatar">
                                {{ strtoupper(substr($item->user->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="seller-name">{{ $item->user->name }}</p>
                                <p class="seller-username" data-userid="{{ $item->user->id }}">{{ $item->user->username }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="item-actions">
                        <button class="btn primary-btn" id="buy-button">Buy Now</button>
                        <button class="btn outline-btn" id="contact-button">Contact Seller</button>
                        <button class="btn outline-btn" id="save-button">Save Item</button>
                    </div>
                </div>
            </div>
            
            <div class="similar-items">
                <h2>Similar Items</h2>
                <div class="item-grid">
                    <div class="item-card">
                        <div class="item-image">
                            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" alt="Math Textbook">
                        </div>
                        <div class="item-details">
                            <h3>Calculus Textbook</h3>
                            <p class="item-price">$40.00</p>
                            <p class="item-condition">Good · South Campus</p>
                            <a href="#" class="btn primary-btn">View Details</a>
                        </div>
                    </div>
                </div>
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