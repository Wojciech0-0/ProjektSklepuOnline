<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj sie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(Gemini_Generated_Image_40c6r340c6r340c6.png); background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid justify-content-center align-items-center vh-100 d-flex">
        <div class="row col-6 col-md-4 col-lg-3 rounded-5 shadow" style="background-color: rgba(169,169,169,0.4);">
            <div class="p-3 row text-center">
                <div class="col-12 my-3 kolorowy">
                    <h2>ZAREJESTRUJ SIĘ</h2>
                </div>
                <form action="rejestracja.php" id="formularz" method="post">
                                <div class="col-12 my-2">
                                    <div>
                                        Login: <br>
                                    </div>
                                    <input type="text" name="login" id="login" class="inpat border-1 rounded-3">
                                </div>

                                <div class="col-12 my-2">
                                    <div>
                                        Adres e-mail: <br>
                                    </div>
                                    <input type="text" name="email" id="email" class="inpat border-1 rounded-3">
                                </div>


                                <div class="col-12 my-2">
                                    <div>
                                        Hasło: <br>
                                    </div>
                                    <input type="password" name="haslo1" id="haslo1" class="inpat border-1 rounded-3">
                                </div>

                                <div class="col-12 my-2">
                                    <div>
                                        Powtórz hasło: <br>
                                    </div>
                                    <input type="password" name="haslo2" id="haslo2" class="inpat border-1 rounded-3">
                                </div>
                                

                                <div class="col-12 mt-5">
                                    <input type="submit" value="ZAREJESTRUJ" name="zarejestruj" class="powieksz" style=" background-image: linear-gradient(
                        to right,
                        #3250D3 0%,
                        #4B53DB 20%,
                        #7B6BF3 60%,
                        #BC84F5 100%
                    ); color: white;" class="rounded-3 col-7 col-lg-5">
                    <div class='alert alert-danger my-2 d-none' id="alert"></div>
                </form>
                <script>
                    const formularz = document.getElementById('formularz');
                    const alert = document.getElementById('alert');

                    formularz.addEventListener('submit',(e)=>{
                        e.preventDefault();

                        const login = document.getElementById('login').value;
                        const email = document.getElementById('email').value;
                        const haslo1 = document.getElementById('haslo1').value;
                        const haslo2 = document.getElementById('haslo2').value;

                        fetch('rejestr.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: `login=${encodeURIComponent(login)}&email=${encodeURIComponent(email)}&haslo1=${encodeURIComponent(haslo1)}&haslo2=${encodeURIComponent(haslo2)}`
                            })
                            .then(res => res.text())
                            .then(data => {
                                if (data.startsWith("Konto")) {
                                    alert.classList.remove('d-none');
                                    alert.classList.remove('alert-dager');
                                    alert.classList.add('text-bg-success');
                                    alert.innerHTML = data;
                                } else {
                                    alert.classList.remove('d-none');
                                    alert.innerHTML = data;
                                }
                            });
                    });
                </script>
                
                </div>
                <div class="justify-content-evenly row" style="color: white; font-size: smaller;">
                    <p class="col-12 col-lg-4">Masz już konto?
                        <a style="color: white;" class="powieksz" href="logowanie.php">Zaloguj się</a>
                    </p>
                    <p class="col-12 col-lg-4">
                        <a style="color: white;" class="powieksz" id="goscbtn">Kontynuuj jako gość</a>
                        <script>
                            const goscbtn = document.getElementById('goscbtn');

                            goscbtn.addEventListener('click',()=>{
                                fetch('gosc.php',{
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                                }).then(()=>{
                                    window.location.href = 'main.php';
                                });
                            });
                        </script>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>