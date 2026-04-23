<?php
session_start();

    $id = mysqli_connect('localhost','root','','sklep');

    $kategoria = $_POST['kategoria'] ?? 'wszystko';
                $sort = $_POST['val'] ?? 'afabet';
                $cenaOd = $_POST['cenaOd'] ?? 0;
                $cenaDo = $_POST['cenaDo'] ?? 9999;
                $status = $_SESSION['zalogowany_id'] ?? 'gosc';
                $szukanie = $_POST['szukanie'] ?? '';
    if($kategoria == 'wszystko'){
                if($sort == "odNajmniejszej"){
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%' order by produkty.cena ASC";
                }else if($sort == "odNajwiekszej"){
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%'  order by produkty.cena DESC";
                }else{
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%'  order by produkty.nazwa ASC";
                }

                $wyswietlenie = mysqli_query($id,$sqlpokaz);

                while($d = mysqli_fetch_array($wyswietlenie)){
                    echo '<div class="rounded-4 row d-flex flex-column m-4 col-6 col-sm-4 col-md-3 produkt powieksz align-items-center" style="background-color: #d9d9d96a;">
                        <a href="produkt.php?id='. $d['id_produktu'].'" class="text-decoration-none text-dark">
                            <div><img class="img-fluid" src="Zdjecia/'.$d['zdjecie'].'" style="height:211px;" alt=""></div>
                    <div class="podtekst rounded-4 p-3 col-12 text-center" style="background-color: #c2dcff7b;">' . $d['nazwa'] .'<br> <br>' . $d['cena'] .'zł</div>
                        </a>
                    </div>';
                }
    }else{

                if($sort == "odNajmniejszej"){
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.kategoria = '$kategoria' AND produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%'  order by produkty.cena ASC";
                }else if($sort == "odNajwiekszej"){
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.kategoria = '$kategoria' AND produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%'  order by produkty.cena DESC";
                }else{
                    $sqlpokaz = "SELECT produkty.id_produktu, produkty.nazwa, produkty.cena, produkty.zdjecie from produkty where produkty.kategoria = '$kategoria' AND produkty.cena >= $cenaOd AND produkty.cena <= $cenaDo AND produkty.nazwa LIKE '%$szukanie%'  order by produkty.nazwa ASC";
                }

                $wyswietlenie = mysqli_query($id,$sqlpokaz);

                while($d = mysqli_fetch_array($wyswietlenie)){
                    echo '<div class="rounded-4 row d-flex flex-column m-4 col-12 col-sm-4 col-md-3 powieksz align-items-center produkt" style="background-color: #d9d9d96a;">
                        <a href="produkt.php?id='. $d['id_produktu'].'" class="text-decoration-none text-dark">
                            <div><img class="img-fluid" src="Zdjecia/'.$d['zdjecie'].'" style="height:211px;" alt=""></div>
                    <div class="podtekst rounded-4 p-3 col-12 text-center" style="background-color: #c2dcff7b;">' . $d['nazwa'] .'<br> <br>' . $d['cena'] .'zł</div>
                        </a>
                    </div>';
                }
    }


            ?>