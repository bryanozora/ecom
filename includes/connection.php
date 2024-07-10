<?php

session_start();

try {
    $conn = new PDO('mysql:host=localhost;dbname=ecom', 'root', '');
} catch (PDOException $e) {
    die('Tidak berhasil terkoneksi ke database!<br/>Error: ' . $e);
}

include 'ecom.class.php';

$pengiriman = new Products($conn);
$session_login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

if (isset($session_login)) {
    $fetch_admin = "SELECT * FROM admins WHERE id = ?";
    $fetch_admin = $conn->prepare($fetch_admin);
    $fetch_admin->execute([$session_login]);
    $fetch_admin = $fetch_admin->fetch();
}