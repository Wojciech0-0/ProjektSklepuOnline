<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Zamówień</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['zalogowany_id']) OR $_SESSION['zalogowany_id']=='gosc') {
    // Jeśli nie ma go w schowku, wykopujemy go do logowania
    header("Location: logowanie.php");
    exit;
}
?>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: no-repeat;">

    <div class="container-fluid justify-content-center align-items-center min-vh-100 py-5 d-flex">

        <div class=" col-12 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">

            <div class="pb-3 row text-center d-flex justify-content-center">

               <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                       Historia zamówień
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="d-flex justify-content-center">
                    <table class="col-lg-9">
                        <tr>
                            <th>Zamówiony towar</th><th>Cena</th><th>Data</th><th>Status</th>
                        </tr>
                        <?php
                        $db = mysqli_connect('localhost', 'root', '', 'sklep');
                        $status_user = $_SESSION['zalogowany_id'];

                        // SQL z grupowaniem i logiką statusu
                        $sql = "SELECT 
                                    GROUP_CONCAT(produkty.nazwa SEPARATOR ', ') AS lista_towarow, 
                                    SUM(produkty.cena) AS laczna_cena, 
                                    zakupy.data_zakupu,
                                    -- Logika statusu: Jeśli data jest starsza niż 7 dni, to 'Dostarczono'
                                    IF(zakupy.data_zakupu <= DATE_SUB(CURDATE(), INTERVAL 7 DAY), 'Dostarczono', 'W trakcie doręczenia') AS status_zamowienia
                                FROM zakupy 
                                JOIN produkty ON zakupy.id_produktu = produkty.id_produktu 
                                WHERE zakupy.id_uzytkownika = '$status_user'
                                GROUP BY zakupy.index_zakupu  -- Grupowanie po Twoim numerze zamówienia
                                ORDER BY zakupy.data_zakupu DESC";

                        $wynik1 = mysqli_query($db, $sql);

                        if ($wynik1) {
                            while($d = mysqli_fetch_array($wynik1)){
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($d['lista_towarow']) . '</td>';
                                echo '<td>' . number_format($d['laczna_cena'], 2, '.', ' ') . ' zł</td>';
                                echo '<td>' . $d['data_zakupu'] . '</td>';
                                // Dodajemy mały kolor do statusu dla lepszego efektu
                                $color = ($d['status_zamowienia'] == 'Dostarczono') ? 'text-success' : 'text-warning';
                                echo '<td class="'.$color.' fw-bold">' . $d['status_zamowienia'] . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>