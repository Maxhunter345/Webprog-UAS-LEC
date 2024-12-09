// Loading Screen
document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');
    const mainContent = document.getElementById('main-content');

    // Function to hide loading and show content
    function showContent() {
        loadingScreen.classList.add('fade-out');
        setTimeout(() => {
            loadingScreen.style.display = 'none';
            mainContent.style.display = 'block';
        }, 500);
    }

    // Show content after a short delay
    setTimeout(showContent, 1500);
});

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

let extracurriculars = [
    {
        name: "Basket",
        description: "Basket SMA Negeri 6 Tangerang menyediakan fasilitas terbaik untuk siswa yang ingin mengembangkan keterampilan olahraga mereka.",
        symbol: "basket.png"
    },
    {
        name: "Paskibra",
        description: "Di ekstrakurikuler Paskibra, siswa dilatih untuk menjadi anggota pasukan pengibar bendera yang memiliki kedisiplinan dan tanggung jawab yang tinggi.",
        symbol: "paskibra.svg"
    },
    {
        name: "Pramuka",
        description: "Pramuka di SMAN 6 Tangerang mengajarkan keterampilan dasar seperti tali-temali, kepemimpinan, dan kepedulian terhadap lingkungan.",
        symbol: "pramuka.svg"
    },
    {
        name: "Teater",
        description: "Ekstrakurikuler teater memberikan ruang bagi siswa untuk mengembangkan bakat seni peran dan berpartisipasi dalam berbagai pentas seni.",
        symbol: "teater.svg"
    }
];

let currentExtracurricularIndex = 0;

// Fungsi untuk toggle deskripsi dan tombol
function toggleDescription() {
    var description = document.getElementById("ekstrakurikuler-description");
    var detailBtn = document.getElementById("detail-btn");

    // Toggle visibility deskripsi
    if (description.style.display === "none") {
        description.style.display = "block";  // Menampilkan deskripsi
        detailBtn.innerHTML = "Tutup";  // Mengubah tombol menjadi 'Tutup'
    } else {
        description.style.display = "none";  // Menyembunyikan deskripsi
        detailBtn.innerHTML = "Detail";  // Mengubah tombol kembali ke 'Detail'
    }
}

function changeExtracurricular(direction) {
    currentExtracurricularIndex += direction;
    if (currentExtracurricularIndex < 0) {
        currentExtracurricularIndex = extracurriculars.length - 1; // Loop to the last
    } else if (currentExtracurricularIndex >= extracurriculars.length) {
        currentExtracurricularIndex = 0; // Loop to the first
    }
    updateExtracurricular();
}

function updateExtracurricular() {
    const extracurricular = extracurriculars[currentExtracurricularIndex];
    document.querySelector('.ekstrakurikuler-symbol img').src = extracurricular.symbol;
    document.querySelector('.ekstrakurikuler-card h3').textContent = extracurricular.name;
    document.querySelector('.ekstrakurikuler-description').textContent = extracurricular.description;
}

updateExtracurricular(); // Initialize with the first extracurricular
