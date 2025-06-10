document.addEventListener('DOMContentLoaded', function() {
    // Check if user is logged in
    const isLoggedIn = checkLoginStatus();
    updateNavigation(isLoggedIn);
    
    // Login
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            fetch('/api/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username, password })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    localStorage.setItem('user', JSON.stringify(data.user));
                    window.location.href = '/ItemRift/home';
                } else {
                    alert(data.error || 'Login failed');
                }
            });
        });
    }
    
    // Register
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            fetch('/api/register', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    username,
                    name,
                    email,
                    password,
                    password_confirmation: confirmPassword
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // localStorage.setItem('token', data.token); // Remove or comment this line
                    localStorage.setItem('user', JSON.stringify(data.user));
                    window.location.href = '/ItemRift/home';
                } else {
                    alert(data.error || 'Registration failed');
                }
            });
        });
    }
    
    // Handle profile tabs
    const tabButtons = document.querySelectorAll('.tab-button');
    if (tabButtons.length > 0) {
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons and content
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                this.classList.add('active');
                const tabId = this.getAttribute('data-tab') + '-content';
                document.getElementById(tabId).classList.add('active');
            });
        });
    }
    
    // Protect profile page: redirect if not logged in
    if (window.location.pathname.includes('/ItemRift/profile') && !localStorage.getItem('user')) {
        window.location.href = '/ItemRift/login';
    }

    // Logout button
    const logoutBtn = document.getElementById('logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            localStorage.removeItem('user');
            window.location.href = '/ItemRift/login';
        });
    }
    
    // Sell form submission with image upload
    const sellForm = document.getElementById('sell-form');
    if (sellForm) {
        sellForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(sellForm);

            fetch('/api/items', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Item listed successfully!');
                    window.location.href = '/ItemRift/home';
                } else {
                    alert('Failed to list item.');
                }
            });
        });
    }
    
    // Buy, contact and save buttons on item details page
    const buyButton = document.getElementById('buy-button');
    if (buyButton) {
        buyButton.addEventListener('click', function() {
            const itemId = window.location.pathname.split('/').pop();
            fetch(`/api/items/${itemId}/buy`, {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message || 'Purchase successful!');
            });
        });
    }
    
    const contactButton = document.getElementById('contact-button');
    if (contactButton) {
        contactButton.addEventListener('click', function() {
            // Ambil seller_id dari data attribute atau dari blade
            const sellerId = document.querySelector('.seller-username').dataset.userid;
            if (sellerId) {
                window.location.href = `/ItemRift/messages?user=${sellerId}`;
            }
        });
    }
    
    const saveButton = document.getElementById('save-button');
    if (saveButton) {
        const itemId = window.location.pathname.split('/').pop();
        let saved = false; // Optionally, fetch saved status from API

        saveButton.addEventListener('click', function() {
            const url = saved ? `/api/items/${itemId}/unsave` : `/api/items/${itemId}/save`;
            fetch(url, { method: 'POST', headers: { 'Accept': 'application/json' } })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        saved = !saved;
                        saveButton.textContent = saved ? 'Unsave Item' : 'Save Item';
                    }
                });
        });
    }

    // Fetch and render items for browse page (replace hardcoded HTML rendering)
    if (document.getElementById('items-grid')) {
        fetch('/api/items')
            .then(res => res.json())
            .then(items => {
                const grid = document.getElementById('items-grid');
                if (!grid) return;
                grid.innerHTML = '';
                items.forEach(item => {
                    grid.innerHTML += `
                        <div class="item-card">
                            <div class="item-image">
                                <img src="${item.image_url}" alt="${item.title}">
                            </div>
                            <div class="item-details">
                                <h3>${item.title}</h3>
                                <p class="item-price">$${item.price}</p>
                                <p class="item-condition">${item.condition} · ${item.location}</p>
                                <a href="/ItemRift/item/${item.id}" class="btn primary-btn">View Details</a>
                            </div>
                        </div>
                    `;
                });
            });
    }
    
    const filtersForm = document.getElementById('filters-form');
    if (filtersForm) {
        filtersForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const params = new URLSearchParams(new FormData(filtersForm)).toString();
            fetch('/api/items?' + params)
                .then(res => res.json())
                .then(items => {
                    const grid = document.getElementById('items-grid');
                    if (!grid) return;
                    grid.innerHTML = '';
                    items.forEach(item => {
                        grid.innerHTML += `
                            <div class="item-card">
                                <div class="item-image">
                                    <img src="${item.image_url}" alt="${item.title}">
                                </div>
                                <div class="item-details">
                                    <h3>${item.title}</h3>
                                    <p class="item-price">$${item.price}</p>
                                    <p class="item-condition">${item.condition} · ${item.location}</p>
                                    <a href="/ItemRift/item/${item.id}" class="btn primary-btn">View Details</a>
                                </div>
                            </div>
                        `;
                    });
                });
        });

        // Optional: Reset button to reload all items
        filtersForm.addEventListener('reset', function(e) {
            setTimeout(() => {
                fetch('/api/items')
                    .then(res => res.json())
                    .then(items => {
                        const grid = document.getElementById('items-grid');
                        if (!grid) return;
                        grid.innerHTML = '';
                        items.forEach(item => {
                            grid.innerHTML += `
                                <div class="item-card">
                                    <div class="item-image">
                                        <img src="${item.image_url}" alt="${item.title}">
                                    </div>
                                    <div class="item-details">
                                        <h3>${item.title}</h3>
                                        <p class="item-price">$${item.price}</p>
                                        <p class="item-condition">${item.condition} · ${item.location}</p>
                                        <a href="/ItemRift/item/${item.id}" class="btn primary-btn">View Details</a>
                                    </div>
                                </div>
                            `;
                        });
                    });
            }, 10);
        });
    }

    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });
    }

    // New topic modal
    const newTopicBtn = document.querySelector('.btn.primary-btn');
    const modal = document.getElementById('new-topic-modal');
    const closeModal = document.getElementById('close-topic-modal');
    const newTopicForm = document.getElementById('new-topic-form');

    if (newTopicBtn && modal) {
        newTopicBtn.addEventListener('click', function() {
            modal.style.display = 'block';
        });
    }
    if (closeModal && modal) {
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    }
    if (newTopicForm) {
        newTopicForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(newTopicForm);
            fetch('/api/forum/topics', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Topic posted!');
                    modal.style.display = 'none';
                    newTopicForm.reset();
                    loadForumTopics();
                } else {
                    alert('Failed to post topic.');
                }
            });
        });
    }

    // Load topics on page load
    loadForumTopics();

    function loadForumTopics() {
        fetch('/api/forum/topics')
            .then(res => res.json())
            .then(topics => {
                const postsContainer = document.querySelector('.forum-posts');
                if (!postsContainer) return;
                postsContainer.innerHTML = '';
                topics.forEach(topic => {
                    postsContainer.innerHTML += `
                        <div class="forum-post-card">
                            <div class="post-header">
                                <div class="post-user">
                                    <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(topic.user.name)}" alt="User Avatar" class="post-avatar">
                                    <div class="post-user-info">
                                        <h3 class="post-title">${topic.title}</h3>
                                        <div class="post-category">${topic.category || ''}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>${topic.content}</p>
                            </div>
                            <div class="post-footer">
                                <div class="post-meta">
                                    <span>${topic.user.name}</span>
                                    <span class="meta-separator">•</span>
                                    <span>${new Date(topic.created_at).toLocaleString()}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });
            });
    }

    // --- Messaging Page Functionality ---

    const conversationsList = document.getElementById('conversations-list');
    const messageThread = document.getElementById('message-thread');
    const messageUsername = document.getElementById('message-username');
    const messageTextarea = document.getElementById('message-textarea');
    const sendMessageBtn = document.getElementById('send-message-btn');
    const userSearchInput = document.getElementById('user-search-input');
    const userSearchResults = document.getElementById('user-search-results');
    let currentReceiverId = null;

    // Utility to get current user ID from localStorage
    function getCurrentUserId() {
        const user = JSON.parse(localStorage.getItem('user'));
        return user ? user.id : null;
    }
    const currentUserId = getCurrentUserId();

    // Load conversations (users you've messaged), show up to 3, exclude self
    function loadConversations() {
        if (!conversationsList) return;
        fetch('/api/users/conversations')
            .then(res => res.json())
            .then(users => {
                // Exclude self and limit to 3
                const filtered = users.filter(user => user.id !== currentUserId).slice(0, 3);
                conversationsList.innerHTML = '';
                filtered.forEach(user => {
                    // Use user.image_url if available, otherwise use initials
                    let avatarHtml;
                    if (user.image_url) {
                        avatarHtml = `<img src="${user.image_url}" alt="${user.username}" class="conversation-avatar" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">`;
                    } else {
                        // Use initials (first two letters of username or name)
                        const initials = (user.name || user.username).split(' ').map(n => n[0]).join('').substring(0,2).toUpperCase();
                        avatarHtml = `<div class="conversation-avatar" style="width:40px;height:40px;border-radius:50%;background:#eee;display:flex;align-items:center;justify-content:center;font-weight:bold;font-size:1.1rem;color:#333;">${initials}</div>`;
                    }
                    const div = document.createElement('div');
                    div.className = 'conversation';
                    div.innerHTML = `
                        ${avatarHtml}
                        <div class="conversation-details">
                            <h3>${user.name || user.username}</h3>
                            <p class="conversation-preview">${user.last_message || ''}</p>
                        </div>
                    `;
                    div.addEventListener('click', () => {
                        loadConversation(user.id, user.name || user.username);
                    });
                    conversationsList.appendChild(div);
                });
            });
    }

    // Load messages for a conversation
    function loadConversation(userId, username) {
        currentReceiverId = userId;
        if (messageUsername) messageUsername.textContent = username;
        fetch(`/api/messages/conversation/${userId}`)
            .then(res => res.json())
            .then(messages => {
                if (!messageThread) return;
                messageThread.innerHTML = '';
                messages.forEach(msg => {
                    const div = document.createElement('div');
                    div.className = 'message ' + (msg.sender_id === currentUserId ? 'sent' : 'received');
                    div.innerHTML = `<p>${msg.content}</p><span class="message-time">${new Date(msg.created_at).toLocaleTimeString()}</span>`;
                    messageThread.appendChild(div);
                });
                messageThread.scrollTop = messageThread.scrollHeight;
            });
    }

    // Send message
    if (sendMessageBtn && messageTextarea) {
        sendMessageBtn.addEventListener('click', function() {
            if (!currentReceiverId || !messageTextarea.value.trim() || currentReceiverId === currentUserId) return;
            fetch('/api/messages/send', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    receiver_id: currentReceiverId,
                    content: messageTextarea.value
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    loadConversation(currentReceiverId, messageUsername.textContent);
                    messageTextarea.value = '';
                    loadConversations(); // update sidebar
                }
            });
        });
    }

    // User search to start new conversation, exclude self
    if (userSearchInput && userSearchResults) {
        userSearchInput.addEventListener('input', function() {
            const q = this.value.trim();
            if (q.length < 2) {
                userSearchResults.innerHTML = '';
                return;
            }
            fetch(`/api/users/search?q=${encodeURIComponent(q)}`)
                .then(res => res.json())
                .then(users => {
                    userSearchResults.innerHTML = '';
                    users
                        .filter(user => user.id !== currentUserId)
                        .forEach(user => {
                            const li = document.createElement('li');
                            li.textContent = user.username + (user.name ? ` (${user.name})` : '');
                            li.style.cursor = 'pointer';
                            li.addEventListener('click', function() {
                                userSearchResults.innerHTML = '';
                                userSearchInput.value = '';
                                loadConversation(user.id, user.name || user.username);
                                loadConversations(); // update sidebar
                            });
                            userSearchResults.appendChild(li);
                        });
                });
        });
    }

    // Initial load
    if (conversationsList) loadConversations();

    const featuredContainer = document.getElementById('home-featured-items');
    if (featuredContainer) {
        fetch('/api/items/featured')
            .then(res => res.json())
            .then(items => {
                featuredContainer.innerHTML = '';
                items.forEach(item => {
                    featuredContainer.innerHTML += `
                        <div class="item-card">
                            <div class="item-image">
                                <img src="${item.image_url || 'https://via.placeholder.com/150'}" alt="${item.title}">
                            </div>
                            <div class="item-details">
                                <h3>${item.title}</h3>
                                <p class="item-price">$${item.price}</p>
                                <p class="item-condition">${item.condition || ''} · ${item.location || ''}</p>
                                <a href="/ItemRift/item/${item.id}" class="btn primary-btn">View Details</a>
                            </div>
                        </div>
                    `;
                });
            });
    }

    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('user');
    if (userId) {
        // Fetch seller info and open conversation
        fetch(`/api/users/${userId}`)
            .then(res => res.json())
            .then(user => {
                loadConversation(user.id, user.name || user.username);
            });
    }

    const editBtn = document.getElementById('edit-profile-btn');
    const editModal = document.getElementById('edit-profile-modal');
    const closeEdit = document.getElementById('close-edit-profile');
    const editForm = document.getElementById('edit-profile-form');
    const editUsername = document.getElementById('edit-username');

    if (editBtn && editModal) {
        editBtn.addEventListener('click', () => editModal.style.display = 'block');
    }
    if (closeEdit && editModal) {
        closeEdit.addEventListener('click', () => editModal.style.display = 'none');
    }
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const user = JSON.parse(localStorage.getItem('user'));
            fetch('/api/user/update-username', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: user.id, username: editUsername.value })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update localStorage user
                    const user = JSON.parse(localStorage.getItem('user'));
                    user.username = editUsername.value;
                    localStorage.setItem('user', JSON.stringify(user));
                    alert('Username updated!');
                    location.reload();
                } else {
                    alert(data.error || 'Failed to update username');
                }
            });
        });
    }

    // Render user info from localStorage
    if (window.location.pathname.includes('/ItemRift/profile')) {
        const user = JSON.parse(localStorage.getItem('user'));
        if (user) {
            document.getElementById('profile-name').textContent = user.name;
            document.getElementById('profile-username').textContent = '@' + user.username;
            document.getElementById('profile-avatar').textContent = user.name ? user.name.substring(0,2).toUpperCase() : '';
            // Set edit username input value
            const editUsername = document.getElementById('edit-username');
            if (editUsername) editUsername.value = user.username;
        }
    }
});

// Check if user is logged in
function checkLoginStatus() {
    const user = localStorage.getItem('user');
    return user !== null;
}

// Update navigation based on login status
function updateNavigation(isLoggedIn) {
    const loginLink = document.querySelector('.navbar-links a[href="login.html"]');
    
    if (isLoggedIn && loginLink) {
        loginLink.style.display = 'none';
    } else if (!isLoggedIn) {
        const profileLink = document.querySelector('.navbar-links a[href="profile.html"]');
        const sellLink = document.querySelector('.navbar-links a[href="sell.html"]');
        const messagesLink = document.querySelector('.navbar-links a[href="messages.html"]');
        
        if (profileLink) profileLink.style.display = 'none';
        if (sellLink) sellLink.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'login.html';
        });
        if (messagesLink) messagesLink.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'login.html';
        });
    }
}

function renderItems(gridId, items) {
    const grid = document.getElementById(gridId);
    if (!grid) return;
    grid.innerHTML = '';
    items.forEach(item => {
        grid.innerHTML += `
            <div class="item-card">
                <div class="item-image">
                    <img src="${item.image_url || 'https://via.placeholder.com/150'}" alt="${item.title}">
                </div>
                <div class="item-details">
                    <h3>${item.title}</h3>
                    <p class="item-price">$${item.price}</p>
                    <p class="item-condition">${item.condition || ''} · ${item.location || ''}</p>
                    <a href="/ItemRift/item/${item.id}" class="btn outline-btn">View</a>
                </div>
            </div>
        `;
    });
}

function fetchUserListings() {
    const user = JSON.parse(localStorage.getItem('user'));
    fetch('/api/user/listings?id=' + user.id)
        .then(res => res.json())
        .then(items => renderItems('listings-grid', items));
}
function fetchUserPurchases() {
    const user = JSON.parse(localStorage.getItem('user'));
    fetch('/api/user/purchases?id=' + user.id)
        .then(res => res.json())
        .then(items => renderItems('purchases-grid', items));
}
function fetchUserSaved() {
    const user = JSON.parse(localStorage.getItem('user'));
    fetch('/api/user/saved?id=' + user.id)
        .then(res => res.json())
        .then(items => renderItems('saved-grid', items));
}

// Call these on profile page load
if (document.getElementById('listings-grid')) fetchUserListings();
if (document.getElementById('purchases-grid')) fetchUserPurchases();
if (document.getElementById('saved-grid')) fetchUserSaved();

//# sourceMappingURL=app.js.map