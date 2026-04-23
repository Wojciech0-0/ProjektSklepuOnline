<?php
session_start();
if(!isset($_SESSION['zalogowany_id']) || $_SESSION['zalogowany_id'] == 'gosc'){
    header("Location: logowanie.php");

    exit;
}
$status = $_SESSION['zalogowany_id'];

$db = mysqli_connect('localhost','root','','sklep');

$sql = "DELETE FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika = $status";

mysqli_query($db,$sql);

session_unset();
session_destroy();
?>