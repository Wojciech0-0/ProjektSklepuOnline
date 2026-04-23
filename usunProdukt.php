<?php
session_start();
if (!isset($_SESSION['zalogowany_id'])) exit;
$db = mysqli_connect('localhost','root','','sklep');
$status = $_SESSION['zalogowany_id'];

$id_koszyka = (int)$_GET['id'];

mysqli_query($db,"DELETE FROM koszyk WHERE koszyk.id_koszyka = $id_koszyka AND koszyk.id_uzytkownika = $status");

header('Location: koszyk.php');
exit;
?>