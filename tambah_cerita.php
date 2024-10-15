<?php
session_start();
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_cerita = $_POST['judul_cerita'];
    $deskripsi_cerita = $_POST['deskripsi_cerita'];
    $created_at = $_POST['created_at'];

    $result = tambah_cerita($_FILES['foto'], $judul_cerita, $deskripsi_cerita, $created_at);

    if ($result) {
        echo "<script>alert('Cerita Berhasil Ditambahkan');
        window.location='index.php';
        </script>";
    } else {
        echo "Terjadi kesalahan saat menambahkan Cerita";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Cerita Horor</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Creepster&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #0d0d0d;
            color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #1b1b1b;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            border: 2px solid #990000;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #e60000;
            font-family: 'Creepster', cursive;
            text-shadow: 2px 2px 4px #000;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #fff;
        }

        input[type="file"],
        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: border 0.3s ease-in-out;
            background-color: #2b2b2b;
            color: #f5f5f5;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #e60000;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #cc0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff3333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #5a67d8;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #434190;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border 0.3s ease-in-out;
            background-color: #2b2b2b;
            color: #f5f5f5;
        }

        textarea:focus {
            border-color: #e60000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Cerita Horor</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="foto">Foto Cerita:</label>
            <input type="file" id="foto" name="foto" required>

            <label for="judul_cerita">Judul Cerita:</label>
            <input type="text" id="judul_cerita" name="judul_cerita" required>

            <label for="deskripsi_cerita">Deskripsi Cerita:</label>
            <textarea id="deskripsi_cerita" name="deskripsi_cerita" rows="4" required></textarea>

            <label for="created_at">Dibuat Tanggal:</label>
            <input type="date" id="created_at" name="created_at" required>

            <input type="submit" value="Simpan">
        </form>
        <a href="index.php">Kembali ke Daftar Cerita</a>
    </div>
</body>

</html>