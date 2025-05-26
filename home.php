<?php
session_start();

if (isset($_SESSION['id_pengguna']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengisian</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 95%;
            max-width: 350px;
        }
        h1 {
            text-align: center;
            font-size: 16px;
            color: #2c3e50;
        }
        label {
            font-weight: 600;
            font-size: 12px;
        }
        input, select, textarea {
            width: 100%;
            padding: 6px;
            margin: 3px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px;
        }
        input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            padding: 6px;
            cursor: pointer;
            font-size: 12px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulir Pengisian</h1>
        <form action="proses_form.php" method="post" enctype="multipart/form-data">
            <label for="nama_guru">GURU:</label>
            <input type="text" id="nama_guru" name="nama_guru" required>

            <label for="tanggal">Hari dan Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="XI-PPLG A">XI-PPLG A</option>
                <option value="XI-PPLG B">XI-PPLG B</option>
                <option value="XI-PPLG C">XI-PPLG C</option>
            </select>

            <label for="jam_mulai">Jam Mulai:</label>
            <select id="jam_mulai" name="jam_mulai" required>
                <option value="">Pilih Jam</option>
                <?php for ($i = 1; $i <= 11; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <label for="jam_selesai">Jam Selesai:</label>
            <select id="jam_selesai" name="jam_selesai" required>
                <option value="">Pilih Jam</option>
                <?php for ($i = 1; $i <= 11; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <label for="mapel">Mata Pelajaran:</label>
            <select id="mapel" name="mapel" required>
                <option value="">Pilih Mata Pelajaran</option>
                <option value="PJOK">PJOK</option>
                <option value="B. INGGRIS">B. INGGRIS</option>
                <option value="PP">PP</option>
                <option value="B. JAWA">B. JAWA</option>
                <option value="MTK">MTK</option>
                <option value="PA&BP">PA&BP</option>
                <option value="B. INDO">B. INDO</option>
            </select>

            <label for="siswa_hadir">Siswa Hadir:</label>
            <input type="text" id="siswa_hadir" name="siswa_hadir" required>

            <label for="siswa_tidak_hadir">Siswa Tidak Hadir:</label>
            <textarea id="siswa_tidak_hadir" name="siswa_tidak_hadir" rows="3"></textarea>

            <label for="gambar">Upload Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <input type="submit" value="Kirim">
        </form>
    </div>
</body>
</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>
