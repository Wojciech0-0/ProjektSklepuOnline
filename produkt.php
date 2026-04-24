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

$zapytanie = "SELECT produkty.nazwa, produkty.cena, produkty.zdjecie, produkty.opis, produkty.specyfikacja, produkty.status FROM produkty WHERE id_produktu = $id_produktu";
$wynik = mysqli_query($db, $zapytanie);
$produkt = mysqli_fetch_assoc($wynik);

$status = $_SESSION['zalogowany_id'];
?>
<body style="height: 100vh; display: flex; flex-direction: column;">
    <header class="row text-center h-">
        <div class="col-2 col-md-5">
            <a href="main.php"><img id="menuicon" class="menuicon col-12 col-sm-6 col-md-2 col-lg-1 powieksz" src="Ikony/home.png" alt="" style="float: left;"></a>
        </div>
        <div class="px-3  col-8 col-md-3"></div>
        <div class="col-2 col-md-4">
            <a href="konto.php"><img id="accicon" class="accicon col-6 col-sm-5 col-md-2 col-lg-1 powieksz" src="Ikony/konto.png" alt="" style="float: right;"></a>
            <a href="koszyk.php"><img src="Ikony/koszyk2.png" alt="" class="col-6 col-sm-5 col-md-2 col-lg-1 powieksz" style="float: right;"></a>
            
        </div>
    </header>
    <main class="container-fluid bg-secondary overflow-y-auto py-4">
    <div class="row justify-content-center g-4">
        
        <div class="col-12 col-lg-8">
    <div class="card bg-dark text-light overflow-hidden border-0 shadow">
        <div class="p-2 text-center fs-2" style="background-color: black;">
            <?php if($status != 'admin'): ?>
                <?php echo $produkt['nazwa']; ?>
            <?php else: ?>
                <input type="text" class="inputAdmin col-12 text-center" style="background-color: transparent; border: 0; color:white;" value="<?php echo $produkt['nazwa']; ?>" id="nazwa_produktu">
            <?php endif; ?>
        </div>
        
        <div style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-repeat: repeat-y; background-size: cover; min-height: 400px;" class="d-flex justify-content-center align-items-center">
            <div style="background-color: rgba(129, 125, 125, 0.2); width: 100%; height: 100%;" class="d-flex justify-content-center align-items-center p-4">
                <img src="Zdjecia/<?php echo $produkt['zdjecie']; ?>" alt="" class="img-fluid" style="max-height: 600px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

        <div class="col-12 col-lg-3">
            <div class="p-4 rounded-4 shadow-sm h-100" style="background-color: #d9d9d9;">
                <h3 class="border-bottom border-dark pb-2">Specyfikacja</h3>
                <div class="fs-4">
                    <?php if($_SESSION['zalogowany_id'] != 'admin'): ?>
                        <?php echo nl2br($produkt['specyfikacja']); ?>
                    <?php else: ?>
                        <textarea id="specyfikacja_produktu" class="w-100" style="background-color: transparent; border: 0; color:black;" rows="15"><?php echo $produkt['specyfikacja']; ?></textarea>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4 g-4">
        <div class="col-12 col-lg-11">
            <div class="row bg-secondary p-4 rounded-4 align-items-center shadow">
                <div class="col-12 col-md-6 fs-1">
                    <p>
                        <b>
                            <?php if($_SESSION['zalogowany_id'] != 'admin'): ?>
                                <?php echo number_format($produkt['cena'], 2, '.', ' '); ?>
                            <?php else: ?>
                                <input type="number" step="0.01" style="background-color: transparent; border: 0; width: 200px;" id="cena_produktu" value="<?php echo $produkt['cena']; ?>">
                            <?php endif; ?>
                        zł</b>
                    </p>
                    
                    <span class="fs-3 ms-3 col-12">Stan: 
                        <?php if($_SESSION['zalogowany_id'] != 'admin'): ?>
                            <i style="color: <?php echo ($produkt['status'] < 10) ? 'red' : 'inherit'; ?>;">
                                <?php echo ($produkt['status'] <= 0) ? 'Niedostępny' : $produkt['status']; ?>
                            </i>
                        <?php else: ?>
                            <input type="number" id="stan_produktu" style="background-color: transparent; border: 0; width: 100px; color: <?php echo ($produkt['status'] < 10) ? 'red' : 'black'; ?>;" value="<?php echo $produkt['status']; ?>">
                        <?php endif; ?>
                    </span>
                </div>

                <div class="col-12">
                    <button id="Dodaj" <?php echo ($produkt['status'] > 0) ? 'class="rounded-5 col-12 col-md-8 text-center text-dark border-0 fs-2 p-3 w-100 powieksz" style="background-color: rgb(122, 226, 80);"' : 'disabled class="rounded-5 text-center text-dark border-0 fs-2 p-3 w-100"'; ?>>
                        Dodaj do koszyka
                    </button>
                </div>

                <div class="col-12 mt-4 p-4 rounded-4" style="background-color: rgba(255, 255, 255, 0.1);">
                    <h1>Opis produktu</h1>
                    <div class="fs-4">
                        <?php if($_SESSION['zalogowany_id'] != 'admin'): ?>
                            <?php echo nl2br($produkt['opis']); ?>
                        <?php else: ?>
                            <textarea id="opis_produktu" class="w-100" style="background-color: transparent; border: 0; color:black;" rows="6"><?php echo $produkt['opis']; ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if($status == 'admin'): ?>
                    <div class="col-12 text-center mt-4">
                        <div id="usun_produkt" class="powieksz d-inline-block" style="cursor: pointer;">
                            <img src="Ikony/kosz.png" alt="Usuń" style="height: 80px;">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
    <footer></footer>
    <script>
        const dodaj = document.getElementById('Dodaj');
        const status = '<?php echo $_SESSION['zalogowany_id']; ?>';
        
        if(status == "admin"){
            const usun_produkt = document.getElementById('usun_produkt');
            const specyfikacja_produktu = document.getElementById('specyfikacja_produktu');
            const opis_produktu = document.getElementById('opis_produktu');
            const cena_produktu = document.getElementById('cena_produktu');
            const nazwa_produktu = document.getElementById('nazwa_produktu');
            const status_produktu = document.getElementById('stan_produktu');

            usun_produkt.addEventListener('click',()=>{
                fetch('usun_produkt.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${encodeURIComponent(<?php echo $id_produktu; ?>)}`
                }).then(window.location.href = 'main.php')
            })

            function aktualizacja(){
                fetch('aktualizacja.php',{
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'specyfikacja='+encodeURIComponent(specyfikacja_produktu.value) + '&opis=' + encodeURIComponent(opis_produktu.value) + '&cena=' + encodeURIComponent(cena_produktu.value) + '&nazwa=' + encodeURIComponent(nazwa_produktu.value) + '&status=' + encodeURIComponent(status_produktu.value) + '&id=' + encodeURIComponent(<?php echo $id_produktu;?>)
                })
            }

            specyfikacja_produktu.addEventListener('blur',()=>{
                aktualizacja();
            })

            opis_produktu.addEventListener('blur',()=>{
                aktualizacja();
            })
            nazwa_produktu.addEventListener('blur',()=>{
                aktualizacja();
            })
            status_produktu.addEventListener('blur',()=>{
                aktualizacja();
            })
            cena_produktu.addEventListener('blur',()=>{
                aktualizacja();
            })
        }

        let tempstan = <?php echo $produkt['status'];?>;

        if(status != 'gosc'){
                dodaj.addEventListener('click',()=>{
                    if(tempstan - 1 >= 0){
                        fetch('dodajDoKoszyka.php',{
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: 'produkt=' + encodeURIComponent("<?php echo $id_produktu;?>")
                        })
                        .then(alert('Produkt dodany do koszyka!'));
                        tempstan -= 1;
                    }else{
                        alert('Nie można dodać do koszyka! Zabraknie nam produktu!');
                    }
        })          
        }else{
            dodaj.addEventListener('click',()=>{
                if(tempstan - 1 >= 0){
                        fetch('dodajDoKoszykagosc.php',{
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: 'produkt=' + encodeURIComponent("<?php echo $id_produktu;?>")
                            })
                        .then(alert('Produkt dodany do koszyka!'));
                        tempstan -= 1;
                    }else{
                        alert('Nie można dodać do koszyka! Zabraknie nam produktu!');
                    }
            })
        }
        
    </script>
</body>
</html>