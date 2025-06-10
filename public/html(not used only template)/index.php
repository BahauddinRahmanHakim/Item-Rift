<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Rift - Campus Marketplace</title>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Campus Iteming <span>Made Simple</span></h1>
                <p class="hero-text">Buy and sell pre-loved items within your university community. Save money, reduce waste, and connect with fellow students.</p>
                <div class="hero-buttons">
                    <a href="browse.php" class="btn primary-btn">Browse Items</a>
                    <a href="sell.php" class="btn outline-btn">Sell Something</a>
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
                <a href="browse.php?category=textbooks" class="category-card">
                    <div class="category-icon">📚</div>
                    <h3>Textbooks</h3>
                </a>
                <a href="browse.php?category=electronics" class="category-card">
                    <div class="category-icon">💻</div>
                    <h3>Electronics</h3>
                </a>
                <a href="browse.php?category=clothing" class="category-card">
                    <div class="category-icon">👕</div>
                    <h3>Clothing</h3>
                </a>
                <a href="browse.php?category=furniture" class="category-card">
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
            
            <div class="item-grid">
                <div class="item-card">
                    <div class="item-image">
                        <img src="https://images.unsplash.com/photo-1544640808-32ca72ac7ee4" alt="Textbook">
                    </div>
                    <div class="item-details">
                        <h3>Introductory Computer Science Textbook</h3>
                        <p class="item-price">$45.00</p>
                        <p class="item-condition">Good · North Campus</p>
                        <a href="item-details.php?id=1" class="btn primary-btn">View Details</a>
                    </div>
                </div>
                
                <div class="item-card">
                    <div class="item-image">
                        <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" alt="iPhone Stand">
                    </div>
                    <div class="item-details">
                        <h3>iPhone Charging Stand</h3>
                        <p class="item-price">$15.00</p>
                        <p class="item-condition">Like New · West Dorms</p>
                        <a href="item-details.php?id=2" class="btn primary-btn">View Details</a>
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