<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Item Rift</title>
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

    <!-- Register Section -->
    <section class="auth">
        <div class="container">
            <div class="auth-container">
                <div class="auth-form">
                    <h1>Create an Account</h1>
                    <form id="register-form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" required>
                        </div>
                        <button type="submit" class="btn primary-btn full-width">Sign Up</button>
                    </form>
                    <p class="auth-switch">Already have an account? <a href="login.php">Login</a></p>
                </div>
                
                <div class="auth-welcome">
                    <h2>Welcome to Item Rift</h2>
                    <p>Your campus marketplace for buying and selling second-hand items.</p>
                    
                    <ul class="feature-list">
                        <li>
                            <span class="feature-icon">📚</span>
                            <span>Buy and sell textbooks</span>
                        </li>
                        <li>
                            <span class="feature-icon">💻</span>
                            <span>Find electronics and tech gadgets</span>
                        </li>
                        <li>
                            <span class="feature-icon">👕</span>
                            <span>Discover vintage clothing</span>
                        </li>
                        <li>
                            <span class="feature-icon">🪑</span>
                            <span>Get dorm room essentials</span>
                        </li>
                    </ul>
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