<?php
session_start();
if (!isset($_SESSION['zalogowany_id']) || $_SESSION['zalogowany_id'] != 'admin') {
    header("Location: main.php");
    exit;
}
$db = mysqli_connect('localhost', 'root', '', 'sklep');

$komunikat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodaj'])) {
    if ($_POST['nazwa'] != '' && $_POST['cena'] != '' && $_POST['stan'] != '' && $_FILES['zdjecie']['name'] != '') {
        $nazwa = mysqli_real_escape_string($db, $_POST['nazwa']);
        $cena = (float)$_POST['cena'];
        $kategoria = mysqli_real_escape_string($db, $_POST['kategoria']);
        $specyfikacja = mysqli_real_escape_string($db, $_POST['specyfikacja']);
        $opis = mysqli_real_escape_string($db, $_POST['opis']);
        $stan = (int)$_POST['stan'];

        $pelna_nazwa_pliku = $_FILES['zdjecie']['name'];
        $cel = "Zdjecia/" . $pelna_nazwa_pliku;

        if (move_uploaded_file($_FILES['zdjecie']['tmp_name'], $cel)) {
            $sql = "INSERT INTO produkty (nazwa, cena, kategoria, specyfikacja, opis, status, zdjecie) 
                    VALUES ('$nazwa', '$cena', '$kategoria', '$specyfikacja', '$opis', '$stan', '$pelna_nazwa_pliku')";
            
            if (mysqli_query($db, $sql)) {
                $komunikat = "<div class='alert alert-success border-0 text-center shadow-sm'>Furia! Produkt dodany pomyślnie!</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Produkt - Logistyczna Furia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --furia-gradient: linear-gradient(to right, #3250D3 0%, #4B53DB 20%, #7B6BF3 60%, #BC84F5 100%);
        }

        body {
            background-image: url('Gemini_Generated_Image_40c6r340c6r340c6.png');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Szklana karta jak w logowaniu */
        .glass-card {
            background-color: rgba(169, 169, 169, 0.2); /* Lekka szarość z przezroczystością */
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .kolorowy-tytul {
            background: var(--furia-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Stylowe inputy */
        .inpat {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid #7B6BF3;
            border-radius: 10px;
            color: white;
            padding: 10px 15px;
            width: 100%;
            transition: 0.3s;
        }

        .inpat:focus {
            outline: none;
            border-color: #BC84F5;
            box-shadow: 0 0 15px rgba(188, 132, 245, 0.4);
            background: rgba(0, 0, 0, 0.6);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            margin-left: 5px;
        }

        /* Przycisk powieksz z Twojego logowania */
        .powieksz { transition: transform 0.2s; cursor: pointer; }
        .powieksz:hover { transform: scale(1.05); }

        .btn-zaloguj {
            background: var(--furia-gradient);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            padding: 15px;
            width: 100%;
            letter-spacing: 1px;
        }

        header {
            background-color: rgba(0, 0, 0, 0.8);
            border-bottom: 2px solid #3250D3;
        }
    </style>
</head>
<body class="min-vh-100">

    <header class="p-3 mb-4">
        <div class="container d-flex align-items-center">
            <a href="main.php" class="powieksz me-4">
                <img src="Ikony/home.png" style="height: 45px; filter: drop-shadow(0 0 5px #3250D3);">
            </a>
            <h1 class="m-0 fs-2 kolorowy-tytul">Dodaj do Magazynu</h1>
        </div>
    </header>

    <main class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 glass-card p-4 p-md-5">
                
                <?php echo $komunikat; ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <label>Nazwa Produktu</label>
                            <input type="text" name="nazwa" class="inpat" placeholder="Wpisz nazwę...">
                        </div>
                        <div class="col-md-4">
                            <label>Cena (zł)</label>
                            <input type="number" step="0.01" name="cena" class="inpat" placeholder="0.00">
                        </div>

                        <div class="col-md-6">
                            <label>Kategoria</label>
                            <select name="kategoria" class="inpat">
                                <option value="opakowania">Opakowania</option>
                                <option value="zabezpieczenia">Zabezpieczenia</option>
                                <option value="etykiety">Etykiety</option>
                                <option value="sprzet">Sprzęt</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Stan Magazynowy</label>
                            <input type="number" name="stan" class="inpat" placeholder="Ilość sztuk">
                        </div>

                        <div class="col-12">
                            <label>Specyfikacja (techniczna)</label>
                            <textarea name="specyfikacja" class="inpat" rows="3" placeholder="Wymiary, parametry..."></textarea>
                        </div>
                        <div class="col-12">
                            <label>Opis Produktu</label>
                            <textarea name="opis" class="inpat" rows="4" placeholder="Opisz produkt klientom..."></textarea>
                        </div>

                        <div class="col-12">
                            <label>Zdjęcie produktu</label>
                            <input type="file" name="zdjecie" class="inpat">
                        </div>

                        <div class="col-12 mt-4">
                            <input type="submit" name="dodaj" value="DODAJ DO FURII" class="btn-zaloguj powieksz fs-4">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>

</body>
</html>