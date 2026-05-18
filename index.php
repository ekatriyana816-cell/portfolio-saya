<?php
// 1. Mengambil parameter "page" dari URL browser (misal: index.php?page=showcase)
// Jika tidak ada parameter page di URL, maka otomatis dianggap membuka halaman 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 2. Memanggil struktur atas website (Navbar, Tag Head, CSS)
include 'header.php';

// 3. Menentukan konten tengah secara dinamis berdasarkan halaman yang dipilih
switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'showcase':
        include 'showcase.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
    case 'admin':
        include 'admin.php';
        break;
    default:
        include 'home.php';
        break;
}

// 4. Memanggil struktur bawah website (Footer, Tag Penutup HTML)
include 'footer.php';
?>