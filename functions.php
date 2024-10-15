<?php
require_once 'db.php';

function tambah_cerita($foto, $judul_cerita, $deskripsi_cerita, $created_at)
{
    $db = connect_db();
    $target_folder = "uploads/";

    $nama_file = basename($foto["name"]);

    $target_file = $target_folder . $nama_file;

    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($foto["tmp_name"]);
    if ($check === false) {
        echo "File yang diupload bukan gambar";
        return false;
    }

    if ($image_file_type != "jpg" && $image_file_type != "jpeg" && $image_file_type != "png") {
        echo "Hanya File JPG, JPEG, dan PNG yang diperbolehkan";
        return false;
    }

    if ($foto['size'] > 2000000) {
        echo "ukuran file terlalu besar. Maksimal 2MB.";
        return false;
    }

    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
        $judul_cerita = $db->escapeString($judul_cerita);
        $deskripsi_cerita = $db->escapeString($deskripsi_cerita);


        $query = "INSERT INTO ceritaku (foto, judul_cerita, deskripsi_cerita, created_at) VALUES ('$nama_file', '$judul_cerita', '$deskripsi_cerita', '$created_at')";
        $result = $db->exec($query);
        return $result;
    } else {
        echo "Terjadi Kesalahan saat mengupload gambar.";
        return false;
    }
}

function ambil_semua_cerita()
{
    $db = connect_db();
    $query = "SELECT * FROM ceritaku";
    $result = $db->query($query);

    $cerita_list = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $cerita_list[] = $row;
    }

    return $cerita_list;
}

function edit_cerita($id_cerita, $foto, $judul_cerita, $deskripsi_cerita, $created_at)
{
    $db = connect_db();
    $id_cerita = (int)$id_cerita;

    if (!empty($foto['name'])) {
        $target_folder = "uploads/";
        $nama_file = basename($foto['name']);
        $target_file = $target_folder . $nama_file;

        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($foto["tmp_name"]);
        if ($check === false) {
            echo "File yang diupload bukan gambar.";
            return false;
        }

        if ($image_file_type != "jpg" && $image_file_type != "jpeg" && $image_file_type != "png") {
            echo "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
            return false;
        }

        if (move_uploaded_file($foto["tmp_name"], $target_file)) {
            $foto = $nama_file;
        } else {
            echo "Terjadi kesalahan saat mengupload gambar.";
            return false;
        }
    }

    $query = "UPDATE ceritaku SET foto = '$foto', judul_cerita = '$judul_cerita', deskripsi_cerita = '$deskripsi_cerita', created_at = '$created_at' WHERE id_cerita = $id_cerita";
    $result = $db->query($query);
    return $result;
}

function hapus_cerita($id_cerita)
{
    $db = connect_db();
    $query = "DELETE FROM ceritaku WHERE id_cerita = $id_cerita";
    $result = $db->exec($query);

    return $result;
}
