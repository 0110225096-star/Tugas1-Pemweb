<?php
$conn = mysqli_connect("localhost", "root", "", "personal_homepage");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();
?>