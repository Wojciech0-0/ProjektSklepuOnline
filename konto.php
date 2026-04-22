<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['zalogowany_id'])) {
    // Jeśli nie ma go w schowku, wykopujemy go do logowania
    header("Location: logowanie.php");
    exit;
}
$status = $_SESSION['zalogowany_id'];


$db = mysqli_connect('localhost','root','','sklep');
?>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid justify-content-center align-items-center vh-100 d-flex">
        <div class=" col-8 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">
            <div class="pb-3 row text-center d-flex justify-content-center">
                <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        <?php
                        if($status == 'gosc'){
                            echo 'Zaloguj się po więcej informacji.';
                        }else{
                            $sql = "SELECT uzytkownicy.login FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika = $status";

                            $wynik = mysqli_query($db, $sql);

                            $uzytkownik = mysqli_fetch_assoc($wynik);

                            echo "Cześć " . $uzytkownik['login'] . "!";
                        }
                        ?>
                    </div>
                    <div class="col-2"></div>
                </div>
                <?php

                if($status != 'gosc'){
                    echo '
                
                <div class="col-lg-12 my-2">
                    <a href="szczegoly.php"><input type="button" value="Szczegóły konta" name="szczegoly" id="" class="inpat border-1 rounded-3 col-7 col-lg-4 powieksz"></a>
                </div>
                

                <div class="col-lg-12 my-2">
                    <a href="historiaZamowien.php"><input type="button" value="Historia zamówień" name="historia" id="" class="inpat border-1 rounded-3 col-7 col-lg-4 powieksz"></a>
                </div>


                <div class="col-lg-12 my-2">
                    
                    <a href="zmianaHasla.php"><input type="button" value="Zmień hasło" name="zmienhaslo" id="" class="inpat border-1 rounded-3 col-7 col-lg-4 powieksz"></a>
                </div>

                
                <div class="col-lg-12 my-2">
                    
                    <input type="button" value="Wyloguj się" name="wyloguj" id="wyloguj" class="inpat border-1 rounded-3 col-7 col-lg-4 powieksz">
                </div>
                

                <div class="col-lg-12 my-5">
                    <input type="submit" value="Usuń konto" name="usun" style=" color: white; background-color: red;" class="rounded-3 col-7 col-lg-4 powieksz">
                </div>';
                }else{
                    echo ' <div class="col-lg-12 my-5">
                    
                    <input type="button" value="Zaloguj się" name="wyloguj" id="wyloguj" class="inpat border-1 rounded-3 col-7 col-lg-4 powieksz" style="background-color: lightgreen; color: white;">
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        const wyloguj = document.getElementById('wyloguj');

        wyloguj.addEventListener('click',()=>{
            fetch('wyloguj.php',{
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                                })
                                .then(()=>{
                                    window.location.href = 'logowanie.php';
                                });
        })
    </script>
</body>
</html>