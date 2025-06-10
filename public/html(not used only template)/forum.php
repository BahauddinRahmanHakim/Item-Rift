<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Item Rift</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php" class="active">Forum</a>
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
                <a href="forum.php" class="active">Forum</a>
                <a href="messages.php">Messages</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Forum Header Section -->
    <div class="forum-header-section">
        <div class="container">
            <div class="forum-header-content">
                <div>
                    <h1 class="forum-title">Community Forum</h1>
                    <p class="forum-subtitle">Connect with other students, ask questions, and share advice</p>
                </div>
                <div>
                    <button class="btn primary-btn">
                        <i class="fas fa-plus"></i> New Topic
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Forum Category Filters -->
    <div class="forum-categories-section">
        <div class="container">
            <div class="forum-category-buttons">
                <button class="category-button active" data-category="all">All Topics</button>
                <button class="category-button" data-category="textbooks">Textbooks</button>
                <button class="category-button" data-category="electronics">Electronics</button>
                <button class="category-button" data-category="campus_life">Campus Life</button>
                <button class="category-button" data-category="course_materials">Course Materials</button>
                <button class="category-button" data-category="buy-request">Buy Requests</button>
                <button class="category-button" data-category="general">General</button>
            </div>
        </div>
    </div>

    <!-- Forum Content Section -->
    <div class="forum-content-section">
        <div class="container">
            <div class="forum-search">
                <input type="text" id="forum-search-input" placeholder="Search discussions...">
            </div>
            
            <div class="forum-posts">
                <!-- Forum Post Item 1 -->
                <div class="forum-post-card">
                    <div class="post-header">
                        <div class="post-user">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde" alt="User Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h3 class="post-title">Looking for a study group for Computer Science finals</h3>
                                <div class="post-category">General</div>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>I'm looking for people to study with for the upcoming CS finals. Anyone interested in forming a study group at the library?</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-meta">
                            <span>John Doe</span>
                            <span class="meta-separator">•</span>
                            <span>3 hours ago</span>
                            <span class="reply-count">
                                <i class="far fa-comment"></i> 5 replies
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Forum Post Item 2 -->
                <div class="forum-post-card">
                    <div class="post-header">
                        <div class="post-user">
                            <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb" alt="User Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h3 class="post-title">Best place to buy/sell calculators?</h3>
                                <div class="post-category electronics">Electronics</div>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>I've noticed a lot of engineering students need specific calculators. Maybe we should have a dedicated thread for calculator exchange? Thoughts?</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-meta">
                            <span>Sophia Martinez</span>
                            <span class="meta-separator">•</span>
                            <span>1 day ago</span>
                            <span class="reply-count">
                                <i class="far fa-comment"></i> 7 replies
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Forum Post Item 3 -->
                <div class="forum-post-card">
                    <div class="post-header">
                        <div class="post-user">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="User Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h3 class="post-title">Tips for selling textbooks at the end of semester</h3>
                                <div class="post-category textbooks">Textbooks</div>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>Finals are coming up and I want to sell my textbooks ASAP. Any advice on pricing or when to list for the best chance of selling?</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-meta">
                            <span>David Johnson</span>
                            <span class="meta-separator">•</span>
                            <span>2 days ago</span>
                            <span class="reply-count">
                                <i class="far fa-comment"></i> 12 replies
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Forum Post Item 4 -->
                <div class="forum-post-card">
                    <div class="post-header">
                        <div class="post-user">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="User Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h3 class="post-title">Watch out for scammers asking to ship items</h3>
                                <div class="post-category warning">Warning</div>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>Just a heads up - I've gotten several messages from people wanting me to ship items and offering to pay with sketchy payment methods. Stay safe and meet in person!</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-meta">
                            <span>Sarah Miller</span>
                            <span class="meta-separator">•</span>
                            <span>3 days ago</span>
                            <span class="reply-count">
                                <i class="far fa-comment"></i> 9 replies
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="forum-pagination">
                <div class="pagination-buttons">
                    <span class="pagination-button active">1</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Item Rift. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
    <script>
        // Forum page specific JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Category button functionality
            const categoryButtons = document.querySelectorAll('.category-button');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Here you would normally filter posts based on category
                    // For now, just a UI update
                });
            });
            
            // Search functionality (basic)
            const searchInput = document.getElementById('forum-search-input');
            
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    // Here you would normally filter posts based on search
                    // For now, just logging
                    console.log('Searching for:', this.value);
                });
            }
        });
    </script>
</body>
</html>