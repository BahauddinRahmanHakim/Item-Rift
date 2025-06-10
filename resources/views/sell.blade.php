<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Item - Item Rift</title>
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

    <!-- Sell Item Section -->
    <section class="sell">
        <div class="container">
            <h1>Sell an Item</h1>
            <p class="section-subtitle">List your second-hand items for fellow students to discover</p>
            
            <div class="sell-form-container">
                <form id="sell-form">
                    <div class="form-group">
                        <label for="title">Item Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="number" id="price" name="price" min="0" step="0.01" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="textbooks">Textbooks</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="furniture">Furniture</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="condition">Condition</label>
                        <select id="condition" name="condition" required>
                            <option value="">Select condition</option>
                            <option value="new">New</option>
                            <option value="like-new">Like New</option>
                            <option value="good">Good</option>
                            <option value="fair">Fair</option>
                            <option value="poor">Poor</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" id="images" name="images" accept="image/*" multiple>
                    </div>
                    
                    <button type="submit" class="btn primary-btn full-width">List Item</button>
                </form>
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