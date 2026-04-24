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
    $sql2 = "SELECT COUNT(koszyk.id_produktu) AS 'ilosc' FROM koszyk WHERE koszyk.id_produktu = $id_prod";
    $wynik2 = mysqli_query($db, $sql2);
    $ilosc_w_koszyku = mysqli_fetch_array($wynik2);
    $sql0 = "SELECT produkty.status FROM produkty WHERE produkty.id_produktu = $id_prod";
    $wynik0 = mysqli_query($db, $sql0);
    $stan = mysqli_fetch_array($wynik0);
    if($stan < $ilosc_w_koszyku){
        echo 'Za mało';
        exit;
    }
    $sql2 = "INSERT INTO zakupy  VALUES (NULL, $status, $id_prod,'$data','$index')";
    $sql3 = "UPDATE produkty SET produkty.status = produkty.status - 1 WHERE produkty.id_produktu = $id_prod";
    mysqli_query($db, $sql2);
    mysqli_query($db, $sql3);
}

 mysqli_query($db, "DELETE FROM koszyk WHERE koszyk.id_uzytkownika = $status");
?>