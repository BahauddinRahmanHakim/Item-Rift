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
                if (data.token) {
                    localStorage.setItem('token', data.token);
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
            if (!isLoggedIn) {
                window.location.href = 'login.html';
                return;
            }
            
            alert('Purchase successful! The seller will be notified.');
        });
    }
    
    const contactButton = document.getElementById('contact-button');
    if (contactButton) {
        contactButton.addEventListener('click', function() {
            if (!isLoggedIn) {
                window.location.href = 'login.html';
                return;
            }
            
            window.location.href = 'messages.html';
        });
    }
    
    const saveButton = document.getElementById('save-button');
    if (saveButton) {
        saveButton.addEventListener('click', function() {
            if (!isLoggedIn) {
                window.location.href = 'login.html';
                return;
            }
            
            // Toggle save/unsave
            if (this.textContent === 'Save Item') {
                this.textContent = 'Unsave Item';
                alert('Item saved to your profile!');
            } else {
                this.textContent = 'Save Item';
                alert('Item removed from saved items.');
            }
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

// Add this to your script.js file

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });
    }
});

// Fetch and render listings for profile page
function fetchUserListings() {
    fetch('/api/user/listings', {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
    })
    .then(res => res.json())
    .then(items => {
        const grid = document.querySelector('#listings-content .item-grid');
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
                        <div class="item-actions">
                            <a href="/ItemRift/item/${item.id}" class="btn outline-btn">View</a>
                            <button class="btn primary-btn">Edit</button>
                        </div>
                    </div>
                </div>
            `;
        });
    });
}

// Fetch and render purchases for profile page
function fetchUserPurchases() {
    fetch('/api/user/purchases', {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
    })
    .then(res => res.json())
    .then(items => {
        const grid = document.querySelector('#purchases-content .item-grid');
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
                        <p class="item-condition">Purchased on ${item.purchased_at}</p>
                        <p class="item-seller">Seller: @${item.seller_username}</p>
                    </div>
                </div>
            `;
        });
    });
}

// Fetch and render saved items for profile page
function fetchUserSaved() {
    fetch('/api/user/saved', {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
    })
    .then(res => res.json())
    .then(items => {
        const grid = document.querySelector('#saved-content .item-grid');
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
                        <div class="item-actions">
                            <a href="/ItemRift/item/${item.id}" class="btn primary-btn">View Details</a>
                            <button class="btn outline-btn">Unsave</button>
                        </div>
                    </div>
                </div>
            `;
        });
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
        fetch('/api/user/update-username', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username: editUsername.value })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Username updated!');
                location.reload();
            } else {
                alert(data.error || 'Failed to update username');
            }
        });
    });
}