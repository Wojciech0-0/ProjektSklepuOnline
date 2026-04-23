<?php
session_start();

if (isset($_GET['id_prod']) && isset($_SESSION['koszykgosc'])) {
    $id_do_usuniecia = $_GET['id_prod'];

    // 1. Szukamy klucza (pozycji) tego produktu w tablicy
    $klucz = array_search($id_do_usuniecia, $_SESSION['koszykgosc']);

    // 2. Sprawdzamy czy w ogóle go znaleźliśmy
    if ($klucz !== false) {
        // 3. Usuwamy tylko ten JEDEN konkretny element pod tym kluczem
        unset($_SESSION['koszykgosc'][$klucz]);
        
        // 4. BARDZO WAŻNE: Naprawiamy indeksy tablicy (żeby nie było dziur)
        $_SESSION['koszykgosc'] = array_values($_SESSION['koszykgosc']);
    }
}

// 5. Wracamy do koszyka
header("Location: koszyk.php");
exit;