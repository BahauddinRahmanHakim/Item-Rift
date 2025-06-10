<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details - Item Rift</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-logo">Item<span>Rift</span></a>

            <!-- Desktop menu -->
            <div class="navbar-links desktop-menu">
                <a href="index.php" class="active">Home</a>
                <a href="browse.php">Browse</a>
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php">Profile</a>
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
                <a href="profile.php">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Item Details Section -->
    <section class="item-details">
        <div class="container">
            <div class="item-details-container">
                <div class="item-image-container">
                    <img src="https://images.unsplash.com/photo-1544640808-32ca72ac7ee4" alt="Textbook" class="item-main-image">
                </div>
                
                <div class="item-info">
                    <h1>Introductory Computer Science Textbook</h1>
                    <p class="item-price">$45.00</p>
                    <p class="item-condition">Condition: Good</p>
                    <p class="item-location">Location: North Campus</p>
                    <p class="item-category">Category: Textbooks</p>
                    
                    <div class="item-description">
                        <h2>Description</h2>
                        <p>Great condition CS101 textbook, no highlighting or notes. This is the latest edition and covers all topics for the introductory computer science course. The book is in good condition with minimal wear on the cover and no damage to any pages.</p>
                    </div>
                    
                    <div class="seller-info">
                        <h2>Seller Information</h2>
                        <div class="seller-profile">
                            <div class="profile-avatar">TS</div>
                            <div>
                                <p class="seller-name">Test User</p>
                                <p class="seller-username">@testuser</p>
                            </div>
                        </div>
                    </div>
                    
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

    <script src="../js/script.js"></script>
</body>
</html>