<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
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

?>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: no-repeat;">

    <div class="justify-content-center align-items-center vh-100 d-flex">

        <div class="col-8 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">

            <div class="pb-3 row text-center d-flex justify-content-center align-items-center">

                <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        Twój koszyk
                    </div>
                    <div class="col-2"></div>
                </div>

                

                <div class="d-flex align-items-center justify-content-center col-9">
                    <div class="rounded-4 overflow-auto" style="background-color: rgba(211, 211, 211, 0.56);width: 100%; height: 200px;">
                            <?php
                            if($status != 'gosc'){
                                $db = mysqli_connect('localhost','root','','sklep');

                                $sql = "SELECT koszyk.id_koszyka, produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie FROM koszyk JOIN produkty ON produkty.id_produktu = koszyk.id_produktu JOIN uzytkownicy ON uzytkownicy.id_uzytkownika = koszyk.id_uzytkownika WHERE koszyk.id_uzytkownika = $status";

                                $wynik= mysqli_query($db,$sql);

                                if(mysqli_num_rows($wynik) > 0){
                                    while($produkt = mysqli_fetch_array($wynik)){
                                        echo '
                                        <div style="width: 927px;" class="d-flex px-2 justify-content-center border-bottom border-3">
                                        <div style="width: 200px;" class=""><a href="produkt.php?id='.$produkt['id_produktu'].'"><img src="Zdjecia/'.$produkt['zdjecie'].'" style="height: 200px; width: 200px; border-right: solid white;" alt=""></a></div>
                                                <div class="fs-2 text-white d-flex align-items-center justify-content-center" style="width: 200px; border-right: solid white;">'.$produkt['nazwa'].'</div>
                                                <div class="fs-2 text-white d-flex align-items-center justify-content-center" style="width: 200px; border-right: solid white;">'.number_format($produkt['cena'], 2, '.', ' ').'zł</div>
                                                <div class="d-flex align-items-center justify-content-center" style="width: 190px;"><a href="usunProdukt.php?id='.$produkt['id_koszyka'].'"><button style="background-color: transparent; border: none;" class="powieksz"><img src="Ikony/kosz.png" height="50px" alt=""></button></a></div>
                                                </div>';
                                    }
                                
                                }else{
                                    echo '<div class="w-100 fs-1 text-white d-flex align-items-center justify-content-center" id="alert">Twój koszyk jest pusty</div>';
                                }
                            }
                            ?>
                      
                    </div>
                </div>



                <div class="align-items-center justify-content-center d-flex flex-column">
                    <hr class="d-block" style="color: white; width: 74%; margin-top: 20px; border: 2px solid rgb(255, 255, 255);">
                  <div class="d-block fs-3 text-light col-8 text-end">Suma: <?php
                  if($status != 'gosc'){
                      $sql2 = "SELECT SUM(produkty.cena) AS 'cena' FROM koszyk JOIN produkty ON produkty.id_produktu = koszyk.id_produktu JOIN uzytkownicy ON uzytkownicy.id_uzytkownika = koszyk.id_uzytkownika WHERE koszyk.id_uzytkownika = $status";

                    $wynik2 = mysqli_query($db,$sql2);
                        $cena = mysqli_fetch_array($wynik2);

                        echo number_format((float)$cena['cena'],2, '.', ' ') . 'zł';
                    } 
                ?>
                </div>
                    <input type="submit" id="zakup" value="ZAPŁAĆ I ZAKUP" class="mb-2 text-light col-lg-5 col-11 fs-3 border-0 rounded-5 powieksz d-block" style="background-color: rgb(30, 232, 104);">
                </div>
            </div>
        </div>
    </div>
    <script>
        const kosz = document.getElementById('kosz');
        const zakup = document.getElementById('zakup');

        zakup.addEventListener('click',()=>{
            if(!document.getElementById('alert')){
                if(confirm("Czy na pewno chcesz dokonać zakupu?")){
                    fetch('zakup.php',{
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    })
                    .then(window.location.href = 'koszyk.php');
                }
            }else{
                alert("Nie można kupić pustego koszyka!");
            }
            while(!document.getElementById('alert')){
                window.location.href = 'koszyk.php';
            }
        })
    </script>
</body>
</html>