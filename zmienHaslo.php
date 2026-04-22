<?php

$db = mysqli_connect('localhost','root','','sklep');

$status = $_POST['status'];
$stareHaslo = $_POST['stareHaslo'];
$noweHaslo1 = $_POST['noweHaslo1'];
$noweHaslo2 = $_POST['noweHaslo2'];

$wynik = mysqli_query($db,"SELECT uzytkownicy.haslo FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika = $status");

$hasloUser = mysqli_fetch_assoc($wynik);


if($hasloUser['haslo'] != $stareHaslo || $stareHaslo == ''){
    echo 'Nieprawidłowe hasło!';
}else{
    if(strlen($noweHaslo1) <8){
        echo 'Nowe hasło jest za krótkie (przynajmniej 8 znaków)';
    }else{
        if($noweHaslo1 == $noweHaslo2){
            mysqli_query($db,"UPDATE uzytkownicy SET uzytkownicy.haslo = '$noweHaslo1' WHERE uzytkownicy.id_uzytkownika = $status");
            echo 'Hasło zmieniono pomyślnie';
        }else{
            echo 'Potwierdzone hasło nie jest takie samo!';
        }
    }
}
?>