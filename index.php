        <?php
        session_start();
        require_once 'functions.php';

        $cerita_list = ambil_semua_cerita();
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cerita HororKu</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Creepster&display=swap');

                body {
                    background-color: #0d0d0d;
                    color: #f5f5f5;
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                }

                h2 {
                    text-align: center;
                    font-family: 'Creepster', cursive;
                    color: #e60000;
                    text-shadow: 3px 3px 5px #000;
                    letter-spacing: 2px;
                    margin-top: 20px;
                    font-size: 3em;
                }

                .container {
                    width: 85%;
                    margin: 0 auto;
                    padding: 20px;
                }

                .right {
                    text-align: right;
                    margin-bottom: 20px;
                }

                .right a {
                    text-decoration: none;
                    background-color: #660000;
                    color: #f5f5f5;
                    padding: 10px 15px;
                    border-radius: 5px;
                    box-shadow: 2px 2px 5px #222;
                    transition: background-color 0.3s, box-shadow 0.3s;
                }

                .right a:hover {
                    background-color: #990000;
                    box-shadow: 4px 4px 8px #000;
                }

                .card-container {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    grid-auto-rows: minmax(150px, auto);
                    gap: 20px;
                    justify-items: center;
                }

                .card {
                    background-color: #1b1b1b;
                    border-radius: 10px;
                    padding: 20px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
                    position: relative;
                    overflow: hidden;
                    transition: transform 0.4s ease, box-shadow 0.4s ease;
                    max-width: 100%;
                    border: 2px solid #990000;
                }

                .card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
                }

                .card img {
                    width: 100%;
                    height: 180px;
                    object-fit: cover;
                    border-radius: 10px;
                    border: 2px solid #330000;
                    transition: transform 0.4s ease, box-shadow 0.4s ease;
                }

                .card:hover img {
                    transform: scale(1.05);
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.8);
                }

                .card h3 {
                    color: #ff1a1a;
                    font-family: 'Creepster', cursive;
                    text-shadow: 1px 1px 3px #000;
                    margin: 15px 0;
                    font-size: 1.6em;
                    text-align: center;
                    transition: color 0.3s ease;
                }

                .card:hover h3 {
                    color: #ff3333;
                }

                .card p {
                    color: #ccc;
                    margin: 10px 0;
                    font-size: 0.95em;
                    text-align: center;
                }

                .actions {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                }

                .actions a {
                    text-decoration: none;
                    color: #fff;
                    padding: 8px 12px;
                    background-color: #cc0000;
                    border-radius: 5px;
                    transition: background-color 0.3s ease, transform 0.3s ease;
                    font-size: 0.9em;
                    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
                }

                .actions a:hover {
                    background-color: #ff3333;
                    transform: scale(1.1);
                }

                .no-data {
                    text-align: center;
                    color: #e60000;
                    font-family: 'Creepster', cursive;
                }

                .card-content {
                    position: relative;
                    z-index: 2;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <h2>Cerita Hororku</h2>

                <?php
                if (isset($_GET['status']) && isset($_GET['message'])) {
                    $status = $_GET['status'];
                    $message = $_GET['message'];

                    if ($status === 'success') {
                        echo "<script>alert('Berhasil: $message');</script>";
                    } else {
                        echo "<script>alert('Gagal: $message');</script>";
                    }
                }
                ?>

                <div class="right">
                    <a href="tambah_cerita.php">Tambah Cerita</a>
                </div>

                <div class="card-container">
                    <?php if (empty($cerita_list)): ?>
                        <div class="no-data">Tidak ada List Cerita Horor</div>
                    <?php else: ?>
                        <?php foreach ($cerita_list as $cerita): ?>
                            <div class="card">
                                <div class="grunge-effect"></div>
                                <div class="card-content">
                                    <img src="uploads/<?php echo $cerita['foto']; ?>" alt="Gambar Cerita">
                                    <h3><?php echo $cerita['judul_cerita'] ?></h3>
                                    <p><?php echo substr($cerita['deskripsi_cerita'], 0, 60); ?>...</p>
                                    <div class="actions">
                                        <a href="detail_cerita.php?id=<?php echo $cerita['id_cerita']; ?>" class="detail">Detail</a>
                                        <a href="edit_cerita.php?id=<?php echo $cerita['id_cerita']; ?>" class="edit">Edit</a>
                                        <a href="hapus_cerita.php?id=<?php echo $cerita['id_cerita']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus?');" class="delete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </body>

        </html>t