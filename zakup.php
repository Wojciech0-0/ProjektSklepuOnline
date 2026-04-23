<?php
session_start();

if (!isset($_SESSION['zalogowany_id'])) exit;

$status = $_SESSION['zalogowany_id'];

$index = uniqid();

$db = mysqli_connect('localhost','root','','sklep');

$sql1 = "SELECT koszyk.id_produktu FROM koszyk WHERE koszyk.id_uzytkownika = $status";
$data = date("Y-m-d");
$wynik1 = mysqli_query($db, $sql1);

while($d = mysqli_fetch_array($wynik1)){
   $id_prod = $d['id_produktu'];
    $sql2 = "INSERT INTO zakupy  VALUES (NULL, $status, $id_prod,'$data','$index')";
    mysqli_query($db, $sql2);
}

 mysqli_query($db, "DELETE FROM koszyk WHERE koszyk.id_uzytkownika = $status");
?>