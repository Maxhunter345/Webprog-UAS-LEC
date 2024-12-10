// Loading Screen
document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');
    
    // Function to hide loading screen
    function showContent() {
        loadingScreen.classList.add('fade-out');
        setTimeout(() => {
            loadingScreen.style.display = 'none';
        }, 500);
    }

    // Show content after a short delay
    setTimeout(showContent, 1500);
});

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

// Ekstrakurikuler functionality
let currentExtracurricularIndex = 0;
let extracurriculars = []; // Will be populated by PHP

// Function to toggle description and button
function toggleDescription(id = null) {
    const description = document.getElementById(`ekstrakurikuler-description-${id || ''}`);
    const detailBtn = document.getElementById(`detail-btn-${id || ''}`);
    
    if (!description || !detailBtn) return;

    if (description.style.display === "none") {
        description.style.display = "block";
        detailBtn.innerHTML = "Tutup";
    } else {
        description.style.display = "none";
        detailBtn.innerHTML = "Detail";
    }
}

// Function to change extracurricular display
function changeExtracurricular(direction) {
    const container = document.querySelector('.ekstrakurikuler-container');
    const cards = container.querySelectorAll('.ekstrakurikuler-card');
    if (!cards.length) return;

    currentExtracurricularIndex += direction;
    
    // Handle wrapping
    if (currentExtracurricularIndex < 0) {
        currentExtracurricularIndex = cards.length - 1;
    } else if (currentExtracurricularIndex >= cards.length) {
        currentExtracurricularIndex = 0;
    }

    // Hide all cards
    cards.forEach(card => card.style.display = 'none');
    
    // Show current card
    cards[currentExtracurricularIndex].style.display = 'flex';
}

// Initialize extracurricular display
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.ekstrakurikuler-container');
    if (!container) return;

    const cards = container.querySelectorAll('.ekstrakurikuler-card');
    if (!cards.length) return;

    // Hide all cards except the first one
    cards.forEach((card, index) => {
        if (index !== 0) {
            card.style.display = 'none';
        }
    });
});

// Handle news card clicks
document.querySelectorAll('.news-card').forEach(card => {
    card.addEventListener('click', function() {
        const newsId = this.dataset.newsId;
        if (newsId) {
            window.location.href = `news_detail.php?id=${newsId}`;
        }
    });
});

// Handle achievement card navigation
function changePrestasi(direction) {
    const container = document.querySelector('.prestasi-cards');
    const cards = container.querySelectorAll('.prestasi-card-container');
    if (!cards.length) return;

    let currentIndex = Array.from(cards).findIndex(card => 
        card.style.display !== 'none'
    );
    
    if (currentIndex === -1) currentIndex = 0;

    // Calculate new index
    let newIndex = currentIndex + direction;
    if (newIndex < 0) newIndex = cards.length - 1;
    if (newIndex >= cards.length) newIndex = 0;

    // Hide all cards
    cards.forEach(card => card.style.display = 'none');
    
    // Show new card
    cards[newIndex].style.display = 'block';
}

// Initialize achievement display
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.prestasi-cards');
    if (!container) return;

    const cards = container.querySelectorAll('.prestasi-card-container');
    if (!cards.length) return;

    // Hide all cards except the first one
    cards.forEach((card, index) => {
        if (index !== 0) {
            card.style.display = 'none';
        }
    });
});