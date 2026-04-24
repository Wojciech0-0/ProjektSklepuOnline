<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły konta</title>
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

 $status = $_SESSION['zalogowany_id'];

    $db = mysqli_connect('localhost','root','','sklep');

    $sql1 = "SELECT uzytkownicy.login, uzytkownicy.email, uzytkownicy.data FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika = $status";
    $wynik1 = mysqli_query($db, $sql1);

    $uzytkownik = mysqli_fetch_assoc($wynik1);

    $sql2 = "SELECT COUNT(DISTINCT zakupy.index_zakupu) AS 'ilosc' FROM zakupy WHERE zakupy.id_uzytkownika = $status";

    $wynik2 = mysqli_query($db, $sql2);

    $zamowienia = mysqli_fetch_assoc($wynik2);
?>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: repeat-y;">
    <div class="container-fluid justify-content-center align-items-center vh-100 d-flex">

        <div class=" col-12 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">

            <div class="pb-3 row text-center justify-content-center">

               <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        Szczegóły konta
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="d-flex justify-content-center p-4 fs-3" style="overflow-x: auto; overflow-wrap: normal; ">
                    <div class="row text-start">
                        <div class="col-6 col-lg-5">
                            Login:
                        </div>
                        <div class="col-6 col-lg-7">
                            <?php echo $uzytkownik['login'];?>
                        </div>
                        <div class="col-6 col-lg-5">
                            Adres e-mail
                        </div>
                        <div class="col-6 col-lg-7">
                            <?php echo $uzytkownik['email'];?>

                        </div>
                        <div class="col-6 col-lg-5">
                            Data utworzenia konta:
                        </div>
                        <div class="col-6 col-lg-7">
                            <?php echo $uzytkownik['data'];?>
                        </div>
                        <div class="col-6 col-lg-5">
                            Ilość zamówień:
                        </div>
                        <div class="col-6 col-lg-7">
                            <?php echo $zamowienia['ilosc'];?>
                        </div>
                        <div class="col-9 col-lg-6">
                            Łączna suma wydanych pieniędzy:
                        </div>
                        <div class="col-3 col-lg-2" id="money">
                            ***** zł
                        </div>
                        <div class="col-12 col-lg-4 text-center">
                            Pokaż kwote <input type="checkbox" name="pokaz" id="pokaz">
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <script>
        const pokaz = document.getElementById('pokaz');
        const money = document.getElementById('money');

        pokaz.addEventListener('change',()=>{
            if(pokaz.checked){
                fetch('lacznaCena.php',{
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                })
                .then(res=> res.text())
                .then(data => {
                    money.innerHTML = data;
                });
            }else{
                money.innerHTML ='***** zł';
            }
        })
    </script>
</body>
</html>