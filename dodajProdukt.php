<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="height: 100vh; display: flex; flex-direction: column;">
    <?php
    session_start();

    if($_SESSION['zalogowany_id'] != 'admin'){
        header("Location: main.php");

        exit;
    }

    $db = mysqli_connect('localhost','root','','sklep');
    ?>

    <header style="height: 170px;">
        <div class="mb-5 d-flex  align-items-center" style="background-color: rgba(0, 0, 0);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        Dodaj produkt
                    </div>
                    <div class="col-2"></div>
                </div>
    </header>
    <main class="bg-dark-subtle h-100 d-flex align-items-center justify-content-center row">
        <div class="card col-12 col-md-8 d-flex align-items-center justify-content-center text-center">
            <form action="dodajProdukt.php" method="post" enctype="multipart/form-data">
                <div class="col-12 col-md-6 my-3">
                    Nazwa: <input type="text" name="nazwa" id="">
                </div>
                <div class="col-12 col-md-6 my-3">
                    Cena: <input type="number" name="cena" id="">
                </div>
                <div class="col-12 col-md-6 my-3">
                    Kategoria: <select name="kategoria" id="">
                        <option value="opakowania">Opakowania</option>
                        <option value="zabezpieczenia">Zabezpieczenia</option>
                        <option value="etykiety">Etykiety</option>
                        <option value="sprzet">Sprzęt</option>
                    </select>
                </div>
                <div class="col-12 col-md-6 my-3">
                    Specyfikacja: <br> <textarea name="specyfikacja" id="" rows="6" cols="30"></textarea>
                </div>
                <div class="col-12 col-md-6 my-3">
                    Opis: <br> <textarea name="opis" id="" rows="6" cols="50"></textarea>
                </div>
                <div class="col-12 col-md-6 my-3">
                    Stan: <input type="number" name="stan" id="stan">
                </div>
                <div class="col-12 col-md-6 my-3">
                    Zdjecie: <input type="file" name="zdjecie" id="zdjecie">
                </div>

                <input class="col-12 fs-3 mb-5" name="dodaj" type="submit" id="Dodaj" value="Dodaj">
            </form>
        </div>
        
    </main>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodaj'])){
        if($_POST['nazwa'] != '' && $_POST['cena'] != '' && isset($_POST['kategoria']) && $_POST['specyfikacja'] != '' && $_POST['opis'] != '' && $_POST['stan'] != '' && isset($_FILES['zdjecie'])){
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            $kategoria = $_POST['kategoria'];
            $specyfikacja = $_POST['specyfikacja'];
            $opis = $_POST['opis'];
            $stan = $_POST['stan'];
            $zdjecie = $_FILES['zdjecie'];

            $pelna_nazwa_pliku = $_FILES['zdjecie']['name'];
            $cel = "Zdjecia/" . $pelna_nazwa_pliku;

            // 2. Przenosisz plik z pamięci tymczasowej do folderu
            if(move_uploaded_file($_FILES['zdjecie']['tmp_name'], $cel)){
                // 3. Jeśli się udało, wysyłasz zapytanie do bazy
                $sql = "INSERT INTO produkty (nazwa, cena, kategoria, specyfikacja, opis, status, zdjecie) 
                        VALUES ('$nazwa', '$cena', '$kategoria', '$specyfikacja', '$opis', '$stan', '$pelna_nazwa_pliku')";
                
                if(mysqli_query($db, $sql)){
                    echo "Produkt dodany pomyślnie!";
                } else {
                    echo "Błąd bazy danych: " . mysqli_error($db);
                }
            } else {
                echo "Błąd podczas przesyłania zdjęcia.";
            }

        }else{
            echo 'Wprowadź dane!';
        }
    }
    ?>
</body>
</html>