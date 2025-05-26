<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }
        header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #34495e;
            padding: 10px;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        nav ul li a:hover {
            color: #f39c12;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard Utama</h1>
    </header>
    <nav>
        <ul>
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="home.php">Jurnal</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <main>
        <h2>Selamat Datang Di Dashboard Utama</h2>
        <p>Pilih Menu Sesuai Kebutuhan Anda.</p>
        
    </main>
    <footer>
        <p>&copy; SMK N 5 SURAKARTA</p>
        <p>&copy; GURU YANG BAIK ADALAH GURU YANG MENGETAHUI KEADAAN SISWA</p>
    </footer>
</body>
</html>
