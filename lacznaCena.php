<?php
session_start();
if (!isset($_SESSION['zalogowany_id']) OR $_SESSION['zalogowany_id']=='gosc') {
    // Jeśli nie ma go w schowku, wykopujemy go do logowania
    header("Location: logowanie.php");
    exit;
}

$status = $_SESSION['zalogowany_id'];

$db = mysqli_connect('localhost','root','','sklep');

$sql = "SELECT SUM(produkty.cena) as money FROM zakupy 
        JOIN produkty ON zakupy.id_produktu = produkty.id_produktu 
        WHERE zakupy.id_uzytkownika = $status";

$wynik = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($wynik);

$suma = $data['money'] ? number_format($data['money'], 2, '.', ' ') : "0.00";
echo $suma . ' zł';
?>