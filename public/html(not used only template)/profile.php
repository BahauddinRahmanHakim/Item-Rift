<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Item Rift</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-logo">Item<span>Rift</span></a>

            <!-- Desktop menu -->
            <div class="navbar-links desktop-menu">
                <a href="index.php">Home</a>
                <a href="browse.php">Browse</a>
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php" class="active">Profile</a>
                <a href="login.php">Login</a>
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
                <a href="index.php">Home</a>
                <a href="browse.php">Browse</a>
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php" class="active">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Profile Section -->
    <section class="profile">
        <div class="container">
            <div class="profile-header">
                <div class="profile-avatar">TS</div>
                <div class="profile-info">
                    <h1>Test User</h1>
                    <p>@testuser</p>
                </div>
                <div class="profile-actions">
                    <button class="btn outline-btn">Edit Profile</button>
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
                    
                    <div class="item-grid">
                        <div class="item-card">
                            <div class="item-image">
                                <img src="https://images.unsplash.com/photo-1544640808-32ca72ac7ee4" alt="Textbook">
                            </div>
                            <div class="item-details">
                                <h3>Introductory Computer Science Textbook</h3>
                                <p class="item-price">$45.00</p>
                                <p class="item-condition">Good · North Campus</p>
                                <div class="item-actions">
                                    <a href="item-details.php?id=1" class="btn outline-btn">View</a>
                                    <button class="btn primary-btn">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="purchases-content">
                    <h2>Purchases</h2>
                    
                    <div class="item-grid">
                        <div class="item-card">
                            <div class="item-image">
                                <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" alt="iPhone Stand">
                            </div>
                            <div class="item-details">
                                <h3>iPhone Charging Stand</h3>
                                <p class="item-price">$15.00</p>
                                <p class="item-condition">Purchased on May 1, 2025</p>
                                <p class="item-seller">Seller: @tech_deals</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="saved-content">
                    <h2>Saved Items</h2>
                    
                    <div class="item-grid">
                        <div class="item-card">
                            <div class="item-image">
                                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc" alt="Desk Chair">
                            </div>
                            <div class="item-details">
                                <h3>Ergonomic Desk Chair</h3>
                                <p class="item-price">$75.00</p>
                                <p class="item-condition">Like New · East Dorms</p>
                                <div class="item-actions">
                                    <a href="item-details.php?id=3" class="btn primary-btn">View Details</a>
                                    <button class="btn outline-btn">Unsave</button>
                                </div>
                            </div>
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

    <script src="../js/script.js"></script>
</body>
</html>