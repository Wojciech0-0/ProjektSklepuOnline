<?php
session_start();
if (!isset($_SESSION['zalogowany_id'])) exit;
$status = $_SESSION['zalogowany_id'];

$id_produktu = $_POST['produkt'] ?? 0;

if (!isset($_SESSION['koszykgosc'])) {
        $_SESSION['koszykgosc'] = [];
    }

$_SESSION['koszykgosc'][] = $id_produktu;
?>