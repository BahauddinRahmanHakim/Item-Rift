<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help - Item Rift</title>
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
                <a href="browse.php">Browse</a>
                <a href="help.php" class="active">Help</a>
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
                <a href="help.php" class="active">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Help Section -->
    <section class="help-section">
        <div class="container">
            <h1>Help Center</h1>
            <p class="section-subtitle">Find answers to common questions about using Item Rift</p>
            
            <div class="help-layout">
                <!-- Help Categories Sidebar -->
                <div class="help-sidebar">
                    <h2>Categories</h2>
                    <ul class="help-categories">
                        <li class="active"><a href="#getting-started">Getting Started</a></li>
                        <li><a href="#account">Account & Profile</a></li>
                        <li><a href="#buying">Buying Items</a></li>
                        <li><a href="#selling">Selling Items</a></li>
                        <li><a href="#messaging">Messaging</a></li>
                        <li><a href="#payments">Payments & Transactions</a></li>
                    </ul>
                </div>
                
                <!-- Help Content -->
                <div class="help-content">
                    <div class="help-category" id="getting-started">
                        <h2>Getting Started</h2>
                        
                        <div class="faq-item">
                            <h3>What is Item Rift?</h3>
                            <p>Item Rift is a campus marketplace designed specifically for students to buy and sell second-hand items. It helps you save money, reduce waste, and connect with fellow students on your campus.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>How do I create an account?</h3>
                            <p>Click on "Login" in the top navigation bar, then select "Sign up" to create a new account. You'll need to provide a username, password, and optional information like your name and email address.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Is Item Rift free to use?</h3>
                            <p>Yes, Item Rift is completely free to use for all students. There are no listing fees or transaction fees.</p>
                        </div>
                    </div>
                    
                    <div class="help-category hidden" id="account">
                        <h2>Account & Profile</h2>
                        
                        <div class="faq-item">
                            <h3>How do I update my profile information?</h3>
                            <p>Go to your Profile page and click on "Edit Profile". From there, you can update your personal information, add a bio, and upload a profile picture.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Can I change my username?</h3>
                            <p>Currently, usernames cannot be changed after account creation. Choose your username carefully when you register.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>How do I change my password?</h3>
                            <p>Go to your Profile page, click on "Edit Profile", and select the "Change Password" option to update your password.</p>
                        </div>
                    </div>
                    
                    <div class="help-category hidden" id="buying">
                        <h2>Buying Items</h2>
                        
                        <div class="faq-item">
                            <h3>How do I search for items?</h3>
                            <p>Visit the Browse page and use the search bar and filters to find what you're looking for. You can filter by category, condition, and price range.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>How do I purchase an item?</h3>
                            <p>When viewing an item, click the "Buy Now" button. You'll be prompted to confirm your purchase. After confirming, you'll be able to coordinate with the seller for pickup or delivery.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Can I save items for later?</h3>
                            <p>Yes! Click the "Save" button on any item listing to add it to your saved items. You can view your saved items from your Profile page.</p>
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
    <script>
        // Help page specific JS
        document.addEventListener('DOMContentLoaded', function() {
            // Help category navigation
            const categoryLinks = document.querySelectorAll('.help-categories li a');
            const helpCategories = document.querySelectorAll('.help-category');
            
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    categoryLinks.forEach(l => {
                        l.parentElement.classList.remove('active');
                    });
                    
                    // Add active class to clicked link
                    this.parentElement.classList.add('active');
                    
                    // Hide all categories
                    helpCategories.forEach(category => {
                        category.classList.add('hidden');
                    });
                    
                    // Show selected category
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).classList.remove('hidden');
                });
            });
        });
    </script>
</body>
</html>