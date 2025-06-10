<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Item Rift</title>
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

    <!-- Profile Section -->
    <section class="profile">
        <div class="container">
            <div class="profile-header">
                <div class="profile-avatar" id="profile-avatar"></div>
                <div class="profile-info">
                    <h1 id="profile-name"></h1>
                    <p id="profile-username"></p>
                </div>
                <div class="profile-actions">
                    <button class="btn outline-btn" id="edit-profile-btn">Edit Profile</button>
                    <button class="btn primary-btn" id="logout-btn">Logout</button>
                </div>
            </div>
            
            <div class="profile-tabs">
                <button class="tab-button active" data-tab="listings">My Listings</button>
                <button class="tab-button" data-tab="purchases">Purchases</button>
                <button class="tab-button" data-tab="saved">Saved Items</button>
            </div>
            
            <div class="profile-content">
                <div class="tab-content active" id="listings-content">
                    <h2>My Listings</h2>
                    
                    <div class="item-grid" id="listings-grid"></div>
                </div>
                
                <div class="tab-content" id="purchases-content">
                    <h2>Purchases</h2>
                    
                    <div class="item-grid" id="purchases-grid"></div>
                </div>
                
                <div class="tab-content" id="saved-content">
                    <h2>Saved Items</h2>
                    
                    <div class="item-grid" id="saved-grid"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Profile Modal -->
<div id="edit-profile-modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span id="close-edit-profile" style="cursor:pointer;">&times;</span>
        <h2>Edit Username</h2>
        <form id="edit-profile-form">
            <input type="text" id="edit-username" name="username" required>
            <button type="submit" class="btn primary-btn">Save</button>
        </form>
    </div>
</div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Item Rift. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>