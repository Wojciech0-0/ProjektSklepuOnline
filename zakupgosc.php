<?php
session_start();
if(!isset($_SESSION['zalogowany_id']) || $_SESSION['zalogowany_id'] != 'gosc'){
    exit;
}

$_SESSION['koszykgosc'] = []; 
session_write_close();
?>