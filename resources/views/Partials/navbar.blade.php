<nav class="navbar">
    <!-- Gambar Latar Belakang Header -->
    <img src="images/background.jpg" 
    alt="Header Background" 
    style="position: absolute; 
           top: 0; left: 0; 
           width: 100%; height: 100%; 
           object-fit: cover; 
           object-position: center;
           z-index: -1;"> <!-- Menggunakan z-index agar background berada di belakang konten lainnya -->

    <div class="container-fluid d-flex flex-column align-items-center justify-content-center text-white" style="height: 250px;">
        <!-- Gambar Profil -->
        <img src="{{ asset('images/profileweb.jpg') }}" 
        alt="Profile Picture" 
        style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid white; object-fit: cover;">
        
        <!-- Nama Profil -->
        <h2 class="mt-2">meysha rahmah azahra</h2>
         <!-- Deskripsi singkat di bawah nama -->
    </div>
</nav>

<!-- Navbar Utama -->
<nav class="navbar navbar-expand-lg bg-success navbar-dark px-3">
    <div class="container-fluid">
        <!-- Brand Navbar -->
        <a class="navbar-brand fw-bolder d-flex align-items-center gap-2" href="#">
            <i class="bi bi-card-checklist"></i> <!-- Ikon Bootstrap -->
            {{ config('app.name') }} <!-- Nama aplikasi dari konfigurasi Laravel -->
        </a>

        <!-- Bagian Kanan Navbar -->
        <div class="d-flex gap-2 ms-auto align-items-center">
    </div>
</nav>
