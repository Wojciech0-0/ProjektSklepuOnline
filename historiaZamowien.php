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

    <div class="container-fluid justify-content-center align-items-center vh-100 d-flex">

        <div class=" col-8 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">

            <div class="pb-3 row text-center d-flex justify-content-center">

               <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.html" class="col-2 col-sm-1" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
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
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>