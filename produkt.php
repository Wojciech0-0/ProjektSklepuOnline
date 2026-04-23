<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['zalogowany_id'])) {
    // Jeśli nie ma go w schowku, wykopujemy go do logowania
    header("Location: logowanie.php");
    exit;
    $status = $_SESSION['zalogowany_id'];
}
$db = mysqli_connect('localhost','root','','sklep');

$id_produktu = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$zapytanie = "SELECT produkty.nazwa, produkty.cena, produkty.zdjecie, produkty.opis, produkty.specyfikacja FROM produkty WHERE id_produktu = $id_produktu";
$wynik = mysqli_query($db, $zapytanie);
$produkt = mysqli_fetch_assoc($wynik);

$status = $_SESSION['zalogowany_id'];
?>
<body style="height: 100vh; display: flex; flex-direction: column;">
    <header class="row text-center h-">
        <div class="col-2 col-md-5">
            <a href="main.php"><img id="menuicon" class="menuicon col-12 col-sm-6 col-md-2 col-lg-1" src="Ikony/home.png" alt="" style="float: left;"></a>
        </div>
        <div class="px-3  col-8 col-md-3"></div>
        <div class="col-2 col-md-4">
            <a href="konto.php"><img id="accicon" class="accicon col-6 col-sm-5 col-md-2 col-lg-1" src="Ikony/konto.png" alt="" style="float: right;"></a>
            <a href="koszyk.php"><img src="Ikony/koszyk2.png" alt="" class="col-6 col-sm-5 col-md-2 col-lg-1" style="float: right;"></a>
            
        </div>
    </header>
    <main class="d-flex flex-wrap overflow-y-auto bg-secondary">
        <div class="col-12 col-md-8 h-75" style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-repeat: repeat-y;">
            <div style="background-color: black;" class="text-center text-light fs-2" id="NazwaProduktu"><?php echo $produkt['nazwa'];?></div>
            <div style="background-color: rgba(139, 136, 136, 0.518); height: 100%;" class="justify-content-center d-flex">
                <img src="Zdjecia/<?php echo $produkt['zdjecie'];?>" alt="" class="h-100">
            </div>
        </div>
        <div class="col-11 m-4 rounded-4 col-md-3 py-5 p-2 fs-3" style="background-color: #d9d9d9; height: fit-content;">
<?php echo $produkt['specyfikacja'];?>
        </div>
        <div class="col-12 col-md-8 bg-secondary p-5 fs-1 justify-content-evenly">
            <b class="col-12"><?php echo number_format($produkt['cena'], 2, '.', ' ');?> zł</b> <button id="Dodaj" class=" rounded-5 text-center text-dark border-0 fs-2 p-2 col-12 powieksz" style="background-color: rgb(122, 226, 80);">Dodaj do koszyka</button>
        </div>
        <div class="row col-11 p-3 m-4 rounded-4" style="background-color: rgba(255, 255, 255, 0.233);">
            <h1 class="col-12 mb-3">Opis produktu</h1>
            <p class="fs-4"><?php echo $produkt['opis'];?></p>
        </div>
    </main>
    <footer></footer>
    <script>
        const dodaj = document.getElementById('Dodaj');

        dodaj.addEventListener('click',()=>{
            fetch('dodajDoKoszyka.php',{
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'produkt=' + encodeURIComponent("<?php echo $id_produktu?>")
                })
                .then(alert('Produkt dodany do koszyka!'));
        })
    </script>
</body>
</html>