<?php
session_start();

$status = $_SESSION['zalogowany_id'];

$id_produktu = $_POST['produkt'] ?? 0;

$db = mysqli_connect('localhost','root','','sklep');

mysqli_query($db,"INSERT INTO koszyk VALUES (NULL, $status, $id_produktu)");
?>