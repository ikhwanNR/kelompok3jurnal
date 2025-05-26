<?php
session_start();
include 'koneksi.php'; 

if (!isset($_SESSION['id_pengguna']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama_guru = $_POST['nama_guru'];
    $tanggal = $_POST['tanggal'];
    $kelas = $_POST['kelas'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $mapel = $_POST['mapel'];
    $siswa_hadir = $_POST['siswa_hadir'];
    $siswa_tidak_hadir = $_POST['siswa_tidak_hadir'];

    
    $uploaded_image = "";
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/"; 
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat folder jika belum ada
        }

        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $uploaded_image = $target_file;
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file.";
            }
        }
    }

    
    $query = "INSERT INTO riwayat_pengisian (nama_guru, tanggal, kelas, jam_mulai, jam_selesai, mapel, siswa_hadir, siswa_tidak_hadir, gambar) 
              VALUES ('$nama_guru', '$tanggal', '$kelas', '$jam_mulai', '$jam_selesai', '$mapel', '$siswa_hadir', '$siswa_tidak_hadir', '$uploaded_image')";

    if (mysqli_query($conn, $query)) {
        echo "<h1>Data Berhasil Disimpan</h1>";
        echo "<p><strong>Nama Guru:</strong> " . htmlspecialchars($nama_guru) . "</p>";
        echo "<p><strong>Hari dan Tanggal:</strong> " . htmlspecialchars($tanggal) . "</p>";
        echo "<p><strong>Kelas:</strong> " . htmlspecialchars($kelas) . "</p>";
        echo "<p><strong>Jam Mulai:</strong> " . htmlspecialchars($jam_mulai) . "</p>";
        echo "<p><strong>Jam Selesai:</strong> " . htmlspecialchars($jam_selesai) . "</p>";
        echo "<p><strong>Mata Pelajaran:</strong> " . htmlspecialchars($mapel) . "</p>";
        echo "<p><strong>Siswa Hadir:</strong> " . htmlspecialchars($siswa_hadir) . "</p>";
        echo "<p><strong>Siswa Tidak Hadir:</strong> <br>" . nl2br(htmlspecialchars($siswa_tidak_hadir)) . "</p>";

        
        if (!empty($uploaded_image)) {
            echo "<p><strong>Gambar yang diupload:</strong></p>";
            echo "<img src='" . htmlspecialchars($uploaded_image) . "' alt='Gambar' style='max-width: 300px;'><br>";
        }

        echo "<br><a href='riwayat.php'>Lihat Riwayat</a>";
        echo "<br><a href='dashboard.php'>Kembali ke Dashboard</a>";

    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
