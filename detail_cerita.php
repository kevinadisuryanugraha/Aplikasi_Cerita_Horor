<?php
session_start();
require_once 'functions.php';

if (isset($_GET['id'])) {
    $id_cerita = $_GET['id'];
    $db = connect_db();
    $query = "SELECT * FROM ceritaku WHERE id_cerita = $id_cerita";
    $cerita = $db->querySingle($query, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Cerita Horor</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Creepster&display=swap');

        body {
            font-family: 'Arial', sans-serif;
            background-color: #0d0d0d;
            color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #1b1b1b;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            border: 2px solid #990000;
        }

        h2 {
            color: #e60000;
            font-family: 'Creepster', cursive;
            text-align: center;
            text-shadow: 3px 3px 5px #000;
            letter-spacing: 2px;
            margin-bottom: 30px;
            font-size: 3em;
        }

        .detail-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            background-color: #1b1b1b;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #990000;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        img {
            max-width: 100%;
            border-radius: 10px;
            border: 3px solid #330000;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.8;
            font-size: 1.1em;
            color: #ccc;
            text-align: center;
        }

        p strong {
            color: #ff3333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #cc0000;
            color: #f5f5f5;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        a:hover {
            background-color: #ff3333;
            box-shadow: 4px 4px 8px #000;
        }

        .back-link {
            background-color: #007bff;
        }

        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Detail Cerita Horor</h2>
        <?php if ($cerita): ?>
            <div class="detail-container">
                <img src="uploads/<?php echo $cerita['foto']; ?>" alt="Foto Cerita">
                <p><strong>Judul Cerita:</strong> <?php echo $cerita['judul_cerita']; ?></p>
                <p><strong>Deskripsi Cerita:</strong> <?php echo $cerita['deskripsi_cerita']; ?></p>
                <p><strong>Tanggal cerita:</strong> <?php echo $cerita['created_at']; ?></p>
            </div>
        <?php else: ?>
            <p>Cerita tidak ditemukan.</p>
        <?php endif; ?>
        <a class="back-link" href="index.php">Kembali ke Daftar Cerita</a>
    </div>
</body>

</html>