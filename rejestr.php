<?php
                    $db = mysqli_connect('localhost', 'root', '', 'sklep');

                        // 1. Pobieramy dane z POST
                        $login = $_POST['login'] ?? '';
                        $email = $_POST['email'] ?? '';
                        $haslo1 = $_POST['haslo1'] ?? '';
                        $haslo2 = $_POST['haslo2'] ?? '';

                        if($login != '' && $email != '' && $haslo1 != '' && $haslo2 != ''){
                            
                        $sqlsprawdz = "SELECT id_uzytkownika FROM uzytkownicy 
                        WHERE login = '$login' OR `e-mail` = '$email'";

                        $wyniksprawdz = mysqli_query($db, $sqlsprawdz);

                        if (mysqli_num_rows($wyniksprawdz) == 0) {

                        
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                if(strlen($haslo1) >= 8){
                                    if($haslo1 == $haslo2){
                                        $data = date("Y-m-d");
                                        echo "Konto utworzone pomyślnie!";

                                        mysqli_query($db,"INSERT INTO uzytkownicy VALUES (NULL, '$login', '$email', '$haslo1', '$data')");
                                    
                                    }else{
                                        echo "Hasła nie są takie same!";
                                    }
                                }else{
                                    echo 'Hasło musi mieć więcej niż 8 znaków!';
                                }
                                
                            }else{
                                echo "Nieprawidłowy email!";
                            }
                        }else{

                            echo "Niestety konto z takimi danymi już istnieje!";
                        }
                        }else{
                            echo "Wprowadź poprawne dane!";
                        }
                    



                        // 3. Sprawdzamy, czy znaleźliśmy kogoś (czy wrócił 1 wiersz)
                        //     $uzytkownik = mysqli_fetch_assoc($wynik);
                            
                        //     // Sukces! Przekierowanie
                        //     header('Location: main.php?login=' . $uzytkownik['id_uzytkownika']);
                        //     exit; 
                        // } else {
                        //     echo "<div class='alert alert-danger my-2'>Nieprawidłowe dane logowania!</div>";
                        // }
                    
                    ?>