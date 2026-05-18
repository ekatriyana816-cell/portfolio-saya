<?php
// Panggil file koneksi database
include 'koneksi.php';

// Ambil 1 data proyek dari tabel final_projects
$query = "SELECT * FROM final_projects LIMIT 1";
$result = mysqli_query($koneksi, $query);
$project = mysqli_fetch_assoc($result);
?>

<div style="max-width: 850px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);">
    
    <h1 style="font-size: 28px; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 30px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px;">
        📂 Detail Laporan Proyek Akhir
    </h1>

    <?php if ($project) : ?>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; background: #f8fafc; padding: 15px 20px; border-radius: 10px; border-left: 5px solid #0ea5e9;">
            <div>
                <h3 style="margin: 0; color: #1e293b; font-size: 20px; font-weight: 700;"><?= $project['title']; ?></h3>
                <small style="color: #64748b;">Ditarik secara dinamis dari database MySQL</small>
            </div>
            <span style="background-color: #f59e0b; color: #fff; padding: 6px 14px; border-radius: 30px; font-weight: 700; font-size: 13px;">
                Status: <?= $project['progress_status']; ?>
            </span>
        </div>

        <div style="margin-bottom: 30px;">
            <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 8px;">💡 Solusi & Deskripsi Singkat</h4>
            <p style="color: #475569; font-size: 15px; text-align: justify;"><?= $project['description']; ?></p>
        </div>

        <div style="margin-bottom: 30px;">
            <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 8px;">⚠️ Analisis Masalah & Kebutuhan Sistem</h4>
            <p style="color: #475569; font-size: 15px; text-align: justify;"><?= $project['problem_analysis']; ?></p>
        </div>

        <div style="margin-bottom: 30px;">
            <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 10px;">🛠️ Arsitektur & Tech Stack</h4>
            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                <?php 
                $stacks = explode(',', $project['tech_stack']); 
                foreach($stacks as $stack) :
                ?>
                    <span style="background: #e0f2fe; color: #0369a1; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        <?= trim($stack); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 12px;">📊 Rencana Perancangan (Diagram ERD / Flowchart)</h4>
            <div style="text-align: center; padding: 20px; background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 12px;">
                
                <img src="<?= $project['diagram_image']; ?>" alt="Diagram Sistem" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                
                <p style="font-size: 13px; color: #94a3b8; margin-top: 10px; font-style: italic;">
                    File gambar aktif: <strong><?= $project['diagram_image']; ?></strong>
                </p>
            </div>
        </div>

    <?php else : ?>
        <div style="text-align: center; padding: 40px; color: #ef4444; font-weight: 600;">
            ❌ Data laporan proyek akhir tidak ditemukan di database! Pastikan Anda sudah mengisi baris data di phpMyAdmin.
        </div>
    <?php endif; ?>

</div>