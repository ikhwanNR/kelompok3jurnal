<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['id_pengguna']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


$query = "SELECT * FROM riwayat_pengisian ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengisian</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Riwayat Pengisian</h1>
        <a href="dashboard.php" class="btn btn-primary mb-3">Kembali ke Dashboard</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Guru</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Siswa Hadir</th>
                        <th>Siswa Tidak Hadir</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($data["nama_guru"]) ?></td>
                        <td><?= htmlspecialchars($data["tanggal"]) ?></td>
                        <td><?= htmlspecialchars($data["kelas"]) ?></td>
                        <td><?= htmlspecialchars($data["mapel"]) ?></td>
                        <td><?= htmlspecialchars($data["siswa_hadir"]) ?></td>
                        <td><?= nl2br(htmlspecialchars($data["siswa_tidak_hadir"])) ?></td>
                        <td>
                            <?php if (!empty($data["gambar"])): ?>
                                <img src="<?= htmlspecialchars($data["gambar"]) ?>" alt="Gambar" width="100" class="img-thumbnail">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada gambar</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
