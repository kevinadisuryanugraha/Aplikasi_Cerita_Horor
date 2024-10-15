<?php
session_start();
require_once 'functions.php';

if (isset($_GET['id'])) {
    $id_cerita = $_GET['id'];
    hapus_cerita($id_cerita);
    header("Location: index.php");
    exit();
}
