<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'sklep');

// Krótszy zapis sprawdzania POST
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$haslo = $_POST['haslo'] ?? '';

$login = mysqli_real_escape_string($db, $login);
$email = mysqli_real_escape_string($db, $email);

$sql = "SELECT id_uzytkownika FROM uzytkownicy 
        WHERE login = '$login' AND `email` = '$email' AND haslo = '$haslo'";

$sql1 = "SELECT id_admina FROM administratorzy 
        WHERE login = '$login' AND `e-mail` = '$email' AND haslo = '$haslo'";

$wynik = mysqli_query($db, $sql);
$wynik1 = mysqli_query($db, $sql1);

if (mysqli_num_rows($wynik1) > 0) {
    $_SESSION['zalogowany_id'] = 'admin';
    echo "SUCCESS:";
} else {
    if (mysqli_num_rows($wynik) > 0) {
        $uzytkownik = mysqli_fetch_assoc($wynik);
        // Zamiast header, wysyłamy samo ID
        $_SESSION['zalogowany_id'] = $uzytkownik['id_uzytkownika'];
        echo "SUCCESS:";
    } else {
        echo "Nieprawidłowe dane logowania!";
    }
}


?>