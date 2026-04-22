<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<?php
    $status = isset($_GET['login']) ? $_GET['login'] : 'gosc';
?>
<script>
    fetch('wyswietl.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                            })
                            .then(res=> res.text())
                            .then(data => {
                                document.getElementById('produktyS').innerHTML = data;});
</script>
<body style="height: 100vh; display: flex; flex-direction: column; overflow-x: hidden;">
    <header class="row text-center h-">
        <div class="col-2 col-md-5">
            <img class="menuicon col-12 col-sm-6 col-md-2 col-lg-1 powieksz" id="menu" src="Ikony/menu.png" alt="" style="float: left;">
        </div>
        <input type="text" class="px-3 wyszukiwanie rounded-5 border-0 col-8 col-md-3 h-100">
        <div class="col-2 col-md-4">
            <a href="konto.php?status=<?php echo $status?>"><img id="accicon" class="accicon col-6 col-sm-5 col-md-2 col-lg-1" src="Ikony/konto.png" alt="" style="float: right;"></a>
            <a href="koszyk.html"><img src="Ikony/koszyk2.png" alt="" class="col-6 col-sm-5 col-md-2 col-lg-1" style="float: right;"></a>
            
        </div>
    </header>
    <div style="display: flex;" class="h-100">
        <aside id="kategorie" class="kategorie col-6 col-md-3">
            <div class="p-3">
                <h2 class="kolorowy">Kategorie:</h2>
                <ul class="lista">
                    <li id="Wszystko" class="zaznaczony">Wszystkie przedmioty <img class="ikonki" src="Ikony/Wszystko.png" alt=""></li>
                    <li id="Opakowania">Opakowania <img class="ikonki" src="Ikony/opakowania.png" alt=""></li>
                    <li id="zabezpieczenia">Folie i zabezpieczenia <img class="ikonki" src="Ikony/Folie.png" alt=""></li>
                    <li id="Etykiety">Etykiety <img class="ikonki" src="Ikony/Etykiety.png" alt=""></li>
                    <li id="Sprzęt">Sprzęt <img class="ikonki" src="Ikony/Narzedzia.png" alt=""></li>
                </ul>
            </div>
            
           
            <hr style="color: white; border-width: 4px;">

            <div style="color: white;" class="px-4">
                <h2><b>Sortuj według:</b></h2><br>
                <ul>
                    <li><b>Cena</b></li>
                </ul>
                Od najniższej <input type="radio" name="cenaSort" id="odNajm" value="odNajmniejszej"> <br>
                Od najwyższej <input type="radio" name="cenaSort" id="odNajw" value="odNajwiekszej"> <br><br>
                Od <input class="w-25 rounded-5 px-2" type="number" min="0" id="cenaOd"> Do <input class="px-2 w-25 rounded-5" type="number" min="1" id="cenaDo"> <br><br>
                Alfabetycznie <input type="radio" checked name="cenaSort" id="alf" value="Alfabetycznie">
                
            </div>
        </aside>
        <main class="homepage col-12 col-md-9 overflow-y-auto h-100 overflow-x-hidden" style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png);
    background-repeat: no-repeat;
    background-size: cover;">
            <div class="Digga col-7 m-3 py-1 px-3 rounded-4 text-center text-light" style="background-color: rgba(169, 169, 169, 0.41);"><h1 id="Napis">Wszystkie przedmioty</h1></div>
            <div id="produktyS" class="row"> 
            </div>
        </main>
    </div>
    
    <footer></footer>
    <script>
        const Napis = document.getElementById('Napis');
        const cenaDo = document.getElementById('cenaDo');
        const cenaOd = document.getElementById('cenaOd');
        const elementy = document.querySelectorAll('.lista li');
        const menu = document.getElementById('menu');
        const kategorie = document.getElementById('kategorie');
        const mediaQeaty = window.matchMedia('(max-width: 727px)');
        const produkty = document.querySelectorAll('produkt');
        const homepage = document.querySelector('homepage');
        const status = <?php echo '"'.$status.'"';?>;

        
            mediaQeaty.addEventListener('change',(e)=>{
                if(e.matches){
                    kategorie.classList.remove('pokazany');
                    kategorie.classList.add('schowany');
                }else{
                    kategorie.classList.remove('schowany');
                    kategorie.classList.add('pokazany');
                }
            });

        menu.addEventListener('click',()=>{
           if(window.innerWidth < 782 && kategorie.classList.contains('schowany')){
            kategorie.classList.remove('schowany');
            kategorie.classList.add('pokazany');
           }else if(window.innerWidth < 782 && kategorie.classList.contains('pokazany')){
            kategorie.classList.remove('pokazany');
            kategorie.classList.add('schowany');
           }
        });

        let globalCenado = 99999;
        let globalCenaod = 0;

        function pobierzSortowanie() {
            const zaznaczony = document.querySelector('input[name="cenaSort"]:checked');
            return zaznaczony ? zaznaczony.value : 'alfabetycznie';
        }

        // Funkcja zbierająca wszystkie aktualne dane i wysyłająca fetch
        function wywolajOdswiezanie() {
            const aktywnyElement = document.querySelector('.lista li.zaznaczony');
            const kategoria = aktywnyElement ? aktywnyElement.id.toLowerCase() : 'wszystko';
            const sort = pobierzSortowanie();

            // Pobieramy wartości bezpośrednio z inputów lub zmiennych domyślnych
            const cOd = (cenaOd.value !== "" && cenaOd.value >= 0) ? cenaOd.value : 0;
            const cDo = (cenaDo.value !== "" && cenaDo.value >= 0) ? cenaDo.value : 99999;

            fetch('wyswietl.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `kategoria=${encodeURIComponent(kategoria)}&val=${encodeURIComponent(sort)}&cenaOd=${encodeURIComponent(cOd)}&cenaDo=${encodeURIComponent(cDo)}&status=${encodeURIComponent(status)}`
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById('produktyS').innerHTML = data;
            });
        }

        // Listenery dla cen
        cenaDo.addEventListener('blur', wywolajOdswiezanie);
        cenaOd.addEventListener('blur', wywolajOdswiezanie);

        // Obsługa kategorii
        elementy.forEach(li => {
            li.addEventListener('click', function() {
                elementy.forEach(el => el.classList.remove('zaznaczony'));
                this.classList.add('zaznaczony');
                
                Napis.innerText = this.innerText;
                wywolajOdswiezanie(); // Używamy wspólnej funkcji
            });
        });

        // Obsługa sortowania
        document.querySelectorAll('input[name="cenaSort"]').forEach(radio => {
            radio.addEventListener('change', wywolajOdswiezanie);
        });

        // Opcjonalnie: Załaduj produkty na start
        window.onload = wywolajOdswiezanie;
    </script>

</body>
</html>