<?php
session_start();

if($_SESSION['zalogowany_id'] != 'admin'){
    header("Location: main.php");

    exit;
}

$db = mysqli_connect('localhost','root','','sklep');

$id = $_GET['id'] ?? '';

if($id != ''){
    $sql = "DELETE FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika = $id";

    mysqli_query($db, $sql);
}

header("Location: zarzadajKontami.php");
?>