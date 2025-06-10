<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Items - Item Rift</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-logo">Item<span>Rift</span></a>

            <!-- Desktop menu -->
            <div class="navbar-links desktop-menu">
                <a href="index.php">Home</a>
                <a href="browse.php" class="active">Browse</a>
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
        <!-- Mobile menu (hidden by default) -->
        <div class="mobile-menu" id="mobile-menu">
            <div class="mobile-menu-links">
                <a href="index.php">Home</a>
                <a href="browse.php" class="active">Browse</a>
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Browse Section -->
    <section class="browse">
        <div class="container">
            <h1>Browse Items</h1>
            
            <div class="browse-layout">
                <div class="sidebar">
                    <h2>Filters</h2>
                    <form id="filters-form">
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" id="search" name="search" placeholder="Search items...">
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category">
                                <option value="">All Categories</option>
                                <option value="textbooks">Textbooks</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="furniture">Furniture</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <select id="condition" name="condition">
                                <option value="">Any Condition</option>
                                <option value="new">New</option>
                                <option value="like-new">Like New</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Price Range</label>
                            <div class="price-range">
                                <input type="number" id="min-price" name="min-price" placeholder="Min">
                                <span>to</span>
                                <input type="number" id="max-price" name="max-price" placeholder="Max">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn primary-btn full-width">Apply Filters</button>
                        <button type="reset" class="btn outline-btn full-width">Reset</button>
                    </form>
                </div>
                
                <div class="main-content">
                    <div class="item-grid" id="items-grid">
                        <!-- Items will be loaded here -->
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