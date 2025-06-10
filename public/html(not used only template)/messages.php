<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Item Rift</title>
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
                <a href="help.php">Help</a>
                <a href="sell.php">Sell</a>
                <a href="forum.php">Forum</a>
                <a href="messages.php" class="active">Messages</a>
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
                <a href="messages.php" class="active">Messages</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="mobile-login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Messages Section -->
    <section class="messages">
        <div class="container">
            <h1>Messages</h1>
            
            <div class="messages-container">
                <div class="conversations-list">
                    <div class="conversation active">
                        <div class="conversation-avatar">MS</div>
                        <div class="conversation-details">
                            <h3>Michael Smith</h3>
                            <p class="conversation-preview">Is the textbook still available?</p>
                        </div>
                    </div>
                    
                    <div class="conversation">
                        <div class="conversation-avatar">JL</div>
                        <div class="conversation-details">
                            <h3>Jennifer Lee</h3>
                            <p class="conversation-preview">Thanks for the quick response!</p>
                        </div>
                    </div>
                </div>
                
                <div class="message-view">
                    <div class="message-header">
                        <h2>Michael Smith</h2>
                        <p>Re: Computer Science Textbook</p>
                    </div>
                    
                    <div class="message-thread">
                        <div class="message received">
                            <p>Hi there! I saw your listing for the Computer Science textbook. Is it still available?</p>
                            <span class="message-time">10:15 AM</span>
                        </div>
                        
                        <div class="message sent">
                            <p>Yes, it's still available! Are you interested in purchasing it?</p>
                            <span class="message-time">10:20 AM</span>
                        </div>
                        
                        <div class="message received">
                            <p>Great! What's the condition of the book? Are there any highlights or notes in it?</p>
                            <span class="message-time">10:23 AM</span>
                        </div>
                        
                        <div class="message sent">
                            <p>The condition is good as mentioned in the listing. There are very few highlights in the first few chapters, but no writing or notes.</p>
                            <span class="message-time">10:25 AM</span>
                        </div>
                        
                        <div class="message received">
                            <p>Perfect! Is the textbook still available?</p>
                            <span class="message-time">10:30 AM</span>
                        </div>
                    </div>
                    
                    <div class="message-input">
                        <textarea placeholder="Type a message..."></textarea>
                        <button class="btn primary-btn">Send</button>
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