<?php

session_start();

if($_SESSION['zalogowany_id' !='admin']){
    header("Location: main.php");
    exit;
}

$db = mysqli_connect('localhost','root','','sklep');

$id = $_POST['id'] ?? 0;

$sql = "DELETE FROM produkty WHERE produkty.id_produktu = $id";

mysqli_query($db,$sql);
?>