<?php

session_start();

if($_SESSION['zalogowany_id'] !='admin'){
    header("Location: main.php");
    exit;
}

$db = mysqli_connect('localhost','root','','sklep');

$id = (int)$_POST['id'] ?? 0;
$status = (int)$_POST['status'];
$opis = $_POST['opis'];
$nazwa = $_POST['nazwa'];
$cena = (float)$_POST['cena'];
$specyfikacja = $_POST['specyfikacja'];

$sql = "UPDATE produkty SET produkty.nazwa = '$nazwa', produkty.cena = $cena, produkty.status = $status, produkty.opis = '$opis', produkty.specyfikacja = '$specyfikacja' WHERE produkty.id_produktu = $id";

mysqli_query($db,$sql);
?>