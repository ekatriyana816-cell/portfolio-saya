<?php
// Memanggil koneksi database
include 'koneksi.php';

// Proses Update Data ketika tombol "Simpan Perubahan" diklik
if (isset($_POST['update_progress'])) {
    $id = $_POST['id'];
    $status_baru = $_POST['progress_status'];
    $judul_baru = $_POST['title'];

    // Query SQL untuk memperbarui data ke database
    $update_query = "UPDATE final_projects SET title = '$judul_baru', progress_status = '$status_baru' WHERE id = $id";
    $jalankan_update = mysqli_query($koneksi, $update_query);

    if ($jalankan_update) {
        echo "<script>alert('Data Proyek Akhir Berhasil Diperbarui!'); window.location='index.php?page=showcase';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}

// Mengambil data proyek saat ini untuk ditampilkan di form
$query = "SELECT id, title, progress_status FROM final_projects LIMIT 1";
$result = mysqli_query($koneksi, $query);
$project = mysqli_fetch_assoc($result);
?>

<div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);">
    <h2 style="text-align: center; color: #0f172a; margin-bottom: 25px;">🛠️ Panel Admin (CRUD Update)</h2>
    <p style="text-align: center; color: #64748b; font-size: 14px; margin-top: -15px; margin-bottom: 30px;">Halaman khusus untuk memperbarui status laporan proyek akhir Anda</p>

    <?php if ($project) : ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $project['id']; ?>">

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #334155;">Judul Proyek Akhir</label>
                <input type="text" name="title" value="<?= $project['title']; ?>" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px;" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #334155;">Status Progress Saat Ini</label>
                <select name="progress_status" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; background-color: #fff;" required>
                    <option value="Tahap Perancangan (Design)" <?= ($project['progress_status'] == 'Tahap Perancangan (Design)') ? 'selected' : ''; ?>>Tahap Perancangan (Design)</option>
                    <option value="Proses Coding (Development)" <?= ($project['progress_status'] == 'Proses Coding (Development)') ? 'selected' : ''; ?>>Proses Coding (Development)</option>
                    <option value="Tahap Pengujian (Testing)" <?= ($project['progress_status'] == 'Tahap Pengujian (Testing)') ? 'selected' : ''; ?>>Tahap Pengujian (Testing)</option>
                    <option value="Selesai / Siap Sidang" <?= ($project['progress_status'] == 'Selesai / Siap Sidang') ? 'selected' : ''; ?>>Selesai / Siap Sidang</option>
                </select>
            </div>

            <button type="submit" name="update_progress" style="background-color: #0ea5e9; color: white; padding: 14px; border: none; border-radius: 8px; cursor: pointer; width: 100%; font-size: 16px; font-weight: 600; transition: background 0.2s;">
                Simpan Perubahan Data
            </button>
        </form>
    <?php else : ?>
        <p style="color: red; text-align: center;">Data proyek di database kosong.</p>
    <?php endif; ?>
</div>