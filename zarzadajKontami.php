<?php
session_start();

if($_SESSION['zalogowany_id'] != 'admin'){
    header("Location: main.php");

    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid justify-content-center align-items-center min-vh-100 py-5 d-flex">
        <div class="col-12 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">
            <div class="pb-3 row text-center d-flex justify-content-center">
                <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        Zarządzaj kontami
                    </div>
                    <div class="col-2"></div>
                </div>
                <table class="col-11 col-md-9">
                    <tr>
                    <th>ID użytkownika</th><th>Login</th><th>E-mail</th><th>Usuń chuja</th>
                    </tr>
                    <?php
                        $db = mysqli_connect('localhost','root','','sklep');

                        $sql = "SELECT uzytkownicy.id_uzytkownika, uzytkownicy.login, uzytkownicy.email FROM uzytkownicy";
                        $wynik = mysqli_query($db, $sql);
                        while($d= mysqli_fetch_array($wynik)){
                            echo '<tr><td>' . $d['id_uzytkownika'] . '</td><td>' . $d['login'] . '</td><td>' . $d['email'] . '</td><td><a href="usunKonto2.php?id='.$d['id_uzytkownika'].'"><img src="Ikony/kosz.png" class="powieksz img-fluid" style="height: 55px;"></a></td></tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>