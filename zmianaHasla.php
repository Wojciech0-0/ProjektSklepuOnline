<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>
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
?>
<body style="background-image: url(Gemini_Generated_Image_m2odv2m2odv2m2od.png); background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid justify-content-center align-items-center vh-100 d-flex">
        <div class=" col-12 col-md-8 col-lg-8 rounded-5 shadow-5" style="background-color: rgba(169,169,169,0.4);">
            <div class="pb-3 row text-center justify-content-center">
                <div class="mb-5 d-flex rounded-5 col-11 align-items-center" style="background-color: rgba(104, 103, 103, 0.4);">
                    <a href="main.php" class="col-2 col-sm-1 powieksz" style="float: left;"><img class="img-fluid" src="Ikony/home.png" alt=""></a>
                    <div class="col-10 fs-1 text-light text-center">
                        Zmień hasło
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="col-lg-12 my-2">
                    <input type="password" placeholder="Podaj stare hasło" name="starehaslo" id="stareHaslo" class="bg-light inpat border-1 rounded-3 col-7 col-lg-4">
                </div>
                

                <div class="col-lg-12 my-2">
                    <input type="password" placeholder="Podaj nowe hasło" name="nowehaslo" id="nowehaslo1" class="bg-light inpat border-1 rounded-3 col-7 col-lg-4">
                </div>


                <div class="col-lg-12 my-2">
                    
                    <input type="password" placeholder="Potwierdź nowe hasło" name="potwierdznowe" id="nowehaslo2" class="bg-light inpat border-1 rounded-3 col-7 col-lg-4">
                </div>

                <div class="rounded-3 col-7 col-lg-4 mt-4  d-none text-bg-danger" id='alert'></div>

                <div class="col-lg-12 my-5">
                    <input id="zmien" type="submit" value="Zmień hasło" name="zmien" style=" color: black; background-color: greenyellow;" class="rounded-3 col-7 col-lg-4 powieksz">
                </div>
                <script>
                    const alert = document.getElementById('alert');
                    const zmien = document.getElementById('zmien');
                    const n1 = document.getElementById('nowehaslo1');
                    const n2 = document.getElementById('nowehaslo2');

                    n2.addEventListener('input', () => {
                        if (n1.value !== n2.value) {
                            n2.classList.remove('bg-light');
                            n2.style.backgroundColor = "red";
                        } else {
                            n2.classList.remove('bg-light');
                            n2.style.backgroundColor = "green";
                        }
                    });
                    
                    zmien.addEventListener('click',(e)=>{
                        e.preventDefault();

                        const stareHaslo = document.getElementById('stareHaslo').value;
                        const nowehaslo1 = document.getElementById('nowehaslo1').value;
                        const nowehaslo2 = document.getElementById('nowehaslo2').value;

                        fetch('zmienHaslo.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: "status=" + encodeURIComponent("<?php echo $status?>") + "&stareHaslo=" + encodeURIComponent(stareHaslo) + "&noweHaslo1=" + encodeURIComponent(nowehaslo1) + "&noweHaslo2=" + encodeURIComponent(nowehaslo2)
                        })
                        .then(res => res.text())
                        .then(data => {
                             if (data.startsWith("Hasło")) {
                                    alert.classList.remove('d-none');
                                    alert.classList.remove('text-bg-danger');
                                    alert.classList.add('text-bg-success');
                                    alert.innerHTML = data;
                                    document.getElementById('stareHaslo').value = "";
                                    document.getElementById('nowehaslo1').value = "";
                                    document.getElementById('nowehaslo2').value = "";
                                } else {
                                    alert.classList.remove('d-none');
                                    alert.innerHTML = data;
                                }
                        });
                        
                    })
                </script>
            </div>
        </div>
    </div>
</body>
</html>