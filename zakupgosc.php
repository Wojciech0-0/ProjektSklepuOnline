<?php
session_start();
if(!isset($_SESSION['zalogowany_id']) || $_SESSION['zalogowany_id'] != 'gosc'){
    exit;
}

$db = mysqli_connect('localhost','root','','sklep');

$podsumowanie_koszyka = array_count_values($_SESSION['koszykgosc']);

// 2. Najpierw sprawdźmy, czy WSZYSTKIEGO starczy (faza weryfikacji)
foreach ($podsumowanie_koszyka as $id_prod => $ilosc_chciana) {
    $id_prod = (int)$id_prod;
    $res = mysqli_query($db, "SELECT status FROM produkty WHERE id_produktu = $id_prod");
    $produkt = mysqli_fetch_assoc($res);

    if ($produkt['status'] < $ilosc_chciana) {
        // Jeśli choć jednego braknie, przerywamy wszystko przed jakimkolwiek UPDATE
        echo "Za mało"; 
        mysqli_close($db);
        exit;
    }
}

// 3. Jeśli doszliśmy tutaj, znaczy że towaru starczy na wszystko. Robimy UPDATE.
foreach ($podsumowanie_koszyka as $id_prod => $ilosc_chciana) {
    $id_prod = (int)$id_prod;
    $sql = "UPDATE produkty SET status = status - $ilosc_chciana WHERE id_produktu = $id_prod";
    mysqli_query($db, $sql);
}

$_SESSION['koszykgosc'] = []; 
session_write_close();

mysqli_close($db);
?>